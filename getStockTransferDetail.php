<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";


//$alternate=$_GET['alternate'];
$challan_no=$_GET['challan_no'];
$order_id=$_GET['order_id'];
//echo ($customerNo);
$url="http://".$ip."/getStockTransferDetail/$challan_no/$order_id";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>