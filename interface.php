<?php
/*
 * interface.php
 * 这个页面的主要功能是
 * 传入两个值visit和user，其中visit是博客作者，user是用户的登录身份，当visit == user时可以编辑和创建文章，当不一样时只能查看。
 *
 * 有两个变量others和show，show是输出文章列表的，others的输出其他用户
 */
header ( "Content-Type: text/html; charset=utf8" );
session_start ();
// 获取session里的user值
$user = $_SESSION ['username'];
// 获取邀被查看的用户的名字
$visit = $_GET ['visit'];
// 若用户名和被查看用户名一致，允许编辑
if ($visit == $user)
	$access = true;
else
	$access = false;
	// 连接数据库
$link = mysqli_connect ( 'localhost', 'root', '123456', 'Blog' );
if (! $link) {
	echo "数据库出错" . mysqli_error ( $link );
	mysqli_close ( $link );
	die ();
}
$result = mysqli_query ( $link, "SELECT title FROM $visit ORDER BY ID_ART DESC" );
$row = mysqli_fetch_assoc ( $result );

if (empty ( $row )) {
	if ($access) {
		$show = "你还没有写过文章。<a href='com.php'>创建新文档</a>";
	} else {
		$show = "TA还没有写过任何文章";
	}
} else {
	$show = <<<EOF
	<table class="table table-hover">
	<tr>
	<th>#</th>
	<th>文章</th>
	</tr>
EOF;
	$i = 1;
	do {
		$tmp = $row ['title'];
		$show .= <<< EOF
		<tr>
			<td>$i</td>
			<td><a href="art.php?title=$tmp&visit=$visit">$tmp</a></td>
		</tr>
EOF;
		$i ++;
	} while ( $row = mysqli_fetch_assoc ( $result ) );
	$show .= "</table>";
	if ($access) {
		$show .= "<a href='com.php'>创建新文档</a>";
	}
}
// 其它用户列表
$result = mysqli_query ( $link, "SELECT name FROM main ORDER BY ID_Main" );
$row = mysqli_fetch_assoc ( $result );

if ($access)
	$others = NULL;
else
	$others = "<a class = 'btn btn-default btn-block' href='intf.php?visit=$user'>返回我的主页</a>";
$others .= <<<EOF
<table class="table table-bordered">
	<tr>
		<th>其他人</th>
	</tr>
EOF;
// $other为查看其他用户
if (! empty ( $row )) {
	do {
		$tmp = $row ['name'];
		if ($tmp == $user || $tmp == $visit)
			continue;
		$others .= <<< EOF
		<tr>
			<td><a href="intf.php?visit=$tmp">$tmp</a></td>
		</tr>
EOF;
	} while ( $row = mysqli_fetch_assoc ( $result ) );
	$others .= "</table>";
} else {
	$others = <<<EOF
	<tr>
		<td>这里没有其他人</td>
	</tr>
	</table>
EOF;
}
mysqli_close ( $link );
?>