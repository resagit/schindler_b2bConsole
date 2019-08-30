<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$clientId=$_SESSION['companyID'];
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$emp_id=$_POST['emp_id'];
$role_id=$_POST['role_id'];

//http://192.168.1.9:8080/ResagitB2B/updateUserRole/EMP00029/ROLE00042/dhwanik@bira.com/1111/BMSClient
$url="http://".$ip."/updateUserRole/$emp_id/$role_id/$username/$pass/BMSoperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>