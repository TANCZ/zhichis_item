<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>编辑商品</title>
	<link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
    <script src="/lvnong/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#edit").click(function(){
			var data = $("#img").val();
			$("#proimg").val(data);
		});
	});
	</script>
</head>
<body>
	<div class="main">
		<h3 align="center">编辑商品(view)</h3>
	<form method="POST" action="/lvnong/lvnong_item/lvnong/Admin/Pro/edit" class="form-horizontal" enctype="multipart/form-data" style="width:1000px">
		<!--名称-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">名称</label>
			<div class="col-sm-3">
			     <input type="text" class="form-control" name="pro_name" value="<?php echo ($rs["pro_name"]); ?>" required>
			</div>
		</div>
		<!--价格-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">价格</label>
			<div class="col-sm-3">
			    <input type="text" class="form-control" name="pro_price" value="<?php echo ($rs["pro_price"]); ?>" required>
			</div>
		</div>
		<!--重量-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">规格</label>
			<div class="col-sm-3">
			    <input type="text" class="form-control" name="pro_spec" value="<?php echo ($rs["pro_spec"]); ?>" required>
			</div>
		</div>	
		<!--图片-->
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
		    <div class="col-xs-3">
		      <img src="/lvnong/lvnong_item/lvnong/Public/ProUpload/<?php echo ($rs["pro_img"]); ?>" style="border:solid #999 1px; width:120px; height:120px;" />
		      <input type="hidden" name="proimg" id="proimg">
		      <input type="file" name="image" id="img">
		      <label class="control-label" style="color:red">不修改图片，无需上传</label>
		    </div>
	    </div>
		<!--库存-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">库存</label>
			<div class="col-sm-3">
			    <input type="text" class="form-control" name="pro_num" value="<?php echo ($rs["pro_num"]); ?>" required>
			</div>
		</div>
		<!--介绍-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">产品介绍</label>
			<div class="col-sm-3">
			    <textarea class="form-control" style="width: 400px;height: 150px; resize: none;" name="pro_info" required><?php echo ($rs["pro_info"]); ?></textarea>
			</div>
		</div>
		<!--是否上架-->
		<div class="form-group" >
			<label class="col-sm-2 control-label">是否上架</label>
			<div class="col-sm-3">
					<select name="pro_isshelves" class="form-control">
						<?php if(is_array($ls)): foreach($ls as $k=>$v): if(($k) == $rs["pro_isshelves"]): ?><option value="<?php echo ($k); ?>}" selected><?php echo ($v); ?></option>
								<?php else: ?>
									<option value="<?php echo ($k); ?>"><?php echo ($v); ?></option><?php endif; endforeach; endif; ?>
					</select>
			</div>
		</div>

		<!--提交-->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-3">
				<input type="hidden" name="pro_id" value="<?php echo ($rs["pro_id"]); ?>">
			    <button type="submit" id="edit" class="btn btn-primary">提交</button>
			</div>
		</div>
	</form>
	</div>
</body>
</html>