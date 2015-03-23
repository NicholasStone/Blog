
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dome1</title>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
//Recom.php
/* 接收从art传过来的title，并从数据库中调出相应文章显示在编辑框中
 * 在编辑完后将编辑后的文章传到SaveChange.php中保存
 */
session_start();
$title = $_GET['title'];
$user = $_SESSION['username'];

$link = mysqli_connect('localhost', 'root', '123456', 'Blog') or die("数据库连接错误");
$result = mysqli_query($link,"SELECT * FROM $user WHERE title='$title'");
$row = mysqli_fetch_assoc($result);

if(!empty($row)){
	$content = str_replace("<br />", "", $row['content']);
	$ID_ART = $row['ID_ART'];
}
mysqli_close($link);

?>
	<form action="SaveChange.php" method="get">
		<input type="hidden" id="ID_ART" name="ID_ART" value="<?php echo $ID_ART; ?>">
		<div class="form-group">
		<label for="title">title</label>
		<input type="text" class="form-control" id="title" name="title"
				value="<?php echo $title;?>" required= "required">
		</div>
		<div class="form-group">
		<label for="content">title</label>
		<textarea rows="10" cols="40" class="form-control" id="content"
				name="content" title= "请输入文章内容" 
				required= "required"><?php echo $content;?></textarea>
		<input type="submit" class="btn btn-default" value="保存更改" />
		</div>
	</form>
</body>
</html>