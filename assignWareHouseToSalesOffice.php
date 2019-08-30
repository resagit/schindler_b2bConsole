<?php
include_once 'admin-class.php';




$fields_string="";

$company_id=$_GET['company_id'];
$sales_off_id=$_GET['sales_office_id'];

$warehouse_id=$_GET['warehouse_id'];
$url="http://".$ip."/assignWareHouseToSalesOffice/$company_id/$sales_off_id/$warehouse_id";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>