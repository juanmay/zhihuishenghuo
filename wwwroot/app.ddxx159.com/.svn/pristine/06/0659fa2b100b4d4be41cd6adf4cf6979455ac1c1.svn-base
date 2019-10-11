<?php /*a:2:{s:73:"C:\phpStudy\PHPTutorial\WWW\dscj\application\member\view\group\money.html";i:1560586708;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<!-- 表单搜索 开始 -->
<form autocomplete="off" class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户手机</label>
        <div class="layui-input-inline">
            <input name="phone" value="<?php echo htmlentities(app('request')->get('phone')); ?>" placeholder="请输入用户手机" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户姓名</label>
        <div class="layui-input-inline">
            <input name="realname" value="<?php echo htmlentities(app('request')->get('realname')); ?>" placeholder="请输入用户姓名" class="layui-input">
        </div>
    </div>
    
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户等级</label>
        <div class="layui-input-inline">
            <select name="level" class="layui-select">
                <option value="">所有用户</option>
                <!--<?php foreach(getMemberLevel() as $v): ?>-->
                <?php if(app('request')->get('level') == $v['id']): ?>
                <option selected="selected" value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['name']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['name']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>


    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">时间范围</label>
        <div class="layui-input-inline">
            <input name="add_time" data-time value="<?php echo htmlentities(app('request')->get('add_time')); ?>" placeholder="请选择时间范围" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>
</form>
    <?php if (input('id')>0): ?>
    <div class="layui-form-item layui-inline">
        <button class="layui-btn layui-btn-primary" onclick="javascript:location.href='<?php echo URL("/member.html#/member/achievement/index"); ?>?spm=<?php echo input('spm'); ?>';"><i class="layui-icon">&#xe603;</i> 返 回</button>
    </div>
    <?php endif ?>
<script>
    window.form.render();
    $('[data-time]').map(function () {
        window.laydate.render({range: true, elem: this});
    });
</script>
<!-- 表单搜索 结束 -->

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
            <th class="text-center nowrap">推荐人</th>
            <th class="text-center nowrap">用户等级</th>
            <th class="text-center nowrap">奖励金额</th>
            <th class="text-center nowrap">操作</th>
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
            <td class="text-center nowrap"><?php echo getMember($vo['recommendId']); ?></td>
            <td class="text-center nowrap"><?php echo getMemberLevelName($vo['level']); ?></td>
            <td class="text-center nowrap">￥<?php echo htmlentities(sprintf("%.2f",$vo['money'])); ?></td>
            <td class='text-center notselect'>
                <a href='<?php echo URL("/member.html#/member/group/money"); ?>?spm=<?php echo input('spm'); ?>&id=<?php echo htmlentities($vo['id']); ?>'>查看名下用户</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>

</div>
</div>

<!-- 右则内容区域 结束 -->