<?php /*a:1:{s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\allmember\form.html";i:1560493265;}*/ ?>
<style type="text/css">
    .layui-form-label {
        width: 120px;
    }
    .layui-input-block {
        margin-left: 140px;
    }
</style>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">平台手机</label>
        <div class="layui-input-block">
            <input type="text" name="phone" value='<?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:"")); ?>' required="required" title="请输入平台手机号" placeholder="请输入平台手机号" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，平台手机号</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">平台姓名</label>
        <div class="layui-input-block">
            <input type="text" name="realname" value='<?php echo htmlentities((isset($vo['realname']) && ($vo['realname'] !== '')?$vo['realname']:"")); ?>' required="required" title="请输入平台姓名" placeholder="请输入平台姓名" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，平台姓名</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">身份证号</label>
        <div class="layui-input-block">
            <input type="text" name="idcard" value='<?php echo htmlentities((isset($vo['idcard']) && ($vo['idcard'] !== '')?$vo['idcard']:"")); ?>' required="required" title="请输入身份证号" placeholder="请输入身份证号" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，身份证号</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">公司名称</label>
        <div class="layui-input-block">
            <input type="text" name="companyName" value='<?php echo htmlentities((isset($vo['companyName']) && ($vo['companyName'] !== '')?$vo['companyName']:"")); ?>' readonly class="layui-input">
            <p class="help-block color-desc">公司名称</p>
        </div>
    </div>
    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <input type='hidden' value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"0")); ?>' name='allmemberId'>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>
</form>