<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$clientId=$_GET['sales_id'];

$startdate=$_GET['startdate'];
$enddate=$_GET['enddate'];
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$app_type="BMSoperational";

//echo ($customerNo);
$url="http://".$ip."/trackByDate/$clientId/$startdate/$enddate/$userNumber/$pass/$app_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>