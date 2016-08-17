<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>详细信息</title>
	<link rel="stylesheet" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL?>main.css">
	<script src="/lvnong/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
	<style type="text/css">
		.al{
			text-align:right;
		}
	</style>
</head>
<body>
	<div class="main">
		<h3 align="center">详细信息(view)</h3>
		<table class="table table-hover table-bordered">
			<tr class="active">
				<td colspan="4" align="center">基本信息</td>
			</tr>
			<tr>
				<td class="al">用户编号：</td>
				<td><?php echo ($rs["user_id"]); ?></td>
				<td class="al">用户名：</td>
				<td><?php echo ($rs["user_name"]); ?></td>
			</tr>
			<tr>
				<td class="al">用户手机：</td>
				<td><?php echo ($rs["user_phone"]); ?></td>
				<td class="al">用户邮箱：</td>
				<td><?php echo ($rs["user_email"]); ?></td>
			</tr>
			<tr>
				<td class="al">用户昵称：</td>
				<td><?php echo ($rs["user_petname"]); ?></td>
				<td class="al">真实姓名：</td>
				<td><?php echo ($rs["user_realname"]); ?></td>
			</tr>
			<tr>
				<td class="al">用户性别：</td>
				<td><?php echo ($rs[user_sex] == 0) ? "男" : "女";?></td>
				<td class="al">用户年龄：</td>
				<td><?php echo ($rs["user_age"]); ?></td>
			</tr>
			<tr>
				<td class="al">用户住址：</td>
				<td><?php echo ($rs["user_addres"]); ?></td>
				<td class="al">消费金额：</td>
				<td><?php echo ($rs["user_upprice"]); ?></td>
			</tr>
			<tr class="active">
				<td colspan="4" align="center">默认收货地址</td>
			</tr>
			<tr>
				<td class="al">收货人：</td>
				<td><?php echo ($rs["rec_name"]); ?></td>
				<td class="al">联系电话：</td>
				<td><?php echo ($rs["rec_phone"]); ?></td>
			</tr>
			<tr>
				<td class="al">所在城市：</td>
				<td><?php echo ($rs["rec_city"]); ?></td>
				<td class="al">邮政编码：</td>
				<td><?php echo ($rs["rec_zipcode"]); ?></td>
			</tr>
			<tr>
				<td class="al">详细地址：</td>
				<td colspan="3"><?php echo ($rs["rec_area"]); ?></td>
			</tr>
		</table>
	</div>
</body>
</html>