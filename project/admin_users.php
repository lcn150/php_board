
<html>

<style>
  table {
    width: 100%;
    border-top: 1px solid #444444;
    border-collapse: collapse;
  }
  th, td {
    border-bottom: 1px solid #444444;
    padding: 10px;
    text-align: center;
  }
  th:nth-child(2n), td:nth-child(2n) {
    background-color: #bbdefb;
  }
  th:nth-child(2n+1), td:nth-child(2n+1) {
    background-color: #e3f2fd;
  }
  h1 {
    font-style: italic ;  
    font-size: 1.5em;
  }
  body{
    border: 0;
    padding: 0; 
    background-position: center;
    background-size: 100% 100%;
    opacity: 0.6;
}
</style>
<h1 style="color:orange"> 관리자 전용페이지입니다.</h1>
<table border="2" >
   <tr bgcolor="blue" align="center">
    <th> id   </th>
   	<th> 사용자이름   </th>
   	<th> 비밀번호 </th>
   	<th> 이메일   </th>
   	<th> 삭제   </th>
    <th> PW초기화   </th>
   </tr>
   <?php
   $con = mysqli_connect('localhost','root','568015as','db');
   $query = " SELECT * FROM users1";
   $result = mysqli_query($con, $query);
   while($row = mysqli_fetch_array($result)){
      $id = $row[0];
      $username = $row[1];
      $password = $row[2];
      $email = $row[3];
?>
  
   <tr>
    <td> <?=$id ?>  </td>
   	<td> <?=$username ?>  </td>
   	<td> <?=$password ?>  </td>
   	<td> <?=$email ?>   </td>
   	<td> <a href="delete.php?del=<?=$id?>">삭제</a> </td>
    <td> <a href="modifyuser.php?mod=<?=$id?>">초기화</a> </td>
   </tr>
   <?php
   }
   ?>

</table>

<mark><a href="login.php">사용자로 로그인하시겠습니까?</a></mark>


</html>