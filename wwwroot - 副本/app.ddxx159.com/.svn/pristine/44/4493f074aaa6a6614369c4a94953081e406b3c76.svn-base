<?php /*a:2:{s:51:"E:\www\jinma\application\admin\view\area\index.html";i:1556184467;s:55:"E:\www\jinma\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
<!--<?php if(input("get.pid/d",0)>0): ?>-->
<button data-open='<?php echo url("$classuri/index"); ?>?pid=<?php echo input("get.ppid/d",0); ?>' data-title="返回上级" class='layui-btn layui-btn-sm layui-btn-primary'>上级地区</button>
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("$classuri/add"); ?>?pid=<?php echo input("get.pid/d",0); ?>' data-title="添加地区" class='layui-btn layui-btn-sm layui-btn-primary'>添加地区</button>
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>删除地区</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<form autocomplete="off" onsubmit="return false;" data-auto="true" method="post">
    <!--<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>-->
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <!--<?php else: ?>-->
    <input type="hidden" value="resort" name="action">
    <table id="test" class="layui-table" lay-skin="line">
        <thead>
        <tr>
            <th class='list-table-check-td think-checkbox'>
                <input data-auto-none="" data-check-target='.list-check-box' type='checkbox'>
            </th>
            <th class='list-table-sort-td'>
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-xs">排 序</button>
            </th>
            <th>地区名称</th>
            <th class='text-center'>状态</th>
            <th class='text-center'>操作</th>
        </tr>
        </thead>
        <tbody>
        <!--<?php foreach($list as $key=>$vo): ?>-->
        <tr>
            <td class='list-table-check-td think-checkbox'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'>
            </td>
            <td class='list-table-sort-td'>
                <input name="_<?php echo htmlentities($vo['id']); ?>" value="<?php echo htmlentities($vo['sort']); ?>" class="list-sort-input">
            </td>
            <td><?php echo htmlentities($vo['name']); ?></td>
            <td class='text-center'>
                <?php if($vo['isShow'] == 0): ?><span>隐藏</span><?php elseif($vo['isShow'] == 1): ?><span class="color-green">显示</span><?php endif; ?>
            </td>
            <td class='text-center notselect'>

                <?php if(auth("$classuri/index")): ?>
                <span class="text-explode">|</span>
                <a data-title="下级地区" data-open='<?php echo url("$classuri/index"); ?>?pid=<?php echo htmlentities($vo['id']); ?>&ppid=<?php echo input("get.pid/d",0); ?>'>下级地区</a>
                <?php endif; if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a data-title="编辑" data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
                <?php endif; if($vo['isShow'] == 1 and auth("$classuri/forbid")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='isShow' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>'>禁用</a>
                <?php elseif(auth("$classuri/resume")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='isShow' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'>启用</a>
                <?php endif; if(auth("$classuri/del")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='delete' data-action='<?php echo url("$classuri/del"); ?>'>删除</a>
                <?php endif; ?>
            </td>
        </tr>
        <!--<?php endforeach; ?>-->
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
    <!--<?php endif; ?>-->
</form>
</div>
</div>

<!-- 右则内容区域 结束 -->