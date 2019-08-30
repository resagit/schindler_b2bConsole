<?php
include_once "admin-class.php";
session_start();
$bom_id=$_POST['id'];
$userName=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";


$url="http://".$ip."/getBomItems/$bom_id/$userName/$pass/$user_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;

?>