<?php
/**
 * Created by PhpStorm.
 * User: Resagit
 * Date: 04/02/17
 * Time: 17:06:37
 */
include_once "admin-class.php";
session_start();
$companyid=$_POST['id'];
$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$users=$_SESSION['user_names'];
$user_Type="BMSOperational";
$url="http://".$ip."/getBom/$companyid/$user_name/$pass/$user_Type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;
?>