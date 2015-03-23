<?php
require_once 'Data.php';

session_start();
session_unset();

$username = $password = "";
$RegUsrErr = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = inputTest($_POST["name"]);
	$password = inputTest($_POST["password"]);
}

if(!empty($username) && !empty($password))
{
	$link = mysqli_connect('localhost', 'root', '123456', 'Blog');
	if(!$link) die("数据库连接出错". mysqli_error($link));
	$query = "SELECT ID_Main FROM main WHERE name='$username'";		
	$result = mysqli_query($link, $query);			
	if(!mysqli_fetch_assoc($result))			
	{
		$query = "INSERT INTO main(name,password) VALUES('$username','$password')";
		$result = mysqli_query($link, $query);
		echo mysqli_error($link);
		$query = "CREATE TABLE $username (title VARCHAR(40) NOT NULL UNIQUE KEY,content TEXT NULL,ID_ART INT NOT NULL AUTO_INCREMENT PRIMARY KEY)";
		$result = mysqli_query($link, $query);
		echo mysqli_error($link);
		$_SESSION['username'] = $username;
		header("Location:intf.php?visit=$username");
	}
	else		
	{
		$RegUsrErr = true;
	}
	echo mysqli_error($link);
}



?>