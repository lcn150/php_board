
<?php

$con = mysqli_connect('localhost','root','568015as','db');

$mod_id = $_POST['mod'];
$userpw = password_hash($_POST['password'], PASSWORD_DEFAULT);


$query = "UPDATE users1 SET pass='0000' WHERE id='$mod_id' ";

if (mysqli_query($con, $query)){
	header("Location: content.php");
}
?>
