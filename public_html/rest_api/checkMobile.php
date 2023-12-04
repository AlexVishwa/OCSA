<?php
include_once("classes.php");
header('Content-Type:application/json');
$conn=new Api();
$result=$conn->query("Select * from member where mobile='$_GET[mobile]';");
$response[]=[];
$response['data']=[];
if(count($result) > 0)
{
	array_push($response['data'],array("status"=>"Failure","status_code"=>200,"msg"=>"Phone number already registered"));
}
else
{
	array_push($response['data'],array("status"=>"Success","status_code"=>200,"msg"=>"Registration successful"));	
}
echo json_encode($response);
?>