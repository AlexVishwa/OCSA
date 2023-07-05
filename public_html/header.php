<?php
session_start();
include_once('../vendor/autoload.php');
include_once('database/secret.php');
$services=file_get_contents("database/services.json");
$services2=json_decode($services,true);
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
//print_r($_SESSION['profile']['data']);

if(isset($_SESSION['jwt']))
{
  $jwt=$_SESSION['jwt'];
  $profile=[];
  array_push($profile, $_SESSION['profile']['data'][0]);

  /*
  $decoded = JWT::decode($jwt, new Key($key, 'HS256')); 
  echo $decoded;  
  if ($_SESSION['jwt']=$decoded) {
    
  }
  */
}

/*
if (isset($_SESSION['aut'])){
  //$decoded = JWT::decode($jwt, new Key($key, 'HS256'));   
  if ($_SESSION['jwt']==$decoded) {
    $sql="Select * from member where id='$_SESSION['profile']';";
    $res=$conn->query($sql);
    array_push($profile, $res);
}
}
else{
  echo "No tokem, autentication denied";
}
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>OCSA ENGINEER</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="images/logo1.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/shop.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>
<body>
  <!-- preloader -->
  <div class="preloader">
  <div class="spinner-border text-danger "></div>
  </div>
  
  <!-- preloader end  -->
<!-- header start here -->
<?php
if(!isset($_GET['app'])){
?>
<header>
<div class="burger-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    
    <div class="logo">
        <a href="index.php">
            <img src="images/logo1.png" alt="OCSA PRIVATE LIMITED" title="OCSA PRIVATE LIMITED">
        </a>
    </div>
    <div id="hidden"></div>
    <nav>
        <ul>
            <li><a href="index.php">Home </a></li>
            <li>
              <a href="#">Company </a>
               <ul class="submenu animated fadeInRight">
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="privacy-policy.php">Privacy & Policy</a></li>
                    <li><a href="privacy-policy.php">Terms & Conditions</a></li>
                </ul>
            </li>
            <li><a href="career.php">Career</a></li>
            <li>
                <a href="#"><?=$alex;?>Services </a>
                <ul class="submenu animated fadeInRight">
                    <li><a href="our-service.php">Electrical & Electronics</a></li>
                    <li><a href="shopkeeper.php">Shopkeeper</a></li>
                    <li><a href="spareparts.php">Spare Parts</a></li>
                    
                </ul>
            </li>
            <li><a href="contact.php">Contact</a></li>
            <?php
              if (isset($_SESSION['jwt'])){
                ?>


                <li><a href="#" style="color:white;font-weight: bold;font-size: 10px;background:green;padding: 2px 4px;"><?php echo $profile[0]['name']; ?></a>
                  <ul class="submenu animated fadeInRight" style="right: 0px;">
                      <li><a href="member-dashboard.php">Dashboard</a></li>
                      <li><a href="logout.php">Logout</a></li>
                      
                      
                  </ul>
                </li>

                <!-- <li><a href="#" style="color:white;font-weight: bold;font-size: 10px;background:#007a80;padding: 2px 4px;"><i class="fa fa-share"></i> Refer</a>
                  <ul class="submenu animated fadeInRight" style="right: 0px;">
                      <li><a href="whatsapp://send?text=https://ocsa.in/member-registration.php?refer=<?php //echo md5($profile[0]['mobile']); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp text-success"></i>Share Via Whatsapp</a></li>
                     
                      <li><a href="#"><i class="fa fa-envelope"></i> Share Via Message</a></li>
                      <li><a href="#"><i class="fa fa-google-plus-square"></i> Saher Via Email</a></li>
                      
                      
                      
                  </ul>
                </li> -->
              <?php
              }else{
                ?>
                 <li><a href="#">Login/SignUp</a>
                    <ul class="submenu animated fadeInRight" style="right: 0px;">
                        <li><a href="member-login.php">Member Login</a></li>
                        <li><a href="partners.php">Partner Registration</a></li> 
                        <li><a href="shopkeeper-reg.php">Shopkeeper Registration</a></li>
                        
                    </ul>
                </li>
                <?php
              }
            ?>
            
        </ul>
    </nav>
</header>
<div style="margin-top:60px"></div>

<!-- side mebership button -->
 <?php
  
 ?>
<!-- side membership button end -->
<?php
 if (isset($_SESSION['jwt']))
 {
   ?>
    <a href="member-dashboard.php" style="position: fixed;
    top: 30%;
    right: 20px;
    z-index: 999;
    background: linear-gradient(45deg, #004085, #28a745);
    color: #fff;
    padding: 6px;
    font-size: 18px;
    transform: rotate(-90deg);
    transform-origin: right;"><i class="fa fa-credit-card "></i> GET MEMBERSHIP</a>
   <?php
 }else if(!isset($_GET['app'])){
   ?>
   <a href="member-login.php" style="position: fixed;
    top: 30%;
    right: 20px;
    z-index: 999;
    background: linear-gradient(45deg, #004085, #28a745);
    color: #fff;
    padding: 6px;
    font-size: 18px;
    transform: rotate(-90deg);
    transform-origin: right;"><i class="fa fa-credit-card "></i> GET MEMBERSHIP</a>
   <?php
 }
 
 
?>
<!-- sidebar menu start here -->
<div id="sidebarmenu">
    <div id="sidemenu_wrapper">
         <div id="profile_section">
          <div class="profile_pic"><img src="http://www.ezhomeservices.in/images/people.png"></div>
          <div id="name">
            <!-- <span>Arjun Singh</span> -->
            <a href="#"><i class="fa fa-pencil"></i> Edit Profile</a>
          </div>
      </div>
      <nav>
        <ul >
            <li><a href="index.php">Home </a></li>
            <li class="dropdown">
              <a href="#">Company </a>
               <ul class="submenu animated fadeInRight">
                    <li><a href="aboutus.php">About</a></li>
                      <li><a href="privacy-policy.php">Privacy & Policy</a></li>
                    <li><a href="privacy-policy.php">Terms & Conditions</a></li>
                </ul>
            </li>
            <li><a href="career.php">Career</a></li>
            <li class="dropdown">
                <a href="#">Services </a>
                <ul class="submenu animated fadeInRight">
                    <li><a href="our-service.php">Electrical & Electronics</a></li>
                    <li><a href="shopkeeper.php">Shopkeeper</a></li>
                    <li><a href="spareparts.php">Spare Parts</a></li>
                    
                </ul>
            </li>
            <li><a href="contact.php">Contact</a></li>
            <?php
              if (isset($_SESSION['jwt'])) {
                ?>
                 <li class="dropdown"><a href="#" style="color:white;font-weight: bold;font-size: 10px;background:green;padding: 2px 4px;"><?php echo $profile[0]['name']; ?></a>
                  <ul class="submenu animated fadeInRight">
                      <li><a href="member-dashboard.php">Dashboard</a></li>
                      <li><a href="logout.php">Logout</a></li>
                      
                      
                  </ul>
            </li>
              <?php
              }else{
                ?>
                 <li class="dropdown"><a href="#">Login/SignUp</a>
                    <ul class="submenu animated fadeInRight">
                        <li><a href="member-login.php">Member Login</a></li>
                        <!-- <li><a href="#">Partner Login</a></li> -->
                        <li><a href="shopkeeper-reg.php">Shopkeeper Registration</a></li>
                        
                    </ul>
                </li>
                <?php
              }
            ?>
        </ul>
    </nav>
    </div>
</div>
<?php
}
?>
<!-- sidebar menu end here -->