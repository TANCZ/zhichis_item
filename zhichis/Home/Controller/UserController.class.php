<?php
	namespace Home\Controller;
	use Think\Controller;

	/**
	* 用户控制器
	*/
	class UserController extends Controller
	{

		public function _initialize(){
            if(!isset($_SESSION['user_id'])){
                 //$this -> redirect(GROUP_NAME."/")
                 $this->redirect(Home."/index/index");            
            }
    	}	

		//查看个人信息
		public function userinfo()
		{
			$list = M('user');

			$wh = array('u.user_openid' => session('wx_openid'),'r.rec_isdef' => '1');

			$rs = $list -> table('zhichis_user u') -> join ('zhichis_recaddress r on u.user_id = r.user_id') -> where($wh) -> field('r.rec_name,r.rec_phone,u.user_aera,r.rec_province,r.rec_city,r.rec_area,r.rec_deta') -> find();
			$this -> assign('rs',$rs);
			$this -> display();
		}

		public function individual()
		{
			$order = M('order');
			$user_id = session('user_id');
			$whispay = array('o.user_id' => $user_id);
			$rs = $order -> table('zhichis_order o') 
				-> join('right join zhichis_order_sub sub on sub.order_number = o.order_number') 
				-> join('zhichis_user u on u.user_id = o.user_id')
				-> join('zhichis_pro p on sub.pro_id = p.pro_id')
				-> where($whispay) 
				-> field('o.order_number,sub.order_sub_ispay,sub.order_sub_istake,sub.order_sub_issend,p.pro_name,p.pro_price,p.pro_spec,p.pro_img,sub.order_sub_number,sub.order_buy') 
				-> select();

			$this -> assign('select',$rs);

/*			$whissend = array('o.user_id' => $user_id,'sub.order_sub_issend' => '0','sub.order_sub_ispay' => '1');
			$issend = $order -> table('zhichis_order o') 
				-> join('right join zhichis_order_sub sub on sub.order_number = o.order_number') 
				-> join('zhichis_user u on u.user_id = o.user_id')
				-> join('zhichis_pro p on sub.pro_id = p.pro_id')
				-> where($whissend) 
				-> field('o.order_number,sub.order_sub_ispay,sub.order_sub_istake,sub.order_sub_issend,p.pro_name,p.pro_price,p.pro_spec,p.pro_img,sub.order_sub_number,sub.order_buy') 
				-> select();
			$this -> assign('issend',$issend);*/
			$this -> display();
		}
	}
 