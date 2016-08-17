<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
    <title>舌尖上的蜜桔</title>
    <link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/css/huangtao-page.css">
    <link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/css/temp.css"/>
    <link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/css/animate.min.css"/>
    <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/fastclick.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            FastClick.attach(document.body);
        }, false);</script>
    <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/touchslider.js"></script>
    <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/zhichis.js"></script>
</head>
<body>
<!--返回顶部-->
<!--<a class="gotoTop" id="gotop" href="#"><img src="images/top.png" alt=""/></a>-->

<!-- 轮播 -->
<div class="banner">
    <div class='swipe'>
        <ul id='slider'>
            <li style='display:block'><img src="/lvnong_item/lvnong/Public/img/banner_mj.jpg" alt="轮播图一" /></li>
            <li><img src="/lvnong_item/lvnong/Public/img/banner1.jpg" alt="轮播图二" /></li>
        </ul>
        <div id="pagenavi" class="swipe_tab">
            <a href="#" class="active">●</a>
            <a href="#">●</a>
        </div>
    </div>
</div>

<!--container1-->
<div class="container1">
    <div class="content">
        <div class="container1-text">
            <p class="p1">知吃氏 -  洞口雪峰蜜桔</p>
            <p class="p2 fs">促销价：<span>￥138.00</span></p>
            <p class="p2 ls">原价：<s>￥158.00</s></p>
            <p class="p2 ls">已销：898件</p>
        </div>
        <div class="container1-input">
            <span class="pr-min">-</span>
            <input class="pr-num" type="text" name="number" value="1"/>
            <span class="pr-add">+</span>
        </div>
    </div>
</div>

<!--container2-->
<div class="container2">
    <div class="content">
        <p class="choose-name">选择规格</p>
        <div class="choose-list">
            <input type="radio" name="choose" id="rad1" checked/><label class="lab1" for="rad1">5000g</label>
        </div>
    </div>
</div>

<!--container3-->
<div class="container3">
    <div class="content">
        <p class="con3-title">图文详情</p>
    </div>
</div>

<!--container4-->
<div class="container4">
    <div class="content">
        <div class="product">商品介绍</div>
        <a href="index.html"><div class="gotoIndex">返回首页</div></a>
        <img class="page-img" src="/lvnong_item/lvnong/Public/img/miju-page.jpg" alt=""/>
    </div>
</div>

<div class="zw"></div>

<!--m-footer-->
<footer class="m-footer">
    <div class="content">
        <div class="buyCart">加入购物车</div>
        <a href="cart.html"><div class="personal">个人中心</div></a>
    </div>
</footer>

<div class="zhemu"></div>
<div id="pop"></div>

<div class="to_buy">

</div>

<!--banner-->
<script type="text/javascript">
    console=window.console || {dir:new Function(),log:new Function()};
    var active=0,
            as=document.getElementById('pagenavi').getElementsByTagName('a');
    for(var i=0;i<as.length;i++){
        (function(){
            var j=i;
            as[i].onclick=function(){
                t4.slide(j);
                return false;
            }
        })();
    }
    var t4=new TouchSlider('slider',{speed:1000, direction:0, interval:3000, fullsize:true,});
    t4.on('before',function(m,n){
        as[m].className='';
        as[n].className='active';
    });
    backTop=function (btnId){
        var btn=document.getElementById(btnId);
        var d=document.documentElement;
        var b=document.body;
        window.onscroll=set;
        btn.onclick=function (){
            btn.style.display="none";
            window.onscroll=null;
            this.timer=setInterval(function(){
                d.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);
                b.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);
                if((d.scrollTop+b.scrollTop)==0) clearInterval(btn.timer,window.onscroll=set);
            },10);
        };
        function set(){btn.style.display=(d.scrollTop+b.scrollTop>100)?'block':"none"}
    };
    backTop('gotop');

</script>

</body>
</html>