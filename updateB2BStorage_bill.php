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
$str_type=get_form_name_value('str_type');
$bill_type=get_form_name_value('bill_type');
$quantity=get_form_name_value('quantity');

$uom=get_form_name_value('uom');
$str_amt=get_form_name_value('str_amt');
$amt_unit=get_form_name_value('amt_unit');
$amt_cycle=get_form_name_value('amt_cycle');
$str_height=get_form_name_value('str_height');

$str_weight=get_form_name_value('str_weight');

$str_length=get_form_name_value('str_length');


$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

//$userNumber=$_SESSION['companyID'];

//echo ($customerNo);
///updateStorageCost/{companyId}/{wareHouseID}/{storageTypeID}/{billingTypeID}/{usageQuantity}/{usageUom}/{amount}/{amountUnit}/{amountCycle}/{height}/{width}/{length}/{userName}/{userType}
$url="http://".$ip."/updateStorageCost/$companyId/$warehouse_id/$str_type/$bill_type/$quantity/$uom/$str_amt/$amt_unit/$amt_cycle/$str_height/$str_weight/$str_length/$user_name/BMSOperational";
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