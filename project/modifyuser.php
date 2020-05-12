<?php

$con = mysqli_connect('localhost','root','568015as','db');

$mod_id = $_GET['mod'];

$query = "UPDATE users1 SET pass='0000' WHERE id='$mod_id' ";

if (mysqli_query($con, $query)){
	header("Location: admin_users.php");
}
?>
