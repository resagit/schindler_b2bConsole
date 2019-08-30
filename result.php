<?php
include_once 'admin-class.php';


session_start();
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$app_type="BMSoperational";

$fields_string="";

$warehouse_id=$_POST['warehouse_id'];
$client_id=$_POST['client_id'];
$from =$_POST['dates'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://".$ip."/allStockReportForClient/$client_id/$from/$warehouse_id/$userNumber/$pass/$app_type");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>