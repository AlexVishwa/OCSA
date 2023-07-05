<?php
include_once('functions.php');
include_once('database/connect.php');
$rand=mt_rand(100000, 999999);
include_once('sendotp.php');
if (isset($_POST['mobile'])) {
	$otp='OCSA PVT. LTD. ,Your OneTime Password is :'.$rand;
$check_mobile=checkMobile($_POST['mobile']);

if($check_mobile =='true'){
    sendOtp($_POST['mobile'],$otp);
	echo $rand;
}else{
	echo 0;
}

}else if (isset($_POST['sendpass_mobile'])) {
	
	//$data_pass=file_get_contents("database/member.json");
	//$arr_pass=json_decode($data_pass,true);
	$sql="Select password from member;";
	$result=$conn->query($sql);
	$password="";
	while($row=$result->fetch_assoc())
	{
	$password=$row['password'];
	}
  $pass='OCSA PVT. LTD. ,Your Password is :'.$password;
  //sendOtp($_POST['sendpass_mobile'],$pass);
  echo 'Your Password Has Been Sent To Your Mobile Number.';

}


?>