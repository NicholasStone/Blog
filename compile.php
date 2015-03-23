<?php
// 此为用户编辑界面
session_start();
$title = $content = "";
if(!empty($_GET['title']) && !empty(['content']))
{
	$title = $_GET['title'];
	$content = nl2br($_GET['content']);
	$username = $_SESSION['username'];
}

if(!empty($title) && !empty($content))
{
	$link = mysqli_connect('localhost', 'root', '123456', 'Blog');
	if( !$link ) die("数据库连接错误".mysqli_error($link));
	
	$query = "INSERT INTO $username(title, content) VALUES('$title','$content')";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		mysqli_close($link);
		$StoreNor = true;
	}
	else
	{
		$StoreNor = false;
	}

	//mysqli_close($link);
}
?>


