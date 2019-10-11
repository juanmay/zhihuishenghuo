<?php /*a:1:{s:79:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\allmember\money.html";i:1560930264;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
	<div class="layui-form-item">
        <label class="layui-form-label">公司名称</label>
        <div class="layui-input-block">
            <input type="text" value='<?php echo htmlentities($allmember['companyName']); ?>' class="layui-input" readonly>
        </div>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">当前余额</label>
        <div class="layui-input-block">
            <input type="text" value='<?php echo htmlentities($allmember['accountMoney']); ?>' class="layui-input"readonly>
        </div>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">变动金额</label>
        <div class="layui-input-block">
            <input type="number" min='1' value='' name='money' class="layui-input" title="请输入变动金额" placeholder="请输入变动金额" required="required">
        </div>
        <p class="help-block color-desc"><b>必选</b>，变动金额</p>
    </div>
	
    <div class="layui-form-item">
        <label class="layui-form-label">变动方式</label>
        <div class="layui-input-inline">
            <select name="type" id='type' class="layui-select">
                <option value="6">充值</option>
                <option value="7">扣除</option>
            </select>
            <p class="help-block color-desc"><b>必选</b>，变动方式</p>
        </div>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">变动说明</label>
        <div class="layui-input-block">
            <input type="text" value='' name='content' class="layui-input">
        </div>
        <p class="help-block color-desc">变动说明</p>
    </div>
    <div class="layui-form-item text-center">
    	<input type='hidden' name='allmemberId' value="<?php echo htmlentities($allmember['id']); ?>"/>
        <button class="layui-btn" type='submit'>保存数据</button>
        <!-- <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button> -->
    </div>

    <div class="hr-line-dashed"></div>
</form>
<script type="text/javascript">
    require(['jquery', 'ckeditor', 'angular'], function () {
        window.form.render();
    });
</script>
