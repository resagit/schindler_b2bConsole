<?php
include ("admin-class.php");

session_start();

$username=$_COOKIE['user_name'];
$pass=$_SESSION['pass'];

?>

<?php


/*
// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://production.vps44521.mylogin.co/test/ajaxdo.php',
    //CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
	CURLOPT_NOBODY => 0,
    CURLOPT_POSTFIELDS => array(
        user_id => 'u',
        pass => 'p'
    )
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
var_dump($resp);
// Close request to clear up some resources
curl_close($curl);
*/
//set POST variables
/*?>$username="7506047486";
$password="5555";<?php */
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://".$ip."/loginB2bCompanyWithZone/$username/$pass/BMSoperational/--/--/--/WEB");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
$result = curl_exec($ch);



//var_dump($result);


//close connection
curl_close($ch);

//edits
//$exp = explode("*", $result);
//print_r($exp);
$status = $result;
/*$register = $exp[1];
$auth_key= $exp[2];*/

echo $status;


?>
