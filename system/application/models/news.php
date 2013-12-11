<?php
class News extends Model
{
	
	function __construct() {
		parent::Model();
		$this->loadTable('news');
	}
	
}
?>