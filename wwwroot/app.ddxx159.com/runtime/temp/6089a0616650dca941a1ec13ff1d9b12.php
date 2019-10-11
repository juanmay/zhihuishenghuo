<?php /*a:1:{s:74:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\cost\index.html";i:1561002956;}*/ ?>
<style type="text/css">
    .layui-form-label {
        width: 120px;
    }
    .layui-input-block {
        margin-left: 140px;
    }
</style>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">完美还款</label>
        <div class="layui-input-block">
            <input type="text" name="firstRepaymentRate" readonly value='<?php echo htmlentities((isset($vo['firstRepaymentRate']) && ($vo['firstRepaymentRate'] !== '')?$vo['firstRepaymentRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">极速还款1</label>
        <div class="layui-input-block">
            <input type="text" name="secondRepaymentRate" readonly value='<?php echo htmlentities((isset($vo['secondRepaymentRate']) && ($vo['secondRepaymentRate'] !== '')?$vo['secondRepaymentRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">极速还款2</label>
        <div class="layui-input-block">
            <input type="text" name="thirdRepaymentRate" readonly value='<?php echo htmlentities((isset($vo['thirdRepaymentRate']) && ($vo['thirdRepaymentRate'] !== '')?$vo['thirdRepaymentRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">极速还款3</label>
        <div class="layui-input-block">
            <input type="text" name="fourthRepaymentRate" readonly value='<?php echo htmlentities((isset($vo['fourthRepaymentRate']) && ($vo['fourthRepaymentRate'] !== '')?$vo['fourthRepaymentRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">信汇还款</label>
        <div class="layui-input-block">
            <input type="text" name="fifthRepaymentRate" readonly value='<?php echo htmlentities((isset($vo['fifthRepaymentRate']) && ($vo['fifthRepaymentRate'] !== '')?$vo['fifthRepaymentRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">代还单笔</label>
        <div class="layui-input-block">
            <input type="text" name="RepaymentFee" readonly value='<?php echo htmlentities((isset($vo['RepaymentFee']) && ($vo['RepaymentFee'] !== '')?$vo['RepaymentFee']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">先锋收款</label>
        <div class="layui-input-block">
            <input type="text" name="firstQuickRate" readonly value='<?php echo htmlentities((isset($vo['firstQuickRate']) && ($vo['firstQuickRate'] !== '')?$vo['firstQuickRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷收款1</label>
        <div class="layui-input-block">
            <input type="text" name="secondQuickRate" readonly value='<?php echo htmlentities((isset($vo['secondQuickRate']) && ($vo['secondQuickRate'] !== '')?$vo['secondQuickRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷收款2</label>
        <div class="layui-input-block">
            <input type="text" name="thirdQuickRate" readonly value='<?php echo htmlentities((isset($vo['thirdQuickRate']) && ($vo['thirdQuickRate'] !== '')?$vo['thirdQuickRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">畅捷收款3</label>
        <div class="layui-input-block">
            <input type="text" name="fourthQuickRate" readonly value='<?php echo htmlentities((isset($vo['fourthQuickRate']) && ($vo['fourthQuickRate'] !== '')?$vo['fourthQuickRate']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">收款单笔</label>
        <div class="layui-input-block">
            <input type="text" name="QuickFee" readonly value='<?php echo htmlentities((isset($vo['QuickFee']) && ($vo['QuickFee'] !== '')?$vo['QuickFee']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">提现单笔手续费</label>
        <div class="layui-input-block">
            <input type="text" name="memberCashFee" readonly value='<?php echo htmlentities((isset($vo['memberCashFee']) && ($vo['memberCashFee'] !== '')?$vo['memberCashFee']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户使用软件时提现单笔手续费</p>
        </div>
    </div>
    <div class="hr-line-dashed"></div>

</form>