<?php /*a:1:{s:50:"E:\www\jinma\application\admin\view\user\auth.html";i:1556184468;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">用户账号</label>
        <div class="layui-input-block">
            <?php if($vo and $vo['username']): ?>
            <input type="text" readonly="" disabled="" name="username" value='<?php echo htmlentities((isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:"")); ?>' required="required" title="请输入用户名称" placeholder="请输入用户名称" class="layui-input layui-bg-gray">
            <?php else: ?>
            <input type="text" name="username" value='<?php echo htmlentities((isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:"")); ?>' required="required" title="请输入用户名称" placeholder="请输入用户名称" class="layui-input">
            <?php endif; ?>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">访问授权</label>
        <div class="layui-input-block">
            <?php foreach($authorizes as $authorize): ?>
            <label class="think-checkbox">
                <!--<?php if(in_array($authorize['id'],$vo['authorize'])): ?>-->
                <input type="checkbox" checked name="authorize[]" value="<?php echo htmlentities($authorize['id']); ?>" lay-ignore> <?php echo htmlentities($authorize['title']); ?>
                <!--<?php else: ?>-->
                <input type="checkbox" name="authorize[]" value="<?php echo htmlentities($authorize['id']); ?>" lay-ignore> <?php echo htmlentities($authorize['title']); ?>
                <!--<?php endif; ?>-->
            </label>
            <?php endforeach; if(empty($authorizes)): ?><span class="color-desc" style="line-height:36px">未配置权限</span><?php endif; ?>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消操作吗？" data-close>取消操作</button>
    </div>

    <script>window.form.render();</script>
</form>
