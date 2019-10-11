<?php /*a:2:{s:78:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\statistics\member.html";i:1554710159;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
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
       <tr>
          <td class='text-center'>总注册量&nbsp;<?php echo htmlentities($day[1]); ?></td>
          <td class='text-center'>近一周注册量&nbsp;<?php echo htmlentities($day[2]); ?></td>
          <td class='text-center'>近一个月注册量&nbsp;<?php echo htmlentities($day[3]); ?></td>
          <td class='text-center'>近三个月注册量&nbsp;<?php echo htmlentities($day[4]); ?></td>
          <td class='text-center'>近六个月注册量&nbsp;<?php echo htmlentities($day[5]); ?></td>
       </tr>
       <tr>
          <td class='text-center'>总认证量&nbsp;<?php echo htmlentities($day2[1]); ?></td>
          <td class='text-center'>近一周认证量&nbsp;<?php echo htmlentities($day2[2]); ?></td>
          <td class='text-center'>近一个月认证量&nbsp;<?php echo htmlentities($day2[3]); ?></td>
          <td class='text-center'>近三个月认证量&nbsp;<?php echo htmlentities($day2[4]); ?></td>
          <td class='text-center'>近六个月认证量&nbsp;<?php echo htmlentities($day2[5]); ?></td>
       </tr>
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
var userSource=<?php echo $userSource; ?>;
var timeX=<?php echo $timeX; ?>;
var userLineAll1=<?php echo $userLineAll1; ?>;
var userLineAll2=<?php echo $userLineAll2; ?>;
</script>
<script src="/static/echartsjs/member.js" type="text/javascript"></script>
</div>
</div>

<!-- 右则内容区域 结束 -->