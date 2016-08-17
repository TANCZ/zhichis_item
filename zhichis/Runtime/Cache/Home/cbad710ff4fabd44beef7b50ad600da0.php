<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>购物车</title>
    <link rel="stylesheet" href="/lvnong_item/lvnong/Public/css/cart.css"/>
    <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/fastclick.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            FastClick.attach(document.body);
        }, false);</script>
    <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/zhichis.js"></script>
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
        <!--<img src="/lvnong_item/lvnong/Public/img/none.png" alt="购物车"/>-->
    <!--</div>-->
    <!--<div class="cont3">-->
        <!--<a href="index.html">亲,去看看商品吧!</a>-->
    <!--</div>-->
    <!--container-->
    <div class="container">
        <!--content-->
        <div class="content mg" id="box0">
            <div class="check">
                <input type="checkbox" value="0" id="shoping1" name="subChk" class="check-shoping"/>
                <label class="check-label" for="shoping1"></label>
            </div>
            <img class="shoping-img" src="/lvnong_item/lvnong/Public/img/ht.jpg" alt="黄桃"/>
            <div class="shoping-text">
                <h2 class="shoping-title">麻阳黄桃</h2>
                <p class="shoping-p1">规格:10斤一箱</p>
                <p class="shoping-p2">￥<span class="each">138.00</span></p>
                <p class="shoping-p3">数量: <span class="pr-min">&#8211;</span><input class="pr-num" type="text" name="number" value="1"/><span class="pr-add">+</span></p>
            </div>
        </div>

        <div class="content mg" id="box1">
            <div class="check">
                <input type="checkbox" value="1" id="shoping2" name="subChk" class="check-shoping"/>
                <label class="check-label" for="shoping2"></label>
            </div>
            <img class="shoping-img" src="/lvnong_item/lvnong/Public/img/yg.jpg" alt="鱼糕"/>
            <div class="shoping-text">
                <h2 class="shoping-title">荆州鱼糕</h2>
                <p class="shoping-p1">规格:500g</p>
                <p class="shoping-p2">￥<span class="each">138.00</span></p>
                <p class="shoping-p3">数量: <span class="pr-min-1">&#8211;</span><input class="pr-num-1" type="text" name="number" value="1"/><span class="pr-add-1">+</span></p>
            </div>
        </div>

        <div class="content mg" id="box2">
            <div class="check">
                <input type="checkbox" value="2" id="shoping3" name="subChk" class="check-shoping"/>
                <label class="check-label" for="shoping3"></label>
            </div>
            <img class="shoping-img" src="/lvnong_item/lvnong/Public/img/px.jpg" alt="螃蟹"/>
            <div class="shoping-text">
                <h2 class="shoping-title">荆州螃蟹</h2>
                <p class="shoping-p1">规格:1.5g~1.9g</p>
                <p class="shoping-p2">￥<span class="each">138.00</span></p>
                <p class="shoping-p3">数量: <span class="pr-min-2">&#8211;</span><input class="pr-num-2" type="text" name="number" value="1"/><span class="pr-add-2">+</span></p>
            </div>
        </div>

        <div class="content mg" id="box3">
            <div class="check">
                <input type="checkbox" value="3" id="shoping4" name="subChk" class="check-shoping"/>
                <label class="check-label" for="shoping4"></label>
            </div>
            <img class="shoping-img" src="/lvnong_item/lvnong/Public/img/yd.jpg" alt="鱼肚"/>
            <div class="shoping-text">
                <h2 class="shoping-title">笔架鱼肚</h2>
                <p class="shoping-p1">规格:128g</p>
                <p class="shoping-p2">￥<span class="each">138.00</span></p>
                <p class="shoping-p3">数量: <span class="pr-min-3">&#8211;</span><input class="pr-num-3" type="text" name="number" value="1"/><span class="pr-add-3">+</span></p>
            </div>
        </div>

        <div class="content mg" id="box4">
            <div class="check">
                <input type="checkbox" value="4" id="shoping5" name="subChk" class="check-shoping"/>
                <label class="check-label" for="shoping5"></label>
            </div>
            <img class="shoping-img" src="/lvnong_item/lvnong/Public/img/mj.jpg" alt="蜜桔"/>
            <div class="shoping-text">
                <h2 class="shoping-title">雪峰蜜桔</h2>
                <p class="shoping-p1">规格:5000g</p>
                <p class="shoping-p2">￥<span class="each">138.00</span></p>
                <p class="shoping-p3">数量: <span class="pr-min-4">&#8211;</span><input class="pr-num-4" type="text" name="number" value="1"/><span class="pr-add-4">+</span></p>
            </div>
        </div>

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
                location.href = "/lvnong_item/lvnong/home/Cart/checkorder.html";
            }else{
                alert('没有选中商品');
            }
        }
    </script>
</body>
</html>