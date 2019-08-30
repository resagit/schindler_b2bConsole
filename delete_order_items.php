<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$oid=$_GET['oid'];
$item_id=$_GET['item_id'];
$bom_id=$_GET['bom_id'];
//$userNumber=$_SESSION['companyID'];
//echo ($customerNo);
$url="http://".$ip."/removeOrderItems/$oid/$item_id/$bom_id";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>  