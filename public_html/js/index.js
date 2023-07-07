$(document).ready(function(){
    $('.preloader').fadeOut(2000);
});
$("#sidemenu_wrapper").on('click',function(e){
    e.stopPropagation();
    //alert('child');
});
// open menu
$(".burger-menu").on('click',function(e){
   
    $("#sidebarmenu").attr('style','left:0');
});

//close menu
$("#sidebarmenu").on('click',function(e){
    e.stopPropagation();
    $(this).attr('style','left:-100%');
});


$('.dropdown').on('click',function(){
   $('.dropdown').children('ul').fadeOut('fast');
   $(this).children('ul').toggle();
})
// check mobile number 
$("#number").on('keyup',function(){
	var number=$(this).val();
	if (number=='' || number.length <10 || number.length>10){
		$(".number-error").text('Invalid mobile number.');
	}else{
		console.log(number);
		$(".number-error").html('<i class="fa fa-check-circle " style="color:green"></i>');
		//$('.emp_otp_modal').fadeIn();
	}
	
	
});

//auto capitalize
$("#fname").on('keyup',function(){
  $(this).val($(this).val().toUpperCase());
})

// cancle otp modal
$(document).on('click','#cancle',function(){
    $('.emp_otp_modal').fadeOut();
}); 



$(document).on('keyup','#pincode',function(){
	$('.pincodearea').html('<div class="spinner-border text-success"></div>');
   var pincode=$(this).val();
   if (pincode=="" || pincode.length < 6 || pincode.length>6){
   	console.log();
   	 $('.pincodearea').html('Enter 6 Digit pincode here..');
   	 	$('#city').val('');
		$('#state').val('');
		$('#country').val('');
		$('#postoffice').val('');
   }else{
   	  $.get("https://api.postalpincode.in/pincode/"+pincode, function(data, status){
   	  	  
	      // console.log(data[0]);
	      // arr=data;
	      var list ='<ul class="list-group">';
	      //arr[0].PostOffice[0]["Name"]
	      for (var i = 0; i < data[0].PostOffice.length; i++) {
	      	console.log(data[0].PostOffice[i]["Name"]);
	      	list +=' <li class="list-group-item" data-dis="'+data[0].PostOffice[i]["District"]+'" data-coun="'+data[0].PostOffice[i]["Country"]+'" data-state="'+data[0].PostOffice[i]["State"]+'">'+data[0].PostOffice[i]["Name"]+'</li>'
	      }
	      list +='</ul>'
	      $('.pincodearea').html(list).slideDown();



	  });
   }
   
})


$(document).on('click','.list-group-item',function(){
	var city=$(this).data('dis');
	var country=$(this).data('coun');
	var state=$(this).data('state');
	$('#city').val(city);
	$('#state').val(state);
	$('#country').val(country);
	$('#postoffice').val($(this).text());
	$('.pincodearea').html('').slideUp();
})


// add delete appliances row 
                        $("a#add_row").on('click',function(e){
                           e.preventDefault();
                           $('div.add_rows_here').append(`
                           <div class="row" style="margin-top:4px">
                       <div class="col-md-12 col-sm-12 col-12" style="display:flex;justify-content:center;align-items:center">
                           <select  name='appliance[]' class="form-control" style="margin-right:10px" required>
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
                              
                       
                          <select name='quantity[]'  class="form-control" style="margin-right:10px" required>
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
                                
                       
                           <a class="btn btn-danger" id="remove_row" style="font-size:20;color:#fff;border-radius: 0px;border: none;padding: 6px 15px;">X</a>
                       </div>
                  </div>
                         
                           `);
                           
                           // remove row start here
                            $("a#remove_row").on('click',function(e){
                                e.preventDefault();
                                $(this).parent().parent().remove();
                            });
                            // remove row end here
                        });


