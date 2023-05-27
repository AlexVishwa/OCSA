<?php
include_once('header.php');
?>
<style type="text/css">
	input,button{
	border: 0.1px solid #aa0000 !important;
    color: #aa0000 !important;
    border-radius: 0px !important;
	}
  #submit_otp,#fotp{
    display: none;
  }
</style>
<!-- The Modal -->
  <div class="modal fade" id="forgotpasswordmodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Recover Your Password</h4>
          <button type="button" class="close" data-dismiss="modal" style="border: none !important;">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           
           <input type="number" name="fmobile" id="fmobile" placeholder="Registered Mobile" class="form-control"><br>
            <input type="number" name="fotp" id="fotp" placeholder="OTP" class="form-control">
            <p class="msg"></p>
           <button id="submit_btn_forgot_pass" style="background: #03aa00;color: #fff !important; padding: 4px 10px;border: none !important;">SEND OTP</button>
            <button id="submit_otp" style="background: #03aa00;color: #fff !important; padding: 4px 10px;border: none !important;">SUBMIT OTP</button>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger text-white" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<div class="container-fluid" style="display: flex;flex-direction: column;justify-content: center;align-items: center;padding: 20px 0px;background: #ffffffab;">
	<h2 style="border-bottom: 1px solid;padding-bottom: 5px;color: #aa0000;font-weight: bold;">Member Login</h2>

	<form action="member_auth.php" id="member_auth" method="post" style="width: 300px;padding: 30px 5px;">
	  <div class="form-group">
	    <label for="email">Mobile Number:</label>
	    <input type="number" class="form-control" id="mobile" required="required">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Password:</label>
	    <input type="password" class="form-control" id="pwd" required="required">
	  </div>
	 
	  <button type="submit" class="btn btn-primary" id="mlogin" style="background: #aa0000;color: #fff !important;">LOGIN</button><br>
	  <p class="text-danger" data-toggle="modal" data-target="#forgotpasswordmodal">Forgot Password Click Here</p>
	</form>
	<p style="font-size: 18px">Don't have an account 
		<a href="member-registration.php" style="background: #29d650;color: white;padding: 2px 10px;   border-radius: 0px;">Register Now</a></p>
</div>
<?php
include_once('footer.php');
?>