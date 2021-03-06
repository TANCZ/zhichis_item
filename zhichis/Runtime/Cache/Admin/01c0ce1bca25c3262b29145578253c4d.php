<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>生成二维码</title>
	<link rel="stylesheet" href="/zhichis_item/zhichis/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/zhichis_item/zhichis/Public/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
	<script src="/zhichis_item/zhichis/Public/js/jquery-3.0.0.js"></script>
	<script type="text/javascript">
		$(function(){
			$("p").hide();
			$("#num").keyup(function(){ //keyup事件处理 
				
				$(this).val($(this).val().replace(/\D|^0/g,''));
				}).bind("paste",function(){ //CTR+V事件处理 
					$(this).val($(this).val().replace(/\D|^0/g,''));
			}).css("ime-mode", "disabled"); //CSS设置输入法不可用 

			$("#proid").keyup(function(){ //keyup事件处理 
				$(this).val($(this).val().replace(/\D|^0/g,''));
				var num = $(this).val();
				}).bind("paste",function(){ //CTR+V事件处理 
					$(this).val($(this).val().replace(/\D|^0/g,''));
			}).css("ime-mode", "disabled"); //CSS设置输入法不可用 
		});

	</script>
</head>
<body>
	<div class="main">
		<h3 align="center">生成兑换码</h3>
		<form method="post" action="/zhichis_item/zhichis/Admin/Qrcode/redeemcode" class="table form-horizontal" style="width:1000px">
			<div class="form-group">
			    <label class="col-sm-2 control-label">产品编号</label>
			    <div class="col-sm-3">
			      	<input type="text" class="form-control" id="proid" name="proid" placeholder="产品编号" required>
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-2 control-label">生成个数</label>
			    <div class="col-sm-3">
			      	<input type="text" class="form-control" id="num" name="num" maxlength="5" placeholder="请输入生成个数" required>
			    </div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-3">
			      <button type="submit" class="btn btn-primary">提交</button>
			    </div>
			</div>
		</form>
	</div>
</body>
</html>