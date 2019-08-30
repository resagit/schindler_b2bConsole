<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

session_start();

$sales_off = $_SESSION['companyID'];
//$sales_off = $_GET['sales_off'];
$role_name = urlencode($_GET['role_name']);
$role_desc = urlencode($_GET['role_desc']);
$role_id = $_GET['role_id'];
$position = $_GET['position'];
//$new = str_replace(' ', '%20', $item);
$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
//echo ($item);
$url="http://".$ip."/createRole/$role_name/$role_desc/$role_id/$position/$sales_off/B2BOperation/$user_name/$pass/BMSOperational";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

?>