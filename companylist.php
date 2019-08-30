<?php 
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";

$pass=$_SESSION['pass'];
//$_SESSION['companyID']=$comid;

//$_SESSION['user_names']=$username;
$username=$_SESSION['admin_login'];
$order="BMSoperational";
$url="http://".$ip."/getCompanyList/$username/$pass/$order";

// echo $url; die;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


?>