<?php
include_once "admin-class.php";
session_start();
//$fields_string="";
$joinarray=array();
$bom_id=$_POST['bom_id'];
$clientId=$_POST['companyId'];
$materialItemID=explode("*",$_POST['materialItemID']);
$quantity=explode("*",$_POST['quantity']);
$uom=explode("*",$_POST['uom']);
$perUnitPrice=explode("*",$_POST['perUnitPrice']);
$des=explode("*",$_POST['des']);
$code=$_POST['code'];
$description=$_POST['description'];
$price=$_POST['price'];
$userName=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";

//print_r($materialItemID);
//print_r($uom);

$count=count($materialItemID);
for($i=0;$i<$count;$i++)
{
    // echo $materialItemID[$i];
    array_push($joinarray,array("materialID"=>"$materialItemID[$i]","quantity"=>"$quantity[$i]","uom"=>"$uom[$i]","price"=>"$perUnitPrice[$i]"));

}
//print_r($joinarray);
$main_array=Array("bomID"=>"$bom_id","code"=>"$code","description"=>"$description","companyID"=>"$clientId","price"=>"$price","username"=>"$userName","usertype"=>"$user_type","password"=>"$pass","bomItems"=>$joinarray);
//array_push($main_array['bomItems'],$joinarray);
//$main_array=Array("code"=>$code,"description"=>"$description","companyID"=>"$clientId","price"=>"$price","username"=>"$userName","usertype"=>"$user_type","password"=>"$pass","bomItems" =>Array("materialID"=>Array("$materialItemID"),"quantity"=>Array("$quantity"),"uom"=>Array("$uom"),"price"=>Array("$perUnitPrice")));
$url="http://".$ip."/updateBom";
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
echo $responses;
//echo $data_string;





?>