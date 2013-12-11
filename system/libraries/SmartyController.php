<?php

/**
 * Calls Smarty Template View with predefinied 'this' template variable
 * 
 * @author commando
 * @version $Id: SmartyController.php 18701 2008-01-15 14:39:18Z commando $
 * @copyright 2008
 */

class SmartyController extends Controller {
	function __construct() {
		parent::__construct();
	}
	
	/**
	 * Emty method for hook load
	 * @todo delete probably
	 */
	function init() {
		
	}	
	
	/**
	 * Calls Smarty Template View with predefinied 'this' template variable
	 *
	 * @param string $resource_name
	 * @param array $params
	 */
	public function smarty($resource_name, $params = array()) {
		echo $this->load($resource_name, $params);
	}
	
	/**
	 * Returns Smarty Template View conetnh. Templates has a predefinied variable 'this'
	 *
	 * @param string $resource_name
	 * @param array $params
	 * @return string
	 */
	public function load($resource_name, $params = array())
	{
		if (!is_array($params)) {
			$params = array();
		}
		$params['this'] = $this;
		$result = $this->mysmarty->view($resource_name, $params);
		return $result;
	}	
	
	public  function write_json_headers()
	{
		header('Pragma: no-cache');
		header('Content-Type: application/json');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', false);
	}
}

?>