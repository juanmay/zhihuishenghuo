<?php /*a:2:{s:79:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\agreement\register.html";i:1556184626;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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

    
    <div class="layui-form-item">
        <label class="layui-form-label">注册协议</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" style="height:400px;" name="registerAgreement" required="required" placeholder="请输入注册协议"><?php echo sysconf('registerAgreement'); ?></textarea>
        </div>
    </div>


    <div class="hr-line-dashed"></div>

    <div class="col-sm-4 col-sm-offset-2">
        <div class="layui-form-item text-center">
            <button class="layui-btn" type="submit">保存配置</button>
        </div>
    </div>

</form>
<script type="text/javascript">
    require(['jquery', 'ckeditor', 'angular'], function () {
        window.createEditor('[name="registerAgreement"]', {height: 400,width:800});
    });
</script>
</div>
</div>

<!-- 右则内容区域 结束 -->