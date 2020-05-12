<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
$db = new mysqli("localhost","root","568015as","db");
  $db->set_charset("utf8");

  function mq($sql)
  {
    global $db;
    return $db->query($sql);
  }

if( !isset($_SESSION['login'])){
  header("Location: login.php");
}

$con=mysqli_connect("localhost","root","568015as","db");
$username = $_SESSION['login'];
$result = mysqli_query($con,"SELECT * FROM users1 where name = '$username'");

while($row = mysqli_fetch_array($result)){
    $id = $row[0];
    $username = $row[1];
    $password = $row[2];
    $email = $row[3];

?>

<h2 style="color:blue">환영합니다 ! <?php echo $_SESSION['login'] ?> </h2>
<table border="2" >
   <tr bgcolor="yellow" align="center">
    <th> id   </th>
    <th> 이름   </th>
    <th> 비밀번호  </th>
    <th> 이메일   </th>
    <th> 삭제  </th>
    <th> 수정  </th>
   </tr> 

 <tr>
    <td style="color:red"> <?=$id ?>  </td>
    <td style="color:red"> <?=$username ?>  </td>
    <td style="color:green"> <?=$password ?>  </td>
    <td style="color:blue"> <?=$email ?>   </td>
    <td style="color:blue"> <a href="deleteme.php?del=<?=$id?>">Delete</a>   </td>
     <td style="color:blue"> <a href="modification.php?mod=<?=$id?>">Update</a>   </td>
   
   </tr>
  <?php
  }
  ?>

<html>
<style>
body{
    border: 0;
    padding: 0; 
    background-position: center;
    background-size: 50% 100%;
    background-color:rgba(255,255,255,0.5);
}

</style>
<head>
  <title> 사용자 페이지 </title>
</head>
<body>
    <h1> 사용자 페이지</h1>
    <div class="container">
        <ul class ="list-group">
    <form method="post" class ="form-inline" action="file.php">  </ul> </form>
    </div>
   
    <hr>
    <b><a href="logout.php" style="color:red">  로그아웃   </a><br>
      <a href="board/index1.php" style="color:red">건의게시판</a>
</body>

</html>