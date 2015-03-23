<?php

require_once 'Data.php';

session_start();
session_unset();

$name = $password = $ID_Main = "";
$LogErr = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = inputTest($_POST["name"]);
	$password = inputTest($_POST["password"]);
}
if(!empty($name) && !empty($password))
{
	//echo "Database next";
	$link = mysqli_connect('localhost', 'root', '123456', 'Blog');
	if(!$link) die("数据库连接错误" . mysqli_error($link));
	$query = "SELECT password FROM main WHERE name='$name'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	if($password == $row['password'])
	{
		//echo $name;
		$_SESSION['username'] = $name;
		//echo $_SESSION['username'];
		header("Location:intf.php?visit=$name");
	}
	else 
	{
		$LogErr = true;
	}
	mysqli_close($link);
}

?>