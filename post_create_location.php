<?php
include_once 'admin-class.php';

session_start();
//$fields_string="";

$joinarray=array();

$warehouseid=$_POST['wareHouseID'];
$Physical=explode("*",$_POST['Physical']);
$Bin=explode("*",$_POST['Bin']);
$Level=explode("*",$_POST['Level']);
$Row=explode("*",$_POST['Row']);
$Column=explode("*",$_POST['Column']);
$Zone=explode("*",$_POST['Zone']);
$Floor=explode("*",$_POST['Floor']);
$StorageProperty=explode("*",$_POST['StorageProperty']);
$Weight=explode("*",$_POST['Weight']);
$isTemperature=explode("*",$_POST['isTemperature']);
$MinTemperature=explode("*",$_POST['MinTemperature']);
$MaxTemperature=explode("*",$_POST['MaxTemperature']);
$StorageType=explode("*",$_POST['StorageType']);
$Availability="bms";
$userName=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";

//print_r($materialItemID);
//print_r($uom);
//http://localhost:8080/ResagitB2B/createWarehouseLocationFromUI
$count=count($Physical);
for($i=0;$i<$count;$i++)
{
    // echo $materialItemID[$i];
    array_push($joinarray,array("physicalID"=>"$Physical[$i]","binID"=>"$Bin[$i]","levelID"=>"$Level[$i]","rowID"=>"$Row[$i]","columnID"=>"$Column[$i]","zoneID"=>"$Zone[$i]","floorID"=>"$Floor[$i]","storagePropertyID"=>"$StorageProperty[$i]","weightCapacity"=>"$Weight[$i]","isTemperatureControl"=>"$isTemperature[$i]","minTemperature"=>"$MinTemperature[$i]","maxTemperature"=>"$MaxTemperature[$i]","storageType"=>"$StorageType[$i]","availability"=>"$Availability"));

}
//print_r($joinarray);
$main_array=Array("wareHouseID"=>"$warehouseid","username"=>"$userName","usertype"=>"$user_type","password"=>"$pass","locationItems"=>$joinarray);


//array_push($main_array['bomItems'],$joinarray);
//$main_array=Array("code"=>$code,"description"=>"$description","companyID"=>"$clientId","price"=>"$price","username"=>"$userName","usertype"=>"$user_type","password"=>"$pass","bomItems" =>Array("materialID"=>Array("$materialItemID"),"quantity"=>Array("$quantity"),"uom"=>Array("$uom"),"price"=>Array("$perUnitPrice")));
$url="http://".$ip."/createWarehouseLocationFromUI";
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
//echo $responses;
echo $responses;





?>