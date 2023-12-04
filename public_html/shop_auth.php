<?php
session_start();

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers:*');
header('Content-Type:application/json');

include_once('../vendor/autoload.php');
include_once('../database/secret.php');
include_once('../database/connect.php');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


$sql="select * from shopkeeper where mobile='$_POST[mobile]' and password='$_POST[pwd]';";
$tog=0;
$arr=mysqli_query($conn,$sql);

if(mysqli_num_rows($arr) > 0)
{
        
        $profile='';
        $sql2="select * from shopkeeper where mobile='$_POST[mobile]' and password='$_POST[pwd]' and status='1';";
        $result=mysqli_query($conn,$sql2);
        
        if(mysqli_num_rows($result) > 0)
        {
        $arr=[];
        $arr['data']=[];
        while($row = mysqli_fetch_assoc($result)){
        extract($row);
        $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
        $date   = new DateTimeImmutable();
        $expire_at     = $date->modify('+6 minutes')->getTimestamp();      // Add 60 seconds
        $domainName = "http://ocsainnovative.com";
        $username   = "username";
        $payload = [
        'iss' => 'http://ocsainnovative.com',
        'aud' => 'https://api.service.nhs.uk/mock-jwks/eyJrZXlzIjoKICAgICAgIFsKICAgICAgICAgeyJrdHkiOiJvY3QiLAogICAgICAgICAgImFsZyI6IlJTQSIsCiAgICAgICAgICAiayI6InNzaC1yc2FBQUFBQjNOemFDMXljMkVBQUFBREFRQUJBQUFCZ1FESnBJUTVNbVZKZWRicEVNVjE1OUhIZmduYldDMkgraEI5U0dyVER3NEl6SVBrZEt1bG5NV2RGaXdmT29maDdhNHd6NkVlUHA1azZ6Y1ZSR0ROQzd4TWx5TDlFNEhubE9iSXZRUDJsc0JuSlFLODJVVElSeW56cXBUbklxWDh3K3ZQNmxhTHFmcFhKWWJML0tVb2I1ZEhWOHlmdjJueVVBK2dKZC9SSS9uWjJwdUYrUmw3MnQvUWhHNUlSQXZvQjhCUDcveXRGeG5ZLzBQVi9Rcy9KSjBYSkdpTVlyUmVGZW9kbUhRN1BpRnFQS1l0UDVycEFGdisxaUM1QTFGT3ZTN05VVVZaL09Mby9kREpidWFCTDNSNGhaMnJ6dGYwUm0wQ2trRWJyZUxGc3luV2ZQWXVGekFIa1ZJUkJWbzZPdFpUU0RqajZIdXpPSXhIMTJocEZ3UDNmL0MxV3RFU055MERRQy96em9mTTdneGhHUGxEMjhtcURBaUYxV29aUm8vbXRjV3BaVEFEa0FjdmoweFpIKzZySWVvazVobDYwUjA1TWxDOXhhWGFLMXd4Z05jb2pibkxocTlLYWx6bS9nZnJnZDRIOURqcnFCMUhhRzZRbzdHcFJ2RWhTcFB5U1VEeW1rWkoxVkZ5VnFXZmdDdTVsYVczZkNZc2xMNTRTdjg9IHJvb3RAc3RhcmtqYXJ2aXN2Mi1JbnNwaXJvbi01NTM3In0KICAgICAgIF0KICAgICB9Cg',
        'iat' => $date->getTimestamp(),
        'nbf' => $date->getTimestamp(),
        'exp' => $expire_at,
        'profileid'=> $row['id']
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        //echo $jwt;
        $_SESSION['jwt']= $jwt;
        $_SESSION['profileid']=$id;
        //array_push($_SESSION['profile'],$row);
        $tog=1;
        //echo $tog;
        //echo $type;
        
        $item=array(
        'jwt'=>$jwt,
        'id'=>$id,
        'name'=>$name,
        'email'=>$email,
        'password'=>$password,
        'mobile'=>$mobile,
        'address'=>$address,
        'city'=>$city,
        'pincode'=>$pincode,
        'main_wallet'=>$main_wallet,
        'wallet'=>$wallet,
        'paid_amount'=>$paid_amount,
        'months_available'=>$months_available,
        'membership'=>$membership,
        'referralid'=>$referralid,
        'tog'=>$tog,
        'type'=>$type
        );
        array_push($arr['data'],$item);
        }
        $_SESSION['profile']=$arr;
        echo json_encode($arr);
        
        }
        else{
            $arr=[];
            $arr['data']=[];
            $tog=2;
            $item=array(
                'tog'=>$tog
            );
            array_push($arr['data'],$item);
            echo json_encode($arr);
            
        }
        
        mysqli_close($conn);
    }
else//passord doesn't match
{
    //echo $sql;
    //echo mysqli_error($conn);
    $arr=[];
    $arr['data']=[];
    $tog=0;
    $item=array(
                'tog'=>$tog
            );
    array_push($arr['data'],$item);
    echo json_encode($arr);
}

?>