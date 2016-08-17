<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>管理员注册</title>
</head>
<body>
	<h3>注册管理员</h3>
	<form method="POST" action="/zhichis_item/zhichis/Admin/Manager/insmanager" >
		<table>
			<tr>
				<td>昵称：</td>
				<td><input type="text" name="nickname"></td>
			</tr>
			<tr>
				<td>帐号：</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type="password" name="password"></td>
			</tr>
				<tr>
				<td>确认密码：</td>
				<td><input type="password" name="repassword"></td>
			</tr>
			<tr>
				<td>Email：</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>手机：</td>
				<td><input type="text" name="mobile"></td>
			</tr>
			<input type="submit" value="注册">
		</table>
	</form>
	
</body>
</html>