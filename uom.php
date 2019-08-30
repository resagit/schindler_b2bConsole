<?php 
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;


$client_id = $_GET['client_id'];
$item = $_GET['item'];
$new = str_replace(' ', '%20', $item);
//echo ($item);
$url="http://".$ip."/getUomForWeb/$client_id/$new";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;
?>