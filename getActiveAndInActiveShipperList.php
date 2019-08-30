<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$clientId=$_SESSION['companyID'];
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$clientId=$_GET['sales_id'];

//echo ($customerNo);
$url="http://".$ip."/getAllShipperList/$clientId";
//http://localhost:8080/ResagitB2B/getAllShipperList/CL00000079
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>