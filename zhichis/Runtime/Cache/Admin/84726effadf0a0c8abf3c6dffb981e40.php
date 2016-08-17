<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>修改用户</title>
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">

</head>
<body>
	<div class="main">
		<h3 align="center">修改用户(view)</h3>
		<form class="form-horizontal" method="POST" action="/lvnong/lvnong_item/lvnong/Admin/Manager/updata" style="width:1000px">
			<div class="form-group">
			    <label class="col-sm-2 control-label">昵称：</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="nickname" value="<?php echo ($vo["nickname"]); ?>" required>
			    </div>
			</div>
			
			<div class="form-group">
			    <label class="col-sm-2 control-label">帐号：</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="username" value="<?php echo ($vo["username"]); ?>" required>
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-2 control-label">邮箱：</label>
			    <div class="col-sm-3">
			      <input type="email" class="form-control" name="email" value="<?php echo ($vo["email"]); ?>" required>
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-2 control-label">号码：</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="mobile" value="<?php echo ($vo["mobile"]); ?>" required>
			    </div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">提交</button>
			    </div>
			</div>
		</form>
	</div>
</body>
</html>