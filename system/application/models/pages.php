<?php
class Pages extends Model
{
	
	function __construct() {
		parent::Model();
		$this->loadTable('pages');
	}
	
}
?>