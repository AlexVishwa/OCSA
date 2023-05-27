<?php
session_start();
$data=file_get_contents("database/member.json");
$arr=json_decode($data,true);

$tog=0;
for ($i=0; $i <count($arr) ; $i++) { 
    if ($arr[$i]['mobile']==$_POST['mobile'] && $arr[$i]['password']==$_POST['pwd']) {
    	
    	if ($arr[$i]['active']==1) {
    		$tog=1;
    		$_SESSION['auth']=$arr[$i]['id'];
    	}else{
    		$tog=2;
    	}
    	
    }
}


echo $tog;
?>