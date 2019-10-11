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
 * 后台银行管理控制器
 * Class Bank
 * @package app\admin\controller
 */
class Bank extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'Banks';

    /**
     * 银行列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '银行管理';
        $db = Db::name($this->table)->order('sort asc,id asc')->where('dataFlag',1);
        return parent::_list($db);
    }


    /**
     * 添加银行
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
     * 编辑银行
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
            // 设置上级银行
            if (!isset($vo['pid']) && $this->request->get('pid', '0')) {
                $vo['pid'] = $this->request->get('pid', '0');
            }
        }
    }

    /**
     * 删除银行
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        if (DataService::update($this->table)) {
            $this->success("银行删除成功!", '');
        }
        $this->error("银行删除失败, 请稍候再试!");
    }

    /**
     * 银行禁用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function forbid()
    {
        if (DataService::update($this->table)) {
            $this->success("银行禁用成功!", '');
        }
        $this->error("银行禁用失败, 请稍候再试!");
    }

    /**
     * 银行禁用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resume()
    {
        if (DataService::update($this->table)) {
            $this->success("银行启用成功!", '');
        }
        $this->error("银行启用失败, 请稍候再试!");
    }

}
