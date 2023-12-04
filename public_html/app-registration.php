
<!DOCTYPE html>
<html lang="en">
<head>
  <title>OCSA ENGINEER</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="images/logo1.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Propeller Global js --> 
  <script src="http://propeller.in/components/global/js/global.js"></script>
  <!-- Propeller tabs js -->
  <script type="text/javascript" language="javascript" src="http://propeller.in/components/tab/js/tab-scrollable.js"></script>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>

</head>
<body>
  <!-- preloader -->
  <div class="preloader">
  <div class="spinner-border text-danger "></div>
  </div>
<style type="text/css">
 input, textarea, select {
   border: none !important;
    border-bottom: 0.1px solid #aa0000 !important;
    margin: 4px 0px;
    border-radius: 0px !important;
    color: #aa0000 !important;
}
</style>
<div class="container-fluid registration-form" style="background: #ffffff94;height:100vh">
  <div class="container-fluid">
    <!--<h3 align="center" style="padding-top: 20px;color: #aa0000;font-weight: bold;font-size: 25px;">Member Registration Form</h3>-->
    <!--<hr style="border-bottom: 0.1px solid #aa0000;">-->
    <h5 align="center" id="msg"></h5>
     <form action="submit_details.php" method="post" id="registration_form">
     <div class="row">
        <div class="input-wrape col-md-6">
             <input type="text" name="referral" id="referral" placeholder="Referral id" class="form-control">
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
            <select name="country1" class="form-control">
              <option name="country" value="India" id="country" placeholder="country" selected>India</option>
            </select>
           </div>
            <div class="col-md-12">
                  <div class="row">
                       <div class="col-md-12 col-sm-12 col-12" style="display: flex;justify-content: center; align-items: center;">
                           <select name='appliance[]' class="form-control" style="margin-right: 10px;" required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<script src="js/index.js"></script>

<script type="text/javascript">
	// Function to lazy load a script
  // -----------------------------------------------
  var loadExternalScript = function(path) {
    var result = $.Deferred(),
        script = document.createElement("script");
        
    script.async = "async";
    script.type = "text/javascript";
    script.src = path;
    script.onload = script.onreadystatechange = function(_, isAbort) {
      if (!script.readyState || /loaded|complete/.test(script.readyState)) {
        if (isAbort)
          result.reject();
        else
          result.resolve();
      }
    };

    script.onerror = function() {
      result.reject();
    };

    $("head")[0].appendChild(script);

    return result.promise();
  };



  // Use loadScript to load the Razorpay checkout.js
// -----------------------------------------------

</script>
</body>
</html>