<?php /*a:2:{s:51:"E:\www\jinma\application\admin\view\bill\index.html";i:1556184468;s:55:"E:\www\jinma\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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
        <label class="layui-form-label">变动类型</label>
        <div class="layui-input-inline">
            <select name="type" class="layui-select">
                <option value="">所有类型</option>
                <!--<?php foreach(["1"=>"代还消费","2"=>"代还还款","3"=>"快捷收款","4"=>"提现处理"] as $k=>$v): ?>-->
                <?php if(app('request')->get('type') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">交易时间</label>
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
            <th class='list-table-check-td think-checkbox'>
                <input data-auto-none="none" data-check-target='.list-check-box' type='checkbox'/>
            </th>
            <th class="text-center nowrap">用户手机</th>
            <th class="text-center nowrap">用户姓名</th>
            <th class="text-center nowrap">交易类型</th>
            <th class="text-center nowrap">交易金额</th>
            <th class="text-center nowrap">手续费</th>
            <th class="text-center nowrap">出账卡号</th>
            <th class="text-center nowrap">入账卡号</th>
            <th class="text-center nowrap">交易说明</th>
            <th class="text-center nowrap">交易时间</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class='list-table-check-td text-top think-checkbox'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['phone']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class="text-center nowrap">
                <!--<?php foreach(["1"=>"代还消费","2"=>"代还还款","3"=>"快捷收款","4"=>"提现处理"] as $k=>$v): ?>-->
                <?php if($vo['type'] == "$k"): ?><?php echo htmlentities($v); endif; ?>
                <!--<?php endforeach; ?>-->
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['money']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['fee_money']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities((isset($vo['out_bank_num']) && ($vo['out_bank_num'] !== '')?$vo['out_bank_num']:"--------")); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities((isset($vo['in_bank_num']) && ($vo['in_bank_num'] !== '')?$vo['in_bank_num']:"--------")); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['info']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['add_time']); ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>

</div>
</div>

<!-- 右则内容区域 结束 -->