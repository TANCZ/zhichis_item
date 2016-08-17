<?php
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 后台首页控制器
	*/
	class IndexController extends Controller
	{
		public function _initialize(){
			if(!isset($_SESSION['uid'])){
				 //$this -> redirect(GROUP_NAME."/")
				 $this->redirect(Admin."/Admin/login");            
			}
		}

		//索引页(整合头左右)
		public function ins(){
			$this -> display();
		}

		//头部
		public function header()
		{
			$this -> display();
		}

		//左部
		public function left()
		{
			$this -> display();
		}

		//右部
		public function reght()
		{
			$this -> display();
		}

		
	}