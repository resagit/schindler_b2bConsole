<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
//companyId=CL00000079&edit_consignee_id=CNF0497&name1=Sdfsdfsdfsdf&Address1=Sasadsdaasd&Address2=Sdaasdasdasd&CIN=SADASDASDASD&TIN=SDAASDDSAASD&pincode=400060&city=Mumbai&state=Maharashtra&Cont_name=Assadasd&mob_no=5654545454
session_start();
$fields_string="";
//$alternate=$_GET['alternate'];

$companyId=get_form_name_value('companyId');

$edit_consignee_id=get_form_name_value('edit_consignee_id');
$name1=get_form_name_value('name_coare');
$Address1=get_form_name_value('address1');
$Address2=get_form_name_value('address2');
$CIN=get_form_name_value('CIN');
$TIN=get_form_name_value('TIN');
$pincode=get_form_name_value('pincode');
$city=get_form_name_value('cityName');
$state=get_form_name_value('stateName');
$Cont_name=get_form_name_value('contactname');
$mob_no=get_form_name_value('contactno');

$username=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
$types="BMSoperational";


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

http://localhost:8080/ResagitB2B/updateCofOrConsignee/{companyId}/{careOfOrConsigneeName}/{stateName}/{address1}/{address2}/{cityName}/{pincode}/{tinNo}/{cinNo}/{confContactNo}/{confContactName}/{consigneeID}/{userName}/{password}/{userType}
$url="http://".$ip."/updateCofOrConsignee/$companyId/$name1/$state/$Address1/$Address2/$city/$pincode/$TIN/$CIN/$mob_no/$Cont_name/$edit_consignee_id/$username/$pass/$types";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;