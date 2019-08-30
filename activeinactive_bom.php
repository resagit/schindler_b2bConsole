<?php
/**
 * Created by PhpStorm.
 * User: Resagit
 * Date: 04/02/17
 * Time: 17:57:08
 */
include_once "admin-class.php";
session_start();
$bom_id=$_POST['id'];
$userName=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$user_type="BMSoperational";
$status=$_POST['status'];
$main_array=Array("bomID"=>"$bom_id","username"=>$userName,"usertype"=>$user_type,"password"=>$pass,"type"=>$status);
//$main_array=array(array());
//array_push($main_array['data'],array("bomID"=>"$bom_id","username"=>$userName,"usertype"=>$user_type,"password"=>$pass));
$url="http://".$ip."/activeInactiveBom";
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
//echo $data_string;
echo $responses;







?>