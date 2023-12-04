<?php
session_start();
session_unset($_SESSION['auth']);
session_destroy();
header("location:index.php");
?>