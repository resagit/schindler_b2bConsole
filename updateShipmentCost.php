<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";



session_start();
//order_id=OI3779354683&challan_no=test11&amount=5&company_id=CL00000094&warehouse_id=W00001&datess=2016-05-02 11:23:40.0&order_type=RETURNINBOUND
//$order_id=$_GET['order_id'];
//$challan_no=$_GET['challan_no'];
//$amount=$_GET['amount'];
//$warehouse_id=$_GET['warehouse_id'];
//$dates=urlencode($_GET['datess']);
//$order_type=$_GET['order_type'];


//$clientId=$_GET['company_id'];
$userNumber=$_SESSION['user_names'];
$pass=$_SESSION['pass'];


$order_id1=get_form_name_value('order_id1');
$warehouse_id=get_form_name_value('warehouseid1');
$challan_no=get_form_name_value('challan_no1');
$dates=get_form_name_value('datess1');
$amount=get_form_name_value('amount');
$companyId=get_form_name_value('cmp_id1');

$user_type="BMSoperational";

///updateShipmentCost/{orderId}/{chalanNo}/{companyId}/{wareHouseID}/{shipmentCost}/{shipmentType}/{userName}/{userType}
$url="http://".$ip."/updateShipmentCost/$order_id1/$challan_no/$companyId/$warehouse_id/$amount/shipment/$userNumber/$user_type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;


//print_r($url);


?>