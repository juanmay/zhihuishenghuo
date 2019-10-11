<?php /*a:2:{s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\repayment\fail.html";i:1560406334;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">

<!-- 表单搜索 开始 -->
<form autocomplete="off" class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get">
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户手机</label>
        <div class="layui-input-inline">
            <input name="phone" value="<?php echo htmlentities((app('request')->get('phone') ?: '')); ?>" placeholder="请输入用户手机" class="layui-input">
        </div>
    </div>
    
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">用户姓名</label>
        <div class="layui-input-inline">
            <input name="realname" value="<?php echo htmlentities((app('request')->get('realname') ?: '')); ?>" placeholder="请输入用户姓名" class="layui-input">
        </div>
    </div>

    
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">银行卡号</label>
        <div class="layui-input-inline">
            <input name="bank_num" value="<?php echo htmlentities((app('request')->get('bank_num') ?: '')); ?>" placeholder="请输入银行卡号" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">申请时间</label>
        <div class="layui-input-inline">
            <input name="add_time" data-time value="<?php echo htmlentities(app('request')->get('add_time')); ?>" placeholder="请选择申请时间" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">代还渠道</label>
        <div class="layui-input-inline">
            <select name="channel_type" class="layui-select">
                <option value="">所有订单</option>
                <!--<?php foreach(["cj"=>"畅捷大额","tl"=>"通联小额","xh"=>"信汇小额"] as $k=>$v): ?>-->
                <?php if(app('request')->get('channel_type') == "$k"): ?>
                <option selected="selected" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
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

<form onsubmit="return false;" data-auto="true" method="post">
    <!--<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>-->
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <!--<?php else: ?>-->
    <input type="hidden" value="resort" name="action">
    <table class="layui-table" lay-size="sm">
        <thead>
        <tr>
            <!-- <th class='list-table-check-td think-checkbox'>
                <input data-auto-none="" data-check-target='.list-check-box' type='checkbox'>
            </th> -->
            <th class='text-center'>编号</th>
            <th class='text-center'>手机/姓名</th>
            <th class='text-center'>计划金额</th>
            <th class='text-center'>出款金额</th>
            <th class='text-center'>入款金额</th>
            <th class='text-center'>银行卡号</th>
            <th class='text-center'>银行名称</th>
            <th class='text-center'>申请时间</th>
            <th class='text-center'>渠道类型</th>
            <th class='text-center'>失败状态</th>
            <th class='text-center'>失败原因</th>
            <th class='text-center'>操作</th>
        </tr>
        </thead>
        <tbody>
        <!--<?php foreach($list as $key=>$vo): ?>-->
        <tr>
            <!-- <td class='list-table-check-td think-checkbox'>
                <input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'>
            </td> -->
            <td class='text-center'><?php echo htmlentities($vo['id']); ?></td>
            <td class='text-center'><?php echo htmlentities($vo['phone']); ?>/<?php echo htmlentities($vo['realname']); ?></td>
            <td class='text-center'>￥<?php echo htmlentities($vo['repayment_money']); ?></td>
            <td class='text-center'>￥<?php echo htmlentities($vo['has_pay_money']); ?></td>
            <td class='text-center'>￥<?php echo htmlentities($vo['has_repayment_money']); ?></td>
            <td class='text-center'><?php echo htmlentities($vo['bank_num']); ?></td>
            <td class='text-center'><?php echo htmlentities($vo['bank_name']); ?></td>
            <td class='text-center'><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['add_time'])? strtotime($vo['add_time']) : $vo['add_time'])); ?></td>
            <td class='text-center'>
                <!--<?php foreach(["cj"=>"畅捷大额","tl"=>"通联小额","xh"=>"信汇小额"] as $k=>$v): ?>-->
                <?php if($vo['channel_type'] == "$k"): ?><?php echo htmlentities($v); endif; ?>
                <!--<?php endforeach; ?>-->
            </td>
            <td class='text-center'><?php if ($vo['fail_status'] == "1") {
              echo "处理中";
            } elseif ($vo['fail_status'] == "2") {
              echo "已处理";
            } else {
              echo "未失败";
            }
             ?>
            </td>
            <td class='text-center'><?php echo htmlentities((isset($vo['result_info']) && ($vo['result_info'] !== '')?$vo['result_info']:'---')); ?></td>
             <td class='text-center'>
                <?php if(auth("$classuri/info")): ?>
                <a data-title="查看" data-open="<?php echo url("$classuri/info"); ?>?id=<?php echo htmlentities($vo['id']); ?>">查看</a>
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