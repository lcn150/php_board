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

$bno = $_POST['idx'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);



$sql = mq("UPDATE board set name='".$_POST['name']."',pw='".$_POST['pw']."',title='".$_POST['title']."', context='".$_POST['content']."' where idx='".$bno."'"); ?>


?>
<script type="text/javascript">alert("수정되었습니다.");</script>
<meta http-equiv="refresh" content="0; url=read.php?idx=<?php echo $bno; ?>">
