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

use think\facade\Route;

// 不执行下面的路由
return [];

/*  测试环境禁止操作路由绑定 */
Route::post('admin/user/pass', function () {
    return json(['code' => 0, 'msg' => '测试环境禁修改用户密码！']);
});
Route::post('admin/index/pass', function () {
    return json(['code' => 0, 'msg' => '测试环境禁修改用户密码！']);
});
Route::post('admin/config/index', function () {
    return json(['code' => 0, 'msg' => '测试环境禁修改系统配置操作！']);
});
Route::post('admin/config/file', function () {
    return json(['code' => 0, 'msg' => '测试环境禁修改文件配置操作！']);
});
Route::post('admin/menu/index', function () {
    return json(['code' => 0, 'msg' => '测试环境禁排序菜单操作！']);
});
Route::post('admin/menu/add', function () {
    return json(['code' => 0, 'msg' => '测试环境禁添加菜单操作！']);
});
Route::post('admin/menu/edit', function () {
    return json(['code' => 0, 'msg' => '测试环境禁编辑菜单操作！']);
});
Route::post('admin/menu/forbid', function () {
    return json(['code' => 0, 'msg' => '测试环境禁止禁用菜单操作！']);
});
Route::post('admin/menu/del', function () {
    return json(['code' => 0, 'msg' => '测试环境禁止删除菜单操作！']);
});
Route::post('wechat/config/index', function () {
    return json(['code' => 0, 'msg' => '测试环境禁止修改微信配置操作！']);
});
Route::post('admin/node/save', function () {
    return json(['code' => 0, 'msg' => '测试环境禁止修改节点数据操作！']);
});

