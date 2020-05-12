<!DOCTYPE html>
<?php
session_start();

$con = mysqli_connect('localhost','root','568015as','db');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($_POST['username'])) {
        echo "<script> alert('Please enter your name!')</script>";
        }
    if (empty($_POST['password'])) {
        echo "<script> alert('Please enter your password!')</script>";
        }
    
    $query = "SELECT name, pass FROM users1 WHERE name='$username' AND pass='$password' ";
    $result = mysqli_query($con, $query);
    
    if ( mysqli_num_rows($result) > 0 ) {
            $_SESSION['login']=$username;
            header("Location: content.php");
    } else {
        echo "Wrong username or password !";
    }

}
?>
<html lang="en">
<style>
h2{
  font-size: 1.5em;
  font-style: bold ;  

}
body{
    border: 0;
    padding: 0; 
    background-position: center;
    background-size: 80%;
    opacity: 0.88;
    background-color:rgba(255,255,255,0.5);
}
</style>

<head>
   
    <title> Login Page </title> 
     <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>//ajax
function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>
<body>
<center>
     <div class ="container">
        <ul class="list-group">
            <li class="list-group-item list-group-item-success"><h2 style="color:blue"> 회원 로그인</h2></li> 
    <form method="post" action="login.php" class="form-inline">
        <div class="form-group">
           <label type="text">  <li class="list-group-item list-group-item-warning"> 사용자 이름 : </li></label>
             <input type="text" onkeyup="showHint(this.value)" class="form-control" name="username" placeholder="Enter username"></div>
             <p style="color:red">Suggestions: <span id="txtHint"></span></p>
        <div class="form-group">
           <label for="pwd"> <li class="list-group-item list-group-item-danger"> 비밀번호 :</li></label>
           <input type="password" class="form-control" name="password"  placeholder="Enter password">
        </div>
        <br>
            <button type="submit" class="btn btn-default" name="submit" value="Login" > Login</button>
        </ul>
    </form>
</div>
<p style="color:blue"><b> <a href="registration.php"> 회원가입 </a></b></p>
    <br>
      
    <b><a href="admin_login.php"><p>관리자 페이지</p></b></a>
</center>
</body>
</html>

 