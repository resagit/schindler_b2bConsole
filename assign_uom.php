<?php
include_once 'admin-class.php';


session_start();

$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$users=$_SESSION['user_names'];
$uom_id=$_POST['uom'];
$active=$_POST['active'];
$user_Type="BMSOperational";
$url="http://".$ip."/ActiveInActiveUom/$uom_id/$active/$user_name/$pass/$user_Type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;





?>