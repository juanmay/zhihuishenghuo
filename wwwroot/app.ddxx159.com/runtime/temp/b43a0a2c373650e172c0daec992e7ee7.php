<?php /*a:2:{s:68:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\sms\tpl.html";i:1556184468;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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
            register<br><span class="nowrap color-desc">用户注册</span>
        </label>
        <div class='col-sm-8'>
            <input name="register" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('register'); ?>" class="layui-input">
            <p class="help-block">#code代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            login<br><span class="nowrap color-desc">登录短信</span>
        </label>
        <div class='col-sm-8'>
            <input name="login" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('login'); ?>" class="layui-input">
            <p class="help-block">#code代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            modPhone<br><span class="nowrap color-desc">修改手机号</span>
        </label>
        <div class='col-sm-8'>
            <input name="modPhone" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('modPhone'); ?>" class="layui-input">
            <p class="help-block">#code代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            repaymentFail<br><span class="nowrap color-desc">还款失败</span>
        </label>
        <div class='col-sm-8'>
            <input name="repaymentFail" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('repaymentFail'); ?>" class="layui-input">
            <p class="help-block">#bank代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            repaymentSuccess<br><span class="nowrap color-desc">还款成功</span>
        </label>
        <div class='col-sm-8'>
            <input name="repaymentSuccess" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('repaymentSuccess'); ?>" class="layui-input">
            <p class="help-block">#bank代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            repaymentFinish<br><span class="nowrap color-desc">还款完成</span>
        </label>
        <div class='col-sm-8'>
            <input name="repaymentFinish" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('repaymentFinish'); ?>" class="layui-input">
            <p class="help-block">#bank代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            bindBank<br><span class="nowrap color-desc">绑卡短信</span>
        </label>
        <div class='col-sm-8'>
            <input name="bindBank" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('bindBank'); ?>" class="layui-input">
            <p class="help-block">#code代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            pieCode<br><span class="nowrap color-desc">派码短信</span>
        </label>
        <div class='col-sm-8'>
            <input name="pieCode" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('pieCode'); ?>" class="layui-input">
            <p class="help-block">#code代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            channel<br><span class="nowrap color-desc">渠道进件</span>
        </label>
        <div class='col-sm-8'>
            <input name="channel" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('channel'); ?>" class="layui-input">
            <p class="help-block">#code代表验证码，变更请联系对接协调员报备。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            paySms<br><span class="nowrap color-desc">收款短信</span>
        </label>
        <div class='col-sm-8'>
            <input name="paySms" required="required" title="请输入短信模板内容，并报备给对接协调员" placeholder="请输入短信模板内容，并报备给对接协调员" value="<?php echo sysconf('paySms'); ?>" class="layui-input">
            <p class="help-block">#code代表验证码，变更请联系对接协调员报备。</p>
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