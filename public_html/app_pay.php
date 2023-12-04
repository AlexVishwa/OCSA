<?php
date_default_timezone_set("Asia/Kolkata");
$member=file_get_contents("database/member.json");
$member_arr=json_decode($member,true);

$member_wallet=file_get_contents("database/wallet.json");
$member_wallet_arr=json_decode($member_wallet,true);

$transaction=file_get_contents("database/transaction.json");
$transaction_arr=json_decode($transaction,true);
$arr=array();
$mid="";
$name="";
for ($i=0; $i <count($member_arr) ; $i++) { 
	if ($member_arr[$i]['mobile']==$_POST['mobile']) {
		$member_arr[$i]['paid_amount']=$_POST['amount'];
		$member_arr[$i]['membership']=1;
		$member_arr[$i]['sdate']=date('d-m-Y');
		$name=$member_arr[$i]['name'];
		$mid=$member_arr[$i]['id'];



	}
}

for($i=0;$i<count($member_wallet_arr);$i++){
    if($member_wallet_arr[$i]['id']==$mid){
        	$member_wallet_arr[$i]['paid_amount']=$_POST['amount'];
    }
}

$transaction_arr[]=array('transaction_id'=>$_POST['ti'],'mid'=>$mid,'name'=>$name,'mobile'=>$_POST['mobile'],'amount'=>$_POST['amount'],'type'=>'Membership','date'=>date('d-m-Y H:i:s A'));

file_put_contents("database/member.json", json_encode($member_arr));
file_put_contents("database/transaction.json", json_encode($transaction_arr));
file_put_contents("database/wallet.json", json_encode($member_wallet_arr));
$arr['status']='1';
echo json_encode($arr);
?>