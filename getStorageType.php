<?php
include_once 'admin-class.php';
//$retailer="";
session_start();
//$comm=0.60;
$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];

$user_Type="B2BOperational";
//echo ($customerNo);
$url="http://".$ip."/getStorageType/$user_name/$pass/$user_Type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>