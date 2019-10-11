<?php /*a:2:{s:66:"D:\wwwroot\app.ddxx159.com\application\admin\view\order\index.html";i:1569753523;s:69:"D:\wwwroot\app.ddxx159.com\application\admin\view\public\content.html";i:1569753523;}*/ ?>
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
        <label class="layui-form-label">收货姓名</label>
        <div class="layui-input-inline">
            <input name="realname" value="<?php echo htmlentities(app('request')->get('realname')); ?>" placeholder="请输入用户姓名" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">兑换单号</label>
        <div class="layui-input-inline">
            <input name="orderNo" value="<?php echo htmlentities(app('request')->get('orderNo')); ?>" placeholder="请输入兑换单号" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <select name="status" class="layui-select">
                <option value="">所有订单</option>
                <!--<?php foreach(["0"=>"待发货","1"=>"已发货"] as $k=>$v): ?>-->
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
        <label class="layui-form-label">下单时间</label>
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
            <th class="text-center nowrap">订单编号</th>
            <th class="text-center nowrap">商品图片</th>
            <th class="text-center nowrap">商品名称</th>
            <th class="text-center nowrap">兑换件数</th>
            <th class="text-center nowrap">用户手机</th>
            <th class="text-center nowrap">收货姓名</th>
            <th class="text-center nowrap">收货地址</th>
            <th class="text-center nowrap">订单状态</th>
            <th class="text-center nowrap">物流方式</th>
            <th class="text-center nowrap">物流单号</th>
            <th class="text-center nowrap">下单时间</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class="text-center nowrap"><?php echo htmlentities($vo['orderNo']); ?></td>
            <td class="text-center nowrap">
                <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['goodsImage']) && ($vo['goodsImage'] !== '')?$vo['goodsImage']:'/static/goods.png')); ?>"/>
            </td>
            <td class="text-center"><?php echo htmlentities($vo['goodsName']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['goodsNum']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['mphone']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['address']); ?></td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span>待发货</span><?php elseif($vo['status'] == 1): ?><span class="color-green">已发货</span><?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities((isset($vo['expressName']) && ($vo['expressName'] !== '')?$vo['expressName']:'---')); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities((isset($vo['expressNo']) && ($vo['expressNo'] !== '')?$vo['expressNo']:'---')); ?></td>
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