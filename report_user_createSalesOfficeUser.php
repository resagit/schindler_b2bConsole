<?php
include_once 'admin-class.php';
//$retailer="";
session_start();
//$comm=0.60;
$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$users=$_SESSION['user_names'];
$name=$_POST['shipper_name'];
$last_name=$_POST['last_name'];
$user_name=$_POST['user_name'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
$user_Type="BMSOperational";
//echo ($customerNo);
$url="http://".$ip."/createSalesOfficeUser/$name/$last_name/$user_name/$password/BMSreport/$mobile/-/$users/$user_Type/-";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);

//shipper_name=asdasdasd&last_name=sdaasdasasd&user_name=asdsdasdasdasd%40j.cp&password=454545454&mobile=874512122121
?>