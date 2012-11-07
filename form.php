<?php
	error_reporting(E_ALL^E_NOTICE);
	ini_set('display_errors', '1');
	include('common.php');
	include('validate_index.php');
	include_once 'template.class.php';
	
	$msg		=	$_POST['msg_txt'];
	$errormsg	=	$name_txt	=	$email_txt	=	$org_txt	=	$desig_txt	=	$addr_txt	=	'';
	
	if($msg == 1) 	  	$errormsg	=  '<div class="content1" style="text-align:center !important;background-color:#FFDDDD;border: 1px solid #B30000;color: #000000;font-size: 14px;line-height: 16px;width:400px;padding:5px;height:16px;margin:0 0 15px 70px;">All columns are mandatory</div>';
	else if($msg == 2)  $errormsg	=  '<div class="content1" style="text-align:center !important;background-color:#FFDDDD;border: 1px solid #B30000;color: #000000;font-size: 14px;line-height: 16px;width:400px;padding:5px;height:16px;margin:0 0 15px 70px;">Email is not valid</div>';
	else if($msg == 3)  $errormsg	=  '<div class="content1" style="text-align:center !important;background-color:#FFDDDD;border: 1px solid #B30000;color: #000000;font-size: 14px;line-height: 16px;width:400px;padding:5px;height:16px;margin:0 0 15px 70px;">email is already registered for the event</div>';
	
	
	
	if(isset($_POST['name_txt'])){	$name_txt	=	htmlspecialchars($_POST['name_txt']);	}
	if(isset($_POST['email_txt'])){	$email_txt	=	htmlspecialchars($_POST['email_txt']);	}
	if(isset($_POST['org_txt'])){	$org_txt	=	htmlspecialchars($_POST['org_txt']);	}
	if(isset($_POST['desig_txt'])){	$desig_txt	=	htmlspecialchars($_POST['desig_txt']);	}
	if(isset($_POST['addr_txt'])){	$addr_txt	=	htmlspecialchars($_POST['addr_txt']);	}
	if(isset($_POST['code_txt'])){	$code_txt	=	htmlspecialchars($_POST['code_txt']);	}
	if(isset($_POST['phone_txt'])){	$phone_txt	=	htmlspecialchars($_POST['phone_txt']);	}
	if(isset($_POST['city_txt'])){	$city_txt	=	htmlspecialchars($_POST['city_txt']);	}	
	if(isset($_POST['pincode_txt'])){	$pincode_txt	=	htmlspecialchars($_POST['pincode_txt']);	}
	if(isset($_POST['about_event_txt'])){	$about_event_txt	=	htmlspecialchars($_POST['about_event_txt']);	}
	
	flush();
	$template = new Template;
	$template->load("templates/form.html");
	$template->replace("title", "Consumer 360 India - 28th November 2012");
	$template->replace("error", 	$errormsg);
	$template->replace("name_txt", 	$name_txt);
	$template->replace("email_txt", $email_txt);
	$template->replace("org_txt", 	$org_txt);
	$template->replace("desig_txt", $desig_txt);
	$template->replace("addr_txt", 	$addr_txt);
	$template->replace("code_txt", 	$code_txt);
	$template->replace("phone_txt", 	$phone_txt);
	$template->replace("city_txt", 	$city_txt);
	$template->replace("pincode_txt", 	$pincode_txt);
	//$template->replace("about_event_txt", 	$about_event_txt);

    if($about_event_txt == 'facebook'){
	   $template->replace("facebook1", 	'SELECTED');
	}else if($about_event_txt == 'google'){
	   $template->replace("google3", 	'SELECTED');
	}else if($about_event_txt == 'emailers'){
	   $template->replace("emailers4", 	'SELECTED');
	}else if($about_event_txt == 'others'){
	   $template->replace("others2", 	'SELECTED');
	}
	
	$template->publish();
	mysql_close();
?>
