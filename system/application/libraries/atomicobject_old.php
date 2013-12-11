<?php
/*
AtomicObject library for generating object management
PHP 5.2.x or higher
*/

class AtomicObject {
	
	private $CI;
	private $action;
	private $table;
	private $structure;
	private $layout;
	private $uid;
	
	function __construct($data) {
		session_start();
		
		$this->CI = $data['instance'];
		$this->CI->load->config('atomic');
		$this->CI->load->library('session');
		$this->structure = $this->CI->config->config[$data['table']];
		$this->alias_talbe = $data['table']; 
		$this->table = isset($this->structure['strict_table']) ? $this->structure['strict_table'] : $data['table'];
		$this->sortable = isset($this->structure['sortable']) ? true : false;
		$this->layout['title'] = $this->structure['title'];
		$this->layout['alias_talbe'] = $this->alias_talbe;
		$this->layout['my_mode'] = 'admin';
		$this->uid = $this->CI->session->userdata('uid');
		$this->CI->load->model('Pers');
		if ($this->CI->Pers->checkAcess($this->uid, $this->table, 1) == 0) {
			return $this->denied();
		}
		if (strpos($_SERVER['REQUEST_URI'], 'add_item') !== false) {
			 return $this->add();
		} elseif (strpos($_SERVER['REQUEST_URI'], 'edit_item') !== false) {
			return $this->edit();
		} elseif (strpos($_SERVER['REQUEST_URI'], 'delete_item') !== false) {
			return $this->delete();
		} elseif (strpos($_SERVER['REQUEST_URI'], 'validate') !== false) {
			return $this->validate();
		} elseif (strpos($_SERVER['REQUEST_URI'], 'delete_nodes') !== false) {
			return $this->delete_nodes();
		} elseif (strpos($_SERVER['REQUEST_URI'], 'move_up') !== false) {
			return $this->move_up();
		} elseif (strpos($_SERVER['REQUEST_URI'], 'move_down') !== false) {
			return $this->move_down();
		} elseif (strpos($_SERVER['REQUEST_URI'], 'delete_file') !== false) {
			return $this->delete_file();
		}
		else {
			$this->display();
		}
	}
	
	public function denied() {
		$this->CI->smarty('admin/denied', $this->layout);
	}
	
