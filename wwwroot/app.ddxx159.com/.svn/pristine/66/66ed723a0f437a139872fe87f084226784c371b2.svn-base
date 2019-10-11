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
 * 后台地区管理控制器
 * Class Area
 * @package app\admin\controller
 */
class Area extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'Areas';

    /**
     * 地区列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '地区管理';
        if (input("get.pid")) {
            $where = array(
                "pid" => input("get.pid/d")
                );
        }else{
            $where = array(
                "pid" => 0
                );
        }
        $db = Db::name($this->table)->order('sort asc,id asc')->where($where)->where('dataFlag',1);
        return parent::_list($db);
    }


    /**
     * 添加地区
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
     * 编辑地区
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
            // 设置上级地区
            if (!isset($vo['pid']) && $this->request->get('pid', '0')) {
                $vo['pid'] = $this->request->get('pid', '0');
            }
        }
    }

    /**
     * 删除地区
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        if (DataService::update($this->table)) {
            $this->success("地区删除成功!", '');
        }
        $this->error("地区删除失败, 请稍候再试!");
    }

    /**
     * 地区禁用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function forbid()
    {
        if (DataService::update($this->table)) {
            $this->success("地区禁用成功!", '');
        }
        $this->error("地区禁用失败, 请稍候再试!");
    }

    /**
     * 地区禁用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resume()
    {
        if (DataService::update($this->table)) {
            $this->success("地区启用成功!", '');
        }
        $this->error("地区启用失败, 请稍候再试!");
    }

}
