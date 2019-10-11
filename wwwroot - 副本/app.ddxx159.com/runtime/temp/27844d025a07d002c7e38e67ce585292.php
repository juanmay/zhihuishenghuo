<?php /*a:2:{s:66:"D:\wwwroot\app.ddxx159.com\application\admin\view\goods\index.html";i:1569753522;s:69:"D:\wwwroot\app.ddxx159.com\application\admin\view\public\content.html";i:1569753523;}*/ ?>
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
        <label class="layui-form-label">商品名称</label>
        <div class="layui-input-inline">
            <input name="goodsName" value="<?php echo htmlentities(app('request')->get('goodsName')); ?>" placeholder="请输入商品名称" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <select name="status" class="layui-select">
                <option value="">所有商品</option>
                <!--<?php foreach(["0"=>"下架","1"=>"上架"] as $k=>$v): ?>-->
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
            <th class="text-center nowrap">商品图片</th>
            <th class="text-center nowrap">商品名称</th>
            <th class="text-center nowrap">商品价格</th>
            <th class="text-center nowrap">市场价格</th>
            <th class="text-center nowrap">商品库存</th>
            <th class="text-center nowrap">商品销量</th>
            <th class="text-center nowrap">状态</th>
            <th class="text-center nowrap">发布时间</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class="text-center nowrap">
                <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['goodsImage']) && ($vo['goodsImage'] !== '')?$vo['goodsImage']:'/static/goods.png')); ?>"/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['goodsName']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['goodsPrice']); ?>积分</td>
            <td class="text-center nowrap">￥<?php echo htmlentities($vo['marketPrice']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['goodsStock']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['saleNum']); ?></td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span class="color-red">下架</span><?php elseif($vo['status'] == 1): ?><span class="color-green">上架</span><?php endif; ?>
            </td>
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