<?php /*a:2:{s:70:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\sms\index.html";i:1557899751;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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

    <div class="form-group" style="display:none;">
        <label class="col-sm-2 control-label">
            smsUser<br><span class="nowrap color-desc">短信账户</span>
        </label>
        <div class='col-sm-8'>
            <input name="smsUser" required="required" title="请输入短信账户" placeholder="请输入短信账户" value="<?php echo sysconf('smsUser'); ?>" class="layui-input">
            <p class="help-block">当前系统短信账户，由运营商分配。</p>
        </div>
    </div>

    <div class="form-group" style="display:none;">
        <label class="col-sm-2 control-label">
            smsPass<br><span class="nowrap color-desc">短信密码</span>
        </label>
        <div class='col-sm-8'>
            <input name="smsPass" required="required" title="请输入短信密码" placeholder="请输入短信密码" value="<?php echo sysconf('smsPass'); ?>" class="layui-input">
            <p class="help-block">当前系统短信密码，由运营商分配。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            smsSign<br><span class="nowrap color-desc">短信签名</span>
        </label>
        <div class='col-sm-8'>
            <input name="smsSign" required="required" title="请输入短信签名" placeholder="请输入短信密码" value="<?php echo sysconf('smsSign'); ?>" class="layui-input">
            <p class="help-block">当前系统短信签名，变更需报备短信运营商。</p>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">
            smsNum<br><span class="nowrap color-desc">短信余额</span>
        </label>
        <div class='col-sm-8'>
            <input readonly  value="<?php echo sms_num(); ?>" class="layui-input">
            <p class="help-block">当前系统短信账户余额，如充值请联系对接协调员。</p>
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