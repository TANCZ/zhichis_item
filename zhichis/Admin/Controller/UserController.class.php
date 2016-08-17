<?php
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 客户管理
	*/
	class UserController extends Controller
	{

		//判断用户是否已登录，否则进入登录页面
		public function _initialize(){
			if(!isset($_SESSION['uid'])){
				 //$this -> redirect(GROUP_NAME."/")
				 $this->redirect(Admin."/Admin/login");            
			}
		}

		//查询用户信息
		public function userlist()
		{
			$list = M('user');

			//总数
			$count = $list -> count();

			$p = getpage($count,5);

			$rs = $list -> limit($p->firstRow, $p->listRows) -> select();
			// 赋值数据集	
			$this -> assign('select', $rs);

			//赋值分页输出
	        $this -> assign('page', $p->show());

			$this -> display();
		}

		//按照条件查询
		public function sqluser()
		{
			$list = M('user');

			$username = $_POST["username"];
			$userphone = $_POST["userphone"];
			$realname = $_POST["realname"];
			$usersex = $_POST["usersex"];

			if (!empty($username)) {
				$wh["user_name"] = array('like','%'.$username.'%');
			}

			if (!empty($userphone)) {
				$wh["user_phone"] = $userphone;
			}

			if (!empty($realname)) {
				$wh["user_realname"] = array('like','%'.$realname.'%');
			}
			if (!empty($usersex)) {
				if ($usersex == 1) {
					$wh["user_sex"] = 0;
				}
				if ($usersex == 2) {
					$wh["user_sex"] = 1;
				}
				
			}

			$count = $list -> where($wh) -> count();

			$p = getpage($count,5);

			$rs = $list -> limit($p->firstRow, $p->listRows) -> where($wh)-> select();
			
			// 赋值数据集	
			$this -> assign('select', $rs);

			//赋值分页输出
	        $this -> assign('page', $p->show());

			$this -> display('userlist');
		}

		public function userdetailed()
		{
			$list = M('user');

			$userid = $_GET['userid'];

			$wh = array('u.user_id' => $userid,'r.rec_isdef' => '1');

			$rs = $list -> table('zhichis_user u')
			-> join('zhichis_recaddress r on u.user_id = r.user_id') 
			-> where($wh) 
			-> find();
			$this -> assign('rs',$rs);

			$this -> display();
		}
	}