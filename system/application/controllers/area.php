<?php

class Area extends SmartyController {

	private $layout;
	
	function __construct() {
		parent::__construct();	
		@session_start();
		$this->load->model('Content_Model');
		$this->load->model('Area_Model');
		$this->CI =& get_instance();
		$this->layout['meta'] = $this->Content_Model->getMeta();
		$this->layout['admin_info'] = $this->Area_Model->admin_is_authed();
	}
	
	function auth() {
		if (isset($_COOKIE['admin_is_authed'])) {
			header('location: /area/main/');
		}
		if ($this->input->post('login')) {
			$auth = $this->Area_Model->admin_auth($this->input->post('login'), $this->input->post('password'));
			if ($auth == 'no_user') {
				echo 'You have entered an incorrect username or password';
				return;
			}
			echo 'success';
		} else {
			$this->layout['section'] = 'auth_form';
			$this->smarty('area', $this->layout);
		}
	}
	
	function main() {
		if (!$this->layout['admin_info']) {
			header('location: /area/auth/');
		}
		$this->layout['section'] = 'main_area';
		if (empty($_REQUEST['cond']) || !in_array($_REQUEST['cond'], array('or', 'and'))) {
			$this->layout['cond'] = 'or';
		} else {
			$this->layout['cond'] = $_REQUEST['cond'];
		}
		if (isset($_REQUEST['search'])) {
			$this->layout['name'] = $_REQUEST['search'];
			$this->layout['cond'] = $_REQUEST['cond'];
			$this->layout['from'] = $_REQUEST['from'];
			$this->layout['to'] = $_REQUEST['to'];
		}
		$this->layout['s'] = $this->Area_Model->getJobs($this->layout['cond']);
		$this->smarty('area', $this->layout);
	}
	
	function change_table() {
		if (!$this->layout['admin_info']) {
			header('location: /area/auth/');
		}
		$this->Area_Model->changeTable();
	}
	
	function get_select() {
		$this->layout['reps'] = $this->Area_Model->getReps();
		$this->layout['selected'] = $_REQUEST['selected'];
		$this->smarty('offices_select', $this->layout);
	}
	
	function logout() {
		unset($_SESSION['admin_info']);
		unset($_SESSION['admin_authed']);
		setcookie('admin_is_authed', '', time(), '/');
		header('location: /area/main/');
	}
	
	function excel() {
		$this->Area_Model->genExcel();
	}
	
	function add_new() {
	
		if (isset($_REQUEST['job_name'])) {
			$this->Area_Model->addJob();
			header('location: /area/main/');
		}
		if (empty($_SESSION['new_id']) || !$_SESSION['new_id']) {
			$_SESSION['new_id'] = rand(1,10000);
		}
		$this->layout['new_id'] = $_SESSION['new_id'];
		$this->layout['reps'] = $this->Area_Model->getReps();
		$this->layout['cond'] = 'or';
		$this->layout['section'] = 'add_new';
		$this->layout['current_date'] = date('m/d/Y');
		$this->layout['at'] =  $this->Area_Model->getAt($_SESSION['new_id']);
		$this->layout['notes'] = $this->Area_Model->getNotes($_SESSION['new_id']);
		$this->smarty('area', $this->layout);
	}
	
	function delete_job($id) {
		$this->Area_Model->deleteJob($id);
		header('location: /area/main/');
	}
	
	function edit_job($id=0) {
		if (!is_numeric($id) || $id <=0) {
			return false;
		}
		if (isset($_REQUEST['job_name'])) {
			$this->layout['edited'] = true;
			$this->Area_Model->editJob($id);
			
		}
		$this->Area_Model->addAt($id);
		$this->Area_Model->addNote($id);
		if (!empty($_REQUEST['go'])) {
			header('location: /area/main/');
			return true;
		}
		$this->layout['reps'] = $this->Area_Model->getReps();
		$this->layout['at'] =  $this->Area_Model->getAt($id);
		$this->layout['cond'] = 'or';
		$this->layout['notes'] = $this->Area_Model->getNotes($id);
		$this->layout['width'] = count($this->layout['notes'])*421;
		$this->layout['job'] = $this->Area_Model->getJob($id);
		$this->layout['section'] = 'edit_job';
		$this->smarty('area', $this->layout);
	}
	
	function add_attachment($job_id, $mode) {
		$this->Area_Model->addAt($job_id);
		header('location: /area/'.$mode.'/'.$job_id.'/');
	}
	
	function delete_attachment($job_id, $id, $mode) {
		$this->Area_Model->deleteAt($id);
		header('location: /area/'.$mode.'/'.$job_id.'/');
	}
	
	function add_note($job_id, $mode) {
		$this->Area_Model->addNote($job_id);
		header('location: /area/'.$mode.'/'.$job_id.'/');
	}
	
	function delete_note($id) {
		$this->Area_Model->deleteNote($id);
	}

}
