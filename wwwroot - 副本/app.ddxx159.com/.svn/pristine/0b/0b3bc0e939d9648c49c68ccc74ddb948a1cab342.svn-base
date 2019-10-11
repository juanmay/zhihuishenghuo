<?php /*a:1:{s:51:"E:\www\jinma\application\admin\view\level\form.html";i:1558517017;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="form-group">
        <label class="layui-form-label">等级图标</label>
        <div class="layui-input-block">
            <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['logo']) && ($vo['logo'] !== '')?$vo['logo']:'/static/goods.png')); ?>"/>
            <input type="hidden" name="logo" onchange="$(this).prev('img').attr('src', this.value)" value="<?php echo htmlentities((isset($vo['logo']) && ($vo['logo'] !== '')?$vo['logo']:'/static/goods.png')); ?>" class="layui-input">
            <a class="btn btn-link" data-file="one" data-uptype="local" data-type="ico,png,jpeg,jpg,gif" data-field="logo">上传图片</a>
            <p class="help-block">建议上传图标的尺寸为100x100px，此图标用于APP展示。</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">等级名称</label>
        <div class="layui-input-block">
            <input type="text" name="name" value='<?php echo htmlentities((isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:"")); ?>' required="required" title="请输入等级名称" placeholder="请输入等级名称" class="layui-input">
            <p class="help-block color-desc"><b>必填</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">通联费率</label>
        <div class="layui-input-block">
            <input type="text" name="tl_rate" value='<?php echo htmlentities((isset($vo['tl_rate']) && ($vo['tl_rate'] !== '')?$vo['tl_rate']:"")); ?>' required="required" title="请输入通联费率" placeholder="请输入通联费率" class="layui-input">
            <p class="help-block color-desc"><b>通联消费费率：万分比</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">通联费用</label>
        <div class="layui-input-block">
            <input type="text" name="tl_fee" value='<?php echo htmlentities((isset($vo['tl_fee']) && ($vo['tl_fee'] !== '')?$vo['tl_fee']:"")); ?>' required="required" title="请输入通联单笔费用" placeholder="请输入通联单笔费用" class="layui-input">
            <p class="help-block color-desc"><b>通联单笔费用，元/笔</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷费率</label>
        <div class="layui-input-block">
            <input type="text" name="cj_1_rate" value='<?php echo htmlentities((isset($vo['cj_1_rate']) && ($vo['cj_1_rate'] !== '')?$vo['cj_1_rate']:"")); ?>' required="required" title="请输入畅捷费率" placeholder="请输入畅捷费率" class="layui-input">
            <p class="help-block color-desc"><b>畅捷一新无卡101002和110002费率：万分比</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷费率</label>
        <div class="layui-input-block">
            <input type="text" name="cj_2_rate" value='<?php echo htmlentities((isset($vo['cj_2_rate']) && ($vo['cj_2_rate'] !== '')?$vo['cj_2_rate']:"")); ?>' required="required" title="请输入畅捷费率" placeholder="请输入畅捷费率" class="layui-input">
            <p class="help-block color-desc"><b>畅捷二新无卡101001和110001、商旅1000费率：万分比</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷费率</label>
        <div class="layui-input-block">
            <input type="text" name="cj_3_rate" value='<?php echo htmlentities((isset($vo['cj_3_rate']) && ($vo['cj_3_rate'] !== '')?$vo['cj_3_rate']:"")); ?>' required="required" title="请输入畅捷费率" placeholder="请输入畅捷费率" class="layui-input">
            <p class="help-block color-desc"><b>畅捷三新无卡110003费率：万分比</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷费用</label>
        <div class="layui-input-block">
            <input type="text" name="cj_fee" value='<?php echo htmlentities((isset($vo['cj_fee']) && ($vo['cj_fee'] !== '')?$vo['cj_fee']:"")); ?>' required="required" title="请输入畅捷费用" placeholder="请输入畅捷费用" class="layui-input">
            <p class="help-block color-desc"><b>畅捷单笔费用，元/笔</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">酷宝费率</label>
        <div class="layui-input-block">
            <input type="text" name="kb_1_rate" value='<?php echo htmlentities((isset($vo['kb_1_rate']) && ($vo['kb_1_rate'] !== '')?$vo['kb_1_rate']:"")); ?>' required="required" title="请输入酷宝费率" placeholder="请输入酷宝费率" class="layui-input">
            <p class="help-block color-desc"><b>酷宝费率：万分比。大额55渠道</b></p>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">酷宝费率</label>
        <div class="layui-input-block">
            <input type="text" name="kb_2_rate" value='<?php echo htmlentities((isset($vo['kb_2_rate']) && ($vo['kb_2_rate'] !== '')?$vo['kb_2_rate']:"")); ?>' required="required" title="请输入酷宝费率" placeholder="请输入酷宝费率" class="layui-input">
            <p class="help-block color-desc"><b>酷宝费率：万分比。大额45渠道</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">酷宝费率</label>
        <div class="layui-input-block">
            <input type="text" name="kb_3_rate" value='<?php echo htmlentities((isset($vo['kb_3_rate']) && ($vo['kb_3_rate'] !== '')?$vo['kb_3_rate']:"")); ?>' required="required" title="请输入酷宝费率" placeholder="请输入酷宝费率" class="layui-input">
            <p class="help-block color-desc"><b>酷宝费率：万分比。大额35渠道</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">酷宝费率</label>
        <div class="layui-input-block">
            <input type="text" name="kb_4_rate" value='<?php echo htmlentities((isset($vo['kb_4_rate']) && ($vo['kb_4_rate'] !== '')?$vo['kb_4_rate']:"")); ?>' required="required" title="请输入酷宝费率" placeholder="请输入酷宝费率" class="layui-input">
            <p class="help-block color-desc"><b>酷宝费率：万分比。小额35通道</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">酷宝费用</label>
        <div class="layui-input-block">
            <input type="text" name="kb_fee" value='<?php echo htmlentities((isset($vo['kb_fee']) && ($vo['kb_fee'] !== '')?$vo['kb_fee']:"")); ?>' required="required" title="请输入酷宝费用" placeholder="请输入酷宝费用" class="layui-input">
            <p class="help-block color-desc"><b>酷宝单笔费用，元/笔</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">畅捷费率</label>
        <div class="layui-input-block">
            <input type="text" name="cj_pay_rate" value='<?php echo htmlentities((isset($vo['cj_pay_rate']) && ($vo['cj_pay_rate'] !== '')?$vo['cj_pay_rate']:"")); ?>' required="required" title="请输入畅捷费率" placeholder="请输入畅捷费率" class="layui-input">
            <p class="help-block color-desc"><b>畅捷费率：万分比。收款通道</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">畅捷费用</label>
        <div class="layui-input-block">
            <input type="text" name="cj_pay_fee" value='<?php echo htmlentities((isset($vo['cj_pay_fee']) && ($vo['cj_pay_fee'] !== '')?$vo['cj_pay_fee']:"")); ?>' required="required" title="请输入畅捷费用" placeholder="请输入畅捷费用" class="layui-input">
            <p class="help-block color-desc"><b>畅捷单笔费用，元/笔。收款通道</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">先锋费率</label>
        <div class="layui-input-block">
            <input type="text" name="xf_pay_rate" value='<?php echo htmlentities((isset($vo['xf_pay_rate']) && ($vo['xf_pay_rate'] !== '')?$vo['xf_pay_rate']:"")); ?>' required="required" title="请输入先锋费率" placeholder="请输入先锋费率" class="layui-input">
            <p class="help-block color-desc"><b>先锋费率：万分比。收款通道</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">先锋费用</label>
        <div class="layui-input-block">
            <input type="text" name="xf_pay_fee" value='<?php echo htmlentities((isset($vo['xf_pay_fee']) && ($vo['xf_pay_fee'] !== '')?$vo['xf_pay_fee']:"")); ?>' required="required" title="请输入先锋费用" placeholder="请输入先锋费用" class="layui-input">
            <p class="help-block color-desc"><b>先锋单笔费用，元/笔。收款通道</b></p>
        </div>
    </div>
    
    <div class="layui-form-item">
        <label class="layui-form-label">升级费用</label>
        <div class="layui-input-block">
            <input type="text" name="money" value='<?php echo htmlentities((isset($vo['money']) && ($vo['money'] !== '')?$vo['money']:"")); ?>' required="required" title="请输入升级费用" placeholder="请输入升级费用" class="layui-input">
            <p class="help-block color-desc"><b>用户直接缴费升级金额</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">直推升级</label>
        <div class="layui-input-block">
            <input type="text" name="subordinate_num" value='<?php echo htmlentities((isset($vo['subordinate_num']) && ($vo['subordinate_num'] !== '')?$vo['subordinate_num']:"")); ?>' required="required" title="请输入直推升级数量" placeholder="请输入直推升级数量" class="layui-input">
            <p class="help-block color-desc"><b>当前等级用户直推数量达标升级下一高等级</b></p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">团队奖励</label>
        <div class="layui-input-block">
            <input type="text" name="group_rate" value='<?php echo htmlentities((isset($vo['group_rate']) && ($vo['group_rate'] !== '')?$vo['group_rate']:"")); ?>' required="required" title="请输入团队奖励" placeholder="请输入团队奖励" class="layui-input">
            <p class="help-block color-desc"><b>当平级后团队直推奖励还款额度的比例（%）</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">新人还款奖励</label>
        <div class="layui-input-block">
            <input type="text" name="new_money" value='<?php echo htmlentities((isset($vo['new_money']) && ($vo['new_money'] !== '')?$vo['new_money']:"")); ?>' required="required" title="请输入新人还款奖励" placeholder="请输入新人还款奖励" class="layui-input">
            <p class="help-block color-desc"><b>当新人进行还款时，奖励一次性金额</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">推荐新人奖励</label>
        <div class="layui-input-block">
            <input type="text" name="new2_money" value='<?php echo htmlentities((isset($vo['new2_money']) && ($vo['new2_money'] !== '')?$vo['new2_money']:"")); ?>' required="required" title="请输入推荐新人奖励" placeholder="请输入推荐新人奖励" class="layui-input">
            <p class="help-block color-desc"><b>当新人进行还款时，奖励推荐人一次性金额</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">等级说明</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" style="height:400px;" style="height:400px;" name="info" required="required" placeholder="请输入等级说明"><?php echo htmlentities((isset($vo['info']) && ($vo['info'] !== '')?$vo['info']:'')); ?></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">排列序号</label>
        <div class="layui-input-block">
            <input type="text" name="sort" value='<?php echo htmlentities((isset($vo['sort']) && ($vo['sort'] !== '')?$vo['sort']:"")); ?>' required="required" title="请输入问题" placeholder="请输入问题" class="layui-input">
            <p class="help-block color-desc"><b>数字越大，等级越高，相同数字下后添加的等级高</b></p>
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
        window.createEditor('[name="info"]', {height: 300});
    });
</script>
