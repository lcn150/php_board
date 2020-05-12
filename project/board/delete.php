<?php
    include "db.php";
   
    $bno = $_GET['idx'];
    $sql = mq("SELECT * from board where idx='$bno';");
    $board = $sql->fetch_array();
 ?>
<!doctype html>
<style>
body{
    border: 0;
    padding: 0; 
    background-position: center;
    background-size: 100% 100%;
    opacity: 0.6;
}
</style>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="style1.css" />
</head>
<body>
    <div id="board_write">
        <h1 style="color:red"><a href="index1.php">건의게시판</a></h1>
        <h4>글을 삭제합니다.</h4>
            <div id="write_area">
                <form action="delete_ok.php"<?php echo $board['idx']; ?> method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>" />
             		<h4>비밀번호</h4>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div>
                    
                    <div class="bt_se">
                        <button type="submit">글 삭제</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
