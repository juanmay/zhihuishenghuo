<?php /*a:1:{s:69:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\adv\form.html";i:1557729709;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">推广标题</label>
        <div class="layui-input-block">
            <input type="text" name="title" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' required="required" title="请输入推广标题" placeholder="请输入推广标题" class="layui-input">
            <p class="help-block color-desc"><b>必填</b></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">推广分类</label>
        <div class="layui-input-inline">
            <select name="cate" class="layui-select">
            <?php if (!isset($vo['cate'])) { $vo['cate'] = ''; } $cate = getCates(); ?>
                <!--<?php foreach($cate as $v): ?>-->
                <?php if($vo['cate'] == $v['id']): ?>
                <option selected="selected" value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['cateName']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['cateName']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
            <p class="help-block color-desc"><b>必选</b>，用户可以获得等级差价分润</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">推广类型</label>
        <div class='col-sm-8'>
            <?php  if (!isset($vo['type'])) { $vo['type'] = 1; } foreach(['1'=>'图文','2'=>'视频'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if($vo['type'] == $k): ?>-->
                <input checked type="radio" name="type" onclick="hideVideo()" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="type" onclick="showVideo()" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">不同类型所展示方式不同。</p>
        </div>
    </div>
    <script type="text/javascript">
        function hideVideo(){
            $("#videoTag").hide();
        }
        function showVideo(){
            $("#videoTag").show();
        }

        function modSrc(obj){
            document.getElementById('videoPlay').src = obj.value;
        }
    </script>
    
    <div id="videoTag" class="layui-form-item" <?php if ($vo['type'] == "1"): ?>
        style="display:none;"
    <?php endif ?>>
        <label class="layui-form-label">视频文件</label>
        <div class="layui-input-block">
            <?php  if (!isset($vo['video'])) { $vo['video'] = ""; } ?>
            <video width="200" id="videoPlay" src="<?php echo htmlentities($vo['video']); ?>" controls="controls">
            您的浏览器不支持 video 标签。
            </video>
            <input type="hidden" name="video" onchange="modSrc(this)" value="<?php echo htmlentities((isset($vo['video']) && ($vo['video'] !== '')?$vo['video']:"")); ?>">
            <a class="btn btn-link" data-file="one" data-uptype="local" data-type="mp4" data-field="video">上传文件</a>
            <p class="help-block">仅支持mp4格式视频文件上传。</p>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">推广内容</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" style="height:400px;" name="content" required="required" placeholder="请输入推广内容"><?php echo htmlentities((isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:'')); ?></textarea>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">广告简要</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" style="height:400px;" name="adv_description" required="required" placeholder="请输入推广内容"><?php echo htmlentities((isset($vo['adv_description']) && ($vo['adv_description'] !== '')?$vo['adv_description']:'')); ?></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">广告内容</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" style="height:400px;" name="adv_content" required="required" placeholder="请输入推广内容"><?php echo htmlentities((isset($vo['adv_content']) && ($vo['adv_content'] !== '')?$vo['adv_content']:'')); ?></textarea>
        </div>
    </div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"0")); ?>' name='id'><?php endif; if(isset($vo['userId'])): ?>
            <input type='hidden' value='<?php echo htmlentities($vo['userId']); ?>' name='userId'>
        <?php else: ?>
            <input type='hidden' value='<?php echo session("user.id"); ?>' name='userId'>
        <?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消操作吗？" data-close>取消操作</button>
    </div>

    <div class="hr-line-dashed"></div>
</form>
<script type="text/javascript">
    require(['jquery', 'ckeditor', 'angular'], function () {
        window.form.render();
        window.createEditor('[name="content"]', {height: 300});
        window.createEditor('[name="adv_description"]', {height: 300});
        window.createEditor('[name="adv_content"]', {height: 300});
    });
</script>
