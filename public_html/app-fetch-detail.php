<?php
$php_post = json_decode(file_get_contents('php://input'), true);
$users = json_decode(file_get_contents('database/member.json'), true);

$arr=array();

$arr['status']='false';
for($i=0;$i<count($users);$i++){
    if($users[$i]['mobile']==$php_post['mobile']){
        $arr['status']='true';
        $arr['mid']=$users[$i]['id'];
        $arr['mobile']=$users[$i]['mobile'];
        $arr['name']=$users[$i]['name'];
        $arr['email']=$users[$i]['email'];
        $arr['pincode']=$users[$i]['pincode'];
        $arr['city']=$users[$i]['city'];
        $arr['address']=$users[$i]['address'];
        $arr['membership']=$users[$i]['membership'];
    }
}


echo json_encode($arr);
?>