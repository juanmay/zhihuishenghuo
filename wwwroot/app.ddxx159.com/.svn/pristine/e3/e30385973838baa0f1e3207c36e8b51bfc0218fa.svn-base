<?php /*a:2:{s:74:"C:\phpStudy\PHPTutorial\WWW\dscj\application\member\view\member\index.html";i:1560586971;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<form autocomplete="off" onsubmit="return false;" data-auto="true" method="post">
    <?php if(empty($list)): ?>
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <?php else: ?>
    <table class="layui-table" lay-size="sm">
        <thead>
        <tr>
            <th class="text-center nowrap">ID</th>
            <th class="text-center nowrap">头像</th>
            <th class="text-center nowrap">用户手机</th>
            <th class="text-center nowrap">用户姓名</th>
            <th class="text-center nowrap">推广人员</th>
            <th class="text-center nowrap">用户等级</th>
            <th class="text-center nowrap">账户余额</th>
            <th class="text-center nowrap">实名</th>
            <th class="text-center nowrap">用户状态</th>
            <th class="text-center nowrap">注册时间</th>
            <th class="text-center nowrap">登录时间</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class="text-center nowrap"><?php echo htmlentities($vo['id']); ?></td>
            <td class="text-center nowrap">
                <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['avatar']) && ($vo['avatar'] !== '')?$vo['avatar']:'/static/avatar.png')); ?>"/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['phone']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class="text-center nowrap"><?php echo getMember($vo['recommendId']); ?></td>
            <td class="text-center nowrap"><?php echo getMemberLevelName($vo['level']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['accountMoney']); ?></td>
            <td class='text-center'>
                <?php if($vo['realnameStatus'] == 0): ?><span>否</span><?php elseif($vo['realnameStatus'] == 1): ?><span class="color-green">是</span><?php endif; ?>
            </td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span>禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">启用</span><?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['regTime']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['loginTime']); ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>

</div>
</div>

<!-- 右则内容区域 结束 -->