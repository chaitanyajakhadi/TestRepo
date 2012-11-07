<?php
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
date_default_timezone_set('Asia/Kolkata');

$terms_txt	=	trim($_POST['terms_txt']);
if ($terms_txt == 1){
	include('common.php');
	include_once 'validate_form.php';	
    
	if(!$code_txt){$code_txt = NULL;}
	$today		=	time();	
	$vistorid	=	randomPrefix(6);
	$name_txt	=	validateInput($name_txt);
	$email_txt	=	validateInput($email_txt);
	$org_txt	=	validateInput($org_txt);
	$desig_txt	=	validateInput($desig_txt);
	$addr_txt	=	validateInput($addr_txt);
	$code_txt	=	validateInput($code_txt);
    $phone_txt = validateInput($phone_txt);
    $city_txt = validateInput($city_txt);
    $pincode_txt = validateInput($pincode_txt);
    $about_event_txt = validateInput($about_event_txt);	
	
	$user_register=array(
		'CODE_TXT'=>$code_txt,
		'NAME_TXT'=>"$name_txt",
		'EMAIL_TXT'=>"$email_txt",
		'ORG_TXT'=>"$org_txt",
		'DESIG_TXT'=>"$desig_txt",
		'ADDR_TXT'=>"$addr_txt",
		'PHONE_TXT'=>"$phone_txt",
		'CITY_TXT'=>"$city_txt",
		'PINCODE_TXT'=>"$pincode_txt",
		'ABOUT_EVENT_TXT'=>"$about_event_txt",		
		'VISTORID'=>"$vistorid",
		'ADDEDON'=>"$today",
		'UPDATEDON'=>"$today"
	);
	$userid		=	insert('tbl_user_360',$user_register);
	
	$mailerhtml	=	'';
	$mailerhtml	 =	'<!DOCTYPE HTML>';
	$mailerhtml	.=	'<html lang="en">';
	$mailerhtml	.=	'<head>';
	$mailerhtml	.=	'<meta charset="utf-8" />';
	$mailerhtml	.=	'<title>Consumer 360 India: Winning in India, New Delhi  - Online Registration</title>';
	$mailerhtml	.=	'<link href="http://nielsen.digitalhathi.com/resources/ca.css" media="screen, print" rel="stylesheet" type="text/css" />';
	$mailerhtml	.=	'</head>';
	$mailerhtml	.=	'<body style="margin:0px;padding:0px;">';
	$mailerhtml	.=	'<div id="" style="width:480px;">';
	if($code_txt!=NULL){
		
		$mailerhtml	.=	'<div style="width:480px;border-bottom:2px solid #C43F2C;"><span style="width:470px;text-align:center;font-size: 24px;line-height:40px;font-weight: normal;color:#C43F2C;padding:0 5px;">Your Ticket.</span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;"><span style="width:470px;text-align:center;font-size: 18px;line-height:55px;font-weight: bold;color:#000000;padding:0 5px;">Hi '.$name_txt.',</span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;"><span style="width:470px;text-align:center;font-size: 12px;line-height:40px;font-weight: normal;color:#000000;padding:0 5px;">This is confirmation of your order for <b>Consumer 360 India: Winning in India</b> ticket(s).</span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;background-color:#cccccc;text-align:center;"><span style="width:470px;font-size: 14px;line-height:34px;font-weight: normal;color:#000000;padding:0 5px;"><b/>Your Unique Registration Id is: '.$vistorid.'</b></span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;margin-left:10px;"><span style="width:470px;text-align:left;font-size: 13px;line-height:18px;font-weight: normal;color:#000000;"><br/>Thank you,<br/>The Organizing Team<br/>Consumer 360 India:Winning in India<br/><a href="http://nielsen.digitalhathi.com" target="_blank">http://nielsen.digitalhathi.com</a></span><div class="clear"></div></div>';
	}else{
		$mailerhtml	.=	'<div style="width:480px;border-bottom:2px solid #C43F2C;"><span style="width:470px;text-align:center;font-size: 24px;line-height:40px;font-weight: normal;color:#C43F2C;padding:0 5px;">Offline Payment Order</span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;"><span style="width:470px;text-align:center;font-size: 18px;line-height:55px;font-weight: bold;color:#000000;padding:0 5px;">Hi '.$name_txt.',</span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;margin:0 5px 10px 5px;"><span style="width:470px;text-align:center;font-size: 12px;line-height:14px;font-weight: normal;color:#000000;">An Offline Payment order has been placed for the tickets to the Consumer 360 India: Winning in India event. </span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;border-top:1px solid #cccccc;border-bottom:1px solid #cccccc;text-align:left;margin: 15px 5px;"><span style="width:470px;font-size: 14px;line-height:16px;font-weight: normal;color:#000000;"><br/><b>Unique ID :</b> '.$vistorid.'<br/>';
		$mailerhtml	.=	'<b>No. of tickets :</b> 1<br/><b>Order Amount :</b> 4,000.00 INR<br/><br/>';
		$mailerhtml	.=	'<b>Attendee Details</b><br/>';
		$mailerhtml	.=	'<b>Name :</b> '.$name_txt.'<br/>';
		$mailerhtml	.=	'<b>Email :</b> '.$email_txt.'<br/><br/></span><div class="clear"></div></div>';
		$mailerhtml	.=	'<div style="width:480px;margin:5px;"><span style="width:470px;text-align:left;font-size: 15px;line-height:18px;font-weight: normal;color:#000000;">Please contact for further details.</span><div class="clear"></div></div>';
	}
	$mailerhtml	.=	'</div>';
	$mailerhtml	.=	'</body></html>';
	
	$mailertxt		=	'';
	$useremail		=	$email_txt;
	$userfullname	=	$name_txt;
	$subject		=	'Nielsen Consumer 360 Registration Detail';
	$htmlbody		=	$mailerhtml;
	$textbody		=	$mailertxt;
	$emailresult	=	send360email($useremail,$userfullname,$subject,$htmlbody,$textbody);
	mysql_close();
	if($userid){
	   if($code_txt) $msg = 1; else $msg = 0;
	   header('Location: thankyou.php?msg='.$msg); exit();
	}else{
		header('Location: index.php?msg=5'); exit();
	}
}else{
	header('Location: index.php'); exit();
}
?>