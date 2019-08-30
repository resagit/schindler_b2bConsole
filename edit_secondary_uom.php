<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$companyId=$_POST['companyId'];
$materialID=$_POST['materialItemID'];
$baseUom=$_POST['base_uom'];
$newUom=$_POST['new_uom'];
$quantity=$_POST['quantity'];
$userNumber=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

//$alternate=$_GET['alternate'];
$cmt_id=$_GET['cmt_id'];
//echo ($customerNo);

$ch = curl_init();
$url= "http://".$ip."/updateMaterialConversion/$companyId/$materialID/$baseUom/$newUom/$quantity/$userNumber/$pass/BMSoperational";
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;





?>