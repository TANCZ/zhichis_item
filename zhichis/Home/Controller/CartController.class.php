<?php
namespace Home\Controller;

use Think\Controller;

class CartController extends Controller
{

    public function _initialize()
    {
        //引入WxPayPubHelper
        vendor('WxPayPubHelper.WxPayPubHelper');
        if (!isset($_SESSION['user_id'])) {
            //$this -> redirect(GROUP_NAME."/")
            $this->redirect(Home . "/index/index");
        }
    }

    //查询购物车信息
    public function cart()
    {
        $list = D('order');

        //查询用户未结算的订单
        $prowh = array('o.user_id' => session('user_id'), 'sub.order_sub_ispay' => '0');
        $pro = $list->table('zhichis_order o')
            ->join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
            ->join('zhichis_user u on u.user_id = o.user_id')
            ->join('zhichis_pro p on p.pro_id = sub.pro_id')
            ->where($prowh)
            ->field('sub.order_number,sub.pro_id,p.pro_name,p.pro_spec,p.pro_img,p.pro_price,sub.order_sub_number')
            ->select();
        $this->assign('select', $pro);
        $this->assign('empty', '<div class="cont1"><p>购物车空空如也！</p><p>来挑几件好货吧!</p></div><div class="cont2"><img src="http://zhichis.com/zhichis_item/zhichis/public/img/car.png" alt="购物车"/></div><div class="cont3"><a href="http://zhichis.com/zhichis_item/zhichis/home/index/index">亲,去看看商品吧!</a></div>');
        $this->display();

    }

    //商品支付信息
    public function cartpay()
    {
        $list = M('order');
        $user = M('user');

        //修改订单总数

        //查询选择的商品信息
        $prowh = array('o.user_id' => session('user_id'), 'sub.order_sub_ispay' => '0', 'sub.order_buy' => '1');
        $result = $list->table('zhichis_order o')
            ->join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
            ->join('zhichis_user u on u.user_id = o.user_id')
            ->join('zhichis_pro p on p.pro_id = sub.pro_id')
            ->where($prowh)
            ->field('p.pro_id,p.pro_name,p.pro_price,p.pro_spec,p.pro_img,o.order_number,sub.order_sub_number,p.pro_price')
            ->select();

        //计算订单价格
        $number = 0.00;
        $order_number = "";
        foreach ($result as $item) {
            $order_number = $item['order_number'];
            $num = $item['order_sub_number'] * (double)$item['pro_price'];
            (double)$number += $num;
        }

        $data = array('number' => $number, 'order_number' => $order_number);

        //查询收货地址
        $wh = array('u.user_openid' => session('wx_openid'), 'r.rec_isdef' => '1');
        $rs = $user->table('zhichis_user u')->join('zhichis_recaddress r on u.user_id = r.user_id')->where($wh)->field('r.rec_name,r.rec_phone,u.user_aera,r.rec_province,r.rec_city,r.rec_area,r.rec_deta,r.rec_isdef')->find();


        //使用jsapi接口
        $jsApi = new \JsApi_pub();

        //=========步骤1：网页授权获取用户openid============
        //通过code获得openid
        if (!isset($_GET['code'])) {
            //触发微信返回code码
            $url = $jsApi->createOauthUrlForCode(C('WxPayConf_pub.JS_API_CALL_URL'));
            Header("Location: $url");
        } else {
            //获取code码，以获取openid
            $code = $_GET['code'];
            $jsApi->setCode($code);
            $openid = $jsApi->getOpenId();
        }

        //=========步骤2：使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();

        //设置统一支付接口参数
        //设置必填参数
        //appid已填,商户无需重复填写
        //mch_id已填,商户无需重复填写
        //noncestr已填,商户无需重复填写
        //spbill_create_ip已填,商户无需重复填写
        //sign已填,商户无需重复填写
        $unifiedOrder->setParameter("openid", $openid);//商品描述
        $unifiedOrder->setParameter("body", "知吃氏商品");//商品描述
        //自定义订单号，此处仅作举例
        $timeStamp = time();
        $out_trade_no = C('WxPayConf_pub.APPID') . $timeStamp;
        $unifiedOrder->setParameter("out_trade_no", $out_trade_no);//商户订单号
        $unifiedOrder->setParameter("total_fee", ($data['number'] * 100));//总金额($data['number'] * 100)
        $unifiedOrder->setParameter("notify_url", C('WxPayConf_pub.NOTIFY_URL'));//通知地址
        $unifiedOrder->setParameter("trade_type", "JSAPI");//交易类型
        //非必填参数，商户可根据实际情况选填
        //$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
        //$unifiedOrder->setParameter("device_info","XXXX");//设备号
        //$unifiedOrder->setParameter("attach","XXXX");//附加数据
        //$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
        //$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
        //$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
        //$unifiedOrder->setParameter("openid","XXXX");//用户标识
        //$unifiedOrder->setParameter("product_id","XXXX");//商品ID

        $prepay_id = $unifiedOrder->getPrepayId();
        //=========步骤3：使用jsapi调起支付============
        $jsApi->setPrepayId($prepay_id);

        $jsApiParameters = $jsApi->getParameters();

        $this->assign('jsApiParameters', $jsApiParameters);
        //echo $jsApiParameters;

        $this->assign('select', $result);
        $this->assign("data", $data);
        $this->assign('rs', $rs);
        $this->display();
    }


