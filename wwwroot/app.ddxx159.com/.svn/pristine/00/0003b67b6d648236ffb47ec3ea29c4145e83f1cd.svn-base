<?php /*a:2:{s:81:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\statistics\repayment.html";i:1560483137;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<div class="layui-card">
<table class="layui-table">
   <tbody>
   		<?php if(is_array($day) || $day instanceof \think\Collection || $day instanceof \think\Paginator): if( count($day)==0 ) : echo "" ;else: foreach($day as $k=>$day): ?>
       <tr>
       <?php switch($k): case "tl": ?><td class='text-center'>通联还款</td><?php break; case "cj": ?><td class='text-center'>极速还款</td><?php break; case "xh": ?><td class='text-center'>信汇还款</td><?php break; case "all": ?><td class='text-center'>总计</td><?php break; endswitch; ?>
          <td class='text-center'>总交易额（元）&nbsp;<?php echo htmlentities($day[1]); ?></td>
          <td class='text-center'>近一周交易额（元）&nbsp;<?php echo htmlentities($day[2]); ?></td>
          <td class='text-center'>近一个月交易额（元）&nbsp;<?php echo htmlentities($day[3]); ?></td>
          <td class='text-center'>近三个月交易额（元）&nbsp;<?php echo htmlentities($day[4]); ?></td>
          <td class='text-center'>近六个月交易额（元）&nbsp;<?php echo htmlentities($day[5]); ?></td>
          <td class='text-center'>总笔数&nbsp;<?php echo htmlentities($day[6]); ?></td>
       </tr>
       <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<table class="layui-table">
    <tbody>
       <tr>
          <td style="width: 50%;"><div id="speedChartMain0" style="height:400px;"class="layui-card"></div></td>
          <td style="width: 50%;"><div id="speedChartMain1" style="height:400px;"class="layui-card"></div</td>
       </tr>
    </tbody>

</table>
</div>
<script type="text/javascript" src="/static/echarts/echarts.js"></script>
<script type="text/javascript" src="/static/echarts/echarts.min.js"></script>
<script type="text/javascript" src="/static/echarts/echarts-gl.min.js"></script>
<script type="text/javascript" src="/static/echarts/ecStat.min.js"></script>
<script type="text/javascript" src="/static/echarts/dataTool.min.js"></script>
<script type="text/javascript" src="/static/echarts/china.js"></script>
<script type="text/javascript" src="/static/echarts/world.js"></script>
<script type="text/javascript" src="/static/echarts/bmap.min.js"></script>
<script type="text/javascript">
var repaymentSource=<?php echo $repaymentSource; ?>;
var repaymentName=<?php echo $repaymentName; ?>;
var repaymentAll=<?php echo $repaymentAll; ?>;
var timeX=<?php echo $timeX; ?>;
</script>
<script src="/static/echartsjs/repayment.js" type="text/javascript"></script>
</div>
</div>

<!-- 右则内容区域 结束 -->