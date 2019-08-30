<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$userNumber=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$locationID=$_GET['Location_id'];
//$alternate=$_GET['alternate'];
$cmt_id=$_GET['cmt_id'];
$warehouse_id=$_GET['warehouse_id'];
//localhost:8080/ResagitB2B/getLocationDetails/{locationID}/{wareHouseID}/{userName}/{password}/{userType}
$url= "http://".$ip."/getLocationDetails/$locationID/$warehouse_id/$userNumber/$pass/BMSoperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;





?>