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
        <h3 align="center">订单列表(view)</h3>
        <div style="height:50px;">
            <FORM method="POST" action="/lvnong/lvnong_item/lvnong/Admin/Order/whorderlist">
            <div class="form-inline">
                <!--订单号-->
                <div class="form-group">
                    <label>订单号</label>
                    <input type="text" class="form-control" name="orderid" placeholder="请输入订单编号">
                </div>
                <!--用户名称-->
                <div class="form-group">
                    <label>购买用户</label>
                    <input type="text" class="form-control" name="username" placeholder="请输入用户名称">
                </div>
                <!--产品-->
                <div class="form-group">
                    <label>购买商品</label>
                    <input type="text" class="form-control" name="proname" placeholder="请输入商品名称">
                </div>
                <!--状态-->
                <div class="form-group">
                    <label>订单状态</label>
                    <select name="stateId" class="form-control">
                        <option value="">请选择...</option>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><option value="<?php echo ($list["order_state_id"]); ?>"><?php echo ($list["order_state_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
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
                <td bgcolor="#FFFFFF" width="40">编号</td>
                <td bgcolor="#FFFFFF" width="40">单号</td>
                <td bgcolor="#FFFFFF" width="60">用户</td>
                <td bgcolor="#FFFFFF" width="40">产品</td>
                <td bgcolor="#FFFFFF" width="40">数量</td>
                <td bgcolor="#FFFFFF" width="60">价格</td>
                <td bgcolor="#FFFFFF" width="100">时间</td>
                <td bgcolor="#FFFFFF" width="80">是否支付</td>
                <td bgcolor="#FFFFFF" width="80">是否发货</td>
                <td bgcolor="#FFFFFF" width="60">是否收货</td>
                <td bgcolor="#FFFFFF" width="60">收货地址</td>
                <td bgcolor="#FFFFFF" width="100">操作</td>
            </tr>
            <?php if(is_array($select)): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="content" align="center">
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["order_id"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["order_orderid"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["user_realname"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["pro_name"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["order_sub_number"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["order_price"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list["order_time"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list[order_ispay] == 1) ? "已支付" : "未支付";?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list[order_sub_issend] == 1 ) ? "已发货" : "未发货";?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($list[order_sub_istake] == 1) ? "已收货" : "未收货";?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo (subtext($list["rec_area"],10)); ?></td>
                    <td bgcolor="#FFFFFF" id="oper">&nbsp;
                        <?php if(($list["order_ispay"]) == "1"): if(($list["order_sub_issend"]) == "0"): ?><input type="hidden" value="<?php echo ($list["rec_id"]); ?>" id="rec_id">
                                <input type="hidden" value="<?php echo ($list["rec_area"]); ?>" id="rec_area">
                                <button value="<?php echo ($list["order_orderid"]); ?>" class="send btn btn-primary" data-toggle="modal" data-target="#myModal">发货</button>&nbsp;<?php endif; endif; ?> 
                        <?php if(($list["order_sub_issend"]) == "1"): if(($list["order_sub_istake"]) == "0"): ?><a href="/lvnong/lvnong_item/lvnong/Admin/Order/sqllogistics/orderId/<?php echo ($list["order_orderid"]); ?>" target="center">查看物流</a>&nbsp;<?php endif; endif; ?>
                            <a href="/lvnong/lvnong_item/lvnong/Admin/Order/ordersub/orderId/<?php echo ($list["order_orderid"]); ?>" target="center">详情</a>
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

	<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
               发货（Modal）
            </h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="/lvnong/lvnong_item/lvnong/Admin/Order/sendorder" class="form-horizontal" role="form">
              <div class="form-group" align="center">
                <label for="inputEmail3" class="col-sm-2 control-label">订单单号</label>
                <div class="col-xs-3">
                  <input type="text" class="form-control" id="order_id" name="order_id" required>
                </div>
              </div>
             
            <div class="form-group" align="center">
                <label for="inputEmail3" class="col-sm-2 control-label">收货地址</label>
                <div class="col-xs-3">
                  <input type="text" class="form-control" id="l_addressfull" name="l_addressfull" required readonly>
                  <input type="hidden" class="form-control" id="l_addressid" name="l_addressid" required>
                </div>
              </div>



            <div class="form-group" align="center">
                <label for="inputEmail3" class="col-sm-2 control-label">快递公司</label>
                <div class="col-xs-3">
                  <input type="text" class="form-control" id="sender" name="sender"required
                  >
                </div>
              </div>
                            <div class="form-group" align="center">
                <label for="inputEmail3" class="col-sm-2 control-label">快递单号</label>
                <div class="col-xs-3">
                  <input type="text" class="form-control" id="send_code" name="sebd_code" required
                  >
                </div>
              </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                  <button type="submit" class="btn btn-primary">发货</button>
                </div>
              </div>
            </form>
         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">
               关闭
            </button>
         </div>

      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
   $(function () { $('#myModal').modal('hide')})});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".send").click(function () {
            var bu = $(this).attr("value");  
            $("#order_id").val(bu);
            var rec_id = $('#rec_id').attr("value");  //地址编号
            var rec_area = $('#rec_area').attr("value");  //详细地址
            $("#l_addressfull").val(rec_area);
            $("#l_addressid").val(rec_id);
        });
    });
</script>
<!--     <div style="width:1150px; height:50px; line-height:50px;">
    <form method="POST" action="/lvnong/lvnong_item/lvnong/Admin/Order/whorderlist">
    <table>
        <tr>
            <td>订单号：</td>
            <td>
                <input type="text" name="orderid" placeholder="请输入订单编号"  
                onmouseover="this.style.borderColor='#F9F9F9';this.style.backgroundColor='#DFDFDF'" style="width:120px; height:21px;" 
                onmouseout="this.style.borderColor='#F9F9F9';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black">
            </td>
            <td>购买用户：</td>
            <td>
                <input type="text" name="username" placeholder="请输入用户名称" 
                onmouseover="this.style.borderColor='#F9F9F9';this.style.backgroundColor='#DFDFDF'" style="width:120px; height:21px;" 
                onmouseout="this.style.borderColor='#F9F9F9';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black">
            </td>
            <td>购买产品：</td>
            <td>
                <input type="text" name="proname" placeholder="请输入购买产品" 
                onmouseover="this.style.borderColor='#F9F9F9';this.style.backgroundColor='#DFDFDF'" style="width:120px; height:21px;" 
                onmouseout="this.style.borderColor='#F9F9F9';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black">
            </td>
            <td>订单状态：</td>
            <td>
                <select name="stateId" style="width:120px; height:25px;">
                    <option value="">请选择...</option>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><option value="<?php echo ($list["order_state_id"]); ?>"><?php echo ($list["order_state_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
            <td>
                <input type="submit" value="查询">
            </td>
        </tr>
    </table>
    </form>
</div> -->
    

</body>
</html>