<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
include_once 'admin-class.php';



$taxid=$_POST['taxID'];
$taxValueID=$_POST['taxValueID'];


$uom=$_POST['taxAmountUOMs'];
//$amount=get_from_name_value('amount');
$amount=$_POST['taxAmount'];
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$types="BMSoperational";
$url="http://".$ip."/updateTaxValueMaster/$taxid/$taxValueID/$amount/$uom/$username/$types";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;


?>