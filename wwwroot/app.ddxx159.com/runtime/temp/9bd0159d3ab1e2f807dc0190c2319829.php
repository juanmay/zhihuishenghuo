<?php /*a:2:{s:66:"D:\wwwroot\app.ddxx159.com\application\admin\view\quick\index.html";i:1569753522;s:69:"D:\wwwroot\app.ddxx159.com\application\admin\view\public\content.html";i:1569753523;}*/ ?>
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
        <label class="layui-form-label">收款单号</label>
        <div class="layui-input-inline">
            <input name="order_no" value="<?php echo htmlentities(app('request')->get('order_no')); ?>" placeholder="请输入收款单号" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">收款状态</label>
        <div class="layui-input-inline">
            <select name="status" class="layui-select">
                <option value="">所有订单</option>
                <!--<?php foreach(["0"=>"未支付","1"=>"支付中","2"=>"支付失败","3"=>"支付成功","4"=>"提现中","5"=>"提现失败","6"=>"已完成"] as $k=>$v): ?>-->
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
        <label class="layui-form-label">收款通道</label>
        <div class="layui-input-inline">
            <select name="type" class="layui-select">
                <option value="">所有通道</option>
                <!--<?php foreach(["xf"=>"先锋","yb"=>"易宝","cj"=>"畅捷"] as $k=>$v): ?>-->
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
            <th class="text-center nowrap">用户手机</th>
            <th class="text-center nowrap">用户姓名</th>
            <th class="text-center nowrap">收款通道</th>
            <th class="text-center nowrap">收款单号</th>
            <th class="text-center nowrap">收款金额</th>
            <th class="text-center nowrap">手续费</th>
            <th class="text-center nowrap">状态</th>
            <th class="text-center nowrap">处理说明</th>
            <th class="text-center nowrap">交易时间</th>
            <th class="text-center nowrap">操作</th>
        </tr> 
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class="text-center nowrap"><?php echo htmlentities($vo['phone']); ?><?php echo htmlentities($vo['cash_money']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class='text-center'>
                <!--<?php foreach(["xf"=>"先锋","yb"=>"易宝","cj"=>"畅捷"] as $k=>$v): ?>-->
                <?php if($vo['type'] == "$k"): ?><?php echo htmlentities($v); endif; ?>
                <!--<?php endforeach; ?>-->
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['order_no']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['money']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['fee_money']); ?></td>
            <td class='text-center'>
                <!--<?php foreach(["0"=>"未支付","1"=>"支付中","2"=>"支付失败","3"=>"支付成功","4"=>"提现中","5"=>"提现失败","6"=>"已完成"] as $k=>$v): ?>-->
                <?php if($vo['status'] == "$k"): ?><?php echo htmlentities($v); endif; ?>
                <!--<?php endforeach; ?>-->
            </td>
            <td class="text-center nowrap"><?php echo htmlentities((isset($vo['deal_info']) && ($vo['deal_info'] !== '')?$vo['deal_info']:"---")); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['add_time']); ?></td>
            <td class='text-center notselect'>

                <?php if(auth("$classuri/info")): ?>
                <span class="text-explode">|</span>
                <a data-title="查看" data-modal='<?php echo url("$classuri/info"); ?>?id=<?php echo htmlentities($vo['id']); ?>&allmemberId=<?php echo htmlentities($allmemberId); ?>'>查看</a>
                <?php endif; ?>
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