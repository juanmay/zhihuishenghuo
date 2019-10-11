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
 * 系统日志管理
 * Class Log
 * @package app\admin\controller
 */
class Log extends BasicAdmin
{

    /**
     * 指定当前数据表
     * @var string
     */
    public $table = 'SystemLog';

    /**
     * 日志列表
     * @return array|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        // 日志行为类别
        $actions = Db::name($this->table)->group('action')->column('action');
        $this->assign('actions', $actions);
        // 日志数据库对象
        list($this->title, $get) = ['系统操作日志', $this->request->get()];
        $db = Db::name($this->table)->order('id desc')->where('dataFlag',1);
        foreach (['action', 'content', 'username'] as $key) {
            (isset($get[$key]) && $get[$key] !== '') && $db->whereLike($key, "%{$get[$key]}%");
        }
        if (isset($get['create_at']) && $get['create_at'] !== '') {
            list($start, $end) = explode(' - ', $get['create_at']);
            $db->whereBetween('create_at', ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }

    /**
     * 列表数据处理
     * @param array $data
     * @throws \Exception
     */
    protected function _index_data_filter(&$data)
    {
        $ip = new \Ip2Region();
        foreach ($data as &$vo) {
            $result = $ip->btreeSearch($vo['ip']);
            $vo['isp'] = isset($result['region']) ? $result['region'] : '';
            $vo['isp'] = str_replace(['内网IP', '0', '|'], '', $vo['isp']);
        }
    }

    /**
     * 日志删除操作
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        if (DataService::update($this->table)) {
            $this->success("日志删除成功!", '');
        }
        $this->error("日志删除失败, 请稍候再试!");
    }

}
