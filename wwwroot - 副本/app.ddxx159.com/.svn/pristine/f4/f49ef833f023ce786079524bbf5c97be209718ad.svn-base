<?php /*a:2:{s:70:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\adv\index.html";i:1557729709;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("$classuri/add"); ?>' data-title="添加推广" class='layui-btn layui-btn-sm layui-btn-primary'>添加推广</button>
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>删除推广</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<!-- 表单搜索 开始 -->
<form autocomplete="off" class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">推广标题</label>
        <div class="layui-input-inline">
            <input name="title" value="<?php echo htmlentities(app('request')->get('title')); ?>" placeholder="请输入推广标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">发布人</label>
        <div class="layui-input-inline">
            <input name="username" value="<?php echo htmlentities(app('request')->get('username')); ?>" placeholder="请输入发布人" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <select name="status" class="layui-select">
                <option value="">所有推广</option>
                <!--<?php foreach(["0"=>"隐藏","1"=>"显示"] as $k=>$v): ?>-->
                <?php if(app('request')->get('status') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">推广类型</label>
        <div class="layui-input-inline">
            <select name="type" class="layui-select">
                <option value="">所有推广</option>
                <!--<?php foreach(['1'=>'图文','2'=>'视频'] as $k=>$v): ?>-->
                <?php if(app('request')->get('type') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>


    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">推广分类</label>
        <div class="layui-input-inline">
            <select name="cate" class="layui-select">
                <option value="">所有推广</option>
                <!--<?php foreach(getCates() as $k=>$v): ?>-->
                <?php if(app('request')->get('cate') == $v['id']): ?>
                <option selected="selected" value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['cateName']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['cateName']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>

</form>
<script>
    window.form.render();
    $('[data-time]').map(function () {
        window.laydate.render({range: true, elem: this});
    });
</script>
<!-- 表单搜索 结束 -->

<form autocomplete="off" onsubmit="return false;" data-auto="true" method="post">
    <?php if(empty($list)): ?>
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <?php else: ?>
    <table class="layui-table" lay-size="sm">
        <thead>
        <tr>
            <th class='list-table-check-td think-checkbox'>
                <input data-auto-none="none" data-check-target='.list-check-box' type='checkbox'/>
            </th>
            <th class="text-center nowrap">标题</th>
            <th class='text-center nowrap'>发布人</th>
            <th class='text-center nowrap'>分类</th>
            <th class='text-center nowrap'>类型</th>
            <th class="text-center nowrap">状态</th>
            <th class="text-center nowrap">发布时间</th>
            <th class="text-center nowrap">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class='list-table-check-td text-top think-checkbox'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['title']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['username']); ?></td>
            <td class="text-center nowrap"><?php echo getCate($vo['cate']); ?></td>
            <td class='text-center'>
                <!--<?php foreach(['1'=>'图文','2'=>'视频'] as $k=>$v): ?>-->
                <?php if($vo['type'] == "$k"): ?><?php echo htmlentities($v); endif; ?>
                <!--<?php endforeach; ?>-->
            </td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span class="color-red">隐藏</span><?php elseif($vo['status'] == 1): ?><span class="color-green">显示</span><?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['add_time']); ?></td>
            <td class='text-center notselect'>

                <?php if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a data-title="编辑" data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
                <?php endif; if (session("user.id") == "10000"){ if($vo['status'] == 1 and auth("$classuri/forbid")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>'>隐藏</a>
                <?php elseif(auth("$classuri/resume")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'>显示</a>
                <?php endif; } if(auth("$classuri/del")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='delete' data-action='<?php echo url("$classuri/del"); ?>'>删除</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>

</div>
</div>

<!-- 右则内容区域 结束 -->