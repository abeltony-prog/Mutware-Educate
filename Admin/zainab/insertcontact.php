<?php
include 'db.php';
	$name1=$_POST['name1'];
$name2=$_POST['name2'];
$email=$_POST['email'];
$msg=$_POST['msg'];
 $sql= "INSERT INTO contact(Firstname,Lastname,Email,Message)   VALUES('{$name1}','{$name2}' ,'{$email}','{$msg}' )" ;
 if ($con->query($sql)){
echo "Data Saved"; 
 }
 	 


 

?>