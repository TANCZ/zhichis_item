<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>订单处理</title>
</head>
<body>
	<h3>订单处理(view)</h3>
	<table>
		<tr>
			<td>订单编号：</td>
			<td><?php echo ($rs["order_id"]); ?></td>
		</tr>
		<tr>
			<td>购买产品：</td>
			<td><?php echo ($rs["pro_name"]); ?></td>
		</tr>
		<tr>
			<td>购买用户：</td>
			<td><?php echo ($rs["user_name"]); ?></td>
		</tr>
		<tr>
			<td>订单时间：</td>
			<td><?php echo ($rs["order_time"]); ?></td>
		</tr>
		<tr>
			<td>订单价格：</td>
			<td><?php echo ($rs["order_price"]); ?></td>
		</tr>
		<tr>
			<td>配送方式：</td>
			<td><?php echo ($rs["order_dispatching"]); ?></td>
		</tr>
		<tr>
			<td>购买数量：</td>
			<td><?php echo ($rs["order_sub_num"]); ?></td>
		</tr>
		<tr>
			<td>订单状态</td>
			<td><?php echo ($rs["order_state_name"]); ?></td>
		</tr>
		<tr>
			<td>收货地址：</td>
			<td><?php echo ($rs["rec_area"]); ?></td>
		</tr>
		<tr>
			<td>
			<?php echo ($orderno["orderno"]); ?>
				<!-- <?php echo ($rs["order_state_id"]); ?>
				<?php echo ($rs.order_state_id == 2) ? '已付款' : ($rs.order_state_id == 3) ? '代发货' : ($rs.order_state_id == 4) ? '待收货' : '订单完成';?> -->
				
			</td>
		</tr>
	</table>
</body>
</html>