<?php
$php_post = json_decode(file_get_contents('php://input'), true);
date_default_timezone_set("Asia/Kolkata");
include_once('sendotp.php');
// array('user_id'=>$_SESSION['uid'],'mobile'=>$_POST['mobile'],'alternate_mobile'=>$_POST['alternate_mobile'],
//  'service'=>$_POST['sname'],'book_for'=>$_POST['soption'],'date'=>date('d-m-Y H:i'))

// <img  src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" class="center" alt="" />
//sendOtp($_POST['mobile'],'Welcome OCSA, You Booked '.$_POST['sname'].' for '.$_POST['soption'].'
$output=[];

$booking=file_get_contents("database/bookings.json");
$arr=json_decode($booking,true);

$id=time();
$tog=0;
for($i=0;$i<count($arr);$i++)
{
    if($arr[$i]['mid']==$php_post['mid'] && $arr[$i]['sid']==$php_post['sid'] && $arr[$i]['bdate']==date('d-m-Y')){
        $tog=1;
    }
}

if($tog==0){
$arr[]=array('id'=>$id,'sid'=>$php_post['sid'],'mid'=>$php_post['mid'],'servicename'=>$php_post['title'],'servicecharge'=>$php_post['price'],'membername'=>$php_post['name'],'mobile'=>$php_post['mobile'],'email'=>$php_post['email'],'address'=>$php_post['address'],'pincode'=>$php_post['pincode'],'city'=>$php_post['city'],'bookingfor'=>$php_post['bookfor'],'date'=>date('d-m-Y H:i:s A'),'bdate'=>date('d-m-Y'),'cancel'=>0,'cancel_by'=>'',"confirmdate"=>"",'status'=>0);

file_put_contents("database/bookings.json", json_encode($arr));
sendOtp($php_post['mobile'],'Welcome to OCSA, Your booking '.$php_post['title'].'  for '.$php_post['bookfor'].' successfully booked ! service-id : '.$id.' Thank You !  Contact : cotact@ocsa.in');
$output['status']='true';
}else{
   $output['status']='false'; 
}
echo json_encode($output);

?>