var modal = document.getElementById('id01');
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
// registration form
$("button.registernow").on('click',function(e){
    e.preventDefault();
         var name=$("#membername").val();
         var email=$("#email").val();
         var mobile=$("#mobile").val();
         var password=$("#password").val();
         var city=$("#city").val();
         var pincode=$("#pincode").val();
         var address=$("#fulladdress").val();
         var referral=$("#referral").val();
         var appliance = []; 
         var quantity = []; 
        $('select[name^=appliance]').each(function(){
            appliance.push($(this).val());
        });
         $('select[name^=quantity]').each(function(){
            quantity.push($(this).val());
        });
         if(name == ""){
             $("#msg").html('<span style="color:red">Please Enter Full Name</span>');
         }else if(email == ""){
            $("#msg").html('<span style="color:red">Enter Email</span>'); 
         }else if(mobile == ""){
            $("#msg").html('<span style="color:red">Enter Mobile Number</span>'); 
         }else if(mobile.length < 10 || mobile.length > 10){
            $("#msg").html('<span style="color:red">Mobile Number must 10 digit</span>'); 
         }else if(password == ""){
            $("#msg").html('<span style="color:red">Enter password</span>'); 
         }else if(password.length < 6 || password.length > 12){
            $("#msg").html('<span style="color:red">Password must be greater or equal to 6 or less than equal to 12</span>'); 
         }else if(pincode==""){
            $("#msg").html('<span style="color:red">Enter Pincode</span>'); 
         }else if(pincode.length < 6 || pincode.length > 6){
            $("#msg").html('<span style="color:red">Pincode Must be 6 digit</span>'); 
         }else if(address==""){
            $("#msg").html('<span style="color:red">Enter Full Address</span>'); 
         }else{
             
            //modal.style.display = "block";
            $('.loader').attr('style','display:flex !important');
            //Emal otp generated
/*
            <?php
            $possible=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m','1','2','3','4','5','6','7','8','9');
            $randomotp='';
            for($i=0;$i<4;$i++)
            {    
            $randomotp= $randomotp.$possible[rand(0,41)];
            }
            mail(email,'OCSA Site Registration','Otp is'.$randomotp);
            ?>
            */
            
            $.post('mobile_registration.php',{mobile,email},function(data){
                var modal = document.getElementById('id01');        
                modal.style.display = "block";
                
                $('.content').html(data);
                $('.loader').attr('style','display:none !important');
        
                $("a.verify_mobile").on('click',function(){
                    var otp=$("#otp").val();
                    var otp_get=$("#otp_get").val();
                    if (otp==otp_get){
                        $("p#verifymsg").html('<span style="color:green;font-size:12px">Mobile number Successfully Verified..</span>');
                        $.post('submit_member_details.php',{name,email,mobile,password,city,pincode,address,appliance,quantity},function(callback){
                           console.log(callback); 
                           modal.style.display = "none";
                           //swal("Your Registration Successfully Done !");
                           var resp=JSON.parse(callback);
                           if (resp.msg=='success'){
                            swal("Your Registration Successfully Done !");
                           }
                           else{
                            swal("Phone number is already registered !");
                           }
                           //window.location.href="http://localhost/serv/public_html/index.php";
                        });
                    }else{
                        $("p#verifymsg").html('<span  style="color:red;font-size:12px">Invalid OTP</span>');
                    }
                   
                });
                
            });
                
        }
});


