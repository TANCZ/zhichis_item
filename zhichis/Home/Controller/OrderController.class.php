<?php
	namespace Home\Controller;
	use Think\Controller;
class OrderController extends Controller {

    public function _initialize(){
            if(!isset($_SESSION['user_id'])){
                 //$this -> redirect(GROUP_NAME."/")
                 $this->redirect(Home."/index/index");            
            }
    }

    public function car(){
        //嘿嘿嘿
    	$this -> display();
    }

    public function payorder(){
    	$this -> display();
    }

    public function sendorder(){
    	$this -> display();
    }

    public function takeorder(){
    	$this -> display();
    }

    public function myorder(){
        $user_id = session('user_id');
        
        $order = M('order');
        $wh = array('o.user_id' => $user_id);
        $rs = $order -> table('zhichis_order o')
            -> join('right join zhichis_order_sub sub on sub.order_number = o.order_number')
            -> join('zhichis_user u on u.user_id = o.user_id')
            -> join('zhichis_pro p on p.pro_id = sub.pro_id')
            -> where($wh)
            -> field('o.order_number,sub.order_sub_number,sub.order_sub_ispay,sub.order_sub_ispaytime,sub.order_sub_issend,sub.order_sub_sendtime,sub.order_sub_istake,sub.order_sub_taketime,p.pro_id,p.pro_name,p.pro_price,p.pro_spec,p.pro_img')
            -> select();
        $this -> assign('empty','<div class="cont1"><p style="color:black;">木有订单</p><p style="color:black;">来挑几件好货吧!</p></div><div class="cont2"><img src="http://zhichis.com/zhichis_item/zhichis/public/img/car.png" alt="购物车"/></div><div class="cont3"><a href="http://zhichis.com/zhichis_item/zhichis/home/index/index">亲,去看看商品吧!</a></div>');
        $this -> assign('select',$rs);
    	$this -> display();
    }

}