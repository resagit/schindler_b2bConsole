<?php
include_once 'admin-class.php';
session_start();
//$fields_string="";
$joinarray=array();
$location=$_POST['locatin_id'];
$Physical=$_POST['Physical'];
$Bin=$_POST['Bin'];
$Level=$_POST['Level'];
$Row=$_POST['Row'];
$Column=$_POST['Column'];
$Zone=$_POST['Zone'];
$Floor=$_POST['Floor'];
$StorageProperty=$_POST['StorageProperty'];
$Weight=$_POST['Weight'];
$isTemperature=$_POST['isTemperature'];
$MinTemperature=$_POST['MinTemperature'];
$MaxTemperature=$_POST['MaxTemperature'];
$StorageType=$_POST['StorageType'];
$Availability="bms";
$userName=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";
$wareHouseID=$_POST['ware_id'];

//print_r($materialItemID);

//print_r($uom);
//http://localhost:8080/ResagitB2B/createWarehouseLocationFromUI

    // echo $materialItemID[$i];
  //  array_push($joinarray,array("locationID"=>"$location","physicalID"=>"$Physical","binID"=>"$Bin","levelID"=>"$Level","rowID"=>"$Row","columnID"=>"$Column","zoneID"=>"$Zone","floorID"=>"$Floor","storagePropertyID"=>"$StorageProperty","weightCapacity"=>"$Weight","isTemperatureControl"=>"$isTemperature","minTemperature"=>"$MinTemperature","maxTemperature"=>"$MaxTemperature","storageType"=>"$StorageType","availability"=>"$Availability"));


    array_push($joinarray,array("locationID"=>"$location","physicalID"=>"$Physical","levelID"=>"$Level","rowID"=>"$Row","columnID"=>"$Column","floorID"=>"$Floor","storagePropertyID"=>"$StorageProperty","storageType"=>"$StorageType","availability"=>"$Availability"));


//print_r($joinarray);
$main_array=Array("wareHouseID"=>"$wareHouseID","username"=>"$userName","usertype"=>"$user_type","password"=>"$pass","locationItems"=>$joinarray);
//http://localhost:8080/ResagitB2B/updateWarehouseLocationFromUI
//$main_array=Array("code"=>$code,"description"=>"$description","companyID"=>"$clientId","price"=>"$price","username"=>"$userName","usertype"=>"$user_type","password"=>"$pass","bomItems" =>Array("materialID"=>Array("$materialItemID"),"quantity"=>Array("$quantity"),"uom"=>Array("$uom"),"price"=>Array("$perUnitPrice")));
$url="http://".$ip."/updateWarehouseLocationFromUI";
$data_string = json_encode($main_array);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);
$responses = curl_exec($ch);
echo $responses;
//echo $data_string;





?>