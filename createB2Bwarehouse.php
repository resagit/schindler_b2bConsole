<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_POST['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$company_id=$_POST['company_name'];
$client_name=urlencode($_POST['shipper_name']);
//$company_name=urlencode($_POST['company_name']);

$warehouse_mob=urlencode($_POST['warehouse_mob']);


$warehouse_add1=urlencode($_POST['warehouse_add1']);
$warehouse_add2=urlencode($_POST['warehouse_add2']);
$client_add1=str_replace("%2F","~",$warehouse_add1);
$client_add2=str_replace("%2F","~",$warehouse_add2);

/*$client_add1=urlencode(str_replace("%2F","~",$_POST['shipper_add1']));
$client_add2=urlencode(str_replace("%2F","~",$_POST['shipper_add2']));*/
$client_pin=$_POST['shipper_pincode'];
$client_city=urlencode($_POST['warehouse_city']);
$client_state=urlencode($_POST['warehouse_state']);
$client_email=urlencode($_POST['warehouse_email']);
$contact_name=urlencode($_POST['contact_name']);
$contact_no=$_POST['contact_no'];

$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

//$userNumber=$_SESSION['companyID'];
//company_name=CL00000100&shipper_name=sdasdsasd&warehouse_mob=87845152112&warehouse_add1=dfsddfs&warehouse_add2=544545454&shipper_pincode=400000&warehouse_city=&warehouse_state=&warehouse_email=asasas%40k.com&contact_name=554das5d54as&contact_no=78745121212
//echo ($customerNo);
///http://" + ipaddress + "/ResagitB2B/createWareHouse/" + name + "/"+companySeletedID+"/" + city + "/" + state + "/" + addressone + "/" + addresstwo + "/" + pincode + "/"+contact_name+"/"+contact_no+"/" + emailId + "/"+mobileNo+"/"+ userNumber + "/" + userPass + "/" + type;
$url="http://".$ip."/createWareHouse/$client_name/$company_id/$client_city/$client_state/$client_add1/$client_add2/$client_pin/$contact_name/$contact_no/$client_email/$warehouse_mob/$user_name/$pass/BMSOperational";//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

//print_r($url);


?>