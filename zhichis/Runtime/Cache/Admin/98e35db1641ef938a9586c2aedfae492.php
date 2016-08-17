<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>添加商品</title>

</head>
<body>
	<h3>新增商品(view)</h3>
	<form method="POST" action="/lvnong/lvnong_item/lvnong/index.php/Admin/Product/add">
		<table>
			<tr>
				<td>名称：</td>
				<td>
					<input type="text" name="pro_name">
				</td>
			</tr>
			<tr>
				<td>类别：</td>
				<td>
				<select style="width:172px;">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["pro_type_id"]); ?>"><?php echo ($vo["pro_type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</td>
			</tr>
			<tr>
				<td>重量：</td>
				<td>
					<input type="text" name="pro_wight">
				</td>
			</tr>
			<tr>
				<td>地址：</td>
				<td>
					<input type="text" name="pro_addres">
				</td>
			</tr>
			<tr>
				<td>包装: </td>
				<td>
					<input type="text" name="pro_pack">
				</td>
			</tr>
			<tr>
				<td>保质期：</td>
				<td>
					<input type="text" name="pro_preiod">
				</td>
			</tr>
			<tr>
				<td>储存方法：</td>
				<td>
					<input type="text" name="pro_method">
				</td>
			</tr>
			<tr>
				<td>库存：</td>
				<td>
					<input type="text" name="pro_num">
				</td>
			</tr>
			<tr>
				<td>运费：</td>
				<td>
					<input type="text" name="pro_cost">
				</td>
			</tr>
			<tr>
				<td>介绍：</td>
				<td>
					<textarea rows="4" cols="30" name="pro_info"> </textarea>
				</td>
			</tr>
			<tr>
				<td>是否上架：</td>
				<td>
					<select>
						<option value="0">上架</option>
						<option value="1">下架</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="新增"></td>
			</tr>
		</table>
	</form>
</body>
</html>