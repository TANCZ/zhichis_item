<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>添加商品</title>
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
</head>
<body>
	<div class="main">
		<h3 align="center">新增商品(view)</h3>
	<form method="POST" action="/lvnong/lvnong_item/lvnong/Admin/Pro/add" class="form-horizontal" enctype="multipart/form-data" style="width:1000px">
		<!--名称-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">名称</label>
			<div class="col-sm-3">
			     <input type="text" class="form-control" name="pro_name" required>
			</div>
		</div>
		<!--类别-->
		<!-- 		<div class="form-group" >
			<label class="col-sm-2 control-label">类别</label>
			<div class="col-sm-3">
			    <select name = "pro_type_id" class="form-control">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["pro_type_id"]); ?>"><?php echo ($vo["pro_type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</div> -->
		<!--价格-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">价格</label>
			<div class="col-sm-3">
			    <input type="text" class="form-control" name="pro_price" required>
			</div>
		</div>
		<!--重量-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">规格</label>
			<div class="col-sm-3">
			    <input type="text" class="form-control" name="pro_spec" required>
			</div>
		</div>	
		<!--图片-->
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
		    <div class="col-xs-3">
		      <input type="file" name="image" id="img" required>
		    </div>
	    </div>
		<!--库存-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">库存</label>
			<div class="col-sm-3">
			    <input type="text" class="form-control" name="pro_num" required>
			</div>
		</div>
		<!--介绍-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">产品介绍</label>
			<div class="col-sm-3">
			    <textarea class="form-control" style="width: 300px;height: 100px; resize: none;" name="pro_info" required></textarea>
			</div>
		</div>
		<!--是否上架-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">是否上架</label>
			<div class="col-sm-3">
					<select name="pro_isshelves" class="form-control">
						<option value="0">上架</option>
						<option value="1">下架</option>
					</select>
			</div>
		</div>

		<!--提交-->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			    <button type="submit" class="btn btn-primary">提交</button>
			</div>
		</div>
	</form>
	</div>
</body>
</html>