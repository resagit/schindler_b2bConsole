<?php
include_once 'admin-class.php';
session_start();
$fields_string="";

$userNumber=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";

$id=$_GET['id'];
//echo ($customerNo);
$url="http://".$ip."/getWareHouseDetails/$id";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>