<?php
if(isset($_GET['id'])){
    $data=file_get_contents('../database/wallet.json');
    $arr=json_decode($data,true);
    $booking=[];
    for($i=0;$i<count($arr);$i++){
        if($arr[$i]['id']==$_GET['id']){
            array_push($booking,$arr[$i]);
        }
    }
    
    echo json_encode($booking);
    
    
}
?>