    public function notify()
    {
        //使用通用通知接口
        $notify = new \Notify_pub();

        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $notify->saveData($xml);

        //验证签名，并回应微信。
        //对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
        //微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
        //尽可能提高通知的成功率，但微信不保证通知最终能成功。
        if ($notify->checkSign() == FALSE) {
            $notify->setReturnParameter("return_code", "FAIL");//返回状态码
            $notify->setReturnParameter("return_msg", "签名失败");//返回信息
        } else {
            $notify->setReturnParameter("return_code", "SUCCESS");//设置返回码
        }
        $returnXml = $notify->returnXml();
        echo $returnXml;

        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======

        //以log文件形式记录回调信息
        //         $log_ = new Log_();
        $log_name = __ROOT__ . "/Public/notify_url.log";//log文件路径

        log_result($log_name, "【接收到的notify通知】:\n" . $xml . "\n");

        if ($notify->checkSign() == TRUE) {
            if ($notify->data["return_code"] == "FAIL") {
                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name, "【通信出错】:\n" . $xml . "\n");
            } elseif ($notify->data["result_code"] == "FAIL") {
                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name, "【业务出错】:\n" . $xml . "\n");
            } else {
                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name, "【支付成功】:\n" . $xml . "\n");

                //openid
                $openid = $notify->data['openid'];
                //交易金额，单位分
                $price = $notify->data['total_fee'];
            }

            //商户自行增加处理流程,
            //例如：更新订单状态
            //例如：数据库操作
            //例如：推送支付完成信息
        }
    }

    public function success()
    {

        $order = D('order');
        //根据用户编号查询订单单号
        $userid = session('user_id');

        //$wh = array('user_id' => $userid);
        $whuser = array('user_id' => $userid);
        $order_number = $order->where($whuser)->field('order_number')->find();

        if (!empty($order_number)) {
            $sub = D('order_sub');
            $wh = array('order_number' => $order_number['order_number'], 'order_buy' => '1');
            $data = array('order_sub_ispay' => '1', 'order_sub_ispaytime' => date('Y-m-d', time()), 'order_buy' => '2');
            $rs = $sub->where($wh)->setField($data);
        }
        $this->display();
    }

    //取消支付商品
    public function outpro()
    {
        $pro_id = $_GET['proid'];
        $ordernumber = $_GET['ordernumber'];
        echo "商品编号：" . $pro_id . "<br>";
        echo "订单编号：" . $ordernumber;

    }


    //添加收货地址
    public function add()
    {
        //实例化
        $list = D('recaddress');

        //获取用户提交信息
        $userid = session('user_id');//用户编号
        $name = $_POST['rec_name'];
        $phone = $_POST['rec_phone'];
        $province = $_POST['rec_province'];
        $city = $_POST['rec_city'];
        $area = $_POST['rec_area'];
        $provinceid = $_POST['rec_provinceid'];
        $cityid = $_POST['rec_cityid'];
        $areaid = $_POST['rec_areaid'];
        $recdata = $_POST['rec_deta'];

        //修改用户已默认的收货地址
        $wh = array('user_id' => $userid, 'rec_isdef' => '1');
        $data = array('rec_isdef' => '0');
        $rs = $list->where($wh)->save($data);

        //修改成功开始添加数据
        $res = array('user_id' => $userid, 'rec_name' => $name, 'rec_phone' => $phone, 'rec_provinceid' => $provinceid, 'rec_province' => $province, 'rec_cityid' => $cityid, 'rec_city' => $city, 'rec_areaid' => $areaid, 'rec_area' => $area, 'rec_deta' => $recdata, 'rec_isdef' => '1');
        $resurt = $list->data($res)->add();
        $this->redirect('cart/cartpay');
    }

    public function Nowpay()
    {
        if (IS_POST) {
            $order = D('order_sub');
            //获取订单信息
            $order_number = $_POST['ordernumber'];  //订单编号
            $check = $_POST['subChk'];              //商品编号
            $number = $_POST['number'];             //购买数量
            $total = $_POST['total'];               //订单总价

            //修改未完成的订单
            $Whbuy = array('order_number' => $order_number, 'order_buy' => '1');
            $buy = $order->where($Whbuy)->setField('order_buy', '0');
            //循环商品获取商品详情
            foreach ($check as $k => $v) {
                $wh = array("order_number" => $order_number, 'pro_id' => $v);
                $data = array('order_sub_number' => $number[$v], 'order_buy' => '1');
                $rs = $order->where($wh)->setField($data);
            }
            $this->redirect('cart/cartpay');
        } else {
            $this->display();
        }
    }
}