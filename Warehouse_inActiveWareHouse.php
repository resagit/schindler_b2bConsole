<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";


//{"sales_id":$("#typeids").val(),"emp_id":$(this).attr("id"),"user_name":$(this).attr("title"),"status":0};
session_start();
$fields_string="";
$clientId=$_SESSION['companyID'];
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";
$emp_id=$_POST['warehouse_id'];
$staus=$_POST['status'];

//ResagitB2B/inActiveUser/EMP00029/amish@cerana.in/CL00000079/0/dhwanik@bira.com/1111/BMSClient

$url="http://".$ip."/inActiveWareHouse/$emp_id/$username/$staus/$pass/$user_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>