<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>订单详情</title>
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
    <script src="/lvnong/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
    <style type="text/css">
		table{
			text-align: center;
		}
		.al{
			text-align:right;
		}
    </style>
</head>
<body>
	<div class="main">
		<h3 align="center">订单详情(view)</h3>
		<table class="table table-hover table-bordered">
			<tr>
				<td class="active" colspan="4">订单</td>
			</tr>
			<tr>
				<td class="al">订单单号：</td>
				<td style="text-align:left;"><?php echo ($rs["order_orderid"]); ?></td>
				<td class="al">订单时间：</td>
				<td style="text-align:left;"><?php echo ($rs["order_time"]); ?></td>
			</tr>
			<tr>
				<td class="al">订单价格：</td>
				<td style="text-align:left;"><?php echo ($rs["order_price"]); ?></td>
				<td class="al">是否支付：</td>
				<td style="text-align:left;"><?php echo ($rs[order_ispay] == 1) ? "已支付" : "未支付";?></td>
			</tr>
			<tr>
				<td class="al">购买产品：</td>
				<td style="text-align:left;"><?php echo ($rs["pro_name"]); ?></td>
				<td class="al">购买数量：</td>
				<td style="text-align:left;"><?php echo ($rs["order_sub_number"]); ?></td>
			</tr>
			<tr>
				<td class="active" colspan="4">物流</td>
			</tr>
			<tr>
				<td class="al">是否发货：</td>
				<td style="text-align:left;"><?php echo ($rs[order_sub_issend] == 1 ) ? "已发货" : "未发货";?></td>
				<td class="al">发货时间：</td>
				<td style="text-align:left;"><?php echo ($rs["order_sub_sendtime"]); ?></td>
			</tr>
			<tr>
				<td class="al">是否收货：</td>
				<td style="text-align:left;"><?php echo ($rs[order_sub_istake] == 1) ? "已收货" : "未收货";?></td>
				<td class="al">收货时间：</td>
				<td style="text-align:left;"><?php echo ($rs["order_sub_taketime"]); ?></td>
			</tr>
			<tr>
				<td class="al">快递公司：</td>
				<td style="text-align:left;"><?php echo ($rs["order_sub_sender"]); ?></td>
				<td class="al">快递单号：</td>
				<td style="text-align:left;"><?php echo ($rs["order_sub_sendcode"]); ?></td>
			</tr>
			<tr>
				<td class="active" colspan="4">地址</td>
			</tr>
			<tr>
				<td class="al">收货人：</td>
				<td style="text-align:left;"><?php echo ($rs["rec_name"]); ?></td>
				<td class="al">联系电话：</td>
				<td style="text-align:left;"><?php echo ($rs["rec_phone"]); ?></td>
			</tr>
			<tr>
				<td class="al">收货地址：</td>
				<td style="text-align:left;" colspan="3"><?php echo ($rs["rec_area"]); ?></td>
			</tr>

		</table>
	</div>
</body>
</html>