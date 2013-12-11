<?php
class Halo extends SmartyController {

	function Halo() {
		parent::Controller();	
		$this->load->database();
	}
	
	function index() {
		$params = array('instance'=>$this, 'table'=>'test');
		$this->load->library('atomicobject', &$params);
	}
	
	function get_json() {
		$this->write_json_headers();
		echo "{'success':true}";
	}
	
	function test() {
		$this->load->model('Pages');
		var_dump($this->Pages->insert(array('page_name'=>'test', 'page_content'=>'tratata')));
	}
}
?>