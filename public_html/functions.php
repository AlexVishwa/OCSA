<?php
include_once('database/connect.php');

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers:*');

function checkMobile($mobile){

	//$data=file_get_contents("database/member.json");
	//$arr=json_decode($data,true);
	$tog='false';
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql="Select * from member where mobile='".$mobile."' ;";
	
	$password="";
	$result=mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result) != 0){
		$tog='true';
		return $tog;
	}
	return $tog;
}

function checkEmail($email){
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql="Select * from member where email='".$email."' ;";
	$result=mysqli_query($conn,$sql);
	$tog='false';
	$password="";
	if(mysqli_num_rows($result) != 0){
		$tog='true';
		return $tog;
	}
	return $tog;
}

?>