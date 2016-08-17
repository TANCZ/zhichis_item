<?
	/*获取code跳转*/
	function get_code($state){
	    $param['appid'] = C('APPID'); //AppID
	    //$param ['secret'] = C('SECRET'); //AppSecret
	    $param ['redirect_uri'] = C('REDIRECT_URI'); //获取code后的跳转地址
	    $param ['response_type'] = 'code'; 
	    $param ['scope'] = 'snsapi_userinfo'; 
	    $param ['state'] = $state; 
	    //https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect
	    $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?'.http_build_query($param).'#wechat_redirect';
	    redirect ( $url );
	}

	//获取网页授权access_token，此access_token非普通的access_token，详情请看微信公众号开发者文档
	function get_access_token(){
	    $param ['appid'] = C('APPID'); //AppID
	    $param ['secret'] = C('SECRET'); //AppSecret
	    $param ['code'] = $_GET['code'];
	    $param ['grant_type'] = 'authorization_code';
	    	
	    $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?'.http_build_query($param);
	    $content = file_get_contents($url);
	    $content = json_decode ( $content, true );


	    if (! empty ( $content ['errmsg'] )) {
	       return false;
	    }
	    
	    return $content;
	}

	//通过授权获取用户信息, $content 是数组类型
	function get_userinfo_by_auth($content){
	     $url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$content ['access_token'].'&openid='.$content ['openid'].'&lang=zh_CN';
	     $user = file_get_contents($url);
	     $user = json_decode($user, true);
	     
	     return $user;
	}