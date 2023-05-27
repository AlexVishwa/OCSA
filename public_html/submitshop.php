<?php
include_once('sendotp.php');
$data=file_get_contents("database/shops.json");
$arr=json_decode($data,true);

$wallet_data=file_get_contents("database/wallet.json");
$wallet_arr=json_decode($wallet_data,true);

$temp = explode(".", $_FILES["aadharcardfile"]["name"]);
$newfilename = 'aadhar_'.round(microtime(true)) . '.' . end($temp);

$temp1 = explode(".", $_FILES["pancardfile"]["name"]);
$newfilename1 = 'pan_'.round(microtime(true)) . '.' . end($temp1);

$id=time();
$tog=0;
for($i=0;$i<count($arr);$i++){
    if($arr[$i]['mobile']==$_POST['mobile']){
        $tog=1;
    }
}
$wallet_arr[]=array('id'=>$id,'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'email'=>$_POST['email'],'referral'=>$_POST['referral'],'wallet'=>0);
$arr[]=array('id'=>$id,'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'email'=>$_POST['email'],'pincode'=>$_POST['pincode'],'city'=>$_POST['city'],'referral'=>$_POST['referral'],'aadhar'=>$_POST['aadhar'],'pancard'=>$_POST['pancard'],'password'=>$_POST['password'],'address'=>$_POST['address'],'shopname'=>$_POST['shopname'],'shopcategory'=>$_POST['shopcategory'],'shopno'=>$_POST['shopno'],'shopdesc'=>$_POST['shopdesc'],'shopaddress'=>$_POST['shopaddress'],'bankaccount'=>$_POST['bankaccount'],'bankifsc'=>$_POST['bankifsc'],'branch'=>$_POST['branch'],'bankname'=>$_POST['bankname'],'bankaddress'=>$_POST['bankaddress'],'account_holder_name'=>$_POST['account_holder_name'],'bankcity'=>$_POST['bankcity'],'bankstate'=>$_POST['bankstate'],'aadharcardfile'=>$newfilename,'pancardfile'=>$newfilename1);

if (move_uploaded_file($_FILES["aadharcardfile"]["tmp_name"], 'shopsdocs/'. $newfilename) && $tog==0){
	move_uploaded_file($_FILES["pancardfile"]["tmp_name"], 'shopsdocs/'. $newfilename1);
	file_put_contents("database/shops.json", json_encode($arr));
	file_put_contents("database/wallet.json", json_encode($wallet_arr));
	sendOtp($_POST['mobile'],'Thank You '.$_POST['name'].' registered with us. Your username= '.$_POST['mobile'].' & password='.$_POST['password'].'. for contact: Mail Us:contact@ocsa.in');
	echo 1;
}else{
	echo 0;
}

?>