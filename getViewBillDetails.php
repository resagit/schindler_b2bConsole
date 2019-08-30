<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$user_names=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

$fields_string="";
$companyId=$_GET['company_id'];
$warehouse_id=$_GET['warehouse_id'];
$data=$_GET['startdate'];
//$provider=$_GET['provider'];
//echo ($customerNo);
////generateBill/{date}/{companyId}/{wareHouseID}/{type}/{userName}/{password}/{userType}

$url= "http://".$ip."/generateBill/$data/$companyId/$warehouse_id/view/$user_names/$pass/BMSOperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
?>