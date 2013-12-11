<?php

class Area_Model extends Model
{
	function __construct() {
		parent::Model();
	}
	
	function admin_is_authed($direct_param='') {
		if (isset($_COOKIE['admin_is_authed'])) {
			$param = $_COOKIE['admin_is_authed'];
		} elseif (isset($_SESSION['admin_authed'])) {
			$param = $_SESSION['admin_authed'];
		} else {
			$param = $direct_param;
		}
		$user = $this->db->query('SELECT * FROM site_admins WHERE MD5(CONCAT(admin_login, "sold1251_abc7")) = '.$this->db->escape($param))->row();
    	if (empty($user->site_admins_id)) {
    		return false;
    	} else {
    		return $user;
    	}
	}
	
	function admin_auth($login, $password, $remember=false) {
		$secretkey = '78e38e8d92dbc9b121f4e75d176f9cdd4a8cec35593a986b6c1dbebd014959a2';
		$token = md5(strval(time()).$secretkey);
		
		$query = $this->db->query('SELECT * FROM `site_admins` WHERE `admin_login` = '.$this->db->escape($login).' AND `admin_password` = "'.md5($password).'"');
		if ($query->num_rows() == 0) {
			return 'no_user';
		} else {
			$this->db->query('UPDATE site_admins SET token="'.$token.'" WHERE admin_login = '.$this->db->escape($login).' AND admin_password = "'.md5($password).'"');
			$query = $this->db->query('SELECT * FROM site_admins WHERE admin_login = '.$this->db->escape($login).' AND admin_password = "'.md5($password).'"');
			
			setcookie('admin_is_authed', md5($query->row()->admin_login."sold1251_abc7"), time()+60*60*24*60, '/');
			$_SESSION['admin_authed'] = md5($query->row()->admin_login."sold1251_abc7");
			
			return $query->row(); 
		}
	}
	
	function authByToken($token) {
		$query = $this->db->query('SELECT * FROM `site_admins` WHERE token = '.$this->db->escape($token));
		if ($query->num_rows() == 0) {
			return 'no_user';
		} else {
			$value = md5($query->row()->admin_login."sold1251_abc7");
			setcookie('is_authed', $value, time()+3600*24*7*30*3, '/');
			$_SESSION['user_authed'] = $value;
			return $query->row();
		}

	}
	
	function getJobs($cond) {
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
			$where = 'WHERE ' . implode(' '.$cond.' ', $where).' AND ((DATE_SUB(CURDATE(),INTERVAL 365 DAY) <= job_end_date) OR (job_end_date = "0000-00-00"))';
		} else {
			$where = 'WHERE (DATE_SUB(CURDATE(),INTERVAL 365 DAY) <= job_end_date)  OR (job_end_date = "0000-00-00")';
		}
		$qstr = 'SELECT *, DATE_FORMAT(job_start_date, "%m/%d/%Y") AS start, 
		DATE_FORMAT(job_end_date, "%m/%d/%Y") AS end FROM job '.$where.' ORDER BY job_id DESC LIMIT 300';
		
