<?php
	use \Caisse\Caisse;
	define('LINK_ROOT', realpath(dirname(__FILE__)).'/');
	require_once(LINK_ROOT . 'Prepare.class.php');
	Prepare::initialize('src');
	/**
	* Your Main Code
	*/
	$caisse = new Caisse();
?>