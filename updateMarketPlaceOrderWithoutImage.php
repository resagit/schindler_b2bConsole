<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
//$alternate=$_GET['alternate'];

$challan_no=get_form_name_value('challan_no');

$cmp_id=get_form_name_value('cmp_id');
$tracking_id=get_form_name_value('tracking_id');
$market_place_name=get_form_name_value('market_place_name');
$market_order_id=get_form_name_value('market_place_order_id');
$currier_partner_name=get_form_name_value('currier_partner_name');
$pick_up_person_name=get_form_name_value('pick_up_person_name');
$pick_up_mob=get_form_name_value('pick_up_mob');
$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$type="BMSoperational";


/*
 * challan_no:$("#challan_no").val(),
                        cmp_id:$("#company_id").val(),

                        tracking_id:$("#track_num").val(),
                        market_place_name:$("#market_place").val(),
                        market_place_order_id:$("#market_order_id").val(),
                        currier_partner_name:$("#currier_name").val(),
                        pick_up_person_name:$("#pick_person").val(),
                        pick_up_mob:$("#person_mob").val()};*/
//echo ($customerNo);

//localhost:8080/ResagitB2B/updateMarketPlaceOrderWithoutImage/{companyId}/{chalanNo}/{trackingID}/{marketPlaceName}/{marketPlaceOrderID}/{courierPartnerName}/{pickUpPersonName}/{pickUpPersonMobNO}/{userName}/{password}/{userType}
$url="http://".$ip."/updateMarketPlaceOrderWithoutImage/$cmp_id/$challan_no/$tracking_id/$market_place_name/$market_order_id/$currier_partner_name/$pick_up_person_name/$pick_up_mob/$username/$pass/$type";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;