<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>修改密码</title>
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
</head>
<body>
	<div class="main">
		<h3 align="center">修改密码(view)</h3>
		<form method="POST" action="/lvnong/lvnong_item/lvnong/Admin/Manager/uppassword" class="form-horizontal" style="width:1000px">
			<div class="form-group">
			    <label class="col-sm-2 control-label">原密码：</label>
			    <div class="col-sm-3">
			      <input type="password" class="form-control" name="pastpwd" required>
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-2 control-label">新密码：</label>
			    <div class="col-sm-3">
			      <input type="password" class="form-control" name="newpwd" required>
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-2 control-label">确认密码：</label>
			    <div class="col-sm-3">
			      <input type="password" class="form-control" name="reppwd" required>
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