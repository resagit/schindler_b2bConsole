<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
include_once 'admin-class.php';

//$companyId=get_form_name_value('companyId');
$companyId=$_POST['companyId'];
//$warehouseid=get_from_name_value('warehouse_id');
$warehouseid=$_POST['warehouse_id'];
//$fromsku=get_from_name_value('from_sku');
$fromsku=$_POST['from_sku'];
//$tosku=get_from_name_value('to_sku');
$tosku=$_POST['to_sku'];
//$amount=get_from_name_value('amount');
$amount=$_POST['amount'];
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$types="BMSoperational";
$url="http://".$ip."/updateOrderHandlingCost/$companyId/$warehouseid/$fromsku/$tosku/$amount/$username/$types";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;


?>