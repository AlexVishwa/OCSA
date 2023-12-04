<?php
if($_POST['ptype']=='cash'){
date_default_timezone_set("Asia/Kolkata");
include_once('sendotp.php');
$booking=file_get_contents("database/sanitization.json");
$arr=json_decode($booking,true);
$arr1=array();
$id=time();
$arr[]=array('id'=>$id,'space'=>$_POST['space'],'mid'=>$_POST['uid'],'servicename'=>'Covid-19 Sanitization ','servicecharge'=>$_POST['total'],'membername'=>$_POST['name'],'mobile'=>$_POST['mobile'],'contactpersonname'=>$_POST['cpn'],'contactpersonmobile'=>$_POST['cpno'],'address'=>$_POST['address'],'area'=>$_POST['area'],'date'=>date('d-m-Y H:i:s A'),"confirmdate"=>"",'status'=>0,"paymentstatus"=>0,"paymenttype"=>$_POST['ptype']);
file_put_contents("database/sanitization.json", json_encode($arr));
sendOtp($_POST['mobile'],'Welcome to OCSA, Your booking  of '.$_POST['space'].' Space for Sanitization successfully booked ! service-id : '.$id.' Total area '.$_POST['area'].' SqFt Price: '. $_POST['total'].' Thank You !  Contact : cotact@ocsa.in');
sendOtp(8923023538,'Booking '.$_POST['space'].' for Sanitization successfully booked ! service-id : '.$id.' from '.$_POST['address'].' By '.$_POST['name'].' ,Mobile: '.$_POST['mobile'].' Contact Person: '.$_POST['cpn'].' and Mobile:'.$_POST['cpno'].' Total area '.$_POST['area'].' SqFt Price: '. $_POST['total'].' Thank You !  Contact : cotact@ocsa.in');
$arr1['status']='1';
echo json_encode($arr1);
    
}else{
    date_default_timezone_set("Asia/Kolkata");
    $member=file_get_contents("database/member.json");
    $member_arr=json_decode($member,true);
    include_once('sendotp.php');
    $booking=file_get_contents("database/sanitization.json");
    $arr=json_decode($booking,true);
    $transaction=file_get_contents("database/transaction.json");
    $transaction_arr=json_decode($transaction,true);
    $name="";
    $mid="";
    $arr1=array();
    
    for ($i=0; $i <count($member_arr) ; $i++) { 
    	if ($member_arr[$i]['mobile']==$_POST['mobile']) {
    		$member_arr[$i]['active'] =1;
    		$name=$member_arr[$i]['name'];
    		$mid=$member_arr[$i]['id'];
    		
    		
    	}
    }
    
    $transaction_arr[]=array('transaction_id'=>$_POST['ti'],'mid'=>$mid,'name'=>$name,'mobile'=>$_POST['mobile'],'amount'=>$_POST['amount'],'type'=>'Sanitization Fee','date'=>date('d-m-Y H:i:s A'));
    $id=time();
    $arr[]=array('id'=>$id,'space'=>$_POST['space'],'mid'=>$_POST['uid'],'servicename'=>'Covid-19 Sanitization ','servicecharge'=>$_POST['total'],'membername'=>$_POST['name'],'mobile'=>$_POST['mobile'],'contactpersonname'=>$_POST['cpn'],'contactpersonmobile'=>$_POST['cpno'],'address'=>$_POST['address'],'area'=>$_POST['area'],'date'=>date('d-m-Y H:i:s A'),"confirmdate"=>"",'status'=>0,"paymentstatus"=>1,"paymenttype"=>$_POST['ptype']);
    file_put_contents("database/sanitization.json", json_encode($arr));
    sendOtp($_POST['mobile'],'Welcome to OCSA, Your booking  of '.$_POST['space'].' Space for Sanitization successfully booked ! service-id : '.$id.' Total area '.$_POST['area'].' SqFt Price: '. $_POST['total'].' Thank You !  Contact : cotact@ocsa.in');
    sendOtp(8923023538,'Booking '.$_POST['space'].' for Sanitization successfully booked ! service-id : '.$id.' from '.$_POST['address'].' By '.$_POST['name'].' ,Mobile: '.$_POST['mobile'].' Contact Person: '.$_POST['cpn'].' and Mobile:'.$_POST['cpno'].' Total area '.$_POST['area'].' SqFt Price: '. $_POST['total']);

    file_put_contents("database/member.json", json_encode($member_arr));
    file_put_contents("database/transaction.json", json_encode($transaction_arr));
    $arr1['status']='1';
    echo json_encode($arr1);
}
?>