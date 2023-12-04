<?php
if(isset($_GET['mobile'])){
    $data=file_get_contents('../database/transaction.json');
    $arr=json_decode($data,true);
    $booking=[];
    for($i=0;$i<count($arr);$i++){
        if($arr[$i]['mobile']== $_GET['mobile']){
           array_push($booking,$arr[$i]);
        }
    }
    
    echo json_encode($booking);
    
    
}
?>