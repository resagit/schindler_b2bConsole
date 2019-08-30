<?php
include('admin-class.php');
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$clientId=$_GET['clientId'];
$userNumber=$_SESSION['mob'];


$challan_no=$_GET['challan_no'];
$order_id=$_GET['order_id'];

//echo ($customerNo);
//allAsnChalanAndItemDetail
//allGoodIssueItemsDetail
$url="http://".$ip."/allAsnChalanAndItemDetail/$challan_no/$order_id/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>