<?php /*a:2:{s:79:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\allmember\index.html";i:1566453855;s:78:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
<!--<?php if(auth("$classuri/add")): ?>-->
<button data-modal='<?php echo url("$classuri/add"); ?>' data-title="添加品牌" class='layui-btn layui-btn-sm layui-btn-primary'>添加代理</button>
<!--<?php endif; ?>-->
<!--<?php if(auth("$classuri/del")): ?>-->
<button data-update data-field='dataFlag' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>删除品牌</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<!-- 表单搜索 开始 -->
<form autocomplete="off" class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">代理手机</label>
        <div class="layui-input-inline">
            <input name="phone" value="<?php echo htmlentities(app('request')->get('phone')); ?>" placeholder="请输入代理手机" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">代理姓名</label>
        <div class="layui-input-inline">
            <input name="realname" value="<?php echo htmlentities(app('request')->get('realname')); ?>" placeholder="请输入代理姓名" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">审核状态</label>
        <div class="layui-input-inline">
            <select name="status" class="layui-select">
                <option value="">所有代理</option>
                <!--<?php foreach(["1"=>"正常","2"=>"禁用"] as $k=>$v): ?>-->
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
            <th class="text-center nowrap">商户号</th>
            <th class="text-center nowrap">法人手机</th>
            <th class="text-center nowrap">法人姓名</th>
            <th class="text-center nowrap">公司名称</th>
            <th class="text-center nowrap">费用设置</th>
            <th class="text-center nowrap">账户余额</th>
            <th class="text-center nowrap">冻结金额</th>
            <th class="text-center nowrap">收益金额</th>
            <th class="text-center nowrap">审核状态</th>
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
            <td class="text-center nowrap"><?php echo htmlentities($vo['id']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['phone']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['companyName']); ?></td>
            <td class="text-left">
                <button data-method="notice" onclick="showRate('<table><tr><td align=right>环讯通道：</td><td> <?php echo htmlentities($vo['firstRepaymentRate']); ?>元/万元</td></tr><tr><td align=right>畅捷110002通道：</td><td> <?php echo htmlentities($vo['secondRepaymentRate']); ?>元/万元</td></tr><tr><td align=right>畅捷110001通道：</td><td> <?php echo htmlentities($vo['thirdRepaymentRate']); ?>元/万元</td></tr><tr><td align=right>畅捷110003通道：</td><td> <?php echo htmlentities($vo['fourthRepaymentRate']); ?>元/万元</td></tr><tr><td align=right>畅捷小额通道：</td><td> <?php echo htmlentities($vo['seventhRepaymentRate']); ?>元/万元</td></tr><tr><td align=right>空卡通道：</td><td> <?php echo htmlentities($vo['fifthRepaymentRate']); ?>元/万元</td></tr><tr><td align=right>一卡还卡通道：</td><td> <?php echo htmlentities($vo['sixthRepaymentRate']); ?>元/万元</td><tr><td align=right>代还单笔：</td><td> <?php echo htmlentities($vo['RepaymentFee']); ?>元/万元</td></tr></tr><tr><td align=right>畅捷收款：</td><td> <?php echo htmlentities($vo['cjQuickRate']); ?>元/万元</td></tr><tr><td align=right>易宝收款：</td><td> <?php echo htmlentities($vo['ybQuickRate']); ?>元/万元</td></tr><tr><td align=right>收款单笔：</td><td> <?php echo htmlentities($vo['QuickFee']); ?>元/万元</td></tr><tr><td align=right>二要素鉴权：</td><td> <?php echo htmlentities($vo['twoVerify']); ?>元/万元</td></tr><tr><td align=right>四要素鉴权：</td><td> <?php echo htmlentities($vo['fourVerify']); ?>元/万元</td></tr></table>')" class="layui-btn">查看费率</button>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['accountMoney']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['freezeMoney']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['bonusMoney']); ?></td>
            <td class='text-center'>
                <?php if($vo['status'] == 0): ?><span>待审</span><?php elseif($vo['status'] == 1): ?><span class="color-green">正常</span><?php elseif($vo['status'] == 2): ?><span class="color-green">禁用</span><?php endif; ?>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['regTime']); ?></td>
            <td class='text-center notselect'>
            	<?php if(auth("$classuri/money")): ?>
                <span class="text-explode">|</span>
                <a data-title="充值" data-modal='<?php echo url("$classuri/money"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>充值</a>
                <?php endif; if(auth("$classuri/edit")): ?>
                <span class="text-explode">|</span>
                <a data-title="编辑" data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a>
                <?php endif; if($vo['status'] == 1 and auth("$classuri/forbid")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='2' data-action='<?php echo url("$classuri/forbid"); ?>'>禁用</a>
                <?php elseif(auth("$classuri/resume")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'>启用</a>
                <?php endif; if(auth("$classuri/del")): ?>
                <span class="text-explode">|</span>
                <a data-update="<?php echo htmlentities($vo['id']); ?>" data-field='dataFlag' data-action='<?php echo url("$classuri/del"); ?>'>删除</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>

<script type="text/javascript">
    function showRate (html) {
        //示范一个公告层
        layer.open({
            type: 1
            ,title: false //不显示标题栏
            ,closeBtn: false
            ,area: '300px;'
            ,shade: 0.8
            ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
            ,btn: ['关闭']
            ,btnAlign: 'c'
            ,moveType: 1 //拖拽模式，0或者1
            ,content: '<div style="padding: 20px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+html+'</div>'
            });
    }
</script>

</div>
</div>

<!-- 右则内容区域 结束 -->