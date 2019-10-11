<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
/**
 * 品牌提现
 * 
 * */
class Kbnotify extends Controller
{
    public function kb_notifyUrl()
    {
        notifyMsg('酷宝代付',array('pay'=>$_POST), 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 'OK');
        $result=$_POST;
        /* $result=Db::name('notify')->where(['id'=>119])->value('data');
        $result=json_decode($result,true);
        $result=$result['pay']; */
        $type=explode("~",$result['trade_list']);
        if($result['notify_type'] == 'b2c_batch_pay2bank_status_sync'){
            $recash=Db::name('allcash')->where('lanno',$result['batch_no'])->find();
            if($type[4]=="SUCCESS"){
                $data=[
                    'status'=>4,
                    'deal_info'=>$type[7],
                    'deal_time'=>date('Y-d-m H:i:s'),
                    'deal_ip'=>getIP()
                ];
                $re=Db::name('allcash')->where('id',$recash['id'])->update($data);
                if($re !== false){
                    $allmember=Db::name('allmember')->where('id',$recash['uid'])->find();
                    $db=db_config($allmember['mysqlName']);
                    allmember_moneylog($recash['uid'],$recash['money'],"提现成功",3,0,$recash['type'],$db);
                
                }
                
            }elseif($type[4]=="FAILED"){
                $data=[
                    'status'=>0,
                    'deal_info'=>$type[7],
                    'deal_time'=>date('Y-d-m H:i:s'),
                    'deal_ip'=>getIP()
                ];
                $re=Db::name('allcash')->where('id',$recash['id'])->update($data);
            }
        }
    }
}