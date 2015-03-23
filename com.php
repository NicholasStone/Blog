<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>编辑</title>
<link href="bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
$StoreNor = false;
require_once 'compile.php';
?>
	<div class="container">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
			<div class="form-group">
				<input type="text" class="form-control" id="title" placeholder="标题"
					name="title" required="required" title="请填写标题">
			</div>
			<div class="form-group">
				<textarea rows="10" cols="40" class="form-control" id="content"
					placeholder="在此鍵入文章内容" name="content" title= "请输入文章内容" 
					required= "required"></textarea>
			</div>
			<input type="submit" class="btn btn-default" value="保存" />
			<div>
			<?php
			if( $StoreNor ) 
			{
				echo '保存正常，你可以<a href= "art.php?visit=$user&title=$title">查看</a>，或<a href="com.php">再写一篇</a>';
			}
			else if ( !empty($title) ) echo "保存失败";
			?>
			</div>
		</form>
	</div>
	<script src="jquery-2.1.3.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>
</html>
