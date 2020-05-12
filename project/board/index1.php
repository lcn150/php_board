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
?>

<!doctype html>
<style>
body{
    border: 0;
    padding: 0; 
    background-position: center;
    background-size: 100% 100%;
    opacity: 0.9;
}
</style>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="board_area"> 
  <h1 style="color:red">건의게시판</h1>
  <h4>자유롭게 건의하는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120" >글쓴이</th>
                <th width="100" >작성일</th>
                <th width="100" >조회수</th>
            </tr>
        </thead>
        <?php
          $sql = mq("SELECT * from board order by idx desc limit 0,5"); // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
            while($board = $sql->fetch_array())
            {
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]); //title이 30을 넘어서면 ...표시
              }

                $sql2 = mq("SELECT * from reply where con_num='".$board['idx']."'");
                  $rep_count = mysqli_num_rows($sql2);
             
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500">
          <a href="read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a>

          <span class="re_ct">[<?php echo $rep_count;?>] </span></a></td>
          
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <br>
    <div id="write_btn">
      <a href="write.php"><button>글쓰기</button></a>
    </div>
 <div id="search_box">
    <form action="search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>

  </div>


  <br>
  <br>
  <hr>
  <center>
 <p><b> <a href="registration.php"> 회원가입 </a></b></p>
    <br>
    
   
      

  </center>
</body>
</html>
