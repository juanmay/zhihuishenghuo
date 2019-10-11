<?php /*a:2:{s:53:"E:\www\jinma\application\admin\view\member\index.html";i:1557732536;s:55:"E:\www\jinma\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
<!--<?php if(auth("$classuri/add")): ?>-->
<!-- <button data-modal='<?php echo url("$classuri/add"); ?>' data-title="添加用户" class='layui-btn layui-btn-sm layui-btn-primary'>添加用户</button> -->
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>删除用户</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<!-- 表单搜索 开始 -->
<form autocomplete="off" class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户手机</label>
        <div class="layui-input-inline">
            <input name="phone" value="<?php echo htmlentities(app('request')->get('phone')); ?>" placeholder="请输入用户手机" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户姓名</label>
        <div class="layui-input-inline">
            <input name="realname" value="<?php echo htmlentities(app('request')->get('realname')); ?>" placeholder="请输入用户姓名" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">实名状态</label>
        <div class="layui-input-inline">
            <select name="realnameStatus" class="layui-select">
                <option value="">所有用户</option>
                <!--<?php foreach(["1"=>"已实名","0"=>"未实名"] as $k=>$v): ?>-->
                <?php if(app('request')->get('realnameStatus') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户等级</label>
        <div class="layui-input-inline">
            <select name="level" class="layui-select">
                <option value="">所有用户</option>
                <!--<?php foreach(getMemberLevel() as $v): ?>-->
                <?php if(app('request')->get('level') == $v['id']): ?>
                <option selected="selected" value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['name']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['name']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">注册时间</label>
        <div class="layui-input-inline">
            <input name="regTime" data-time value="<?php echo htmlentities(app('request')->get('regTime')); ?>" placeholder="请选择注册时间" class="layui-input">
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
            <th class="text-center nowrap">头像</th>
            <th class="text-center nowrap">用户手机</th>
            <th class="text-center nowrap">用户姓名</th>
            <th class="text-center nowrap">推荐人</th>
            <th class="text-center nowrap">用户等级</th>
            <!-- <th class="text-center nowrap">激活码数</th> -->
            <th class="text-center nowrap">账户余额</th>
            <th class="text-center nowrap">冻结余额</th>
            <th class="text-center nowrap">累计收益</th>
            <th class="text-center nowrap">实名状态</th>
            <th class="text-center nowrap">用户状态</th>
            <th class="text-center nowrap">注册时间</th>
            <th class="text-center nowrap">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class='list-table-check-td text-top think-checkbox'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'/>
            </td>
            <td class="text-center nowrap">
                <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo htmlentities((isset($vo['avatar']) && ($vo['avatar'] !== '')?$vo['avatar']:'/static/avatar.png')); ?>"/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['phone']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class="text-center nowrap"><?php echo getMember($vo['recommendId']); ?></td>
            <td class="text-center nowrap"><?php echo getMemberLevelName($vo['level']); ?></td>
            <!-- <td class="text-center nowrap"><?php echo htmlentities($vo['code_num']); ?></td> -->
            <td class="text-center nowrap">￥<?php echo htmlentities($vo['accountMoney']); ?></td>
            <td class="text-center nowrap">￥<?php echo htmlentities($vo['freezeMoney']); ?></td>
            <td class="text-center nowrap">￥<?php echo htmlentities($vo['bonusMoney']); ?></td>
            <td class='text-center'>
                <?php if($vo['realnameStatus'] == 0): ?><span>未实名</span><?php elseif($vo['realnameStatus'] == 1): ?><span class="color-green">已实名</span><?php endif; ?>
            </td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span>禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">启用</span><?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['regTime']); ?></td>
            <td class='text-center notselect'>

                <?php if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a data-title="编辑" data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
                <?php endif; if(auth("$classuri/money")): ?>
                <span class="text-explode">|</span>
                <a data-title="调额" data-modal='<?php echo url("$classuri/money"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>调额</a>
                <?php endif; if($vo['status'] == 1 and auth("$classuri/forbid")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>'>禁用</a>
                <?php elseif(auth("$classuri/resume")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'>启用</a>
                <?php endif; if(auth("$classuri/del")): ?>
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