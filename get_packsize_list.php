<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";



session_start();
$fields_string="";
$clientId=$_POST['company_id'];
$userNumber=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";

//echo ($customerNo);
$url="http://".$ip."/getAllMaterialListWithPackSize?companyId=$clientId";
//$url="http://".$ip."/ResagitB2B/getCompanyMaterialList/$clientId";
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