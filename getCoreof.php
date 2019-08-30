<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();

$username=$_COOKIE['user_name'];
$pass=$_SESSION['pass'];
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
//$alternate=$_GET['alternate'];

//echo ($customerNo);
$careOfId=$_GET['care_of_id'];
$client_id=$_GET['client_id'];

$ch = curl_init();
$url="http://".$ip."/getConsigneeDetails/$careOfId/$client_id/$username/$pass/BMSoperational";
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>