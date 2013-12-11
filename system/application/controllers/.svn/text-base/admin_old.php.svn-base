<?php
class Admin extends SmartyController {

	private $title;
	private $content;
	private $layout;
	private $uid;
	
	function __construct() {
		parent::Controller();
		$this->title = '';
		$this->content = '';
		$this->CI =& get_instance();
		$this->load->database();
		
		$this->load->library('session');
		$this->load->model('Pers');
		$this->load->model('Admin_Model');
		if ((($this->uid = $this->auth()) != false) && $this->input->post('login')) {
			$this->session->set_userdata(array('uid'=>$this->uid, 'login'=>$this->input->post('login'), 'password'=>md5($this->input->post('password'))));
		}
		$this->layout['user_name'] = $this->session->userdata('login');
		$this->load->config('atomic');
		$this->load->helper('url');
		$this->layout['modules'] = array();
		foreach ($this->config->config['menu_items'] as $k=>$v) {
			$this->layout['modules'] = array_merge($this->layout['modules'], array('skip_'.rand(0,1000)=>$k), $v);
		}
		#print_r($this->layout['modules']); exit;
		$this->layout['menu'] = $this->Pers->getModules($this->layout['modules'], $this->uid);
		$this->layout['site_name'] = $this->config->config['site_name'];
		$this->layout['my_mode'] = 'admin';
	}
	
	public function index($name='', $action='') {
		$module = ($this->CI->uri->segment(3)) ? $this->CI->uri->segment(3) : $this->config->config['default_module'];
		if (!isset($this->config->config[$module])) {
			header('location: /admin/'.$module);
		}
		$params = array('instance'=>$this, 'table'=>$module);
		ob_start();
		$this->load->library('atomicobject', &$params);
		$this->content = ob_get_contents();
		ob_end_clean();
		$this->layout['title'] = $this->session->userdata('title');
		$this->layout['current'] = $module;
		$this->layout['content'] = $this->content;
		$this->smarty('admin/index', $this->layout);
	}
	
	private function auth() {

		if ($this->input->post('login') && $this->input->post('password')) {
			if ($uid = $this->Admin_Model->auth($this->input->post('login'), md5($this->input->post('password')))) {
				return $uid;
			} else {
				$this->layout['errors'] = $this->config->config['errors']['auth'];
				$this->smarty('admin/login_form.tpl', $this->layout);
				exit;
			}
		} elseif ($this->session->userdata('login') != false && $this->session->userdata('password') != false) { 
			if ($uid = $this->Admin_Model->auth($this->session->userdata('login'), $this->session->userdata('password'))) {
				return $uid;
			} else { 
				$this->layout['errors'] = $this->config->config['errors']['auth'];
				$this->smarty('admin/login_form.tpl', $this->layout);
				exit;
			}	
		} else { 
			$this->smarty('admin/login_form.tpl');
			exit;
		}
	}
	
	
	public function tree($expand=false) {
		if (($this->Pers->checkAcess($this->uid, 'tree', 3) == 0)) {
			$this->layout['content'] =  $this->CI->load('admin/denied', $this->layout);
		} else {
			$this->layout['expand'] = $expand;
			$this->layout['tree_nodes'] = '';
			$this->draw_tree(1);
			$this->layout['current'] = 'tree';
			$this->layout['tree'] = true;
			$this->layout['content'] = $this->CI->load('admin/tree', $this->layout);
		}
		$this->smarty('admin/index', $this->layout);
	}
	
	//немного гавнокода чтобы облегчить себе жизнь
	private function draw_tree($id=0, $level = 0) {
		$this->CI->db->where('parent_id',$id);
		$this->CI->db->order_by('object_sort', 'asc');
		$query = $this->CI->db->get('__structure');		
		if ($query->num_rows() == 0) {
			return;
		}
		$level++;
		$this->layout['tree_nodes'] .= '<ul>';
		foreach ($query->result() as $row) {
			$this->layout['tree_nodes'] .= '<li id="node'.$row->id.'" real_id="'.$row->object_id.'" object_type="'.$row->object_type.'"><a name="node'.$row->object_id.'" href="#">'.$row->object_name.'</a>'; 	
			if (!empty($row->object_label)) {
				$this->layout['tree_nodes'] .= ' (<i>'.$row->object_label.'</i>)';
			}
			$this->draw_tree($row->id,$level);
			$level--;
			$this->layout['tree_nodes'] .= '</li>';
		}
		$this->layout['tree_nodes'] .= '</ul>';
	} 
	
	private function isAdmin() {
		$this->load->helper('url');
		if ($this->session->userdata('login') != 'admin') {
			redirect('/admin/index/'.$this->config->config['default_module']);
		}
	}
	
	public function add_object() {
		$this->isAdmin();
		$this->session->set_userdata(array('object_info'=>$_POST));
		redirect('/admin/index/'.$_POST['module'].'/add_item/');
	}
	
	public function edit_tree() {
		$this->isAdmin();
		$data = array(
        	'object_name' => $_REQUEST['newName']
        );
		$this->db->where('id', $_REQUEST['renameId']);
		$this->db->update('__structure', $data); 
		die('OK');
	}
	
