<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
    <link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/js/bootstrap.min.js">

	<script type="text/javascript">
		$(document).ready(function(){
	        $(".div2").click(function(){ 
	            $(this).next("div").slideToggle("slow")  
	            .siblings(".div3:visible").slideUp("slow");
	        });
    	});
	</script>
	<style type="text/css">
		 body{ margin:0;font-family:微软雅黑;}
		/* .left{ width:200px; height:100%; border-right:1px solid #CCCCCC ;#FFFFFF; color:#000000; font-size:14px; text-align:center;} */
		.left{width: 210px; height: 700px; border:1px solid #999;border-radius:4px;}
		.div1{text-align:center; width:210px; padding-top:10px;}
		.div2{height:40px; line-height:40px;cursor: pointer; font-size:13px; position:relative;border-bottom:#ccc 1px dotted;font-size: 15px}
		.jbsz {position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/manager.png);}
		.xwzx {position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/user.png);}
		.pro{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/pro.png);}
		.order{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/order.png);}
		.hui{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/hui.png);}
		.juan{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/juan.png);}
		.api{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/api.png);}
		.avg{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/avg.png);}
		.weixin{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/weixin.png);}
		.visit{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/visit.png);}
		.content{position: absolute; height: 16px; width: 16px; left: 40px; top: 10px; background:url(http://localhost/lvnong/lvnong_item//lvnong/Admin/Public/img/content.png);}
		.zxcp {position: absolute; height: 20px; width: 20px; left: 40px; top: 10px; background:url(images/4.png);}
		.lmtj {position: absolute; height: 20px; width: 20px; left: 40px; top: 10px; background:url(images/8.png);}
		.div3{display: none;cursor:pointer; font-size:13px;}
		.div3 ul{margin:0;padding:0;}
		.div3 li{ height:30px; line-height:30px; list-style:none; border-bottom:#ccc 1px dotted; text-align:center;}
		.div3 a{color: #000000;}
	</style>
</head>
<body>
	<div class="left">
		<div class="div1">
			<!--管理员管理-->
			<div class="div2"><div class="jbsz"> </div>管理员</div>
			<div class="div3">
			    <ul>
			        <a href="/lvnong_item/lvnong/Admin/Manager/sqlmanager" target="center"><li> 管理员信息</li></a>
			        <a href="<?php echo ADMIN_MANAGER?>upmanager" target="center"><li> 修改信息</li></a>
			        <a href="/lvnong_item/lvnong/Admin/Manager/uppassword" target="center"><li> 修改密码</li></a>
			    </ul>
			</div>

			<!--客户管理-->
			<div class="div2"><div class="xwzx"> </div>客户管理</div>
		    <div class="div3">
		      	<ul>
			        <a href="/lvnong_item/lvnong/Admin/User/userlist" target="center"><li> 客户列表</li></a>
		        </ul>
		    </div>
			
			<!--商品管理-->
			<div class="div2"><div class="pro"> </div>商品管理</div>
		    <div class="div3">
		      	<ul>
			        <a href="/lvnong_item/lvnong/Admin/pro/listpro" target="center"><li> 商品列表</li></a>
			        <a href="/lvnong_item/lvnong/Admin/pro/add" target="center"><li> 新增商品</li></a>
		        </ul>
		    </div>

		    <!--订单管理-->
		    <div class="div2"><div class="order"> </div>订单管理</div>
		    <div class="div3">
		      	<ul>
			        <a href="/lvnong_item/lvnong/Admin/order/orderlist" target="center"><li> 订单列表</li></a>
		        </ul>
		    </div>

		    <!--内容管理-->
		    <div class="div2"><div class="content"> </div>内容管理</div>
		    <div class="div3">
		      	<ul>
			        <a href="/lvnong_item/lvnong/Admin/content/essaylist" target="center"><li> 文章列表</li></a>
			        <a href="/lvnong_item/lvnong/Admin/content/addessay" target="center"><li> 新增文章</li></a>
			        <a href="/lvnong_item/lvnong/Admin/content/newslist" target="center"><li> 新闻列表</li></a>
			        <a href="/lvnong_item/lvnong/Admin/content/addnews" target="center"><li> 新增新闻</li></a>
		        </ul>
		    </div>

		    <!--优惠活动-->
		    <div class="div2"><div class="hui"> </div>优惠活动</div>
		    <div class="div3">
		      	<ul>
			        <a href="" target="center"><li> 活动列表</li></a>
			        <a href="" target="center"><li> 新增活动</li></a>
			        <a href="" target="center"><li> 活动列表</li></a>
		        </ul>
		    </div>

		    <!--优惠劵管理-->
			<div class="div2"><div class="juan"> </div>优惠劵管理</div>
		    <div class="div3">
		      	<ul>
			        <a href="" target="center"><li> 优惠劵列表</li></a>
			        <a href="" target="center"><li> 新增优惠卷</li></a>
		        </ul>
		    </div>

		    <!--接口管理-->
		    <div class="div2"><div class="api"> </div>接口管理</div>
		    <div class="div3">
		      	<ul>
			        <a href="" target="center"><li> 短信</li></a>
			        <a href="/lvnong_item/lvnong/Admin/qrcode/setqrcode" target="center"><li> 二维码</li></a>
		        </ul>
		    </div>

		    <!--数据统计-->
			<div class="div2"><div class="avg"> </div>数据统计</div>
		    <div class="div3">
		      	<ul>
			        <a href="" target="center"><li> 用户信息统计</li></a>
			        <a href="" target="center"><li> 订单数据统计</li></a>
			        <a href="" target="center"><li> 阅读数据统计</li></a>
			        <a href="" target="center"><li> 资金统计</li></a>
		        </ul>
		    </div>

		    <!--营销管理-->
		    <div class="div2"><div class="visit"> </div>营销模块</div>
		    <div class="div3">
		      	<ul>
			        <a href="" target="center"><li> 定向推送</li></a>
			        <a href="" target="center"><li> 访问统计</li></a>
			        <a href="" target="center"><li> 阅读统计</li></a>
		        </ul>
		    </div>

		    <!--公众平台管理-->
		    <div class="div2"><div class="weixin"> </div>公众平台管理</div>
		    <div class="div3">
		      	<ul>
			        <a href="" target="center"><li> 菜单</li></a>
			        <a href="" target="center"><li> 推送</li></a>
		        </ul>
		    </div>
		</div>
	</div>

</body>
</html>