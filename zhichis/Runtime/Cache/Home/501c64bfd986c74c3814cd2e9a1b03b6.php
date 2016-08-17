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
    <header class="c-header">
        <p class="Del-btn">删除选中</p>
    </header>

    <div class="cont1">
        <p>购物车空空如也</p>
        <p>来挑几件好货吧!</p>
    </div>
    <div class="cont2">
        <img src="/lvnong_item/lvnong/Public/img/none.png" alt="购物车"/>
    </div>
    <div class="cont3">
        <a href="index.html">亲,去看看商品吧!</a>
    </div>

    <!--footer-->
    <footer class="c-footer">

        <div class="check-all">
            <input type="checkbox" id="checkAll"/>
            <label class="checkAll-label" for="checkAll">全选</label>
        </div>

        <div class="much">
            <p class="much-p1">总价:<span>￥<span class="">0.00</span></span></p>
            <p class="much-p2">(共<span class="num">2</span>件)</p>
        </div>

        <a href="oder.html"><input class="buyIt" type="button" value="结算"/></a>
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
    </script>
</body>
</html>