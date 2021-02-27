<?php
	include 'database.php';
	$id=$_POST['id'];
	$sql = "DELETE FROM `addschools` WHERE Sid=$id";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
?>
