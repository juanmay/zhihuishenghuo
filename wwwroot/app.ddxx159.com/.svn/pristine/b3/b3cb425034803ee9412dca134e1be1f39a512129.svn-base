<?php
/**
 * Created by PhpStorm.
 * User: zhangyongqiang
 * Date: 17/8/22
 * Time: 16:46
 * demo只是提供一个接口对接编写的思路，具体接口对接商户技术以自身项目的实际情况来进行接口代码的编写。
 */

@include_once(dirname ( __File__ ) . "/../conf.php");
/**
 * 服务器
 */
define("create_service", "create_batch_pay2bank");//批量付款到银行卡

define("query_service", "query_b2c_batch_fundout_order");//接口版本

/**
 * 加密版本
 * */
define('encrypt_version','1.0');
/**
 * 签名版本
 * */
define('sign_version','1.0');
/**
 * 接口版本，人品一码通接口文档参数
 */
define("version", "1.0");//接口版本

/**
 *异步回调地址，商户自定义自己系统的回调地址
 */
define("batchpay_notify_url",SITE_URL.url('index/Kbnotify/batchpaynotify'));
//define("batchpay_notify_url",'http://api.iyunpay.cn/index/Kbnotify/batchpaynotify');
/**
 * 网关地址，
 */
define("masRequestUrl","http://test.gate.yacolpay.com/mas/gateway.do");//网关地址

?>
