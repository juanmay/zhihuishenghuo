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
use think\App;
use think\Db;

/**
 * 收益统计
 * Class Index
 * @package app\admin\controller
 */
class Total extends BasicAdmin
{

    /**
     * 收益统计
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
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
        
        $data = [];
        $data['repayment'] = array(
            "yesterdayMoney" => Db::connect($db_config)->name("repayment_plan")->where("status","2")->where("type","2")->where("run_time","between",(strtotime(date("Y-m-d 00:00:00"))-86400).",".(strtotime(date("Y-m-d 00:00:00"))-1))->sum("money"),
            "yesterdayNum" => Db::connect($db_config)->name("repayment_plan")->where("status","2")->where("type","2")->where("run_time","between",(strtotime(date("Y-m-d 00:00:00"))-86400).",".(strtotime(date("Y-m-d 00:00:00"))-1))->count(),
            "totalMoney" => Db::connect($db_config)->name("repayment_plan")->where("status","2")->where("type","2")->sum("money"),
            "totalNum" => Db::connect($db_config)->name("repayment_plan")->where("status","2")->where("type","2")->count(),
            );
        $data['quick'] = array(
            "yesterdayMoney" => Db::connect($db_config)->name("quick")->where("status","6")->where("add_time","between",date('Y-m-d',(strtotime(date("Y-m-d 00:00:00"))-86400)).",".date('Y-m-d',(strtotime(date("Y-m-d 00:00:00")))))->sum("money"),
            "yesterdayNum" => Db::connect($db_config)->name("quick")->where("status","6")->where("add_time","between",date('Y-m-d',(strtotime(date("Y-m-d 00:00:00"))-86400)).",".date('Y-m-d',(strtotime(date("Y-m-d 00:00:00")))))->count(),
            "totalMoney" => Db::connect($db_config)->name("quick")->where("status","6")->sum("money"),
            "totalNum" => Db::connect($db_config)->name("quick")->where("status","6")->count(),
            );
        $data['users'] = array(
            "yesterdayNum" => Db::connect($db_config)->name("member")->where("dataFlag","1")->where("regTime","between",date("Y-m-d H:i:s",(strtotime(date("Y-m-d 00:00:00"))-86400)).",".date("Y-m-d H:i:s",(strtotime(date("Y-m-d 00:00:00"))-1)))->count(),
            "totalNum" => Db::connect($db_config)->name("member")->where("dataFlag","1")->count(),
            "realnameNum" => Db::connect($db_config)->name("member")->where("realnameStatus","1")->where("dataFlag","1")->count(),
            "yesterdayMoney" => Db::connect($db_config)->name("use_order")->where("status","1")->where("add_time","between",(strtotime(date("Y-m-d 00:00:00"))-86400).",".(strtotime(date("Y-m-d 00:00:00"))-1))->sum("money"),
            );

        $data['total'] = array(
            "feeMoney" => Db::connect($db_config)->name("repayment_plan")->where("status","2")->sum("fee_money")+Db::connect($db_config)->name("quick")->where("status","6")->sum("fee_money"),
            "useMoney" => Db::connect($db_config)->name("use_order")->where("status","1")->sum("money"),
            "bonusMoney" => Db::connect($db_config)->name("member")->where("dataFlag","1")->sum("bonusMoney"),
            );
        $data['total']['sysMoney'] = $data['total']['feeMoney']+$data['total']['useMoney']-$data['total']['bonusMoney'];
        // dump($data);
        return $this->fetch('', ['title' => '收益统计', 'data' => $data]);
    }
    /**
     * 收益统计
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function bing()
    {
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
        
        $data = [];
        $data['total'] = array(
            "feeMoney" => Db::connect($db_config)->name("repayment_plan")->where("status","2")->sum("fee_money")+Db::connect($db_config)->name("quick")->where("status","6")->sum("fee_money"),
            "useMoney" => Db::connect($db_config)->name("use_order")->where("status","1")->sum("money"),
            "bonusMoney" => Db::connect($db_config)->name("member")->where("dataFlag","1")->sum("bonusMoney"),
            );
        $data['total']['sysMoney'] = $data['total']['feeMoney']+$data['total']['useMoney']-$data['total']['bonusMoney'];
        // dump($data);
        return $this->fetch('', ['title' => '收益统计', 'data' => $data]);
    }
}
