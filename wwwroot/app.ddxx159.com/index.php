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

namespace think;

// 加载基础文件
require __DIR__ . '/thinkphp/base.php';

// think文件检查，防止TP目录计算异常
file_exists('think') || touch('think');

//当前域名
define('SITE_URL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']);
// 执行应用并响应
Container::get('app', [__DIR__ . '/application/'])->run()->send();