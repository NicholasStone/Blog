<?php
//SaveChange.php
// 此页接收从Recom.php发送过来的值然后放入数据库中
header("Content-Type: text/html; charset=utf8");
session_start();

$user = $_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "GET"){
	$title = $_GET['title'];
	$content = nl2br($_GET['content']);
	$ID_ART = $_GET['ID_ART'];
}
$link = mysqli_connect('localhost', 'root', '123456', 'Blog') or die("数据库连接出错，保存失败！");
$result = mysqli_query($link, "UPDATE $user 
								SET content = '$content' , title = '$title'
								WHERE ID_ART='$ID_ART'");
if($result)
	echo "保存正常,<a href='intf.php?visit=$user'>返回主页</a>,或者<a href='art.php?title=$title&visit=$user'>查看文章</a>";
else
	echo "保存失败,<a href='intf.php?visit=$user'>返回主页</a>";
mysqli_close($link);
?>