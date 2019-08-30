<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$userNumber=$_SESSION['admin_login'];

$pass=$_SESSION['pass'];

//$alternate=$_GET['alternate'];
$material_id=urlencode(str_replace('\\','`',str_replace("/","~",$_GET['material_id'])));
$material_name=urlencode(str_replace('\\','`',str_replace("/","~",$_GET['material_name'])));
$base_uom=$_GET['base_uom'];
$cmt_id=$_GET['cmt_id'];
$material_price=$_GET['material_price'];
$material_height=$_GET['material_height'];
$material_width=$_GET['material_width'];
$material_length=$_GET['material_length'];
//$material_new_weight=$_GET['material_new_weight'];
//$material_gross_weight=$_GET['material_gross_weight'];
$material_new_weight='-';
$material_gross_weight='-';
$material_is_fragile=$_GET['material_is_fragile'];
$material_is_flamable=$_GET['material_is_flamable'];
$material_order_quantity=$_GET['material_order_quantity'];
$putPickType=$_GET['put_pick'];
$qrStatus=$_GET['qrcode'];
//echo ($customerNo);
$url="http://".$ip."/updateMaterial/$cmt_id/$material_name/$material_id/$base_uom/$material_price/$material_height/$material_width/$material_length/$material_new_weight/$material_gross_weight/-/$material_is_fragile/$material_is_flamable/$material_order_quantity/$userNumber/$putPickType/$pass/BMSoperational/$qrStatus";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;





?>