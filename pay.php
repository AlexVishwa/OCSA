<?php
date_default_timezone_set("Asia/Kolkata");
$member=file_get_contents("database/member.json");
$member_arr=json_decode($member,true);

$transaction=file_get_contents("database/transaction.json");
$transaction_arr=json_decode($transaction,true);

for ($i=0; $i <count($member_arr) ; $i++) { 
	if ($member_arr[$i]['id']==$_POST['itemId']) {
		$member_arr[$i]['paid_amount']=$_POST['amount'];
		$member_arr[$i]['membership']=1;
		$member_arr[$i]['sdate']=date('d-m-Y');



	}
}

$transaction_arr[]=array('transaction_id'=>$_POST['ti'],'mid'=>$_POST['itemId'],'name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'amount'=>$_POST['amount'],'type'=>'Membership','date'=>date('d-m-Y H:i:s A'));

file_put_contents("database/member.json", json_encode($member_arr));
file_put_contents("database/transaction.json", json_encode($transaction_arr));
echo 1;
?>