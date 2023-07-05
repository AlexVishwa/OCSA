<?php
// print_r($_POST);
// print_r($_FILES);
date_default_timezone_set("Asia/Kolkata");
$data=file_get_contents("database/career.json");
$arr=json_decode($data,true);
$temp = explode(".", $_FILES["resume"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$temp1 = explode(".", $_FILES["photo"]["name"]);
$newfilename1 = round(microtime(true)) . '.' . end($temp1);

$arr[]=array('id'=>time(),'date'=>date('d-m-Y H:i:s'),'Name'=>$_POST['name'],'Mobile'=>$_POST['number'],"Email"=>$_POST['email'],"Pincode"=>$_POST['pincode'],"PostOffice"=>$_POST['postoffice'],"City"=>$_POST['city'],"State"=>$_POST['state'],"Country"=>$_POST['country'],"Address"=>$_POST['fulladdress'],"Education"=>$_POST['education'],"Percentage"=>$_POST['percentage'],"Passing Year"=>$_POST['year'],"Exp From Date"=>$_POST['fromdate'],"Exp To Date"=>$_POST['todate'],"Apply For"=>$_POST['applyfor'],"Keyskills"=>$_POST['keyskills'],"Notes"=>$_POST['note'],"resume"=>"career/". $newfilename,"photo"=>"career/". $newfilename1);

if (move_uploaded_file($_FILES["resume"]["tmp_name"], 'career/'. $newfilename)){
	move_uploaded_file($_FILES["photo"]["tmp_name"], 'career/'. $newfilename1);
	file_put_contents("database/career.json", json_encode($arr));
	echo 1;
}else{
	echo 0;
}

?>