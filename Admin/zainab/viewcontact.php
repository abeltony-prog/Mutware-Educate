<?php
	include 'db.php';
	$sql = "SELECT * FROM contact";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['Firstname'];?></td>
			<td><?=$row['Lastname'];?></td>
			<td><?=$row['Email'];?></td>
			<td><?=$row['Message'];?></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($con);
?>
