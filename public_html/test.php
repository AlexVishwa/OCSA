<?php
// Include qrcode.php file.
include_once("qrcode.php");
// Create object
$qc = new QRCODE();
// Create Text Code
$qc->URL("https://www.gstatic.com/charts/loader.js");
// Save QR Code
$qc->QRCODE(250,"images/OcsaQR.png");
?>