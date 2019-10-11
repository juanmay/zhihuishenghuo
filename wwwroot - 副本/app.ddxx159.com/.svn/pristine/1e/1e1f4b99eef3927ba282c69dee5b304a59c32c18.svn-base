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

/**
 * 余额代还管理
 * Class Repayment
 * @package app\admin\controller
 */
class Repayment extends BasicAdmin
{

    /**
     * 指定当前数据表
     * @var string
     */
    public $table = 'Repayment';

    /**
     * 进行中列表
     * @return array|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function running()
    {
        // 余额代还进行中数据库对象
        list($this->title, $get) = ['进行中计划', $this->request->get()];
        
        if(isset($get['allmemberId']) && $get['allmemberId'] !== ''){
            $allmemberId=$get['allmemberId'];
        }else{
            $allmemberId=0;
            $allmember=getAllMember();
            if($allmember){
                $allmemberId=$allmember[0]['id'];
            }
        }
        $this->assign('allmemberId',$allmemberId);
        $db_config=db_config($allmemberId);
        
        $db = Db::connect($db_config)->name($this->table)->alias('a')->where('a.dataFlag',1)
        ->join('member b','a.memberId=b.id','left')
        ->join('credit_card c','a.cardId=c.id','left')
        ->field('a.*,b.realname,b.phone,c.bank_num,c.bank_name')->order('a.id DESC');
        foreach (['phone', 'realname'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('b.'.$key, "%{$get[$key]}%");
            }
        }

        foreach (['channel_type'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->where('a.'.$key, "{$get[$key]}");
            }
        }
        
        foreach (['bank_num'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('c.'.$key, "%{$get[$key]}%");
            }
        }
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("a.add_time", [strtotime("{$start} 00:00:00"), strtotime("{$end} 23:59:59")]);
        }
        return parent::_list($db->where('a.status','in','1'));
    }
    /**
     * 已完成列表
     * @return array|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function finish()
    {
        // 余额代还进行中数据库对象
        list($this->title, $get) = ['已完成计划', $this->request->get()];
        if(isset($get['allmemberId']) && $get['allmemberId'] !== ''){
            $allmemberId=$get['allmemberId'];
        }else{
            $allmemberId=0;
            $allmember=getAllMember();
            if($allmember){
                $allmemberId=$allmember[0]['id'];
            }
        }
        $this->assign('allmemberId',$allmemberId);
        $db_config=db_config($allmemberId);
        
        $db = Db::connect($db_config)->name($this->table)->alias('a')
        ->join('member b','a.memberId=b.id','left')
        ->join('credit_card c','a.cardId=c.id','left')
        ->field('a.*,b.realname,b.phone,c.bank_num,c.bank_name')->order('a.id DESC');
        foreach (['phone', 'realname'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('b.'.$key, "%{$get[$key]}%");
            }
        }

        foreach (['channel_type'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->where('a.'.$key, "{$get[$key]}");
            }
        }
        
        foreach (['bank_num'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('c.'.$key, "%{$get[$key]}%");
            }
        }
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("a.add_time", [strtotime("{$start} 00:00:00"), strtotime("{$end} 23:59:59")]);
        }
        return parent::_list($db->where('a.status','in','2'));
    }
    /**
     * 已失败列表
     * @return array|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function fail()
    {
        // 余额代还进行中数据库对象
        list($this->title, $get) = ['已失败计划', $this->request->get()];
        if(isset($get['allmemberId']) && $get['allmemberId'] !== ''){
            $allmemberId=$get['allmemberId'];
        }else{
            $allmemberId=0;
            $allmember=getAllMember();
            if($allmember){
                $allmemberId=$allmember[0]['id'];
            }
        }
        $this->assign('allmemberId',$allmemberId);
        $db_config=db_config($allmemberId);
        
        $db = Db::connect($db_config)->name($this->table)->alias('a')
        ->join('member b','a.memberId=b.id','left')
        ->join('credit_card c','a.cardId=c.id','left')
        ->field('a.*,b.realname,b.phone,c.bank_num,c.bank_name')->order('a.id DESC');
        foreach (['phone', 'realname'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('b.'.$key, "%{$get[$key]}%");
            }
        }

        foreach (['channel_type'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->where('a.'.$key, "{$get[$key]}");
            }
        }
        
        foreach (['bank_num'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('c.'.$key, "%{$get[$key]}%");
            }
        }
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("a.add_time", [strtotime("{$start} 00:00:00"), strtotime("{$end} 23:59:59")]);
        }
        return parent::_list($db->where('a.status','in','3'));
    }
    /**
     * 已取消列表
     * @return array|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function cancel()
    {
        // 余额代还进行中数据库对象
        list($this->title, $get) = ['已取消计划', $this->request->get()];
        if(isset($get['allmemberId']) && $get['allmemberId'] !== ''){
            $allmemberId=$get['allmemberId'];
        }else{
            $allmemberId=0;
            $allmember=getAllMember();
            if($allmember){
                $allmemberId=$allmember[0]['id'];
            }
        }
        $this->assign('allmemberId',$allmemberId);
        $db_config=db_config($allmemberId);
        
        $db = Db::connect($db_config)->name($this->table)->alias('a')
        ->join('member b','a.memberId=b.id','left')
        ->join('credit_card c','a.cardId=c.id','left')
        ->field('a.*,b.realname,b.phone,c.bank_num,c.bank_name')->order('a.id DESC');
        foreach (['phone', 'realname'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('b.'.$key, "%{$get[$key]}%");
            }
        }

        foreach (['channel_type'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->where('a.'.$key, "{$get[$key]}");
            }
        }
        
        foreach (['bank_num'] as $key) {
            if(isset($get[$key]) && $get[$key] !== ''){
                $db->whereLike('c.'.$key, "%{$get[$key]}%");
            }
        }
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("a.add_time", [strtotime("{$start} 00:00:00"), strtotime("{$end} 23:59:59")]);
        }
        return parent::_list($db->where('a.status','in','0'));
    }
    // 查看详情
    public function info(){
        $allmemberId=input('get.allmemberId/d',0);
        $db_config=db_config($allmemberId);
        $info = Db::connect($db_config)->name($this->table)->alias('a')
        ->join('member b','a.memberId=b.id','left')
        ->join('credit_card c','a.cardId=c.id','left')
        ->field('a.*,b.realname,b.phone,b.idcard,c.bank_num,c.bank_name')
        ->where('a.id',input('get.id/d',0))
        ->find();
        // 详情数据库对象
        $where=[
            'repaymentId'=>input('get.id/d',0)
        ];
        list($this->title, $get) = ['计划详情', $this->request->get()];
        $db = Db::connect($db_config)->name($this->table.'_plan')->order('sort ASC');

        // 状态
        $status = array(
            "0" => "未执行",
            "1" => "执行中",
            "2" => "已成功",
            "3" => "已失败",
        );

        $this->assign('status',$status);
        $this->assign('info',$info);
        return parent::_list($db->where($where),false);
    }
}
