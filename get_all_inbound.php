<?php 
include_once 'admin-class.php';



session_start();
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$app_type="BMSoperational";

$fields_string="";

$client_id=$_GET['client_id'];
$from =$_GET['from'];
$material_id=$_GET['material_id'];
$warehouse_id=$_GET['warehouse_id'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://".$ip."/allReportForInbound/$client_id/$material_id/$from/$warehouse_id/$userNumber/$pass/$app_type");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;





?>  