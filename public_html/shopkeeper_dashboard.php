<?php
include_once('header.php');
?>
<section class="head">
	<div class="container">
		<div class="container-fluid">
			<h3 class="middle">
				Shopkeeper Title
			</h3>
			<div class="profilePic">
				<div class="shopprofile">
					<img src="images/profile.jpg" height="200" width="200">
				</div>
				<div id="map"><h5>Location:</h5></div>
				<div class="shopprofile">
					<img class="d-flex align-self-start" id="image" src="images/OcsaQR.png" alt="<?php echo $arr[$i]['title'];?>" height="200px" width="200px" style="width:100%">
				</div>
			</div>
		</div>
	</div>	
</section>
<section class="head1">
	<div class="container">
		<div class="container-fluid">
			<div class="content">
					<div>
    		       	<p id="title"><i class="fa fa-circle"></i>  
                    Shop1<span class="material-symbols-outlined" style="color:navyblue;">
                    verified
                    </span></p>
                	</div>
                	<div id="description">
                		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                			<span class="material-symbols-outlined">
							edit
							</span>
                	</div>
    		       <div id="reviews">
                    <?php for($j=0;$j<=floor($arr[$i]['rating']);$j++)
                    {?>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <?php }?>
                 
                   <p id="aboutme"></p>
    		   		</div>
			</div>
		</div>
	</div>	
</section>
<script>
 async function initMap() {
 myLatLng = { lat: 28.6591024, lng: 77.3402671 },
 mapOptions = 
	{
	 center: myLatLng,
	 zoom: 100,
	 mapTypeId : google.maps.MapTypeId.ROADMAP
	};

//create map
 map = new google.maps.Map(document.getElementById("map"), mapOptions)
}
initMap();
</script>
<?php

?>