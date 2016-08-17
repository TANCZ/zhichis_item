<?php 
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 后台管理员账户控制器
	*/
	class ManagerController extends Controller
	{

		//判断用户是否已登录，否则进入登录页面
/*		public function _initialize(){
			if(!isset($_SESSION['uid'])){
				 //$this -> redirect(GROUP_NAME."/")
				 $this->redirect(Admin."/Admin/login");            
			}
		}*/


		//注册用户
		public function insmanager(){

			if(IS_POST){
				$ins = D('manager');	//实例化Manager对象
				//创建数据集
				if(!$data = $ins -> create()){
					//防止输出中文乱码
					header("Content-type: text/html; charset=utf-8");
					$this -> error($ins->getError());
				}
				//插入数据
				if($id = $ins -> add($data)){
                	$this->success('注册成功', U('Index/index'), 2);
				}else{
					$this->error('注册失败');
				}
			}else{
				$this->display();
			}
		}

		//根据SESSION ID 查询信息
		public function sqlmanager(){
			
			$uid = session("uid");
			$sel = M("manager");
			//读取
			$rs = $sel -> find($uid);
			if($rs){
				$this->assign('rs',$rs);//模版赋值
			}else{
				$this-error('出现未知错误,请重启计算机！');
			}
		
			$this->display();
		}

		//获取数据并绑定到页面，修改操作
		public function upmanager(){
			$uid = session("uid");
			$data = M('manager');
			$this -> assign('vo',$data->find($uid));
			$this->display();
		}
		
		//修改资料
		public function updata(){
			$up = D('manager');
			$userid = session("uid");
			$nickname = $_POST['nickname'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];

			$data = array('username' => $username,'nickname' => $nickname,'email' => $email,'mobile' => $mobile);//修改字段
			$where = array('userid' => $userid);		//条件
			$rs = $up -> where($where) -> setField($data);

			if($rs == true){
				$this -> success("更新成功！",U('Manager/sqlmanager'));
			}else{
				$this->error("更新失败!");
			}
		}

		//修改密码
		public function uppassword(){
			if(IS_POST){
				$up = D('manager');
				$userid = session('uid');
				$pastpwd = md5($_POST['pastpwd']);
				$newpwd = md5($_POST['newpwd']);
				$reppwd = md5($_POST['reppwd']);

				if (empty($_POST['pastpwd']) || empty($_POST['newpwd']) || empty($_POST['reppwd'])) {
					$this -> error("请填写完整！");
				}

				$pwd1 = preg_match("/^([a-zA-Z0-9@*#]{6,22})$/",$_POST['pastpwd']);
				$pwd2 = preg_match("/^([a-zA-Z0-9@*#]{6,22})$/",$_POST['newpwd']);
				$pwd3 = preg_match("/^([a-zA-Z0-9@*#]{6,22})$/",$_POST['reppwd']);
				
				if($pwd1 == 0){
					$this -> error("原密码不正确！");
				}else if($pwd2 == 0){
					$this -> error("新密码格式不正确！");
				}else if ($pwd3 == 0) {
					$this -> error("确认密码格式不正确！");
				}

				if ($newpwd !== $reppwd) {
					$this -> error("两次输入密码不一致！");
				}
				//取得密码
				$where = array('userid' => $userid);
				$pwd = $up -> where($where) -> getField('password');

				if($pwd !== $pastpwd){
					$this -> error('原密码不正确，请重新输入！');
				}

				$data = array('password' => $newpwd);	//修改字段
				$wheres = array('userid' => $userid,'password' => $pastpwd);	//条件
				$rs = $up -> where($wheres) -> setField($data);
				//判断是否修改密码成功
				if($rs == true){
					$this -> success("提交成功！",U('Manager/sqlmanager'));
				}else{
					$this->error("提交失败!");
				}
				// if ($newpwd !== $reppwd) {
				// 	$this -> error('确认密码不正确，请重新输入！');
				// }
			}else{
				$this->display();
			}
		}
	}