<?php

include ("admin-class.php");
date_default_timezone_set("Asia/Kolkata");
$username = $_POST['user_name'];
$pass = $_POST['pass'];
$password = sha1(md5($pass));

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
/* ?>$username="7506047486";
  $password="5555";<?php */
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://" . $ip . "/loginB2bCompanyWithZone/$username/$pass/BMSoperational/--/--/--/WEB");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
$result = curl_exec($ch);

//var_dump($result);
//print_r($result);
//close connection
curl_close($ch);

//edits
//$exp = explode("*", $result);
//print_r($exp);
$status = $result;
//echo("<script>console.log('PHP: ".$status."');</script>");
/* $register = $exp[1];
  $auth_key= $exp[2]; */
$v = json_decode($status);
$aMemberships = array();
$mob = "";
$comid = "";
$states = "";
$roleid = "";
foreach ($v->Details as $key => $m) {
	array_push($aMemberships, $m->uiRole);
	$mob = $m->mobileNumber;
	$comid = $m->companyID;
	$states = $m->multilogin;
	$roleid = $m->roleID;
	//   echo("<script>console.log('PHP: ".$comid."');</script>");
}

if ($aMemberships[0] != "") {
	session_start();
	$_SESSION['list'] = $result;
	//header('Location: login.php?f=1');
	// echo("<script>console.log('PHP: ".$comid."');</script>");
	$_SESSION['mob'] = $mob;
	$_SESSION['pass'] = $pass;
	$_SESSION['companyID'] = $comid;
	$_SESSION['status'] = $states;
	$_SESSION['checks'] = $username;
	$_SESSION['user_names'] = $username;
	$_SESSION['admin_login'] = $username;
	$_SESSION['roles_id'] = $roleid;
	setcookie('user_name', $username, time() + 360000);
	$_SESSION['lists'] = $result;
	header('Location:en/index.php');
}
else {
	echo "hi";
}
?>
