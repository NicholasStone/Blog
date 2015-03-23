<?php 
require_once 'check.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录</title>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<div>
			<?php if($LogErr) echo "用户名或密码错误" ?>
		</div>
		<div class="form-group">
		    <label for="name">用户名:</label>
		    <input type="text" class="form-control" id="name" placeholder="用户名" name="name" required="required" title="用户名不能为空"><a href="reg.php">注册>></a>
		</div>
		<div class="form-group">
		    <label for="password">密码：</label>
		    <input type="password" class="form-control" id="password" placeholder="密码" name="password" required="required" title="密码不能为空"><a href="#">忘记密码>></a>
		</div>
		<input type="submit" class="btn btn-default" value="登录"/>
	</form>
</div>
<script src="jquery-2.1.3.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>

