<?php
class Admin_Model extends Model
{
	
	function __construct() {
		parent::Model();
		$this->load->database();
	}
	
	function auth($login, $password) {
		$query = $this->db->query('SELECT __users_id as is_auth FROM __users 
		WHERE user_name = '.$this->db->escape($login).' AND user_pass = "'.$password.'"');
		if ($query->num_rows() == 0) {
			return false;
		}
		setcookie('authed', 'yes', time()+1000000, '/');
		return $query->row()->is_auth;
	}
	
	function getOptions() {
		$query = $this->db->query('SELECT * FROM config');
		$arr = array();
		foreach ($query->result() as $row) {
			$arr[$row->name] = htmlspecialchars($row->value);
		}
		return $arr;
	}
	
	function saveOptions() {
		
		foreach ($_POST as $key=>$value) {
			if ($key == 'save') {
				continue;
			}
			$this->db->query('UPDATE config SET value = "'.mysql_real_escape_string($this->FromBase($value)).'"  WHERE name = "'.$key.'"');
		}
	}
	
	function getStats() {
	$data['accounts_client_count'] = $this->db->query("SELECT COUNT(accounts_id) as total FROM accounts WHERE type=1")->row()->total;
	$data['accounts_std_count'] = $this->db->query("SELECT COUNT(accounts_id) as total FROM accounts WHERE type=2 AND is_pro=0")->row()->total;
	$data['accounts_pro_count'] = $this->db->query("SELECT COUNT(accounts_id) as total FROM accounts WHERE type=2 AND is_pro=1")->row()->total;


	$data['files_size'] = $this->sizeFormat($this->getDirectorySize($_SERVER['DOCUMENT_ROOT'].'/source/files'));


	$data['db_size'] = 0;
	$data['idx_size'] = 0;
	$query = $this->db->query("SHOW TABLE STATUS FROM freelancer_new");
	foreach ($query->result() as $node)	{
		$data['db_size'] += $node->Data_length;
		$data['idx_size'] += $node->Index_length;
	}
	$data['db_size'] += $data['idx_size'];
	$data['db_size'] = $this->sizeFormat($data['db_size']);
	$data['safe_seals_count'] = $this->db->query("SELECT COUNT(purchases_id) as total FROM purchases WHERE p_type=5")->row()->total;
	$data['paidarea_count'] = $this->db->query("SELECT COUNT(accounts_id) as total FROM accounts WHERE in_paid_area=1")->row()->total;
	$data['banners_count'] = $this->db->query("SELECT COUNT(B.banners_id) as total FROM banners B 
	WHERE B.account_id > 0 AND IF(B.duration > 0, UNIX_TIMESTAMP(DATE_ADD(B.start_date, INTERVAL B.duration DAY)) - UNIX_TIMESTAMP(NOW()), 0) >= 0")->row()->total;
	return $data;
	}
	
	function getDirectorySize($path)
	{
	  $totalsize = 0;
	  if ($handle = opendir ($path))
	  {
	    while (false !== ($file = readdir($handle)))
	    {
	      $nextpath = $path . '/' . $file;
	      if ($file != '.' && $file != '..' && !is_link ($nextpath))
	      {
	        if (is_dir ($nextpath))
	        {
	          $result = $this->getDirectorySize($nextpath);
	          $totalsize += $result;
	        }
	        elseif (is_file ($nextpath))
	        {
	          $totalsize += filesize ($nextpath);
	        }
	      }
	    }
	  }
	  closedir ($handle);
	  return  $totalsize;
	}
	
	function sizeFormat($size)
	{
	    if($size<1024)
	    {
	        return $size." bytes";
	    }
	    else if($size<(1024*1024))
	    {
	        $size=round($size/1024,1);
	        return $size." KB";
	    }
	    else if($size<(1024*1024*1024))
	    {
	        $size=round($size/(1024*1024),1);
	        return $size." MB";
	    }
	    else
	    {
	        $size=round($size/(1024*1024*1024),1);
	        return $size." GB";
	    }
	
	}
}