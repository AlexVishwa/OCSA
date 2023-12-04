<?php
include_once('header.php');
        include_once("qrcode.php");
        // Create object
        $qc = new QRCODE();
        // Create Text Code
        $qc->URL("https://www.gstatic.com/charts/loader.js");
        // Save QR Code
        $qc->QRCODE(250,"images/$_GET[m]OcsaQR.png");
        echo $_GET[m];
?>
<div class="container" style="height: 60vh;
    display: flex;
    justify-content: center;
    align-items: center;">
	 <h2 style="background: #aa0000;
    color: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 1px 1px 10px #0000007a;border-radius: 10px;">Thank your for submitting your details.<br>Our Executive contact you soon...</h2>
    
</div>
<?php
include_once('footer.php');
?>