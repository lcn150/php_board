<?php
session_start();

$con = mysqli_connect('localhost','root','568015as','db');

if (isset($_POST['submit'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    if (empty($_POST['admin_username'])) {
        echo "<script> alert('Please enter your admin name!')</script>";
        }
    if (empty($_POST['admin_password'])) {
        echo "<script> alert('Please enter your admin password!')</script>";
        }
    
    $query = "SELECT admin_name, admin_pass FROM admin1 WHERE admin_name='$admin_username' AND admin_pass='$admin_password' ";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_num_rows($result) > 0 ) {
            $_SESSION['admin_login']=$admin_username;
            header("Location: admin_users.php");
    } else {
        echo "Wrong admin username or admin password !";
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
    min-height: 10%;
    background-position: center;
    background-size: 100% 100%;
    opacity: 0.7;
}
</style>

<head>
    <title> Admin Login Page </title>
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
    <div class="container">
<ul class="list-group">
     <li class="list-group-item list-group-item-info"><h2 style="color:red">DB관리자 로그인 </h2></li>
    <form class="form-inline" method="post" action="admin_login.php">
        <div clasee="form-group">
           <label type="text">  <li class="list-group-item list-group-item-success">관리자 이름 : </li> </label> 
            <input type="text" onkeyup="showHint(this.value)" class="form-control" name="admin_username" placeholder="관리자 이름을 입력하시오"></div>
             <p> Suggestions: <span id="txtHint"></span></p>
        <div class="form-group">
             <label for="pwd"> <li class="list-group-item list-group-item-warning">관리자 비밀번호 : </li> </label>
            <input type="password" class="form-control" name="admin_password" placeholder="관리자 비밀번호를 입력하시오" > 
        </div>
            <br>
             <button type="submit" class="btn btn-default" name="submit" value="Admin_Login" >제출 </button>
        </ul>
        
    </form>
   </div>

   <b><a href="login.php">당신은 사용자입니까?</a></b>
  </center>
</body>
</html>

