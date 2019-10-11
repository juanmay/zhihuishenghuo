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
 * 后台推广管理控制器
 * Class Adv
 * @package app\admin\controller
 */
class Adv extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'Adv';

    /**
     * 推广列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '推广列表';
        $db = Db::name($this->table)->alias('a')->join("system_user u","u.id=a.userId",'inner')->order('a.id desc')->where('a.dataFlag',1)->field("a.*,u.username");
        if (session("user.id")!="10000") {
            $db->where('a.userId',session("user.id"));
        }
        $get = $this->request->get();
        // 会员信息查询过滤
        foreach (['title',"type","cate"] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where("a.".$field, 'like', "%{$get[$field]}%");
            }
        }
        // 状态
        (isset($get['status']) && $get['status'] !== '') && $db->where('a.status', $get['status']);
        (isset($get['username']) && $get['username'] !== '') && $db->where("u.username", 'like', "%{$get['username']}%");;
        
        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("add_time", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }


    /**
     * 添加推广
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function add()
    {
        return $this->_form($this->table, 'form');
    }

    /**
     * 编辑推广
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function edit()
    {
        return $this->_form($this->table, 'form');
    }

    /**
     * 表单数据前缀方法
     * @param array $vo
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    protected function _form_filter(&$vo)
    {
        if ($this->request->isGet()) {
            // 设置上级推广
        }
    }

    /**
     * 删除推广
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        if (DataService::update($this->table)) {
            $this->success("推广删除成功!", '');
        }
        $this->error("推广删除失败, 请稍候再试!");
    }

    /**
     * 推广隐藏
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function forbid()
    {
        if (DataService::update($this->table)) {
            $this->success("推广隐藏成功!", '');
        }
        $this->error("推广隐藏失败, 请稍候再试!");
    }

    /**
     * 推广显示
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resume()
    {
        if (DataService::update($this->table)) {
            $this->success("推广显示成功!", '');
        }
        $this->error("推广显示失败, 请稍候再试!");
    }

}
