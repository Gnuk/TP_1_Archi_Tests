<?php
	define('LINK_ROOT', realpath(dirname(__FILE__)).'/');
	require_once(LINK_ROOT . 'Terminal.class.php');
	require_once(LINK_ROOT . 'Prepare.class.php');
	$sourceDir = 'src';
	$console = new Terminal($argv, $sourceDir);
	$console->execute();
	
	
?>