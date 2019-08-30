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


// get user id posted

// a flag to see if everything is ok
$success = null;
$dates=date("d_m_Y__h_i_s");
// file paths to store

$path="pdf_files/".$dates.".pdf";
// get file names
if(move_uploaded_file($_FILES['files']['tmp_name'],$path))
{

    $output = array('messages' => 'OK','file_name' => $path  );



}else
{

    $output = array('messages' => 'Error' );

}








// return a json encoded response for plugin to process successfully
echo json_encode($output);
?>