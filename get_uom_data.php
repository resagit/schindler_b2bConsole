<?php
include_once 'admin-class.php';
//$retailer="";
session_start();
//$comm=0.60;
$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$users=$_SESSION['user_names'];
//$uom=$_POST['uom'];
//$description=urlencode($_POST['description']);
$user_Type="BMSOperational";

$url="http://".$ip."/getUom/$user_name/$pass/$user_Type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;
//echo $url;


//print_r($url);

//shipper_name=asdasdasd&last_name=sdaasdasasd&user_name=asdsdasdasdasd%40j.cp&password=454545454&mobile=874512122121
?>