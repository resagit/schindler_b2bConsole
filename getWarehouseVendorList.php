<?php

include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string = "";
$userNumber = $_SESSION['admin_login'];


//$alternate=$_GET['alternate'];
//echo ($customerNo);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://" . $ip . "/getWarehouseVendorList/$userNumber/BMSoperational");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

