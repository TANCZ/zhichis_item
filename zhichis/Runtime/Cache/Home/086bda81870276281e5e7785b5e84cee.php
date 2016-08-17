<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
  <title>首页</title>
  <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL?>index.css">
  <script type="text/javascript" src="<?php echo JS_URL?>touchslider.js"></script>
</head>
<body>
  <!--返回顶部-->
  <a class="gotoTop" id="gotop" href="#"><img src="<?php echo IMG_URL?>top.png" alt=""/></a>
  <!-- 轮播 -->
  <div class="banner">
    <div class='swipe'>
      <ul id='slider'>
      <li style='display:block'><img src="<?php echo IMG_URL?>banner.jpg" alt="" /></li>
      <li><img src="<?php echo IMG_URL?>banner2.jpg" alt="" /></li>
      <li><img src="<?php echo IMG_URL?>banner3.jpg" alt="" /></li>
      </ul>
        <div id="pagenavi" class="swipe_tab">
        <a href="#" class="active">●</a>
        <a href="#">●</a>
        <a href="#">●</a>
      </div>
      <div class="search_box">
        <input type="text" placeholder="请输入搜索内容">
      </div>
    </div>
  </div>
  <!-- 小导航 -->
  <div class="clearfix"></div>
  <div class="nav_box">
    <div class="box1">
      <ul>
        <li><a href="shop.html">农家土特产</a></li>
        <li class="top"><a href="#">我是一只小猪</a></li>
      </ul>
    </div>
    <div class="box2">
      <ul>
        <li><a href="#">农家土特产</a></li>
        <li class="top"><a href="#">我是一只小猪</a></li>
      </ul>
    </div>
  </div>
  <div class="clearfix"></div>
  <!-- 内容盒子 -->
  <div class="container_box">
    <div class="container1_box">
        <div class="c_box1">
          <img class="img1" src="<?php echo IMG_URL?>1F.png" alt="">
          <h2>今日特卖</h2>
        <div class="clearfix"></div>
          <em>提供实惠优质健康</em>
          <img class="img2" src="<?php echo IMG_URL?>mango.jpg" alt="">
        </div>
        <div class="c_box2">
          <div class="c_box2_l">
            <h2>一只好吃的小猪</h2>
            <p>实惠健康找绿农坊</p>
          </div>
          <div class="c_box2_r">
            <img class="pork" src="<?php echo IMG_URL?>pork.jpg" alt="">
            <img class="tm" src="<?php echo IMG_URL?>tm.png" alt="">
            <span>小猪好好吃!</span>
          </div>
        </div>
        <div class="c_box3">
          <div class="c_box3_l">
            <h2>一只小鸭子</h2>
            <p>实惠 优质 健康</p>
            <img class="pork" src="<?php echo IMG_URL?>pork.jpg" alt="">
            <img class="tm" src="<?php echo IMG_URL?>tm.png" alt="">
            <span>小猪好好吃!</span>
          </div>
          <div class="c_box3_r">
            <h2>一只小羊</h2>
            <p>实惠 优质 健康</p>
            <img class="pork" src="<?php echo IMG_URL?>pork.jpg" alt="">
            <img class="tm" src="../../Public/img/tm.png" alt="">
            <span>小猪好好吃!</span>
          </div>
        </div>
      </div>
    </div>
  <!-- 热销推荐 -->
    <div class="clearfix"></div>
      <div class="container_rxtj">
        <img src="images/2F.png" alt="">
        <h2>热销推荐</h2>
      </div>
    <div class="clearfix"></div>
    <div class="container2">
      <div class="container_f">
        <figure class="figure1">
          <figcaption>我很好吃哦哦</figcaption>
          <p>最新上市</p>
          <p>开启味蕾</p>
          <img src="<?php echo IMG_URL?>rxtj_b.jpg">
        </figure>
         <figure class="figure2">
          <figcaption>我是很不错的
          <p>最新上市</p>
          <p>开启味蕾</p>
          </figcaption>
          <img src="<?php echo IMG_URL?>rxtj_s.jpg">
        </figure>
        <figure class="figure3">
          <figcaption>我是很不错的
          <p>最新上市</p>
          <p>开启味蕾</p>
          </figcaption>
          <img src="<?php echo IMG_URL?>rxtj_s.jpg">
        </figure>
      </div>
    </div>
   <div class="clearfix"></div>
  <!--特色推荐-->
   <div class="container3">
      <div class="container3_tstj">
        <img src="<?php echo IMG_URL?>3F.png" alt="">
        <h2>特色推荐</h2>
      </div>
      <div class="clearfix"></div>
      <div class="container3_yj">
        <img class="left_img" src="<?php echo IMG_URL?>yangsheng.jpg" alt=""><!--
     --><img class="right_img" src="<?php echo IMG_URL?>yangsheng.jpg" alt="">
      </div>
   </div>
    <div class="clearfix"></div>

    <!--养生之道-->
    <div class="container_yszd">
      <div class="container_yszd_l">
        <img src="<?php echo IMG_URL?>yszd1.jpg">
      </div><!--
      --><div class="container_yszd_r">
        <img class="yszd_img" src="<?php echo IMG_URL?>yszd.jpg">
        <img class="more" src="<?php echo IMG_URL?>more.jpg" alt="链接"/>
        <div class="clearfix"></div>
         <div class="container_yszd_r_text">
           <p class="p1">前往时间暂停的角落，感受<span>新鲜</span></p>
           <p class="p2"><span>健康</span>带来的美好</p>
           <div class="clearfix"></div>
           <a href="#"><p class="p3">更多绿农坊产品</p></a>
         </div>
       </div>
    </div>
  <div class="clearfix"></div>
  <!-- 导航 -->
  <div class="zw"></div>
<footer class="m_footer">
    <ul class="img_list">
      <li class="active"><a href="#"><img src="<?php echo IMG_URL?>foot1_active.png">
              <p>首页</p>
          </a></li><!--
      --><li><a href="#"><img src="<?php echo IMG_URL?>foot2.png">
              <p>商品</p>
          </a></li><!--
      --><li><a href="#"><img src="<?php echo IMG_URL?>foot3.png">
              <p>购物</p>
          </a></li><!--
      --><li><a href="#"><img src="<?php echo IMG_URL?>foot4.png">
              <p>我的</p>
          </a></li>
    </ul>
  </footer>
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