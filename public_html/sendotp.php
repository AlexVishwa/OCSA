<?php
function sendOtp($mob,$sms)
{
	// pro = 1
// tra = 4
// otp =14

  //Your authentication key
$authKey = "12923Ao4X0qCn4Fcc5d4d078c";

//Multiple mobiles numbers separated by comma
$mobileNumber = $mob;

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "OCSAEN";

//Your message to send, Add URL encoding here.
$message = urlencode($sms);

//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://login.yourbulksms.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

// print_r( $output);
}
?>