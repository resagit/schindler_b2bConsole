<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$cln_id=$_GET['cln_id'];
$client_name=urlencode(trim(str_replace("+"," ",$_GET['client_name'])));
$contract_status=urlencode(trim(str_replace("+"," ",$_GET['contract_status'])));
$company_name=urlencode(trim(str_replace("+"," ",$_GET['company_name'])));
$client_mobile=trim(str_replace("+"," ",$_GET['client_mobile']));
$client_alt_mobile="";
if($_GET['client_alt_mobile']!="")
{
 $client_alt_mobile=trim(str_replace("+"," ",$_GET['client_alt_mobile']));
}else{

	$client_alt_mobile="-";
}
if($_GET['client_cin']!="")
{
$client_cin=trim(str_replace("+"," ",$_GET['client_cin']));
}else{
$client_cin="-";
}
if($_GET['client_tin']!="")
{
$client_tin=trim(str_replace("+"," ",$_GET['client_tin']));
}else{
	$client_tin="-";
}	
$alt_mob=trim(str_replace("+"," ",$_GET['alt_mob']));
$pan_no=trim(str_replace("+"," ",$_GET['pan_no']));


$client_email=trim(str_replace("+"," ",$_GET['client_email']));
$client_pan=trim(str_replace("+"," ",$_GET['client_pan']));
$client_cnt_name=urlencode(trim(str_replace("+"," ",$_GET['client_cnt_name'])));
$client_cnt_no=trim(str_replace("+"," ",$_GET['client_cnt_no']));
$client_add1=urlencode(trim(str_replace("+"," ",$_GET['client_add1'])));
$client_add1=str_replace("%2F","~",$client_add1);
$client_add2=urlencode(trim(str_replace("+"," ",$_GET['client_add2'])));
$client_add2=str_replace("%2F","~",$client_add2);
$client_pin=trim(str_replace("+"," ",$_GET['client_pin']));
$client_city=urlencode(trim(str_replace("+"," ",$_GET['client_city'])));
$client_state=urlencode(trim(str_replace("+"," ",$_GET['client_state'])));
$client_bank=urlencode(trim(str_replace("+"," ",$_GET['client_bank'])));
$client_acc_no=trim(str_replace("+"," ",$_GET['client_acc_no']));
$client_ifsc=trim(str_replace("+"," ",$_GET['client_ifsc']));
$client_bank_branch=urlencode(trim(str_replace("+"," ",$_GET['client_bank_branch'])));

$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$is_location=trim(str_replace("+"," ",$_GET['is_location']));
$client_acc_name=urlencode(trim(str_replace("+"," ",$_GET['client_acc_name'])));
//$userNumber=$_SESSION['companyID'];
$client_gstin=trim(str_replace("+"," ",$_GET['client_gstin']));
$client_country=trim(str_replace("+"," ",$_GET['client_country']));
//echo ($customerNo);
$url="http://".$ip."/updateClientDetails/$cln_id/$client_name/$client_alt_mobile/$company_name/$client_email/$pan_no/$client_city/$client_state/$client_add1/$client_add2/$client_pin/$client_bank/$client_acc_no/$client_ifsc/$client_bank_branch/$client_tin/$client_cin/$client_cnt_name/$client_cnt_no/$user_name/$pass/BMSOperational/$is_location/$client_gstin/$client_country/$client_acc_name/$client_mobile/$contract_status";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo "  ".$url;
//print_r($url);


?>