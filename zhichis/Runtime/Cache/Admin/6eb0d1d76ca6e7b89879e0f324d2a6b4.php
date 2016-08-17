<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台首页</title>
	<script src="/lvnong/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL?>home.css">
	<style type="text/css">
		.header{
			height: 120px;
			border: 1px solid #999999;
			border-radius:5px;
		}
	</style>
</head>
<body>
<div class="header">
	<h1 class="text-center">知吃氏</h1>
	<h4>欢迎您：<u style="color:red;"><?php echo session("nickname");?></u><a href="/lvnong/lvnong_item/lvnong/Admin/admin/logout" target="_top">退出</a></h4>
</div>