<?php
include_once('./header.php');
?>
<?php
echo '
<script>
let map, infoWindow;

function initMap() {
  
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 28.6762, lng: 77.412 },
    zoom: 6,
  });
  
  infoWindow = new google.maps.InfoWindow();

  const locationButton = document.createElement("button");

  locationButton.textContent = "Pan to Current Location";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        },
      );
    } else {
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn\'t support geolocation.",
  );
  infoWindow.open(map);
}

window.initMap = initMap;

//create map
//map = new google.maps.Map(document.getElementById("map"), mapOptions)
function geocode(){
  address=\'1600+Amphitheatre+Parkway,+Mountain+View,+CA\';
  key=\'AIzaSyDoEmW20CIRnY-9oxUVg2p87fj48ZTPu_c\';
  $.get("https://maps.googleapis.com/maps/api/geocode/json?address=address&key=key", function(data, status){
    console.log("Latitude is"+data.results[0].geometry.location.lat)
    console.log("Longitude is"+data.results[0].geometry.location.lng)
  });}
</script>';
?>

<section class="head">
	<div class="container">
		<div class="container-fluid">
			<h2 class="middle">
				Shopkeeper New Title
			</h2>
      <p class="coordinates">Latitude: <b class="latitude">42</b> Longitude: <b class="longitude">32</b></p>
		</div>
	</div>	
</section>
<section class="head1">
	<div class="container">
		<div class="container-fluid">
			<div class="content">
					<div>
    		       	<p id="title"><i class="fa fa-circle"></i>  
                    <h2>Shop1</h2><span class="material-symbols-outlined" style="color:navyblue;">
                    verified
                    </span>
                </p>
          </div>
          <div class="profilePic">
            <div class="shopprofile">
              <img src="images/profile.jpg" height="200" width="200">
            </div>
          </div>
          <div id="description" style="height: 400px;width: 400px;float: right;font-size: 16px;font-family: Arial;">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              <span class="material-symbols-outlined">
              edit
              </span>
          </div>
          <div id="visitingcard" style="background-image: url('images/visitingcard.jpg')">
            <p id="brand">Vishwakarma Websites</p>
            <p id="proprietor" style="z-index:0; margin-bottom:-10px;">Alex Vishwa<br> BE CSE<br> PGDM IEV</p>
            <p id="address" >Address-<br>C-301, Jyoti Super Village<br> RNE</p>
            <p id="contact">8427772668</p>
          </div>       
          <div id="referral">

          https://ocsa.in/member-registration.php?refer=<?php /*echo encryptIt('9873460889'); */?>
          <button style="border: none;background:green;color:#fff;padding: 2px 10px;" id="shareButton">Share</button>
          </div>
          <div>
            <!-- id="map" -->
              <img src="images/mapdemo.jpg" height="300px" width="1920px" alt="map">
          </div>
				  <div id="reviews">
                    <?php for($j=0;$j<=floor($arr[$i]['rating']);$j++)
                    {?>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <?php }?>
                 
              <h3 id="most">Most popular reviews</h3>
              <p>Great timely service by the owner</p>
    		  </div>
          <div class="shopprofile2">
				  	<img class="d-flex align-self-start" id="image" src="images/OcsaQR.png" alt="<?php echo $arr[$i]['title'];?>" height="200px" width="200px" style="width:100%">
			  	</div>
      
    		  <div>
    		   		<h4>About us</h4>
    		   		<p id="aboutme"></p>
    		  </div>

          <div id="Services">
            <p></p>
          </div>
			</div>
      
			
		</div>
	</div>	
</section>
<?php
/*
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
*/
?>
