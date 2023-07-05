<?php
include_once('database.php');
date_default_timezone_set("Asia/Kolkata");
for ($i=0; $i <count($bookings) ; $i++){ 
	if ($bookings[$i]['id']==$_POST['id']) {
		$bookings[$i]['status']=1;
		$bookings[$i]['confirmdate']=date('d-m-Y H:i:s A');
	}
}

if(file_put_contents("../database/bookings.json", json_encode($bookings))){
	echo 1;
}else{
	echo 0;
}


?>