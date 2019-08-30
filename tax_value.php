<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
include_once 'admin-class.php';



$taxname=str_replace("+","%20",str_replace("%2F","~",urlencode(trim(ucwords($_POST['taxname'])))));

$taxdescription=str_replace("+","%20",str_replace("%2F","~",urlencode(trim(ucwords($_POST['description'])))));

$uom=$_POST['uom'];
//$amount=get_from_name_value('amount');
$amount=str_replace("+","%20",str_replace("%2F","~",urlencode(trim(ucwords($_POST['amount'])))));
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$types="BMSoperational";
$url="http://".$ip."/createTaxValueMaster/$taxname/$taxdescription/$amount/$uom/$username/$types";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;


?>