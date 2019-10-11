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
 * 反馈意见管理
 * Class feedback
 * @package app\admin\controller
 */
class Feedback extends BasicAdmin
{

    /**
     * 指定当前数据表
     * @var string
     */
    public $table = 'feedback';

    /**
     * 日志列表
     * @return array|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index(){
        $this->title = '反馈列表';
        $db = Db::name($this->table)->alias('a')->order('a.id desc')
            ->join('adv b','b.id = a.advId','left')
            ->join('member m','a.uid = m.id','left')
            ->join('system_user u','u.id = b.userId','left')
            ->field('a.*,m.phone as mphone,m.realname as mrealname,b.title');

        if (session("user.id")!="10000") {
            $db->where('b.userId',session("user.id"));
        }
        $get = $this->request->get();
        // 会员信息查询过滤
        foreach (['phone','realname'] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where('m.'.$field, 'like', "%{$get[$field]}%");
            }
        }
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("a.add_time", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }

}
