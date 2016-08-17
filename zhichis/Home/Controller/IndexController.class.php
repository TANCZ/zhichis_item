<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

    	//该字符串是获取code时自定义的参数。
    	$state = 'test';

	    if(I('get.state') != $state){

	    	//调用function.php中定义的get_code函数，$state是链接自带参数的 
	        get_code($state); 
	        
	    }else{ 
	      	$content = get_access_token();
	      	//$user是保存用户信息的一位数组
	       	$user = get_userinfo_by_auth($content); 

	       	if (!empty($user['openid'])) {
	       		$list = M('user');
	       		//查询是否存在该用户
	       		$wh = array('user_openid' => $user['openid']);
	       		$rs = $list -> where($wh) -> find();
	       		if ($rs) {
	       			
	       		}else{
	       			//如果没有添加个人信息
	       			$data =  array('user_unionid'=> $user['unionid'],'user_openid'=> $user['openid'],'user_nickname'=> $user['nickname'],'user_headimgurl'=> $user['headimgurl'],'user_sex' => $user['sex'],'user_regtime'=> date("Y-m-d"),'user_aera'=> $user['city'].$user['province'],'user_phone'=> "",'user_total'=> "");
	       			$ress = $list -> data($data) -> add();
	       		}
	       		//获取用户编号
	       		$where = array('user_openid' => $user['openid']);
	       		$userinfo = $list -> where($where) -> field('user_id') -> find();

	       		//保存session
	       		session('user_id',$userinfo['user_id']);
		       	session('wx_openid',$user['openid']);
		       	session('wx_nickname',$user['nickname']);
		       	session('wx_sex',$user['sex']);
		       	session('wx_language',$user['language']);
		       	session('wx_city',$user['city']);
		       	session('wx_province',$user['province']);
		       	session('wx_country',$user['country']);
		       	session('wx_headimgurl',$user['headimgurl']);
		       	session('wx_unionid',$user['unionid']);

		       	$number = D('order');
    			$where = array('o.user_id' => $userinfo['user_id'],'sub.order_sub_ispay' => '0');
    			$count = $number -> table('zhichis_order o')
					-> join('right join zhichis_order_sub sub on o.order_number = sub.order_number')
					-> join('zhichis_user u on o.user_id = u.user_id')
					-> where($where)
					-> count();
				session('order_count',$count);
	       	}
	    }
	    $this -> display();
    }

}