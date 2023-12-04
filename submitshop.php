<?php
include_once('sendotp.php');
include_once('database/connect.php');
header('Content-Type: application/json');
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=time();
$tog=0;
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql="select * from shopkeeper where mobile=$_POST[mobile];";
if(mysqli_query($conn,$sql)){
	$tog=0;
}
    
$temp = explode(".", $_FILES["aadharcardfile"]["name"]);
$newfilename = 'aadhar_'.round(microtime(true)) . '.' . end($temp);

$temp1 = explode(".", $_FILES["pancardfile"]["name"]);
$newfilename1 = 'pan_'.round(microtime(true)) . '.' . end($temp1);


$sql2="Insert into wallet(id,name,email,mobile,referral,walletbalance,paid_amount) Values('$id','$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[referral]','0','0');";
//$arr[]=array('id'=>$id,'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'email'=>$_POST['email'],'pincode'=>$_POST['pincode'],'city'=>$_POST['city'],'referral'=>$_POST['referral'],'aadhar'=>$_POST['aadhar'],'pancard'=>$_POST['pancard'],'password'=>$_POST['password'],'address'=>$_POST['address'],'shopname'=>$_POST['shopname'],'shopcategory'=>$_POST['shopcategory'],'shopno'=>$_POST['shopno'],'shopdesc'=>$_POST['shopdesc'],'shopaddress'=>$_POST['shopaddress'],'bankaccount'=>$_POST['bankaccount'],'bankifsc'=>$_POST['bankifsc'],'branch'=>$_POST['branch'],'bankname'=>$_POST['bankname'],'bankaddress'=>$_POST['bankaddress'],'account_holder_name'=>$_POST['account_holder_name'],'bankcity'=>$_POST['bankcity'],'bankstate'=>$_POST['bankstate'],'aadharcardfile'=>$newfilename,'pancardfile'=>$newfilename1);
/*
if (move_uploaded_file($_FILES["aadharcardfile"]["tmp_name"], 'shopsdocs/'. $newfilename) && $tog==0){
	move_uploaded_file($_FILES["pancardfile"]["tmp_name"], 'shopsdocs/'. $newfilename1);
	{
		$conn->query($sql2);
		$conn->query($sql3);
	//sendOtp($_POST['mobile'],'Thank You '.$_POST['name'].' registered with us. Your username= '.$_POST['mobile'].' & password='.$_POST['password'].'. for contact: Mail Us:contact@ocsa.in');
	echo 1;
}else{
	echo 0;
}
*/
if(mysqli_query($conn,$sql2)){
$sql3="Insert into shopkeeper(id,name,email,mobile,password,pincode,city,address,appliance1,aadhaarcardfile,pancardfile,bankaccount,bankname,bankifsc,bankcity,bankstate,bankbranch,bankaccountholder,status,shopaddress,qrfile) Values('$id','$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[password]','$_POST[pincode]','$_POST[city]','$_POST[address]','$_POST[appliance1]','$newfilename','$newfilename1','$_POST[bankaccount]','$_POST[bankname]','$_POST[bankifsc]','$_POST[bankcity]','$_POST[bankstate]','$_POST[branch]','$_POST[account_holder_name]','0','$_POST[shopaddress]','$_POST[mobile]ocsa.png');";

if(mysqli_query($conn,$sql3)){
	$arr=[];
	$arr['data']=[];
	$tog=1;
    $item=array(
        'tog'=>$tog
    );
    array_push($arr['data'],$item);
    echo json_encode($arr);
}
else{
	$arr=[];
	$arr['data']=[];
	$tog=0;
    $item=array(
        'tog'=>$tog
    );
    array_push($arr['data'],$item);
	array_push($arr['data'],"Error".$sql3.mysqli_error($conn));
	echo json_encode($arr);
}
	
}
else{
	$arr=[];
	$arr['data']=[];
	$tog=0;
    $item=array(
        'tog'=>$tog
    );
    array_push($arr['data'],$item);
	//echo mysqli_error($conn);
	array_push($arr['data'],"Error".$sql2.mysqli_error($conn));
	echo json_encode($arr);
}
?>