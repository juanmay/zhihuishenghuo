<?php
/**
 * Created by PhpStorm.
 * User: zhangyongqiang
 * Date: 17/8/22
 * Time: 16:46
 * demo只是提供一个接口对接编写的思路，具体接口对接商户技术以自身项目的实际情况来进行接口代码的编写。
 */
/**
 * 接口版本，人品一码通接口文档参数
 */
//define("version", "1.0");//接口版本

/**
 * 商户号，由人品一码通提供
 */
define("partner_id","200006503094");//接口商户号
/**
 * 商户接口字符集，人品一码通接口文档参数
 */
define("_input_charset", "utf-8");//接口字符集编码
/**
 * 商户签名类型，人品一码通接口文档参数
 */
define("sign_type", "RSA");//签名类型
/**
 * 商户签名私钥，由商户自己生成
 */
define("rsa_sign_private_key",dirname(__File__) ."/key/Privatekey.pem");//签名私钥
/**
 * 商户验证签名公钥，由酷宝支付提供
 */
define("rsa_sign_public_key",dirname ( __File__ )."/key/Publickey_Verify.pem");//验证签名公钥
/**
 * 人品一码通特殊参数加密，公钥，由酷宝支付提供
 */
define("rsa_public_key",dirname ( __File__ )."/key/Publickey_Encrypt.pem");//加密公钥
/**
 *异步回调地址，商户自定义自己系统的回调地址
 */
//define("notify_url","http://10.1.210.174:18080/mocknotify/backurl");
/**
 * 网关地址，
 */
//define("masRequestUrl","http://test.gate.yacolpay.com/mas/gateway.do");//网关地址
/**
*
**/
define("debug_status",false);//true 开启日志记录  false 关闭日志记录

?>
