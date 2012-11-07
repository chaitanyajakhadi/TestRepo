<?php
	error_reporting(E_ALL^E_NOTICE);
	ini_set('display_errors', '1');
	include_once 'template.class.php';
	$msg		=	$_GET['msg'];
	$errormsg	=	'';
	
	
	if($msg == 4) $errormsg	= '<div class="content">Invalid Code.</div>';
	else if($msg == 5) $errormsg	= '<div class="content">Cannot add records.</div>';
	else if($msg > 0 && $msg < 4) $errormsg	= '<div class="content">Invalid Code.</div>';
	
	flush();
	$template = new Template;
	$template->load("templates/index.html");
	$template->replace("title", "Consumer 360 India - 28th November 2012");
	$template->replace("error", $errormsg);
	$template->publish();
?>