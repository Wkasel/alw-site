<?php 

if (!defined('BASEPATH'))  exit('No direct script access allowed');

class simpleObject extends Model {

	private $content;
    private $db;
    private $CI;
    private $prefix;
	private $title;
	public $table;
	private $order;
	private $name_row;
	private $fields_db = array();
	private $fields_desc = array();
	private $fields_desc_select = array();
	private $field_types = array();
	private $is_hidden = array();
	private $additional_tables = array();
	private $fields_select;
	private $main_condition;
	private $file_data;
	private $radio;
	private $per_page;
    
	function __construct($params) {
		session_start();
		$this->db = $params[3];
		$this->table_name = $params[1];
		$this->data = $params[0];
		$this->CI = $params[4];
		$this->session = $params[5];
		$this->prefix      = $this->data['prefix'];
		$this->title       = $this->data['title'];
		$this->table       = $this->data['table'];
		$this->order       = $this->data['order'];
		$this->name_row    = $this->data['name_row'];			
		$this->fields_db   = $this->data['fields_db'];
		$this->fields_desc = $this->data['fields_desc'];
		$this->fields_desc_select = isSet($this->data['fields_desc_select']) ? $this->data['fields_desc_select'] : $this->data['fields_desc'];
		$this->field_types = $this->data['field_types'];
		$this->is_hidden   = $this->data['is_hidden'];
		$this->additional_tables = isSet($this->data['additional_tables']) ? $this->data['additional_tables']: null;
		$this->fields_select = isSet($this->data['fields_select']) ? $this->data['fields_select']: null;
		$this->main_condition = isSet($this->data['main_condition']) ? $this->data['main_condition']: null;
		$this->file_data = isSet($this->data['file_data']) ? $this->data['file_data']: null;
		$this->radio = isSet($this->data['radio']) ? $this->data['radio']: null;
		$this->per_page = isSet($this->data['per_page']) ? $this->data['per_page']: null;
    	switch ($params[2]) {
			case ''		  :
			case 'display': 	$this->display();
								$this->title = $this->title.' :: просмотр записей';
								break;
			case 'add'	  : 	$this->add();
								$this->title = $this->title.' :: добавление записи';
								break;
			case 'edit'   : 	$this->edit();
								$this->title = $this->title.' :: редактирование записи';
								break;
			case 'delete' : 	$this->delete();
								$this->title = $this->title.' :: удаление записи';
								break;
			default		  :		$this->display();
								$this->title = $this->title.' :: просмотр записей';
		}     
		$this->session->set_userdata(array('title'=>$this->title));
    }
    
