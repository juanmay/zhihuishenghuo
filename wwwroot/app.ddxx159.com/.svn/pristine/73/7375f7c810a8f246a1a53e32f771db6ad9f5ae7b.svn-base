<?php /*a:2:{s:72:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\total\index.html";i:1559643839;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<script src="/static/count2.js"></script>
<style type="text/css">
.all{
	width:100%;
	height: auto;
	background: #fefefe;
}
.title{
	width: 100%;
	font-size:14px;
	color: #333;
	font-weight:100;
	margin-bottom:6px;
	margin-top:6px;
	font-weight:600;
}
.line{
	width:100%;
	height:auto;
	display:flex;
	justify-content:space-between;
}
.totalC{
	width: 23%;
	background:#fff;
	box-shadow:0 0 12px rgba(0,0,0,0.2);
	text-align:center;
}
.container{
	width: 47.15%;
	float: left;
	margin-left: 1%;
	height: 400px;
	margin-top: 10px;
	border: 1px solid #CCC;
}
.tc1{
	width: 100%;
	height:30px;
	line-height:30px;
	border-bottom:1px solid #ccc;
	text-indent: 15px;
	font-size:14px;
	color: #fff;
	background: #24c8cb;
}
.tc2{
	width: 100%;
	height:70px;
	line-height:70px;
	text-indent: 15px;
	font-size: 30px;
	color:#333;	
}
</style>
<div class="all">
	<div class="title">代还统计</div>
	<div class="line">
		<div class="totalC">
			<div class="tc1">昨日还款总额</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['repayment']['yesterdayMoney'])); ?>' data-speed="2500"></font></div>
		</div>
		<div class="totalC">
			<div class="tc1">昨日还款笔数</div>
			<div class="tc2"><font id="x1" xx="<?php echo htmlentities($data['repayment']['yesterdayNum']); ?>"><?php echo htmlentities($data['repayment']['yesterdayNum']); ?></font></div>
		</div>
		<div class="totalC">
			<div class="tc1">累计还款总额</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['repayment']['totalMoney'])); ?>' data-speed="2500"></font></div>
		</div>
		<div class="totalC">
			<div class="tc1">累计还款笔数</div>
			<div class="tc2"><font id="x2" xx="<?php echo htmlentities($data['repayment']['totalNum']); ?>"></font></div>
		</div>
	</div>
	<div class="title">收款统计</div>
	<div class="line">
		<div class="totalC">
			<div class="tc1" style="background:#ea5d6b;">昨日收款总额</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['quick']['yesterdayMoney'])); ?>' data-speed='2500'></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#ea5d6b;">昨日收款笔数</div>
			<div class="tc2"><font id="x3" xx="<?php echo htmlentities($data['quick']['yesterdayNum']); ?>"><?php echo htmlentities($data['quick']['yesterdayNum']); ?></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#ea5d6b;">累计收款总额</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['quick']['totalMoney'])); ?>' data-speed='2500'></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#ea5d6b;">累计收款笔数</div>
			<div class="tc2"><font id="x4" xx="<?php echo htmlentities($data['quick']['totalNum']); ?>"></font></div>
		</div>
	</div>
	<div class="title">用户统计</div>
	<div class="line">
		<div class="totalC">
			<div class="tc1" style="background:#2494f2;">昨日注册量</div>
			<div class="tc2"><font id="x5" xx="<?php echo htmlentities($data['users']['yesterdayNum']); ?>"><?php echo htmlentities($data['users']['yesterdayNum']); ?></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#2494f2;">总计注册量</div>
			<div class="tc2"><font id="x6" xx="<?php echo htmlentities($data['users']['totalNum']); ?>"></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#2494f2;">已实名人数</div>
			<div class="tc2"><font id="x7" xx="<?php echo htmlentities($data['users']['realnameNum']); ?>"></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#2494f2;">昨日缴费总额</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['users']['yesterdayMoney'])); ?>' data-speed='2500'></font></div>
		</div>
	</div>
	<div class="title">汇总统计</div>
	<div class="line">
		<div class="totalC">
			<div class="tc1" style="background:#edaf2a;">用户累计支付手续费</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['total']['feeMoney'])); ?>' data-speed='2500'></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#edaf2a;">用户累计支付升级费</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['total']['useMoney'])); ?>' data-speed='2500'></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#edaf2a;">用户累计收益总额</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['total']['bonusMoney'])); ?>' data-speed='2500'></font></div>
		</div>
		<div class="totalC">
			<div class="tc1" style="background:#edaf2a;">平台收益总额（含渠道）</div>
			<div class="tc2">￥<font class="timer" data-to='<?php echo htmlentities(sprintf("%.2f",$data['total']['sysMoney'])); ?>' data-speed='2500'></font></div>
		</div>
	</div>
	<script src="/static/count.js"></script>
	<script type="text/javascript">
	$("#x2").numberRock({
		speed:50,
		count:$("#x2").attr('xx')*1
	})
	$("#x4").numberRock({
		speed:50,
		count:$("#x4").attr('xx')*1
	})
	$("#x6").numberRock({
		speed:50,
		count:$("#x6").attr('xx')*1
	})
	$("#x7").numberRock({
		speed:50,
		count:$("#x7").attr('xx')*1
	})
	</script>
	<iframe src="<?php echo URL('bing'); ?>" style="width:100%;height:450px;" frameborder="0"></iframe>
</div>
</div>
</div>

<!-- 右则内容区域 结束 -->