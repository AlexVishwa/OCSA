
<?php
session_start();
include_once('database/connection.php');
$_SESSION['auth']=$_GET['uid'];
$profile=[];

for ($m=0; $m <count($members) ; $m++) { 
    if ($members[$m]['id'] == $_GET['uid']) {
      array_push($profile, $members[$m]);
   
    }
  }
  
  
//include_once('header.php');
$servicecharge=0;
$book=[];
for ($i=0; $i <count($services); $i++) { 
	if ($services[$i]['id']==$_GET['id']) {
		array_push($book, $services[$i]);
	}
}



?>
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
	.modal_popup {

    position: fixed;
    top: 0;
    left: 0;
    z-index: 99;
    width: 100%;
    height: 100%;
    background: #000000bd;
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal_popup .modal_inner {
    width: 100%;
    height: 100%;
    background: #fff;
    border-radius: 0px;
    box-shadow: 1px 1px 10px #000;
    overflow: auto;
    border-bottom: 2px solid #aa0000;
}
.header {
    background: #aa0000;
    color: #fff;
    font-size: 20px;
    padding: 8px;
    box-shadow: 4px 11px 13px #ccc;
    display: flex;
    justify-content:center;
    align-items: center;
    height: 40px;
}
.inner_content {
   padding: 10px;
    height: calc(100% - 40px);
    overflow: auto;
}
.options {
    padding-left: 20px;
}
div#pricing {
    display: flex;
    justify-content: space-between;
    /* align-items: center; */
    background: #e9ecef;
    margin: 6px 0px;
    padding: 0px 15px;
    color: #6c757d;
   color: #000000;
    font-size: 14px;
    font-weight: 100;
    border-left: 2px solid #aa0000;
    line-height: 45px;
    height: 45px;
    cursor: default;
}

div#pricing p {
    padding-right: 30px;
}

div#pricing i {
    font-size: 20px;
}
.card-header {
    border: none;
    border-radius: 0px !important;
    background: #000;
}

.card-header a {
   color: #ffc107;
    font-weight: 100;
    font-size: 16px;
    display: flex;
    justify-content: space-between;
    align-content: center;
}

.card {
    border: none;
    border-radius: 0px !important;
    border-left: 3px solid #aa0000;
    margin: 2px 0px;
}
.card-header a:focus {
    text-decoration: none;
}
input.form-control,textarea {
    border: 0.1px solid #aa0000 !important;
    border-radius: 0px !important;
}
</style>
<!-- modal pop -->
<div class="modal_popup">
	<div class="modal_inner">
		 <div class="header">
		 	<!--<a href="index.php" class="text-white"><i class="fa fa-long-arrow-left"></i></a>-->
		 	<h3 style="font-size: 18px;"><img src="<?php echo $book[0]['img']; ?>" style="width: 25px;margin-right: 10px;"><?php echo $book[0]['title']; ?>

		 </h3>

		 	<p></p>
		 </div>
		 <div class="inner_content">
		 	<div id="accordion">			
		 	<?php
             //print_r($book[0]['options']);
		 	if (count($book[0]['options'])>0) {
		 		
		 	for ($sub=0; $sub <count($book[0]['options']) ; $sub++){ 
		 		?>
          <div class="card">
				    <div class="card-header" data-aos="flip-left">
				      <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $sub;?>">
				        <?php echo $book[0]['options'][$sub]['service_type'];?>
				        <i class="fa fa-chevron-right"></i>
				      </a>
				    </div>
				    <div id="collapse<?php echo $sub;?>" class="collapse " data-parent="#accordion" data-aos="flip-left">
				      <div class="card-body">
				          <!-- radio button -->
				          <?php 
				          for ($op=0; $op <count($book[0]['options'][$sub]['type']) ; $op++) { 
				          	 ?>
				             <div  id="pricing" data-pricing="<?php echo $book[0]['options'][$sub]['type'][$op]['price']; ?>" data-title="<?php echo $book[0]['options'][$sub]['type'][$op]['item']; ?>" data-type="<?php echo $book[0]['options'][$sub]['service_type']; ?>">
				             	 <p><?php echo $book[0]['options'][$sub]['type'][$op]['item']; ?> <?php echo @$book[0]['options'][$sub]['type'][$op]['desc']; ?></p>
				             	 <p> &#8377; <?php echo $book[0]['options'][$sub]['type'][$op]['price']; ?></p>
				             	 
				             </div>
				             <p>
				             	<?php echo @$book[0]['options'][$sub]['type'][$op]['note']; ?>
				             </p>
				             
				            
						  <?php
							}
							echo'<hr>'. @$book[0]['options'][$sub]['description'];
							?>
						 
				      </div>
				    </div>
				  </div>

			
				 
		 	<?php
		 	}
		 	echo @$book[0]['note'].'   <br>
               <hr>';
            }else{
            	echo "<h1 style='text-align:center'>COMING SOON.....</h1>";
            }
		 	?>
		 	</div>
		 	<p>NOTE:- 	 		
            
		 	   1- MECHANIC SERVICE CHARGE WILL BE FREE FOR OUR PRIMIUM     CUSTOMER.<br>
			   2- SPARE PARTS COST EXTRA PRICE AS PER RATE CARD.
			</p>
		 	<p class="text-danger">* Servicing Cost May Apply. T&C Apply <a href="privacy-policy.php">Read Carefully </a> </p>
		 </div>
	</div>
