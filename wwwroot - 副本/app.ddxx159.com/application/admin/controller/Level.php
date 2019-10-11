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
 * 后台等级管理控制器
 * Class Level
 * @package app\admin\controller
 */
class Level extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'member_level';

    /**
     * 等级列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '等级列表';
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
        
        $db = Db::connect($db_config)->name($this->table)->order('sort DESC,id desc')->where('dataFlag',1);
        
        // 会员信息查询过滤
        foreach (['title'] as $field) {
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
    // 升级奖励
    public function cost(){
        $allmemberId=input('get.allmemberId/d',0);
        $db_config=db_config($allmemberId);
        $levels = Db::connect($db_config)->name($this->table)->order('sort DESC,id desc')->where('dataFlag',1)->field("id,name")->select();
        $info = Db::connect($db_config)->name($this->table)->where("dataFlag",1)->where("id",input("id/d"))->find();
        if ($info['cost']) {
            $info['cost'] = unserialize($info['cost']);
        }
        // dump($info);
        foreach ($levels as  &$val) {
            if (isset($info['cost']['id_'.$val['id']])) {
                $val['cost_money'] = $info['cost']['id_'.$val['id']];
            }else{
                $val['cost_money'] = "0.00";
            }
        }
        $this->assign("levels",$levels);
        $this->assign("info",$info);
        return $this->fetch();
    }

}
