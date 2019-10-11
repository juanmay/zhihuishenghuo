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
use service\NodeService;
use service\ToolsService;
use think\Db;

/**
 * 后台用户收款控制器
 * Class Quick
 * @package app\admin\controller
 */
class Quick extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'Quick';

    /**
     * 收款列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '收款列表';
        $get = $this->request->get();
        
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
        
        $db = Db::connect($db_config)->name($this->table)->alias('q')->join('member m','m.id=q.memberId','inner')->order('q.id desc')->field("q.*,m.realname,m.phone");
        
        // 信息查询过滤
        foreach (['phone', 'realname'] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where("m.".$field, 'like', "%{$get[$field]}%");
            }
        }

        foreach (['order_no',"type"] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where("q.".$field, 'like', "%{$get[$field]}%");
            }
        }

        (isset($get['status']) && $get['status'] !== '') && $db->where('q.status', $get['status']);

        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("q.add_time", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }

    public function info(){
        $this->title = '收款详情';
        $id = input('get.id/d');
        $allmemberId = input('get.allmemberId/d');
        $this->assign('allmemberId',$allmemberId);
        $db_config=db_config($allmemberId);
        
        $info = Db::connect($db_config)->name($this->table)->where("id",$id)->find();
        if (!$info) {
            $this->error('参数有误, 请稍候再试!');
        }
        $info['credit_card_num'] = Db::connect($db_config)->name('credit_card')->where("id",$info['creditid'])->value("bank_num");
        $info['debit_card_num'] = Db::connect($db_config)->name('debit_card')->where("id",$info['debitid'])->value("bank_num");
        $info['credit_card_name'] = Db::connect($db_config)->name('credit_card')->where("id",$info['creditid'])->value("bank_name");
        $info['debit_card_name'] = Db::connect($db_config)->name('debit_card')->where("id",$info['debitid'])->value("bank_name");
        $info['realname'] = Db::connect($db_config)->name("member")->where('id',$info['memberId'])->value('realname');
        $info['idcard'] = Db::connect($db_config)->name("member")->where('id',$info['memberId'])->value('idcard');
        $info['phone'] = Db::connect($db_config)->name("member")->where('id',$info['memberId'])->value('phone');
        return $this->fetch('info', ['info' => $info]);
    }

    public function repay(){
        $this->title = '收款详情';
        $id = input('get.id/d');
        $info = Db::name($this->table)->where("id",$id)->find();
        if ($info['status']!='5') {
            $this->success("操作成功!", '');
        }else{
            $re = Db::name($this->table)->where("id",$id)->setField("status",3);
            if ($re) {
                $this->success("操作成功!", '');
            }else{
                $this->error("操作失败，请重试!", '');
            }
        }
    }


}
