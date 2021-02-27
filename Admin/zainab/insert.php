<?php
include "db.php";
	
$id=$_POST['id'];
$name=$_POST['name'];
$type=$_POST['type'];
$email=$_POST['email'];
$place=$_POST['place'];
 
 $sql= "INSERT INTO addschools(Sid,Sname,Stype,Email,District)   VALUES( '{$id}','{$name}','{$type}','{$email}','{$place}' )" ;
 if ($con->query($sql)){
echo "Data Saved"; 
 }
 	 


 

?>