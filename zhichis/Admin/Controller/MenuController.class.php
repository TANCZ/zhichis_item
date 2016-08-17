<?php
namespace Admin\Controller;
use Think\Controller;

define('appid','wxa1cf7849bc424d33');
define('appsecret','bfb6db717ea88a7c11eabba4076965b8');
/*define('appid','wxa8f4705546970fbf');
define('appsecret','793fe202019685843e646719b4ffaa60');*/
class MenuController extends Controller {

	public function ment()
	{
		$this -> display();
	}

    private function access_token(){
		$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".appid."&secret=".appsecret."";
		$ch=curl_init();//初始化
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$output=curl_exec($ch);
		curl_close($ch);
		$jsoninfo=json_decode($output,true);
		$access_token=$jsoninfo['access_token'];
		print_r($access_token.'\n');
		return $access_token;
	}

	  function set_menu(){
		//菜单
		$data = ' {
		    "button":[
		    {
		        "name":"探·zhi",
		        "sub_button":[
		           {
		              "type":"view",
		              "name":"你不知道的事",
		              "url":"http://zhichis.com/zhi.php"
		           },        
		           {
		             "type":"view",
		              "name":"故事里的事",
		              "url":"http://zhichis.com/bbs.php"
		           }]
		     },
		     {
		          "name":"寻·chi",
		          "sub_button":[
		           {
		              "type":"view",
		              "name":"食与远方",
		              "url":"http://zhichis.com/bbs_c.php"
		           },
		           {
		              "type":"view",
		              "name":"寻蕾攻略",
		              "url":"http://zhichis.com/article.php"
		           },
		           {
		              "type":"view",
		              "name":"约你来分享",
		              "url":"http://zhichis.com/article.php"
		           }]
		     },
		     {
		          "name":"尝·shi",
		          "sub_button":[
		           {
		              "type":"view",
		              "name":"知吃氏",
		              "url":"http://zhichis.com/zhichis/zhichis/home/index/index"
		           },
		           {
					  "type":"view",
		              "name":"兑换码",
		              "url":"http://zhichis.com/zhichis_item/zhichis/home/index/index"
		           },
		           {
 					  "type": "scancode_push", 
                      "name": "扫码兑换", 
                      "key": "rselfmenu_0_1", 
                      "sub_button": [ ]
		           }]
		      }]
		}';

			//make post url
			$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$this->access_token()}";
			$ch=curl_init();//初始化
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
			curl_exec($ch);
			curl_close($ch);
			print_r($url);
		}
}