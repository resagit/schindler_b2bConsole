<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$company_type=$_GET['company_name'];
$client_name=urlencode($_GET['shipper_name']);
$last_name=urlencode($_GET['last_name']);
$user_names=urlencode($_GET['user_name']);
$password=urlencode($_GET['password']);
$mobile_no=urlencode($_GET['mobile_no']);
$user_role=urlencode($_GET['user_role']);
//$company_name=urlencode($_GET['company_name']);


$user_role=$_GET['role_id'];



$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

//$userNumber=$_SESSION['companyID'];

//echo ($customerNo);
$url="http://".$ip."/createWareHouseUser/$client_name/$last_name/$user_names/$password/wareHouseManager/$mobile_no/$user_name/BMSOperational/$company_type/$user_role";//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>