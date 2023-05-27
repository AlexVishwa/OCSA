<?php
include_once('header.php');
if (isset($_SESSION['auth'])){
	?>
<style type="text/css">
	.main-container
	{
		padding: 0;
		
	}
	.nav-pills{
		overflow-x: auto;
		overflow-y: hidden;
		flex-wrap: inherit;
		background:#f7ff00;
        padding: 20px 15px;
	}
	.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #ff3c3c;
    border-radius: 2px;
    font-size: 16px;
    padding: 2px 14px;
    width: max-content;
    }
.nav-pills .nav-link{
	font-size: 16px;
	padding: 0px 10px;
	width: max-content;
}
.wallet_wrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  background: #ececec;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 1px 1px 10px #ccc;
}
.wallet_wrapper h1 {
  color: green;
  font-weight: bold;
  font-size: 40px;
  /*! padding: 20px; */
  /*! margin-bottom: -8px; */
}
.wallet_wrapper button {
  border: none;
  background: #002c80;
  color: #fff;
  padding: 2px 10px;
  font-size: 20px;
  border-radius: 4px;
  box-shadow: 1px 1px 10px #00000045;
  margin-top: 20px;
}
.tab-content > .active {

    display: block;
    min-height: calc(100vh - 125px);

}
.fa-refresh{
	-webkit-animation:spin 4s linear infinite;
    -moz-animation:spin 4s linear infinite;
    animation:spin 4s linear infinite;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #e4e4e4;
    background-clip: border-box;
    border: none !important;
    border-radius: 0px !important;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background: linear-gradient(45deg, #fe6708, #ffc107);
    border-bottom: none !important;
    border-radius: 0px !important;
    margin: 2px 0px;
}
a.card-link {
    color: #fff;
}
button.cancel_service{
	border: none;
    background: #aa0000;
    color: #fff;
    padding: 2px 10px;
    }
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
</style>
  <!-- dashboard content start here -->
    <div class="container-fluid main-container">
    	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="pill" href="#myaccount"><i class="fa fa-user"></i> My Account</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="pill" href="#transaction"><i class="fa fa-money"></i> Transactions</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="pill" href="#wallet"><i class="fa fa-google-wallet"></i> Wallet</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="pill" href="#bookings"><i class="fa fa-history"></i> Bookings</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="pill" href="#earning"><i class="fa fa-money"></i> Referral Earning</a>
	  </li>
	  
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<!-- my account tab start here -->
	  <div class="tab-pane container active" id="myaccount">
	  	  
               <div class="topheader" style="display: flex; justify-content: space-between; padding: 15px;">
               	 
               	 <?php
                   echo ($profile[0]['membership']==0)?'<button id="getmembership" style="border:none;padding:2px 10px ;background:green;color:#fff">GET MEMBERSHIP</button>':'';
               	 ?>
               	 <h2>Main Wallet : <b class="text-success">&#8377; <?php echo $profile[0]['paid_amount']; ?></b></h2>
               </div>
             
			  <table class="table table-striped">
			    
			    <tbody>
			      <tr>
			        <td>Name : </td>
			        <td><?php  echo $profile[0]['name']; ?></td>
			        
			      </tr>
			      <tr>
			        <td>Mobile :</td>
			        <td><?php  echo $profile[0]['mobile']; ?></td>
			        
			      </tr>
			      <tr>
			        <td>Email :</td>
			        <td><?php  echo $profile[0]['email']; ?></td>
			        
			      </tr>
			      <tr>
			        <td>Password :</td>
			        <td><?php  echo $profile[0]['password']; ?></td>
			        
			      </tr>
			      <tr>
			        <td>Pincode :</td>
			        <td><?php  echo $profile[0]['pincode']; ?></td>
			        
			      </tr>
			      <tr>
			        <td>City :</td>
			        <td><?php  echo $profile[0]['city']; ?></td>
			        
			      </tr>
			      <tr>
			        <td>Address :</td>
			        <td><?php  echo $profile[0]['address']; ?></td>
			        
			      </tr>
			    </tbody>
			  </table>
	  </div>
	  <!-- my account tab end here -->
	  <!-- transaction tab start here -->
	  <div class="tab-pane container fade" id="transaction">
	  	     <h2>My Transactions</h2>
				<div class="table-responsive">             
				  <table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Tra. Id</th>
				        <th>Amount</th>
				        <th>Type</th>
				        <th>Date</th>
				      </tr>
				    </thead>
				    <tbody>
				       <?php
                         for ($t=0; $t <count($transactions) ; $t++) { 
                         	if ($transactions[$t]['mid']==$_SESSION['auth']) {
                         		
				       ?>
				      <tr>
				        <td><?php echo $transactions[$t]['transaction_id'] ?></td>
				        <td><?php echo $transactions[$t]['amount'] ?></td>
				        <td><?php echo $transactions[$t]['type'] ?></td>
                        <td><?php echo $transactions[$t]['date'] ?></td>

				      </tr>
				      <?php
				          }
                        }
				      ?>
				    </tbody>
				  </table>
				  </div>
	  </div>
	  <!-- transaction tab end here -->
	  <!-- wallete tab start here -->
	  <div class="tab-pane container fade" id="wallet">
	  	   <h2>My Wallet</h2>
	  	   <div class="wallet_wrapper">

	  	   	  	<h1 id="show_wallet">&#8377; <?php echo $profile[0]['wallet']; ?></h1>
	  	   	   	<hr>
	  	   	   	<span class="text-danger err" ></span>
	  	   	  	 <div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text">&#8377;</span>
				    </div>
				    <input type="number" class="form-control" id="amount" placeholder="Ex. &#8377; 1000" autofocus="autofocus">
				  </div>
             	<button id="add-amount-btn">Add To Wallet</button>
	  	   </div>


	  </div>
	  <!-- wallete tab end here -->
	  <!-- bookings tab start here -->
	  <div class="tab-pane container fade" id="bookings">
	  	     <h2>My Bookings</h2>
				<!-- accordian -->
          <div id="accordion">
				       <?php
                         for ($b=count($bookings)-1; $b >=0 ; $b--) { 
                         	if ($bookings[$b]['mid']==$_SESSION['auth']) {
                         		
				       ?>			     

					  <div class="card">
					    <div class="card-header">
					      <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $b; ?>">
					        <?php echo $bookings[$b]['servicename'].'  of '.$bookings[$b]['appliancetype'].' for '.$bookings[$b]['servicetype'] ?>
					        <br>
					        <?php echo $bookings[$b]['date']; ?>
					      </a>
					    </div>
					    <div id="collapse<?php echo $b; ?>" class="collapse" data-parent="#accordion">
					      <div class="card-body">
					      	<div style="display: flex;justify-content: space-between;">
					      		 <button class="cancel_service">Cancel Service</button>
					        	<button class="show_service_qrcode" style="background: green; color: #fff; border: none; padding: 2px 10px;" onclick="makeCode('<?php echo $bookings[$b]["id"]; ?>');">SHOW QRCODE</button>
					        	<button id="showbill" onclick="toggleBill()" style="background: green; color: #fff; border: none; padding: 2px 10px;">SHOW BILL</button>
					      	</div>
					       

					         
								<center>
									<div id="qrcode" style="margin-top:15px;display: none;">
										<h2>OCSA SERVICES QRCODE</h2> <br>
										<span><?php echo $bookings[$b]['id'];?></span>

									</div>
								</center><br>
							<div class="bill" style="display: none;">
								<table class="table table-striped">
									<tr>
										<th>ID :</th>
										<td><?php echo $bookings[$b]["id"]; ?></td>
									</tr>
									<tr>
										<th>Member Name:</th>
										<td><?php echo $bookings[$b]["membername"]; ?></td>
									</tr>
									<tr>
										<th>Mobile :</th>
										<td><?php echo $bookings[$b]["mobile"]; ?></td>
									</tr>
									<tr>
										<th>Alternate Mobile :</th>
										<td><?php echo $bookings[$b]["alternatemobile"]; ?></td>
									</tr>
									<tr>
										<th>Service :</th>
										<td><?php echo $bookings[$b]["servicename"]; ?></td>
									</tr>
									<tr>
										<th>Type :</th>
										<td><?php echo $bookings[$b]["servicetype"]; ?></td>
									</tr>
									<tr>
										<th>Appliance Type :</th>
										<td><?php echo $bookings[$b]["appliancetype"]; ?></td>
									</tr>
									<tr>
										<th>Pincode :</th>
										<td><?php echo $bookings[$b]["pincode"]; ?></td>
									</tr>
									<tr>
										<th>City :</th>
										<td><?php echo $bookings[$b]["city"]; ?></td>
									</tr>
									<tr>
										<th>Address :</th>
										<td><?php echo $bookings[$b]["address"]; ?></td>
									</tr>
									<tr>
										<th>Booking Time/Date :</th>
										<td><?php echo $bookings[$b]["date"]; ?></td>
									</tr>
									<tr>
										<th>Complete Booking Time/Date :</th>
										<td><?php echo @$bookings[$b]["completedate"]; ?></td>
									</tr>
									<tr>
										<th>Work Complete :</th>
										<td><?php echo ($bookings[$b]["status"]==0)?'Processing...':'Completed'; ?></td>
									</tr>
									<tr>
										<th>Discount % :</th>
										<td><?php echo ($profile[0]['membership']==1)?'100% Membership Discount':'0%'; ?></td>
									</tr>
									<tr>
										<th>Total Payble Amount:</th>
										<td>&#8377; <?php echo ($profile[0]['membership']==1)?' 0':$bookings[$b]["servicecharge"]; ?></td>
									</tr>
								</table>
							</div>
					      </div>
					    </div>
					  </div>
				      <?php
				          }
                        }
				      ?>
			  
			</div>
		 <!-- accordian end here -->
	  </div>
	  <!-- bookings tab end here -->
	  <!-- earning money by referal start here -->
       <div class="tab-pane container" id="earning">
       	  <h2>My Earnings</h2>
       	  <hr>
       	  <h4>Your Referral Links is :</h4>
       	  https://ocsa.in/member-registration.php?refer=<?php echo md5($profile[0]['mobile']); ?>
       	  <button style="border: none;background:green;color:#fff;padding: 2px 10px;">Copy & Share</button>
       </div>
	  <!-- earning money by referal end here -->
	</div>
    </div>
  <!-- dashboard content end here -->





<script type="text/javascript">
	$(document).on('click','#add-amount-btn',function(){
		var wamount=$("#amount").val();
		if (wamount=="") {
			$(".err").text('Enter Amount ');
		}else{
			add_wallet('<?php echo $_SESSION["auth"]; ?>', wamount,'<?php echo $profile[0]["name"];?>', '<?php echo $profile[0]["mobile"];?>','Add To Wallet','wallet');
		}

	});

   



	var add_wallet = function(itemId, amount,name,mobile,description,type) {
			  var merchangeName = "OCSA Pvt. Ltd",
			      img = "images/logo1.png",
			      name = name,
			      description = description,
			      amount = amount
			      
			      //rzp_live_OGeCVaU4dUBYAD
			      //rzp_test_stfYN9mYkreg1U
			  loadExternalScript('https://checkout.razorpay.com/v1/checkout.js').then(function() { 
			    var options = {

			      key: 'rzp_live_OGeCVaU4dUBYAD',
			      protocol: 'https',
			      hostname: 'api.razorpay.com',
			      amount: amount*100,
			      name: merchangeName,
			      description: description,
			      image: img,
			      prefill: {
			        name: name,
			        mobile:mobile

			      },
			      theme: {
			        color: '#ff0000'
			      },
			      handler: function (transaction, response){
			      	var ti=transaction.razorpay_payment_id;
			        // console.log('transaction id: ' + transaction.razorpay_payment_id);
			        // console.log('memberid:'+itemId);
			        // console.log('name:'+name);
			        // console.log('mobile:'+mobile);
			        // console.log('amount:'+amount);
			        $.post('add_wallet.php',{ti,itemId,name,mobile,amount},function(data){
			            $('#show_wallet').html('&#8377;'+data);
			        });
			        
			      }
			    };

			    window.rzpay = new Razorpay(options);
			   //       console.log('name:'+name);
					 // console.log('name:'+name);
			   //      console.log('mobile:'+mobile);
			   //      console.log('amount:'+amount);
			    

			    rzpay.open();
			  });
			}

   $(document).on('click','#getmembership',function(){
		
			get_membership('<?php echo $_SESSION["auth"]; ?>', 3600,'<?php echo $profile[0]["name"];?>', '<?php echo $profile[0]["mobile"];?>','membership','membership');
	
	});
   
   var get_membership= function(itemId, amount,name,mobile,description,type) {
			  var merchangeName = "OCSA Pvt. Ltd",
			      img = "images/logo1.png",
			      name = name,
			      description = description,
			      amount = amount
			      
			      //rzp_live_OGeCVaU4dUBYAD
			      //rzp_test_stfYN9mYkreg1U
			  loadExternalScript('https://checkout.razorpay.com/v1/checkout.js').then(function() { 
			    var options = {

			      key: 'rzp_live_OGeCVaU4dUBYAD',
			      protocol: 'https',
			      hostname: 'api.razorpay.com',
			      amount: amount*100,
			      name: merchangeName,
			      description: description,
			      image: img,
			      prefill: {
			        name: name,
			        mobile:mobile

			      },
			      theme: {
			        color: '#ff0000'
			      },
			      handler: function (transaction, response){
			      	var ti=transaction.razorpay_payment_id;
			        // console.log('transaction id: ' + transaction.razorpay_payment_id);
			        // console.log('memberid:'+itemId);
			        // console.log('name:'+name);
			        // console.log('mobile:'+mobile);
			        // console.log('amount:'+amount);
			        $.post('pay.php',{ti,itemId,name,mobile,amount},function(data){
			            //$('#show_wallet').html('&#8377;'+data);
			            if (data=='1') {
			            	window.location.reload(true);
			            }
			        });
			        
			      }
			    };

			    window.rzpay = new Razorpay(options);
			   //       console.log('name:'+name);
					 // console.log('name:'+name);
			   //      console.log('mobile:'+mobile);
			   //      console.log('amount:'+amount);
			    

			    rzpay.open();
			  });
			}

   </script>
<?php
}else
{
 echo '<div style="display:flex;justify-content:center;align-items:center;flex-direction: column;
padding: 50px 20px;width:100%">
<img src="https://assets.prestashop2.com/sites/default/files/styles/blog_750x320/public/blog/2019/10/banner_error_404.jpg?itok=eAS4swln" style="width:100%">
</div>
';

}
include_once('footer.php');
?>