<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
$userNumber=$_SESSION['admin_login'];
//$session=$_GET['session'];
//$tran="1000438608669";
$fields_string="";
$rec_name=$_GET['rec_name'];
$mob=$_GET['mob_rec'];
$challan_no=$_GET['challan_no'];
$order_id=$_GET['order_id'];
//$provider=$_GET['provider'];
//echo ($customerNo);
//{"rec_name":rec_name,"mob_rec":delivered_mob,"challan_no":$("#delivered_challan_no").val(),"order_id":$("#delivered_order_id").val()};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://".$ip."/stockTransferDeliver/$challan_no/$order_id/$userNumber/BMSoperational/$rec_name/$mob");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data.$url;





?>