<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$clientId=$_GET['company_id'];

$items=str_replace(",","*",$_GET['items']);
$items=str_replace(" ","",$items);
//$invoice_no=$_GET['challan_no'];
$startdate=$_GET['startdate'];
$enddate=$_GET['enddate'];
$user_name=$_SESSION["admin_login"];
//echo ($customerNo);
$url="http://".$ip."/getMaterialWiseReport/$clientId/$items/$startdate/$enddate/$user_name/BMSoperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>