		$query = $this->db->query($qstr);
		
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return $arr;  
	}
	
	function changeTable() {
		if (empty($_REQUEST['data'])) {
			return false;
		}
		$data = $_REQUEST['data'];
		if ($_REQUEST['field'] == 'job_start_date' || $_REQUEST['field'] == 'job_end_date') {
			$data = explode('/', mysql_real_escape_string($data));
			$data = $data[2].'-'.$data[0].'-'.$data[1];
		}
		$this->db->query('UPDATE job SET '.$_REQUEST['field'].' = "'.mysql_real_escape_string($data).'" 
		WHERE job_id = "'.(int)$_REQUEST['id'].'"');
	}
	
	function genExcel() {
		require_once $_SERVER['DOCUMENT_ROOT']."/system/application/libraries/Spreadsheet/excel/Writer.php";
		$xls = new Spreadsheet_Excel_Writer(); 
		$xls->send("report.xls"); 
		$sheet = $xls->addWorksheet('Report'); 
		
		//$sheet->setInputEncoding('CP1251');
		$titleFormat = $xls->addFormat(); 
		$titleFormat->setBold(); 
		$sheet->write(0,0, "PO Number", $titleFormat); 
		$sheet->write(0,1, "Job Name", $titleFormat); 
		$sheet->write(0,2, "SO #", $titleFormat); 
		$sheet->write(0,3, "Date Paperwork Rec", $titleFormat); 
		$sheet->write(0,4, "Est. Ship Date", $titleFormat); 
		$sheet->write(0,5, "Tracking Info", $titleFormat); 
		$sheet->write(0,6, "Carrier Name", $titleFormat); 
		$sheet->write(0,7, "Office Name", $titleFormat); 
		$sheet->setColumn(0,0,15);
		$sheet->setColumn(0,1,30);
		$sheet->setColumn(0,2,15);
		$sheet->setColumn(0,3,20);
		$sheet->setColumn(0,4,20);
		$sheet->setColumn(0,5,40);
		$sheet->setColumn(0,6,20);
		$sheet->setColumn(0,7,40);
		$data = $this->db->query('SELECT *, DATE_FORMAT(job_start_date, "%m/%d/%Y") AS start, 
		DATE_FORMAT(job_end_date, "%m/%d/%Y") AS end FROM job JOIN office ON (job.job_rep = office.office_desc)
		WHERE (DATE_SUB(CURDATE(),INTERVAL 365 DAY) <= job_end_date)  OR (job_end_date = "0000-00-00")
		GROUP BY job_id
		ORDER BY job_id DESC');
		$i=1;
		foreach ($data->result() as $node) {
			$titleFormat =& $xls->addFormat(); 
			$sheet->write($i,0, $node->job_po, $titleFormat); 
			$sheet->write($i,1, $node->job_name, $titleFormat); 
			$sheet->write($i,2, $node->job_so, $titleFormat); 
			$sheet->write($i,3, $node->start, $titleFormat); 
			$sheet->write($i,4, $node->end, $titleFormat); 
			$sheet->write($i,5, $node->job_info, $titleFormat); 
			$sheet->write($i,6, $node->job_carrier, $titleFormat); 
			$sheet->write($i,7, $node->office_desc, $titleFormat); 
			$i++;
		}
		$xls->close();
	}
	
	function addJob() {
		
		if (!empty($_REQUEST['job_start_date'])) {
			$from = explode('/', mysql_real_escape_string($_REQUEST['job_start_date']));
			$from = $from[2].'-'.$from[0].'-'.$from[1];
		} else {
			$from = '0000-00-00';
		}
		if (!empty($_REQUEST['job_end_date'])) {
			$to = explode('/', mysql_real_escape_string($_REQUEST['job_end_date']));
			$to = $to[2].'-'.$to[0].'-'.$to[1];
		} else {
			$to = '0000-00-00';
		}
		if (empty($_REQUEST['other_text'])) {
			$carrier = $_REQUEST['job_carrier'];
		} else {
			$carrier = $_REQUEST['other_text'];
		}
		$job_info = implode(', ',$_REQUEST['job_info']);
		$this->db->query('INSERT INTO job VALUES(null, "'.mysql_real_escape_string($_REQUEST['job_po']).'", "'.mysql_real_escape_string($_REQUEST['job_name']).'",
		"'.mysql_real_escape_string($_REQUEST['job_so']).'", "'.mysql_real_escape_string($from).'", "'.mysql_real_escape_string($to).'",
		"'.mysql_real_escape_string($job_info).'", "'.mysql_real_escape_string($_REQUEST['job_rep']).'",
		"'.$carrier.'")');
		$id = $this->db->insert_id();
		if (!empty($_REQUEST['notes'])) {
			$_REQUEST['notes'] = substr($_REQUEST['notes'], 3, strlen($_REQUEST['notes']));
			$arr = explode('___', $_REQUEST['notes']);
			foreach ($arr as $node) {
				$this->db->query('INSERT INTO note VALUES (null, "'.(int)$id.'", CURRENT_DATE, "'.mysql_real_escape_string(nl2br($node)).'")');
			}
		}
		
		foreach ($_FILES as $file) {
			if (is_uploaded_file($file['tmp_name'])) {
				$rand = rand(0,100000);
				move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/source/files/main_files/'.$rand.'_'.$file['name']);
				$this->db->query('INSERT INTO attachment VALUES (null, "'.$id.'", "'.mysql_real_escape_string($rand.'_'.$file['name']).'", CURRENT_DATE)');
			}
		}
		$_SESSION['new_id'] = false;
	}
	
	function getJob($id) {
		$data = $this->db->query('SELECT *, DATE_FORMAT(job_start_date, "%m/%d/%Y") AS start, 
		DATE_FORMAT(job_end_date, "%m/%d/%Y") AS end FROM job WHERE job_id = "'.(int)$id.'"')->row();
		if (empty($data->job_id)) {
			return false;
		} else {
			if (!in_array($data->job_carrier, array('Daylight', 'Daylight', 'FedEx National', 'FedEx Freight', 'FedEx Ground', 'UPS'))) {
				$data->custom = true;
			}
			$data->job_info = explode(', ', $data->job_info);
			$data->job_info_first = $data->job_info[0];
			array_shift($data->job_info);
			return $data;
		}
	}
	
	function deleteJob($id) {
		$this->db->query('DELETE FROM job WHERE job_id ="'.(int)$id.'"');
	}
	
	function editJob($id) {
		if (!empty($_REQUEST['job_start_date'])) {
			$from = explode('/', mysql_real_escape_string($_REQUEST['job_start_date']));
			$from = $from[2].'-'.$from[0].'-'.$from[1];
		} else {
			$from = '';
		}
		if (!empty($_REQUEST['job_end_date'])) {
			$to = explode('/', mysql_real_escape_string($_REQUEST['job_end_date']));
			$to = $to[2].'-'.$to[0].'-'.$to[1];
		} else {
			$to = '';
		}
		if (empty($_REQUEST['other_text'])) {
			$carrier = $_REQUEST['job_carrier'];
		} else {
			$carrier = $_REQUEST['other_text'];
		}
		$job_info = implode(', ',$_REQUEST['job_info']);
		$this->db->query('UPDATE job SET job_po = "'.mysql_real_escape_string($_REQUEST['job_po']).'", job_name = "'.mysql_real_escape_string($_REQUEST['job_name']).'",
		job_so = "'.mysql_real_escape_string($_REQUEST['job_so']).'", job_start_date = "'.mysql_real_escape_string($from).'",
		job_end_date = "'.mysql_real_escape_string($to).'", job_info = "'.mysql_real_escape_string($job_info).'",
		job_rep = "'.mysql_real_escape_string($_REQUEST['job_rep']).'",
		job_carrier = "'.mysql_real_escape_string($carrier).'"
		WHERE job_id = '.(int)$id);

	}
	
	function getAt($job_id) {
		$query = $this->db->query('SELECT *, DATE_FORMAT(date, "%m/%d/%Y") AS correct_date FROM attachment WHERE job_id = "'.(int)$job_id.'"');
		$arr = array();
		foreach ($query->result() as $node) {
			$arr[] = $node;
		}
		return $arr;
	}
	
	function getReps() {
		$query = $this->db->query('SELECT * FROM office ORDER BY office_desc');
		$arr = array();
		foreach ($query->result() as $node) {
			$node->office_desc = str_replace('&amp;', '&', $node->office_desc);
			$arr[] = $node;
		}
		return $arr;
	}
	
	function addAt($job_id) {
		if (isset($_FILES['at']) && is_uploaded_file($_FILES['at']['tmp_name'])) {
			$rand = rand(0,100000);
			move_uploaded_file($_FILES['at']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/source/files/main_files/'.$rand.'_'.$_FILES['at']['name']);
			$this->db->query('INSERT INTO attachment VALUES (null, "'.(int)$job_id.'", "'.mysql_real_escape_string($rand.'_'.$_FILES['at']['name']).'", CURRENT_DATE)');
		}
	}
	
	function deleteAt($id) {
		$this->db->query('DELETE FROM attachment WHERE id = "'.(int)$id.'"');
	}
	
	function addNote($job_id) {
		if (!empty($_REQUEST['note'])) {
			$this->db->query('INSERT INTO note VALUES (null, "'.(int)$job_id.'", CURRENT_DATE, "'.mysql_real_escape_string(nl2br($_REQUEST['note'])).'")');
		}
	}
	
	function getNotes($job_id) {
		$query = $this->db->query('SELECT *, DATE_FORMAT(note_date, "%m/%d/%Y") AS correct_date FROM note WHERE job_id = "'.(int)$job_id.'"');
		$arr = array();
		foreach ($query->result() as $node) {
			$node->note_text = strip_tags($node->note_text);
			$arr[] = $node;
		}
		return $arr;
	}
	
	function deleteNote($id) {
		$this->db->query('DELETE FROM note WHERE note_id = "'.(int)$id.'"');
	}
}