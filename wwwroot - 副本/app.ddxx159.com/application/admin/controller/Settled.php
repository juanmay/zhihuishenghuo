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
 * 资金流水控制器
 * Class Moneylog
 * @package app\admin\controller
 */
class Settled extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'MonthSettled';

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
        $this->title = '结算统计';
        $get = $this->request->get();
        $field=[
            'month',
            "sum(sum1)"=>'sum1',
            "sum(sum2)"=>'sum2',
            "sum(sum3)"=>'sum3',
            "sum(sum4)"=>'sum4',
            "sum(sum5)"=>'sum5',
            "sum(`add`)"=>'add',
            "sum(`minus`)"=>'minus',
            "sum(`balance`)"=>'balance'
        ];
        
        $db = Db::name($this->table)->field($field)->order('id desc')->group('month');
        
        if(isset($get['allmemberId']) && $get['allmemberId'] !== ''){
            $db->where('uid',$get['allmemberId']);
        }else{
            if(!session('user.isAllShow')){
                $db->where('fid',session('user.fid'));
            }
        }
        
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("add_time", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }
}