	public function delete_tree() {
		$this->isAdmin();
		$this->layout['ids'] = $_REQUEST['deleteIds'];
		$this->layout['ids'] = explode(',', $this->layout['ids']);
		foreach ($this->layout['ids'] as &$node) {
			$node = (string)$node;
		}
		$this->db->where_in('id',$this->layout['ids']);
		$query = $this->db->get('__structure');
		foreach ($query->result() as $row) {
			$this->db->where($row->object_type.'_id', $row->object_id);
			$this->db->delete($row->object_type);
		}
		$this->db->where_in('id',$this->layout['ids']);
		$this->db->delete('__structure'); 
		die('OK');
	}
	
	function save_order($param) {
		$this->isAdmin();
		$items = explode(",",$param);
		for($i=0;$i<count($items);$i++) {
			$tokens = explode("-",$items[$i]);
			$data = array(
               'parent_id' => $tokens[1],
               'object_sort' => $i
            );
            $this->db->where('id', $tokens[0]);
            $this->db->update('__structure', $data); 
		}
		die('OK');
	}
	
	function test_tree() {
		$this->load->model('Atomic_Tree');
		$data['parent_node'] = 'super_menu';
		$data['parent_by'] = 'object_label';
		$data['parent_type'] = 'menu';
		$data['child_type'] = 'menu';
		$data['tree'] = true;
		$nodes = $this->Atomic_Tree->getChilds($data);
	}
	
	function permissions() {
		$this->isAdmin();
		$this->layout['groups'] = $this->Pers->getGroups();
		///print_r($this->layout['groups']);exit;
		$this->layout['modules'] = array();
		foreach ($this->config->config['menu_items'] as $k=>$v) {
			$this->layout['modules'] = array_merge($this->layout['modules'], array('skip_'.rand(0,1000)=>$k), $v);
		}
		$this->layout['content'] = $this->load('admin/pers', $this->layout);
		$this->layout['current'] = 'pers';
		$this->layout['my_mode'] = 'admin';
		$this->smarty('admin/index', $this->layout);
	}
	
	function add_group() {
		$this->isAdmin();
		$this->layout['current'] = 'pers';
		$data = array('group_name'=>$_POST['group_name']);
		$this->db->insert('__groups', $data);
		$group_id = $this->db->insert_id();
		foreach ($_POST['modules'] as $key=>$node) {
			$data = array('group_id'=>$group_id, 'module_name'=>$key, 'group_pers'=>$_POST['group_access'][$key]);
			$this->db->insert('__permissions', $data);	
		}
		redirect('/admin/permissions/');
	}
	
	function edit_group() {
		$this->isAdmin();
		$this->layout['current'] = 'pers';
		if (isset($_POST['edit'])) {
			$this->db->where('group_id', $_POST['group_id']);
			$data = array('group_name'=>$_POST['group_name']);
			$this->db->update('__groups', $data);
			$this->db->where('group_id', $_POST['group_id']);
			$this->db->delete('__permissions');
			foreach ($_POST['modules'] as $key=>$node) {
				$data = array('group_id'=>$_POST['group_id'], 'module_name'=>$key, 'group_pers'=>$_POST['group_access'][$key]);
				$this->db->insert('__permissions', $data);	
			}
			redirect('/admin/permissions/');
		} elseif (isset($_POST['delete'])) {
			$this->db->where('group_id', $_POST['group_id']);
			$this->db->delete('__groups');
			$this->db->where('group_id', $_POST['group_id']);
			$this->db->delete('__permissions');
			redirect('/admin/permissions/');
		}
				
		$this->layout['group'] = $this->Pers->getGroup($_POST['group_id']);
		$this->layout['allowed_modules'] = $this->Pers->getModulesByGroup($_POST['group_id']);
		//print_r($this->layout['allowed_modules']); exit;
		$this->layout['modules'] = array();
		foreach ($this->config->config['menu_items'] as $k=>$v) {
			$this->layout['modules'] = array_merge($this->layout['modules'], array('skip_'.rand(1,1000)=>$k), $v);
		}
		
		$this->layout['content'] = $this->load('admin/pers_edit', $this->layout);
		$this->smarty('admin/index', $this->layout);
	}
	
	function options() {
		$this->layout['current'] = 'options';
		if ($this->input->post('save')) {
			$this->Admin_Model->saveOptions();
		}
		$data = $this->Admin_Model->getOptions();
		$this->layout['content'] = $this->load('admin/options', $data);
		$this->smarty('admin/index', $this->layout);
	}
	
	function stats() {
		$this->layout['current'] = 'stats';
		$data = $this->Admin_Model->getStats();
		$this->layout['content'] = $this->load('admin/stats', $data);
		$this->smarty('admin/index', $this->layout);
	}
	
	function maillist() {
		if ($this->input->post('send')) {
			$this->layout['msg'] = 'Рассылка запущена!';
		}
		$this->layout['current'] = 'maillist';
		$this->layout['content'] = $this->load('admin/maillist', $this->layout);
		$this->smarty('admin/index', $this->layout);
	}

	function logout() {
		$this->session->sess_destroy();
		unset($_SESSION);
		redirect('../');
	}

}
?>