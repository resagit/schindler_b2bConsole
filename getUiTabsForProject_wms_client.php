<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";



session_start();
$fields_string="";
$clientId=$_SESSION['companyID'];
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$user_type="BMSOperational";

//echo ($customerNo);
//$url="http://".$ip."/ResagitB2B/getUiTabsForProject/B2Bclient/8/$userNumber/$pass/$user_type";
$url="http://".$ip."/getUiTabsForProject/B2BOperation/15/$userNumber/$pass/$user_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>