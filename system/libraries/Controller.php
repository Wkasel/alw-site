<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class Controller extends CI_Base {

	var $_ci_scaffolding	= FALSE;
	var $_ci_scaff_table	= FALSE;
	
	/**
	 * Constructor
	 *
	 * Calls the initialize() function
	 */
	function Controller()
	{	
		parent::CI_Base();
		$this->_ci_initialize();
		log_message('debug', "Controller Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize
	 *
	 * Assigns all the bases classes loaded by the front controller to
	 * variables in this class.  Also calls the autoload routine.
	 *
	 * @access	private
	 * @return	void
	 */
	function _ci_initialize()
	{
		// Assign all the class objects that were instantiated by the
		// front controller to local class variables so that CI can be
		// run as one big super object.
		$classes = array(
							'config'	=> 'Config',
							'input'		=> 'Input',
							'benchmark'	=> 'Benchmark',
							'uri'		=> 'URI',
							'output'	=> 'Output',
							'lang'		=> 'Language',
							'router'	=> 'Router'
							);
		
		foreach ($classes as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		// In PHP 5 the Loader class is run as a discreet
		// class.  In PHP 4 it extends the Controller
		if (floor(phpversion()) >= 5)
		{
			$this->load =& load_class('Loader');
			$this->load->_ci_autoloader();
		}
		else
		{
			$this->_ci_autoloader();
			
			// sync up the objects since PHP4 was working from a copy
			foreach (array_keys(get_object_vars($this)) as $attribute)
			{
				if (is_object($this->$attribute))
				{
					$this->load->$attribute =& $this->$attribute;
				}
			}
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Run Scaffolding
	 *
	 * @access	private
	 * @return	void
	 */	
	function _ci_scaffolding()
	{
		if ($this->_ci_scaffolding === FALSE OR $this->_ci_scaff_table === FALSE)
		{
			show_404('Scaffolding unavailable');
		}
		
		$method = ( ! in_array($this->uri->segment(3), array('add', 'insert', 'edit', 'update', 'view', 'delete', 'do_delete'), TRUE)) ? 'view' : $this->uri->segment(3);
		
		require_once(BASEPATH.'scaffolding/Scaffolding'.EXT);
		$scaff = new Scaffolding($this->_ci_scaff_table);
		$scaff->$method();
	}


}
// END _Controller class

/* End of file Controller.php */
/* Location: ./system/libraries/Controller.php */

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