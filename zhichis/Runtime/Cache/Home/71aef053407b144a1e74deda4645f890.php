<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
  <title>知吃氏</title>
  <link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/css/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/css/index.css">
  <link rel="stylesheet" type="text/css" href="/lvnong_item/lvnong/Public/css/temp.css"/>
  <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/fastclick.js"></script>
  <script type="text/javascript">
      window.addEventListener('load', function() {
          FastClick.attach(document.body);
      }, false);
  </script>
  <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/zhichis.js"></script>
  <script type="text/javascript" src="/lvnong_item/lvnong/Public/js/touchslider.js"></script>
  <script type="text/javascript">
        $(function(){
            $(".container2 .content").click(function(){
                $(this).addClass("shake");
                var set = setTimeout(function(){
                    $(".container2 .content").removeClass("shake");
                },1500)
            })
        })
  </script>
</head>
<body>
  <!--返回顶部-->
  <!--<a class="gotoTop" id="gotop" href="#"><img src="images/top.png" alt=""/></a>-->

  <!-- 轮播 -->
  <div class="banner">
    <div class='swipe'>
      <ul id='slider'>

      <li style='display:block'><a href="/lvnong_item/lvnong/HOME/Page/ht.html"><img src="/lvnong_item/lvnong/Public/img/banner_ht.jpg" alt="轮播图一" /></a></li>
      <li><a href="/lvnong_item/lvnong/HOME/Page/ht.html"><img src="/lvnong_item/lvnong/Public/img/banner_ht.jpg" alt="轮播图二" /></a></li>
      <li><a href="/lvnong_item/lvnong/HOME/Page/ht.html"><img src="/lvnong_item/lvnong/Public/img/banner_ht.jpg" alt="轮播图三" /></a></li>
      </ul>
        <div id="pagenavi" class="swipe_tab">
        <a href="#" class="active">●</a>
        <a href="#">●</a>
        <a href="#">●</a>
      </div>
      <div class="search_box">
        <input type="text" placeholder="输入商品名称">
      </div>
    </div>
  </div>

  <!-- container1 -->
  <div class="container1">
      <a href="/lvnong_item/lvnong/HOME/Page/px.html"><div class="container1-con1">
          <div class="content">
              <img src="/lvnong_item/lvnong/Public/img/cont1-1.png" alt="产品图"/>
              <h2>荆州螃蟹</h2>
              <p>荆州螃蟹,世界闻名，好吃！</p>
          </div>
      </div></a>
      <div class="container1-con2">
          <a href="/lvnong_item/lvnong/HOME/Page/yg.html"><div class="content1">
              <img src="/lvnong_item/lvnong/Public/img/cont1-2.png" alt="产品图"/>
              <div class="text">
                  <h2>荆州鱼糕</h2>
                  <p>荆州鱼糕,没吃过吧</p>
              </div>
          </div></a>
          <a href="/lvnong_item/lvnong/HOME/Page/ht.html"><div class="content2">
              <img src="/lvnong_item/lvnong/Public/img/cont1-3.png" alt="产品图"/>
              <div class="text">
                  <h2>麻阳黄桃</h2>
                  <p>荆州黄桃,世界闻名</p>
              </div>
          </div></a>
      </div>
  </div>

  <!-- container2 -->
  <div class="container2">
      <a href="/lvnong_item/lvnong/HOME/Page/yg.html"><div class="content shakes">
          <img src="/lvnong_item/lvnong/Public/img/cont2-1.png" alt="产品图"/>
          <div class="text">
              <h2>荆州鱼糕</h2>
              <p>知吃氏美味齐分享!</p>
          </div>
      </div></a>
      <a href="/lvnong_item/lvnong/HOME/Page/ht.html"><div class="content mg  shakes">
          <img src="/lvnong_item/lvnong/Public/img/cont2-2.png" alt="产品图"/>
          <div class="text">
              <h2>麻阳黄桃</h2>
              <p>知吃氏美味齐分享!</p>
          </div>
      </div></a>
      <a href="/lvnong_item/lvnong/HOME/Page/px.html"><div class="content  shakes">
          <img src="/lvnong_item/lvnong/Public/img/cont2-3.png" alt="产品图"/>
          <div class="text">
              <h2>荆州螃蟹</h2>
              <p>知吃氏美味齐分享!</p>
          </div>
      </div></a>
      <a href="/lvnong_item/lvnong/HOME/Page/yd.html"><div class="content mgtop  shakes">
          <img src="/lvnong_item/lvnong/Public/img/cont2-4.png" alt="产品图"/>
          <div class="text">
              <h2>笔架鱼肚</h2>
              <p>知吃氏美味齐分享!</p>
          </div>
      </div></a>
      <a href="/lvnong_item/lvnong/HOME/Page/mj.html"><div class="content mg mgtop  shakes">
          <img src="/lvnong_item/lvnong/Public/img/cont2-5.png" alt="产品图"/>
          <div class="text">
              <h2>雪峰蜜桔</h2>
              <p>知吃氏美味齐分享!</p>
          </div>
      </div></a>
      <div class="content mgtop shakes">
          <img src="/lvnong_item/lvnong/Public/img/cont2-6.png" alt="产品图"/>
          <div class="text">
              <h2>了解详情…</h2>
              <p>知吃氏美味齐分享!</p>
          </div>
      </div>
  </div>

  <!--container3-->
  <div class="container3">
      <a href="/lvnong_item/lvnong/HOME/News/news_a.html"><div class="content">
          <img src="/lvnong_item/lvnong/Public/img/cont3-1.png" alt="产品图"/>
          <div class="text">
              <h2>笔架鱼肚的营养价值<span>></span></h2>
              <p>笔架鱼肚的营养价值</p>
          </div>
      </div></a>
      <a href="/lvnong_item/lvnong/HOME/News/news_b.html"><div class="content" style="margin-top: 2vw">
          <img src="/lvnong_item/lvnong/Public/img/cont3-2.png" alt="产品图"/>
          <div class="text">
              <h2>雪峰蜜桔的营养价值<span>></span></h2>
              <p>雪峰蜜桔的营养价值</p>
          </div>
      </div></a>
  </div>

  <!--container4-->
  <div class="container4">
      <div class="container4-left">
          <img src="/lvnong_item/lvnong/Public/img/cont4-1.png" alt="图片"/>
      </div>
      <div class="container4-right">
          <img class="zcslogo" src="/lvnong_item/lvnong/Public/img/cont4-2.png" alt="知吃氏logo"/>
          <div class="text">
              <a href="#"><img src="/lvnong_item/lvnong/Public/img/more.png" alt="more"/></a>
              <p>前往知吃氏，感受美好、<span>新鲜</span>、</p>
              <p><span>健康</span>带来的美好</p>
          </div>
      </div>
  </div>

  <div class="zw"></div>

  <!--m-footer-->
  <footer class="m-footer">
      <div class="content">
          <a href="/lvnong_item/lvnong/HOME/Cart/cart.html"><div class="buyCart">加入购物车</div></a>
          <a href="/lvnong_item/lvnong/HOME/User/individual.html"><div class="personal">个人中心</div></a>
      </div>
  </footer>

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