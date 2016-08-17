/**
 * Created by Administrator on 2016/7/17.
 */
window.addEventListener('load', function() {
          FastClick.attach(document.body);
      }, false);

$(function(){
    //弹窗
    function closebox(){
        $('.addNewArs').removeClass('animated fadeInUp').addClass('animated fadeOutDown');
        setTimeout(function(){
            $('.addNewArs').css({'display':'none'});
            $('.zhemu').css({'display':'none'});
        },300);
    }

    $('.arsBox').on("click",function(){
        $('.zhemu').css({'display':'block'});
        $('.addNewArs').css({'display':'block'}).removeClass('animated fadeOutDown').addClass('animated fadeInUp');
    });
    $('.zhemu').on("click",function(){closebox();});
    $('#off').on("click",function(){closebox();});

    //添加地址
    function Arscheck(){
        var name=$('.name input[name="name"]').val();
        var province=$('.province').val();
        var city=$('.city').val();
        var area=$('.area').val();
        var detail=$('.name input[name="detail"]').val();
        var tel=$('.name input[name="tel"]').val();
        if(name==""){
            $('.name input[name="name"]').focus()
            return false;
        }
        if(province=="0"){
            $('.province').focus()
            return false;
        }
        if(city=="0"){
            $('.city').focus()
            return false;
        }
        if($('.area').css('display')!=='none'){
            if(area=="0"){
                $('.area').focus()
                return false;
            }}
        if(detail==""){
            $('.name input[name="detail"]').focus()
            return false;
        }
        if(tel==""){
            $('.name input[name="tel"]').focus()
            return false;
        }
        $.ajax({
            type:'post',
            url:'class/ajax.php?act=NewArs',
            dataType:"json",
            data:{'name':name,'province':province,'city':city,'area':area,'detail':detail,'tel':tel},
            success: function(json){
                if(json.state=="success"){
                    var url=window.location.href;
                    var uurl=changeURLArg(''+url+'','Arsid',json.Arsid);
                    window.location.href=""+uurl+"";
                }else{alert("添加失败！请重试！");}
            }
            /*error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert(XMLHttpRequest.status);
             alert(XMLHttpRequest.readyState);
             alert(textStatus);} */
        });
    }

    //非空验证
    $('.Ars_sub').click(function(){
        if($('input[name=rec_name]').val() == ''){
            $('.msgContent').show(200).delay(1000).hide(200);
            $('.msg').html('请填写您的姓名！');
            return false;
        }
        else if($('#seachprov').find('option:selected').text() == '请选择'){
            $('.msgContent').show(200).delay(1000).hide(200);
            $('.msg').html('请选择所在省/市');
            return false;
        }
        else if($('#seachcity').find('option:selected').text() == '请选择'){
            $('.msgContent').show(200).delay(1000).hide(200);
            $('.msg').html('请选择所在市/区');
            return false;
        }
        else if($('#seachdistrict').find('option:selected').text() == '请选择'){
            $('.msgContent').show(200).delay(1000).hide(200);
            $('.msg').html('请选择所在县/区');
            return false;
        }
        else if($('input[name=rec_deta]').val() == ''){
            $('.msgContent').show(200).delay(1000).hide(200);
            $('.msg').html('请填写详细地址！');
            return false;
        }
        else if($('input[name=rec_phone]').val() == ''){
            $('.msgContent').show(200).delay(1000).hide(200);
            $('.msg').html('请填写手机号码！');
            return false;
        }
        else if(!(/^1[3|4|5|7|8]\d{9}$/.test($('input[name=rec_phone]').val()))){
            $('.msgContent').show(200).delay(1000).hide(200);
            $('.msg').html('手机格式不正确哦！');
            return false;
        }
        else{
            return true;
        }
    });

    $('.msgContent').click(function(){
        if($('.msgContent').css('display','block')){
            $('.msgContent').css('display','none');
        }
    });

    $('input').click(function(){
        if($('.msgContent').css('display','block')){
            $('.msgContent').css('display','none');
        }
    });

    $('select').click(function(){
        if($('.msgContent').css('display','block')){
            $('.msgContent').css('display','none');
        }
    });

    //商品数量
    $('.pr-min').each(function(){
        $(this).on('click',function(){
            if($(this).next('input').val()>1){
                $(this).next('input').val(parseInt($(this).next('input').val())-1);
            }
            if($(this).next('input').val()==1){$(this).css({'color':'#ccc'})}
            setTotal();GetCount();
        });
    });
    $('.pr-add').each(function(){
        $(this).on("click",function(){
            $(this).prev('input').val(parseInt($(this).prev('input').val())+1);
            if($(this).prev('input').val()>1){$(this).css({'color':'#000000'})}
            setTotal();GetCount();
        });
    });
    $('.pr-num').each(function(){
        $(this).focus(function(){
            $(this).val("");
            setTotal();GetCount();
        });
    });
    $('.pr-num').each(function(){
        $(this).blur(function(){
            if($(this).val()>1){$(this).prev('input').css({'color':'#000000'})}
            else{$(this).prev('input').css({'color':'#ccc'})}
            if(!(/^[1-9]\d*$/.test($(this).val()))){$(this).val("1");}
            setTotal();GetCount()
        });
    });

    function setTotal() {
        $('.tot').each(function(){
            $(this).html(parseInt($(this).parent().prev().find('span').text())*parseInt($(this).prev().prev().val()));
            $(this).parent().parent().prev().prev().find('.chk').next().val(parseInt($(this).prev().prev().val())*$(this).parent().prev().find('span').text());
        });
    }
    setTotal();


    //******************

    $(".pr-num").keyup(function(){
        $(this).val($(this).val().replace(/[^0-9]/g,''));
    }).bind("paste",function(){  //CTR+V事件处理
        $(this).val($(this).val().replace(/[^0-9]/g,''));
    }).css("ime-mode", "disabled"); //CSS设置输入法不可用

    //删除
        $('.Del-btn').click(function(){
        $('.chk').each(function(){
            if($(this).is(':checked')){
                $(this).parent().parent().parent().remove();
            }
        });
    })

});
