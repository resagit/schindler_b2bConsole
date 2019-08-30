<?php
include_once 'admin-class.php';
session_start();

$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$users=$_SESSION['user_names'];
if($_POST['measure_id']!=''){
$measure_id=$_POST['measure_id'];
} else {
$measure_id="-";	
}
if($_POST['uom']!=''){
$unit_measure_id=trim($_POST['uom']);
} else {
$unit_measure_id="-";	
}
if($_POST['description']!=''){
$description=trim(str_replace("+"," ",$_POST['description']));
} else {
$description="-";	
}
$user_Type="BMSOperational";

$url="http://".$ip."/UpdateUom/$measure_id/$unit_measure_id/$description/$user_name/$pass/$user_Type";
//echo $url; die;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

?>