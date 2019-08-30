<?php
include_once 'admin-class.php';
//$retailer="";
session_start();
//$comm=0.60;
$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$users=$_SESSION['user_names'];
$uom=rawurlencode($_POST['uom']);
$description=rawurlencode($_POST['description']);
$user_Type="BMSOperational";
//echo ($customerNo);
//$url="http://".$ip."/ResagitB2B/createSalesOfficeUser/$name/$last_name/$user_name/$password/BMSreport/$mobile/-/$users/$user_Type/-";
$url="http://".$ip."/createNewUom/$uom/$description/$user_name/$pass/$user_Type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;


//print_r($url);

//shipper_name=asdasdasd&last_name=sdaasdasasd&user_name=asdsdasdasdasd%40j.cp&password=454545454&mobile=874512122121
?>