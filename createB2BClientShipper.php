<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$company_type=$_GET['company_name'];
$client_name=urlencode($_GET['shipper_name']);
$shipper_code=urlencode($_GET['shipper_code']);
//$company_name=urlencode($_GET['company_name']);
if($_GET['shipper_cin']!=''){
$client_cin=urlencode($_GET['shipper_cin']);
} else {
$client_cin="-";	
}
if($_GET['shipper_vat']!=''){
$shipper_vat=urlencode($_GET['shipper_vat']);
} else {
$shipper_vat="-";	
}
if($_GET['shipper_tin']!=''){
$client_tin=urlencode($_GET['shipper_tin']);
} else {
$client_tin="-";	
}
$client_add1=urlencode($_GET['shipper_add1']);
$client_add2=urlencode($_GET['shipper_add2']);
$client_add1=str_replace("%2F","~",$client_add1);
$client_add2=str_replace("%2F","~",$client_add2);

/*$client_add1=urlencode(str_replace("%2F","~",$_GET['shipper_add1']));
$client_add2=urlencode(str_replace("%2F","~",$_GET['shipper_add2']));*/
$client_pin=$_GET['shipper_pincode'];
$client_city=urlencode($_GET['shipper_city']);
$client_state=urlencode($_GET['shipper_state']);

$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

$client_gstin=urlencode($_GET['client_gstin']);
$client_country=urlencode($_GET['client_country']);
//$userNumber=$_SESSION['companyID'];

//echo ($customerNo);
$url="http://".$ip."/createB2BClientShipper/$client_name/$company_type/$client_city/$client_state/$client_add1/$client_add2/$client_pin/$client_tin/$client_cin/$shipper_vat/$user_name/$pass/BMSOperational/$client_country/$client_gstin/$shipper_code";//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;
//print_r($url);


?>