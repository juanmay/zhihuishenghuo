<?php /*a:2:{s:53:"E:\www\jinma\application\admin\view\apps\android.html";i:1558920202;s:55:"E:\www\jinma\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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
            androidVersion<br><span class="nowrap color-desc">版本编号</span>
        </label>
        <div class='col-sm-8'>
            <input name="androidVersion" required="required" title="请输入版本编号" placeholder="请输入版本编号" value="<?php echo sysconf('androidVersion'); ?>" class="layui-input">
            <p class="help-block">当前程序更新版本号</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            androidName<br><span class="nowrap color-desc">版本名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="androidName" required="required" title="请输入版本名称" placeholder="请输入版本名称" value="<?php echo sysconf('androidName'); ?>" class="layui-input">
            <p class="help-block">当前程序版本名称</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            androidSize<br><span class="nowrap color-desc">版本大小</span>
        </label>
        <div class='col-sm-8'>
            <input name="androidSize" required="required" title="请输入版本大小" placeholder="请输入版本大小" value="<?php echo sysconf('androidSize'); ?>" class="layui-input">
            <p class="help-block">当前程序版本大小，MB</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            androidRemark<br><span class="nowrap color-desc">版本信息</span>
        </label>
        <div class='col-sm-8'>
            <textarea class="layui-textarea" style="height:100px;" name="androidRemark" required="required" placeholder="请输入版本信息"><?php echo sysconf('androidRemark'); ?></textarea>
            <p class="help-block">程序的版权信息，在客户更新时提示</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            androidApk<br><span class="nowrap color-desc">安装文件</span>
        </label>
        <div class='col-sm-8'>
            <input name="androidApk" required="required" value="<?php echo sysconf('androidApk'); ?>" class="layui-input">
            <a class="btn btn-link" data-file="one" data-uptype="file" data-type="apk" data-field="androidApk">上传文件</a>
            <p class="help-block">非开发人员请勿上传更改。</p>
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