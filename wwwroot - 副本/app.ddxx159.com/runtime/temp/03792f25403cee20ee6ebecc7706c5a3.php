<?php /*a:2:{s:65:"D:\wwwroot\app.ddxx159.com\application\admin\view\index\main.html";i:1569753522;s:69:"D:\wwwroot\app.ddxx159.com\application\admin\view\public\content.html";i:1569753523;}*/ ?>
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
    <?php if((session("user.id")=="10000")): ?>
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
        <td class="nowrap">开发公司</td>
        <td class="nowrap">山东帝云信息科技有限公司</td>
    </tr>
    <tr>
        <td class="nowrap">客服电话</td>
        <td class="nowrap">0531-58188127</td>
        <td class="nowrap">公司地址</td>
        <td class="nowrap">山东省 济南市 天桥区 历山北路 黄台电子商务产业园1501室</td>
    </tr>
    <?php else: ?>
    <tr>
        <td class="nowrap">客服电话</td>
        <td class="nowrap"><?php echo sysconf("serviceTel"); ?></td>
        <td class="nowrap">企业官网</td>
        <td class="nowrap"><?php echo sysconf("webUrl"); ?></td>
    </tr>
    <tr>
        <td class="nowrap">客服微信</td>
        <td class="nowrap"><?php echo sysconf("serviceWX"); ?></td>
        <td class="nowrap">客服时间</td>
        <td class="nowrap"><?php echo sysconf("workTime"); ?></td>
    </tr>
    <tr>
        <td class="nowrap">微信公众号</td>
        <td class="nowrap"><?php echo sysconf("wechat"); ?></td>
        <td class="nowrap">客服邮箱</td>
        <td class="nowrap"><?php echo sysconf("email"); ?></td>
    </tr>
    <tr>
        <td class="nowrap">客服QQ</td>
        <td class="nowrap"><?php echo sysconf("serviceQQ1"); ?></td>
        <td class="nowrap">客服QQ</td>
        <td class="nowrap"><?php echo sysconf("serviceQQ2"); ?></td>
    </tr>
    <tr>
        <td class="nowrap">网站备案</td>
        <td class="nowrap"><?php echo sysconf("miitbeian"); ?></td>
        <td class="nowrap">版权信息</td>
        <td class="nowrap"><?php echo sysconf("site_copy"); ?></td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>
</div>
</div>

<!-- 右则内容区域 结束 -->