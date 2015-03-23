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
require_once 'interface.php';
?>
	<div class="container">
		<div class="col-md-3">
			<h3><?php 
				echo "欢迎回来，".$user."</br>";
				if( !$access ) echo '你正在查看'.$visit.'的博客';
				?>
			</h3>
		</div>
		<div class="col-md-6">
			<?php echo $show; ?>
		</div>
		<div class="col-md-3">
			<?php echo $others;?>
		</div>
	</div>
	<script src="jquery-2.1.3.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>
</html>
