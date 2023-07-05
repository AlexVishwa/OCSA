<?php
$services=json_decode(file_get_contents("database/services.json"),true);
$members=json_decode(file_get_contents("database/member.json"),true);
$transactions=json_decode(file_get_contents("database/transaction.json"),true);
$bookings=json_decode(file_get_contents("database/bookings.json"),true);
?>