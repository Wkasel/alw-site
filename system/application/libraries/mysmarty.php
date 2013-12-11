<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Integration Smarty and Code Ignintor
 * 
 * @version $Id: mysmarty.php 18673 2008-01-14 17:07:46Z commando $
 * @file system/application/libraries/Mysmarty.php 
 */

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'Smarty.class.php');

class Mysmarty extends Smarty
{
	function Mysmarty() {
		$this->Smarty();

		$config =& get_config();
		
		// absolute path prevents "template not found" errors
		$this->template_dir = (!empty($config['smarty_template_dir']) ? $config['smarty_template_dir'] 
																	  : BASEPATH . 'application/views/');
																	
		$this->compile_dir  = (!empty($config['smarty_compile_dir']) ? $config['compile_dir'] 
																	 : BASEPATH . 'cache/'); //use CI's cache folder        
	}
	
	/**
	* @param $resource_name string
	* @param $params array holds params that will be passed to the template
	* @desc loads the template
	*/
	function view($resource_name, $params = array())   {
		if (strpos($resource_name, '.') === false) {
			$resource_name .= '.tpl';
		}
		
	
		if (is_array($params) && count($params)) {
			foreach ($params as $key => $value) {
				$this->assign($key, $value);
			}
		}
		
		// check if the template file exists.
		if (!is_file($this->template_dir . $resource_name)) {
			show_error("template: [$resource_name] cannot be found.");
		}
		
		@ob_start();

		parent::display($resource_name); 
		$rez = @ob_get_contents();
		
		@ob_clean();	
		return $rez;
	}
} // END class smarty_library
?>