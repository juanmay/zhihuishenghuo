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
 * 系统功能节点管理
 * Class Node
 * @package app\admin\controller
 */
class Node extends BasicAdmin
{

    /**
     * 指定当前默认模型
     * @var string
     */
    public $table = 'SystemNode';

    /**
     * 显示节点列表
     * @return string
     */
    public function index()
    {
        $nodes = ToolsService::arr2table(NodeService::get(), 'node', 'pnode');
        $groups = [];
        foreach ($nodes as $node) {
            $pnode = explode('/', $node['node'])[0];
            if ($node['node'] === $pnode) {
                $groups[$pnode]['node'] = $node;
            }
            $groups[$pnode]['list'][] = $node;
        }
        return $this->fetch('', ['title' => '系统节点管理', 'nodes' => $nodes, 'groups' => $groups]);
    }

    /**
     * 清理无效的节点记录
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function clear()
    {
        $nodes = array_keys(NodeService::get());
        if (false !== Db::name($this->table)->whereNotIn('node', $nodes)->delete()) {
            $this->success('清理无效节点记录成功！', '');
        }
        $this->error('清理无效记录失败，请稍候再试！');
    }

    /**
     * 保存节点变更
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function save()
    {
        if ($this->request->isPost()) {
            list($post, $data) = [$this->request->post(), []];
            foreach ($post['list'] as $vo) {
                if (!empty($vo['node'])) {
                    $data['node'] = $vo['node'];
                    $data[$vo['name']] = $vo['value'];
                }
            }
            !empty($data) && DataService::save($this->table, $data, 'node');
            $this->success('参数保存成功！', '');
        }
        $this->error('访问异常，请重新进入...');
    }

}
