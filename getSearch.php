<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
$user_name=$_COOKIE['user_name'];
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$sales_id=$_POST['sales_id'];
$challan_no=$_POST['challan_no'];
$user_Type="BMSoperational";
//echo ($customerNo);
$url="http://".$ip."/getChalanDetailForEdit/$challan_no/$sales_id/$user_name/$user_Type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>