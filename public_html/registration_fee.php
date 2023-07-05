<?php
date_default_timezone_set("Asia/Kolkata");
$member=file_get_contents("database/member.json");
$member_arr=json_decode($member,true);

$transaction=file_get_contents("database/transaction.json");
$transaction_arr=json_decode($transaction,true);
$name="";
$mid="";
$arr=array();

for ($i=0; $i <count($member_arr) ; $i++) { 
	if ($member_arr[$i]['mobile']==$_POST['mobile']) {
		$member_arr[$i]['active'] =1;
		$member_arr[$i]['wallet'] =100;
		$name=$member_arr[$i]['name'];
		$mid=$member_arr[$i]['id'];
		
		
	}
}

$transaction_arr[]=array('transaction_id'=>$_POST['ti'],'mid'=>$mid,'name'=>$name,'mobile'=>$_POST['mobile'],'amount'=>$_POST['amount'],'type'=>'Registration Fee','date'=>date('d-m-Y H:i:s A'));

file_put_contents("database/member.json", json_encode($member_arr));
file_put_contents("database/transaction.json", json_encode($transaction_arr));
$arr['status']='1';
echo json_encode($arr);
?>