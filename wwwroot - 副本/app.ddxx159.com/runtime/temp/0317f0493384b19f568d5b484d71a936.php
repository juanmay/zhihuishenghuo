<?php /*a:2:{s:78:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\allmoneylog\index.html";i:1558084214;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
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
        <label class="layui-form-label">变动类型</label>
        <div class="layui-input-inline">
            <select name="moneyType" class="layui-select">
                <option value="">所有类型</option>
                <?php if (input('get.type') == "member"){ ?>
                <!--<?php foreach(["1"=>"收益分配","2"=>"提现申请","3"=>"提现成功","4"=>"提现失败","5"=>"账户充值","6"=>"全额驳回","7"=>"全额支付"] as $k=>$v): ?>-->
                <?php if(app('request')->get('moneyType') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
                <?php }else{ ?>
                <!--<?php foreach(["1"=>"收益分配","2"=>"提现申请","3"=>"提现成功","4"=>"提现失败"] as $k=>$v): ?>-->
                <?php if(app('request')->get('moneyType') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">交易时间</label>
        <div class="layui-input-inline">
            <input name="add_time" data-time value="<?php echo htmlentities(app('request')->get('add_time')); ?>" placeholder="请选择交易时间" class="layui-input">
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
            <th class="text-center nowrap">用户手机</th>
            <th class="text-center nowrap">用户姓名</th>
            <th class="text-center nowrap">影响金额</th>
            <th class="text-center nowrap">账户余额</th>
            <th class="text-center nowrap">冻结金额</th>
            <th class="text-center nowrap">类型</th>
            <th class="text-center nowrap">说明</th>
            <th class="text-center nowrap">时间</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $key=>$vo): ?>
        <tr>
            <td class='list-table-check-td text-top think-checkbox'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'/>
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['phone']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['realname']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['affectMoney']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['accountMoney']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['freezeMoney']); ?></td>
            <td class='text-center'>
                <!--<?php foreach(["1"=>"收益分配","2"=>"提现申请","3"=>"提现成功","4"=>"提现失败","5"=>"账户充值","6"=>"全额驳回"] as $k=>$v): ?>-->
                <?php if($vo['moneyType'] == "$k"): ?><?php echo htmlentities($v); endif; ?>
                <!--<?php endforeach; ?>-->
            </td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['info']); ?></td>
            <td class="text-center nowrap"><?php echo htmlentities($vo['add_time']); ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; endif; ?>
</form>

</div>
</div>

<!-- 右则内容区域 结束 -->