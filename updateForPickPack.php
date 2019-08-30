<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";

$companyId=get_form_name_value('companyId');
$warehouse_id=get_form_name_value('warehouse_id1');
$small_item_price=get_form_name_value('small_item_price');
$medium_item_price=get_form_name_value('medium_item_price');
$large_item_price=get_form_name_value('large_item_price');

$cat_type=get_form_name_value('cat_type');


$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

//$userNumber=$_SESSION['companyID'];

//echo ($customerNo);
/////updatePickPackCost/{companyId}/{wareHouseID}/{smallItemPrice}/{mediumItemPrice}/{largeItemPrice}/{categoryType}/{userName}/{userType}

$url="http://".$ip."/updatePickPackCost/$companyId/$warehouse_id/$small_item_price/$medium_item_price/$large_item_price/$cat_type/$user_name/BMSOperational";
//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>