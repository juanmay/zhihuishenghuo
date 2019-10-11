<?php
/**
 * Created by PhpStorm.
 * User: zhangyongqiang
 * Date: 17/8/22
 * Time: 16:46
 * demo只是提供一个接口对接编写的思路，具体接口对接商户技术以自身项目的实际情况来进行接口代码的编写。
 */
@include_once( "../api/testtools.class.php");
@include_once("Mimerpay.php");
$deail = new Mimerpay();
$testTools = new TestTools();
switch ($_POST['service'])
{
    //小微商户入网
    case 'mimer_register_merchant':
        $result=$deail->mimer_register_merchant($_POST);
        print_r($result);
        exit;
  break;
    //小微商户绑定结算卡
    case 'mimer_bind_fundout_card':
        $result=$deail->mimer_bind_fundout_card($_POST);
        print_r($result);
        exit;
    break;
    //小微商户信息查询
    case 'mimer_query_merchant':
        $result=$deail->mimer_query_merchant($_POST);
        print_r($result);
        exit;
        break;
    //小微商户账户余额查询
    case 'mimer_query_balance':
        $result=$deail->mimer_query_balance($_POST);
        print_r($result);
        exit;
        break;
    //小微商户卡要素支付
    case 'mimer_bank_card_pay':
        $result=$deail->mimer_bank_card_pay($_POST);
        print_r($result);
        exit;
        break;
    //小微商户支付短信验证
    case 'mimer_advance_pay':
		$result=$deail->mimer_advance_pay($_POST);
        print_r($result);
        exit;
        break;
    //小微商户支付短信重发
    case 'mimer_pay_sms':
        $result=$deail->mimer_pay_sms($_POST);
        print_r($result);
        exit;
        break;
    //小微商户单笔支付订单查询
    case 'mimer_query_single_pay':
        $result=$deail->mimer_query_single_pay($_POST);
        print_r($result);
        exit;
        break;
    //小微商户单笔付款到银行卡
    case 'mimer_single_pay2bank':
        $result=$deail->mimer_single_pay2bank($_POST);
        print_r($result);
        exit;
        break;
    //小微商户单笔代付查询
    case 'mimer_query_single_pay2bank':
        $result=$deail->mimer_query_single_pay2bank($_POST);
        print_r($result);
        exit;
        break;
 default:
        print_r($_POST);
        echo "demo服务接口不正确-";
        exit;

}

?>