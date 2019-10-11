<?php /*a:1:{s:52:"E:\www\jinma\application\admin\view\member\form.html";i:1556184467;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="form-group">
        <label class="layui-form-label">用户头像</label>
        <div class="layui-input-block">
            <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['avatar']) && ($vo['avatar'] !== '')?$vo['avatar']:'/static/avatar.png')); ?>"/>
            <input type="hidden" name="avatar" onchange="$(this).prev('img').attr('src', this.value)" value="<?php echo htmlentities((isset($vo['avatar']) && ($vo['avatar'] !== '')?$vo['avatar']:'/static/avatar.png')); ?>" class="layui-input">
            <a class="btn btn-link" data-file="one" data-uptype="local" data-type="ico,png,jpeg,jpg,gif" data-field="avatar">上传图片</a>
            <p class="help-block">建议上传图标的尺寸为200x200px，此图标用于APP展示。</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">用户手机</label>
        <div class="layui-input-block">
            <input type="text" name="phone" value='<?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:"")); ?>' required="required" title="请输入用户手机" placeholder="请输入用户手机" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，保证手机号的唯一性</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">用户等级</label>
        <div class="layui-input-inline">
            <select name="level" class="layui-select" style="display:block;">
            <?php if (!isset($vo['level'])) { $vo['level'] = ''; } $level = getMemberLevel(); ?>
                <!--<?php foreach($level as $v): ?>-->
                <?php if($vo['level'] == $v['id']): ?>
                <option selected="selected" value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['name']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['name']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
            <p class="help-block color-desc"><b>必选</b>，用户可以获得等级差价分润</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">用户昵称</label>
        <div class="layui-input-block">
            <input type="text" name="nickName" value='<?php echo htmlentities((isset($vo['nickName']) && ($vo['nickName'] !== '')?$vo['nickName']:"")); ?>' required="required" title="请输入用户昵称" placeholder="请输入用户昵称" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，用户昵称</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">用户姓名</label>
        <div class="layui-input-block">
            <input type="text" name="realname" value='<?php echo htmlentities((isset($vo['realname']) && ($vo['realname'] !== '')?$vo['realname']:"")); ?>' required="required" title="请输入用户姓名" placeholder="请输入用户姓名" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，用户姓名</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">身份证号</label>
        <div class="layui-input-block">
            <input type="text" name="idcard" value='<?php echo htmlentities((isset($vo['idcard']) && ($vo['idcard'] !== '')?$vo['idcard']:"")); ?>' required="required" title="请输入身份证号" placeholder="请输入身份证号" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，身份证号</p>
        </div>
    </div>

    <div class="form-group">
        <label class="layui-form-label">实名状态</label>
        <div class='col-sm-8'>
        <?php  if (!isset($vo['realnameStatus'])) { $vo['realnameStatus'] = 0; } foreach(['1'=>'已实名','0'=>'未实名'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if($vo['realnameStatus'] == $k): ?>-->
                <input checked type="radio" name="realnameStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="realnameStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">用户是否进行实名认证。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="layui-form-label">账户状态</label>
        <div class='col-sm-8'>
        <?php  if (!isset($vo['status'])) { $vo['status'] = 1; } foreach(['1'=>'启用','0'=>'禁用'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if($vo['status'] == $k): ?>-->
                <input checked type="radio" name="status" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="status" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">是否允许客户使用软件。</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"0")); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消操作吗？" data-close>取消操作</button>
    </div>
</form>
