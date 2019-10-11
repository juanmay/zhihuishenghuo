<?php /*a:2:{s:71:"D:\wwwroot\app.ddxx159.com\application\admin\view\statistics\quick.html";i:1569753522;s:69:"D:\wwwroot\app.ddxx159.com\application\admin\view\public\content.html";i:1569753523;}*/ ?>
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
        <label class="layui-form-label">品牌方</label>
        <div class="layui-input-inline">
            <select name="allmemberId" class="layui-select" lay-filter='allmemberId'>
            <?php $allmember=getAllMember();?>
                <!--<?php foreach($allmember as $k=>$v): ?>-->
                <?php if(app('request')->get('allmemberId') == $v['id']): ?>
                <option value="<?php echo htmlentities($v['id']); ?>" selected="selected"><?php echo htmlentities($v['companyName']); ?></option>
                <?php else: ?>
                <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['companyName']); ?></option>
                <?php endif; ?>
                <!--<?php endforeach; ?>-->
            </select>
        </div>
    </div>
    <div class="layui-form-item layui-inline" style='display:none;'>
        <button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>

</form>
<script>
    window.form.render();
    $('[data-time]').map(function () {
        window.laydate.render({range: true, elem: this});
    });
    form.on('select(allmemberId)', function(data){
    	  $('.layui-btn-primary .layui-icon').click();
    }); 
</script>
<!-- 表单搜索 结束 -->
<div class="layui-card">
<table class="layui-table">
   <tbody>
   		<?php if(is_array($day) || $day instanceof \think\Collection || $day instanceof \think\Paginator): if( count($day)==0 ) : echo "" ;else: foreach($day as $k=>$day): ?>
       <tr>
       <?php switch($k): case "xf": ?>
       	<td class='text-center'>先锋收款</td>
       	<?php break; case "yb": ?>
       	<td class='text-center'>易宝收款</td>
       	<?php break; case "cj": ?>
       	<td class='text-center'>畅捷收款</td>
       	<?php break; case "all": ?><td class='text-center'>总计</td><?php break; endswitch; ?>
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
var quickSource=<?php echo $quickSource; ?>;
var quickName=<?php echo $quickName; ?>;
var quickAll=<?php echo $quickAll; ?>;
var timeX=<?php echo $timeX; ?>;
</script>
<script src="/static/echartsjs/quick.js" type="text/javascript"></script>
</div>
</div>

<!-- 右则内容区域 结束 -->