<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers:*');

$servername = "localhost";
$username = "root";
$password = "ocsa@123";
$dbname = "Ocsa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>