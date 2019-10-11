<?php /*a:1:{s:53:"E:\www\jinma\application\admin\view\article\form.html";i:1556186156;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">公告标题</label>
        <div class="layui-input-block">
            <input type="text" name="title" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' required="required" title="请输入公告标题" placeholder="请输入公告标题" class="layui-input">
            <p class="help-block color-desc"><b>必填</b></p>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">公告内容</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" style="height:400px;" name="content" required="required" placeholder="请输入公告内容"><?php echo htmlentities((isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:'')); ?></textarea>
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
        window.createEditor('[name="content"]', {height: 300});
    });
</script>
<script type="text/javascript">
    $(document).on('click','img',function(){
        alert(123)
    })
</script>
