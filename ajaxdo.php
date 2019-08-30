<?php
include_once 'admin-class.php';
$admin = new itg_admin();
//$ip="54.179.182.252";

if(isset($_GET['action']) && $_GET['action']!="")
{
$action = $_GET['action'];
}
else
{
$action = "None";
}
if(isset($_GET['userid']) && $_GET['userid']!="")
{
$userid = $_GET['userid'];
    $auth_key=$_GET['auth_key'];
}
else
{
$userid = "None";
}
if(isset($_GET['otp']) && $_GET['otp']!="")
{
$otp = $_GET['otp'];
    $otp1=sha1(md5($otp) );
}
else
{
$otp = "None";
}
if(isset($_GET['lpin']) && $_GET['lpin']!="")
{
$lpin =sha1(md5($_GET['lpin'])) ;//$_GET['lpin'];
//echo "<script>alert('$lpin');</script>";
}
else
{
$lpin = "None";

}
if(isset($_GET['tpin']) && $_GET['tpin']!="")
{
$tpin = $_GET['tpin'];

}
else
{
$tpin = "None";

}
if(isset($_GET['lang']) && $_GET['lang']!="")
{
$lang = $_GET['lang'];
}
else
{
$lang = "None";
}
if(isset($_GET['rtpin']) && $_GET['rtpin']!="")
{
$rtpin = $_GET['rtpin'];
}
else
{
$rtpin = "None";
}
if(isset($_GET['btpin']) && $_GET['btpin']!="")
{
$btpin = $_GET['btpin'];
}
else
{
$btpin = "None";
}
if(isset($_GET['pref1']) && $_GET['pref1']!="")
{
$pref1 = $_GET['pref1'];
}
else
{
$pref1 = "None";
}
if(isset($_GET['pref2']) && $_GET['pref2']!="")
{
$pref2 = $_GET['pref2'];
}
else
{
$pref2 = "None";
}
if(isset($_GET['surplus']) && $_GET['surplus']!="")
{
$surplus = $_GET['surplus'];
}
else
{
$surplus = "None";
}






if($action!="" && $action=="OTPSend")
{
if($userid!="None")
{
//set POST variables
    //ResagitClient/resendOtp/"+userid+"/5
//$url = 'http://'.$ip.'/ResagitClient/resendOtp/$userid/5';
/*
$fields = array(
						'username' => urlencode($userid)												
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { 
$fields_string .= $key.'='.$value.'&';
 }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
return $result;
*/
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://".$ip."/ResagitClient/resendOtp/$userid/5");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
 $result1 = curl_exec($ch);



echo $result1;


//close connection
curl_close($ch);
    
 return $result1;   
    
    
    
}
}

if($action!="" && $action=="LPinSend")
{
if($userid!="None" && $lpin!="None")
{
//set POST variables
$url = '#';
$fields = array(
						'user_id' => urlencode($userid),												
						'lpin' => urlencode($lpin)												
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { 
$fields_string .= $key.'='.$value.'&';
 }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
return $result;
}
}

if($action!="" && $action=="OTPSubmit")
{
if($userid!="None" && $otp!="None")
{
//set POST variables
/*$url = 'http://'.$ip.':8080/SmartGiniWeb/LoginSend';       
$fields = array(
						'username' => urlencode($userid),												
						'password' => urlencode($otp)												
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { 
$fields_string .= $key.'='.$value.'&';
 }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
echo $result;*/
    
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://".$ip."/ResagitClient/webLogin/$username/5/$password/$otp");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
 $result = curl_exec($ch);






//close connection
curl_close($ch);
echo $result;

}
}

if($action!="" && $action=="SendLTPin")
{
    
    //echo "in action";
if($userid!="None" && $lpin!="None" && $tpin!="None")
{
    
    // echo "in  ajax".$lpin;
//set POST variables
    
    //createPin("http://"+sharedPreference.getValue(CreatePin.this,"ipaddress")+"/ResagitClient/createPassword/"+user_id+"/5/"+CheckOtp.authKey+"/"+createPin);
/*
$url = 'http://'.$ip.':8080/SmartGiniWeb/Retailer_Create_Pin';				//create lpin and tpin
$fields = array(
						'username' => urlencode($userid),												
						'password' => urlencode($lpin)																							
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { 
$fields_string .= $key.'='.$value.'&';
 }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result1 = curl_exec($ch);

//close connection
curl_close($ch);
*/
    
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://".$ip."/ResagitClient/createPassword/$userid/5/$auth_key/$lpin");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
 $result1 = curl_exec($ch);



var_dump($result1);


//close connection
curl_close($ch);

/*$url = 'http://'.$ip.':8080/SmartGiniWeb/Retailer_Create_Tpin';
$fields = array(
						'username' => urlencode($userid),												
						'password1' => urlencode($tpin)																									
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { 
$fields_string .= $key.'='.$value.'&';
 }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result2 = curl_exec($ch);

//close connection
curl_close($ch);*/
$result = $result1."&"."Y";
return $result;
}
}

if($action!="" && $action=="UpdatePreferences")
{
if($userid!="None")
{
//set POST variables
$url = 'http://'.$ip.':8080/SmartGiniWeb/UpdatePref';
$fields = array(
						'username' => urlencode($userid),												
						'lang' => urlencode($lang),												
						'conv' => urlencode($surplus),
						'rtpin' => urlencode($rtpin),
						//'btpin' => urlencode($btpin),												
						//'pref1' => urlencode($pref1),												
						//'pref2' => urlencode($pref2)												
																
				);

//url-ify the data for the POST
foreach($fields as $key=>$value) { 
$fields_string .= $key.'='.$value.'&';
 }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
return $result;
}
}




?>
