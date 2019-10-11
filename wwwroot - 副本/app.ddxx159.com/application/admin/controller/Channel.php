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

/**
 * 渠道配置控制器
 * Class Channel
 * @package app\admin\controller
 */
class Channel extends BasicAdmin
{

    /**
     * 当前默认数据模型
     * @var string
     */
    public $table = 'SystemConfig';

    /**
     * 当前页面标题
     * @var string
     */
    public $title = '';

    /**
     * 渠道配置
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $this->title = '渠道设置';
        if ($this->request->isGet()) {
            return $this->fetch('', ['title' => $this->title]);
        }
        if ($this->request->isPost()) {
            foreach ($this->request->post() as $key => $vo) {
                sysconf($key, $vo);
            }
            LogService::write('渠道设置', '渠道设置成功');
            $this->success('渠道设置成功！', '');
        }
    }

    /**
     * 渠道配置
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function fee()
    {
        $this->title = '费用设置';
        if ($this->request->isGet()) {
            return $this->fetch('', ['title' => $this->title]);
        }
        if ($this->request->isPost()) {
            foreach ($this->request->post() as $key => $vo) {
                sysconf($key, $vo);
            }
            LogService::write('费用设置', '费用设置成功');
            $this->success('费用设置成功！', '');
        }
    }

}
