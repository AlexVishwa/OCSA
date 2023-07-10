<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
include_once('rest_api/classes.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
        
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
      header('Access-Control-Allow-Credentials: true');
      header('Access-Control-Max-Age: 86400');
        //header('Content-Type: text/html'); 
    	include_once('sendotp.php');
      $rand=mt_rand(100000, 999999);
    	/*
      //$check_mobile=$conn->checkMob($_POST['mobile']);
      //$check_email=checkEmail($_POST['email']);
        
        if(json_decode($check_mobile)-> status =='Failure'){
         echo "<h5 style=\"padding:10px;\">Mobile Number Already Exists.</h5>";   
        }//else if($check_email == 'true'){
         //    echo "<h5 style=\"padding:10px;\">This Email Already Exists</h5>";   
        //}
        else{
           //$responce=sendOtp($_POST['mobile'],'OCSA,  Your One Time Password :'.$rand);
          /*
          $possible=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m','1','2','3','4','5','6','7','8','9');
            
            $randomotp='';
            for($i=0;$i<4;$i++)
            {    
            $randomotp= $randomotp.$possible[rand(0,41)];
            }
            mail('testmem2@yopmail.com','OCSA Site Registration','Otp is'.$randomotp);
            */
?>
    	
            <div class="row">	
            <div class="col-lg-12 col-md-12">
                      <p id="verifymsg" align="center"></p>

            		  <label for="otp"> Enter OTP here received on your email</label><br>
                      <input id="otp" type="number" class="validate" minlength="4" maxlength="6" class="form-control" style="width: 100%;height: 35px;padding: 10px;"><br>
                      <input id="otp_get" type="text" class="validate" minlength="4" maxlength="6" value="<?php echo $rand; ?>" class="form-control">
                </div>
                <div class="col-md-12" style="padding:15px">
                      <a href="#" class="btn-sm btn-primary verify_mobile" >Verify Email</a>
                </div>
            </div>
<?php


}
?>