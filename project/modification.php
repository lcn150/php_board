<!DOCTYPE html>
<?php
    include "db.php";
   
    $bno = $_GET['mod'];
    $sql = mq("SELECT * from users1 where id='$bno';");
    $board = $sql->fetch_array();
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
     if(pwd1 != "" || pwd2 != ""){ 
        if(pwd1 == pwd2){ 
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
           <li class="list-group-item list-group-item-info"><h2 style="color:red"> 비밀번호 변경</h2></li>
              <form action="modify.php?mod=<?=$bno ?>" method="post" class ="form-inline">
                 <div class="form-group">
                  <label for="pwd"> <li class="list-group-item list-group-item-warning"><?php echo $users1['pass']; ?> 비밀번호 : </li> </label>
                  <input type="password" class="form-control" name="password" id="pwd1" placeholder="Enter password" onchange = "isSame()">
                 </div>
            <br>
                 <div class="form-group">
                   <label for="pwd"> <li class="list-group-item list-group-item-warning"> 비밀번호 확인 : </li> </label>
                   <input type="password" class="form-control" id = "pwd2" name="password2" onchange = "isSame()" placeholder="Enter password"> 
                 </div>   
        <br>
            <button type="submit" id = submit class="btn btn-default" name="submit" value="Registration"> 제출</button>
          <br>

        </ul>
    </form>
    </div>
<br>

</center>
</body>
</html>


