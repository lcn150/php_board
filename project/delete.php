<?php

$con = mysqli_connect('localhost','root','568015as','db');

$delete_id = $_GET['del'];

$query = "DELETE FROM users1 WHERE id='$delete_id' ";

if (mysqli_query($con, $query)){
	header("Location: admin_users.php");
}
?>