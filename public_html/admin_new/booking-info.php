<?php
include_once('database.php');
foreach ($bookings as $key => $value) {
	if ($value['id']==$_POST['id']) {
	
		?>
<table class="table " style="width: 100%">
	<tr>
		<td>Id : </td>
		<td><?php	echo $value['id'];  ?></td>
	</tr>
	<tr>
		<td>Service Name : </td>
		<td><?php	echo $value['servicename'];  ?></td>
	</tr>
	<tr>
		<td>Service Type : </td>
		<td><?php	echo $value['servicetype'];  ?></td>
	</tr>
	<tr>
		<td>Appliance: </td>
		<td><?php	echo $value['appliancetype'];  ?></td>
	</tr>
	<tr>
		<td>Person Name : </td>
		<td><?php	echo $value['membername'];  ?></td>
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
		<td>Date : </td>
		<td><?php	echo $value['date'];  ?></td>
	</tr>
	<tr>
		<td>Confirm Date : </td>
		<td><?php	echo @$value['confirmdate'];  ?></td>
	</tr>
	<tr>
		<td>Complete Date : </td>
		<td><?php	echo @$value['completedate'];  ?></td>
	</tr>
	<tr>
		<td>Status : </td>
		<td><?php	
			if ($value['status']==1) {
				echo '<span class="text-warning">Accepted</span>';
			}else if ($value['status']==2) {
				echo '<span class="text-success">Complete</span>';
			}else{
				echo '<span class="text-danger">Processing</span>';
			}

		?></td>
	</tr>
	
	
</table>
		<?php
	}
}
?>