<?php
include_once 'admin-class.php';
session_start();

$shipper_id=$_POST['shipper_id'];
$shipper_name=urlencode($_POST['shipper_name']);
$shipper_code=urlencode($_POST['shipper_code']);
$shipper_name=str_replace("%2F","~",$shipper_name);
$cin=$_POST['cin'];
if($_POST['tin']!=''){
	$tin=$_POST['tin'];
} else {
	$tin="-";	
}
$address1=urlencode($_POST['pr_address']);
$address1=str_replace("%2F","~",$address1);
$address2=urlencode($_POST['sec_address']);
$address2=str_replace("%2F","~",$address2);
$pincode=$_POST['postal_code'];
$city=urlencode($_POST['city']);
$state=urlencode($_POST['state']);
$countryName=urlencode($_POST['country']);
$client_gstin=$_POST['client_gstin'];
$fields_string="";
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];

$url="http://".$ip."/updateShipperDetails/$shipper_id/$city/$state/$address1/$address2/$pincode/$tin/$cin/$shipper_name/$userNumber/$pass/BMSoperational/$client_gstin/$shipper_code/$countryName";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;
?>