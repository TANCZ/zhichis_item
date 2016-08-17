<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>购物车</title>
    <link rel="stylesheet" href="/zhichis_item/zhichis/Public/css/cart.css"/>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/fastclick.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            FastClick.attach(document.body);
        }, false);</script>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/zhichis.js"></script>
</head>
<body>
    <div class="zw1"></div>
    <!--header-->
    <header class="c-header" style="z-index: 20;">
        <p class="Del-btn">删除选中</p>
    </header>

    <!--<div class="cont1">-->
        <!--<p>购物车空空如也</p>-->
        <!--<p>来挑几件好货吧!</p>-->
    <!--</div>-->
    <!--<div class="cont2">-->
        <!--<img src="/zhichis_item/zhichis/Public/img/none.png" alt="购物车"/>-->
    <!--</div>-->
    <!--<div class="cont3">-->
        <!--<a href="index.html">亲,去看看商品吧!</a>-->
    <!--</div>-->
    <!--container-->
    <div class="container">
        <!--content-->
        <?php if(is_array($select)): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="content mg" id="box0">
                <div class="check">
                    <input type="checkbox" value="0" id="shoping1" name="subChk" class="check-shoping"/>
                    <label class="check-label" for="shoping1"></label>
                </div>
                <img class="shoping-img" src="/zhichis_item/zhichis/Public/img/ht.jpg" alt="黄桃"/>
                <div class="shoping-text">
                    <h2 class="shoping-title"><?php echo ($list["pro_name"]); ?></h2>
                    <p class="shoping-p1">规格:<?php echo ($list["pro_spec"]); ?></p>
                    <p class="shoping-p2">￥<span class="each"><?php echo ($list["pro_price"]); ?></span></p>
                    <p class="shoping-p3">数量: <span class="pr-min">&#8211;</span><input class="pr-num" type="text" name="number" value="<?php echo ($list["order_sub_number"]); ?>"/><span class="pr-add">+</span></p>
                </div>
            </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </div>

    <div class="zw"></div>
    <!--footer-->
    <footer class="c-footer">

        <div class="check-all">
            <input type="checkbox" id="checkAll"/>
            <label class="checkAll-label" for="checkAll">全选</label>
        </div>

        <div class="much">
            <p class="much-p1">总价:<span>￥<span class="price">0.00</span></span></p>
            <p class="much-p2">(共<span class="num">5</span>件)</p>
        </div>

        <input class="buyIt" type="button" value="结算" onclick="BuyIt()"/>
    </footer>

    <script>
        window.onload = function(){
            var oBtn = document.getElementById("checkAll");
            var aInput = document.getElementsByClassName("check-shoping");
            oBtn.onclick = function(){
                for(var i = 0; i < aInput.length; i++){
                    if(oBtn.checked == true){
                        aInput[i].checked = true;
                    }else{
                        aInput[i].checked = false;
                    }
                }
            }
        }
        function BuyIt(){
            if($('input[name=subChk]').is(':checked')){
                location.href = "/zhichis_item/zhichis/home/Cart/cartpay.html";
            }else{
                alert('没有选中商品');
            }
        }
    </script>
</body>
</html>