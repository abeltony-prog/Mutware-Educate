 <?php
	include 'database.php';
	$sql = "SELECT * FROM addschools";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			
			<td><?=$row['Sid'];?></td>
			<td><?=$row['Sname'];?></td>
			<td><?=$row['Stype'];?></td>
			<td><?=$row['Email'];?></td>
			<td><?=$row['District'];?></td>
			 <td><button type="button" class="btn btn-danger btn-sm  delete"  data-id="<?=$row['Sid'];?>"  >Remove</button></td>
			<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			
			data-id="<?=$row['Sid'];?>"
			data-name="<?=$row['Sname'];?>"
			data-email="<?=$row['Email'];?>"
			data-type="<?=$row['Stype'];?>"
			data-place="<?=$row['District'];?>"
			 
			>Edit</button></td>

		</tr>
		<?php	
	}
	}
	else {
		echo "<tr >
		<td colspan='5'>No Result found !</td>
		</tr>";
	}
	mysqli_close($con);
?>

 
