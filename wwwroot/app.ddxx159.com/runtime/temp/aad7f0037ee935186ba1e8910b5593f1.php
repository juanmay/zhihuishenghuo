<?php /*a:2:{s:74:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\auth\apply.html";i:1556184467;s:78:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<style>
    ul.ztree li {
        white-space: normal !important
    }

    ul.ztree li span.button.switch {
        margin-right: 5px
    }

    ul.ztree ul ul li {
        display: inline-block;
        white-space: normal
    }

    ul.ztree > li {
        padding: 15px 25px 15px 15px;
    }

    ul.ztree > li > ul {
        margin-top: 12px;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    ul.ztree > li > ul > li {
        padding: 5px
    }

    ul.ztree > li > a > span {
        font-size: 15px;
        font-weight: 700
    }
</style>

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<ul id="zTree" class="ztree loading">
    <li></li>
</ul>
<div class="hr-line-dashed"></div>
<div class="layui-form-item text-center">
    <button class="layui-btn" data-submit-role type='button'>保存数据</button>
    <button class="layui-btn layui-btn-danger" type='button' onclick="window.history.back()">取消操作</button>
</div>
</div>
</div>

<link href="/static/plugs/ztree/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css">
<script src="/static/plugs/ztree/jquery.ztree.all.min.js" type="text/javascript">;</script>
<script>
    $(function () {
        window.roleForm = new function () {
            this.data = {};
            this.ztree = null;
            this.setting = {
                view: {showLine: false, showIcon: false, dblClickExpand: false},
                check: {enable: true, nocheck: false, chkboxType: {"Y": "ps", "N": "ps"}},
                callback: {
                    beforeClick: function (treeId, treeNode) {
                        if (treeNode.children.length < 1) {
                            window.roleForm.ztree.checkNode(treeNode, !treeNode.checked, null, true);
                        } else {
                            window.roleForm.ztree.expandNode(treeNode);
                        }
                        return false;
                    }
                }
            };
            this.getData = function (self) {
                var index = $.msg.loading();
                jQuery.get('<?php echo url(); ?>?id=<?php echo htmlentities($vo['id']); ?>', {action: 'getNode'}, function (ret) {
                    $.msg.close(index);
                    self.data = renderChildren(ret.data, 1);
                    self.showTree();

                    function renderChildren(data, level) {
                        var childrenData = [];
                        for (var i in data) {
                            var children = {};
                            children.open = true;
                            children.node = data[i].node;
                            children.name = data[i].title || data[i].node;
                            children.checked = data[i].checked || false;
                            children.children = renderChildren(data[i]._sub_, level + 1);
                            childrenData.push(children);
                        }
                        return childrenData;
                    }
                }, 'JSON');
            };
            this.showTree = function () {
                this.ztree = jQuery.fn.zTree.init(jQuery("#zTree"), this.setting, this.data);
                while (true) {
                    var reNodes = this.ztree.getNodesByFilter(function (node) {
                        return (!node.node && node.children.length < 1);
                    });
                    if (reNodes.length < 1) {
                        break;
                    }
                    for (var i in reNodes) {
                        this.ztree.removeNode(reNodes[i]);
                    }
                }
            };
            this.submit = function () {
                var nodes = [];
                var data = this.ztree.getCheckedNodes(true);
                for (var i in data) {
                    (data[i].node) && nodes.push(data[i].node);
                }
                $.form.load('<?php echo url(); ?>?id=<?php echo htmlentities($vo['id']); ?>&action=save', {nodes: nodes}, 'post');
            };
            this.getData(this);
        };

        $('[data-submit-role]').on('click', function () {
            window.roleForm.submit();
        });
    });
</script>

<!-- 右则内容区域 结束 -->