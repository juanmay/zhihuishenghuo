<?php /*a:2:{s:71:"C:\phpStudy\PHPTutorial\WWW\dscj\application\agent\view\index\main.html";i:1548308490;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">

<table class="layui-table" lay-even lay-skin="line">
    <colgroup>
        <col width="20%">
        <col width="30%">
        <col width="20%">
        <col width="30%">
    </colgroup>
    <thead>
    <tr>
        <th class="text-left" colspan="2">系统信息</th>
        <th class="text-left" colspan="2">产品团队</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="nowrap">ThinkPHP 版本</td>
        <td class="nowrap"><?php echo htmlentities($think_ver); ?></td>
        <td class="nowrap">产品名称</td>
        <td class="nowrap">信用卡代还系统</td>
    </tr>
    <tr>
        <td class="nowrap">服务器操作系统</td>
        <td class="nowrap"><?php echo php_uname('s'); ?></td>
        <td class="nowrap">WEB运行环境</td>
        <td class="nowrap"><?php echo php_sapi_name(); ?></td>
    </tr>
    <tr>
        <td class="nowrap">MySQL数据库版本</td>
        <td class="nowrap"><?php echo htmlentities($mysql_ver); ?></td>
        <td class="nowrap">BUG反馈</td>
        <td class="nowrap">
            <a target="_blank" href="http://diyunkeji.com">
                http://diyunkeji.com
            </a>
        </td>
    </tr>
    <tr>
        <td class="nowrap">运行PHP版本</td>
        <td class="nowrap"><?php echo htmlentities(PHP_VERSION); ?></td>
        <td class="nowrap">上传大小限制</td>
        <td class="nowrap"><?php echo ini_get('upload_max_filesize'); ?></td>
    </tr>
    <tr>
        <td class="nowrap">POST大小限制</td>
        <td class="nowrap"><?php echo ini_get('post_max_size'); ?></td>
        <td class="nowrap">公司地址</td>
        <td class="nowrap">山东省 济南市 天桥区 历山北路 黄台电子商务产业园</td>
    </tr>
    <tr>
        <td class="nowrap">客服电话</td>
        <td class="nowrap">0531-58188127</td>
        <td class="nowrap"></td>
        <td class="nowrap"></td>
    </tr>
    </tbody>
</table>
</div>
</div>

<!-- 右则内容区域 结束 -->