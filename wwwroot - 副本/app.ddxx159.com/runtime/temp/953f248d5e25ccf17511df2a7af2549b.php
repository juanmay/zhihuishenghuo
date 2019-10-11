<?php /*a:1:{s:50:"E:\www\jinma\application\admin\view\auth\form.html";i:1556184467;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' required="required" title="请输入权限名称" placeholder="请输入权限名称" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">权限描述</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入权限描述" required="required" title="请输入权限描述" class="layui-textarea" name="desc"><?php echo htmlentities((isset($vo['desc']) && ($vo['desc'] !== '')?$vo['desc']:"")); ?></textarea>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消操作吗？" data-close>取消操作</button>
    </div>

</form>
