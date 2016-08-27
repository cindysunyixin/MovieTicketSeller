<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	//ini_set('memory_limit', '512M'); 
	include("class/init.cls.php");
	$obj =new init();
	$obj->run();
?>