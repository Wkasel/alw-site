<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 * @author Valery Filin
 * @version $Id: prefilter.alternative_delimiters.php 18966 2008-01-24 12:00:00Z valery.filin $
 */

/**
 * Prefilter plugin allows use &lt;!--*{ }*--&gt;
 * 
 * @param string contents of the block
 * @param Smarty clever simulation of a method
 * @return string string $content re-formatted
 */
function alternative_delimiters_prefilter($tpl_source, &$smarty) 
{ 
	$L = $smarty->left_delimiter;
	$R = $smarty->right_delimiter;
	$rez= preg_replace(
	   	array(
			'/<!--*{/U', 
			'/}*-->/U'
		),
		array(
			$L, 
			$R
		),
		$tpl_source
	); 
	
	return $rez;
} 

?>