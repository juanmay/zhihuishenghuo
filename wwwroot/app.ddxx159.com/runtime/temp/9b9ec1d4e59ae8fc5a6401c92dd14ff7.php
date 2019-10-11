<?php /*a:1:{s:77:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\member\recommend.html";i:1560395876;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">用户上级</label>
        <div class="layui-input-inline">
            <select name="recommendId" class="layui-select" required="required"  lay-verify='recommendId' lay-search="">
				<option value="">直接选择或搜索选择</option>
				
				<?php if($member['recommendId'] == 0): ?>
				<option value="0" selected="selected">平台</option>
				<?php endif; if(is_array($recommend) || $recommend instanceof \think\Collection || $recommend instanceof \think\Paginator): if( count($recommend)==0 ) : echo "" ;else: foreach($recommend as $key=>$v): if($v['id'] == $member['recommendId']): ?>
					<option value="<?php echo htmlentities($v['id']); ?>" selected="selected" ><?php echo htmlentities($v['phone']); ?>|<?php echo htmlentities($v['realname']); ?></option>
				<?php else: ?>
                	<option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['phone']); ?>|<?php echo htmlentities($v['realname']); ?></option>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</select>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
	<div class="layui-form-item">
        <label class="layui-form-label" style='color:red;'>用户信息</label>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">当前上级：</label>
        <div class="layui-input-inline"><?php echo htmlentities($member['recommendname']); ?></div>
        
        <label class="layui-form-label">用户等级：</label>
        <div class="layui-input-inline">
            <?php $level = getMemberLevel(); ?>
                <!--<?php foreach($level as $k=>$v): ?>-->
                <?php if($vo['level'] == "$k"): ?>
                <?php echo htmlentities($v['name']); endif; ?>
                <!--<?php endforeach; ?>-->
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户手机号：</label>
        <div class="layui-input-inline"><?php echo htmlentities($member['phone']); ?></div>
        <label class="layui-form-label">用户昵称：</label>
        <div class="layui-input-inline"><?php echo htmlentities($member['nickName']); ?></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户实名：</label>
        <div class="layui-input-inline"><?php echo htmlentities($member['realname']); ?></div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="layui-form-item text-center">
        <input type='hidden' value='<?php echo htmlentities((isset($member['id']) && ($member['id'] !== '')?$member['id']:"0")); ?>' name='id'>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>
</form>
<script>
window.form.render();
window.form.verify({
	recommendId: function(value, item){
	    if(value === ''){
	      return '必选';
	    }
	  }
	});  
</script>