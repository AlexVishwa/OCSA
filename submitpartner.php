<?php
header('Content-Type: application/json');
include_once('sendotp.php');
//include_once('database/connect.php');
$servername = "localhost";
$username = "root";
$password = "ocsa@123";
$dbname = "Ocsa";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$tog=0;
$status=0;
$arr=[];
$arr['data']=[];
$id=time();

if (!$conn) {
die("Connection failed: " . "hi".mysqli_connect_error());
}
$sql="select * from partner where email='$_POST[mobile]';";
if(mysqli_query($conn,$sql)){
	$tog=1;
}else{
	echo $conn->error;
}
$sql2="Insert into wallet(id,name,email,referral,walletbalance,paid_amount) values('$id','$_POST[name]','$_POST[email]','$_POST[referral]','0','0');";
/*
$temp = explode(".", $_FILES["aadharcardfile"]["name"]);
$newfilename = 'aadhar_'.round(microtime(true)) . '.' . end($temp);

$temp1 = explode(".", $_FILES["pancardfile"]["name"]);
$newfilename1 = 'pan_'.round(microtime(true)) . '.' . end($temp1);
if (move_uploaded_file($_FILES["aadharcardfile"]["tmp_name"], 'shopsdocs/'. $newfilename) && $tog==0){
	move_uploaded_file($_FILES["pancardfile"]["tmp_name"], 'shopsdocs/'. $newfilename1);
	//sendOtp($_POST['mobile'],'Thank You '.$_POST['name'].' registered with us. Your username= '.$_POST['mobile'].' & password='.$_POST['password'].'. for contact: Mail Us:contact@ocsa.in');
	echo 1;
}else{
	echo 0;
}
*/


if($_POST[partnertype]='free'){
    $status=1;
}

//$wallet_arr[]=array('id'=>$id,'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'email'=>$_POST['email'],'referral'=>$_POST['referral'],'wallet'=>0);
//$arr[]=array('id'=>$id,'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'email'=>$_POST['email'],'pincode'=>$_POST['pincode'],'city'=>$_POST['city'],'referral'=>$_POST['referral'],'aadhar'=>$_POST['aadhar'],'pancard'=>$_POST['pancard'],'password'=>$_POST['password'],'address'=>$_POST['address'],'partnertype'=>$_POST['partnertype'],'timefrom'=>$_POST['timefrom'],'timeto'=>$_POST['timeto'],'gstno'=>$_POST['gstno'],'shopname'=>$_POST['shopname'],'shopcategory'=>$_POST['shopcategory'],'shopno'=>$_POST['shopno'],'shopdesc'=>$_POST['shopdesc'],'shopaddress'=>$_POST['shopaddress'],'bankaccount'=>$_POST['bankaccount'],'bankifsc'=>$_POST['bankifsc'],'branch'=>$_POST['branch'],'bankname'=>$_POST['bankname'],'bankaddress'=>$_POST['bankaddress'],'account_holder_name'=>$_POST['account_holder_name'],'bankcity'=>$_POST['bankcity'],'bankstate'=>$_POST['bankstate'],'aadharcardfile'=>$newfilename,'pancardfile'=>$newfilename1,'status'=>$status);

if(mysqli_query($conn,$sql2)){
	
$sql3="Insert into partner(id,name,email,password,pincode,address,partnertype,timefrom,timeto,gstno,aadhaarcardfile,pancardfile,bankaccount,bankname,bankifsc,bankcity,bankstate,bankbranch,bankaccountholder,status) values('$id','$_POST[name]','$_POST[email]','$_POST[password]','$_POST[pincode]','$_POST[address]','$_POST[partnertype]','$_POST[timefrom]','$_POST[timeto]','$_POST[gstno]','$_POST[aadhaar]','$_POST[pancard]','$_POST[bankaccount]','$_POST[bankname]','$_POST[bankifsc]','$_POST[bankcity]','$_POST[bankstate]','$_POST[branch]','$_POST[account_holder_name]','0');";

if(mysqli_query($conn,$sql3)){
	$arr=[];
	$arr['data']=[];
    $item=array(
        'tog'=>$tog
    );
    array_push($arr['data'],$item);
    echo json_encode($arr);
}
else{
	$arr=[];
	$arr['data']=[];
    $item=array(
        'tog'=>$tog
    );
    array_push($arr['data'],$item);
	array_push($arr['data'],"Error".mysqli_error($conn));
	echo json_encode($arr);
}
	
}
else{
	$arr=[];
	$arr['data']=[];
    $item=array(
        'tog'=>$tog
    );
    array_push($arr['data'],$item);
	//echo mysqli_error($conn);
	array_push($arr['data'],"Error".mysqli_error($conn));
	echo json_encode($arr);
}


?>