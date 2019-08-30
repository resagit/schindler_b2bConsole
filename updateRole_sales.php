<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";



session_start();
$fields_string="";
$clientId=$_POST['sales_off'];
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";
//{"main_role_id":$("#roles").val(),"role_id":roles_id,"postions":postions}
$roles_id=$_POST['role_id'];
$postions=$_POST['postions'];
$main_role_id=$_POST['main_role_id'];
//echo ($customerNo);
$url="http://".$ip."/updateRole/$main_role_id/$roles_id/$postions/$clientId/$username/$pass/$user_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>