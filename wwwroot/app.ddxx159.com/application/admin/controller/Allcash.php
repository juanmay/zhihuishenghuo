<?php

// +------------------------------------------------------------------
// | 信用卡代还管理系统
// +------------------------------------------------------------------
// | 版权所有 2015~2025 山东帝云信息科技有限公司
// +------------------------------------------------------------------
// | 官方网站: http://www.diyunkeji.com 
// +------------------------------------------------------------------
// | 开发人员 ：PHP-Navy
// +------------------------------------------------------------------
// |     这不是一个自由软件！未经本公司授权您只能在不用于商业目的
// | 的前提下对程序代码进行修改和使用；不允许对程序代码以任何形式
// | 任何目的的再发布。
// +------------------------------------------------------------------

namespace app\admin\controller;

use controller\BasicAdmin;
use service\DataService;
use think\Db;
use app\admin\controller\Kbbatch as Kbbatch;
/**
 * 提现管理控制器
 * Class Cash
 * @package app\admin\controller
 */
class Allcash extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'Allcash';

    /**
     * 提现列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '提现申请';
        
        $db = Db::name($this->table)->order('id desc');
        $get = $this->request->get();
        // 信息查询过滤
        foreach (['phone', 'realname', "bank_num", "order_no", "type"] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where($field, 'like', "%{$get[$field]}%");
            }
        }
        // 状态
        (isset($get['status']) && $get['status'] !== '') && $db->where('status', $get['status']);
        
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("add_time", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }
    /**
     * 通过
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function succ()
    {
        if ($this->request->isPost()) {
            $request = app('request');
            
            $cashId=$request->post('id', '');
            $data=[
                'deal_info'=>'打款中',
                'status'=>1,
                'deal_time'=>date('Y-d-m H:i:s'),
                'deal_ip'=>getIP()
            ];
            $re=Db::name($this->table)->where('id',$cashId)->update($data);
            
            if($re !== false){
                $cash=Db::name($this->table)->where('id',$cashId)->find();
                
                $allmember=Db::name('allmember')->where('id',$cash['uid'])->find();
                
                $money=$cash['money'];
                
                $cash_money=$cash['money']-$cash['fee_money'];
                $order_no="KB".date("Ymdhis"). str_pad(mt_rand(1, 99999), 4, '0', STR_PAD_LEFT).'_'.$allmember['mysqlName'];
                $bank = Db::name("banks")->where(['number'=>$cash['bank_number']])->find();
                //dump($bank);
                $data=[
                    'orderNo'=>$order_no,
                    'detail_list'=>[
                        time().'p1^'.$cash['realname'].'^'.$cash['idcard'].'^'.$cash['bank_num'].'^'.$cash['bank_name'].'^'.$bank['kb_code'].'^'.$cash['province'].'^'.$cash['city'].'^'.$cash['bank_name'].'^'.$cash_money.'^C^DEBIT^TEST'
                    ],//
                    //'notify_url'=>SITE_URL.URL('index/Kbnotify/kb_notifyUrl') //异步回调
                    'notify_url'=>'http://dscj.diyunkeji.com'.URL('index/Kbnotify/kb_notifyUrl') //异步回调
                ];
                //dump($data);//exit;
                $Kbbatch=new Kbbatch();
                $result=$Kbbatch->BatchPay2bank($data,$cash['uid']);
                //dump($result);exit;
                if($result['status'] == 'APPLY_SUCCESS'){
                    $data=[
                        'status'=>1,
                        'order_no2'=>$order_no,
                        'lanno'=>$result['data']['batch_no'],
                        'deal_info'=>$result['msg'],
                        'deal_time'=>date('Y-d-m H:i:s'),
                        'deal_ip'=>getIP()
                    ];
                    $re=Db::name($this->table)->where('id',$cashId)->update($data);
                    
                    /* $dataPay=[
                        'uid'=>$cash['uid'],
                        'type'=>$cash['type'],
                        'cashId'=>$cash['id'],
                        'order_no'=>$cash['order_no'],
                        'order_no2'=>$order_no,
                        'lanno'=>$result['data']['batch_no'],
                        'money'=>$cash['money'],
                        'fee_money'=>$cash['fee_money'],
                        'fb_fee_money'=>$cash['fee_money'],
                        'status'=>1,
                        'database'=>Config('database.database'),
                        'allmemberId'=>$allmember['id'],
                        'deal_info'=>'',
                        'deal_time'=>'',
                    ];
                    Db::name('kbbatch_log')->insert($dataPay); */
                    
                    $this->success("放款成功!", '');
                }else{
                    
                    $data=[
                        'status'=>0,
                        'order_no2'=>$order_no,
                        'lanno'=>$result['data']['batch_no'],
                        'deal_info'=>$result['msg'],
                        'deal_time'=>date('Y-d-m H:i:s'),
                        'deal_ip'=>getIP()
                    ];
                    $re=Db::name($this->table)->where('id',$cashId)->update($data);
                    
                    if($re !== false){
                        $this->error("放款失败, 请稍候再试!");
                    }
                    $this->error("放款失败, 请稍候再试!");
                }
            }else{
                $this->error("放款失败, 提现申请状态有误!");
            }
        }
    }
    /**
     * 驳回
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function fail()
    {
        if (DataService::update($this->table) !== false) {
            $request = app('request');
            $cashId=$request->post('id', '');
            
            $cash=Db::name($this->table)->where('id',$cashId)->find();
            $allmember=Db::name('allmember')->where('id',$cash['uid'])->find();
            $money=$cash['money'];
            
            $data=[
                'status'=>2,
                'deal_info'=>'提现驳回',
                'deal_time'=>date('Y-d-m H:i:s'),
                'deal_ip'=>getIP()
            ];
            $re=Db::name($this->table)->where('id',$cashId)->update($data);
            
            
            if($re !== false){
                $db_config=db_config($allmember['id']);
                allmember_moneylog($allmember['id'],$money,"提现驳回，资金解冻",4,$cash['uid'],$cash['type'],$db_config);
                
                $this->success("操作成功!", '');
            }else{
                $this->error("操作失败, 请稍候再试!");
            }
        }
        $this->error("操作失败, 请稍候再试!");
    }
}