</div>
<!-- modal popup end here -->

<div class="container-fluid" style="background:linear-gradient(45deg, white, #bdb7b794),url(images/services-background.jpg);">
	
	
	<h3>Service Charge : &#8377; <b id="scharge"></b></h3>
	<span>Note: Spare Parts Price not includes in service charge ! <a href="#">READ T&C</a></span>
<form action="book_service.php" method="post" id="bookservice_form">
	<div class="row">
	<div class="input-field col-md-6 col-sm-12">
		  <label>Service Name</label>
          <input name="servicename" type="text" value="<?php echo $book[0]['title']; ?>" readonly class="form-control">
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <input type="hidden" name="mid" value="<?php echo $profile[0]['id']; ?>">
    </div>
    <div class="input-field col-md-6 col-sm-12">
		  <label>Service Charge</label>
          <input name="servicecharge" id="servicecharge" type="text"  readonly class="form-control">
         
    </div>
    <div class="input-field col-md-6 col-sm-12">
		  <label>Service Type</label>
          <input name="servicetype" id="servicetype" type="text"  readonly class="form-control">
          
    </div>
    <div class="input-field col-md-6 col-sm-12">
		  <label>Appliances Type</label>
          <input name="appliancetype" id="appliancetype" type="text" readonly class="form-control">
         
    </div>
    <div class="input-field col-md-6 col-sm-12">
		  <label for="name"> Name </label>
          <input name="name" type="text" class="form-control" readonly value="<?php echo $profile[0]['name']; ?>">
    </div>
    <div class="input-field col-md-6 col-sm-12">
		  <label for="mobile">Mobile </label>
          <input name="mobile" type="number" class="form-control" readonly value="<?php echo $profile[0]['mobile']; ?>">
    </div>
    <div class="input-field col-md-6 col-sm-12">
		  <label for="email">Email </label>
          <input name="email" type="email" class="form-control" readonly value="<?php echo $profile[0]['email']; ?>">
    </div>
   
     <div class="input-field col-md-6 col-sm-12">
     	  <label for="city">City</label>
		  <input type="text" name="city" readonly class="form-control" value="<?php echo $profile[0]['city']; ?>">
          
    </div>
     <div class="input-field col-md-6 col-sm-12">
		  <label for="pincode"> Pincode </label>
          <input name="pincode" type="number" readonly class="form-control" minlength="6" maxlength="6" value="<?php echo $profile[0]['pincode']; ?>">
    </div>
    <div class="input-field col-md-6 col-sm-12">
     	  <label for="city">Alternate Mobile (<span>optional</span>)</label>
		  <input type="text" name="alternatemobile" class="form-control" >
          
    </div>
   
     <div class="input-field col-md-12 col-sm-12">
    	  <label for="address">Full Address</label>
		  <textarea name="address" readonly class="form-control"><?php echo $profile[0]['address'];?></textarea>
          
    </div>
    <div class="input-field col-md-12 col-sm-12 " style="padding: 15px">
    	<div class="custom-control custom-checkbox">
		    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" required="required">
		    <label class="custom-control-label" for="customCheck">I accept all terms & condition</label>
	   </div>
    	
    	  <br> <br> 

          
          <button style="border-radius: 0px;width: 150px;box-shadow: 1px 1px 10px #00000054;" type="submit" class="btn btn-success text-white" >Book Now</button>
    </div>

</div>
</form>
</div>
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
function addValues(price,title,type){
  $("#servicecharge").val(price);
  $("#scharge").text(price);
  $("#servicetype").val(type);
  $("#appliancetype").val(title);

  $('.preloader').fadeOut('slow');
}



//get service pricing
$(document).on('click','div#pricing',function(){
  let price=$(this).data('pricing');
  let title=$(this).data('title');
  let type=$(this).data('type');
  $('.preloader').fadeIn();
  addValues(price,title,type);

  $('.modal_popup').fadeOut('slow');
  
});

</script>
</body>
</html>
<?php



//include_once('footer.php');
?>