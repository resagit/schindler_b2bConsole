<?php 
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;


$pincode=$_GET['pincode'];

//echo ($customerNo);
						
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://".$ip."/selectAddressFromPincode/$pincode");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

?>