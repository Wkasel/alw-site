<?php
class Mobile extends SmartyController {

	private $layout;
	
	function __construct() {
		parent::__construct();	
		@session_start();
	}
	
	function index() {
		echo file_get_contents('../../../../mobile/index.html');
	}
}