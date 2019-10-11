<?php /*a:1:{s:51:"E:\www\jinma\application\index\view\common\app.html";i:1556517099;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<title><?php echo sysconf('site_name'); ?></title>
<link type="text/css" rel="stylesheet" href="/static/index/css/baomi.css">
<script type="text/javascript" src="/static/index/js/morjs.js"></script>
<script type="text/javascript" src="/static/index/js/jquery-1.10.2.min.js"></script>
</head>

<body>
<img src="/static/index/images/xiaz_bg.png" style="position:fixed;top:0;left:0;width:100%;height:100%;display:block;">
<div class="zhongj_box" style="height:100%;position:fixed;display:flex;flex-direction:column;justify-content:space-evenly;">
	<img src="/static/index/images/logo_white@2x.png" style="width:1.44rem;height:auto;display:block;margin:0 auto;">
	<div class="xiaz_iosan" style="position:unset;">
		<a href="<?php echo sysconf("iosIpa"); ?>" style="display:flex;flex-direction:row;justify-content:center;align-items: center;font-weight:100;color:#D1A74F;"><img src="/static/index/images/iOS.png" style="display:block;width:0.4rem;"><font style="margin-left:0.2rem;">iOS版本下载</font></a>
		<a href="<?php echo sysconf("androidApk"); ?>" style="display:flex;flex-direction:row;justify-content:center;align-items: center;color:#D1A74F;font-weight:100;"><img src="/static/index/images/android.png" style="display:block;width:0.4rem;"><font style="margin-left:0.2rem;">Android版本下载</font></a>
	</div>
</div>
<div class="zzc_tc">
	<span class="wenz_xz">点击右上角<br>选择在浏览器中打开</span>
</div>

<script type="text/javascript">
$(function(){
	var wh = $(document).height();
	var nh = $(".xiaz_box").height();
	var mth = (wh-nh)/2;
	if (nh > wh) {
		$(".tianj_bc").css({height:0});
	}else{
		$(".tianj_bc").css({height:mth});
	};

	$(".zzc_tc").click(function(){
		$(".zzc_tc").css("display","none");
	});

	var ua = window.navigator.userAgent.toLowerCase();
    if (ua.match(/MicroMessenger/i) == 'micromessenger') {
    	$(".zzc_tc").css("display","block");
    } else {
        $(".zzc_tc").css("display","none");
    }
});
</script>
</body>
</html>
