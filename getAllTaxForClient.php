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
$companyId=$_GET['companyId'];
$warehouse_id=$_GET['warehouse_id'];
//$provider=$_GET['provider'];
//echo ($customerNo);
////getAllTaxForClient/{wareHouseID}/{companyId}/{userName}/{password}/{userType}

$url= "http://".$ip."/getAllTaxForClient/$warehouse_id/$companyId/$user_names/$pass/BMSOperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>