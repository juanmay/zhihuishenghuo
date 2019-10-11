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
use service\LogService;
use think\Db;

/**
 * 后台参数配置控制器
 * Class About
 * @package app\admin\controller
 */
class Cost extends BasicAdmin
{

    /**
     * 当前默认数据模型
     * @var string
     */
    public $table = 'Cost';

    /**
     * 当前页面标题
     * @var string
     */
    public $title = '品牌费用成本';

    /**
     * 显示系统常规配置
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $info=Db::name('cost')->where(['id'=>1])->find();
        $this->assign('vo',$info);
        return $this->fetch('index');
    }
}
