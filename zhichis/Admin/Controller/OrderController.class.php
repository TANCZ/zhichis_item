<?php
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 订单管理控制器
	*/
	class OrderController extends Controller
	{
		//判断用户是否已登录，否则进入登录页面
		public function _initialize(){
			if(!isset($_SESSION['uid'])){
				 //$this -> redirect(GROUP_NAME."/")
				 $this->redirect(Admin."/Admin/login");            
			}
		}
		
		//查询所有订单，并进行分页
		public function orderlist(){
			$list = M('order');
			//$wh = array('s.order_state_id not in(1)');
			$wh = array('r.rec_isdef' => '1');
			//查询订单总数
			$count = $list -> table('zhichis_order o')
					-> join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
					-> join('zhichis_user u on o.user_id = u.user_id')
					-> join('zhichis_pro p on sub.pro_id = p.pro_id')
					-> join('zhichis_recaddress r on u.user_id = r.user_id')
					-> where($wh)
					-> count();
			$p = getpage($count,5);
			
			//查询订单信息
			$rs = $list -> table('zhichis_order o')
					-> join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
					-> join('zhichis_user u on o.user_id = u.user_id')
					-> join('zhichis_pro p on sub.pro_id = p.pro_id')
					-> join('zhichis_recaddress r on u.user_id = r.user_id')
					-> field('o.order_id,o.order_number,u.user_nickname,p.pro_name,o.order_time,sub.order_sub_number,o.order_price,sub.order_sub_ispay,sub.order_sub_istake,sub.order_sub_issend,r.rec_area,r.rec_id,r.rec_deta')
					-> where($wh)
					-> limit($p->firstRow, $p->listRows)
					//-> where($wh)
					-> select();
			// 赋值数据集	
			$this -> assign('select', $rs);

			//赋值分页输出
	        $this -> assign('page', $p->show());
			//调用订单状态
			$this -> seltype();
			$this -> display();
		}

		//根据提交条件进行查询
		public function whorderlist(){
			$list = M('order');
			//获取条件
			$orderid = $_POST['orderid'];//获取订单号
			$username = $_POST['username'];//获取用户名称
			$proname = $_POST['proname'];//购买产品
			$stateId = $_POST['stateId'];//订单状态

			//查询条件
			if(!empty($orderid)){
				//订单单号
				$wh['o.order_number'] = $orderid;
			}

			if (!empty($username)) {
				//用户真实姓名(支持模糊查询)
				$wh['u.user_nickname'] = array('like','%'.$username.'%');
			}

			if (!empty($proname)) {
				//产品名称(支持模糊查询)
				$wh['p.pro_name'] = array('like','%'.$proname.'%');
			}

			if (!empty($stateId)) {
				//查询订单当前状态
				if ($stateId == 1) {
					$wh['sub.order_sub_ispay'] = 0;
				}

				if ($stateId == 2) {
					$wh['sub.order_sub_ispay'] = 1;
					$wh['sub.order_sub_issend'] = 0;

				}

				if($stateId == 3){
					$wh['sub.order_sub_issend'] = 1;
					$wh['sub.order_sub_istake'] = 0;
				}

				if($stateId == 4){
					$wh['sub.order_sub_istake'] = 1;
				}
			}
			//排除未付款订单
			//$wh['s.order_state_id'] = array('not in','1');
			$wh['r.rec_isdef'] = 1;
			//查询订单总数
			$count = $list -> table('zhichis_order o')
					-> join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
					-> join('zhichis_user u on o.user_id = u.user_id')
					-> join('zhichis_pro p on sub.pro_id = p.pro_id')
					-> join('zhichis_recaddress r on u.user_id = r.user_id')
					-> where($wh)
					-> count();

			$p = getpage($count,5);
			
			//查询订单信息
			$rs = $list -> table('zhichis_order o')
					-> join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
					-> join('zhichis_user u on o.user_id = u.user_id')
					-> join('zhichis_pro p on sub.pro_id = p.pro_id')
					-> join('zhichis_recaddress r on u.user_id = r.user_id')
					-> field('o.order_id,o.order_number,u.user_nickname,p.pro_name,o.order_time,sub.order_sub_number,o.order_price,sub.order_sub_ispay,sub.order_sub_istake,sub.order_sub_issend,r.rec_deta,r.rec_id')
					-> limit($p->firstRow, $p->listRows)
					-> where($wh)
					-> select();	
			// 赋值数据集	
			$this -> assign('empty','<tr class="content" align="center"><td colspan="12" style="color:red;" bgcolor="#FFFFFF">&nbsp;<b>暂时没有订单哦！亲~</b></td></tr>');
			$this -> assign('select', $rs);

			//赋值分页输出
	        $this -> assign('page', $p -> show());
			//调用订单状态
			$this -> seltype();
			$this -> display('orderlist');
		}


		//查看订单详情
		public function ordersub(){
			$list = M('order');

			//获取订单编号
			$orderid = $_GET['orderId'];

			//条件
			$wh = array('o.order_number' => $orderid,'r.rec_isdef' => '1');

			//sql 获取数据
			$rs = $list -> table('zhichis_order o')
					-> join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
					-> join('zhichis_user u on o.user_id = u.user_id')
					-> join('zhichis_pro p on sub.pro_id = p.pro_id')
					-> join('zhichis_recaddress r on u.user_id = r.user_id')
					-> field('o.order_number,o.order_time,o.order_price,sub.order_sub_ispay,sub.order_sub_ispaytime,sub.order_sub_number,sub.order_sub_issend,sub.order_sub_sendtime,sub.order_sub_istake,
						sub.order_sub_taketime,sub.order_sub_sender,sub.order_sub_sendcode,u.user_nickname,u.user_phone,u.user_sex,
						p.pro_name,p.pro_price,p.pro_img,p.pro_info,r.rec_name,r.rec_phone,r.rec_province,r.rec_city,r.rec_area,r.rec_deta')
					-> where($wh)
					-> find();
			if ($rs){
				//模版赋值
				$this -> assign('rs',$rs);
			}else{
				$this -> error('出现未知错误,请重启计算机！');
			}
			$this -> display();
		}    

		//查询订单状态表F 
		public function seltype(){
			$data = M('order_state');
			//排除待付款订单状态
			//$wh = array('order_state_id not in (1)');
			//
			$list = $data 
			//-> where($wh) 
			-> select();
			$this -> assign('list',$list);
		}

		//发货
		public function sendorder()
		{
			//向订单物流表添加信息
			if (IS_POST) {
				$list = D('order_sub');

				$orderid = $_POST['order_number'];	//订单编号
				$addressid = $_POST['l_addressid'];//收货地址
				$pro_id =$_POST['l_proid'];
				$sender = $_POST['sender'];//快递公司
				$sendcode = $_POST['sebd_code'];	//快递单号

				$data = array('order_sub_issend' => 1,'order_sub_sendtime' => date("Y-m-d H:i:s"),'order_sub_sendcode' => $sendcode, 'order_sub_sender' => $sender );
				$wh = array('orderId' => $orderid,'pro_id' => $pro_id);
				$rs = $list -> where($wh) -> setField($data);

				if ($rs) {
					$this->success('发货成功！', U('order/orderlist'), 3);
				}else{
					$this->error('发货失败！');
				}

			}else{
				$this -> display('orderlist');
			}
		}

		//产看物流
		public function sqllogistics()
		{
			$list = M("order");

			$orderid = $_GET['orderId'];

			$wh = array("o.order_number" => $orderid);

			$rs = $list -> table('lvnong_order o')
				-> join('zhichis_order_sub sub on o.order_number = sub.order_number')
				-> join('zhichis_user u on o.user_id = u.user_id')
				-> join('zhichis_pro p on sub.pro_id = p.pro_id')
				-> join('zhichis_recaddress r on sub.rec_id = r.rec_id')
				-> field('o.order_number,o.order_time,o.order_price,u.user_name,u.user_realname,u.user_sex,p.pro_name,sub.order_sub_istake,sub.order_sub_taketime,r.rec_deta,r.rec_name,r.rec_phone,sub.order_sub_sender,sub.order_sub_sendcode,sub.order_sub_number')
				-> where($wh)
				-> find();
			$this -> assign('rs',$rs);
			$this -> display();
		}
		
		/**
		 * 兑换码订单
		 */
		public function CodeOrder()
		{
			$order = M('order');

			$wh = array();

			$count = $order -> table('zhichis_order o')
				-> join('right join zhichis_order_sub sub on sub.order_number = o.order_number')
				-> join('zhichis_pro p on p.pro_id = sub.pro_id')
				-> join('zhichis_redeemcode re on re.pro_id = p.pro_id')
				-> join('zhichis_recaddress rec on rec.rec_id = re.red_ressid')
				-> count();
/*				echo $order -> getlastsql();
				echo "<br>".$count;
				exit();*/
			$p = getpage($count,5);

			$rs = $order -> table('zhichis_order o')
				-> join('right join zhichis_order_sub sub on sub.order_number = o.order_number')
				-> join('zhichis_pro p on p.pro_id = sub.pro_id')
				-> join('zhichis_redeemcode re on re.pro_id = p.pro_id')
				-> join('zhichis_recaddress rec on rec.rec_id = re.red_ressid')
				-> field(' o.order_number,o.order_time,')
				-> limit($p->firstRow, $p->listRows)
				-> select();

			$this -> assign('select', $rs);

			//赋值分页输出
	        $this -> assign('page', $p->show());
			//调用订单状态
			$this -> seltype();
			$this -> display();
		}
	}