<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OCSA PRIME MEMBERSHIP</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="js/index.js"></script>

<script type="text/javascript">
     
   	var callRazorPayScript = function(itemId, amount,name,mobile,description,type) {
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
			            window.location.reload(true);
			        });
			        
			      }
			    };

			    window.rzpay = new Razorpay(options);
			         console.log('name:'+name);
					 console.log('name:'+name);
			        console.log('mobile:'+mobile);
			        console.log('amount:'+amount);
			    

			    rzpay.open();
			  });
			}


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
callRazorPayScript('<?php echo $_GET["id"]; ?>', 3600,'<?php $_GET["n"];?>', '<?php echo $_GET["m"];?>','Prime Membership','membership');
</script>
</body>
</html>