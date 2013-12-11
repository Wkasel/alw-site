<?php
class Content extends SmartyController {

	private $layout;
	
	function __construct() {
		parent::__construct();	
		@session_start();
		$this->load->model('Content_Model');
		$this->CI =& get_instance();
		$this->layout['meta'] = $this->Content_Model->getMeta();
		$this->layout['user_info'] = $this->Content_Model->is_authed();
		$this->layout['cats'] = $this->Content_Model->getCats();
	}
	
	function index() {
		$this->layout['section'] = 'main';
		$this->layout['about'] = $this->Content_Model->getElement('about');
		$this->layout['iom'] = $this->Content_Model->imagesOnMain();
		$this->layout['iom_reverse'] = array_reverse($this->layout['iom']);
		$this->layout['pom'] = $this->Content_Model->productsOnMain();
		$this->smarty('index', $this->layout);
	}
	
	function out() {
		$data = $this->Content_Model->getAllProductsOut();
		echo '<b>Products</b><br />';
		foreach ($data[0] as $row) {
			echo $row->p_name.'<br />'.$row->p_desc.'<br /><br />';
		}
		echo '<b>Products on main</b><br />';
		foreach ($data[1] as $row) {
			echo $row->desc.'<br />';
		}
		echo '<b>Featured Products</b><br />';
		foreach ($data[2] as $row) {
			echo $row->p_name.'<br />'.$row->p_desc.'<br /><br />';
		}
		echo '<b>Custom projects</b><br />';
		foreach ($data[3] as $row) {
			echo $row->p_name_ex.'<br />'.$row->p_spec.'<br />'.$row->p_desc.'<br /><br />';
		}
	}
	
	function query() {
		$this->layout['pom'] = $this->Content_Model->runQuery();
		echo 'good';
	}
	
	function products() {
		$this->layout['section'] = 'products_home';
		$this->layout['featured'] = $this->Content_Model->getFeatured();
		$this->layout['featured_reverse'] = array_reverse($this->layout['featured']);
		$this->layout['custom'] = $this->Content_Model->getCustom();
		$this->layout['custom_reverse'] = array_reverse($this->layout['custom']);
		$this->smarty('index', $this->layout);
	}
	
	function search($page=1) {
		if (empty($_REQUEST['keyword'])) {
			header('location: /content/products/');
		}
		$this->layout['section'] = 'search';
		$this->layout['keyword'] = $_REQUEST['keyword'];
		$data = $this->Content_Model->searchObjects($page);
		$this->layout['total_nodes'] = $data[0];
		$this->layout['objects'] = $data[1];
		$this->layout['page'] = $page;
		$this->smarty('index', $this->layout);

	}
	
	function cat($cat='suspended', $page=1) {
		if (!($this->layout['cat_info'] = $this->Content_Model->getCat($cat))) {
			header('location: /content/products/');
		}
		$this->layout['section'] = 'products_category';
		//$data = $this->Content_Model->getObjects($cat, $page);
        $data = $this->Content_Model->getObjectsBy($cat);
		$this->layout['total_nodes'] = $data[0];
		$this->layout['objects'] = $data[1];
		$this->layout['page'] = $page;
		$this->layout['current_cat'] = $cat;
		$this->layout['selected_id'] = $cat;
		$this->smarty('index', $this->layout);
	}
	
	function view_all() {
		$this->layout['section'] = 'view_all';
		$this->layout['objects'] = $this->Content_Model->getAllObjects();
		$this->smarty('index', $this->layout);
	}
 	function page_bim_rev() {
		$this->layout['section'] = 'page_bim_rev';
		$this->layout['objects'] = $this->Content_Model->getQuickShipObjects();
		$this->smarty('index', $this->layout);
	}
	function quick_ship() {
		$this->layout['section'] = 'quick_ship';
		$this->layout['objects'] = $this->Content_Model->getQuickShipObjects();
		$this->smarty('index', $this->layout);
	}
  
	function quickship() {
		$this->layout['section'] = 'quickship';
		$this->smarty('index', $this->layout);
	}	
  
	function product($id) {
		if (!is_numeric($id) || $id < 0) {
			header('location: /content/products/');
		}
		if (!($this->layout['product'] = $this->Content_Model->getObject($id))) {
			header('location: /content/products/');
		}
		$this->layout['meta']->meta_title = $this->layout['product']->p_name_ex;
		$this->layout['common_matrix'] = $this->Content_Model->getCommonMatrix();
		$this->layout['files'] = $this->Content_Model->getFiles('photometry', 'products', $id);
		$this->layout['matrix'] = $this->Content_Model->getFiles('matrix', 'products', $id);
		$this->layout['cat'] = $this->Content_Model->getCat($this->layout['product']->p_cat);
		$this->layout['section'] = 'prod_detail';
		$this->smarty('index', $this->layout);
	}
	
	function project($id,  $page=1) {
		if (!is_numeric($id) || $id < 0) {
			header('location: /content/products/');
		}
		$this->layout['page'] = $page;
		$this->layout['total_nodes'] = $this->Content_Model->getProjectCount();
		if (!($this->layout['product'] = $this->Content_Model->getProject($id))) {
			header('location: /content/products/');
		}
		$this->layout['section'] = 'project';
		$this->smarty('index', $this->layout);
	}
	
