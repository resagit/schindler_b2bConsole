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
$warehouseid=$_GET['warehouse_id'];


//localhost:8080/ResagitB2B/getAllLocationList/{wareHouseID}/{userName}/{password}/{userType}
$url= "http://".$ip."/getAllLocationList/$warehouseid/$userNumber/$pass/BMSoperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
//echo $data;
echo $data;





?>