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
$warehouse_id=get_form_name_value('warehouseid');
$companyId=get_form_name_value('cmp_id');
$billTypeID=get_form_name_value('roles');
//$userNumber=$_SESSION['companyID'];

//echo ($customerNo);
//
http://localhost:8080/ResagitB2B/assignBillTypeToClient/{companyId}/{wareHouseID}/{billTypeID}/{userName}/{password}/{userType}
$url="http://".$ip."/assignBillTypeToClient/$companyId/$warehouse_id/$billTypeID/$user_name/$pass/BMSOperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>