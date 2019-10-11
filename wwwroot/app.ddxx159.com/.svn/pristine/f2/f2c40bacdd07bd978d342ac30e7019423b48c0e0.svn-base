<?php /*a:2:{s:73:"C:\phpStudy\PHPTutorial\WWW\dscj\application\member\view\login\index.html";i:1560585746;s:72:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\main.html";i:1559637333;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit">
        <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); if(!empty($title)): ?> · <?php endif; ?><?php echo sysconf('site_name'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link href="<?php echo sysconf('browser_icon'); ?>" rel="shortcut icon">
        <link href="/static/plugs/awesome/css/font-awesome.min.css?v=<?php echo date('ymd'); ?>" rel="stylesheet">
        <link href="/static/plugs/bootstrap/css/bootstrap.min.css?v=<?php echo date('ymd'); ?>" rel="stylesheet">
        <link href="/static/plugs/layui/css/layui.css?v=<?php echo date('ymd'); ?>" rel="stylesheet">
        <link href="/static/theme/css/console.css?v=<?php echo date('ymd'); ?>" rel="stylesheet">
        <link href="/static/theme/css/animate.css?v=<?php echo date('ymd'); ?>" rel="stylesheet">
        
<link href="/static/theme/css/login.css" rel="stylesheet">

        <script>window.ROOT_URL = '';</script>
        <script src="/static/plugs/jquery/pace.min.js"></script>
        <script src="/static/plugs/layui/layui.all.js"></script>
        <script src="/static/admin.js"></script>
        
    </head>
    <body class="framework mini">
        
<div class="login-container">

    <!-- 动态云层动画 开始 -->
    <div class="clouds-container">
        <div class="clouds clouds-footer"></div>
        <div class="clouds"></div>
        <div class="clouds clouds-fast"></div>
    </div>
    <!-- 动态云层动画 结束 -->

    <!-- 顶部导航条 开始 -->
    <div class="header notselect">
        <!-- <span class="title notselect"><?php echo sysconf('app_name'); ?>（代理） <sup><?php echo sysconf('app_version'); ?></sup></span> -->
        <ul>
            <li>
                <a href="http://chrome.cqttech.com/index_other.html" target="_blank">推荐使用谷歌浏览器</a>
            </li>
        </ul>
    </div>
    <!-- 顶部导航条 结束 -->

    <!-- 页面表单主体 开始 -->
    <div class="container">
        <form autocomplete="off" onsubmit="return false;" data-time="0.001" data-auto="true" method="post" class="content layui-form animated fadeInDown">
            <div class="people">
                <div class="tou"></div>
                <div id="left-hander" class="initial_left_hand transition"></div>
                <div id="right-hander" class="initial_right_hand transition"></div>
            </div>
            <ul>
                <li class="allnumber">
                    <i></i>
                    <input required pattern="^\S{10,}$" name="allnumber" value="1000000001" type="text" autofocus="autofocus" autocomplete="off" title="请输入商户号" placeholder="商户号">
                </li>
                <li class="username">
                    <i></i>
                    <input required pattern="^\S{11,}$" name="phone" value="13716461996" type="text" autofocus="autofocus" autocomplete="off" title="请输入手机号码" placeholder="手机号码">
                </li>
                <li class="password">
                    <i></i>
                    <input required pattern="^\S{4,}$" name="password" value="admin123" type="password" autocomplete="off" title="请输入4位及以上的字符" placeholder="请输入密码">
                </li>
                <li class="text-center nowrap">
                    <button type="submit" class="layui-btn layui-disabled" data-form-loaded="立 即 登 入">正 在 载 入</button>
                </li>
            </ul>
        </form>
    </div>
    <!-- 页面表单主体 结束 -->

    <!-- 底部版权信息 开始 -->
    <!--<?php if(sysconf('site_copy')): ?>-->
    <!-- <div class="footer notselect">
        <?php echo sysconf('site_copy'); if(sysconf('miitbeian')): ?> <span>|</span> <a target="_blank" href="http://www.miitbeian.gov.cn"><?php echo sysconf('miitbeian'); ?></a><?php endif; ?>
    </div> -->
    <!--<?php endif; ?>-->
    <!-- 底部版本信息 结束 -->

</div>

        <script src="/static/plugs/require/require.js"></script>
        <script src="/static/app.js"></script>
        
<script>
    if (window.location.href.indexOf('#') > -1) {
        window.location.href = window.location.href.split('#')[0];
    }
    $(function () {
        $('[name="password"]').on('focus', function () {
            $('#left-hander').removeClass('initial_left_hand').addClass('left_hand');
            $('#right-hander').removeClass('initial_right_hand').addClass('right_hand')
        }).on('blur', function () {
            $('#left-hander').addClass('initial_left_hand').removeClass('left_hand');
            $('#right-hander').addClass('initial_right_hand').removeClass('right_hand')
        });
    });
</script>

    </body>
</html>