<?php
include_once 'admin-class.php';




$fields_string="";

//$warehouse_id=$_POST['warehouse_id'];
$client_id=$_POST['client_id'];
$from =$_POST['from_dates'];
$to =$_POST['to_dates'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://".$ip."/getOrderDataByDate/$client_id/$from/$to");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>