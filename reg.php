<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册</title>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
require_once 'register.php';
$RegFail = $RegUsrErr;
?>
<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<div class="form-group">
		    <label for="name">用户名</label>
		    <input type="text" class="form-control" id="name" placeholder="用户名" name="name">
		    <?php if($RegFail) echo "用户名已被注册"?>
		</div>
		<div class="form-group">
		    <label for="password">密码</label>
		    <input type="password" class="form-control" id="password" placeholder="密码" name="password">
		</div>
		<input type="submit" class="btn btn-default" value="注册"/>
	</form>
	<p>已注册？ <a href="index.php">登录</a></p>
</div>
<script src="jquery-2.1.3.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>