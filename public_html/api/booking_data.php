<?php
if(isset($_GET['id'])){
    $data=file_get_contents('../database/bookings.json');
    $arr=json_decode($data,true);
    $booking=[];
    for($i=0;$i<count($arr);$i++){
        if($arr[$i]['mid']==$_GET['id']){
            array_push($booking,$arr[$i]);
        }
    }
    
    echo json_encode(array_reverse($booking));
}
?>