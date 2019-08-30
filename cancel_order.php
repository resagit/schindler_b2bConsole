<?php
include_once 'admin-class.php';




$fields_string="";
session_start();

//$warehouse_id=$_POST['warehouse_id'];
$challan=$_POST['challan'];
$cancel_oid =$_POST['cancel_oid'];
$reason = urlencode($_POST['reason']);
$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass1'];
$url="http://".$ip."/cancelOrderbyOperation/$challan/$cancel_oid/$user_name/BMSoperational/$reason";
//$to =$_POST['to_dates'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url );
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>