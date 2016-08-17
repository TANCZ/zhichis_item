<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>商品列表</title>
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>table.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
    <script type="text/javascript">

        //上下架时弹出确定层
        function frame(url){
            var name = document.getElementById('frame').innerHTML;
            if (confirm("你确定"+name+"吗？")) {
                window.location = url;
            };
        }
    </script>
</head>
<body>
    <div class="main">
        
    
    <h3 align="center">商品列表(view)</h3>
	<table class="table table-bordered table-striped">
            <tr>
                <td colspan="5" bgcolor="#FFFFFF" class="title" align="center">当前登录用户：<?php echo session('nickname');?></td>
            </tr>
            <tr>
                <td colspan="5" bgcolor="#FFFFFF" class="title" align="center">商品信息</td>
            </tr>
            <tr class="title active">
                <td bgcolor="#FFFFFF" width="60" >编号</td>
                <td bgcolor="#FFFFFF" width="100">名称</td>
                <td bgcolor="#FFFFFF" width="100">价格</td>
                <td bgcolor="#FFFFFF" width="100">图片</td>
                <td bgcolor="#FFFFFF" width="100">重量</td>
                <td bgcolor="#FFFFFF" width="100">库存</td>
                <td bgcolor="#FFFFFF" width="100">销量</td>
                <td bgcolor="#FFFFFF" width="300">介绍</td>
                <td bgcolor="#FFFFFF" width="100">状态</td>
				<td bgcolor="#FFFFFF" width="100">操作</td>
            </tr>
            <?php if(is_array($select)): foreach($select as $key=>$list): ?><tr class="content" align="center">
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["pro_id"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["pro_name"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["pro_price"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<img src="/lvnong/lvnong_item/lvnong/Public/ProUpload/<?php echo ($list["pro_img"]); ?>" height="50" width="50"></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["pro_spec"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["pro_num"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list[pro_sales] == 0) ? '暂无销量' : $list.pro_sales;?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo (subtext($list["pro_info"],40)); ?></td><!--限制字符 Common/function.php/subtext()-->
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list['pro_isshelves'] == 0) ? '已上架' : '已下架';?>
                    </td>
                    <td bgcolor="#FFFFFF" id="oper">&nbsp;<a href="/lvnong/lvnong_item/lvnong/Admin/Pro/editpro/proId/<?php echo ($list["pro_id"]); ?>" target="center">编辑</a>&nbsp;
                    <a href="javascript:frame('/lvnong/lvnong_item/lvnong/Admin/Pro/proshelves/proId/<?php echo ($list["pro_id"]); ?>')" target="center" id="frame"><?php echo ($list['pro_isshelves'] == 1) ? '上架' : '下架';?></a></td>
                </tr><?php endforeach; endif; ?>
            <tr class="content">
                <!--<td colspan="3" bgcolor="#FFFFFF">&nbsp;<?php echo ($page); ?></td>-->
                <td colspan="12" bgcolor="#FFFFFF" style="text-align:center;"><div class="pages">
                	<?php echo ($page); ?>
                </div></td>  
            </tr>
        </table>

        </div>
</body>
</html>