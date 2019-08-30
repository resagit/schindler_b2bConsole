<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$username=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$app_type="BMSoperational";
//$provider=$_GET['provider'];
//echo ($customerNo);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://".$ip."/companyListForReport/$username/$pass/$app_type");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;