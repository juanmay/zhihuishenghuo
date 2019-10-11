<?php /*a:2:{s:74:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\allcash\index.html";i:1558086121;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("$classuri/add"); ?>' data-title="申请提现" class='layui-btn layui-btn-sm layui-btn-primary'>申请提现</button>
<!--<?php endif; ?>-->
</div>
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
        <label class="layui-form-label">订单编号</label>
        <div class="layui-input-inline">
            <input name="order_no" value="<?php echo htmlentities(app('request')->get('order_no')); ?>" placeholder="请输入订单编号" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">银行卡号</label>
        <div class="layui-input-inline">
            <input name="bank_num" value="<?php echo htmlentities(app('request')->get('bank_num')); ?>" placeholder="请输入银行卡号" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">订单状态</label>
        <div class="layui-input-inline">
            <select name="status" class="layui-select">
                <option value="">所有订单</option>
                <!--<?php foreach(["0"=>"待审核","1"=>"打款中","2"=>"驳回","2"=>"失败","4"=>"打款成功"] as $k=>$v): ?>-->
                <?php if(app('request')->get('status') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">申请时间</label>
        <div class="layui-input-inline">
            <input name="add_time" data-time value="<?php echo htmlentities(app('request')->get('add_time')); ?>" placeholder="请选择申请时间" class="layui-input">
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
            <th class="text-center nowrap">提现金额</th>
            <th class="text-center nowrap">手续费</th>
            <th class="text-center nowrap">提现单号</th>
            <th class="text-center nowrap">流水单号</th>
            <th class="text-center nowrap">银行卡号</th>
            <th class="text-center nowrap">银行名称</th>
            <th class="text-center nowrap">状态</th>
            <th class="text-center nowrap">处理说明</th>
            <th class="text-center nowrap">申请时间</th>
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
            <td class="text-center nowrap"><?php echo htmlentities($vo['money']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['fee_money']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['order_no']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['lanno']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['bank_num']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['bank_name']); ?></td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span>待审核</span>
                <?php elseif($vo['status'] == 1): ?><span class="color-green">打款中</span>
                <?php elseif($vo['status'] == 2): ?><span class="color-red">驳回</span>
                <?php elseif($vo['status'] == 3): ?><span class="color-red">失败</span>
                <?php elseif($vo['status'] == 4): ?><span class="color-green">打款成功</span>
                <?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['deal_info']); ?></td>
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