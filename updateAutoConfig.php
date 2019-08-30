<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";

$companyId=$_POST['companyId'];
$warehouse_id=$_POST['warehouseid'];

$Unload=$_POST['unload'];
$quantityCheck=$_POST['Quantity'];
$Qualitycheck=$_POST['Quality'];
$PutAway=$_POST['Put_away'];
$pick=$_POST['Pick'];
$Kitting=$_POST['Kitting'];
$GoodIssue=$_POST['GoodIss'];
$goodDeliver=$_POST['GoodDeliver'];
$gate_entry=$_POST['gate_entry'];

$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];


//echo ($customerNo);
//localhost:8080/ResagitB2B/clientWaregouseConfig/{clientID}/{warehouseID}
$sames=array("warehouseID"=>$warehouse_id,"clientID"=>$companyId,"unloadStatus"=>$Unload,"quantityStatus"=>$quantityCheck,"qualityStatus"=>$Qualitycheck,"putawayStatus"=>$PutAway,"pickStatus"=>$pick,"kittingStatus"=>$Kitting,"goodsIssueStatus"=>$GoodIssue,"goodsDeliverStatus"=>$goodDeliver,"gate_entry"=>$gate_entry);
$data_string = json_encode($sames);
$url="http://".$ip."/clientWaregouseConfig";
//echo $url;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);
$response = curl_exec($ch);
echo $response;

//print_r($url);


?>