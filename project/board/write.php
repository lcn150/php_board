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
<link rel="stylesheet" type="text/css" href="style1.css" />
</head>
<body>
    <div id="board_write">
        <h1 style="color:cyan"><a href="index1.php">건의게시판</a></h1>
        <h4 style="color:blue">글을 작성하는 공간입니다.</h4>
               <div id="write_area">
                <form action="write_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="title" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="name" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="content" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="pw"  placeholder="비밀번호" required />  
                    </div>
                
                     <div id="in_file">
                        <input type="file" value="1" name="b_file" />
                    </div>

              
                    <div class="bt_se">
                        <button type="submit" value="Upload">글 작성</button>
                    </div>
                </form>
                
            </div>

        </div>
    </body>
</html>
