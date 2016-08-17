<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>查看用户</title>
	<link rel="stylesheet" type="text/css" href="/zhichis_item/zhichis/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/zhichis_item/zhichis/Public/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
	<script src="/zhichis_item/zhichis/Public/js/jquery-3.0.0.js"></script>
	<style type="text/css">
		.shift{
			text-align:right;
		}
	</style>
	<script type="text/javascript">
		jQuery(function(){
			$('tr').find('#name').addClass('shift');
		});
	</script>
</head>
<body>
	<div class="main">
		<h3 align="center">管理员信息(view)</h3>
		<table class="table table-striped">
			<tr>
				<td id="name"><b>NAME</b></td>
				<td><b>VALUE</b></td>
			</tr>
			<tr>
				<td id="name">昵称：</td>
				<td><?php echo ($rs["nickname"]); ?></td>
			</tr>
			<tr>
				<td id="name">用户名：</td>
				<td><?php echo ($rs["username"]); ?></td>
			</tr>
			<tr>
				<td id="name">注册时间：</td>
				<td><?php echo ($rs["regdate"]); ?></td>
			</tr>
			<tr>
				<td id="name">最后一次登录时间：</td>
				<td><?php echo ($rs["lastdate"]); ?></td>
			</tr>
			<tr>
				<td id="name">注册IP：</td>
				<td><?php echo ($rs["regip"]); ?></td>
			</tr>
			<tr>
				<td id="name">最后一次登录IP:</td>
				<td><?php echo ($rs["lastip"]); ?></td>
			</tr>
			<tr>
				<td id="name">登录次数：</td>
				<td><?php echo ($rs["loginnum"]); ?></td>
			</tr>
			<tr>
				<td id="name">邮箱：</td>
				<td><?php echo ($rs["email"]); ?></td>
			</tr>
			<tr>
				<td id="name">手机号码：</td>
				<td><?php echo ($rs["mobile"]); ?></td>
			</tr>

		</table>
	</div>
</body>
</html>