	function display()
	{	
		$from = $this->CI->uri->segment(4);
		if ($from == false) $from = 0;
		$nodes = $this->db->query('SELECT '.implode(',', $this->fields_select).' FROM '.$this->table.' '.$this->main_condition.' 
		ORDER BY '.$this->order.' LIMIT '.$from.', '.$this->per_page);
		$all = $this->db->query('SELECT COUNT(*) FROM '.$this->table.' '.$this->main_condition.' ORDER BY '.$this->order);
		$all = $all->result_num();
		$content =  "

		<table class='inline' cellpadding='0' cellspacing='0'>
		<tr>";
		foreach ($this->fields_desc_select as $k)
		{
			$content.= '<td>'.$k.'</td>';
		} 
		$content .= "
		<td width='5%>Редактировать</td><td width='5%'>Удалить</td>
		</tr>";	
		foreach ($nodes->result_array() as $node)
		{
			$content .= '<tr>';
			for ($j=0; $j<count($this->fields_select); $j++)
			{
				if ($this->name_row == $j)
				{
					$content .= '<td>
					<a href="/admin/index/'.$this->table_name.'/edit/'.$node[$this->fields_select[0]].'/">'.$node[$this->fields_select[$this->name_row]].'</a>
					</td>';
				}
				elseif ($this->field_types[$j] == 'image')
				{
					if (!isSet($this->file_data[$j]['path']) || empty($this->file_data[$j]['path']))
					{
						$this->file_data[$j]['path'] = '/source/images/admin/'.$this->table_name.'/';
					}
					$content .= '<td><img src="'.$this->file_data[$j]['path'].$node[$this->fields_select[$j]].'" width="'.$this->file_data[$j]['display_width'].'" height="'.$this->file_data[$j]['display_height'].'" /></td>';
				}
				else 
				{
					if (strlen($this->FromBase($node[$this->fields_select[$j]])) > 150)
						$content .= '<td>'.substr(strip_tags($this->FromBase($node[$this->fields_select[$j]])), 0 ,150).'...</td>';	
					else 
						$content .= '<td>'.$this->FromBase($node[$this->fields_select[$j]]).'</td>';	
				}
			}
			$content .= '
			<td>
				<a href="/admin/index/'.$this->table_name.'/edit/'.$node[$this->fields_select[0]].'/">
					<img src="/source/images/admin/edit.gif" />
				</a>
			</td>
			<td>
			<a href="/admin/index/'.$this->table_name.'/delete/'.$node[$this->fields_select[0]].'/" onClick="return confirm(\'Вы уверены, что хотите удалить запись?\')"><img src="/source/images/admin/del.gif" border="0"></a>
			</td>
			</tr>';	
		}	
		$content .= '
		<tr>
		<td><a href="/admin/index/'.$this->table_name.'/add"><img src="/source/images/admin/add.gif" /></a></td><td colspan="'.(count($this->fields_db)-1).'"></td>
		</tr></table>';
		if (ceil($all[0][0]/$this->per_page) > 1)
		{
			for ($i=0; $i<ceil($all[0][0]/$this->per_page); $i++)
			{
				if ($i !=  $from/$this->per_page)
					$content .= '<a href="/admin/index/'.$this->table_name.'/'.($i*$this->per_page).'/">'.($i+1).'</a>&nbsp;';
				else 
					$content .= ($i+1).'&nbsp;';
			}
		}
		echo $content;	
	}
	
	function add()
	{	
		if ($this->additional_tables != null)
		{
			foreach ($this->additional_tables as $k => $v)
			{	
				$data = explode('*', $v);
				$result[$k] = $this->db->query('SELECT '.$data[1].' FROM '.$data[0].' ORDER BY '.$data[2].' '.$data[3]);
				$my_key = explode(',', $data[1]);
				$index[$k] = $data[count($data)-1];
			}
		}
		if (isSet($_POST['add']))
		{	
			$arr = array();
			for ($i=0; $i<count($this->fields_db); $i++)
			{
				if (empty($_POST[$this->fields_db[$i]])) $_POST[$this->fields_db[$i]] = '';
				
				if ($this->field_types[$i] == 'radio' && empty($_POST[$this->fields_db[$i]]))
				{
					$arr[] = 'null';
					continue;
				}
				if (!in_array($this->fields_db[$i], $this->is_hidden) && !isSet($_FILES[$this->fields_db[$i]]))
					$arr[] = '"'.$this->ToBase($_POST[$this->fields_db[$i]]).'"';
				elseif (isSet($_FILES[$this->fields_db[$i]]))
				{	
					if (is_uploaded_file($_FILES[$this->fields_db[$i]]['tmp_name']))
					{
						$id = mt_rand(0, 100000);
						if (!isSet($this->file_data[$i]['path']) || empty($this->file_data[$i]['path']))
						{
							if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/source/images/admin/'.$this->table_name))
								mkdir($_SERVER['DOCUMENT_ROOT'].'/source/images/admin/'.$this->table_name, 0777);
							$this->file_data[$i]['path'] = $_SERVER['DOCUMENT_ROOT'].'/source/images/admin/'.$this->table_name;
						}
						move_uploaded_file($_FILES[$this->fields_db[$i]]['tmp_name'], $this->file_data[$i]['path'].'/'.$id.'_'.$_FILES[$this->fields_db[$i]]['name']);
						if ($this->file_data[$i]['resize'])
						{
							require($_SERVER['DOCUMENT_ROOT'].'/system/application/libraries/image_toolbox.php');
							$this->resize($this->file_data[$i]['path'].'/'.$id.'_'.$_FILES[$this->fields_db[$i]]['name'], $this->file_data[$i]['resize_width'],
							$this->file_data[$i]['resize_height']);
						}
						$arr[] = '"'.$this->ToBase($id.'_'.$_FILES[$this->fields_db[$i]]['name']).'"';
					} 	
					else 
					{
						$arr[] = '""';
					}
				}
				
				elseif ($this->field_types[$i] == 'date')
				{
					$arr[] = 'NOW()';
				}
				else 
				{
					$arr[] = 'null';
				}
			}
			$this->db->query('INSERT INTO '.$this->table.' ('.implode(',', $this->fields_db).') VALUES ('.implode(',', $arr).')');
			echo '<script>window.setTimeout("window.location = \'/admin/index/'.$this->table_name.'/\';", 2000);</script>
			<center>Запись успешно добавлена</center>'; 	
		}
		else 
		{
			$content = "
			<form action='' method='post' enctype='multipart/form-data'>
			<table cellpadding='0' cellspacing='0' class='inline'>
			<thead>
			<tr><td colspan='2'><div id='cat_warning'></div></td></tr>";
			$i = 0;
		
			foreach ($this->fields_db as $k)
			{
				if (!in_array($k, $this->is_hidden))
				{
					
					switch ($this->field_types[$i])
					{
						case 'text'	  	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><input type=text" name="'.$k.'" /></td>
													</tr>';
											break;
						case 'textarea'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><textarea name="'.$k.'" /></textarea></td>
													</tr>';
											break;	
						case 'image'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><input type="file" name="'.$k.'" /></td>
													</tr>';
											break;	
						case 'radio'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td><td>';
													foreach ($this->radio[$i] as $key => $v)
													{	
														$content .= $v.'<input type="radio" name="'.$k.'" value="'.$key.'" style="width:15px;"/>&nbsp;&nbsp;';
													}
													$content .= '
													</td>
													</tr>';
											break;		
						case 'checkbox'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><input type="checkbox" name="'.$k.'" style="width:15px;" value="1" /></td>
													</tr>';
											break;				
						case 'editor' 	  : $content .= "<tr>
													<td colspan='2'>
														<b>".$this->fields_desc[$i]."</b>
													</td>
													</tr>
													<tr>
													<td colspan='2'>
													<script type=\"text/javascript\">
											
														var sBasePath = '/source/js/admin/fckeditor/';
														var oFCKeditor = new FCKeditor( '".$k."' );
														oFCKeditor.BasePath	= sBasePath ;
														oFCKeditor.Height	= 300 ;
														oFCKeditor.Value	= '';
														oFCKeditor.Create() ;
														//-->
													</script>
													</td>
													</tr>";
											break;
						case 'select' :  $content .= '<tr>
													  <td>'.$this->fields_desc[$i].'</td>
													  <td><select name="'.$k.'">';
													  foreach($result[$i]->result_num() as $info)
													  {
													      $content .= '<option value="'.$info[0].'">'.$info[1].'</option>';
													  }
													  
										 $content .= '</select></td></tr>';
					}
				}
				$i++;
			}
			$content .= "
			<tr>
			<td colspan='2'>
			<input type='submit' value='Добавить' style='width:90px;' name='add'>
			</td>
			</tr>
			</table>
			</form>";
			echo $content;
		}
	}
	
	function edit()
	{
		if (isSet($_POST['edit']))
		{	
			$arr = array();
			for ($i=0; $i<count($this->fields_db); $i++)
			{
				if (!isSet($_POST[$this->fields_db[$i]])) $_POST[$this->fields_db[$i]] = 0;
				if (!in_array($this->fields_db[$i], $this->is_hidden) && !isSet($_FILES[$this->fields_db[$i]]))
					$arr[] = $this->fields_db[$i].' = "'.$this->ToBase($_POST[$this->fields_db[$i]]).'"';
				elseif (isSet($_FILES[$this->fields_db[$i]]))
				{
					if (is_uploaded_file($_FILES[$this->fields_db[$i]]['tmp_name']))
					{
						$id = mt_rand(0, 100000);
						if (!isSet($this->file_data[$i]['path']) || empty($this->file_data[$i]['path']))
						{
							if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/source/images/admin/'.$this->table_name))
								mkdir($_SERVER['DOCUMENT_ROOT'].'/source/images/admin/'.$this->table_name, 0777);
							$this->file_data[$i]['path'] = $_SERVER['DOCUMENT_ROOT'].'/source/images/admin/'.$this->table_name;
						}
						move_uploaded_file($_FILES[$this->fields_db[$i]]['tmp_name'], $this->file_data[$i]['path'].'/'.$id.'_'.$_FILES[$this->fields_db[$i]]['name']);
						if ($this->file_data[$i]['resize'])
						{
							require($_SERVER['DOCUMENT_ROOT'].'/system/application/libraries/image_toolbox.php');
							$this->resize($this->file_data[$i]['path'].'/'.$id.'_'.$_FILES[$this->fields_db[$i]]['name'], $this->file_data[$i]['resize_width'],
							$this->file_data[$i]['resize_height']);
						}
						$arr[] = $this->fields_db[$i].' = "'.$this->ToBase($id.'_'.$_FILES[$this->fields_db[$i]]['name']).'"';
					} 	
				}
				elseif ($this->field_types[$i] == 'date')
				{
					$arr[] = $this->fields_db[$i].' = NOW()';
				}
			
			}
			$this->db->query('UPDATE '.$this->table.' SET '.implode(',', $arr). ' WHERE '.$this->fields_db[0].' = "'.$_POST['id'].'"');
			echo '<script>window.setTimeout("window.location = \'/admin/index/'.$this->table_name.'/\';", 1000);</script>
				<center>Запись изменена</center>'; 	
		}	
		else 
		{
			$node = $this->db->query('SELECT '.implode(',', $this->fields_db).' FROM '.$this->table.' 
			WHERE '.$this->fields_db[0].' = "'.$this->CI->uri->segment(5).'"');
			$node = $node->result_array();
			$node = $node[0];
			if (is_array($this->additional_tables))
			{
				foreach ($this->additional_tables as $k => $v)
				{	
					$data = explode('*', $v);
					$result[$k] = $this->db->query('SELECT '.$data[1].' FROM '.$data[0].' ORDER BY '.$data[2].' '.$data[3]);
					$my_key = explode(',', $data[1]);
					$index[$k] = $data[count($data)-1];
				}
			}
			$content = "
			<form action='' method='post'  enctype='multipart/form-data'>
			<table cellpadding='0' cellspacing='0' class='inline'>
			<thead>
			<tr><td colspan='2'><div id='cat_warning'></div></td></tr>";
			$i = 0;
	
			foreach ($this->fields_db as $k)
			{
				if (!in_array($k, $this->is_hidden))
				{
				
					switch ($this->field_types[$i])
					{
						case 'text'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><input type=text" name="'.$k.'" value="'.$node[$k].'" /><br /></td>
													</tr>';
											break;
						case 'textarea'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><textarea name="'.$k.'" />'.$node[$k].'</textarea></td>
													</tr>';
											break;	
						case 'radio'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td><td>';
													foreach ($this->radio[$i] as $key => $v)
													{	
														if ($node[$k] == $key)
															$content .= $v.'<input type="radio" name="'.$k.'" value="'.$key.'" checked style="width:15px;"/>&nbsp;&nbsp;';
														else 
															$content .= $v.'<input type="radio" name="'.$k.'" value="'.$key.'" style="width:15px;"/>&nbsp;&nbsp;';
													}
													$content .= '
													</td>
													</tr>';
													break;
						case 'checkbox'	  :	$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><input type="checkbox" value="1" name="'.$k.'" style="width:15px;"'; if ($node[$k] == 1) $content .= 'checked'; $content .= ' /></td>
													</tr>';
											break;	
						case 'image'	  :	
											if (!isSet($this->file_data[$i]['path']) || empty($this->file_data[$i]['path']))
											{
												$this->file_data[$i]['path'] = '/source/images/admin/'.$this->table_name.'/';
											}
											$content .= '<tr>
													<td>'.$this->fields_desc[$i].'</td>
													<td><input type="file" name="'.$k.'" /><img src="'.$this->file_data[$i]['path'].$node[$k].'" width="'.$this->file_data[$i]['display_width'].'" height="'.$this->file_data[$i]['display_height'].'" style="margin-left:35px"/></td>
													</tr>';
											break;			
						case 'editor' 	  : $node[$k] = addslashes($node[$k]);
											$node[$k] = $this->FromBase($node[$k]);
	    									$node[$k] = preg_replace('/\s/', ' ', $node[$k]);
											$content .= "<tr>
													<td colspan='2'>
														<b>".$this->fields_desc[$i]."</b>
													</td>
													</tr>
													<tr>
													<td colspan='2'>
													<script type=\"text/javascript\">
											
														var sBasePath = '/source/js/admin/fckeditor/' ;
														var oFCKeditor = new FCKeditor( '".$k."' ) ;
														oFCKeditor.BasePath	= sBasePath ;
														oFCKeditor.Height	= 300 ;
														oFCKeditor.Value	= '".addslashes($node[$k])."';
														oFCKeditor.Create() ;
														//-->
													</script>
													</td>
													</tr>";
											  break;
						case 'select' 	   :  $content .= '<tr>
													  <td>'.$this->fields_desc[$i].'</td>
													  <td><select name="'.$k.'">';
													 
													  foreach($result[$i]->result_num() as $info)
													  {	 
													  	
													      if ($info[0] == $node[$index[$i]])
													          $content .= '<option value="'.$info[0].'" selected="selected">'.$info[1].'</option>';
													      else 
													      	  $content .= '<option value="'.$info[0].'">'.$info[1].'</option>';
													  }
													  
										 $content .= '</select></td></tr>';
					}
				}
				$i++;
			}
			$content .= "
			<tr>
			<td colspan='2'>
			<input type='submit' value='Редактировать' style='width:120px;' name='edit'>
			<input type='hidden' name='id' value='".(int)$this->CI->uri->segment(5)."' />
			</td>
			</tr>
			</table>
			</form>";
			echo $content;
		}
	}
	
	function delete()
	{
		$this->db->query('DELETE FROM '.$this->table.' WHERE '.$this->fields_db[0].' = "'.(int)$this->CI->uri->segment(5).'"');
		echo '<script>window.setTimeout("window.location = \'/admin/index/'.$this->table_name.'/\';", 1000);</script>
		<center>Запись удалена</center>'; 
	}
	
	function ToBase($content, $no_conv='')
    {
        if (is_array($content))
        {
            foreach($content as $k)
            {
                $content = str_replace('&',         '&amp;',        $content);
                $content = str_replace('"',         '&quot;',       $content);
                $content = str_replace("'",         '&#039;',       $content);
                $content = str_replace('<',         '&lt;',         $content);
                $content = str_replace('>',         '&gt;',         $content);
            }
            return $content;
        }
        else
        {
            $content = str_replace('&',         '&amp;',        $content);
            $content = str_replace('"',         '&quot;',       $content);
            $content = str_replace("'",         '&#039;',       $content);
            $content = str_replace('<',         '&lt;',         $content);
            $content = str_replace('>',         '&gt;',         $content);
            return $content;
        }
    }
    
    function FromBase($content)
    {
        if (is_array($content))
        {
            for ($i=0; $i<count($content); $i++)
            {
                $content[$i] = $this->RestoreHtml($content[$i]);
            }
            return $content;
        }
        else
        {
            $content = $this->RestoreHtml($content);
            return $content;
        }
    }

    function RestoreHtml($content)
    {
        $content = str_replace("&amp;",          "&",         $content);
        $content = str_replace('&quot;',         '"',         $content);
        $content = str_replace("&#039;",         "'",         $content);
        $content = str_replace("&lt;",           "<",         $content);
        $content = str_replace("&gt;",           ">",         $content);
        return $content;
    }
    
    function resize($src, $w, $h, $new=false)
	{
		if (!file_exists($src))
		{
			return 'File not found';  
		}
		preg_match('/.([gif|jpeg|jpg|png]{3,4})$/i', $src, $arr); 
		$img = new Image_Toolbox($src);
		$img->setResizeMethod('resample');
		$img->newOutputSize($w, $h, 1);
		if ($new != false)
		{
			$img->save($new, $arr[1]);  
		}
		else
		{
			$img->save($src, $arr[1]);
		}
	}
}

?>