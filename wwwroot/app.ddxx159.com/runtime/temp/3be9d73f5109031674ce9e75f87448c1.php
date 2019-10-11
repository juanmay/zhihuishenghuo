<?php /*a:1:{s:70:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\cate\form.html";i:1556437960;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
   
    <div class="layui-form-item">
        <label class="layui-form-label">分类名称</label>
        <div class="layui-input-block">
            <input type="text" name="cateName" value='<?php echo htmlentities((isset($vo['cateName']) && ($vo['cateName'] !== '')?$vo['cateName']:"")); ?>' required="required" title="请输入分类名称" placeholder="请输入分类名称" class="layui-input">
            <p class="help-block color-desc"><b>必填</b></p>
        </div>
    </div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"0")); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消操作吗？" data-close>取消操作</button>
    </div>

    <div class="hr-line-dashed"></div>
</form>
<script type="text/javascript">
    require(['jquery', 'ckeditor', 'angular'], function () {
        window.form.render();
        window.createEditor('[name="goodsDesc"]', {height: 300});
    });
</script>
