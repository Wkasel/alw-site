<?php
class Pers extends Model {
	
	function __construct() {
		parent::Model();
		$this->load->database();
	}
	
	function getGroups() {
		$query = $this->db->get('__groups');
		$arr = array();
		foreach ($query->result() as $row) {
			$arr[] = $row;
		}
		return $arr;
	}
	
	function getGroup($id) {
		$this->db->where('group_id', $id);
		return $this->db->get('__groups')->row();
	}
	
	function getModulesByGroup($group_id) {
		$this->db->where('group_id', $group_id);
		$query = $this->db->get('__permissions');
		$arr = array();
		foreach ($query->result() as $row) {
			$arr[$row->module_name] = $row;
		}
		return $arr;
	}
	
	function getModules ($arr, $uid) {
		$this->db->where('group_id', $this->getUserGroup($uid));
		$allowed = $this->db->get('__permissions');
		$arr2 = $arr;
		
		foreach ($allowed->result() as $row) {
			if (in_array($row->module_name, array_keys($arr2))) {
				unset($arr2[$row->module_name]);
			}
		}
		
		foreach ($arr2 as $key=>$value) {
			if (strpos($key,'skip_') === false) {
				unset($arr[$key]);
			}
		}
		return $arr;
	}
	
	function getUserGroup($uid) {
		return $this->db->query('SELECT user_pers FROM __users WHERE __users_id =  '.$this->db->escape($uid))->row()->user_pers;
	}
	
	function getGroupAccess($group_id, $module_name) {
		$this->db->where('group_id', $group_id);
		$this->db->where('module_name', $module_name);
		$result = $this->db->get('__permissions');
		return ($result == false) ? $result : $result->row()->group_pers;
	}
	
	function isAuthor($module, $id, $uid) {
		$user_group = $this->getUserGroup($uid);
		$access = $this->db->where('group_id', $user_group)->where('module_name', $module)->get('__permissions')->row()->group_pers;
		if ($access >= 3) {
			return true;
		} else {
			$owner = $this->db->where($module.'_id', $id)->get($module)->row()->__owner;
		    if ($owner != $uid) {
		    	return false;
		    } else {
		    	return true;
		    }
		}
	}
	
	
	function checkAcess($uid, $module, $type) {
		$group_id = $this->getUserGroup($uid);
		$query = $this->db->query('SELECT COUNT(*) AS total FROM __permissions WHERE group_id = '.(int)$group_id.' AND module_name = '.$this->db->escape($module).' AND group_pers >= "'.$type.'"');
		return $query->row()->total;
	}
}