<?php /*a:2:{s:72:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\channel\fee.html";i:1560387264;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<form autocomplete="off" onsubmit="return false;" action="<?php echo request()->url(); ?>" data-auto="true" method="post" class='form-horizontal layui-form padding-top-20'>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            cashMinMoney<br><span class="nowrap color-desc">最小提现金额（元）</span>
        </label>
        <div class='col-sm-8'>
            <input name="cashMinMoney" required="required" title="请输入最小提现金额" placeholder="请输入最小提现金额（元）" value="<?php echo sysconf('cashMinMoney'); ?>" class="layui-input">
            <p class="help-block">当前系统用户提现申请最小金额，低于该金额不允许提现。</p>
        </div>
    </div>
	<div class="form-group">
        <label class="col-sm-2 control-label">
            cashMinMoney<br><span class="nowrap color-desc">最大提现金额（元）</span>
        </label>
        <div class='col-sm-8'>
            <input name="cashMaxMoney" required="required" title="请输入最大提现金额" placeholder="请输入最大提现金额（元）" value="<?php echo sysconf('cashMaxMoney'); ?>" class="layui-input">
            <p class="help-block">当前系统用户提现申请最大金额，高于该金额不允许提现。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            memberCashFee<br><span class="nowrap color-desc">用户提现费用（元/笔）</span>
        </label>
        <div class='col-sm-8'>
            <input name="memberCashFee" required="required" title="请输入用户提现费用" placeholder="请输入用户提现费用" value="<?php echo sysconf('memberCashFee'); ?>" class="layui-input">
            <p class="help-block">当前系统用户提现申请手续费费用，实际到账金额减去本费用。</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="col-sm-4 col-sm-offset-2">
        <div class="layui-form-item text-center">
            <button class="layui-btn" type="submit">保存配置</button>
        </div>
    </div>

</form>

</div>
</div>

<!-- 右则内容区域 结束 -->