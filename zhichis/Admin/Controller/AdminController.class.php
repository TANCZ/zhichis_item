<?php
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 后台用户,登录控制器
	*/
	class AdminController extends Controller
	{
		//echo "后台登录页面";
		public function login(){
			
			//判断提交方式
			if (IS_POST) {
				$data = D('admin');

				//自动验证，创建数据集
				if (!$item = $data -> create()) {
					 header("Content-type: text/html; charset=utf-8");
                	$this -> error($data->getError());
				}

				//组合查询条件
				$where = array();
				$where['username'] = $item['username'];
				$secure_code = C('SECURE_CODE');//读取配置文件中SECURE_CODE的值
				$password = md5($_POST['password']);
				$rs = $data -> where($where) -> field('userid,username,nickname,password,lastdate,lastip') -> find();
				//验证用户名 对比 密码
				if($rs && $rs['password'] == $password){
					//存储SESSION
					session('uid',$rs['userid']);		//用户ID
					session('nickname',$rs['nickname']);//用户昵称
					session('username',$rs['username']);//用户名
					session('lastdate',$rs['lastdate']);//上次登录时间
					session('lastip',$rs['lastip']);	//上次登录IP

					//更新用户登录信息
					$where['userid'] = session('uid');
					M('manager') -> where($where) -> setInc('loginnum');	//登录次数加1
					M('manager') -> where($where) -> save($item);			//更新登录时间和登录IP

					$this -> success('登录成功，正在跳转首页...',U('Index/index'));
				}else{
					$this -> error("用户名或密码错误！");
				}
			}else{
				$this -> display();
			}
		}

		//退出后台
		public function logout(){
			// 清楚所有session
        	session(null);
        	redirect(U('admin/login'), 2, '正在退出登录...');
		}
	}