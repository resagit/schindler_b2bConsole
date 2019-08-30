<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
session_start();
$comp_id=$_GET['company_id'];
$material_id=urlencode(str_replace('\\','`',str_replace("/","~",$_GET['material_id'])));
$material_name=urlencode(str_replace('\\','`',str_replace("/","~",$_GET['material_name'])));

$base_uom=$_GET['base_uom'];
$material_price=$_GET['material_price'];
$material_height=$_GET['material_height'];
$material_width=$_GET['material_width'];
$material_length=$_GET['material_length'];
$material_new_weight=$_GET['material_new_weight'];
$material_gross_weight=$_GET['material_gross_weight'];
$material_volumetric_weight=$_GET['material_volumetric_weight'];
$material_is_fragile=$_GET['material_is_fragile'];
$material_is_flamable=$_GET['material_is_flamable'];
$material_order_quantity=$_GET['material_order_quantity'];
$putPickType=$_GET['put_pick'];
$qrStatus=$_GET["qrcode"];

//$packQty=$_GET['packQty'];
//$packSize=$_GET["packSize"];

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
$url="http://".$ip."/createMaterialList/$comp_id/$material_name/$material_id/$base_uom/$material_price/$material_height/$material_width/$material_length/$material_new_weight/$material_gross_weight/$material_volumetric_weight/$material_is_fragile/$material_is_flamable/$material_order_quantity/$putPickType/$user_name/$pass/BMSOperational/$qrStatus";
$ch = curl_init();
//echo $url;
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


    //createMaterialList/CL00000079/newItem/item001/piece/10/11/12/13/14/15/16/y/yes/20/operational/1111/BMSoperational
//createMaterialList/{companyId}/{materailName}/{materialCode}/{uom}/{materialPrice}/{materialHeight}/{materialWidht}/{materialLength}/{materialNetWeight}/{materialGrossWeight}/{materialVolumeWeight}/{materialIsFragile}/{materialIsFlamable}/{materialReOrderQty}/{userName}/{password}/{userType}
//material_id=asdsdasda&material_name=sadasd1&base_uom=BOX&material_price=222&material_height=12&material_width=12&material_length=12&material_new_weight=12&material_gross_weight=12&material_is_fragile=Y&material_is_flamable=Yes&material_order_quantity=111


?>