	public function display() {
		if (!isSet($_SESSION[$this->table])) {
			$_SESSION[$this->table] = array();
		}
		if (!isSet($_SESSION[$this->table]['per_page'])) {
			$_SESSION[$this->table]['per_page'] = $this->structure['per_page'];
		}
		if (strpos($_SERVER['REQUEST_URI'], 'set_per_page') !== false) {
			 $_SESSION[$this->table]['per_page'] = $this->CI->uri->segment(5);
			 header('location: /'.$this->layout['my_mode'].'/index/'.$this->table.'/');
		}
		//delete filter
		if ($this->CI->input->post('discard_filter_y')) {
			unset($_SESSION[$this->table]['filter']);
		}
		//sort section make_sort
		if (strpos($_SERVER['REQUEST_URI'], 'make_sort') !== false) {
			$_SESSION[$this->table]['sort_by'] = $this->CI->uri->segment(5);
			$_SESSION[$this->table]['sort_type'] = $this->CI->uri->segment(6);
			header('location: /'.$this->layout['my_mode'].'/index/'.$this->table.'/'.$this->CI->uri->segment(7));
		}
		if (isset($_SESSION[$this->table]['sort_by'])) {
			$this->layout['sort_by'] = $_SESSION[$this->table]['sort_by'];
			$this->layout['sort_type'] = $_SESSION[$this->table]['sort_type'];
		} else {
			$this->layout['sort_by'] = $this->structure['default_sort']['field'];
			$this->layout['sort_type'] =  $this->structure['default_sort']['type'];
		}
		
		$this->CI->db->order_by($this->layout['sort_by'], $this->layout['sort_type']); 
		//start filter section	
		$this->CI->db->start_cache();
		if ($this->CI->input->post('apply_filter_x')) {
			$all_fields = $_SESSION[$this->table]['filter'] = $_POST;	
		} elseif (isset($_SESSION[$this->table]['filter'])) {
			$all_fields = $_SESSION[$this->table]['filter'];
		} else {
			$all_fields = array();	
		}
		
		$arr = array();
		foreach ($all_fields as $key=>$value) {
			if (((strpos($key, $this->table.'_') !== false) || (strpos($key, '__users') !== false) || ($this->inJoins($key) == true)) && !empty($value)) {
				if (strpos($key, '__users') !== false) {
					$key = str_replace('__users_', '__users.', $key);
					
				}
				$exists = false;
				if (isSet($this->structure['joins'])) {
					foreach ($this->structure['joins'] as $join) {
						if (strpos($key, $join['table']) !== false) {
							$key = preg_replace('/^('.$join['table'].')+_/i',  '\\1.', $key);
							$stripped = $key;
							$exists = true;
						}
					}
				}
				if (!$exists) {
					$key = preg_replace('/^('.$this->table.')+_/i',  '\\1.', $key);
					$stripped = str_replace($this->table.'.', '', $key);
				}
				if (isset($this->structure['fields'][$stripped]['alias'])) {
					foreach ($this->structure['fields'][$stripped]['alias'] as $my_key=>$my_value)
					if ($value == $my_value) {
						$draw_value = $value;
						$value = $my_key;
					}
				}
				$arr[$key] = isset($draw_value) ? $draw_value : $value;
				unset($draw_value);
				$this->CI->db->like($key, trim($value));
			} else {
				$arr[$key] = '';
			}
		}
		if (!$this->CI->Pers->checkAcess($this->uid, $this->table, 2)) {
			$this->CI->db->where('__users_id', $this->uid);
		}
		if (isset($this->structure['where'])) {
			foreach ($this->structure['where'] as $node) {
				$this->CI->db->where($node[0], $node[1]);
			}
		}
	 	$this->layout['filter_values'] = isset($arr) ? $arr : false;
	 	//get current page
		$this->layout['current'] = $this->CI->uri->segment(4);
		if ($this->layout['current'] == false) {
			$this->layout['current'] = 0;
		}
		
		$this->layout['sortable'] = $this->sortable;
		//build headers and data grid
		$this->layout['headers'] = $this->getMain();
		$header_counter = 1;
		foreach ($this->layout['headers'] as $node) {
			$this->layout['header_names'][$header_counter] = $node['name'];
			$this->layout['header_types'][$header_counter] = $node['type'];
			if (isset($node['list']) && isset($node['list'])) {
				$radio_values = array_combine($node['list'], $node['alias']);
				
				$this->layout['header_aliases'][$header_counter] = $radio_values;
			}
			$header_counter++;
		}
		foreach ($this->layout['headers'] as &$node) {
			//$node['name'] = str_replace($this->table.'.', '', $node['name']);
			$node['name'] = preg_replace('/^.*[\s]+([a-z0-9_]+)/i', '\\1', $node['name']);
			
		}
		//$this->layout['header_names'] = array_keys($this->layout['headers']);
		$this->layout['table_id'] = $this->structure['table_id'];
		if (count($this->layout['headers']) == 0) {
			echo 'No nodes seleted to display';
			return;
		}
		$this->CI->db->select(implode(',', $this->layout['header_names']));
		if (isSet($this->structure['joins'])) {
 			foreach ($this->structure['joins'] as $join) {
 				$first = explode(' ', $join['table']);
 				$join['condition'] = str_replace('this', $this->table, $join['condition']);
 				if (isset($first[1])) {
 					$join['condition'] = str_replace('table', $first[1], $join['condition']);	
 				} else {
 					$join['condition'] = str_replace('table', $first[0], $join['condition']);
 				}
 				if ($join['type'] == 'join') {
 					$this->CI->db->join($join['table'], $join['condition']);
 				} else {
 					$this->CI->db->join($join['table'], $join['condition'], 'left');
 				}
 			}
		}
		if (!isset($this->structure['no_owner'])) {
			$this->CI->db->join('__users', '__users.__users_id = '.$this->table.'.__owner', 'left');
		}
		$index_array = array_keys($this->layout['headers']);
		
		$query = $this->CI->db->get($this->table, (int)$_SESSION[$this->table]['per_page'], $_SESSION[$this->table]['per_page']*$this->layout['current']);
		$this->layout['global_total'] = $this->CI->db->count_all_results($this->table);
		$this->layout['total'] = ceil($this->layout['global_total']/$_SESSION[$this->table]['per_page']);
		$this->CI->db->stop_cache();
		$this->layout['table'] = $this->table;
		$this->layout['rows'] = array(); 
		if (!isSet($_SESSION[$this->table]['per_page'])) {
			$this->layout['per_page'] = $_SESSION[$this->table]['per_page'] = 30;
		} else {
			$this->layout['per_page'] = $_SESSION[$this->table]['per_page'];
		}
		foreach ($query->result() as $row) {
			//rewriting some values
			$i=0;
			foreach ($row as $field) {
				$field = str_replace('Р', 'P', $field);
				$value = str_replace($this->table.'.', '', $index_array[$i]);
				if (isSet($this->structure['fields'][$value]['alias']) && isset($this->structure['fields'][$value]['alias'][$field]) && is_array($this->structure['fields'][$value]['alias'])) {
					$row->$value = $this->structure['fields'][$value]['alias'][$field];
				} elseif (isSet($this->structure['fields'][$value]['alias']) && $this->structure['fields'][$value]['type'] == 'file') {
					$link_tpl = $this->CI->load('admin/link_template');
					$link_tpl = str_replace('LINK', $this->CI->config->config['files_path'].$this->structure['fields'][$value]['path'].'/'.$row->$value, $link_tpl);
					$link_tpl = str_replace('TEXT', $this->structure['fields'][$value]['alias'], $link_tpl);
					$row->$value = $link_tpl;
				} elseif (isSet($this->structure['fields'][$value]['type']) && $this->structure['fields'][$value]['type'] == 'image') { 
					$image = $this->CI->load('admin/image_template');
					$image = str_replace('SRC', $this->CI->config->config['images_path'].$this->structure['fields'][$value]['path'].'/preview/'.$row->$value, $image);
					$image = str_replace('LINK', $this->CI->config->config['images_path'].$this->structure['fields'][$value]['path'].'/'.$row->$value, $image);
					if (!isset($this->structure['fields'][$value]['width_diplsay'])) {
						$this->structure['fields'][$value]['width_diplsay'] = "";
					}
					if (!isset($this->structure['fields'][$value]['height_display'])) {
						$this->structure['fields'][$value]['height_display'] = "";
					}
					$image = str_replace('WIDTH', $this->structure['fields'][$value]['width_diplsay'], $image);
					$image = str_replace('HEIGHT', $this->structure['fields'][$value]['height_display'], $image);
					$row->$value = $image;
				} elseif (isSet($this->structure['fields'][$value]['type']) && ($this->structure['fields'][$value]['type'] == 'textarea' || $this->structure['fields'][$value]['type'] == 'editor')) { 
					$this->CI->load->helper('text');
					$row->$value = character_limiter(strip_tags(htmlspecialchars_decode($field)), 50);
				} elseif (isset($this->structure['fields'][$value]['type']) && $this->structure['fields'][$value]['type'] == 'select' 
					&& $this->structure['fields'][$value]['from']['mode'] == 'simple_list') {
					if (in_array($field, array_keys($this->structure['fields'][$value]['from']['values']))) {
						$row->$value = $this->structure['fields'][$value]['from']['values'][$field];
					}
				}
				$i++;
			}//end
			$new_id = $this->structure['table_id'];
			$row->table_id = $row->$new_id;
			
			$this->layout['rows'][] = $row;
		}
		//print_r($this->layout);
		$this->CI->smarty('admin/display', $this->layout);
	}
					
