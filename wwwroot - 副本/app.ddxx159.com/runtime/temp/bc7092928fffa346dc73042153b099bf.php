<?php /*a:2:{s:68:"D:\wwwroot\app.ddxx159.com\application\admin\view\settled\index.html";i:1569753523;s:69:"D:\wwwroot\app.ddxx159.com\application\admin\view\public\content.html";i:1569753523;}*/ ?>
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
        <label class="layui-form-label">结算时间</label>
        <div class="layui-input-inline">
            <input name="add_time" data-time value="<?php echo htmlentities(app('request')->get('add_time')); ?>" placeholder="请选择交易时间" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>

</form>
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
            <th class="text-center nowrap">结算日期</th>
            <th class="text-center nowrap">盈利金额</th>
            <th class="text-center nowrap">充值余额</th>
            <th class="text-center nowrap">提现金额</th>
            <th class="text-center nowrap">扣减金额</th>
            <th class="text-center nowrap">消耗金额</th>
            <th class="text-center nowrap">加共计</th>
            <th class="text-center nowrap">减共计</th>
            <th class="text-center nowrap">总计</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class="text-center nowrap"><?php echo htmlentities($vo['month']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['sum1']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['sum2']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['sum3']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['sum4']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['sum5']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['add']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['minus']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['balance']); ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>

</div>
</div>

<!-- 右则内容区域 结束 -->