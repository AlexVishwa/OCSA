<?php
//$php_post = json_decode(file_get_contents('php://input'), true);
$users = json_decode(file_get_contents('database/member.json'), true);

$arr=array();

$arr['status']='false';
for($i=0;$i<count($users);$i++){
    if($users[$i]['mobile']==$_POST['user'] && $users[$i]['password']==$_POST['pass']){
        $arr['status']='true';
        $arr['active']=$users[$i]['active'];
        $arr['user']=$users[$i]['mobile'];
        $arr['pass']=$users[$i]['password'];
        $arr['id']=$users[$i]['id'];
        $arr['member']=$users[$i]['membership'];
        $arr['name']=$users[$i]['name'];
    }
}


echo json_encode($arr);
?>