	public function add() {
		if ($this->CI->input->post('add_object')) {
			if($this->validate()) {
				$data = array();
				foreach ($_POST as $key=>$value) {
					if (!isset($this->structure['fields'][$key])) {
						continue;
					}
					if ($this->structure['fields'][$key]['type'] == 'expression') {
						continue;
					} elseif ($this->structure['fields'][$key]['type'] == 'password') {
						$func = $this->structure['fields'][$key]['function'];
						$data[$key] = $func($value);
					}  elseif ($this->structure['fields'][$key]['type'] == 'checkbox') {
						$data[$key] = ($value == 'on') ? "1" : "0";
					} else {
						$data[$key] = htmlspecialchars($value, ENT_QUOTES);
					}
				}	
				foreach ($_FILES as $key=>$value) {
					if ($this->structure['fields'][$key]['type'] == 'file') {
						if (!empty($_FILES[$key]['name'])) {
							$id = rand(0, 1000000);
							$fname = $id.'_'.$this->encodestring($_FILES[$key]['name']);
						} else {
							$fname = '';
						}
						$data[$key] = $fname;
						if (is_uploaded_file($_FILES[$key]['tmp_name'])) {	
							move_uploaded_file($_FILES[$key]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['files_path'].$this->structure['fields'][$key]['path'].'/'.$fname);
						}
						
					} elseif ($this->structure['fields'][$key]['type'] == 'image') {
						if (!empty($_FILES[$key]['name'])) {
							$id = rand(0, 1000000);
							$fname = $id.'_'.$this->encodestring($_FILES[$key]['name']);
						} else {
							$fname = '';
						}
						$data[$key] = $fname;
						if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
							$_FILES[$key]['name'] = $this->encodestring($_FILES[$key]['name']);
							move_uploaded_file($_FILES[$key]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$fname);
							
						}
						if (!is_dir($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview/')) {
							mkdir($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview/', 0777);
						}
						if (!isset($this->structure['fields'][$key]['width_diplsay'])) {
							$size = getimagesize($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$fname);
							$this->structure['fields'][$key]['width_diplsay'] = $size[0];
							$this->structure['fields'][$key]['height_display'] = $size[1];
						}
						$config['image_library'] = 'gd2';
						$config['source_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$fname; 
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width'] = $this->structure['fields'][$key]['width_diplsay'];
						$config['height'] = $this->structure['fields'][$key]['height_display'];
						$config['new_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview';
						
						$config['source_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$fname; 
						$config['thumb_marker'] = '';
						$this->CI->load->library('image_lib', $config);
						$this->CI->image_lib->resize();
						$config2['image_library'] = 'gd2';
						$config2['source_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$fname; 
						$config2['maintain_ratio'] = TRUE;
						$config2['width'] = $this->structure['fields'][$key]['new_width'];
						$config2['height'] = $this->structure['fields'][$key]['new_height'];
						$config2['new_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'];
						$this->CI->image_lib->initialize($config2);
						$this->CI->image_lib->resize();
						
					} 
				}
				if (!isset($this->structure['no_owner'])) {
					$data['__owner'] = $this->uid;
				}
				
				$this->CI->db->insert($this->table, $data);
				$tree = $this->CI->session->userdata('object_info');
				$this->CI->load->helper('url');
				if ($this->sortable) {
					$id = $this->CI->db->insert_id();
					$this->CI->db->query('UPDATE '.$this->table.' SET __order = '.$id.' WHERE '.$this->table.'_id = '.$id);
				}
				if ($tree) {
					$this->CI->db->where('parent_id', $tree['parent_id']);
					$this->CI->db->select_max('object_sort');
					$query = $this->CI->db->get('__structure');
					$max = ++$query->row()->object_sort;
					$id = $this->CI->db->insert_id();
					if (empty($tree['name'])) {
						$name = $tree['module'].$id;
					} else {
						$name = $tree['name'];
					}
					$data = array ('parent_id' => $tree['parent_id'],
								   'object_name' => $name,
								   'object_type' => $tree['module'],
								   'object_id' => $id,
								   'object_label' => $tree['label'],
								   'object_sort' => $max);
					$this->CI->db->insert('__structure', $data);
					$this->CI->session->unset_userdata('object_info');
					unset($_SESSION[$this->table]['filled']);
					redirect('/'.$this->layout['my_mode'].'/tree/expand/#node'.$id.'/');	
				}
				unset($_SESSION[$this->table]['filled']);
				redirect('/'.$this->layout['my_mode'].'/index/'.$this->alias_talbe.'/');
				return true;
			} else {
				$this->layout['validate'] = true;
				$this->layout['errors'] = $_SESSION[$this->table]['errors'];
			}
		}
		if (!isset($_SESSION[$this->table]['filled'])) {
			$_SESSION[$this->table]['filled'] = false;
		}  
		$this->layout['filled'] = $_SESSION[$this->table]['filled'];
		$this->layout['fields'] = $this->structure['fields'];
		foreach ($this->layout['fields'] as $key=>$value) {
			if (isset($value['is_hidden'])) {
				unset($this->layout['fields'][$key]);
				continue;
			}
			if ($value['type'] == 'select' && isset($value['from']['mode']) && $value['from']['mode'] == 'from_table') {
				$this->CI->db->select($value['from']['data']['fields']);
				$this->CI->db->order_by($value['from']['data']['order_by'], $value['from']['data']['order_type']);
				if (isset($value['from']['data']['where'])) {
					foreach ($value['from']['data']['where'] as $node) {
						$this->CI->db->where($node[0], $node[1]);
					}
				}
				$query = $this->CI->db->get($value['from']['data']['table']);
				foreach ($query->result() as $row) {
					$arr = (array)$row;
					$property = array();
					foreach ($arr as $local) {
						$property[] = $local;
					}
					if (isset($property[1]) && strlen($property[1]) > 100) {
						$property[1] = explode(' ', $property[1]);
						$arr = array();
						if (count($property[1]) == 0 ) { die('Problems with select type in '.$key); }
						$j = 0;
						for ($i=0; $i<count($property[1]); $i++) {
							if ($j < 5) {
								$arr[] = $property[1][$i];
								$j++;
							}
						}
						$property[1] = implode(' ', $arr).'...';
					}
					$this->layout['additional'][$key][] = $property;
				}
				if (isset($value['from']['data']['start_with'])) { 
					$this->layout['additional'][$key] = array_merge(array($value['from']['data']['start_with']), $this->layout['additional'][$key]);
				}
			}
		}
		$this->CI->smarty('admin/add', $this->layout);
	}
	
	public function edit() {
		$is_author = $this->CI->Pers->isAuthor($this->table, $this->CI->uri->segment(5), $this->uid);
		
		
		if (($this->CI->Pers->checkAcess($this->uid, $this->table, 3) != 0) || $is_author) {
			$this->layout['allow_edit'] = true;
		}
		if (($this->CI->Pers->checkAcess($this->uid, $this->table, 2) == 0) && !$is_author) {
			return $this->denied();
		}
		if ($this->CI->input->post('edit_object')) {
			if (($this->CI->Pers->checkAcess($this->uid, $this->table, 2) == 0) && !$is_author) {
				return $this->denied();
			}
			if($this->validate('edit')) {
				$data = array();
				foreach ($_POST as $key=>$value) {
					if (!isset($this->structure['fields'][$key])) {
						continue;
					}
					if ($this->structure['fields'][$key]['type'] == 'expression') {
						continue;
					} elseif ($this->structure['fields'][$key]['type'] == 'password' && !empty($value)) {
						$func = $this->structure['fields'][$key]['function'];
						$data[$key] = $func($value);
					}  elseif ($this->structure['fields'][$key]['type'] == 'checkbox') {
						$data[$key] = ($value == 'on') ? "1" : "0";
					} elseif ($this->structure['fields'][$key]['type'] != 'password') {
						$data[$key] = htmlspecialchars($value, ENT_QUOTES);
					} 
				}	
				$query = $this->CI->db->get_where($this->table, array($this->structure['table_id'] => $this->CI->uri->segment(5)));
				$this->layout['filled'] = $query->result();
				
				$this->layout['filled'] = (array)$this->layout['filled'][0];
				foreach ($_FILES as $key=>$value) {
					if ($this->structure['fields'][$key]['type'] == 'file' && !empty($_FILES[$key]['name'])) {
						if (!empty($_FILES[$key]['name'])) {
							$id = rand(0, 1000000);
							$filename = $id.'_'.$_FILES[$key]['name'];
						} else {
							$filename = '';
						}
						$data[$key] = $filename;
						
						if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
							unlink($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['files_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key]);
							$_FILES[$key]['name'] = $this->encodestring($_FILES[$key]['name']);
							move_uploaded_file($_FILES[$key]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['files_path'].$this->structure['fields'][$key]['path'].'/'.$filename);
						}
					} elseif ($this->structure['fields'][$key]['type'] == 'image' && !empty($_FILES[$key]['name'])) {
						if (!empty($_FILES[$key]['name'])) {
							$id = rand(0, 1000000);
							$filename = $id.'_'.$this->encodestring($_FILES[$key]['name']);
						} else {
							$filename = '';
						}
						$data[$key] = $filename;
						if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
							unlink($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key]);
							unlink($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview/'.$this->layout['filled'][$key]);
							move_uploaded_file($_FILES[$key]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$filename);
							
						}
						if (!isset($this->structure['fields'][$key]['width_diplsay'])) {
							$size = getimagesize($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$filename);
							$this->structure['fields'][$key]['width_diplsay'] = $size[0];
							$this->structure['fields'][$key]['height_display'] = $size[1];
						}
						$config['image_library'] = 'gd2';
						$config['source_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$filename;
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width'] = $this->structure['fields'][$key]['width_diplsay'];
						$config['height'] = $this->structure['fields'][$key]['height_display'];
						$config['new_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview';
						
						if (!is_dir($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview/')) {
							mkdir($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview/', 0777);	
						}
							$config['thumb_marker'] = '';
							$this->CI->load->library('image_lib', $config);
							$this->CI->image_lib->resize();
						if (isset($this->structure['fields'][$key]['new_width'])) {
							$config['create_thumb'] = TRUE;
							$config['width'] = $this->structure['fields'][$key]['new_width'];
							$config['height'] = $this->structure['fields'][$key]['new_height'];
							$config['new_image'] = $_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'];
							$this->CI->image_lib->initialize($config);
							$this->CI->image_lib->resize();	
						}
					} 
				}
				$this->CI->db->where($this->structure['table_id'], $this->CI->uri->segment(5));
			
				$this->CI->db->update($this->table, $data); 
				$this->CI->load->helper('url');
				$page = $this->CI->uri->segment(6);
				unset($_SESSION[$this->table]['filled']);
				redirect('/'.$this->layout['my_mode'].'/index/'.$this->alias_talbe.'/'.$page.'/');
				return true;
			} else {
				$this->layout['validate'] = true;
				$this->layout['errors'] = $_SESSION[$this->table]['errors'];
			}
		}
		$query = $this->CI->db->get_where($this->table, array($this->structure['table_id'] => $this->CI->uri->segment(5)));
		$this->layout['filled'] = $query->result();
		$this->layout['filled'] = (array)$this->layout['filled'][0];
		$this->layout['rand'] = rand(1, 1000000);
		$this->layout['fields'] = $this->structure['fields'];
		$this->layout['table'] = $this->CI->uri->segment(3);
		$this->layout['object_id'] = $this->CI->uri->segment(5);
		foreach ($this->layout['fields'] as $key=>$value) {
			if (isset($value['is_hidden'])) {
				unset($this->layout['fields'][$key]);
				continue;
			}
			if ($value['type'] == 'select' && isset($value['from']['mode']) && $value['from']['mode'] == 'from_table') {
				$this->CI->db->select($value['from']['data']['fields']);
				$this->CI->db->order_by($value['from']['data']['order_by'], $value['from']['data']['order_type']);
				$query = $this->CI->db->get($value['from']['data']['table']);
				foreach ($query->result() as $row) {
					$arr = (array)$row;
					$property = array();
					foreach ($arr as $local) {
						$property[] = $local;
					}
					$this->layout['additional'][$key][] = $property;
				}
				if (isset($value['from']['data']['start_with'])) { 
					$this->layout['additional'][$key] = array_merge(array($value['from']['data']['start_with']), $this->layout['additional'][$key]);
				}
			} elseif ($value['type'] == 'file' && !empty($this->layout['filled'][$key])) {
				if ($value['type'] == 'file') {
					$path = $this->CI->config->config['files_path'];
				} else {
					$path = $this->CI->config->config['images_path'];
				}
				$this->layout['fields'][$key]['delete_link'] = array('table' => $this->layout['table'],
																	 'id' => $this->layout['object_id'],
																	 'field' => $key,
																	 'url' => $_SERVER['DOCUMENT_ROOT'].$path.$this->layout['fields'][$key]['path'].'/'.$this->layout['filled'][$key],
																	 );
				$this->layout['fields'][$key]['delete_link'] = base64_encode(json_encode($this->layout['fields'][$key]['delete_link']));													 
				$this->layout['files'][$key] = $this->CI->config->config['files_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key];
			} elseif ($value['type'] == 'image' && !empty($this->layout['filled'][$key])) {
				if ($value['type'] == 'file') {
					$path = $this->CI->config->config['files_path'];
				} else {
					$path = $this->CI->config->config['images_path'];
				}
				$this->layout['fields'][$key]['delete_link'] = array('table' => $this->layout['table'],
																	 'id' => $this->layout['object_id'],
																	 'field' => $key,
																	 'url' => $_SERVER['DOCUMENT_ROOT'].$path.$this->layout['fields'][$key]['path'].'/'.$this->layout['filled'][$key],
																	 );
				$this->layout['fields'][$key]['delete_link'] = base64_encode(json_encode($this->layout['fields'][$key]['delete_link']));													 
				$this->layout['files'][$key] = $this->CI->config->config['files_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key];
			
				$this->layout['images'][$key] = $this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview/'.$this->layout['filled'][$key];
			} elseif ($value['type'] == 'editor') {
         
					$this->layout['filled'][$key] = str_replace('Р', 'P', $this->layout['filled'][$key]);
					$this->layout['filled'][$key] = $this->FromBase($this->layout['filled'][$key]);
					$this->layout['filled'][$key] = addslashes($this->layout['filled'][$key]);
					$this->layout['filled'][$key] =  preg_replace('/\s/', ' ', $this->layout['filled'][$key]);
			} elseif ($value['type'] == 'textarea') {
				$this->layout['filled'][$key] = $this->FromBase($this->layout['filled'][$key]);
			}
		}
		$this->CI->smarty('admin/edit', $this->layout);
	}
	
	public function delete() {
		$is_author = $this->CI->Pers->isAuthor($this->table, $this->CI->uri->segment(5), $this->uid);
		if (($this->CI->Pers->checkAcess($this->uid, $this->table, 3) == 0) && !$is_author) {
			return $this->denied();
		}
		$query = $this->CI->db->get_where($this->table, array($this->structure['table_id'] => $this->CI->uri->segment(5)));
		$this->layout['filled'] = $query->result();
		$this->layout['filled'] = (array)$this->layout['filled'][0];
		foreach ($this->structure['fields'] as $key=>$value) {
			if ($value['type'] == 'file') {
				if (file_exists($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['files_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key]))
					unlink($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['files_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key]);
			}
			if ($value['type'] == 'image') {
				if (file_exists($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key]))
					unlink($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key]);
				if (file_exists($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/'.$this->layout['filled'][$key]))
					unlink($_SERVER['DOCUMENT_ROOT'].$this->CI->config->config['images_path'].$this->structure['fields'][$key]['path'].'/preview/'.$this->layout['filled'][$key]);
			}
		}
		$this->CI->db->delete($this->table, array($this->structure['table_id'] => $this->CI->uri->segment(5)));
		$this->CI->load->helper('url');
		$page = $this->CI->uri->segment(6);
		redirect('/'.$this->layout['my_mode'].'/index/'.$this->alias_talbe.'/'.$page.'/');
	}
	
	public function validate($mode='add') {
		$this->layout['errors'] = array();
		$_SESSION[$this->table]['filled'] = $_POST;
		foreach ($_POST as $key=>$value) {
			if (isset($this->structure['fields'][$key])) {
				if (isset($this->structure['fields'][$key]['validation'])) {
					$v = $this->structure['fields'][$key]['validation'];
					if ($v['type'] == 'all') {
						if (isset($v['max']) && strlen($value) > $v['max']) {
							$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'MAX_LENGTH');
						} elseif (isset($v['max']) && strlen($value) < $v['min']) {
							$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'MIN_LENGTH');
						}
					} elseif ($v['type'] == 'email') {
						$this->CI->load->helper('email');
						if (!valid_email($value)) {
							$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'EMAIL');
						}
					} elseif ($v['type'] == 'regex') {
						if (!preg_match($v['value'], $value)) {
							$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'REGEX');
						}
					} elseif ($v['type'] == 'password' && $mode == 'add') {
						$this->CI->load->helper('email');
						if (isset($v['max']) && strlen($value) > $v['max']) {
							$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'MAX_LENGTH');
						} elseif (isset($v['max']) && strlen($value) < $v['min']) {
							$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'MIN_LENGTH');
						}
					}
				}
				if ($this->structure['fields'][$key]['type'] == 'editor') {
					$value = addslashes($value);
					$value = $this->FromBase($value);
					$value =  preg_replace('/\s/', ' ', $value);
					$_SESSION[$this->table]['filled'][$key] = $value;
				}
			}
		}
		foreach ($this->structure['fields'] as $key=>$value) {
			if ($this->structure['fields'][$key]['type'] == 'image' || $this->structure['fields'][$key]['type'] == 'file') {
				if (isset($this->structure['fields'][$key]['mand']) && $this->structure['fields'][$key]['mand'] == true && empty($_FILES[$key]['name']) && $mode == 'add') {
					$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'NO_FILE');	
				} elseif(!empty($_FILES[$key]['name'])) {
					$extention = $this->getExtention($_FILES[$key]['name']);
					if (isset($this->structure['fields'][$key]['extentions']) && $this->structure['fields'][$key]['extentions'] != '*') {
						if (!in_array($extention, $this->structure['fields'][$key]['extentions'])) {
							$this->layout['errors'][] = array('name' => $this->structure['fields'][$key]['value'], 'type' => 'EXTENTION');
						}
					}
				}
			}
		}
		if (count($this->layout['errors']) == 0) {
			return true;
		} else {
			$_SESSION[$this->table]['errors'] = $this->CI->load('admin/error', $this->layout);
			return false;
		}

	}
	
	public function move_up() {
		$cond = '';
		if (isset($this->structure['where'])) {
			foreach ($this->structure['where'] as $node) {
				$cond .= $node[0].' "'.$node[1].'" AND';
			}
		}
		$current_order = $this->CI->db->query('SELECT * FROM '.$this->table.' WHERE '.$cond.' '.$this->table.'_id = "'.(int)$this->CI->uri->segment(5).'"')->row()->__order;
		$larger_order = $this->CI->db->query('SELECT * FROM '.$this->table.' WHERE '.$cond.' __order < "'.(int)$current_order.'" ORDER BY __order DESC LIMIT 0,1')->row();
		if ($larger_order == false) {
			return false;	
			header('location: /admin/index/'.$this->alias_talbe.'/'.$this->CI->uri->segment(6));
		}
		$this->CI->db->query('UPDATE '.$this->table.' SET __order = '.$larger_order->__order.' WHERE __order = '.$current_order);
		$large_table_id = $this->table.'_id';
		$this->CI->db->query('UPDATE '.$this->table.' SET __order = '.$current_order.' WHERE '.$this->table.'_id = '.$larger_order->$large_table_id);
		header('location: /admin/index/'.$this->alias_talbe.'/'.$this->CI->uri->segment(6));	
	}
	
	public function move_down() {
		$cond = '';
		if (isset($this->structure['where'])) {
			foreach ($this->structure['where'] as $node) {
				$cond .= $node[0].' "'.$node[1].'" AND';
			}
		}
		$current_order = $this->CI->db->query('SELECT * FROM '.$this->table.' WHERE '.$cond.' '.$this->table.'_id = "'.(int)$this->CI->uri->segment(5).'"')->row()->__order;
		$larger_order = $this->CI->db->query('SELECT * FROM '.$this->table.' WHERE '.$cond.' __order > "'.(int)$current_order.'" ORDER BY __order  LIMIT 0,1')->row();
		if ($larger_order == false) {
			return false;	
			header('location: /admin/index/'.$this->alias_talbe.'/'.$this->CI->uri->segment(6));
		}
		$this->CI->db->query('UPDATE '.$this->table.' SET __order = '.$larger_order->__order.' WHERE __order = '.$current_order);
		$large_table_id = $this->table.'_id';
		$this->CI->db->query('UPDATE '.$this->table.' SET __order = '.$current_order.' WHERE '.$this->table.'_id = '.$larger_order->$large_table_id);
		header('location: /admin/index/'.$this->alias_talbe.'/'.$this->CI->uri->segment(6));	
	}
	
	public function delete_file() {
		if (empty($_REQUEST['data'])) {
			header('location: /admin/');
			return false;
		}
		$data = (array)json_decode(base64_decode($_REQUEST['data']));
		@unlink($data['url']);
		$this->CI->db->query('UPDATE '.$data['table'].' SET '.$data['field'].' = "" WHERE '.$data['table'].'_id = '.$data['id']);
		header('location: /admin/index/'.$data['table'].'/edit_item/'.$data['id'].'/0/');
	}
	
	private function getExtention($filename) {
	    return strtolower(end(explode(".", $filename)));
	}
	
	private function getMain() {
		$fields = array();
		foreach ($this->structure['fields'] as $key=>$node) {
			
			if (isSet($node['main'])) { 
				if (!isset($node['width'])) {
					$node['width'] = '';
				}
				$global_arr = array();
				if ($node['type'] == 'select' && isset($node['from']['mode']) && $node['from']['mode'] == 'from_table') {
					#$this->CI->db->stop_cache();
					#$this->CI->db->select($node['from']['data']['fields']);
					#$this->CI->db->order_by($node['from']['data']['order_by'], $node['from']['data']['order_type']);
					$arr = array();
					if (isset($node['from']['data']['where'])) {
						foreach ($node['from']['data']['where'] as $item) {
							$arr[] = implode(' ', $item);
						}
					}
					if (count($arr) > 0) {
						$str = 'WHERE '.implode(' AND ', $arr);
					} else {
						$str = '';
					}
					$query = $this->CI->db->query('SELECT '.implode(',', $node['from']['data']['fields']).' FROM
					'.$node['from']['data']['table'].' '.$str.' ORDER BY '.$node['from']['data']['order_by'].' '.$node['from']['data']['order_type']);
					
					foreach ($query->result() as $row) {
						$arr = (array)$row;
						$property = array();
						foreach ($arr as $k=>$v) {
							$property[] = $v;	
						}
						$global_arr[$property[0]] = $property[1];
					}
					
				} 
			
				if (isSet($node['display'])) {
					if ($node['type'] == 'expression') {
						if (isSet($this->structure['joins'])) {
				 			foreach ($this->structure['joins'] as $join) {
				 				$node['exp'] = str_replace('this', $this->table, $node['exp']);
				 				$node['exp'] = str_replace('table', $join['table'], $node['exp']);
				 			}
						}
						
						$fields[$node['display']] = array('name'=>$node['exp'].' AS '.$node['display'], 'value'=>$node['value'], 
														  'width'=>$node['width'], 'type'=>$node['type']);
						if (!empty($node['list']) && !empty($node['alias'])) {
							$fields[$node['display']]['list'] = $node['list'];
							$fields[$node['display']]['alias'] = $node['alias'];
						} elseif (!empty($node['from']['mode']) && $node['from']['mode'] == 'simple_list') {
						$fields[$node['display']]['list'] =  array_keys($node['from']['values']);
						$fields[$node['display']]['alias'] = array_values($node['from']['values']);
						}
					} else {
						$fields[$node['display']] = array('name'=>$node['display'], 'value'=>$node['value'], 'width'=>$node['width'], 'type'=>$node['type']);
						if (!empty($node['list']) && !empty($node['alias'])) {
							$fields[$node['display']]['list'] = $node['list'];
							$fields[$node['display']]['alias'] = $node['alias'];
						} elseif (!empty($node['from']['mode']) && $node['from']['mode'] == 'simple_list') {
							$fields[$node['display']]['list'] =  array_keys($node['from']['values']);
							$fields[$node['display']]['alias'] = array_values($node['from']['values']);
						}
					}
					if (count($global_arr) > 0) {
						$fields[$node['display']]['list'] =  array_keys($global_arr);
						$fields[$node['display']]['alias'] = array_values($global_arr);
					}
				} else {
					$fields[$this->table.'.'.$key] = array('name'=>$this->table.'.'.$key, 'value'=>$node['value'], 'width'=>$node['width'], 'type'=>$node['type']);
					if (!empty($node['list']) && !empty($node['alias'])) {
						$fields[$this->table.'.'.$key]['list'] = $node['list'];
						$fields[$this->table.'.'.$key]['alias'] = $node['alias'];
					} elseif (!empty($node['from']['mode']) && $node['from']['mode'] == 'simple_list') {
						$fields[$this->table.'.'.$key]['list'] =  array_keys($node['from']['values']);
						$fields[$this->table.'.'.$key]['alias'] = array_values($node['from']['values']);
					}
					if (count($global_arr) > 0) {
						$fields[$this->table.'.'.$key]['list'] =  array_keys($global_arr);
						$fields[$this->table.'.'.$key]['alias'] = array_values($global_arr);
					}
				}
			}
		}
		if ($this->CI->Pers->checkAcess($this->uid, $this->table, 2) && !isset($this->structure['no_owner'])) {
			$fields['__users.user_name'] = array('name'=>'__users.user_name', 'value'=>'Автор', 'width'=>'8%');
		}
		return $fields;
	}
	
	function delete_nodes() {
		if (is_array($_POST['delete'])) {
			$ids = implode(',', $_POST['delete']);
			$this->CI->db->query('DELETE FROM '.$this->table.' WHERE '.$this->structure['table_id'].' IN ('.$ids.')');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	private function inJoins($key) {
		if (isset($this->structure['joins'])) {
			foreach ($this->structure['joins'] as $join) {
				if (strpos($key, $join['table']) !== false) {
					return true;
				}
			}
		}
		return false;
	}
	
	private function encodestring($st) {
		$tr = array(
		"Ґ"=>"G","Ё"=>"YO","Є"=>"E","Ї"=>"YI","І"=>"I",
		"і"=>"i","ґ"=>"g","ё"=>"yo","№"=>"#","є"=>"e",
		"ї"=>"yi","А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
		"Д"=>"D","Е"=>"E","Ж"=>"ZH","З"=>"Z","И"=>"I",
		"Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
		"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
		"У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
		"Ш"=>"SH","Щ"=>"SCH","Ъ"=>"'","Ы"=>"YI","Ь"=>"",
		"Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
		"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"zh",
		"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
		"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
		"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
		"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"'",
		"ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", " "=>'_'
		);
		$st = strtr($st, $tr);
		return $st;
	} 
	
	function FromBase($content) {
        if (is_array($content))
        {
            for ($i=0; $i<count($content); $i++){
                $content[$i] = $this->RestoreHtml($content[$i]);
            }
            return $content;
        } else {
            $content = $this->RestoreHtml($content);
            return $content;
        }
    }

    function RestoreHtml($content) {
        $content = str_replace("&amp;",          "&",         $content);
        $content = str_replace('&quot;',         '"',         $content);
        $content = str_replace("&#039;",         "'",         $content);
        $content = str_replace("&lt;",           "<",         $content);
        $content = str_replace("&gt;",           ">",         $content);
        return $content;
    }
}
?>