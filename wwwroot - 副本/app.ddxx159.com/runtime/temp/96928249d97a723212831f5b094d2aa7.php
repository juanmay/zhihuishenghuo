<?php /*a:1:{s:56:"E:\www\jinma\application\index\view\common\register.html";i:1559556027;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<title><?php echo sysconf('site_name'); ?></title>
<link type="text/css" rel="stylesheet" href="/static/index/css/baomi.css">
<script type="text/javascript" src="/static/index/js/morjs.js"></script>
<script type="text/javascript" src="/static/index/js/jquery-1.10.2.min.js"></script>
<script src="/static/Wap/Js/jquery-1.11.3.min.js"></script>
<script src="/static/Wap/Layer/layer.js"></script>
<style type="text/css">
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
color: #fff!important; 
}

::-moz-placeholder { /* Mozilla Firefox 19+ */
color: #fff!important;
}

input:-ms-input-placeholder,
textarea:-ms-input-placeholder {
color: #fff!important;
}

input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
color: #fff!important;
}
</style>
</head>

<body style="background: #FAFAFA;">
<div class="regis_box" style="background:#d1a74f;padding-bottom:0.6rem;">
	<img src="/static/index/images/logo_white@2x.png" class="logo" style="height:auto;">
	<div class="ner_sr" style="background:none;box-shadow:none;">
		<ul>
			<li>
				<img src="/static/index/images/phone_white@2x.png" style="width:0.41rem">
				<hr>
				<input type="text" id="phone" placeholder="请输入手机号" style="color:#fff;">
			</li>
			<li>
				<img src="/static/index/images/yzm_white@2x.png" style="width:0.41rem">
				<hr>
				<input type="text" id="code" placeholder="请输入动态码" style="color:#fff;">
				<input type="button" value="获取动态码" id="sendYzm3" style="color:#fff;">
			</li>
			<li>
				<img src="/static/index/images/yaoqm_white@2x.png" style="width:0.41rem">
				<hr>
				<input type="text" value="<?php echo input("code/s"); ?>" disabled="disabled"  style="color:#fff;">
			</li>
		</ul>
	</div>
	<button class="regis_butt" onclick="doreg()" style="width:7.1rem;height:1rem;background:rgba(255,255,255,1);border-radius:0.5rem;margin:0 auto;color:#D1A74F;">立即注册</button>
</div>
<img src="/static/index/images/h5zc_bg@2x.jpg" style="width:7.5rem;height:auto;display:block;margin:0 auto">
<div class="zhuc_xy" style="text-align:center;">
	<span style="float:none">点击注册即代表您同意<a href="<?php echo URL("agree"); ?>">《金玛用户注册协议》</a></span>
	<!--<span style="float: right;">已有账号，<a href="<?php echo URL("app"); ?>">下载</a></span>-->
</div>
<script>
	var wait=60;
	document.getElementById("sendYzm3").disabled = false;   
	function time(o) {
		if (wait == 0) {
			o.removeAttribute("disabled");           
			o.value="获取验证码";
			wait = 60;
		} else {
			o.value="重新发送(" + wait + ")";
			wait--;
			setTimeout(function() {
				time(o)
			},
			1000)
		}
	}
	document.getElementById("sendYzm3").onclick=function(){send(this);}
	function send(obj){
		obj.setAttribute("disabled", true);
		var phone = $('#phone').val();
		if (phone == '') { layer.msg('请输入手机号',{icon:2}); return false; };
		$.post("<?php echo URL('sendcode'); ?>",{phone:phone},function(d){
			if (d.status == 1) {
				layer.msg(d.message,{icon:1});
				time(obj);
			}else{
				obj.removeAttribute("disabled");           
				layer.msg(d.message,{icon:2});
			}
		},'json');
	}
	// 注册
	var dosub = false;
	function doreg(){
		if (dosub) {
			layer.msg('注册中，请稍等！',{icon:2});
			return false;
		}
		dosub = true;
		var phone = $('#phone').val();
		var code = $('#code').val();
		if (phone == '') { layer.msg('请输入手机号',{icon:2}); dosub = false; return false; };
		if (code == '') { layer.msg('请输入验证码',{icon:2}); dosub = false; return false; };
		$.post("<?php echo URL('doreg'); ?>",{phone:phone,code:code},function(d){
			if (d.status == 1) {
				layer.msg(d.message,{icon:1});
				setTimeout(function(){
					window.location.href = "<?php echo URL('app'); ?>"
				},2000);
			}else{
				dosub = false;
				layer.msg(d.message,{icon:2});
			}
		},'json');
	}
</script>
</body>
</html>
