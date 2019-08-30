<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
$companyId=$_GET['companyId'];
$materialCode=$_GET['materialCode'];
$client_material_id=$_GET['client_material_id'];
//$base_uom=$_GET['base_uom'];
$second_uom=$_GET['second_uom'];
$packQty=$_GET['packQty'];
$packSize=$_GET["packSize"];

$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
/*$item = $_GET['item_id'];
$new_item_id= str_replace(' ','%20',$item);
$item_name= $_GET['item_name'];
$new_item_name = str_replace(' ','%20',$item_name);
$new_item_name =str_replace('*','x',$new_item_name);
$item_uom= $_GET['item_uom'];
$new_item_uom = str_replace(' ','%20',$item_uom);
//echo ($item);
*/
$url="http://".$ip."/definePackSize?clientMaterialID=$client_material_id&materialCode=$materialCode&companyId=$companyId&packQty=$packQty&packSize=$packSize&uom=$second_uom&userID=$user_name";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

?>