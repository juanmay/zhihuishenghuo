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
define("register_merchant", "mimer_register_merchant");//注册
define("bind_fundout_card", "mimer_bind_fundout_card");//商户绑定结算卡
define("query_merchant", "mimer_query_merchant");//商户信息查询
define("query_balance", "mimer_query_balance");//商户账户余额查询
define("bank_card_pay", "mimer_bank_card_pay");//卡要素支付
define("advance_pay", "mimer_advance_pay");//卡要素支付
define("pay_sms", "mimer_pay_sms");//卡要素支付
define("query_single_pay", "mimer_query_single_pay");//单笔支付查询
define("single_pay2bank", "mimer_single_pay2bank");//单笔付款到银行卡
define("query_single_pay2bank", "mimer_query_single_pay2bank");//单笔代付查询
/**
 * 加密版本
 * */
define('encrypt_version','1.0');
/**
 * 签名版本
 * */
define('sign_version','1.0');
/**
/**
 * 接口版本，人品一码通接口文档参数
 */
define("version", "1.0");//接口版本
/**
 *异步回调地址，商户自定义自己系统的回调地址
 */
define("notify_url",SITE_URL.url('index/kbauto/mimerpaynotify'));
define("notify_url_repayment",SITE_URL.url('index/kbauto/mimerrepaymentnotify'));
/**
 * 网关地址
 */
define("mgsRequestUrl","http://test.gate.yacolpay.com/mgs/gateway.do");//网关地址
define("masRequestUrl","http://test.gate.yacolpay.com/mas/gateway.do");//网关地址
/**
*
**/
define("debug_status",false);//true 开启日志记录  false 关闭日志记录

?>
