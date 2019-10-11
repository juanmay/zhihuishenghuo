<?php
namespace kubao\batchpay;
use kubao\batchpay\Testtools;
use kubao\batchpay\Controllerdeail as controller_deail;
/**
 * Created by PhpStorm.
 * User: zhangyongqiang
 * Date: 17/8/22
 * Time: 16:46
 * demo只是提供一个接口对接编写的思路，具体接口对接商户技术以自身项目的实际情况来进行接口代码的编写。
 */
//@include_once( "Testtools.php");
//@include_once("controller_deail.php");
$deail = new controller_deail();
$testTools = new TestTools();
switch ($_POST['service'])
{
    //批量付款到银行卡
    case 'create_batch_pay2bank':
        $result=$deail->create_batch_pay2bank($_POST);
        print_r($result);
        exit;
    break;
    //出款查询
    case 'query_b2c_batch_fundout_order':
        $result=$deail->query_b2c_batch_fundout_order($_POST);
        print_r($result);
        exit;
    break;
 default:
        print_r($_POST);
        echo "demo服务接口不正确-";
        exit;

}

?>