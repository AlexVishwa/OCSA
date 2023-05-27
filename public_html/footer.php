<?php
if(!isset($_GET['app'])){
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="https://ocsa.in/images/logo1.png" alt="OCSA PRIVATE LIMITED" title="OCSA PRIVATE LIMITED" style="width: 150px">

				<p class="intro">OCSA is recognized the Fastest growing startup digital platform in India.we are a mobile marketplace for local service businesses.
					<a href="aboutus.php">Read More</a>

				</p>

				<h4>OCSA PRIVATE LIMITED</h4>
				<p>Tower 2,1F,Vijayshanthi Park Avenue,Vangadamangalam Road, <br> Kandigai, Kanchipuram, Chennai, 600127, (TN), India</p>
				<p>Contact : 7817005780, 7817005781, 7817005782, 7817005783, 7817005784, </p>
				<p>Email : contact@ocsa.in </p>
				<!-- <h4>OCSA Private Limited</h4> -->
				<p><b>Branch</b>: Duplex-71 Green Paradise A to Z Colony Modipuram Meerut U.P. 250110</p>
				<!-- <p>Contact : 7817005780, 7817005781, 7817005782, 7817005783, 7817005784, </p>
				<p>Email : contact@ocsa.in </p> -->
			</div>
			<div class="col-md-3">
				<h3 class="quick_links">Quick Links</h3>
				<ul class="footer-menu">
					<li><a href="#"><i class="fa fa-angle-right"></i> Home</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> About</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Services</a></li>
					<li><a href="career.php"><i class="fa fa-angle-right"></i> Career</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Privacy & Policy</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Terms & Conditions</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Contact Us</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Login/Register</a></li>
					

				</ul>
			</div>
			<div class="col-md-3">
				<h3 class="quick_links">Social Links</h3>
				<div class="row social_links">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="#"><i class="fa fa-facebook"></i> <span>Facebook</span></a>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="#"><i class="fa fa-whatsapp"></i> <span>WhatsApp</span></a>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="#"><i class="fa fa-linkedin"></i> <span>Linked In</span></a>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="#"><i class="fa fa-instagram"></i> <span>Instagram</span></a>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="#"><i class="fa fa-youtube"></i> <span>YouTube</span></a>
					</div>
					
				</div>
			</div>
			<div class="col-md-3">
				<h3 class="quick_links">Payment Method</h3>
				<img src="images/atm.jpg" style="width: 100%;height: 100px;border-radius: 10px;">
				<br>
				<div class="input-group mb-3" style="margin: 40px 0px 0px 0px;">
				    <input type="text" class="form-control downloadapp"  placeholder="Your Mobile">
				    <div class="input-group-append">
				      <span class="input-group-text" style="background: red;color: #fff;font-weight: bold;">Download App</span>
				    </div>
				</div>
				<br>
				<img src="images/playstore.jpg" style="width: 100%;border-radius: 10px;">
			</div>

		</div>
		<p align="center" style="font-size: 18px;color: #ffc107;">
		    <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=aeu9HqNh2155ocGqOanhNCQKkmPPwoyTd4TQMHSvXMGqCR8KiTG34rleeJEL"></script></span>
			&copy;Copyright 2019 : All Rights Reserved.<br>
			Design & Developed By : <a href="http://technicalpointsolution.com">TPS</a>
		</p>
	</div>

</footer>
<?php
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="js/qrcode.min.js"></script>
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


<!-- qrcode generator -->
<script type="text/javascript">

var qrcode = new QRCode(document.getElementById("qrcode"), {
		width : 250,
		height : 250
	});
function makeCode (value) {	
	$("#qrcode").slideToggle();
	qrcode.makeCode(value);
}

function toggleBill(){
	$(".bill").slideToggle();
}
</script>
<script>
  AOS.init();
</script>
</body>
</html>