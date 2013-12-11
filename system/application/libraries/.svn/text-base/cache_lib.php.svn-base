<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CoGear
 *
 * Content management system based on CodeIgniter
 *
 * @package		CoGear
 * @author			CodeMotion, Dmitriy Belyaev
 * @copyright		Copyright (c) 2009, CodeMotion
 * @license			http://cogear.ru/license.html
 * @link				http://cogear.ru
 * @since			Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * Cache class
 *
 * Store cache in files or memcached if it's installed on the server and works
 *
 * @package		CoGear
 * @subpackage	Cache
 * @category		Libraries
 * @author			CodeMotion, Dmitriy Belyaev
 * @link				http://cogear.ru/user_guide/
 */
class Cache_lib {
	public $memcache;
	public $memcache_prefix;
	private $cache_path;
	private $cache_ext = '.txt';
	public $enable = TRUE;
	public $counter = 0;
	/**
	* Constructor
	*
	* @return	void
	*/
	function __construct(){
        /*if(class_exists("Memcache")){
	      $pieces = explode('.',$_SERVER['SERVER_NAME']);
	      if(count($pieces) > 2) array_shift($pieces);
		  $this->memcache_prefix =  implode('.',$pieces).'/';
          $this->memcache = new Memcache;
          $this->memcache->connect('localhost', 11211);
		}
		else {*/
				  $this->memcache = FALSE;
		//}
		$this->cache_path = "./system/cache/";
	}
	// ------------------------------------------------------------------------

	function setFolder($folder_name) {
		$this->cache_path = './system/cache/'.$folder_name.'/';	
	}
	
	/**
	* Set cache
	*
	* @param	string	$name
	* @param	mixed	$data
	* @param	int		$time		Time to store in milliseconds
	* @return	void
	*/
	function set($name,$data = FALSE,$time = 0){ 
		if($this->memcache){
				return @$this->memcache->set($this->memcache_prefix.$name, $data, FALSE, $time);
		}
		else {
			$data = array("time"=>time()+$time,"cache"=>$data);
			if(function_exists('mkdir_if_not_exists')){
				mkdir_if_not_exists($this->cache_path.$folder.dirname($name));
			}
			if (preg_match('/^[a-z0-9\.-_-\s]+$/i', $name) == false ) {
				return FALSE;
			} 
			if(file_put_contents($this->cache_path.$name.$this->cache_ext,serialize($data)) && @chmod($this->cache_path.$name.(pathinfo($name,PATHINFO_EXTENSION) == '' ? $this->cache_ext : ''), 0777)){
				return TRUE;
			}
			else return FALSE;
		}
	}
	// ------------------------------------------------------------------------

	/**
	* Get cache
	*
	* @param	string	$name
	* @param	boolean $force	If site caching is disabled it can force get cached element
	* @return	mixed
	*/
	function get($name,$force = FALSE){
		 if(!$this->enable && !$force) {
/*
			 if($this->memcache && $this->memcache->get($name)){
			 $this->memcache->delete($name);
			 }
*/
						return FALSE;
		 }
		 if(!$force) $this->counter++;
		 if($this->memcache){
			return $this->memcache->get($this->memcache_prefix.$name);
		 }
		else {
			if(file_exists($this->cache_path.$name.(pathinfo($name,PATHINFO_EXTENSION) == '' ? $this->cache_ext : ''))){
				$data = unserialize(@file_get_contents($this->cache_path.$name.(pathinfo($name,PATHINFO_EXTENSION) == '' ? $this->cache_ext : '')));
				$curtime = $data["time"] - time();
				if(isset($data["time"]) && ($curtime > 0)){
					//echo $curtime. ' '.$data['time']. '  cached on '.$name.'<br/ >';
					return $data["cache"];
				}
				else {
					//echo $curtime. ' '.$data['time']. ' NON  cached on '.$name.'<br/ >';
					@unlink($this->cache_path.$name);
					return FALSE;
				}
			}
			else return FALSE;
		}
	}
	// ------------------------------------------------------------------------

	/**
	* Remove cache
	*
	* Synonim for delete
	*/
	function remove($name){
		return $this->delete($name);
	}
	// ------------------------------------------------------------------------

	/**
	* Delete cache
	*
	* @param	string $name
	* @return	void
	*/
	function delete($name){
		if($this->memcache){
			 return $this->memcache->delete($this->memcache_prefix.$name);
	  	}
		else {
			 return @unlink($this->cache_path.$name.(pathinfo($name,PATHINFO_EXTENSION) == '' ? $this->cache_ext : ''));
		}
	}
	// ------------------------------------------------------------------------

	/**
	* Flush all cache
	*
	* @return	void
	*/
	function flush(){
	    if($this->memcache){
	     return $this->memcache->flush();
	    }
	    else {
	       return rmdir_recurse($this->cache_path);
	    }
	}
	// ------------------------------------------------------------------------

	/**
	* Increment cache key
	*
	* @param	string	$key		Cache key
	* @param	int		$value	Default value if value isn't integer
	* @return	void
	*/
	function increment($key,$value = 0){
		if($this->memcache){
			$this->memcache->increment($key,$value);
		}
		else {
			$val = $this->get($key);
			$this->set($key,is_numeric($val) ? $val+1 : $value);
		}
	}
	// ------------------------------------------------------------------------


	/**
	* Increment cache key
	*
	* @param	string	$key		Cache key
	* @param	int		$value	Default value if value isn't integer
	* @return	void
	*/
	function decrement($key,$value = 0){
		if($this->memcache){
			return $this->memcache->decrement($key,$value);
		}
		else {
			$val = $this->get($key);
			$this->set($key,is_numeric($val) ? $val-1 : $value);
		}
	}
	// ------------------------------------------------------------------------

}
// ------------------------------------------------------------------------