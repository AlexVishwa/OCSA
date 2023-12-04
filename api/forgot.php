<?php
if(isset($_GET['mobile'])){
    $otp=mt_rand(100000, 999999);
    include_once('../sendotp.php');
    
    $data=file_get_contents('../database/member.json');
    $arr=json_decode($data,true);
    $booking=[];
    for($i=0;$i<count($arr);$i++){
        if($arr[$i]['mobile']== $_GET['mobile']){
            sendOtp($_GET['mobile'],"One Time Password : ".$otp);
            $booking['status']='200';
            $booking['message']="OTP Successfully Sent";
        }
    }
    
    echo json_encode($booking);
    
    
}else if(isset($_GET['m']) && isset($_GET['pass'])){
     include_once('../sendotp.php');
     $data=file_get_contents('../database/member.json');
     $arr=json_decode($data,true);
     $booking=[];
     for($i=0;$i<count($arr);$i++){
        if($arr[$i]['mobile']== $_GET['m']){
            sendOtp($_GET['m'],"Your New Password is : ".$_GET['pass']);
            $arr[$i]['password']=$_GET['pass'];
            $booking['status']='200';
            $booking['message']="Password Successfully Sent";
        }
    }
    file_put_contents('../database/member.json',json_encode($arr));
    echo json_encode($booking);
    
}
?>