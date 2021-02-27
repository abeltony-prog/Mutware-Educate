<?php
include "db.php";
	
 
$username=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
 
 $sql= "INSERT INTO  signup(username,email,password)   VALUES( '{$username}','{$email}','{$pass}'   )" ;
 if ($con->query($sql)){
echo "Data Saved"; 
 }
 	 


 

?>