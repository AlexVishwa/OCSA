<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
        
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); 
    	//include_once('sendotp.php');
      include_once('functions.php');

    	$rand=mt_rand(100000, 999999);
    	$check_mobile=checkMobile($_POST['mobile']);
      $check_email=checkMobile($_POST['email']);
    
        
        if($check_mobile =='true'){
         echo "<h5 style='padding:10px'>Mobile Number Already Exists.</h5>";   
        }else if($check_email=='true'){
             echo "<h5 style='padding:10px'>This email  Already Exists.</h5>";   
        }else{
           //$responce=sendOtp($_POST['mobile'],'OCSA,  Your One Time Password :'.$rand);
    	?>
            <div class="row">	
            <div class="col-lg-12 col-md-12">
                      <p id="verifymsg" align="center"></p>

            		  <label for="otp"> Enter OTP Here </label><br>
                      <input id="otp" type="number" class="validate" minlength="6" maxlength="6" class="form-control" style="width: 100%;height: 35px;padding: 10px;"><br>
                      <input id="otp_get" type="text" class="validate" minlength="6" maxlength="6" value="<?php echo $rand; ?>" class="form-control">
                </div>
                <div class="col-md-12" style="padding:15px">
                      <a href="#" class="btn-sm btn-primary verify_mobile" >Verify Mobile</a>
                </div>
            </div>
<?php 
}
}
?>