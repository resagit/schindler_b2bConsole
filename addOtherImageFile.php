<?php // upload.php
include_once 'admin-class.php';
// 'images' refers to your file input name attribute
if (empty($_FILES['files'])) {
    echo json_encode(['uploaded'=>'No files found for upload.']);
// or you can throw an exception
    return; // terminate
}
session_start();

// get the files posted
$images = $_FILES['files'];
$item_id=urlencode(str_replace('\\','`',str_replace("/","~",$_POST['item_id'])));
$comp_id=$_POST['company_id'];
$userNumber=$_SESSION['admin_login'];
$pass=$_SESSION['pass'];
/*$order_id=$_POST['order_id'];
$captions=urlencode($_POST['captons']);*/
// get user id posted

// a flag to see if everything is ok
$success = null;

// file paths to store
$url="http://".$ip."/updateMaterialImage/$comp_id/$item_id/$userNumber/$pass/BMSOperational";
$path="uploads/".$_FILES['files']['name'];
// get file names
move_uploaded_file($_FILES['files']['tmp_name'],$path);

    $ch = curl_init();
    $data = array('file'=> new CURLFile(getcwd() . "/uploads/" . $_FILES['files']['name']));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $res=curl_exec($ch);







if($res=="Y")
{


    $success=true;


}else
{

    $success=false;
}



if ($success === true) {
    // call the function to save all data to database
    // code for the following function `save_data` is not
    // mentioned in this example
    //   save_data($userid, $username, $paths);

    // store a successful response (default at least an empty array). You
    // could return any additional response info you need to the plugin for
    // advanced implementations.
    $output = array('uploaded' => 'OK' );
}
elseif ($success === false) {
    $output = array('uploaded' => $data);
    }

else {
    $output['uploaded']= 'No files were processed.';
}

// return a json encoded response for plugin to process successfully
//echo $res
echo json_encode($output);
//print_r($data)."$res";
?>