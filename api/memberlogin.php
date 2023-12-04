<?php
require('../database/connect.php');
if (!$conn) {
    die("Connection failed: " . $conn->connect_error());
}
$sql= "select * from member";
$members= $conn->query($sql);
$arr=array();

$arr['status']='false';
for($i=0;$i<count($users);$i++){
    if($users[$i]['mobile']==$_POST['user'] && $users[$i]['password']==$_POST['pass']){
        $arr['status']='true';
        $arr['active']=$users[$i]['status'];
        $arr['user']=$users[$i]['mobile'];
        $arr['pass']=$users[$i]['password'];
        $arr['id']=$users[$i]['id'];
        $arr['name']=$users[$i]['name'];
        $arr['type']=$users[$i]['type'];
        
    }
}


echo json_encode($arr);
?>