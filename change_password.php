<?php
include('admin-class.php');
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
//$alternate=$_GET['alternate'];
//$provider=$_GET['provider'];
//echo ($customerNo);
$old_pass=$_GET['old_pass'];
$new_pwd=$_GET['new_pass'];
session_start();
$user_name=$_SESSION['admin_login'];
$ch = curl_init();
$url="http://".$ip."/b2bCompanyUserPasswordChange/$user_name/$old_pass/$new_pwd";
curl_setopt($ch, CURLOPT_URL,$url );
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;





?>