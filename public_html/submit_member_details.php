<?php
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include_once('sendotp.php');
	date_default_timezone_set("Asia/Kolkata");

    $data=file_get_contents("database/member.json");
    $arr=json_decode($data,true);
    $wallet_data=file_get_contents("database/wallet.json");
    $wallet_arr=json_decode($wallet_data,true);
    $id=time();
    $wallet_arr[]=array('id'=>$id,'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'email'=>$_POST['email'],'referral'=>$_POST['referral'],'wallet'=>0);
    $arr[]=array('id'=>$id,'name'=>$_POST['name'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'password'=>$_POST['password'],'address'=>$_POST['address'],'city'=>$_POST['city'],'pincode'=>$_POST['pincode'],'appliance'=>$_POST['appliance'],'quantity'=>$_POST['quantity'],'created'=>date('d-M-Y H:s:i A'),'main_wallet'=>0,'wallet'=>0,'paid_amount'=>0,'membership'=>0,'month_available'=>0,'referral'=>$_POST['referral'],'active'=>0);
    file_put_contents('database/member.json', json_encode($arr));
    file_put_contents("database/wallet.json", json_encode($wallet_arr));
    sendOtp($_POST['mobile'],'Thank You '.$_POST['name'].' registered with us. Your username= '.$_POST['mobile'].' & password='.$_POST['password'].'. for contact: Mail Us:contact@ocsa.in');

    
    
}

?>
