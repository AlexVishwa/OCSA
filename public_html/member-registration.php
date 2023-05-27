<?php
include_once('header.php');
?>
<style type="text/css">
 input, textarea, select {
    border: 0.1px solid #aa0000 !important;
    margin: 4px 0px;
    border-radius: 0px !important;
    color: #aa0000 !important;
}
</style>
<div class="container-fluid registration-form" style="background: #ffffff94;">
  <div class="container">
    <h3 align="center" style="padding-top: 20px;color: #aa0000;font-weight: bold;font-size: 25px;">Member Registration Form</h3>
    <hr style="border-bottom: 0.1px solid #aa0000;">
    <h5 align="center" id="msg"></h5>
     <form action="submit_details.php" method="post" id="registration_form">
     <div class="row">
           <div class="input-wrape col-md-6">
             <input type="text" name="referral" id="referral" placeholder="Referral number" class="form-control" >
           </div>
           <div class="input-wrape col-md-6">
             <input type="text" name="name" id="membername" placeholder="Enter name" class="form-control" required>
           </div>
           <div class="input-wrape col-md-6">
             <input type="email" name="email" id="email" placeholder="Enter email" class="form-control" required>
           </div>
           <div class="input-wrape col-md-6">
             <input type="number" name="mobile" id="mobile" placeholder="Enter mobile" class="form-control" required>
           </div>
            <div class="input-wrape col-md-6">
             <input type="password" name="password" id="password" placeholder=" password" class="form-control" required>
           </div>
           <div class="input-wrape col-md-6">
             <input type="text" name="pincode" id="pincode" placeholder=" pincode" class="form-control" required>
             <div class="pincodearea" ></div>
           </div>
           <div class="input-wrape col-md-6">
             <input type="text" name="postoffice" id="postoffice" placeholder="postoffice" class="form-control" required >
           </div>
           <div class="input-wrape col-md-6">
             <input type="text" name="city" id="city" placeholder=" city" class="form-control" required >
           </div>
           <div class="input-wrape col-md-6">
             <input type="text" name="state" id="state" placeholder="state" class="form-control" required >
           </div>
           <div class="input-wrape col-md-6">
             <input type="text" name="country" id="country" placeholder="country" class="form-control" required >
           </div>
          <!--  <div class="input-wrape col-md-6">
             <input type="text" name="city" id="city" placeholder="city" class="form-control" required >
           </div>
            -->
            <div class="col-md-12">
                  <div class="row">
                       <div class="col-md-12 col-sm-12 col-12" style="display: flex;justify-content: center; align-items: center;">
                           <select  name='appliance[]' class="form-control" style="margin-right: 10px;" required>
                                  <option value="" disabled selected>Appliance</option>
                                  <option value="AC" >AC</option>
                                  <option value="Washing Machine" >Washing Machine</option>
                                  <option value="Grinder Mixer" >Grinder Mixer</option>
                                  <option value="Cooler" >Cooler</option>
                                  <option value="Refrigerator" >Refrigerator</option>
                                  <option value="Microweb" >Microweb</option>
                                  <option value="LED & TV" >LED & TV</option>
                                  <option value="Home Theater" >Home Theater</option>
                                  <option value="Fan" >Fan</option>
                                  <option value="Computer/Laptop" >Computer/Laptop</option>
                                  <option value="Invertor" >Invertor</option>
                                  <option value="Water Purifier" >Water Purifier</option>
                                  <option value="Chimney" >Chimney</option>
                                  <option value="Gyser/WaterHeater" >Gyser/WaterHeater</option>
                                  <option value="Ipad,Mac" >Ipad,Mac</option>
                                  <option value="" >Mobile</option>
                                </select>
                              
                       
                       
                          <select name='quantity[]' style="margin-right: 10px;" class="form-control" required>
                                  <option value="" disabled selected>Quantity</option>
                                  <option value="1" >1</option>
                                  <option value="2" >2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                </select>
                                
                       
                       
                           <a class="btn btn-success" id="add_row" style="color: #fff;background: linear-gradient(45deg, #28a745, #007c1c);border-radius: 0px;border: none;padding: 6px 15px;">+</a>
                        </div>
                       
                  </div>
                  <div class="add_rows_here" style="padding: 4px 0px;">
                    
                  </div>
            </div>
           <div class="input-wrape col-md-12">
               <textarea name="fulladdress" id="fulladdress" class="form-control" placeholder="Full Address"></textarea>
           </div>
            <div class="input-wrape col-md-12">
               <button type="submit" class="btn btn-primary registernow" name="registernow" id="submit" style="background: #aa0000;border: none !important;border-radius: 0px !important">Register Now <i class="fa fa-angle-right"></i></button><br><br>
               <label>I have an Account !</label>
               <a href="member-login.php" class="btn-sm btn-warning" style="background: #09ce36;color: #fff;margin-left: 5px;border: none !important;border-radius: 0px !important"><i class="fa fa-lock"></i> Login Now</a>
           </div>
          
         
     </div>
     </form>
  </div>
</div>


<!-- veify otp -->
<div id="id01" class="modal1">
  
  <div class="modal-content1 animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container content">
     
    </div>

   
  </div>
</div>

<!-- verify otp end here-->
<?php
include_once('footer.php');
?>