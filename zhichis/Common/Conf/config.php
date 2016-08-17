<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'zhichis_schema',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '77779999',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'zhichis_',    // 数据库表前缀
    define('HOME_URL','http://zhichis.com/zhichis_item/zhichis/Home'),
    'URL_MODEL' => '2',	//访问路径去index.php

     //微信支付配置
    define('WEB_HOST', 'http://zhichis.com/zhichis_item'),
    /*微信支付配置*/
    'WxPayConf_pub'=>array(
        'APPID' => 'wxa1cf7849bc424d33',
        'MCHID' => '1345961701',
        'KEY' => 'bfb6db717ea88a7c11eabba4076965b8',
        'APPSECRET' => 'bfb6db717ea88a7c11eabba4076965b8',
        'JS_API_CALL_URL' => WEB_HOST.'/zhichis/Home/cart/cartpay',
        'SSLCERT_PATH' => WEB_HOST.'/ThinkPHP/Library/Vendor/WeixinPay/cert/apiclient_cert.pem',
        'SSLKEY_PATH' => WEB_HOST.'/ThinkPHP/Library/Vendor/WeixinPay/cert/apiclient_key.pem',
        'NOTIFY_URL' =>  WEB_HOST.'/zhichis/Home/cart/notify',
        'CURL_TIMEOUT' => 30
    )
);
 