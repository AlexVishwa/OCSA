<?php
include_once('header.php');
if (isset($_GET['p'])) {
include_once($_GET['p'].'.php');
	
}else{
include_once('bookings.php');

}
include_once('footer.php');

?>