<?php
include_once('header.php');
?>
<style type="text/css">
	input,button,textarea,select{
	border: 0.1px solid #aa0000 !important;
    color: #aa0000 !important;
    border-radius: 0px !important;
	}
	h1{
		background: #aa0000;
	    padding: 4px 10px;
	    color: #fff;
	}
</style>
<div class="career"></div>
<div class="container-fluid" style="background: #ffffffad;padding-bottom: 20px;">
	<!-- <h3 class="services_title">Register Here</h3> -->
	<h3 style="font-size: 25px;color: #aa0000;font-weight: bold;">Employment Application Form</h3>
	<p style="font-size: 15px;color: #394045;font-style: italic;">Thank you for your interest in working with us. Please check below for available job opportunities that meet your criteria and send your application by filling out the form.</p>
		<div class="container">
			<form id="career_form" action="send_resume.php" method="post" enctype="multipart/form-data">
			<h1>Personal Details</h1>
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="name" id="fname" placeholder="name and Surname " required="required">
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="number" class="form-control" name="number" id="number" placeholder="Your Mobile " required="required">
					  <span class="text-danger number-error"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="required">
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Your pincode " required="required">
					</div>
					<div class="pincodearea" ></div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="postoffice" id="postoffice" placeholder="Post Office">
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="city" id="city" placeholder="City">
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="state" id="state" placeholder="State">
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="country" id="country" placeholder="Country">
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <textarea class="form-control" name="fulladdress" id="fulladdress" placeholder="Fulladdress" required="required"></textarea>
					</div>
				</div>
			</div>
			<!-- education details -->
			<h1>Educational Details</h1>
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					   <select class="form-control dropdown" id="education" name="education" required="required">
						    <option value="" selected="selected" disabled="disabled">Select Education</option>
						    <option value="10TH">10TH</option>
						    <option value="12TH">12TH</option>
						    <option value="Diploma">Diploma</option>
						    <option value="Graduation">Graduation</option>
						    <option value="Post Graduation">Post Graduation</option>
						    
						  </select>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="percentage" id="percentage" placeholder="Percentage" required="required">
					  					</div>
				</div>
				
				<div class="col-md-4 col-sm-12 col-xs-12">
				    <?php
				      echo '<select name="year" id="year" class="form-control" required="required">';
		                foreach (range(date('Y'), $earliest_year) as $x) {
		                    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
		                }
		                echo '</select>';
				    ?>
				</div>
			</div><br>
			<h1>Apply For</h1>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
					   <select class="form-control dropdown" id="applyfor" name="applyfor" required="required">
						    <option value="" selected="selected" disabled="disabled">Select Posts</option>
						    <option value="Mechanic">Mechanic</option>
						    <option value="Receptionist ">Receptionist </option>
						    <option value="Marketing Manager">Marketing Manager</option>
						    <option value="Computer Operator">Computer Operator</option>
						   
						    
						  </select>
					</div>
				</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<input type="text" name="keyskills" placeholder="Enter keyskills with comma seperated" class="form-control" required="required">
			</div>
			</div>
			<!-- Experience --><br>
			<h1>Previous Experience Details</h1>
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" id="companyname" placeholder="Company Name ">
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="fromdate" id="fromdate" onfocusout="(this.type='text')" onfocus="(this.type='date')" placeholder="From Date">
					  
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
					  <input type="text" class="form-control" name="todate" id="todate" onfocusout="(this.type='text')" onfocus="(this.type='date')" placeholder="To Date">
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					 <textarea name="note" id="note" placeholder="Why you are switch old company ?" class="form-control"></textarea>
					</div>
					
				</div>
				
			</div>
			<!-- Apply For -->
			
			<!-- Documents Uploads -->
			<h1>Upload Resume and Photo</h1>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<label>Photo</label>
					<div class="form-group">
					  <input type="file" class="form-control" id="photo" name="photo" required="required">
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<label>Resume</label>
					<div class="form-group">
					  <input type="file" class="form-control" id="resume" name="resume" placeholder="Company Name " required="required">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="submit" name="submit_career" value="SUBMIT" 
					style="width: 100%;height: 35px;
				    background: linear-gradient(45deg, #28a745, #155724ab);
				    color: #fff !important;
				    font-size: 22px;
				    border: none !important;
				    box-shadow: 1px 1px 10px #00000091;">
				</div>
			</div>
			</form>
		</div>
</div>
<!-- otp verified modal start here -->
<div class="emp_otp_modal">
	<div class="content-body">
			<div class="form-group">
			  <label for="usr">Enter OTP Here: </label>
			  <input type="number" class="form-control" name="otp" id="otp" placeholder="OTP">
			</div>

			<div style="display: flex;justify-content: flex-end;">
				<button id="cancle">Cancle</button><button id="submit">Submit</button>
			</div>
	</div>
</div>
<!-- otp verified modal end here -->
<?php
include_once('footer.php');
?>