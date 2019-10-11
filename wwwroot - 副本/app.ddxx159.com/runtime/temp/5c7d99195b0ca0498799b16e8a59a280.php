<?php /*a:1:{s:73:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\member\money.html";i:1556184467;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">用户手机</label>
        <div class="layui-input-block">
            <input type="text" readonly value='<?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:"")); ?>' class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，保证手机号的唯一性</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">用户等级</label>
        <div class="layui-input-inline">
            <select name="level" disabled class="layui-select" style="display:block;">
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
        <label class="layui-form-label">用户姓名</label>
        <div class="layui-input-block">
            <input type="text" readonly value='<?php echo htmlentities((isset($vo['realname']) && ($vo['realname'] !== '')?$vo['realname']:"")); ?>' class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，用户姓名</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">账户余额</label>
        <div class="layui-input-block">
            <input type="text" readonly value='<?php echo htmlentities((isset($vo['accountMoney']) && ($vo['accountMoney'] !== '')?$vo['accountMoney']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户可提现金额</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">冻结金额</label>
        <div class="layui-input-block">
            <input type="text" readonly value='<?php echo htmlentities((isset($vo['freezeMoney']) && ($vo['freezeMoney'] !== '')?$vo['freezeMoney']:"")); ?>' class="layui-input">
            <p class="help-block color-desc">用户提现冻结金额</p>
        </div>
    </div>

    <div class="form-group">
        <label class="layui-form-label">调整类型</label>
        <div class='col-sm-8'>
            <label class="think-radio">
                <input checked type="radio" name="modType" value="accountMoney" title="账户余额" lay-ignore>账户余额
                <input type="radio" name="modType" value="freezeMoney" title="冻结金额" lay-ignore>冻结金额
            </label>
            <p class="help-block">调整金额类型。</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">调整额度</label>
        <div class="layui-input-block">
            <input type="text" name="modMoney"  value=''  required="required" title="请输入调整额度" placeholder="请输入调整额度" class="layui-input">
            <p class="help-block color-desc">调整客户需要变动的金额，降低填写负数。</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">调整说明</label>
        <div class="layui-input-block">
            <input type="text" name="modInfo" required="required" value='<?php echo htmlentities((isset($vo['modInfo']) && ($vo['modInfo'] !== '')?$vo['modInfo']:"")); ?>'  title="请输入调整说明" placeholder="请输入调整说明" class="layui-input">
            <p class="help-block color-desc">本次调整额度详细说明</p>
        </div>
    </div>


    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"0")); ?>' name='id'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消操作吗？" data-close>取消操作</button>
    </div>
</form>
