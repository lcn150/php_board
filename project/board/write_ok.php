
<?php
	include "db.php";
$date = date('Y-m-d');
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "upload/".$filename;
move_uploaded_file($tmpfile,$folder);

$mqq = mq("ALTER table board auto_increment = 1"); //auto_increment 값 초기화

$sql = mq("INSERT into board(name,pw,title,content,file) values('".$_POST['name']."','".$_POST['pw']."','".$_POST['title']."','".$_POST['content']."','".$o_name."')"); ?>

<script type="text/javascript">alert("글쓰기 완료되었습니다.");</script>
<meta http-equiv="refresh" content="0; url=index1.php"/>


