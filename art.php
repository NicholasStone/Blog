<?php
/* art.php 
 * 此页用来显示博客内容
 * 接受三个变量user，visit和title
 * user是登陆的用户名，从session中获得
 * visit是被查看博客的用户名，从GET中得来。若user与visit一样，即查看自己的博客，显示编辑选项
 * title是被查看的博客名，从GET中来。根据此变量调取数据库中的文章。
 */
session_start();
$user = $_SESSION['username'];
$visit = $_GET['visit'];
$title = $_GET['title'];
//echo $user."  ".$visit;
if($user == $visit) $accoss = true;
else $accoss = false;

$link = mysqli_connect('localhost', 'root', '123456', 'blog');
mysqli_query($link,"SET $visit UTF8");
$result = mysqli_query($link, "SELECT content FROM $visit WHERE title = '$title'");
$row = mysqli_fetch_array($result);

//echo mysqli_error($link);

if(empty($row))
	$content = "文章为空";
else
	$content = $row['content'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dome1</title>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
	.blog{text-align: center;}
    </style>
</head>
<body>
<div class="container">
	<div class="col-md-3 ">
    	<h3 class="blog well">
            <?php 
                if( $accoss )echo "欢迎，".$user;
                else echo "你正在查看".$visit."的博客";
            ?>
        </h3>
    </div>
    <div class="col-md-9 jumbotron">
		<h1 class="blog"><?php echo $title ?></h1>
		<p class="blog"><?php echo $content;?></p>
		<p class="blog"><?php if($accoss) echo "<a href='Recom.php?title=$title'>编辑<a>"; ?></p>
	</div>
</div>
</body>
</html>