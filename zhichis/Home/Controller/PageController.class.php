<?php
	namespace Home\Controller;
	use Think\Controller;

    class PageController extends Controller {

        public function _initialize(){
                if(!isset($_SESSION['user_id'])){
                     //$this -> redirect(GROUP_NAME."/")
                     $this->redirect(Home."/index/index");            
                }
        }

        //添加订单
        public function addorder()
        {
            $order = D('order');
            //获取提交参数
            $proid = $_POST['pro_id'];
            $number = $_POST['number'];

            //根据用户编号查询订单单号
            $userid = session('user_id');
            $whuser = array('user_id' => $userid);
            $order_number = $order -> where($whuser) -> field('order_number') -> find();
            $orderid = $this -> order_number();
            //如果该用户没有创建过订单，则新增
            if (empty($order_number)) {
                //添加订单主表信息
                $data = array('order_number' => $orderid,'user_id' => session('user_id'),'order_time' => date('Y-m-d', time()),'order_price' => '0');
                $rs = $order -> data($data) -> add();
                //判断是否成功，添加从表
                if ($rs) {
                    //添加详情
                    $sub = D('order_sub');
                    $subdata = array('order_number' => $orderid,'pro_id'=> $proid,'order_sub_number'=>$number,'order_sub_ispay'=> '0','order_sub_ispaytime'=>'','order_sub_issend'=>'0','order_sub_sendtime'=> '','order_sub_istake' => '0','order_sub_taketime'=>'','rec_id'=>'0','order_sub_sender'=>'','order_sub_sendcode' => '','order_buy' => '0');
                    $result = $sub -> data($subdata) -> add();                
                    if($result){
                            $this-> redirect('cart/cart');
                    }
                }
            }else{
                //查询订单中是否有同类商品
                $ProWh = array('o.user_id' => session('user_id'),'sub.pro_id' => $proid,'sub.order_sub_ispay' => '0');
                $ProType = $order -> table('zhichis_order o')
                        -> join ('right join zhichis_order_sub sub on sub.order_number = o.order_number')
                        -> where($ProWh)
                        -> field('sub.order_number,o.user_id,sub.pro_id,sub.order_sub_number')
                        -> find();
                //如果不存在同类商品则添加
                if (empty($ProType)) {
                    //添加详情
                    $sub = D('order_sub');
                    $subdata = array('order_number' => $order_number['order_number'],'pro_id'=> $proid,'order_sub_number'=>$number,'order_sub_ispay'=> '0','order_sub_ispaytime'=>'','order_sub_issend'=>'0','order_sub_sendtime'=> '','order_sub_istake' => '0','order_sub_taketime'=>'','rec_id'=>'0','order_sub_sender'=>'','order_sub_sendcode' => '','order_buy' => '0');
                    $result = $sub -> data($subdata) -> add();
                    echo $sub -> getlastsql();
                    if($result){
                        $this-> redirect('cart/cart');
                    }
                }else{
                    //否则修改数量
                    $sub = D('order_sub');
                    //获取存在该商品的数量
                    $ProNumber = $ProType['order_sub_number'];
                    $Num = $ProNumber + $number;
                    //修改条件
                    $SubWh = array('order_number' => $ProType['order_number'],'pro_id' => $ProType['pro_id']);
                    $SubData = array('order_sub_number' => $Num);
                    $result = $sub -> where($SubWh) -> setField($SubData);
                    if($result){
                        $this-> redirect('cart/cart');
                    }
                }
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


        //查询商品信息
        public function ShowPro($id)
        {
            $list = M('pro');
            
            $wh = array('pro_id' => $id);

            $rs = $list -> where($wh) -> field('pro_id,pro_name,pro_price,pro_spec,pro_num,pro_sales') -> find();
            $this -> assign('rs',$rs);
            
        }

        //黄桃10斤 - 3.3两 - 半斤
        public function ht(){
            $this -> ShowPro('9');
            $this -> display();
        }

        //品尝包
        public function yg_try()
        {
            $this -> ShowPro('1');
            $this -> display();
        }

        //黄桃兑换码
        public function ht_code()
        {
            //$this -> ShowPro('3');
            $this -> display();
        }

        //雪峰蜜桔
        public function mj(){
            $this -> ShowPro('13');
        	$this -> display();
        }

        //更多
        public function more()
        {
            //$this -> ShowPro('3');
            $this -> display();
        }

        //螃蟹
        public function px()
        {
            //$this -> ShowPro('3');
            $this -> display();
        }

        //虚拟商品
        public function xn()
        {
            $this -> ShowPro('12');
            $this -> display();
        }

        //礼品鱼肚
        public function yd()
        {
            $this -> ShowPro('5');
            $this -> display();
        }



        //电商糕
        public function yg(){
            $this -> ShowPro('2');
        	$this -> display();
        }

        //鱼肚瓦罐
        public function yjwg(){
            $this -> ShowPro('4');
        	$this -> display();
        }

        public function wsry(){
            $this -> ShowPro('3');
            $this -> display();
        }

    }