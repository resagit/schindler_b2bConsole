<?php // upload.php
include_once 'admin-class.php';

session_start();

//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
$warehouse_id=$_GET['warehouse_id'];
$username=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$filess=str_replace("/","\\",$_GET['times']);
$types="BMSoperational";




// get the files posted


// get user id posted


$storage_id=$_GET['storage_id'];
// file paths to store
$url="http://".$ip."/createWarehouseLocation/$warehouse_id/$storage_id/$username/$pass/$types";


$ch = curl_init();// new CURLFile(getcwd()."\\".$filess
$data = array('file'=> new CURLFile(getcwd()."\\".$filess));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res=curl_exec($ch);
if($res=="Y")
{

    unlink($filess);

}
else{

    unlink($filess);

}
echo $res;
?>