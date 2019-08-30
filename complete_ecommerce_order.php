<?php // upload.php
$output=array("");
date_default_timezone_set("Asia/Kolkata");
include_once 'admin-class.php';
// 'images' refers to your file input name attribute
if (empty($_FILES['files'])) {
    echo json_encode(['error'=>'No files found for upload.']);
// or you can throw an exception
    return; // terminate
}
session_start();

// get the files posted
$images = $_FILES['files'];


$user_name=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
// get user id posted

// a flag to see if everything is ok
$success = null;
$dates=date("d_m_Y__h_i_s");
// file paths to store

$path="pdf_files/".$dates.".pdf";
// get file names
if(move_uploaded_file($_FILES['files']['tmp_name'],$path))
{

        $challan_no=get_form_name_value('challan_no');
        $company_id=get_form_name_value('cmp_id');
        $files_type=get_form_name_value('file_types');
    $descriptions=get_form_name_value('descriptions');

    $types="BMSoperational";



//localhost:8080/ResagitB2B/{companyId}/{chalanNo}/{type}/{description}/{userName}/{password}/{userType}
/*
 *    challan_no:$("#challan_no").val(),
                        cmp_id:$("#company_id").val(),
                        "file_types":$("#files_type").val(),
                        descriptions:$("#descs").val()*/

// get the files posted


// get user id posted



// file paths to store
    $url="http://".$ip."/updateMarketPlaceOrderFile/$company_id/$challan_no/$files_type/$descriptions/$user_name/$pass/$types";

/*    $ch = curl_init();
    $data1 = array('customerFile' => "@".str_replace("\\","/",getcwd())."/files/$res1",'companyFile'=>"@".str_replace("\\","/",getcwd())."/files/$res");
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    $results= curl_exec($ch);*/




    $ch = curl_init();
    $data = array('invoiceFile'=> "@".getcwd()."\\".$path);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $res=curl_exec($ch);
if($res=="Y") {
    unlink($path);

    $output = array('messages' => 'OK');


}elseif($res=="N")
{

    unlink($path);
    $output = array('messages' => "Error");

}
    else
    {
        $output = array('messages' =>"Error");

    }

}else
{

    $output = array('messages' => $res);

}








// return a json encoded response for plugin to process successfully
echo json_encode($output);
?>