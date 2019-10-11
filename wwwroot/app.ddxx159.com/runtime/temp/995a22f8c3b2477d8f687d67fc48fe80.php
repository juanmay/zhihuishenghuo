<?php /*a:1:{s:71:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\order\form.html";i:1548308490;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="form-group">
        <label class="layui-form-label">商品图片</label>
        <div class="layui-input-block">
            <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['goodsImage']) && ($vo['goodsImage'] !== '')?$vo['goodsImage']:'/static/goods.png')); ?>"/>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">商品名称</label>
        <div class="layui-input-block">
            <input type="text" name="goodsName" value='<?php echo htmlentities((isset($vo['goodsName']) && ($vo['goodsName'] !== '')?$vo['goodsName']:"")); ?>' readonly title="" placeholder="" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">商品数量</label>
        <div class="layui-input-block">
            <input type="text" name="goodsNum" value='<?php echo htmlentities((isset($vo['goodsNum']) && ($vo['goodsNum'] !== '')?$vo['goodsNum']:"")); ?>' readonly title="" placeholder="" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">订单编号</label>
        <div class="layui-input-block">
            <input type="text" name="orderNo" value='<?php echo htmlentities((isset($vo['orderNo']) && ($vo['orderNo'] !== '')?$vo['orderNo']:"")); ?>' readonly title="" placeholder="" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">收货手机</label>
        <div class="layui-input-block">
            <input type="text" name="phone" value='<?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:"")); ?>' title="请输入收货手机" placeholder="请输入收货手机" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">收货姓名</label>
        <div class="layui-input-block">
            <input type="text" name="realname" value='<?php echo htmlentities((isset($vo['realname']) && ($vo['realname'] !== '')?$vo['realname']:"")); ?>' title="请输入收货姓名" placeholder="请输入收货姓名" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">收货地址</label>
        <div class="layui-input-block">
            <input type="text" name="address" value='<?php echo htmlentities((isset($vo['address']) && ($vo['address'] !== '')?$vo['address']:"")); ?>' title="请输入收货地址" placeholder="请输入收货地址" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">下单时间</label>
        <div class="layui-input-block">
            <input type="text" name="add_time" value='<?php echo htmlentities($vo['add_time']); ?>' readonly="" title="" placeholder="" class="layui-input">
        </div>
    </div>

    <div class="form-group">
        <label class="layui-form-label">状态</label>
        <div class='col-sm-8'>
            <?php foreach(['0'=>'待发货','1'=>'已发货'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if($vo['status'] == $k): ?>-->
                <input checked type="radio" name="status" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="status" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物流方式</label>
        <div class="layui-input-block">
            <input type="text" name="expressName" value='<?php echo htmlentities($vo['expressName']); ?>' title="请输入物流方式" placeholder="请输入物流方式" class="layui-input">
            <p class="help-block color-desc"><b>发货必填</b>，快递公司名称</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物流单号</label>
        <div class="layui-input-block">
            <input type="text" name="expressNo" value='<?php echo htmlentities($vo['expressNo']); ?>' title="请输入物流单号" placeholder="请输入物流单号" class="layui-input">
            <p class="help-block color-desc"><b>发货必填</b>，快递单号</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"0")); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>
</form>
