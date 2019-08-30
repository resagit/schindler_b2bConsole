<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";

$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

//$userNumber=$_SESSION['companyID'];

//echo ($customerNo);
http://localhost:8080/ResagitB2B/getAllBillType/userName/password/userType
$url="http://".$ip."/getAllBillType/$user_name/$pass/BMSOperational";//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>