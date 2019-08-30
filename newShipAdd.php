<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;


//$session=$_POST['session'];
//$tran="1000438608669";
$fields_string="";
//$alternate=$_POST['alternate'];
$companyId=get_form_name_value('companyId');
$careOfOrConsigneeName=get_form_name_value('careOfOrConsigneeName');
$stateName=get_form_name_value('stateName');
$address1=get_form_name_value('address1');
$address1=ucwords(str_replace("%2F","~",$address1));
$address2=get_form_name_value('address2');
$address2=ucwords(str_replace("%2F","~",$address2));
$cityName=get_form_name_value('cityName');
$pincode=get_form_name_value('pincode');
$contactname=get_form_name_value('contactname');
$contactno=get_form_name_value('contactno');
$add_cin=get_form_name_value('CIN');
$add_tin=get_form_name_value('TIN');
//echo ($customerNo);
$url ="http://".$ip."/createCofOrConsignee/$companyId/$careOfOrConsigneeName/$stateName/$address1/$address2/$cityName/$pincode/cof/$add_tin/$add_cin/$contactno/$contactname";
//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
//echo $address1;
echo $data;

?>