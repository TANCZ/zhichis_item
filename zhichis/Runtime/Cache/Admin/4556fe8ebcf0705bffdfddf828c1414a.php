<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>文章管理</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>table.css" />
	<link href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/lvnong/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
    <script type="text/javascript">

        //上下架时弹出确定层
        function frame(url){
            if (confirm("确定删除吗？")) {
                window.location = url;
            };
        }
    </script>
</head>
<body>
	<div class="main">
		<h3 align="center">文章列表(view)</h3>
		<table class="table table-bordered table-striped">
            <tr>
                <td colspan="3" bgcolor="#FFFFFF" class="title" align="center">当前登录用户：<?php echo session('nickname');?></td>
            </tr>
            <tr>
                <td colspan="3" bgcolor="#FFFFFF" class="title" align="center">文章列表</td>
            </tr>
            <tr class="title active">
                <td bgcolor="#FFFFFF" width="100">文章编号</td>
                <td bgcolor="#FFFFFF" width="100">文章标题</td>
                <td bgcolor="#FFFFFF" width="60">文章主题</td>
                <td bgcolor="#FFFFFF" width="150">发布时间</td>
                <td bgcolor="#FFFFFF" width="60">阅读数量</td>
                <td bgcolor="#FFFFFF" width="100">操作</td>
            </tr>
            <?php if(is_array($select)): foreach($select as $key=>$list): ?><tr class="content" align="center">
                        <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["id"]); ?></td>
                        <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["title"]); ?></td>
                        <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["content"]); ?></td>
                        <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["edit_time"]); ?></td>
                        <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["readnum"]); ?></td>
                        <td bgcolor="#FFFFFF" id="oper">&nbsp;
                            <a href="/lvnong/lvnong_item/lvnong/Admin/Content/saveessay/id/<?php echo ($list["id"]); ?>" target="center">编辑</a>&nbsp;
                            <a href="javascript:frame('/lvnong/lvnong_item/lvnong/Admin/Content/delessay/id/<?php echo ($list["id"]); ?>')" target="center">删除</a>
                        </td>
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