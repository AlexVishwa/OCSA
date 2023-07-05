<?php
include_once('database.php');
foreach ($members as $key => $value) {
	if ($value['id']==$_POST['id']) {
	
		?>
<table class="table " style="width: 100%">
	<tr>
		<td>Id : </td>
		<td><?php	echo $value['id'];  ?></td>
	</tr>
	<tr>
		<td>Name : </td>
		<td><?php	echo $value['name'];  ?></td>
	</tr>
	<tr>
		<td>Mobile : </td>
		<td><?php	echo $value['mobile'];  ?></td>
	</tr>
	<tr>
		<td>Email : </td>
		<td><?php	echo $value['email'];  ?></td>
	</tr>
	<tr>
		<td>Pincode : </td>
		<td><?php	echo $value['pincode'];  ?></td>
	</tr>
	<tr>
		<td>Address : </td>
		<td><?php	echo $value['address'];  ?></td>
	</tr>
	<tr>
		<td>City : </td>
		<td><?php	echo $value['city'];  ?></td>
	</tr>
	<tr>
		<td>Appliances: </td>
		<td><?php	
            for ($i=0; $i <count($value['appliance']) ; $i++) { 
            	echo $value['appliance'][$i].' ('.$value['quantity'][$i].')';
            }

		?></td>
	</tr>
	<tr>
		<td>Registarion Fee : </td>
		<td><?php	echo ($value['active']==1)?'Yes':'No';  ?></td>
	</tr>
	<tr>
		<td>Membership : </td>
		<td><?php	echo ($value['membership']==1)?'Yes':'No';  ?></td>
	</tr>
	<tr>
		<td>Wallet : </td>
		<td><?php	echo $value['wallet'];  ?></td>
	</tr>
	
	
</table>
		<?php
	}
}
?>