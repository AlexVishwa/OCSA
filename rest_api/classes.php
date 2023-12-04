<?php
include_once("dbconnection.php");
class Api extends Dbconnection {
    
    function insert($table,$data=array()){
    
    $column = implode(", ",array_keys($data));
    $key = array_keys($data);
    $temp_val=[];
    for($t=0;$t<count($key);$t++)
    {
        array_push($temp_val,'?');
    }
    $tv=implode(", ",$temp_val);
    //echo $key;
     $sql="INSERT INTO $table ($column) VALUES($tv)";
     try{
     $statement = $this->db->prepare($sql);
     for($i=0;$i<count($key);$i++)
     {
        $statement->bindParam($i+1, $data[$key[$i]], PDO::PARAM_STR);
     }
     if($statement->execute())
     {
         return true;
     }else{
         return false;
     }
    } catch(PDOException $f){
         echo $f->getMessage();
    }
     
  }
  
  
  
  function update($table,$data=array(),$field)
{
    //$column = implode(", ",array_keys($data));
    $key = array_keys($data);
    //print_r($key);
    $temp_val=[];
    for($t=0;$t<count($key);$t++)
    {
        array_push($temp_val,'`'.$key[$t].'`=?');
       
    }
    //print_r($temp_val);
    $tv=implode(", ",$temp_val);
    //echo $key;
     $sql="UPDATE $table SET $tv WHERE $field = ?";
     try{
     $statement = $this->db->prepare($sql);
     for($i=0;$i<count($key);$i++)
     {
        $statement->bindParam($i+1, $data[$key[$i]], PDO::PARAM_STR);
     }
     $statement->bindParam(count($key)+1, $field, PDO::PARAM_STR);
     if($statement->execute())
     {
         return true;
     }else{
         return false;
     }
    } catch(PDOException $f){
         echo $f->getMessage();
    }
}

function query($sql){
  try{
       $statement = $this->db->prepare($sql);
      
        if($statement->execute())
        {
            $data_array=[];
            while($d = $statement->fetch(PDO::FETCH_ASSOC))
            {
               // print_r($d);
               array_push($data_array,$d);
            }
           return $data_array;
        }else{
            return false;
        }
   } catch(PDOException $f){
        echo $f->getMessage();
   }
}

function sendOtp($mob,$sms)
{
	// pro = 1
// tra = 4
// otp =14

  //Your authentication key
$authKey = "12923Ao4X0qCn4Fcc5d4d078c";

//Multiple mobiles numbers separated by comma
$mobileNumber = $mob;

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "OCSAEN";

//Your message to send, Add URL encoding here.
$message = urlencode($sms);

//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://login.yourbulksms.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

// print_r( $output);
}

}
?>