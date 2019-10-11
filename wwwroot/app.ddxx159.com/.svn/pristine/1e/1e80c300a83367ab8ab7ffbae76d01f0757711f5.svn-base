<?php /*a:1:{s:73:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\allcash\form.html";i:1560519423;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
	<div class="layui-form-item">
        <label class="layui-form-label">提现金额</label>
        <div class="layui-input-block">
            <input type="number" min='0' name="money" required="required|number" value='<?php echo htmlentities((isset($accountMoney) && ($accountMoney !== '')?$accountMoney:"0.0")); ?>' title="请输入提现金额" placeholder="请输入提现金额" class="layui-input">
        </div>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">提现标准</label>
        <div class="layui-input-block">
            <input type="text" value="最小提现金额<?php echo htmlentities($cashMinMoney); ?>（元）,最大提现金额<?php echo htmlentities($cashMaxMoney); ?>（元）,提现费用<?php echo htmlentities($memberCashFee); ?>（元/笔）" title="提现标准" class="layui-input"  readonly>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">当前余额</label>
        <div class="layui-input-block">
            <input type="text" value="<?php echo htmlentities($accountMoney); ?>" title="当前余额" class="layui-input"  readonly>
        </div>
    </div>
    <div class="layui-form-item text-center">
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>

    <div class="hr-line-dashed"></div>
</form>
<script type="text/javascript">
    require(['jquery', 'ckeditor', 'angular'], function () {
        window.form.render();
    });
</script>
