<!DOCTYPE html>
<?php

session_start();

$con = mysqli_connect('localhost','root','568015as','db');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    echo "<script> alert('Please enter all required field!')</script>";
} else {
    $query = "SELECT * FROM users1 WHERE name='$username' OR email='$email' ";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_num_rows($result) > 0 ) {
        header("Location: registration.php?MSG=Username:$username or E-mail:$email is already exist, please use another one!");
    } else {
        $query = "INSERT INTO users1 (name, pass, email) VALUES ('$username','$password','$email')";
        if (mysqli_query($con,$query)) {
            $_SESSION['login']=$username;
            header("Location: content.php");
            }        
       }
    }
}
?>

<html>

<style>
h2{
  font-size: 1.5em;
  font-style: bold ;  

}
body{
    border: 0;
    padding: 0;
    background-position: center;
    background-size: 90%;
    opacity: 0.9;
    background-color:rgba(255,255,255,0.5);
}
</style>
<head>
    <title> Reistration Page </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript"> 
$(function(){
 $("#alert-success").hide();
  $("#alert-danger").hide();
  $("input").keyup(function(){ 
    var pwd1=$("#pwd1").val(); 
    var pwd2=$("#pwd2").val();
    var email=$("#email").val();
     if(pwd1 != "" || pwd2 != "" || email != ""){ 
        if(pwd1 == pwd2 && email.match("@")){ 
           $("#alert-success").show();
           $("#alert-danger").hide(); 
           $("#submit").removeAttr("disabled"); 
      }
      else{ 
         $("#alert-success").hide();
          $("#alert-danger").show(); 
          $("#submit").attr("disabled", "disabled");
      } 
    }
    });
}); 
</script>


</head>
<body>
	<?php
      if( isset($_GET['MSG'])){
	       echo $_GET['MSG'];
       }

	?>
<center>
    <div class="container">
        <ul class ="list-group">
           <li class="list-group-item list-group-item-info"><h2 style="color:red"> 사용자등록</h2></li>
              <form method="post" class ="form-inline" action="registration.php">
                 <div class="form-group">
                  <label type="text">  <li class="list-group-item list-group-item-success" width="20" height="10"> 사용자이름 : </li> </label> 
                  <input type="text" class="form-control" name="username" placeholder="Enter username">
                 </div>
           <br>
                 <div class="form-group">
                  <label for="pwd"> <li class="list-group-item list-group-item-warning"> 비밀번호 : </li> </label>
                  <input type="password" class="form-control" name="password" id="pwd1" placeholder="Enter password" onchange = "isSame()">
                 </div>
            <br>
                 <div class="form-group">
                   <label for="pwd"> <li class="list-group-item list-group-item-warning"> 비밀번호 확인 : </li> </label>
                   <input type="password" class="form-control" id = "pwd2" name="password2" onchange = "isSame()" placeholder="Enter password"> 
                 </div>
          <br>
                 <div class="form-group">
                  <label type="text">  <li class="list-group-item list-group-item-danger">이메일 : </li> </label> 
                  <input type="text" class="form-control" id= email name="email" placeholder="Enter email"> 
                </div>          
        <br>
            <button type="submit" id = submit class="btn btn-default" name="submit" value="Registration"> 제출</button>
          <br>

            <div class="alert alert-success" id="alert-success">비밀번호 일치하고 알맞은 이메일형식</div> 
            <div class="alert alert-danger" id="alert-danger">비밀번호 불일치 또는 잘못된 이메일 형식</div>
        </ul>
    </form>
    </div>
<br>
    <b><a href="login.php">사용자 로그인하시겠습니까?</a></b><br>

</center>
</body>
</html>


