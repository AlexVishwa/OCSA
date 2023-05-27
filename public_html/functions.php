<?php
function checkMobile($mobile){
	$data=file_get_contents("database/member.json");
	$arr=json_decode($data,true);
	$tog='false';
	if (count($arr) > 0){
		for ($i=0; $i <count($arr) ; $i++) { 
			if ($arr[$i]['mobile']==$mobile) {
				$tog ='true';
			}
		}
	}

	return $tog;
}

function checkEmail($email){
	$data=file_get_contents("database/member.json");
	$arr=json_decode($data,true);
	$tog='false';
	if (count($arr) > 0){
		for ($i=0; $i <count($arr) ; $i++) { 
			if ($arr[$i]['email']==$email) {
				$tog ='true';
			}
		}
	}

	return $tog;
}

?>