// member login function
$('button#mlogin').on('click',function(e){
  e.preventDefault();
  var mobile=$("#mobile").val();
  var pwd=$("#pwd").val();
  if (mobile == "" || pwd=="") {
    swal('Enter Username Or Password !');
  }else{
    $('.preloader').fadeIn();
    $(this).text('Logging...');
    $.post('member_auth.php',{mobile,pwd},function(data){
        //console.log(data);
        
        //res=JSON.parse(data[0]);
        //console.log(res);
        if (data.data[0].tog==1){
          //  <?php
        //array_push($_SESSION['profile'],$res);
        //?>
          window.location.href='index.php';
        
        }else if(data.data[0].tog==2){
          //      array_push($_SESSION['profile'],$res);
               $('.preloader').fadeOut();
                swal({
                title: "Please Pay Registration Fee",
                text: "Pay Rs.100 using Net Banking, Debit Card, Credit Card,Wallet",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    callRazorPayScript(100,mobile,'Registration fee','Registration fee');
                } else {
                  //swal("Your imaginary file is safe!");
                }
              });
                $('#mlogin').text('LOGIN');
        }else{
          $('.preloader').fadeOut();
          swal('Invalid Username Or Password !');
          $('#mlogin').text('LOGIN');
        }
        
    });


  }

});

// shopkeeper login function
$('button#slogin').on('click',function(e){
  e.preventDefault();
  var mobile=$("#mobile").val();
  var pwd=$("#pwd").val();
  if (mobile == "" || pwd=="") {
    swal('Enter Username Or Password !');
  }else{
    $('.preloader').fadeIn();
    $(this).text('Logging...');
    $.post('member_auth.php',{mobile,pwd},function(data){
        //console.log(data);
        
        //res=JSON.parse(data[0]);
        //console.log(res);
        if (data.data[0].tog==1){
          //  <?php
        //array_push($_SESSION['profile'],$res);
        //?>
          window.location.href='index.php';
        
        }else if(data.data[0].tog==2){
          //      array_push($_SESSION['profile'],$res);
        }else{
          $('.preloader').fadeOut();
          swal('Invalid Username Or Password !');
          $('#mlogin').text('LOGIN');
        }
        
    });


  }

});

//payment function
var callRazorPayScript = function(amount,mobile,description,type) {
        var merchangeName = "OCSA Pvt. Ltd",
            img = "images/logo1.png",
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
              $.post('registration_fee.php',{ti,mobile,amount},function(data){
                  //window.location.reload(true);
                  console.log(data);
              });
              
            }
          };

          window.rzpay = new Razorpay(options);
              //  console.log('name:'+name);
              //  console.log('name:'+name);
              // console.log('mobile:'+mobile);
              // console.log('amount:'+amount);
          

          rzpay.open();
        });
      }


// forgot password
$(document).on('click','#submit_btn_forgot_pass',function(){
  var mobile=$('#fmobile').val();
  if (mobile == ""){
    $(".msg").html('<span class="text-danger">Enter register mobile number</span>');
  }else if (mobile.length < 10 || mobile.length > 10) {
    $(".msg").html('<span class="text-danger">Invalid mobile number</span>');
  }else{
    $.post('send_forgot_pass_otp.php',{mobile},function(data){
       
        if (data !='0') {
          $("#fmobile").fadeOut();
          $("#submit_btn_forgot_pass").fadeOut();
          $("#fotp").fadeIn(2000);
          $("#submit_otp").fadeIn(2000);
          $(".msg").html('<span class="text-success">OTP SEND TO YOUR MOBILE NUMBER ******'+ mobile.substr(mobile.length - 4)+'</span>');


          //submitotp
          $(document).on('click','#submit_otp',function(){
              var enterotp=$("#fotp").val();
              var sendpass_mobile=mobile;
              if (enterotp == data){
                $.post('send_forgot_pass_otp.php',{sendpass_mobile},function(callback){
                   //alert(callback);
                   $(".msg").html('<span class="text-success">'+callback+'</span>');
                    setTimeout(function(){
                      window.location.reload(true);
                    },2000);
                });
              }else{
                 $(".msg").html('<span class="text-danger">Invalid OTP</span>');
              }
          });
        }else{
          $(".msg").html('<span class="text-danger">You are not a registered member ! please register now</span>');
        }
    });
  }
})


