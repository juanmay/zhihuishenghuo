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

namespace app\admin\middleware;

use service\NodeService;
use think\Db;
use think\Request;

/**
 * 系统权限访问管理
 * Class Auth
 * @package app\admin\middleware
 */
class Auth
{
    /**
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function handle($request, \Closure $next)
    {
        list($module, $controller, $action) = [$request->module(), $request->controller(), $request->action()];
        $access = $this->buildAuth($node = NodeService::parseNodeStr("{$module}/{$controller}/{$action}"));
        // 登录状态检查
        if (!empty($access['is_login']) && !session('user')) {
            $msg = ['code' => 0, 'msg' => '抱歉，您还没有登录获取访问权限！', 'url' => url('@admin/login')];
            return $request->isAjax() ? json($msg) : redirect($msg['url']);
        }
        // 访问权限检查
        if (!empty($access['is_auth']) && !auth($node)) {
            return json(['code' => 0, 'msg' => '抱歉，您没有访问该模块的权限！']);
        }
        // 模板常量声明
        app('view')->init(config('template.'))->assign(['classuri' => NodeService::parseNodeStr("{$module}/{$controller}")]);
        return $next($request);
    }

    /**
     * 根据节点获取对应权限配置
     * @param string $node 权限节点
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    private function buildAuth($node)
    {
        $info = Db::name('SystemNode')->cache(true, 30)->where(['node' => $node])->find();
        return [
            'is_menu'  => intval(!empty($info['is_menu'])),
            'is_auth'  => intval(!empty($info['is_auth'])),
            'is_login' => empty($info['is_auth']) ? intval(!empty($info['is_login'])) : 1,
        ];
    }
}
