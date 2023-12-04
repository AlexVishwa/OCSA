 <?php
 include_once('../database/connect.php');
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error());
}

$sql = "INSERT INTO users(email,password,referralid,city,state,country,pincode,appliances,quantity) VALUES($_POST[email],$_POST[password],$_POST[referralid],$_POST[city],$_POST[state],$_POST[country],$_POST[pincode],$_POST[appliance[0]),$_POST[quantity[0]]";

if ($conn->query($sql)) {
    echo (json_encode(array('message'=>'Successful')));
} else {
    echo (json_encode(array('message'=>'Unable to Register'.$conn->error)));
}

$conn->close();
?>