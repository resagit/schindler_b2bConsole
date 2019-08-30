<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
//$alternate=$_GET['alternate'];

//echo ($customerNo);
$sales_id=$_GET['sales_id'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://".$ip."/getChalanNoListForStockTransfer/$sales_id");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;