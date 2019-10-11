<?php /*a:1:{s:74:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\level\cost.html";i:1560852023;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <?php foreach($levels as $vo): ?>
    <div class="layui-form-item">
        <label class="layui-form-label"><?php echo htmlentities($vo['name']); ?></label>
        <div class="layui-input-block">
            <input type="text" readonly name="id_<?php echo htmlentities($vo['id']); ?>" value='<?php echo htmlentities((isset($vo['cost_money']) && ($vo['cost_money'] !== '')?$vo['cost_money']:"0.00")); ?>' required="required" title="请输入分润金额" placeholder="请输入分润金额" class="layui-input">
            <p class="help-block color-desc"><b>推荐一名【<?php echo htmlentities($info['name']); ?>】用户缴费升级，奖励额度，多人关系做级差分润，单位：元。</b></p>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="hr-line-dashed"></div>
</form>
<script type="text/javascript">
    require(['jquery', 'ckeditor', 'angular'], function () {
        window.form.render();
        window.createEditor('[name="info"]', {height: 300});
    });
</script>
