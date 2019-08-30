<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
include_once 'admin-class.php';




$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$types="BMSoperational";
$url="http://".$ip."/getTaxValueMaster/$username/$types";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;



?>