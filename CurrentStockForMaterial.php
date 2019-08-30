<?php 
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;


$warehouse_id = $_POST['warehouse_id'];
$material_id = $_POST['material_id'];
$item = $_POST['item'];
$new = str_replace(' ', '%20', $material_id);
//echo ($item);
	//$clientid= $_SESSION['companyID'];;	
$clientid=$_POST['sales_id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://".$ip."/selectWareHouseCurrentStockForMaterial/$new/$warehouse_id/$clientid");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;

?>