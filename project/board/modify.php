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
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_ok.php"<?php echo $board['idx']; ?> method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>" />
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div>
                    
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
