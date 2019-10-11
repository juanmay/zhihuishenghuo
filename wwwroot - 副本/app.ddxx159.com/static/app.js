// +------------------------------------------------------------------
// | 信用卡代还管理系统
// +------------------------------------------------------------------
// | 版权所有 2015~2025 山东帝云信息科技有限公司
// +------------------------------------------------------------------
// | 官方网站: http://www.diyunkeji.com 
// +------------------------------------------------------------------
// | 开发人员 ：PHP-Navy
// +------------------------------------------------------------------
// |     这不是一个自由软件！未经本公司授权您只能在不用于商业目的
// | 的前提下对程序代码进行修改和使用；不允许对程序代码以任何形式
// | 任何目的的再发布。
// +------------------------------------------------------------------

// 当前资源URL目录
var baseRoot = (function () {
    var scripts = document.scripts, src = scripts[scripts.length - 1].src;
    return src.substring(0, src.lastIndexOf("/") + 1);
})();

// 配置参数
require.config({
    waitSeconds: 60,
    baseUrl: baseRoot,
    map: {'*': {css: baseRoot + 'plugs/require/require.css.js'}},
    paths: {
        'template': ['plugs/template/template'],
        'pcasunzips': ['plugs/jquery/pcasunzips'],
        // openSource
        'json': ['plugs/jquery/json2.min'],
        'layui': ['plugs/layui/layui'],
        'base64': ['plugs/jquery/base64.min'],
        'angular': ['plugs/angular/angular.min'],
        'ckeditor': ['plugs/ckeditor/ckeditor'],
        'websocket': ['plugs/socket/websocket'],
        'clipboard': ['plugs/clipboard/clipboard.min'],
        // jQuery
        'jquery.ztree': ['plugs/ztree/jquery.ztree.all.min'],
        'jquery.masonry': ['plugs/jquery/masonry.min'],
        'jquery.cookies': ['plugs/jquery/jquery.cookie'],
        // bootstrap
        'bootstrap': ['plugs/bootstrap/js/bootstrap.min'],
        'bootstrap.typeahead': ['plugs/bootstrap/js/bootstrap3-typeahead.min'],
        'bootstrap.multiselect': ['plugs/bootstrap-multiselect/bootstrap-multiselect'],
        // distpicker
        'distpicker': ['plugs/distpicker/distpicker'],
    },
    shim: {
        // open-source
        'websocket': {deps: [baseRoot + 'plugs/socket/swfobject.min.js']},
        // jquery
        'jquery.ztree': {deps: ['css!' + baseRoot + 'plugs/ztree/zTreeStyle/zTreeStyle.css']},
        // bootstrap
        'bootstrap.typeahead': {deps: ['bootstrap']},
        'bootstrap.multiselect': {deps: ['bootstrap', 'css!' + baseRoot + 'plugs/bootstrap-multiselect/bootstrap-multiselect.css']},
        'distpicker': {deps: [baseRoot + 'plugs/distpicker/distpicker.data.js']},
    },
    deps: ['json', 'bootstrap'],
    // 开启debug模式，不缓存资源
    // urlArgs: "ver=" + (new Date()).getTime()
});

// 注册jquery到require模块
define('jquery', function () {
    return layui.$;
});

// UI框架初始化
PageLayout.call(this);

// UI框架布局函数
function PageLayout(callback, custom) {
    window.WEB_SOCKET_SWF_LOCATION = baseRoot + "plugs/socket/WebSocketMain.swf";
    require(custom || [], callback || false);
}