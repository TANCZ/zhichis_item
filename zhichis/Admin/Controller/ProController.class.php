<?php
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 后台产品管理控制器
	*/
	class ProController extends Controller
	{
		//判断用户是否已登录，否则进入登录页面
		public function _initialize(){
			if(!isset($_SESSION['uid'])){
				 //$this -> redirect(GROUP_NAME."/")
				 $this->redirect(Admin."/Admin/login");            
			}
		}

		//添加商品
		public function add()
		{
			if(IS_POST){
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload ->autoSub  =	false;
				$upload->rootPath  =      './Public/'; // 设置附件上传根目录
				$upload->savePath  =      './ProUpload/'; // 设置附件上传（子）目录
				// 上传文件 
				$info   =   $upload->upload();
				
				$pro = D('pro');

				$pro_name = $_POST['pro_name'];
				$pro_price = $_POST['pro_price'];
				$pro_spec = $_POST['pro_spec'];
				$pro_num = $_POST['pro_num'];
				$pro_info = $_POST['pro_info'];
				$pro_isshelves = $_POST['pro_isshelves'];

				//判断是否上传成功
				if (!$info) {
					$this->error($upload->getError());
				}else{
					foreach ($info as $file) {
						$data = array('pro_name' => $pro_name,'pro_price' => $pro_price,'pro_spec' => $pro_spec,'pro_img' => $file['savename'],'pro_num' => $pro_num,'pro_info' => $pro_info,'pro_isshelves' => $pro_isshelves);
						$rs = $pro -> add($data);
						if ($rs) {
							$this -> success('提交成功！',U('pro/listpro'),3);
						}else{
							$this -> error('提交错误！');
						}
					}
				}
			}else{
				$this -> display();
			}
		}

		//查询商品类别
		public function seltype()
		{
			$data = M('pro_type');
			$list = $data->select();
			$this->assign('list',$list);
		}

		//分页查询商品数据，每页显示5条
		public function listpro()
		{
			$m = M('pro');      
	        $count = $m->count();
	        $p = getpage($count,5);
	        $list = $m 
	        	-> field('pro_id,pro_name,pro_price,pro_spec,pro_img,pro_num,pro_sales,pro_info,pro_isshelves')
	        	->order('pro_id')
	        	->limit($p->firstRow, $p->listRows)
	        	->select();
	        $this->assign('select', $list); // 赋值数据集
	        $this->assign('page', $p->show()); // 赋值分页输出
	        $this->display();
		}

		//查询单个商品信息
		public function editpro()
		{
			$proid = $_GET['proId'];//获取商品编号

			//实例化产品表
			$pro = M('pro'); 	
			
			//条件
			$where = array('pro_id' => $proid);
			$ls = array('0' => '上架','1' => '下架');
			$this -> assign('ls',$ls);
			//根据编号查询产品
			$result = $pro -> where($where) -> find(); 
			$this -> assign('rs',$result);
			$this -> display();
		}

		//编辑商品
		public function edit()
		{
			if(IS_POST){
				$pro = D("pro");
				//获取参数
				$pro_id = $_POST["pro_id"];
				$pro_name = $_POST['pro_name'];
				$pro_price = $_POST['pro_price'];
				$pro_spec = $_POST['pro_spec'];
				$pro_num = $_POST['pro_num'];
				$pro_info = $_POST['pro_info'];
				$pro_isshelves = $_POST['pro_isshelves'];

				//判断修改方式(有图，没图)
				if ($_POST["proimg"]) {
					$upload = new \Think\Upload();// 实例化上传类
					$upload->maxSize   =     3145728 ;// 设置附件上传大小
					$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
					$upload ->autoSub  =	false;
					$upload->rootPath  =      './Public/'; // 设置附件上传根目录
					$upload->savePath  =      './ProUpload/'; // 设置附件上传（子）目录
					// 上传文件 
					$info   =   $upload->upload();

					if (!$info) {
						$this->error($upload->getError());
					}else{
						foreach ($info as $file) {
							$wh = array('pro_id' => $pro_id);
							$data = array('pro_name' => $pro_name,'pro_price' => $pro_price,'pro_spec' => $pro_spec,'pro_img' => $file['savename'],'pro_num' => $pro_num,'pro_info' => $pro_info,'pro_isshelves' => $pro_isshelves);
							$rs = $pro -> where($wh) -> setField($data);
							if ($rs) {
								$this -> success("提交成功！",U('pro/listpro'),3);
							}else{
								$this -> error("提交错误！");
							}
						}
					}
				}else{
					$wh = array('pro_id' => $pro_id);
					$data = array('pro_name' => $pro_name,'pro_price' => $pro_price,'pro_spec' => $pro_spec,'pro_num' => $pro_num,'pro_info' => $pro_info,'pro_isshelves' => $pro_isshelves);
					$rs = $pro -> where($wh) -> setField($data);
					if ($rs) {
						$this -> success("提交成功！",U('pro/listpro'),3);
					}else{
						$this -> error("提交错误！");
					}
				}
/*				$pro = D('pro');
				//获取POST表单提交的数据
				$pro_id = $_POST['pro_id'];
				$pro_name = $_POST['pro_name'];
				$pro_type_id = $_POST['pro_type_id'];
				$pro_price = $_POST['pro_price'];
				$pro_spec = $_POST['pro_spec'];
				$pro_num = $_POST['pro_num'];
				$pro_cost = $_POST['pro_cost'];
				$pro_info = $_POST['pro_info'];
				$pro_isshelves = $_POST['pro_isshelves'];
				//判断是否填写完整
				if(empty($pro_name) || empty($pro_price) || empty($pro_spec) || empty($pro_num) || empty($pro_cost) || empty($pro_info)){
					$this -> error("请不要留有空缺！");
				}
				
				$data = array('pro_name' => $pro_name,'pro_price' => $pro_price,'pro_type_id' => $pro_type_id,'pro_spec' =>$pro_spec,'pro_num' => $pro_num,'pro_cost' => $pro_cost, 'pro_info' => $pro_info,'pro_isshelves' => $pro_isshelves);

				$where = array('pro_id' => $pro_id);
				$rs = $pro -> where($where) -> setField($data);
				if ($rs == true) {
					$this -> success('更新成功！',U('pro/listpro'),3);
				}else{
					$this -> error('更新失败！');
				}*/
			}else{
				$this -> display();
			}
		}

		//商品上下架
		public function proshelves()
		{
			$pro = D('pro');

			$proid = $_GET['proId'];
			$where = array('pro_id' => $proid);

			//根据产品编号查询状态
			$state = $pro -> where($where) -> getField('pro_isshelves');
			//判断产品状态
			if($state == 0){
				//下架
				$rs = $pro -> where($where) -> setField('pro_isshelves','1');
				if ($rs == true) {
					$this -> success('下架成功!',U('pro/listpro'),3);
				}else{
					$this -> error('系统遇到未知错误，请立即重启计算机！');
				}
			}else{
				//上架
				$rs = $pro -> where($where) -> setField('pro_isshelves','0');
				if ($rs == true) {
					$this -> success('上架成功!',U('pro/listpro'),3);
				}else{
					$this -> error('系统遇到未知错误,请立即重启计算机！');
				}
			}
		}

		//测试
		public function test()
		{
			$this -> display();
		}
	}