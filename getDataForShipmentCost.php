<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
//$alternate=$_GET['alternate'];
//getDataForShipmentCost/{fromDate}/{toDate}/{orderType}/{wareHouseID}{companyId}/{userName}/{password}/{userType}
//echo ($customerNo);
//{"startdate":$("#dtp_input2").val(),"enddate":$("#dtp_input3").val(),"company_id":$("#typeids").val(),"warehouse_id":$("#warehouse_id").val(),"order_type":$("#order_type").val()};

$sales_id=$_GET['company_id'];
$start_date=$_GET['startdate'];
$end_date=$_GET['enddate'];
$order_type=$_GET['order_type'];
$warehouse_id=$_GET['warehouse_id'];
$pass=$_SESSION['pass'];
$user_name=$_SESSION['user_names'];
$type="BMSoperational";
$url="http://".$ip."/getDataForShipmentCost/$start_date/$end_date/$order_type/$warehouse_id/$sales_id/$user_name/$pass/$type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;