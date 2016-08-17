<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>订单列表</title>
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/lvnong/lvnong_item/lvnong/Public/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>table.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>main.css">
    <script src="/lvnong/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
    <script src="/lvnong/lvnong_item/lvnong/Public/js/transition.js"></script>
    <script src="/lvnong/lvnong_item/lvnong/Public/js/modal.js"></script>
</head>
<body>
    <div class="main">
        <h3 align="center">客户列表(view)</h3>
        <div style="height:50px;">
            <FORM method="POST" action="/lvnong/lvnong_item/lvnong/Admin/User/sqluser">
            <div class="form-inline">
                <!--用户名-->
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" class="form-control" name="username" placeholder="请输入用户名">
                </div>
                <!--手机号码-->
                <div class="form-group">
                    <label>手机</label>
                    <input type="text" class="form-control" name="userphone" placeholder="请输入手机号码">
                </div>
                <!--真实姓名-->
                <div class="form-group">
                    <label>姓名</label>
                    <input type="text" class="form-control" name="realname" placeholder="请输入真实姓名">
                </div>
                <!--性别-->
                <div class="form-group">
                    <label>性别</label>
                    <select name="usersex" class="form-control">
                        <option value="">请选择...</option>
                        	<option value="1">男</option>
                            <option value="2">女</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
            </FORM>

        </div>
        

    <table class="table table-striped table-bordered">
            <tr>
                <td colspan="4" bgcolor="#FFFFFF" class="title info" align="center">当前登录用户：<?php echo session('nickname');?></td>
            </tr>
            <tr>
                <td colspan="4" bgcolor="#FFFFFF" class="title active" align="center">订单信息</td>
            </tr>
            <tr class="title active">
                <td bgcolor="#FFFFFF" width="60">编号</td>
                <td bgcolor="#FFFFFF" width="70">用户名</td>
                <td bgcolor="#FFFFFF" width="80">住址</td>
                <td bgcolor="#FFFFFF" width="40">手机</td>
                <td bgcolor="#FFFFFF" width="40">邮箱</td>
                <td bgcolor="#FFFFFF" width="60">昵称</td>
                <td bgcolor="#FFFFFF" width="100">真实姓名</td>
                <td bgcolor="#FFFFFF" width="80">性别</td>
                <td bgcolor="#FFFFFF" width="80">年龄</td>
                <td bgcolor="#FFFFFF" width="80">消费金额</td>
                <td bgcolor="#FFFFFF" width="60">操作</td>
            </tr>
            <?php if(is_array($select)): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="content" align="center">
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_id"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_name"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_addres"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_phone"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_email"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_petname"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_realname"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list[user_sex] == 1) ? "女" : "男";?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_age"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_upprice"]); ?></td>
                    <td bgcolor="#FFFFFF" id="oper">&nbsp;
                        <a href="/lvnong/lvnong_item/lvnong/Admin/User/userdetailed/userid/<?php echo ($list["user_id"]); ?>" target="center">详情</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>

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