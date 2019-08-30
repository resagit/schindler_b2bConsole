<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

session_start();
$username=$_SESSION['user_names'];
$compaid=$_GET['compid'];

$userType="BMSoperational";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://".$ip."/selectCompanyNameImage/$compaid/$username/BMSclient");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
$resultss = curl_exec($ch);


echo $resultss;