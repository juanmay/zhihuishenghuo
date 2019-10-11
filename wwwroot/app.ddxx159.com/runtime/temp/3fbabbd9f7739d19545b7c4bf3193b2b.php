<?php /*a:1:{s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\allmember\card.html";i:1560495102;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
	<div class="layui-form-item">
        <label class="layui-form-label">真实姓名</label>
        <div class="layui-input-block">
            <input type="text" value='<?php echo htmlentities($allmember['realname']); ?>' class="layui-input">
        </div>
        <p class="help-block color-desc">提现必要参数，自动读取平台信息</p>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">身份证号</label>
        <div class="layui-input-block">
            <input type="text" value='<?php echo htmlentities($allmember['idcard']); ?>' class="layui-input">
        </div>
        <p class="help-block color-desc">提现必要参数，自动读取平台信息</p>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">银行卡号</label>
        <div class="layui-input-block">
            <input type="text" name="bank_num" required="required|number" value='<?php echo htmlentities($allmember['bank_num']); ?>' title="请输入银行卡号" placeholder="请输入银行卡号" class="layui-input">
        </div>
        <p class="help-block color-desc"><b>必填</b>，提现必要参数</p>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">开户银行</label>
        <div class="layui-input-inline">
            <select name="bank_number" id='bank_number' class="layui-select">
                <option value="0">请选择开户银行</option>
                <!--<?php foreach($bank as $v): ?>-->
                <?php if($allmember['bank_number'] == $v['number']): ?>
                <option value="<?php echo htmlentities($v['number']); ?>" selected='selected'><?php echo htmlentities($v['name']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['number']); ?>"><?php echo htmlentities($v['name']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
            <p class="help-block color-desc"><b>必选</b>，提现必要参数</p>
        </div>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">预留手机号</label>
        <div class="layui-input-block">
            <input type="text" name="phone" required="required" lay-verify="phone" value='<?php echo htmlentities($allmember['phone']); ?>' title="请输入预留手机号" placeholder="请输入预留手机号" class="layui-input">
        </div>
        <p class="help-block color-desc"><b>必填</b>，提现必要参数</p>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">开户省份</label>
        <div class="layui-input-block">
            <input type="text" name="province" required="required" value='<?php echo htmlentities($allmember['province']); ?>' title="请输入开户省份" placeholder="请输入开户省份" class="layui-input">
        </div>
        <p class="help-block color-desc"><b>必填</b>，提现必要参数</p>
    </div>
	<div class="layui-form-item">
        <label class="layui-form-label">开户城市</label>
        <div class="layui-input-block">
            <input type="text" name="city" required="required" value='<?php echo htmlentities($allmember['city']); ?>' title="请输入开户城市" placeholder="请输入开户城市" class="layui-input">
        </div>
        <p class="help-block color-desc"><b>必填</b>，提现必要参数</p>
    </div>
    <div class="layui-form-item text-center">
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
