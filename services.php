<!-- services box -->
<div id="services " class="container service">
    <h1 id="services_heading">Our Services</h1>
    <h3 class="services_title">Home Appliances</h3>
    <div id="services-box">
        <?php
        for($i=0;$i<count($services2);$i++){
        ?>
        <a href="booking.php?id=<?php echo $services2[$i]['id']; ?>" id="wrapper">
            <div id="img">
                <img src="<?php echo $services2[$i]['img']; ?>" alt="">
            </div>
            <div id="title">
              <p>
                <span class="text-success" style="font-size: 20px;font-weight: 900;">&#8377; <?php echo $services2[$i]['offer']; ?></span>
                <!--<span class="text-danger" style="text-decoration: line-through;padding: 0px 0px 0px 5px;">&#8377; <?php //echo $services2[$i]['price']; ?></span>-->
              </p>
              <span style="color:#0e6aa2;font-weight: bold;font-size: 13px;"><?php echo $services2[$i]['title']; ?><span>
                
              </div>
        </a>
        <?php } ?>
    </div>

  </div>
<!-- services box end here -->
<!-- beauty Packages bills -->
<div class="container service beauty_package">
    <h3 class="services_title">Beauty Packages</h3>
    <div class="p-10">
        <h1>Coming Soon</h1>
    </div>
    
</div>
<!-- beauty Packages bills end-->
<!-- recharge and pay bills -->
<div class="container service recharge_bills">
    <h3 class="services_title">Recharge & Pay Bills <span>Coming Soon</span></h3> 
    <div class="p-10">
         <div class="recharge-wraper">
             <div class="columns" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                 <img src="images/recharge_icons/mobile.png">
                 <p>Mobile</p>
             </div>
             <div class="columns" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                 <img src="images/recharge_icons/landline.png">
                 <p>Landline</p>
             </div>
             <div class="columns" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                 <img src="images/recharge_icons/dth.png">
                 <p>DTH</p>
             </div>
             <div class="columns" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                 <img src="images/recharge_icons/light-bulb.png">
                 <p>Electricity</p>
             </div>
             <div class="columns" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                 <img src="images/recharge_icons/router.png">
                 <p>Broadband</p>
             </div>
             <div class="columns" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                 <img src="images/recharge_icons/gas.png">
                 <p>Gas</p>
             </div>
             <div class="columns" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                 <img src="images/recharge_icons/water.png">
                 <p>Water</p>
             </div>
         </div>
    </div>
</div>
<!-- recharge and pay bills end-->
