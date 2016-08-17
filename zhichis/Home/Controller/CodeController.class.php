<?php
    namespace Home\Controller;
    use Think\Controller;

    /**
    * 兑换码功能
    */
    class CodeController extends Controller
    {

        //电商糕兑换码
        public function yg_code(){
        	$this -> display();
        }

        //鱼肚兑换码
        public function yd_code()
        {
            $this -> display();
        }

        //兑换码页
        public function redeemcode()
        {

            $this -> display();
        }


        //提交兑换码
        public function Recode()
        {
            if (IS_POST) {
                $recode = M('redeemcode');
                $code = $_POST['code'];

                $wh = array('red_code' => $code);
                $result = $recode -> where($wh) -> field('red_id,pro_id,order_number,red_code,red_isuse') -> find();
                if ($result['red_isuse'] == '1') {
                    echo '1';
                }else if($result['pro_id'] == '2'){
                    $this-> redirect('code/yg_code',array('code'=>$code));
                }else if($result['pro_id'] == '5'){
                    $this-> redirect('code/yd_code',array('code'=>$code));
                }else{
                    echo "2";
                }

            }else{
                $this -> display();
            }
        }

        //提交订单
        public function addorder()
        {
        	if (IS_POST) {
                $order = D('order');
                $redeemcode = D('redeemcode');
                $code = $_POST['code'];
                $wh = array('red_code' => $code);
                $sel = $redeemcode -> where($wh) -> field('red_isuse') -> find();
                if($sel['red_isuse'] == 1){
                    $this -> success('兑换码已被使用',U('code/redeemcode'),3);
                }else{
                    //生成订单单号
                    $number = $this -> order_number();
                    $pro_id = $_POST['pro_id'];
                
                    $data = array('order_number' => $number,'user_id' => '0','order_time' => date('Y-m-d', time()),'order_price' => '0');
                    $rs = $order -> data($data) -> add();
                    if ($rs) {
                        $order_sub = D('order_sub');
                        $subdata = array('order_number' => $number,'pro_id' => $pro_id,'order_sub_number' => '1','order_sub_ispay' => '1','order_sub_ispaytime' => date('Y-m-d', time()),'order_sub_issend' => '0','order_sub_sendtime' => '0','order_sub_istake' => '0' ,'order_sub_taketime' => '0','rec_id' => '0' ,'order_sub_sender' => '','order_sub_sendcode' => '','order_buy' =>'2');
                        $result = $order_sub -> data($subdata) -> add();
                        if ($result) {
                            $red = array('order_number' => $number,'red_isuse'=>'1');
                            $resu = $redeemcode -> where($wh) -> setField($red);
                        }
                    }
                    $this -> success('订单提交成功，我们会尽快为您送货',U('code/redeemcode'),3);
                }
        	}else{
        		$this -> display();
        	}
        }

        //生成订单单号
        function order_number(){
            static $ORDERSN=array();                                        //静态变量
            $ors=date('ymd').substr(time(),-5).substr(microtime(),2,5);     //生成16位数字基本号
            if (isset($ORDERSN[$ors])) {                                    //判断是否有基本订单号
                $ORDERSN[$ors]++;                                           //如果存在,将值自增1
            }else{
                $ORDERSN[$ors]=1;
            }
            return $ors.str_pad($ORDERSN[$ors],2,'0',STR_PAD_LEFT);     //链接字符串
        }

        //添加收货地址
        public function addyg()
        {
        	//实例化
            $list = D('recaddress');

            //获取用户提交信息
            $code = $_POST['code'];
            $name = $_POST['rec_name'];
            $phone = $_POST['rec_phone'];
            $province = $_POST['rec_province'];
            $city = $_POST['rec_city'];
            $area = $_POST['rec_area'];
            $provinceid = $_POST['rec_provinceid'];
            $cityid = $_POST['rec_cityid'];
            $areaid = $_POST['rec_areaid'];
            $recdata = $_POST['rec_deta'];

            $res = array('user_id' => '0','rec_name' => $name,'rec_phone' => $phone,'rec_provinceid' => $provinceid,'rec_province' => $province,'rec_cityid' => $cityid,'rec_city' => $city,'rec_areaid' => $areaid,'rec_area' => $area,'rec_deta' => $recdata,'rec_isdef' => '1');
            $result = $list -> data($res) -> add();
            if ($result) {
           	    $redeemcode = D('redeemcode');
                $wh = array('red_code'=>$code);
                $rs = $redeemcode -> where($wh) -> setField('red_ressid',$result);
                $this-> redirect('code/yg_code',array('code'=>$code,'rec'=>$result));
            }
        }

        public function addyd()
        {
        	//实例化
            $list = D('recaddress');

            //获取用户提交信息
            $code = $_POST['code'];
            $name = $_POST['rec_name'];
            $phone = $_POST['rec_phone'];
            $province = $_POST['rec_province'];
            $city = $_POST['rec_city'];
            $area = $_POST['rec_area'];
            $provinceid = $_POST['rec_provinceid'];
            $cityid = $_POST['rec_cityid'];
            $areaid = $_POST['rec_areaid'];
            $recdata = $_POST['rec_deta'];

            $res = array('user_id' => '0','rec_name' => $name,'rec_phone' => $phone,'rec_provinceid' => $provinceid,'rec_province' => $province,'rec_cityid' => $cityid,'rec_city' => $city,'rec_areaid' => $areaid,'rec_area' => $area,'rec_deta' => $recdata,'rec_isdef' => '1');
            $result = $list -> data($res) -> add();
            if ($result) {
                $redeemcode = D('redeemcode');
                $wh = array('red_code'=>$code);
                $rs = $redeemcode -> where($wh) -> setField('red_ressid',$result);
                $this-> redirect('code/yd_code',array('code'=>$code,'rec'=>$result));
            }
    }
}