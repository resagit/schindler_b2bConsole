<?php
include_once 'admin-class.php';

session_start();
$user_names=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

$fields_string="";
$companyId=$_GET['companyId'];
$warehouse_id=$_GET['warehouse_id'];
//$provider=$_GET['provider'];
//echo ($customerNo);
////getTaxValueMaster/{userName}/{userType}
$url= "http://".$ip."/getTaxValueMaster/$user_names/BMSOperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>