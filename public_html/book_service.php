<!DOCTYPE html>
<html lang="en">
<head>
  <title>OCSA ENGINEER</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="images/logo1.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <body>
<?php

date_default_timezone_set("Asia/Kolkata");
include_once('sendotp.php');
// array('user_id'=>$_SESSION['uid'],'mobile'=>$_POST['mobile'],'alternate_mobile'=>$_POST['alternate_mobile'],
//  'service'=>$_POST['sname'],'book_for'=>$_POST['soption'],'date'=>date('d-m-Y H:i'))

// <img  src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" class="center" alt="" />
//sendOtp($_POST['mobile'],'Welcome OCSA, You Booked '.$_POST['sname'].' for '.$_POST['soption'].'
//Array ( [servicename] => AC Services [id] => 1 [mid] => 1575513249 [servicecharge] => 2400 [servicetype] => AC Servicing [appliancetype] => Split AC [name] => Ravendra Kumar [mobile] => 7906605262 [email] => rkrajput13297@gmail.com [city] => Ghaziabad [pincode] => 201002 [alternatemobile] => 8535010165 [address] => Shastri Nagar Ghaziabad [example1] => on )

$booking=file_get_contents("database/bookings.json");
$arr=json_decode($booking,true);

$id=time();
$arr[]=array('id'=>$id,'sid'=>$_POST['id'],'mid'=>$_POST['mid'],'servicename'=>$_POST['servicename'],'servicecharge'=>$_POST['servicecharge'],'servicetype'=>$_POST['servicetype'],'appliancetype'=>$_POST['appliancetype'],'membername'=>$_POST['name'],'mobile'=>$_POST['mobile'],'alternatemobile'=>$_POST['alternatemobile'],'email'=>$_POST['email'],'address'=>$_POST['address'],'pincode'=>$_POST['pincode'],'city'=>$_POST['city'],'date'=>date('d-m-Y H:i:s A'),"confirmdate"=>"",'status'=>0);
file_put_contents("database/bookings.json", json_encode($arr));
sendOtp($_POST['mobile'],'Welcome to OCSA, Your booking '.$_POST['servicename'].'  of '.$_POST['appliancetype'].' for '.$_POST['servicetype'].' successfully booked ! service-id : '.$id.' Thank You !  Contact : cotact@ocsa.in');



?>
<div class="container" style="width:100%;height:100vh;display:flex;justify-content:center;align-items:center">
    <img src="images/success.png">
</div>
</body>
</html>