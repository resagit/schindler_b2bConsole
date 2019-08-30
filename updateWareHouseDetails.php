<?php


include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";

$shipper_id=$_POST['warehouse_id'];
$shipper_name=urlencode($_POST['warehouse_name']);
$shipper_name=str_replace("%2F","~",$shipper_name);
$contact_person=$_POST['contact_person'];
$contact_no=$_POST['contact_no'];
$mobile_no=$_POST['mobile_no'];
$email=$_POST['email'];
$address1=urlencode($_POST['pr_address']);
$address1=str_replace("%2F","~",$address1);
$address2=urlencode($_POST['sec_address']);
$address2=str_replace("%2F","~",$address2);
$pincode=$_POST['postal_code'];
$city=urlencode($_POST['city']);
$state=urlencode($_POST['state']);

$country=$_POST['country'];



$fields_string="";
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];

//$alternate=$_GET['alternate'];

//echo ($customerNo);
$url="http://".$ip."/updateWareHouseDetails/$shipper_id/$city/$state/$address1/$address2/$pincode/$tin/$cin/$shipper_name/$userNumber/$pass/BMSoperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $url;

