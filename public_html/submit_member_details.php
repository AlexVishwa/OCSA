<?php
header('Access-Control-Allow-Headers:*');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400'); 
$conn = new mysqli($servername, $username, $password, $dbname);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //include('sendotp.php');
    include('database/connect.php');
	date_default_timezone_set("Asia/Kolkata");
    if (!$conn) {
    die("Connection failed: " . $conn->connect_error());
    }
    $id=time();/*
    $wallet_arr[]=array('id'=>$id,'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'email'=>$_POST['email'],'referral'=>$_POST['referral'],'wallet'=>0);
    $arr[]=array('id'=>$id,'name'=>$_POST['name'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'password'=>$_POST['password'],'address'=>$_POST['address'],'city'=>$_POST['city'],'pincode'=>$_POST['pincode'],'appliance'=>$_POST['appliance'],'quantity'=>$_POST['quantity'],'created'=>date('d-M-Y H:s:i A'),'main_wallet'=>0,'wallet'=>0,'paid_amount'=>0,'membership'=>0,'month_available'=>0,'referral'=>$_POST['referral'],'active'=>0);
    */
    $sql3="Insert into wallet(id,name,email,mobile,referral,walletbalance,paid_amount) Values('$id','$_POST[name]','$_POST[email]','$_POST[mobile]','','0','0');";
    $sql4="Insert into member(id,name,email,password,mobile,address,city,pincode,main_wallet,wallet,paid_amount,months_available,membership,referralid,active,type) Values('$id','$_POST[name]','$_POST[email]','$_POST[password]','$_POST[mobile]','$_POST[address]','$_POST[city]','$_POST[pincode]','0','0','0','0','0','$_POST[referral]','0','unpaid');";
        $conn->query($sql3);
        $result=$conn->query($sql4);
        /*
        if($result)
        {
        $tog=1;
        $arr=[];
        $arr['data']=[];
        $item=array(
            'tog'=>$tog
        );
        array_push($arr['data'],$item);
        echo json_encode($arr);
        }
        else{
        $tog=0;
        $arr=[];
        $arr['data']=[];
        $item=array(
            'tog'=>$tog
        );
        array_push($arr['data'],$item);
        
        array_push($arr['data'],"Error".$conn->error)
        echo json_encode($arr);   
        }
        */
        header("Location: http://localhost/serv/public_html/member-login.php");
        
    //sendOtp($_POST['mobile'],'Thank You '.$_POST['name'].' registered with us. Your username= '.$_POST['mobile'].' & password='.$_POST['password'].'. for contact: Mail Us:contact@ocsa.in');
    
}
?>
