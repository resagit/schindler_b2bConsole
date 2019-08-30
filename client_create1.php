<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$fields_string="";
$company_type=$_GET['company_type'];
$client_name=urlencode($_GET['client_name']);
$client_name=str_replace("%2F","~",$client_name);
$company_name=urlencode($_GET['company_name']);
$company_name=str_replace("%2F","~",$company_name);
$client_mobile=$_GET['client_mobile'];
$client_alt_mobile=$_GET['client_alt_mobile'];
if($_GET['client_cin']){
$client_cin=$_GET['client_cin'];
} else {
$client_cin="-";
}
if($_GET['client_tin']){
$client_tin=$_GET['client_tin'];
} else {
$client_tin="-";
}

$client_email=$_GET['client_email'];
$client_pan=$_GET['client_pan'];
$client_cnt_name=urlencode($_GET['client_cnt_name']);
$client_cnt_no=$_GET['client_cnt_no'];
$client_add1=urlencode($_GET['client_add1']);
$client_add2=urlencode($_GET['client_add2']);
$client_add1=str_replace("%2F","~",$client_add1);
$client_add2=str_replace("%2F","~",$client_add2);
$client_pin=$_GET['client_pin'];
$client_city=urlencode($_GET['client_city']);
$client_state=urlencode($_GET['client_state']);
$client_bank=urlencode($_GET['client_bank']);
$client_acc_no=$_GET['client_acc_no'];
$client_ifsc=$_GET['client_ifsc'];
$client_bank_branch=urlencode($_GET['client_bank_branch']);
$client_gstin=$_GET['client_gstin'];
$client_country=$_GET['client_country'];
$client_acc_name=urlencode(trim($_GET['client_acc_name']));
$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$check_wms=$_GET['check_wms'];
//echo $client_add1;
//$userNumber=$_SESSION['companyID'];
//echo ($customerNo);
$url="http://".$ip."/createB2BClient/$client_name/$client_mobile/$client_alt_mobile/$company_name/$client_email/$client_pan/$client_city/$client_state/$client_add1/$client_add2/$client_pin/$client_bank/$client_acc_no/$client_ifsc/$client_bank_branch/$company_type/-/$client_tin/$client_cin/$client_cnt_name/$client_cnt_no/$user_name/$pass/BMSOperational/$check_wms/$client_gstin/$client_acc_name/$client_country";

//$url="http://".$ip."/ResagitB2B/createB2BClient/$client_name/$client_mobile/$client_alt_mobile/$company_name/$client_email/$client_pan/$client_city/$client_state/$client_add1/$client_add2/$client_pin/$client_acc_name/$client_bank/$client_acc_no/$client_ifsc/$client_bank_branch/$company_type/-/$client_tin/$client_cin/$client_cnt_no/$user_name/$pass/BMSOperational/$check_wms/$client_gstin/$client_cnt_name/$client_country";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
echo $data;
//echo $url;
?>
