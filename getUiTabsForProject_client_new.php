<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";



session_start();
$fields_string="";
$clientId=$_SESSION['companyID'];
$userNumber=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSclient";
$total=$_SESSION['roles_id'];
//echo ($customerNo);
$url="http://".$ip."/getUiTabsForProject/B2Bclient/13/$userNumber/$pass/$user_type";
//$url="http://".$ip."/ResagitB2B/getUiTabsForProject/B2Bclient/13/$userNumber/$pass/$user_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>