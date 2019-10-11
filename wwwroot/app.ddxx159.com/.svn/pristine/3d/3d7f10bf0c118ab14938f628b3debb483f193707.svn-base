<?php /*a:2:{s:52:"E:\www\jinma\application\admin\view\config\file.html";i:1556184468;s:55:"E:\www\jinma\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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
        <label class="col-sm-2 control-label label-required">
            Storage<br><span class="nowrap color-desc">存储引擎</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['local'=>'本地服务器存储'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('storage_type') == $k): ?>-->
                <input checked type="radio" name="storage_type" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="storage_type" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <div class="help-block" data-storage-type="local">
                文件存储在本地服务器，请确保服务器的 ./static/upload/ 目录有写入权限
            </div>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="form-group" data-storage-type="local">
        <label class="col-sm-2 control-label">
            AllowExts<br><span class="nowrap color-desc">允许类型</span>
        </label>
        <div class='col-sm-8'>
            <input type="text" name="storage_local_exts" required="required" value="<?php echo sysconf('storage_local_exts'); ?>"
                   title="请输入系统文件上传后缀" placeholder="请输入系统文件上传后缀" class="layui-input">
            <p class="help-block">设置系统允许上传文件的后缀，多个以英文逗号隔开。如：png,jpg,rar,doc</p>
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

<script>
    (function () {
        window.form.render();
        buildForm('<?php echo sysconf("storage_type"); ?>');
        $('[name=storage_type]').on('click', function () {
            buildForm($('[name=storage_type]:checked').val())
        });

        // 表单显示编译
        function buildForm(value) {
            var $tips = $("[data-storage-type='" + value + "']");
            $("[data-storage-type]").not($tips.show()).hide();
        }
    })();
</script>

<!-- 右则内容区域 结束 -->