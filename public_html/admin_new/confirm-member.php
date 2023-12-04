<?php
include_once('database.php');
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['id'])){
    for ($i=0; $i <count($members) ; $i++){ 
	if ($members[$i]['id']==$_POST['id']) {
		$members[$i]['active']=1;
	
	}
}

if(file_put_contents("../database/member.json", json_encode($members))){
	echo 1;
}else{
	echo 0;
}
}else if(isset($_POST['inactive_id'])){
    for ($i=0; $i <count($members) ; $i++){ 
	if ($members[$i]['id']==$_POST['inactive_id']) {
		$members[$i]['active']=0;
	
	}
}

if(file_put_contents("../database/member.json", json_encode($members))){
	echo 1;
}else{
	echo 0;
}
}



?>