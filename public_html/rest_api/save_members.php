<?php
header("Access-Control-Allow-Origin: *");
if($_SERVER['REQUEST_METHOD']== "GET"){
    $response=array();
    include_once("classes.php");
    $conn=new Api();
    if(isset($_GET['mobile'])){
         $check_exist=$conn->query("SELECT `mobile` from members WHERE mobile=".$_GET['mobile']);
            if(count($check_exist)>0){
                 array_push($response,array('status'=>"failed","status_code"=>203,"message"=>"Mobile Number Already Exists","otp"=>"","mobile"=>$_GET['mobile'])); 
                 
             }else {
                 $insert=$conn->insert("members",array("mobile"=>$_GET['mobile']));
                 if($insert){
                     array_push($response,array('status'=>"success","status_code"=>200,"message"=>"Successfully Inserted","otp"=>$otp,"mobile"=>$_GET['mobile'])); 
                 }else{
                     array_push($response,array('status'=>"failed","status_code"=>201,"message"=>"Server Error Please try Again ","otp"=>"","mobile"=>$_GET['mobile']));
                 }
                  
             }
        
    }else if(isset($_GET['motp'])){
         $check_exist=$conn->query("SELECT `mobile` from members WHERE mobile=".$_GET['motp']);
        if(count($check_exist)>0){
            array_push($response,array('status'=>"failed","status_code"=>203,"message"=>"Mobile Number Already Exists","otp"=>"","mobile"=>$_GET['motp'])); 
        }else{
            $otp=mt_rand(100000, 999999);
            $conn->sendOtp($_GET['motp'],"One Time Password is:".$otp);
            array_push($response,array('status'=>"success","status_code"=>200,"message"=>"Successfully Send OTP ","otp"=>$otp,"mobile"=>$_GET['motp'])); 
        }
    }
    echo json_encode($response);
}else{
    echo "Only HTTP  GET REQUEST Supported";
}

?>