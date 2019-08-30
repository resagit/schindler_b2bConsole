<?php // upload.php
include_once 'admin-class.php';
session_start();
// print_r($_FILES['files']); die;


// 'images' refers to your file input name attribute
if (empty($_FILES['files'])) {
    echo json_encode(['uploaded'=>'No files found for upload.']);
    return; // terminate
}

// get the files posted
$images = $_FILES['files'];
$comp_id=$_POST['company_id'];
$material_id=urlencode(str_replace('\\','`',str_replace("/","~",$_POST['material_id'])));
$material_name=urlencode(str_replace('\\','`',str_replace("/","~",$_POST['material_name'])));

$base_uom=$_POST['base_uom'];
$material_price=$_POST['material_price'];
$material_height=$_POST['material_height'];
$material_width=$_POST['material_width'];
$material_length=$_POST['material_length'];
$putPickType=$_POST['put_pick'];
$material_new_weight=$_POST['material_new_weight'];
$material_gross_weight=$_POST['material_gross_weight'];
$material_volumetric_weight=$_POST['material_volumetric_weight'];
$material_is_fragile=$_POST['material_is_fragile'];
$material_is_flamable=$_POST['material_is_flamable'];
$material_order_quantity=$_POST['material_order_quantity'];
$user_name=$_SESSION['user_names'];
$pass=$_SESSION['pass'];



/*$order_id=$_POST['order_id'];
$captions=urlencode($_POST['captons']);*/
// get user id posted
// a flag to see if everything is ok
$success = null;

// /createMaterialList/{companyId}/{materailName}/{materialCode}/{uom}/{materialPrice}/{materialHeight}/{materialWidht}/{materialLength}/{materialNetWeight}/{materialGrossWeight}/{materialVolumeWeight}/{materialIsFragile}/{materialIsFlamable}/{materialReOrderQty}/{putPickType}/{userName}/{password}/{userType}
$url="http://".$ip."/createMaterialList/$comp_id/$material_name/$material_id/$base_uom/$material_price/$material_height/$material_width/$material_length/$material_new_weight/$material_gross_weight/--/$material_is_fragile/$material_is_flamable/$material_order_quantity/$putPickType/$user_name/$pass/BMSOperational/$material_volumetric_weight";

$path="uploads/".$_FILES['files']['name'];
// get file names
move_uploaded_file($_FILES['files']['tmp_name'],$path);

$ch = curl_init();
$data = array('file'=> new CURLFile(getcwd()."/uploads/".$_FILES['files']['name']));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res=curl_exec($ch);

// echo $res; 

if($res == "Y")
{
    $success = true;
}
else
{
    $success = false;
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
    //unlink($path);

}
elseif ($success === false) {
    $output = array('uploaded' => 'Error');
   // echo $url;
}

else {
    $output['uploaded']= 'No files were processed.';
   // echo $url;
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);
//echo $res;
?>