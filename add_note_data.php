<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$pass=$_SESSION['pass'];
$username= $_SESSION['user_names'];
$user_type="BMSoperational";
//$alternate=$_GET['alternate'];
//$provider=$_GET['provider'];
//echo ($customerNo);
$notess=urlencode(preg_replace('~[\r\n]+~','',$_GET['comments']));
$notess=str_replace("+","%20",$notess);

$order_id=$_GET['o_id'];
$url="http://".$ip."/addNote/$order_id/$notess/$username/$pass/$user_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>