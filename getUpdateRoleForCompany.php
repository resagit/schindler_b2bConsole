
<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$clientId=$_GET['sales_off'];
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$emp_id=$_GET['emp_id'];

//echo ($customerNo);
 $url="http://".$ip."/getRoleForClient/$clientId/B2BClient/$username/$pass/BMSOperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);
