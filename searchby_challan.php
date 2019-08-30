<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$fields_string="";
$clientId=$_GET['sales_id'];
$app_type="BMSoperational";

$invoice_no=$_GET['challan_no'];

//echo ($customerNo);
$url="http://".$ip."/trackByChalanNo/$clientId/$invoice_no/$userNumber/$pass/$app_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>