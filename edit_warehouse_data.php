<?php


include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";

$warehouse_id=$_POST['warehouse_id'];
$warehouse_name=urlencode($_POST['warehouse_name']);
$warehouse_name=str_replace("%2F","~",$warehouse_name);
$warehouse_code=urlencode($_POST['warehouse_Code']);
$warehouse_code=str_replace("%2F","~",$warehouse_code);
$mobile_no=$_POST['mob'];
$address1=urlencode($_POST['pr_address']);
$address1=str_replace("%2F","~",$address1);
$address2=urlencode($_POST['sec_address']);
$address2=str_replace("%2F","~",$address2);
$pincode=$_POST['postal_code'];
$city=urlencode($_POST['city']);
$state=urlencode($_POST['state']);
$email_id=$_POST['email_id'];
$con_name=urlencode($_POST['contact_name']);
$con_no=$_POST['con_mob'];
$country=$_POST['country'];

$fields_string="";
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];

//$alternate=$_GET['alternate'];

//echo ($customerNo);
$url="http://".$ip."/updateWareHouseDetails/$warehouse_id/$warehouse_name/$con_name/$con_no/$mobile_no/$email_id/$city/$state/$address1/$address2/$pincode/$userNumber/$pass/BMSoperational/$warehouse_code";
//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

