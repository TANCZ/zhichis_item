<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>确认订单</title>
    <link rel="stylesheet" href="/zhichis_item/zhichis/Public/css/animate.min.css"/>
    <link rel="stylesheet" href="/zhichis_item/zhichis/Public/css/checkorder.css"/>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/fastclick.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            FastClick.attach(document.body);
        }, false);</script>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/zhichis.js"></script>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/Area.js"></script>
    <script type="text/javascript" src="/zhichis_item/zhichis/Public/js/AreaData_min.js"></script>
    <script type="text/javascript">
        $(function (){
            initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '43', '0', '0');
        });

        //得到地区码
        function getAreaID(){
            var area = 0;
            if($("#seachdistrict").val() != "0"){
                area = $("#seachdistrict").val();
            }else if ($("#seachcity").val() != "0"){
                area = $("#seachcity").val();
            }else{
                area = $("#seachprov").val();
            }
            return area;
        }

        function showAreaID() {
            //地区码
            var areaID = getAreaID();
            //地区名
            var areaName = getAreaNamebyID(areaID) ;
            alert("您选择的地区码：" + areaID + "      地区名：" + areaName);
        }

        //根据地区码查询地区名
        function getAreaNamebyID(areaID){
            var areaName = "";
            if(areaID.length == 2){
                areaName = area_array[areaID];
            }else if(areaID.length == 4){
                var index1 = areaID.substring(0, 2);
                areaName = area_array[index1] + " " + sub_array[index1][areaID];
            }else if(areaID.length == 6){
                var index1 = areaID.substring(0, 2);
                var index2 = areaID.substring(0, 4);
                areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
            }
            return areaName;
        }


    </script>
</head>
<body>
    <div class="zw1"></div>

    <div class="o-header" style="border: none;position: fixed;left: 0;top: 0;z-index: 20;border-bottom: 1px solid #b2b2b2;">
        <p>商品信息</p>
    </div>

    <div class="container1">
        <img src="/zhichis_item/zhichis/Public/img/ht.jpg" alt="产品图"/>
        <div class="con1-text">
            <h2>麻阳黄桃</h2>
            <p class="p1">规格:10斤一箱</p>
            <p class="p2">数量：3</p>
            <p class="p3">单价：<span>138.00</span></p>
        </div>
        <p class="more-btn">></p>
    </div>

    <div class="o-header" style="margin-top: 2vw;">
        <p>支付方式</p>
    </div>
    <div class="container2">
        <div class="radChk">
            <input type="radio" id="pay1" name="subChk" class="check-shoping"/>
            <label class="check-label" for="pay1">微信支付</label>
        </div>
        <div class="radChk">
            <input type="radio" id="pay2" name="subChk" class="check-shoping" disabled="disabled" />
            <label class="check-label" for="pay2">朋友代付(暂未开通)</label>
        </div>
    </div>

    <div class="o-header-sp">
        <p>收货信息</p>
        <input class="arsBox" type="button" value="添加收货地址"/>
    </div>
        <?php if(($rs["rec_isdef"]) == "1"): ?><div class="container3">
                <p class="arsBox"><?php echo ($rs["rec_province"]); echo ($rs["rec_city"]); echo ($rs["rec_area"]); echo ($rs["rec_deta"]); ?></p>
            </div>
            <?php else: ?>
                <div class="container3">
                    <p class="arsBox">点击编辑收货地址</p>
                </div><?php endif; ?>
    <div class="container4">
        <form action="">
            <textarea name="message" id="message" placeholder="订单备注……"></textarea>
        </form>
    </div>

    <div class="container5">
        <p class="much-p1">总价:<span>￥<span class="">138.00</span></span></p><!-- price -->
        <input type="submit" value="提交"/>
    </div>

    <div class="zw"></div>

    <!--隐藏-->
    <div class="zhemu">
    </div>
    <div class="addNewArs">
        <form  method="POST" action="/zhichis_item/zhichis/Home/Cart/add">
        <header class="newArs-title"><span>新增地址<img id="off" src="/zhichis_item/zhichis/Public/img/off-btn.png" alt=""/></span></header>
        <div class="name">
            <p>收 货 人：</p>
            <input type="text" class="Arsinput needsclick" name="rec_name">
        </div>
        <fieldset id="city_china">
            <div class="name">
                <p>省 / 市：</p>
                <select id="seachprov" name="rec_provinceid" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>
            </div>
            <div class="name">
                <p>市 / 区：</p>
                <select id="seachcity" name="rec_cityid" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>
            </div>
            <div class="name">
                <p>县 / 区：</p>
                <select id="seachdistrict" name="rec_areaid"></select>
            </div>
        </fieldset>
            <input type="text" id="rec_province" name="rec_province">
            <input type="text" id="rec_city" name="rec_city">
            <input type="text" id="rec_area" name="rec_area">
        <div class="name">
            <p>详细地址：</p>
            <input type="text" class="Arsinput needsclick" name="rec_deta">
        </div>
        <div class="name">
            <p>联系电话：</p>
            <input type="tel" class="Arsinput needsclick" name="rec_phone">
        </div>
        <button class="Ars_sub" id="ars_sub" >保存并使用</button>
        </form>
    </div>
    <script type="text/javascript">
    $(function(){
            $('#ars_sub').click(function(){
               var prov = $("#seachprov").find("option:selected").text();
               var city = $("#seachcity").find("option:selected").text();
               var area = $("#seachdistrict").find("option:selected").text();
               $('#rec_province').val(prov);
               $('#rec_city').val(city);
               $('#rec_area').val(area);
            });
    });
    </script>
</body>
</html>