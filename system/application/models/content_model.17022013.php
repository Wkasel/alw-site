<?php

class Content_Model extends Model
{
	function __construct() {
		parent::Model();
	}
	
	function runQuery() {
		#$this->db->query("ALTER TABLE  images_on_main     ADD COLUMN `__order` INT DEFAULT '0' NULL");
		#$this->db->query("update images_on_main     set __order = images_on_main_id");
	}
	
	function imagesOnMain() {
		$query = $this->db->query('SELECT * FROM images_on_main ORDER BY __order');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node; 
		}
		return $arr;
	}
	
	function productsOnMain() {
		$query = $this->db->query('SELECT * FROM products_on_main LIMIT 0,2');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node; 
		}
		return $arr;
	}
	
	function getAllProductsOut() {
		$query = $this->db->query('SELECT * FROM products ORDER BY products_id');
		$arr = array();
		foreach ($query->result() as $node) {
			$node->p_desc = strip_tags($this->FromBase($node->p_desc));
			$arr[] = $node; 
		}
		$pom = $this->imagesOnMain();
		$featured = $this->getFeatured();
		$custom = $this->getCustom();
		
		return array($arr, $pom, $featured, $custom);
	}
	
	function getElement($element) {
		$data = $this->db->query('SELECT * FROM pages WHERE pages_systemname = "'.$element.'"')->row();
		if (!empty($data->pages_id)) {
			$data->pages_content = strip_tags($this->FromBase($data->pages_content));
			return $data;
		} else {
			return false;
		}
	}
	
	function getFeatured() {
		$query = $this->db->query('SELECT * FROM featured ORDER BY __order');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node; 
		}
		return $arr;
	}
	
	function getFeaturedProdOffset($offset) {
		$offset--;
		$obj = $this->db->query('SELECT * FROM featured ORDER BY featured_id LIMIT '.(int)$offset.', 1')->row();
		if (empty($obj->featured_id)) {
			return false;
		} else {
			$arr = array();
			foreach ($obj as $key=>$node) {
				if ((strpos($key, 'p_image') !== false) && !empty($node)) {
					$arr[] = $node;
				}
			}
			$obj->p_desc = $this->FromBase($obj->p_desc);
			$obj->images = $arr;
			$obj->total_images = count($arr);
			$obj->reversed_images = array_reverse($arr);
			return $obj;
		}
	}
	
	function getProjectOffset($offset) {
		$offset--;
		$obj = $this->db->query('SELECT * FROM project ORDER BY project_id LIMIT '.(int)$offset.', 1')->row();
		if (empty($obj->project_id)) {
			return false;
		} else {
			$obj->p_desc = $this->FromBase($obj->p_desc);
			$arr = array();
			foreach ($obj as $key=>$node) {
				if ((strpos($key, 'p_image') !== false) && !empty($node)) {
					$arr[] = $node;
				}
			}
			$obj->images = $arr;
			$obj->total_images = count($arr);
			$obj->reversed_images = array_reverse($arr);
			return $obj;
		}
	}
	
	function getFeaturedCount() {
		return $this->db->query('SELECT COUNT(*) AS total FROM featured')->row()->total;
	}
	
	function getProjectCount() {
		return $this->db->query('SELECT COUNT(*) AS total FROM project')->row()->total;
	}
	
	
	
	function getCustom() {
		$query = $this->db->query('SELECT * FROM project ORDER BY __order');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node; 
		}
		return $arr;
	}
	
	function getCats() {
		$query = $this->db->query('SELECT * FROM product_cats ORDER BY __order');
		$arr = array();
		foreach ($query->result() as $node) {
			$node->pc_name = strtolower($node->pc_name);;
			$arr[] = $node; 
		}
		return $arr;
	}
	
	function getPage($name) {
		$query = $this->db->query('SELECT pages_title, pages_content
		FROM pages WHERE pages_systemname = "'.mysql_real_escape_string($name).'"')->row();
		if (empty($query->pages_title)) {
			return false;
		}
		return array('title'=>$query->pages_title, 'content'=>$this->FromBase($query->pages_content));
	}
	
	function auth($login, $password, $remember=false) {
		$query = $this->db->query('SELECT office_id, reps_login FROM office 
		WHERE reps_login = '.$this->db->escape($login).' AND reps_password = "'.md5($password).'"');
		if ($query->num_rows() == 0) {
			return 'no_user';
		}
		$value = md5($query->row()->reps_login."sold1251_abc7");
		setcookie('is_authed', $value, time()+3600*24*7*30*3, '/');
		$_SESSION['user_authed'] = $value;
		return $query->row();
	}
	
	function is_authed($direct_param='') {
		if (isset($_COOKIE['is_authed'])) {
			$param = $_COOKIE['is_authed'];
		} elseif (isset($_SESSION['user_authed'])) {
			$param = $_SESSION['user_authed'];
		} else {
			$param = $direct_param;
		}
		$user = $this->db->query('SELECT * FROM office WHERE MD5(CONCAT(reps_login, "sold1251_abc7")) = '.$this->db->escape($param))->row();
    	if (empty($user->office_id)) {
    		return false;
    	} else {
    		return $user;
    	}
	}
	
	function getTeam() {
		$query = $this->db->query('SELECT * FROM team ORDER BY __order');
		$arr = array();
		foreach ($query->result() as $node) {
			$name = explode(' ', $node->t_name);
			$node->name = $name[0];
			$arr[$node->t_country][] = $node;
		}
		return $arr;
	}
	
	function getFiles($table, $dep_table, $id) {
		$query = $this->db->query('SELECT '.$table.'_name AS file_desc, '.$table.'_file AS file_name FROM '.$table.' 
		WHERE __dep_table = "'.$dep_table.'" AND __dep_id = "'.(int)$id.'"
		ORDER BY '.$table.'_id');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return $arr;
	}
	
	function getCommonMatrix() {
		$query = $this->db->query('SELECT * FROM file_storage WHERE file_desc LIKE "%Common%"');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return $arr;
	}
	
    function getObjectsBy($cat_name){
        $total = $this->db->query('SELECT COUNT(*) AS total FROM products JOIN product_cats ON (p_cat = product_cats_id)
        WHERE pc_name = "'.mysql_real_escape_string($cat_name).'"')->row()->total;
        $query = $this->db->query('SELECT * FROM products JOIN product_cats ON (p_cat = product_cats_id)
        WHERE pc_name = "'.mysql_real_escape_string($cat_name).'" ORDER BY products.__order');
        $arr = array();
        foreach ($query->result() as $node) {
            $arr[] = $node;
        }
        return array($total, $arr);
    }
    
	function getObjects($cat_name, $page) {
		$page = (int)$page;
		if ($page <= 0) {
			die('error');
		}
		$page--;
		
		$total = $this->db->query('SELECT COUNT(*) AS total FROM products JOIN product_cats ON (p_cat = product_cats_id)
		WHERE pc_name = "'.mysql_real_escape_string($cat_name).'"')->row()->total;
		$query = $this->db->query('SELECT * FROM products JOIN product_cats ON (p_cat = product_cats_id)
		WHERE pc_name = "'.mysql_real_escape_string($cat_name).'" ORDER BY products.__order LIMIT '.($page*10).', 10');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return array(ceil($total/10), $arr);
	}
	
	function searchObjects($page) {
		$page = (int)$page;
		if ($page <= 0) {
			die('error');
		}
		$page--;
		$key = mysql_real_escape_string($_REQUEST['keyword']);
		$total = $this->db->query('SELECT COUNT(*) AS total FROM products 
		WHERE p_name LIKE "%'.$key.'%"')->row()->total;
		$query = $this->db->query('SELECT * FROM products
		WHERE p_name LIKE "%'.$key.'%" OR p_name_ex LIKE "%'.$key.'%" ORDER BY products.__order  LIMIT '.($page*10).', 10');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return array(ceil($total/10), $arr);
	}
	
	function getCat($name) {
		$cat = $this->db->query('SELECT * FROM product_cats WHERE pc_name = "'.mysql_real_escape_string($name).'" OR product_cats_id = "'.(int)$name.'"')->row();
		if (empty($cat->product_cats_id)) {
			return false;
		} else {
			$cat->pc_name = strtolower($cat->pc_name);
			return $cat;
		}
	}
	
	function getRepsNav() {
		$query = $this->db->query('SELECT * FROM reps_cats ORDER BY __order');
		$arr = array();
		$first = true;
		foreach ($query->result() as $node) {
			$node->items = array();
			$sub = $this->db->query('SELECT * FROM reps_articles WHERE ra_cat = "'.$node->reps_cats_id.'" ORDER BY __order');
			foreach ($sub->result() as $subnode) {
				if ($first) {
					$id = $subnode->reps_articles_id;
					$first = false;
				}
				$node->items[] = $subnode;
			}
			$arr[] = $node;
		}
		return array($id, $arr);
	}
	
	function getRepsArticle($id) {
		if (!is_numeric($id) || $id <= 0) {
			die('404!');
		}
		$data =  $this->db->query('SELECT * FROM reps_articles WHERE reps_articles_id = "'.(int)$id.'"')->row();
		$data->ra_desc = $this->FromBase($data->ra_desc);
		return $data;
	}
	
	function makeSearch($cond, $info) {
		$info->reps_login = str_replace('&amp;', '&', $info->reps_login);
		$where = array();
		if (!empty($_REQUEST['search'])) {
			$s = mysql_real_escape_string($_REQUEST['search']);
			$where[] ='(job_name LIKE "%'.$s.'%" OR job_po LIKE "%'.$s.'%" OR job_so LIKE "%'.$s.'%")';
		}
		if (!empty($_REQUEST['from']) && $_REQUEST['from'] !='Date from') {
			$from = explode('/', mysql_real_escape_string($_REQUEST['from']));
			$from = $from[2].'-'.$from[0].'-'.$from[1];
			$where[] = 'job_start_date >=  "'.$from.'"';
		}
		if (!empty($_REQUEST['to']) && $_REQUEST['to'] !='Date to') {
			$to = explode('/', mysql_real_escape_string($_REQUEST['to']));
			$to = $to[2].'-'.$to[0].'-'.$to[1];
			$where[] = 'job_end_date <= "'.$to.'"';
		}
		
		if (count($where) > 0) {
			$cond = 'WHERE ' . implode(' '.$cond.' ', $where).'  AND 
			(job_rep = "'.$this->findOfficeName($info->reps_login).'" OR job_rep = "'.$info->reps_login.'")';
		} else {
			$cond = 'WHERE (job_rep = "'.$this->findOfficeName($info->reps_login).'" OR job_rep = "'.$info->reps_login.'")';
		}
		$cond .= ' AND ((DATE_SUB(CURDATE(),INTERVAL 365 DAY) <= job_end_date) OR (job_end_date = "0000-00-00"))';
		$query = $this->db->query('SELECT *, DATE_FORMAT(job_start_date, "%m/%d/%Y") AS start, 
		DATE_FORMAT(job_end_date, "%m/%d/%Y") AS end FROM job '.$cond);
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return $arr;  
	}
	
	function findOfficeName($rep) {
		$data = $this->db->query('SELECT office_desc FROM office WHERE reps_login = "'.$rep.'"')->row();
		$data->office_desc = str_replace('&amp;', '&', $data->office_desc);
		return $data->office_desc;
	}
	
	function findOffice() {
		$where = array();
		if (!empty($_REQUEST['country']) && $_REQUEST['country'] != 'all') {
			$where[] ='office_country = "'.mysql_real_escape_string($_REQUEST['country']).'"';
		}
		if (!empty($_REQUEST['state']) && $_REQUEST['state'] !='all') {
			$where[] = 'office_state =  "'.mysql_real_escape_string($_REQUEST['state']).'"';
		}
		if (count($where) > 0) {
			$where = 'WHERE ' . implode(' AND ', $where);
		} else {
			$where = '';
		}
		
		$query = $this->db->query('SELECT * FROM office '.$where.' ORDER BY office_state');
		$arr = array();
		foreach ($query->result() as $node) {
			$node->office_url = str_replace('http://', '', $node->office_url);
			if (strpos($node->office_url, 'mailto:') === false) {
				$node->office_link = 'http://'.$node->office_url;
			} else {
				$node->office_link = $node->office_url;
				$node->office_url = str_replace('mailto:', '', $node->office_url);
			}
			$node->office_address = $this->FromBase($node->office_address);
			$arr[] = $node;
		}
		return $arr;  
	}
	
	function getObject($id) {
		$obj = $this->db->query('SELECT * FROM products WHERE products_id = "'.(int)$id.'"')->row();
		if (empty($obj->products_id)) {
			return false;
		} else {
			$obj->p_desc = $this->FromBase($obj->p_desc);
			$arr = array();
			foreach ($obj as $key=>$node) {
				if ((strpos($key, 'p_image') !== false) && !empty($node) && ($key != 'p_image1')) {
					$arr[] = $node;
				}
			}
			$obj->images = $arr;
			$obj->total_images = count($arr);
			$obj->reversed_images = array_reverse($arr);
			return $obj;
		}
	}
	
	function getAllObjects() {
		$query = $this->db->query('SELECT * FROM products ORDER BY __order');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return $arr;
	}
	
	function getQuickShipObjects() {
		$query = $this->db->query('SELECT * FROM products WHERE quick_ship = 1 ORDER BY __order');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return $arr;
	}
	
	function getProject($id) {
		$obj = $this->db->query('SELECT * FROM project WHERE project_id = "'.(int)$id.'"')->row();
		if (empty($obj->project_id)) {
			return false;
		} else {
			$obj->p_desc = $this->FromBase($obj->p_desc);
			$arr = array();
			foreach ($obj as $key=>$node) {
				if ((strpos($key, 'p_image') !== false) && !empty($node)) {
					$arr[] = $node;
				}
			}
			$obj->images = $arr;
			$obj->total_images = count($arr);
			$obj->reversed_images = array_reverse($arr);
			return $obj;
		}
	}
	
	function getFeaturedProd($id) {
		$obj = $this->db->query('SELECT * FROM featured WHERE featured_id = "'.(int)$id.'"')->row();
		if (empty($obj->featured_id)) {
			return false;
		} else {
			$arr = array();
			foreach ($obj as $key=>$node) {
				if ((strpos($key, 'p_image') !== false) && !empty($node)) {
					$arr[] = $node;
				}
			}
			$obj->p_desc = $this->FromBase($obj->p_desc);
			$obj->images = $arr;
			$obj->total_images = count($arr);
			$obj->reversed_images = array_reverse($arr);
			return $obj;
		}
	}
	
	function getMeta() {
		
		$data_main = $this->db->query('SELECT * FROM meta_info WHERE meta_url = ""')->row();
		$arr = explode('/', $_SERVER['REQUEST_URI']);
		unset($arr[count($arr)-1]);
		if ($_SERVER['REQUEST_URI'] == '/') {
			return $data_main;
		}
		
		for ($i=0; $i<count($arr)+2; $i++) {
			$data = $this->db->query('SELECT * FROM meta_info WHERE meta_url LIKE "%'.implode('/', $arr).'%"');	
			if ($data->num_rows() > 0) {
				return $data->row();
			}
			unset($arr[count($arr)-1]);
		}
		return $data_main;
	}
	
	function sendMail() {
		$mail_text = 'You have recieved the message from SPECIFICATION REGISTRATION form<br />
		<b>Agency name</b> : '.$_REQUEST['Agency_Name'].'<br />
		<b>Date</b> : '.$_REQUEST['Date'].'<br />
		<b>Job name</b> : '.$_REQUEST['Job_Name'].'<br />
		<b>Specifier name</b> : '.$_REQUEST['specifier_name'].'<br />
		<b>Installation location</b> : '.$_REQUEST['Installation_Location'].'<br />
		<b>Buyer\'s name</b> : '.$_REQUEST['bname'].'<br />
		<b>Product description</b> : '.$_REQUEST['Product_Description'].'<br />
		<b>Appoximate date of purchase</b> : '.$_REQUEST['purchase'].'<br />
		<b>Approximate value @ Dealer Net</b> : '.$_REQUEST['dealer'].'<br />
		<b>Any other information</b> : '.$_REQUEST['other_info'].'<br /><br /><br />
		Site delivery system';
		$mails = $this->db->query('SELECT * FROM mails');
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From:  <no-reply@archltgworks.com>\r\n";
		foreach ($mails->result() as $row) {
			mail($row->mails_mail, 'SPECIFICATION REGISTRATION letter', $mail_text, $headers); 
		}
		mail($_REQUEST['copy_mail'], 'SPECIFICATION REGISTRATION letter', $mail_text, $headers); 
	}
	function getEventCalendar() {			$query = $this->db->query('SELECT * FROM event_calendar ORDER BY event_calendar_id DESC LIMIT 1');		$arr = array();				$flag = 0;		foreach ($query->result() as $node) {			$arr[] = $node;			$flag = 1;		}				if(!$flag) {					$node->event_calendar_content = 'No Event Calendar!';			$arr[] = $node;		}		return $arr;  	}
	function logout() {
		setcookie('is_authed', '', time(), '/');
		$_SESSION = array();
	}	
	
}