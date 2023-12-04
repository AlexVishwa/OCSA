<?php
include_once('database.php');
foreach ($career as $key => $value) {
	if ($value['id']==$_POST['id']) {
	
		?>
<table class="table " style="width: 100%">
    <tr>
		<td>Id : </td>
		<td><?php	echo $value['id'];  ?></td>
	</tr>
	<tr>
		<td>Name : </td>
		<td><?php	echo $value['Name'];  ?></td>
	</tr>
	<tr>
		<td>Mobile : </td>
		<td><?php	echo $value['Mobile'];  ?></td>
	</tr>
	<tr>
		<td>Email : </td>
		<td><?php	echo $value['Email'];  ?></td>
	</tr>
	<tr>
		<td>Pincode : </td>
		<td><?php	echo $value['Pincode'];  ?></td>
	</tr>
	<tr>
		<td>Address : </td>
		<td><?php	echo $value['Address'];  ?></td>
	</tr>
	<tr>
		<td>Education : </td>
		<td><?php	echo $value['Education'];  ?></td>
	</tr>
	<tr>
		<td>Apply For : </td>
		<td><?php	echo $value['Apply For'];  ?></td>
	</tr>
	<tr>
		<td>Key Skills : </td>
		<td><?php	echo $value['Keyskills'];  ?></td>
	</tr>
	<tr>
		<td>Photo : </td>
		<td><img src="../<?php	echo @$value['photo'];  ?>" style="width: 100px;height: 100px"></td>
	</tr>
	<tr>
		<td>Resume : </td>
		<td><a href="../<?php	echo $value['resume'];  ?>" target="_blank" class="btn btn-sucess">View Resume</a></td>
	</tr>
</table>
		<?php
	}
}
?>