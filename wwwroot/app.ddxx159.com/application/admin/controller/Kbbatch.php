<?php
namespace app\admin\controller;

use think\Controller;

class Kbbatch extends Controller
{
    public function BatchPay2bank($data,$allMemberId)
    {
        $postData = getYfParams($data,"YBKR".date("YmdHis").rand(1000,9999),'KBBATCHPAY',$allMemberId);
        $re = postYfData($postData, "http://api.iyunpay.cn/index/Kbbatchpay/createBatchPay2bank.html");
        notifyMsg('提现结果查询',array('BatchPay2bank'=>$re), 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 'OK');
        
        //dump($re);
        $res = json_decode($re,true);
        $res = json_decode($res['data'],true);
        return $res;
    }
}