<?php
	include 'database.php';
	
	
	$id=$_POST['id'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$email=$_POST['email'];
	$place=$_POST['place'];
	 
	$sql = "UPDATE `addschools` 
	SET `Sid`='$id',`Sname`='$name',`Stype`='$type',
	`Email`='$email',`District`='$place'   WHERE Sid=$id";
	 
	
	if (mysqli_query($con, $sql)) {
		echo json_encode(array($sql));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
?>
