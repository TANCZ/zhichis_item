<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>知吃氏</title>
	<link rel="stylesheet" type="text/css" href="/zhichis_item/zhichis/Public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/zhichis_item/zhichis/Public/js/bootstrap.min.js">
	<style type="text/css">
		.form-signin{
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		input{
			margin-bottom: 3px;
		}
 		.loginBox{
 			width:500px;
 			height:300px;
 			padding:0 20px;
 			border:1px solid #fff; 
 			color:#000; 
 			margin-top:40px; 
 			border-radius:8px;
 			background: white;box-shadow:0 0 15px #222; 
 			background: -moz-linear-gradient(top, #fff, #efefef 8%);
 			background: -webkit-gradient(linear, 0 0, 0 100%, from(#f6f6f6), to(#f4f4f4));
 			font:11px/1.5em 'Microsoft YaHei' ;
 			position: absolute;left:50%;top:50%;
 			margin-left:-250px;margin-top:-200px;
 		}
		body {
			width: 1520px;
			height: 868px;
			background:url(/zhichis_item/zhichis/Public/img/order1.jpg) top center no-repeat; 
			background-size:cover;
		}
	</style>
</head>
<body>
	<div class="loginBox">
		<form method="POST" action="/zhichis_item/zhichis/Admin/Admin/login" class="form-signin" role="form">
			<h2 class="form-signin-heading">欢迎登录知吃氏</h2>
			<input type="text" name="username" class="form-control" placeholder="用户名" required autofocus><br>
			<input type="password" name="password" class="form-control" placeholder="密码" required><br>
			<span><a href="/zhichis_item/zhichis/Admin/Manager/insmanager">注册管理员</a></span>
			<button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
		</form>
	</div>
</body>
</html>