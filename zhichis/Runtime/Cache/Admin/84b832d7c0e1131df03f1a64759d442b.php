<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>物流信息</title>
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
    <script src="/lvnong/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
    <style type="text/css">

		.mian{
			text-align:right;
		}
    </style>
    <script>
		jQuery(function(){
			$('tr').find('.sty').addClass('mian');
		});
	</script>
</head>
<body>
	<div class="main">
		<h3 align="center">物流信息(view)</h3>
		<table class="table table-striped table-hover">
			<tr class="active">
				<th class="sty">NAME</th>
				<th>VALUE</th>
			</tr>
			<tr>
				<td class="sty">订单单号：</td>
				<td style="text-align:left;"><?php echo ($rs["order_orderid"]); ?></td>
			</tr>
			<tr>
				<td class="sty">订购产品：</td>
				<td><?php echo ($rs["pro_name"]); ?></td>
			</tr>
			<tr>
				<td class="sty">订购数量：</td>
				<td><?php echo ($rs["order_sub_number"]); ?></td>
			</tr>
			<tr>
				<td class="sty">订单时间：</td>
				<td><?php echo ($rs["order_time"]); ?></td>
			</tr>
			<tr>
				<td class="sty">订单价格：</td>
				<td><?php echo ($rs["order_price"]); ?></td>
			</tr>
			<tr>
				<td class="sty">订购用户：</td>
				<td><?php echo ($rs["user_name"]); ?></td>
			</tr>
			<tr>
				<td class="sty">订购姓名：</td>
				<td><?php echo ($rs["user_realname"]); ?></td>
			</tr>
			<tr>
				<td class="sty">用户性别：</td>
				<td><?php echo ($rs[user_sex] == 0) ? "男" : "女";?></td>
			</tr>
			<tr>
				<td class="sty">是否收货：</td>
				<td><?php echo ($rs[order_sub_istake] == 0) ? "对方还未收货" : "对方已收货";?></td>
			</tr>
			<tr>
				<td class="sty">收货时间：</td>
				<td><?php echo ($rs["order_sub_taketime"]); ?></td>
			</tr>
			<tr>
				<td class="sty">收货地址：</td>
				<td><?php echo ($rs["rec_area"]); ?></td>
			</tr>
			<tr>
				<td class="sty">收货人：</td>
				<td><?php echo ($rs["rec_name"]); ?></td>
			</tr>
			<tr>
				<td class="sty">联系电话：</td>
				<td><?php echo ($rs["rec_phone"]); ?></td>
			</tr>
			<tr>
				<td class="sty">快递公司：</td>
				<td><?php echo ($rs["order_sub_sender"]); ?></td>
			</tr>
			<tr>
				<td class="sty">快递单号：</td>
				<td><?php echo ($rs["order_sub_sendcode"]); ?></td>
			</tr>
		</table>
	</div>
</body>
</html>