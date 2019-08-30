<?php


include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";

$com_id=$_POST['company_id'];
$warehouse_name=urlencode($_POST['warehouse_name']);
$warehouse_name=str_replace("%2F","~",$warehouse_name);
$warehouse_code=urlencode($_POST['warehouse_code']);
$warehouse_code=str_replace("%2F","~",$warehouse_code);
//$warehouse_name=urlencode($warehouse_name);
$mobile_no=$_POST['mobile_no'];
$address1=urlencode($_POST['address_one']);

$address1=str_replace("%2F","~",$address1);
$address2=urlencode($_POST['address_sec']);
$address2=str_replace("%2F","~",$address2);

$pincode=$_POST['pincode'];
$city=urlencode($_POST['city']);
$state=urlencode($_POST['state']);
$email_id=$_POST['email_id'];
$con_name=urlencode($_POST['contact_name']);
$con_no=$_POST['contact_number'];



$fields_string="";
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];

//$alternate=$_GET['alternate'];
$cmt_id=$_GET['cmt_id'];
//echo ($customerNo);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://".$ip."/createWareHouse/$warehouse_name/$com_id/$city/$state/$address1/$address2/$pincode/$con_name/$con_no/$email_id/$mobile_no/$userNumber/$pass/BMSoperational/$warehouse_code");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//company_id=CL00000089&warehouse_name=sdaasd&mobile_no=8953001501&address_one=assdsad&address_sec=sdsadsd&pincode=400060&city=Mumbai&state=MAHARASHTRA&email_id=sdjkksad%40j.com&contact_name=sdsda&contact_number=89896522332


///createWareHouse/{warehouseName}/{companyId}/{cityName}/{stateName}/{address1}/{address2}/{postCode}/"{contactPersonName}/{contactPersonNumber}/{email}/{mobileNo}/{userName}/{password}/{userType}

