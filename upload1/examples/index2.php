<?php // upload.php
// 'images' refers to your file input name attribute
if (empty($_FILES['file-en'])) {
echo json_encode(['error'=>'No files found for upload.']);
// or you can throw an exception
return; // terminate
}
session_start();

// get the files posted
$images = $_FILES['file-en'];

// get user id posted
$userid = empty($_POST['userid']) ? '' : $_POST['userid'];

// get user name posted
$username = empty($_POST['username']) ? '' : $_POST['username'];
$comp_id=$_SESSION['challan'];
$order_id=$_SESSION['order_id'];
// a flag to see if everything is ok
$success = null;
$url="http://localhost:8080/ResagitB2B/addPodImageFile/$order_id/$comp_id";
// file paths to store

$path="uploads/".$_FILES['file-en']['name'];
// get file names
move_uploaded_file($_FILES['file-en']['tmp_name'],$path);




// check and process based on successful status

// call the function to save all data to database
// code for the following function `save_data` is not
// mentioned in this example
    $ch = curl_init();
    $data = array('name' =>$_FILES['file-en']['name'], 'file' => "@".$_SERVER['DOCUMENT_ROOT']."/b2bconsole/upload1/examples/uploads/".$_FILES['file-en']['name']);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $res=curl_exec($ch);
//print_r($url);
   // echo "@".$_SERVER['DOCUMENT_ROOT']."/b2bconsole/upload1/examples/uploads/".$_FILES['file-en']['name'];



    if($res=="Y1")
    {


       unlink($path);
    }
else
{

    echo "Failed To Upload";
}

// store a successful response (default at least an empty array). You
// could return any additional response info you need to the plugin for
// advanced implementations.
$output = [];
// for example you can get the list of files uploaded this way
// $output = ['uploaded' => $paths];

//echo  "@".$_SERVER['DOCUMENT_ROOT']."/b2bconsole/upload1/examples/".$path;

// return a json encoded response for plugin to process successfully
echo json_encode($output);?>