	function project_show($offset=1) {
		if (!is_numeric($offset) || $offset < 0) {
			header('location: /');
		}
		$this->layout['page'] = $offset;
		$this->layout['total_nodes'] = $this->Content_Model->getProjectCount();
		if (!($this->layout['product'] = $this->Content_Model->getProjectOffset($offset))) {
			header('location: /content/products/');
		}
		$this->layout['section'] = 'project';
		$this->smarty('index', $this->layout);
	}
	
	function featured($id, $page=1) {
		if (!is_numeric($id) || $id < 0) {
			header('location: /');
		}
		if (!($this->layout['product'] = $this->Content_Model->getFeaturedProd($id))) {
			header('location: /');
		}
		$this->layout['page'] = $page;
		$this->layout['total_nodes'] = $this->Content_Model->getFeaturedCount();
		$this->layout['files'] = $this->Content_Model->getFiles('photometry', 'featured', $id);
		$this->layout['matrix'] = $this->Content_Model->getFiles('matrix', 'featured', $id);
		$this->layout['section'] = 'featured';
		$this->layout['meta']->meta_title = $this->layout['product']->p_name_ex;
		$this->smarty('index', $this->layout);
	}
	
	function featured_show($offset=1) {
		if (!is_numeric($offset) || $offset < 0) {
			header('location: /');
		}
		if (!($this->layout['product'] = $this->Content_Model->getFeaturedProdOffset($offset))) {
			header('location: /');
		}
		$this->layout['page'] = $offset;
		$this->layout['total_nodes'] = $this->Content_Model->getFeaturedCount();
		$this->layout['files'] = $this->Content_Model->getFiles('featured', $this->layout['product']->featured_id);
		$this->layout['section'] = 'featured';
		$this->layout['meta']->meta_title = $this->layout['product']->p_name_ex;
		$this->smarty('index', $this->layout);
	}
	
	
	function rep_area($mode='article', $id=0) {
		$this->layout['rep'] = true;
		if (!$this->layout['user_info']) {
			header('location: /');
		}
		$arr = $this->Content_Model->getRepsNav();
		$this->layout['nav'] = $arr[1];
		if ($mode == 'article') {
			$this->layout['section'] = 'rep_area';
			$arr = $this->Content_Model->getRepsNav();
			if ($id) {
				$this->layout['art_id'] = $id;	
			} else {
				$this->layout['art_id'] = $arr[0];	
			}
			$this->layout['article'] = $this->Content_Model->getRepsArticle($this->layout['art_id']);
		} elseif ($mode == 'email') {
			$this->layout['section'] = 'email';
			if (isset($_REQUEST['submitButtonName'])) {
				$this->Content_Model->sendMail();
				header('location: /content/rep_area/');
			}
		}  elseif ($mode == 'calc') {
			$this->layout['section'] = 'calc';
		} elseif ($mode == 'show_calc') {
			$this->layout['address'] = $_REQUEST['address'];
			$this->layout['section'] = 'show_calc';
		}  else {
			$this->layout['section'] = 'find_job';
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
				$this->layout['s'] = $this->Content_Model->makeSearch($this->layout['cond'], $this->layout['user_info']);
			}
		}
		$this->smarty('index', $this->layout);
	}
	
	function get_file() {
		$file_name = $_REQUEST['file'];
		if (empty($file_name)) {
			die('404');
		}
		$file = $_SERVER['DOCUMENT_ROOT'].'/source/files/main_files/'.$file_name;
		if (!file_exists($file)) {
			die('404');
		}
		header('Pragma: public'); 	// required
		header('Expires: 0');		// no cache
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Cache-Control: private',false);
		header('Content-Type: application/force-download');
		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.filesize($file));	
		header('Connection: close');
		readfile($file);		
	}
	
	function contacts() {
		$this->layout['section'] = 'contacts';
		$this->layout['team'] = $this->Content_Model->getTeam();
		$this->smarty('index', $this->layout);
	}
	
	function test() {
		echo json_encode($this->Content_Model->getTeam());
	}
	
	function auth() {
		$auth = $this->Content_Model->auth($this->input->post('login'), $this->input->post('password'), $this->input->post('remember'));
		if ($auth == 'no_user') {
			echo 'You have entered an incorrect username or password';
			return;
		}
		echo 'success';
	}
	
	function find_rep() {
		if (isset($_REQUEST['country'])) {
			$this->layout['find'] = true;
			$this->layout['country'] = $_REQUEST['country'];
			$this->layout['state'] = $_REQUEST['state'];
			$this->layout['reps'] = $this->Content_Model->findOffice();
		}
		$this->layout['section'] = 'find_rep';
		$this->smarty('index', $this->layout);
	}
	
	function pages($page) {
		$this->layout['section'] = 'page';
		$this->layout['content'] = $this->Content_Model->getPage($page);
		$this->layout['content'] = $this->load('page', $this->layout);
		$this->smarty('index', $this->layout);
	}
	
	function event_calendar() {
		$this->layout['section'] = 'event_calendar';
		$this->layout['event'] = $this->Content_Model->getEventCalendar();
		$this->smarty('index', $this->layout);
	}
	
	function logout() {
		$this->Content_Model->logout();
		header('location: /');
	}	
}