// submit career form
//update member srb entry
$(document).on('submit','#career_form',function(e){
   e.preventDefault();

   $.ajax({
        url: "send_resume.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
                    cache: false,
            processData:false,
            beforeSend : function()
            {
            console.log('uploading resume');
             $("div.preloader-all").fadeIn();
            console.log('uploading');
            },
            success: function(data)
                {
                    console.log(data);
                    if (parseInt(data) == 1){                            
                         window.location.href="thankyou.php";
                        $("div.preloader-all").fadeOut();
                     }else{
                        swal("Something Wrong Please Try Again!");
                     }
                }
            });
});


//booking submit
// $(document).on('submit','#bookservice_form',function(e){
//   e.preventDefault();

//   $.ajax({
//         url: "book_service.php",
//             type: "POST",
//             data:  new FormData(this),
//             contentType: false,
//                     cache: false,
//             processData:false,
//             beforeSend : function()
//             {
            
//              $("div.preloader-all").fadeIn();
//             console.log('uploading');
//             },
//             success: function(data)
//                 {
//                     alert(data);
//                     console.log(data);
//                     if (parseInt(data) == 1){                            
//                          //window.location.href="thankyou.php";
//                         $("div.preloader-all").fadeOut();
//                         swal("Your Booking Successfully Done !");

//                      }else{
//                         swal("Something Wrong Please Try Again!");
//                      }
//                 }
//             });
// });



// verify bank
var data1="";
$(document).on('keyup','#bankifsc',function(){
           var ifsc=$(this).val();
           
           if (ifsc.length < 11 || ifsc.length > 11) {
             console.log('Invalid IFSC');
             $('#error_ifsc').text('Invalid IFSC');
              $("#branch").val('');
              $("#bankname").val('');
              $("#bankaddress").val('');
              $("#bankcity").val('');
              $("#bankstate").val('');
           }else{
            $.get('https://ifsc.razorpay.com/'+ifsc,function(data){             
              $("#branch").val(data.BRANCH);
              $("#bankname").val(data.BANK);
              $("#bankaddress").val(data.ADDRESS);
              $("#bankcity").val(data.DISTRICT);
              $("#bankstate").val(data.STATE);
              $('#error_ifsc').text('');
            })
           }
        });

//submit shop
$(document).on('submit','#submitshop',function(e){
   e.preventDefault();
   var mobile=$("#mobile").val();
   $.ajax({
        url: "submitshop.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
                    cache: false,
            processData:false,
            beforeSend : function()
            {
            
             $("div.preloader-all").fadeIn();
            console.log('uploading');
            $("button#submit").text('Please Wait...');
            },
            success: function(data)
                {
                    console.log(data);
                    //var z=JSON.parse(data);
                    $("button#submit").text('SUBMIT');
                    if (data.data[0].tog == 1){                            
                        window.location.href="http://localhost/serv/public_html/thankyou.php?m="+mobile;
                        // $("div.preloader-all").fadeOut();
                        // swal("Your Registration Successfully Done !");

                     }else{
                        //window.location.href="thankyou.php?m="+mobile;
                        swal("User Already Registered !");
                     }
                }
            });
});


//submit shop
$(document).on('submit','#submitpartner',function(e){
   e.preventDefault();
   var mobile=$("#mobile").val();
   if(mobile.length !=10){
       swal('Please Enter 10 digit Mobile Number');
   }else{
       
   $.ajax({
        url: "submitpartner.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
                    cache: false,
            processData:false,
            beforeSend : function()
            {
            
             $("div.preloader-all").fadeIn();
            console.log('uploading');
            $("button#submit").text('Please Wait...');
            },
            success: function(data)
                {
                    console.log(data);
                    $("button#submit").text('SUBMIT');
                    if (data.data[0].tog == 1){                            
                        //$("div.preloader-all").fadeOut();
                        swal("Your Registration Successfully Done !");
                        window.location.href="index.php";
                     }else{
                        swal("User Already Registered !");
                     }
                }
            });
   }
});