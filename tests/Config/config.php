<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | user : 放下
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2019/7/31 16:02
// +----------------------------------------------------------------------
$config = new \WGCYunPay\Config();
//商户ID   登录云账户综合服务平台在商户中心-》商户管理-》对接信息中查看
$config->dealer_id  = '1232132432';
//综合服务主体ID   登录云账户综合服务平台在商户中心-》商户管理-》对接信息中查看
$config->broker_id  = 'asdsadsa';
//商户app key   登录云账户综合服务平台在商户中心-》商户管理-》对接信息中查看
$config->app_key    = 'dasdasdsad';
//商户3des key   登录云账户综合服务平台在商户中心-》商户管理-》对接信息中查看
$config->des3_key   = 'dsfawrfdsfddas';
//商户私钥  商户使用OpenSSL自行生成的RSA2048秘钥 ，生成的商户公钥需要配置在云账户综合服务平台在商户中心-》商户管理-》对接信息-》商户公钥
$config->private_key   = '';
//云账户公钥    登录云账户综合服务平台在商户中心-》商户管理-》对接信息中查看
$config->public_key = '';

$config->mess       =\WGCYunPay\Util\StringUtil::round(10);
$config->timestamp  = time();
$config->request_id = \WGCYunPay\Util\StringUtil::round(10);
return $config;
