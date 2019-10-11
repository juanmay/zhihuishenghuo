<?php /*a:1:{s:84:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\member\downrecommend.html";i:1560846688;}*/ ?>
<form autocomplete="off" onsubmit="return false;" data-auto="true" method="post">
    <?php if(empty($list)): ?>
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <?php else: ?>
    <table class="layui-table" lay-size="sm">
        <thead>
        <tr>
            <th class="text-center nowrap">头像</th>
            <th class="text-center nowrap">用户手机</th>
            <th class="text-center nowrap">用户姓名</th>
            <th class="text-center nowrap">用户等级</th>
            <th class="text-center nowrap">账户余额</th>
            <th class="text-center nowrap">冻结余额</th>
            <th class="text-center nowrap">累计收益</th>
            <th class="text-center nowrap">实名状态</th>
            <th class="text-center nowrap">用户状态</th>
            <th class="text-center nowrap">注册时间</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class="text-center nowrap">
                <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['avatar']) && ($vo['avatar'] !== '')?$vo['avatar']:'/static/avatar.png')); ?>"/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['phone']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class="text-center nowrap"><?php echo getMemberLevelName($vo['level'],$allmemberId); ?></td>
            <td class="text-center nowrap">￥<?php echo htmlentities($vo['accountMoney']); ?></td>
            <td class="text-center nowrap">￥<?php echo htmlentities($vo['freezeMoney']); ?></td>
            <td class="text-center nowrap">￥<?php echo htmlentities($vo['bonusMoney']); ?></td>
            <td class='text-center'>
                <?php if($vo['realnameStatus'] == 0): ?><span>未实名</span><?php elseif($vo['realnameStatus'] == 1): ?><span class="color-green">已实名</span><?php endif; ?>
            </td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span>禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">启用</span><?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['regTime']); ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>