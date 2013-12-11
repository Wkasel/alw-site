<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2006, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class Model {

	/**
	 * The name of the DataSource connection that this Model uses
	 *
	 * @var string
	 * @access public
	 */
	var $useDbConfig = 'default';
	
	/**
	 * Value of the primary key ID of the record that this model is currently pointing to
	 *
	 * @var unknown_type
	 * @access public
	 */
	var $id = null;
		
	/**
	 * Container for the data that this model gets from persistent storage (the database).
	 *
	 * @var array
	 * @access public
	 */
	var $data = array();

	/**
 	 * The name of the associate table name of the Model object
 	 * @var string
 	 * @access public
 	 */
	var $table;
	
	/**
	 * The name of the ID field for this Model.
	 *
	 * @var string
	 * @access public
	 */
	var $primaryKey = 'id';

	/**
	 * Container for the fields of the table that this model gets from persistent storage (the database).
	 *
	 * @var array
	 * @access public
	 */
	var $fields = array();
		
	/**
	 * The last inserted ID of the data that this model created
	 *
	 * @var int
	 * @access private
	 */
	var $__insertID = null;

	/**
	 * The number of records returned by the last query
	 *
	 * @access private
	 * @var int
	 */
	var $__numRows = null;

	/**
	 * The number of records affected by the last query
	 *
	 * @access private
	 * @var int
	 */
	var $__affectedRows = null;	

	/**
	 * Tells the model whether to return results in array or not
	 *
	 * @var string
	 * @access public
	 */
	var $returnArray = TRUE;
	
	/**
	 * Prints helpful debug messages if asked
	 *
	 * @var string
	 * @access public
	 */
	var $debug = FALSE;
	
	/**
	 * Stores all the queries if debug is TRUE
	 *
	 * @var array
	 * @access public
	 */
	var $queries = array();

	/**
	 * Used by CI
	 *
	 * @var string
	 * @access private
	 */
	var $_parent_name = '';
	
	/**
	 * Constructor
	 *
	 * @access public
	 */
	function Model()
	{
		// If the magic __get() or __set() methods are used in a Model references can't be used.
		$this->_assign_libraries( (method_exists($this, '__get') OR method_exists($this, '__set')) ? FALSE : TRUE );
		
		// We don't want to assign the model object to itself when using the
		// assign_libraries function below so we'll grab the name of the model parent
		$this->_parent_name = ucfirst(get_class($this));
		
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * Assign Libraries
	 *
	 * Creates local references to all currently instantiated objects
	 * so that any syntax that can be legally used in a controller
	 * can be used within models.  
	 *
	 * @access private
	 */	
	function _assign_libraries($use_reference = TRUE)
	{
		$CI =& get_instance();				
		foreach (array_keys(get_object_vars($CI)) as $key)
		{
			if ( ! isset($this->$key) AND $key != $this->_parent_name)
			{			
				// In some cases using references can cause
				// problems so we'll conditionally use them
				if ($use_reference == TRUE)
				{
					// Needed to prevent reference errors with some configurations
					$this->$key = '';
					$this->$key =& $CI->$key;
				}
				else
				{
					$this->$key = $CI->$key;
				}
			}
		}		
	}
	
	/**
	 * Load the associated database table.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @access public
	 */	
	 
	function loadTable($table, $config = 'default')
	{
		if ($this->debug) log_message('debug', "Loading model table: $table");
		
		$this->table = $table;
		$this->useDbConfig = $config;
		
		$this->fields = $this->db->list_fields($table);
		
		if ($this->debug) 
		{
			log_message('debug', "Successfull Loaded model table: $table");
		}
	}			
	
	/**
	 * Returns a resultset array with specified fields from database matching given conditions.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return query result either in array or in object based on model config
	 * @access public
	 */	

	function findAll($conditions = NULL, $fields = '*', $order = NULL, $start = 0, $limit = NULL) 
	{
		if ($conditions != NULL) 
		{ 
			$this->db->where($conditions);
		}

		if ($fields != NULL) 
		{ 
			$this->db->select($fields);
		}
		
		if ($order != NULL) 
		{ 
			$this->db->orderby($order);
		}
		
		if ($limit != NULL) 
		{ 
			$this->db->limit($limit, $start);
		}
		
		$query = $this->db->get($this->table);
		$this->__numRows = $query->num_rows();
		
		if ($this->debug)
		{
			$this->queries[] = $this->db->last_query();
		}
		
		return ($this->returnArray) ? $query->result_array() : $query->result();
	}
	
	/**
	 * Return a single row as a resultset array with specified fields from database matching given conditions.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return single row either in array or in object based on model config
	 * @access public
	 */	

	function find($conditions = NULL, $fields = '*', $order = 'id ASC') 
	{
		$data = $this->findAll($conditions, $fields, $order, 0, 1);
		
		if ($data) 
		{
			return $data[0];
		} 
		else 
		{
			return false;
		}
	}
	
	/**
	 * Returns contents of a field in a query matching given conditions.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return string the value of the field specified of the first row
	 * @access public
	 */	

	function field($conditions = null, $name, $fields = '*', $order = 'id ASC') 
	{
		$data = $this->findAll($conditions, $fields, $order, 0, 1);
		
		if ($data) 
		{	
			$row = $data[0];
			
			if (isset($row[$name])) 
			{
				return $row[$name];
			} 
			else 
			{
				return false;
			}	
		} 
		else 
		{	
			return false;	
		}
		
	}
	
	/**
	 * Returns number of rows matching given SQL condition.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return integer the number of records returned by the condition 
	 * @access public
	 */	

	function findCount($conditions = null) 
	{
		$data = $this->findAll($conditions, 'COUNT(*) AS count', null, 0, 1);
		
		if ($data) 
		{
			return $data[0]['count'];
		} 
		else 
		{
			return false;
		}
	}
	
	/**
	 * Returns a key value pair array from database matching given conditions.
	 *
	 * Example use: generateList(null, '', 0. 10, 'id', 'username');
	 * Returns: array('10' => 'emran', '11' => 'hasan')
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array a list of key val ue pairs given criteria
	 * @access public
	 */	

	function generateList($conditions = null, $order = 'id ASC', $start = 0, $limit = NULL, $key = null, $value = null)
	{
		$data = $this->findAll($conditions, "$key, $value", $order, $start, $limit);
	
		if ($data) 
		{
			foreach ($data as $row) 
			{
				$keys[] = ($this->returnArray) ? $row[$key] : $row->$key;
				$vals[] = ($this->returnArray) ? $row[$value] : $row->$value;
			}
				
			if (!empty($keys) && !empty($vals)) 
			{
				$return = array_combine($keys, $vals);
				return $return;
			}			
		} 
		else 
		{
			return false;
		}
	}
	
	/**
	 * Returns an array of the values of a specific column from database matching given conditions.
	 *
	 * Example use: generateSingleArray(null, 'name');
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array a list of key value pairs given criteria
	 * @access public
	 */	

	function generateSingleArray($conditions = null, $field = null, $order = 'id ASC', $start = 0, $limit = NULL) 
	{
		$data = $this->findAll($conditions, "$field", $order, $start, $limit);
	
		if ($data) 
		{	
			foreach ($data as $row) 
			{
				$arr[] = ($this->returnArray) ? $row[$field] : $row->$field;
			}
			
			return $arr;
		} 
		else 
		{
			return false;
		}
	}

	/**
	 * Initializes the model for writing a new record.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean True
	 * @access public
	 */	

	function create() 
	{
		$this->id = false;
		unset ($this->data);
		
		$this->data = array();
		return true;
	}	

	/**
	 * Returns a list of fields from the database and saves in the model
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array Array of database fields
	 * @access public
	 */	

	function read($id = null, $fields = null) 
	{
		if ($id != null) 
		{
			$this->id = $id;
		}

		$id = $this->id;

		if ($this->id !== null && $this->id !== false) 
		{
			$this->data = $this->find($this->primaryKey . ' = ' . $id, $fields);
			return $this->data;	
		} 
		else 
		{
			return false;	
		}
	}

	/**
	 * Inserts a new record in the database.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean success
	 * @access public
	 */	

	function insert($data = null) 
	{
		if ($data == null)
		{
			return FALSE;
		}
		
		$this->data = $data;
		$this->data['create_date'] = date("Y-m-d H:i:s");
		
		foreach ($this->data as $key => $value) 
		{
			if (array_search($key, $this->fields) === FALSE) 
			{
				unset($this->data[$key]);
			}
		}

		$this->db->insert($this->table, $this->data); 
		
		if ($this->debug)
		{
			$this->queries[] = $this->db->last_query();
		}
		
		$this->__insertID = $this->db->insert_id();
		return $this->__insertID;
	}	
	
	/**
	 * Saves model data to the database.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean success
	 * @access public
	 */	

	function save($data = null, $id = null) 
	{
		if ($data) 
		{
			$this->data = $data;
		}
				
		foreach ($this->data as $key => $value) 
		{
			if (array_search($key, $this->fields) === FALSE) 
			{
				unset($this->data[$key]);
			}
		}

		if ($id != null) 
		{
			$this->id = $id;
		}

		$id = $this->id;

		if ($this->id !== null && $this->id !== false) 
		{	
			$this->db->where($this->primaryKey, $id);
			$this->db->update($this->table, $this->data);
			
			if ($this->debug)
			{
				$this->queries[] = $this->db->last_query();
			}
			
			$this->__affectedRows = $this->db->affected_rows(); 
			return $this->id;			
		} 
		else 
		{
			$this->db->insert($this->table, $this->data); 
			
			if ($this->debug)
			{
				$this->queries[] = $this->db->last_query();
			}
			
			$this->__insertID = $this->db->insert_id();
			return $this->__insertID;
		}
	}	

	/**
	 * Removes record for given id. If no id is given, the current id is used. Returns true on success.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return boolean True on success
	 * @access public
	 */	

	function remove($id = null) 
	{
		if ($id != null) 
		{
			$this->id = $id;
		}

		$id = $this->id;

		if ($this->id !== null && $this->id !== false) 
		{	
			if ($this->db->delete($this->table, array($this->primaryKey => $id))) 
			{
				$this->id = null;
				$this->data = array();
				
				if ($this->debug)
				{
					$this->queries[] = $this->db->last_query();
				}
				
				return true;	
			} 
			else 
			{	
				return false;	
			}
		} 
		else 
		{
			return false; 	
		}
	}	
	
	/**
	 * Returns a resultset for given SQL statement. Generic SQL queries should be made with this method.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array Resultset
	 * @access public
	 */	

	function query($sql) 
	{
		$ret = $this->db->query($sql);
		
		if ($this->debug)
		{
			$this->queries[] = $this->db->last_query();
		}
		
		return $ret;
	}
	
	/**
	 * Returns the last query that was run (the query string, not the result).
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return string SQL statement
	 * @access public
	 */	

	function lastQuery() 
	{
		return $this->db->last_query();
	}

	/**
	 * Returns the list of all queries peformed (if debug is TRUE)
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return array list of SQL statements
	 * @access public
	 */	

	function debugQueries() 
	{
		$queries = array_reverse($this->queries);
		return $queries;
	}		

	/**
	 * This function simplifies the process of writing database inserts. It returns a correctly formatted SQL insert string.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return string SQL statement
	 * @access public
	 */	

	function insertString($data) 
	{
		return $this->db->insert_string($this->table, $data);
	}
	
	/**
	 * Returns the current record's ID.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return integer The ID of the current record
	 * @access public
	 */	

	function getID() 
	{
		return $this->id;
	}
	
	/**
	 * Returns the ID of the last record this Model inserted.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return int
	 * @access public
	 */	

	function getInsertID() 
	{
		return $this->__insertID;
	}
	
	/**
	 * Returns the number of rows returned from the last query.
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return int
	 * @access public
	 */	

	function getNumRows() 
	{
		return $this->__numRows;
	}
	
	/**
	 * Returns the number of rows affected by the last query
	 *
	 * @author md emran hasan <emran@rightbrainsolution.com>
	 * @return int
	 * @access public
	 */	

	function getAffectedRows() 
	{
		return $this->__affectedRows;
	}	
	
	function FromBase($content)
    {
        if (is_array($content))
        {
            for ($i=0; $i<count($content); $i++)
            {
                $content[$i] = $this->RestoreHtml($content[$i]);
            }
            return $content;
        }
        else
        {
            $content = $this->RestoreHtml($content);
            return $content;
        }
    }

    function RestoreHtml($content)
    {
        $content = str_replace("&amp;",          "&",         $content);
        $content = str_replace('&quot;',         '"',         $content);
        $content = str_replace("&#039;",         "'",         $content);
        $content = str_replace("&lt;",           "<",         $content);
        $content = str_replace("&gt;",           ">",         $content);
        return $content;
    }

}
// END Model Class
?>