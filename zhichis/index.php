<?php
	header("Content-type: text/html; charset=utf-8");
	//使用thinkphp开发商城项目

	//框架开发两种模式(调试)true   默认：(线上)false
	define('APP_DEBUG', true);
	define('SITE_PATH', getcwd());//网站当前路径

	//给静态资源文件王文目录设置常量，方便后期维护
	//HOME 分组
	define('CSS_URL','http://zhichis.com/zhichis_item//zhichis/Public/css/');
	define('IMG_URL','http://zhichis.com/zhichis_item//zhichis/Public/img/');
	define('JS_URL','http://zhichis.com/zhichis_item//zhichis/Public/js/');
	/*调用方式<link href="<?php echo CSS_URL?>user.css">*/

	//ADMIN 分组
	define('ADMIN_CSS_URL','http://zhichis.com/zhichis_item//zhichis/Admin/Public/css/');
	define('ADMIN_IMG_URL','http://zhichis.com/zhichis_item//zhichis/Admin/Public/img/');
	define('ADMIN_JS_URL','http://zhichis.com/zhichis_item//zhichis/Admin/Public/js/');
	/*调用方式<img src="<?php echo ADMIN_IMG_URL?>user.jpg">*/

	define('ADMIN_MANAGER','http://zhichis.com/zhichis_item//zhichis/index.php/Admin/manager/');

	//微信配置
	define("TOKEN", "sumerzhichis");
	define('appid','wxa8f4705546970fbf');
	define('appsecret','793fe202019685843e646719b4ffaa60');


	//引入框架的入口文件
	include('../ThinkPHP/ThinkPHP.php');