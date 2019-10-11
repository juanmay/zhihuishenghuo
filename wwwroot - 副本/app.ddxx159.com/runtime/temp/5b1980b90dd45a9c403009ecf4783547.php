<?php /*a:2:{s:75:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\level\index.html";i:1560851868;s:78:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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
        <label class="layui-form-label">等级名称</label>
        <div class="layui-input-inline">
            <input name="name" value="<?php echo htmlentities(app('request')->get('name')); ?>" placeholder="请输入等级名称" class="layui-input">
        </div>
    </div>

	<div class="layui-form-item layui-inline">
        <label class="layui-form-label">品牌方</label>
        <div class="layui-input-inline">
            <select name="allmemberId" class="layui-select">
            <?php $allmember=getAllMember();?>
                <!--<?php foreach($allmember as $k=>$v): ?>-->
                <?php if(app('request')->get('allmemberId') == $v['id']): ?>
                <option value="<?php echo htmlentities($v['id']); ?>" selected="selected"><?php echo htmlentities($v['companyName']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['companyName']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
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
            <th class="text-center nowrap">图标</th>
            <th class="text-center nowrap">等级名称</th>
            <th class="text-center nowrap">通联代还</th>
            <th class="text-center nowrap">信汇代还</th>
            <th class="text-center nowrap">畅捷代还</th>
            <th class="text-center nowrap">快捷收款</th>
            <th class="text-center nowrap">升级费用</th>
            <th class="text-center nowrap">升级奖励</th>
            <th class="text-center nowrap">直推升级</th>
            <th class="text-center nowrap">团队奖励</th>
            <th class="text-center nowrap">新人奖励</th>
            <th class="text-center nowrap">独立平台</th>
            <th class="text-center nowrap">有效期</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class="text-center nowrap">
                <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['logo']) && ($vo['logo'] !== '')?$vo['logo']:'/static/goods.png')); ?>"/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['name']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities(sprintf("%.2f",$vo['tl_rate']/100)); ?>%+<?php echo htmlentities($vo['tl_fee']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities(sprintf("%.2f",$vo['xh_rate']/100)); ?>%+<?php echo htmlentities($vo['xh_fee']); ?></td>
            <td class="text-center nowrap">大额55：<?php echo htmlentities(sprintf("%.2f",$vo['cj_1_rate']/100)); ?>%+<?php echo htmlentities($vo['cj_fee']); ?><br/>
            大额45：<?php echo htmlentities(sprintf("%.2f",$vo['cj_2_rate']/100)); ?>%+<?php echo htmlentities($vo['cj_fee']); ?><br/>
            大额35：<?php echo htmlentities(sprintf("%.2f",$vo['cj_3_rate']/100)); ?>%+<?php echo htmlentities($vo['cj_fee']); ?></td>
            <td class="text-center nowrap">先锋：<?php echo htmlentities(sprintf("%.2f",$vo['xf_pay_rate']/100)); ?>%+<?php echo htmlentities($vo['xf_pay_fee']); ?><br/>
            畅捷：<?php echo htmlentities(sprintf("%.2f",$vo['cj_pay_rate']/100)); ?>%+<?php echo htmlentities($vo['cj_pay_fee']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['money']); ?>元</td>
            <td class="text-center nowrap">
                <?php if(auth("$classuri/cost")): ?>
                <span class="text-explode">|</span>
                <a data-title="升级奖励" data-modal='<?php echo url("$classuri/cost"); ?>?id=<?php echo htmlentities($vo['id']); ?>&allmemberId=<?php echo htmlentities($allmemberId); ?>'>查看</a>
                <?php endif; ?>
            </td>
            <td class='text-center'>
                <?php if($vo['subordinate_num'] == 0): ?><span class="color-red">不升级</span><?php else: ?><span class="color-green"><?php echo htmlentities($vo['subordinate_num']); ?>个</span><?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['group_rate']); ?>%</td>
            <td class="text-center nowrap">认证奖励：<?php echo htmlentities($vo['new_money']); ?>元<br/>
           首刷奖励：<?php echo htmlentities($vo['new2_money']); ?>元</td>
           <td class='text-center'>
                <?php if($vo['is_pc'] == 0): ?><span class="color-red">不可用</span><?php else: ?><span class="color-green">可用</span><?php endif; ?>
            </td>
            <td class='text-center'>
                <?php if($vo['valid'] == 0): ?><span class="color-red">永久有效</span><?php else: ?><span class="color-green"><?php echo htmlentities($vo['valid']); ?>天</span><?php endif; ?>
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