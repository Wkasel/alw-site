<?php
class Api extends SmartyController {

/* 	private $layout; */

	function __construct() {
		parent::__construct();	
		@session_start();
		$this->cors();
		$this->load->model('Content_Model');
		$this->load->model('Area_Model');
		$this->CI =& get_instance();
		$this->layout['user_info'] = $this->Content_Model->is_authed();
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
/* 		$this->config->set_item('url_suffix', ''); */
	}
	function cors() {
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
    	if (isset($_SERVER['HTTP_ORIGIN'])) {
        	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        	header('Access-Control-Allow-Credentials: true');
       		header('Access-Control-Max-Age: 86400');// cache for 1 day
    	}
    	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
				header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

			exit(0);
    	}
	}
	function _output($output) {
		if (isset($output) && $output != '') {
			echo json_encode($output);
		}
	}
	
	function home(){
    	$this->_output($this->Content_Model->imagesOnMain());
    }
    
    function mobile_home(){
    	$this->_output($this->Content_Model->mobileImagesOnMain());
    }
    
    function cat($cat='suspended', $page=1) {
/* 		$this->Content_Model->getCat($cat) */
        $data = $this->Content_Model->getObjectsBy($cat);
		$this->layout['total_nodes'] = $data[0];
		$this->layout['objects'] = $data[1];
		$this->layout['page'] = $page;
		$this->layout['current_cat'] = $cat;
		$this->layout['selected_id'] = $cat;
/* 		$this->smarty('index', $this->layout); */
		$this->_output($this->layout);
	}
	
	function products() {
		$this->_output($this->Content_Model->getCats());
	}
	
	function product($id) {
		$this->_output($this->Content_Model->getObject($id));
	}
	function view_all() {
		$this->_output($this->Content_Model->getAllObjects());
	}
	
	function quickship() {
		$this->_output($this->Content_Model->getQuickShipObjects());
	}
	
	function events() {
		$this->_output($this->Content_Model->getEventCalendar());
	}
	
	function contact() {
		$this->_output($this->Content_Model->getTeam());
	}
	
	function find_rep() {
		if (isset($_REQUEST['country'])) {
			$this->layout['find'] = true;
			$this->layout['country'] = $_REQUEST['country'];
			$this->layout['state'] = $_REQUEST['state'];
		}
		$this->_output($this->Content_Model->findOffice());
	}
	
	function order_status() {
		if (isset($_REQUEST['token'])){
			if ($_REQUEST['internal'] == 'false' && $this->Content_Model->authByToken($_REQUEST['token'])) {
				if (isset($_REQUEST['search'])) {
					$this->layout['name'] = $_REQUEST['search'];
					$this->layout['cond'] = $_REQUEST['cond'];
					$this->layout['from'] = $_REQUEST['from'];
					$this->layout['to'] = $_REQUEST['to'];
					$this->_output($this->Content_Model->makeSearch($this->layout['cond'], $this->Content_Model->authByToken($_REQUEST['token'])));
				} elseif (!isset($_REQUEST['search'])) { 
					$msg = array("error" => "You must define a search term");
					$this->_output($msg);
				} elseif (!$this->Content_Model->is_authed()) {
					$msg = array("error" => "Invalid auth");
					header('HTTP/1.1 401 Unauthorized');
					$this->_output($msg);
				} else {
					$msg = array("error" => "Please try again later");
					$this->_output($msg);
				}		
			} elseif ($this->Area_Model->authByToken($_REQUEST['token'])) {
				if (isset($_REQUEST['search'])) {
					$this->layout['name'] = $_REQUEST['search'];
					$this->layout['cond'] = $_REQUEST['cond'];
					$this->layout['from'] = $_REQUEST['from'];
					$this->layout['to'] = $_REQUEST['to'];
					$this->_output($this->Area_Model->getJobs($this->layout['cond'], $this->Area_Model->authByToken($_REQUEST['token'])));
				} elseif (!isset($_REQUEST['search'])) { 
					$msg = array("error" => "You must define a search term");
					$this->_output($msg);
				} elseif (!$this->Area_Model->is_authed()) {
					$msg = array("error" => "Invalid auth");
					header('HTTP/1.1 401 Unauthorized');
					$this->_output($msg);
				} else {
					$msg = array("error" => "Please try again later");
					$this->_output($msg);
				}	
			}
		}
	}
	
	
	// need to write token authentication for this
	function auth() {
		$post = json_decode($this->input->post('model'), true);
		if ($post['user'] == 'data413' || $post['user'] == 'shira') {
			$auth = $this->Area_Model->admin_auth($post['user'], $post['pass']);
		} else {
			$auth = $this->Content_Model->auth($post['user'], $post['pass']);	
		}
		if ($auth == 'no_user') {
			$msg = array("error" => "Invalid auth");
			header('HTTP/1.1 401 Unauthorized');
			$this->_output($msg);
		} else {
			if ($post['user'] == 'data413' || $post['user'] == 'shira') {
				$msg = array("success" => "Auth Successful", "token" => $auth->token, "internal" => true);
			} else {
				$msg = array("success" => "Auth Successful", "token" => $auth->token, "internal" => false);	
			}
			$this->_output($msg);
		}
	}
		
}