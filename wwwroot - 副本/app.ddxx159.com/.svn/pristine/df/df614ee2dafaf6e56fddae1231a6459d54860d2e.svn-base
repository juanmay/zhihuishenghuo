<?php /*a:2:{s:69:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\apps\ios.html";i:1558325100;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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
            iosVersion<br><span class="nowrap color-desc">版本编号</span>
        </label>
        <div class='col-sm-8'>
            <input name="iosVersion" required="required" title="请输入版本编号" placeholder="请输入版本编号" value="<?php echo sysconf('iosVersion'); ?>" class="layui-input">
            <p class="help-block">当前程序更新版本号</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            iosName<br><span class="nowrap color-desc">版本名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="iosName" required="required" title="请输入版本名称" placeholder="请输入版本名称" value="<?php echo sysconf('iosName'); ?>" class="layui-input">
            <p class="help-block">当前程序版本名称</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            iosSize<br><span class="nowrap color-desc">版本大小</span>
        </label>
        <div class='col-sm-8'>
            <input name="iosSize" required="required" title="请输入版本大小" placeholder="请输入版本大小" value="<?php echo sysconf('iosSize'); ?>" class="layui-input">
            <p class="help-block">当前程序版本大小，MB</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            iosRemark<br><span class="nowrap color-desc">版本信息</span>
        </label>
        <div class='col-sm-8'>
            <textarea class="layui-textarea" style="height:100px;" name="iosRemark" required="required" placeholder="请输入版本信息"><?php echo sysconf('iosRemark'); ?></textarea>
            <p class="help-block">程序的版权信息，在客户更新时提示</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            iosIpa<br><span class="nowrap color-desc">安装文件</span>
        </label>
        <div class='col-sm-8'>
            <input name="iosIpa" required="required" value="<?php echo sysconf('iosIpa'); ?>" class="layui-input">
            <p class="help-block">非开发人员请勿更改。</p>
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