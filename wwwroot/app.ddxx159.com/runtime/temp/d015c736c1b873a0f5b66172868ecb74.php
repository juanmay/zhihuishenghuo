<?php /*a:2:{s:78:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\repayment\info.html";i:1565763783;s:78:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<button class="layui-btn layui-btn-danger" type='button' onclick="JavaScript:history.go(-1);" data-close>返回</button>
<!-- 表单 开始 -->
<table class="layui-table">
	<tbody>
		<tr>
			<td align="right" width="150">用户手机</td><td><?php echo htmlentities($info['phone']); ?></td>
			<td align="right" width="150">用户姓名</td><td><?php echo htmlentities($info['realname']); ?></td>
		</tr>
		<tr>
			<td align="right" width="150">身份证号</td><td><?php echo htmlentities($info['idcard']); ?></td>
			<td align="right" width="150">银行卡号</td><td><?php echo htmlentities($info['bank_num']); ?></td>
		</tr>
		<tr>
            <td align="right" width="150">还款金额</td><td><?php echo htmlentities($info['repayment_money']); ?></td>
            <td align="right" width="150">银行名称</td><td><?php echo htmlentities($info['bank_name']); ?></td>
		</tr>
		<tr>
            <td align="right" width="150">预留金额</td><td><?php echo htmlentities($info['min_money']); ?></td>
            <td align="right" width="150">还款费用</td><td><?php echo htmlentities($info['fee_money']); ?></td>
		</tr>
		<tr>
            <td align="right" width="150">手续费用</td><td><?php echo htmlentities(sprintf("%.2f",$info['fee_money']-$info['frequency_money'])); ?></td>
            <td align="right" width="150">次数费用</td><td><?php echo htmlentities($info['frequency_money']); ?></td>
        </tr>
        <tr>
            <td align="right" width="150">开始时间</td><td><?php echo htmlentities(date("Y-m-d",!is_numeric($info['start_time'])? strtotime($info['start_time']) : $info['start_time'])); ?></td>
            <td align="right" width="150">结束时间</td><td><?php echo htmlentities(date("Y-m-d",!is_numeric($info['end_time'])? strtotime($info['end_time']) : $info['end_time'])); ?></td>
        </tr>
        <tr>
			<td align="right" width="150">出款金额</td><td><?php echo htmlentities($info['has_pay_money']); ?></td>
			<td align="right" width="150">入款金额</td><td><?php echo htmlentities($info['has_repayment_money']); ?></td>
		</tr>
		<tr>
            <td align="right" width="150">运行通道</td><td><?php echo repaymentChannelType($info['channel_type']); ?></td>
            <td align="right" width="150">提交时间</td><td><?php echo htmlentities(date("Y-m-d",!is_numeric($info['add_time'])? strtotime($info['add_time']) : $info['add_time'])); ?></td>
		</tr>
        <?php if ($info['refund_time']>0): ?>
        <tr>
            <td align="right" width="150">退款时间</td><td><?php echo htmlentities($info['refund_time']); ?></td>
            <td align="right" width="150">退款金额</td><td><?php echo htmlentities($info['refund_money']); ?></td>
        </tr>
        <tr>
            <td align="right" width="150">处理结果</td><td><?php echo htmlentities((isset($info['result_info']) && ($info['result_info'] !== '')?$info['result_info']:"无处理信息")); ?></td>
            <td align="right" width="150">退款结果</td><td><?php echo htmlentities((isset($info['refund_info']) && ($info['refund_info'] !== '')?$info['refund_info']:"无处理信息")); ?></td>
        </tr>
        <?php endif ?>
	</tbody>
</table>
<!-- 表单 结束 -->

<form onsubmit="return false;" data-auto="true" method="post">
    <!--<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>-->
    <p class="help-block text-center well">没 有 记 录 哦！</p>
    <!--<?php else: ?>-->
    <input type="hidden" value="resort" name="action">
    <table class="layui-table" lay-size="sm">
        <thead>
        <tr>
            <th class='text-center'>序号</th>
            <th class='text-center'>计划时间</th>
            <th class='text-center'>计划类型</th>
            <th class='text-center'>计划金额</th>
            <th class='text-center'>手续费</th>
            <th class='text-center'>执行单号</th>
            <th class='text-center'>处理信息</th>
            <th class='text-center'>状态</th>
            <th class='text-center'>编号</th>
        </tr>
        </thead>
        <tbody>
        <!--<?php foreach($list as $key=>$vo): ?>-->
        <tr>
            <td class='text-center'><?php echo htmlentities($vo['sort']); ?></td>
            <td class='text-center'><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['run_time'])? strtotime($vo['run_time']) : $vo['run_time'])); ?></td>
            <td class='text-center'><?php if($vo['type'] == 1): ?><span class="color-red">消费</span><?php elseif($vo['type'] == 2): ?><span class="color-green">还款</span><?php endif; ?></td>
            <td class='text-center'>￥<?php echo htmlentities($vo['money']); ?></td>
            <td class='text-center'>￥<?php echo htmlentities($vo['fee_money']); ?></td>
            <td class='text-center'><?php echo htmlentities((isset($vo['orderNo']) && ($vo['orderNo'] !== '')?$vo['orderNo']:'---')); ?></td>
            <td class='text-center'><?php echo htmlentities((isset($vo['deal_info']) && ($vo['deal_info'] !== '')?$vo['deal_info']:'---')); ?></td>
            <td class='text-center'><?php echo htmlentities($status[$vo['status']]); ?></td>
            <td class='text-center'><?php echo htmlentities($vo['id']); ?></td>
        </tr>
        <!--<?php endforeach; ?>-->
        </tbody>
    </table>
    <!--<?php endif; ?>-->
</form>
<button class="layui-btn layui-btn-danger" type='button' onclick="JavaScript:history.go(-1);" data-close>返回</button>
</div>
</div>

<!-- 右则内容区域 结束 -->