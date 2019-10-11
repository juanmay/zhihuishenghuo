<?php /*a:2:{s:65:"D:\wwwroot\app.ddxx159.com\application\admin\view\node\index.html";i:1569753523;s:69:"D:\wwwroot\app.ddxx159.com\application\admin\view\public\content.html";i:1569753523;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15">
<!--<?php if(auth("$classuri/clear")): ?>-->
<button data-load='<?php echo url("$classuri/clear"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>清理无效记录</button>
<!--<?php endif; ?>-->
</div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">

<style>
    .layui-table .title-input {
        width: auto;
        height: 28px;
        line-height: 28px;
    }

    .layui-table label {
        cursor: pointer
    }
</style>
<script>
    $(function () {
        $('.layui-tab ul.layui-tab-title li:first').trigger('click');
    });
</script>
<div class="layui-tab layui-tab-card layui-box">
    <ul class="layui-tab-title">
        <!--<?php foreach($groups as $key=>$group): ?>-->
        <li><?php echo (isset($group['node']['title']) && ($group['node']['title'] !== '')?$group['node']['title']:'<span class="color-desc">未配置名称</span>'); ?>（<?php echo htmlentities($key); ?>）</li>
        <!--<?php endforeach; ?>-->
    </ul>
    <div class="layui-tab-content">
        <?php foreach($groups as $k=>$group): ?>
        <div class="layui-tab-item">
            <table class="layui-table border-none" lay-skin="line">
                <!--<?php if(empty($nodes) || (($nodes instanceof \think\Collection || $nodes instanceof \think\Paginator ) && $nodes->isEmpty())): ?>-->
                <p class="help-block text-center well">没 有 记 录 哦！</p>
                <!--<?php else: ?>-->
                <!--<?php foreach($group['list'] as $key=>$vo): ?>-->
                <tr>
                    <td class='text-left nowrap'>
                        <span class="color-desc"><?php echo $vo['spl']; ?></span> <?php echo htmlentities($vo['node']); if(auth("$classuri/save")): ?>&nbsp;<input autocomplete="off" class='layui-input layui-input-inline title-input' name='title' data-node="<?php echo htmlentities($vo['node']); ?>" value="<?php echo htmlentities($vo['title']); ?>"><?php endif; ?>
                    </td>
                    <td class='text-left nowrap'>
                        <?php if(auth("$classuri/save") and $vo['spt'] == 1): ?>
                        <label class="color-desc think-checkbox">
                            <input data-login-group="<?php echo htmlentities($vo['node']); ?>" type="checkbox"> 全部加入登录控制
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="notselect margin-left-15 color-desc think-checkbox">
                            <input data-auth-group="<?php echo htmlentities($vo['node']); ?>" type="checkbox"> 全部加入权限控制
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="notselect margin-left-15 color-desc think-checkbox">
                            <input data-menu-group="<?php echo htmlentities($vo['node']); ?>" type="checkbox"> 全部加入菜单节点选择器
                        </label>
                        <?php endif; if(auth("$classuri/save") and $vo['spt'] == 2): ?>
                        <span class="color-desc">&nbsp;&nbsp;├─&nbsp;</span>
                        <label class="notselect margin-right-15 think-checkbox">
                            <!--<?php if(!(empty($vo['is_login']) || (($vo['is_login'] instanceof \think\Collection || $vo['is_login'] instanceof \think\Paginator ) && $vo['is_login']->isEmpty()))): ?>-->
                            <input data-login-filter="<?php echo htmlentities($vo['pnode']); ?>" checked='checked' class="check-box login_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>" type='checkbox' value='1' name='is_login' data-node="<?php echo htmlentities($vo['node']); ?>" onclick="!this.checked && ($('.auth_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>')[0].checked = !!this.checked)">
                            <!--<?php else: ?>-->
                            <input data-login-filter="<?php echo htmlentities($vo['pnode']); ?>" class="check-box login_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>" type='checkbox' value='1' name='is_login' data-node="<?php echo htmlentities($vo['node']); ?>" onclick="!this.checked && ($('.auth_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>')[0].checked = !!this.checked)">
                            <!--<?php endif; ?>-->
                            加入登录控制
                        </label>
                        <span class="color-desc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─&nbsp;</span>
                        <label class="notselect margin-right-15 think-checkbox">
                            <!--<?php if(!(empty($vo['is_auth']) || (($vo['is_auth'] instanceof \think\Collection || $vo['is_auth'] instanceof \think\Paginator ) && $vo['is_auth']->isEmpty()))): ?>-->
                            <input data-auth-filter="<?php echo htmlentities($vo['pnode']); ?>" name='is_auth' data-node="<?php echo htmlentities($vo['node']); ?>" checked='checked' class="check-box auth_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>" type='checkbox' onclick="this.checked && ($('.login_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>')[0].checked = !!this.checked)" value='1'>
                            <!--<?php else: ?>-->
                            <input data-auth-filter="<?php echo htmlentities($vo['pnode']); ?>" name='is_auth' data-node="<?php echo htmlentities($vo['node']); ?>" class="check-box auth_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>" type='checkbox' value='1' onclick="this.checked && ($('.login_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>')[0].checked = !!this.checked)">
                            <!--<?php endif; ?>-->
                            加入权限控制
                        </label>
                        <span class="color-desc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─&nbsp;</span>
                        <label class="notselect think-checkbox">
                            <!--<?php if(!(empty($vo['is_menu']) || (($vo['is_menu'] instanceof \think\Collection || $vo['is_menu'] instanceof \think\Paginator ) && $vo['is_menu']->isEmpty()))): ?>-->
                            <input data-menu-filter="<?php echo htmlentities($vo['pnode']); ?>" name='is_menu' data-node="<?php echo htmlentities($vo['node']); ?>" checked='checked' class='check-box menu_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>' type='checkbox' value='1'>
                            <!--<?php else: ?>-->
                            <input data-menu-filter="<?php echo htmlentities($vo['pnode']); ?>" name='is_menu' data-node="<?php echo htmlentities($vo['node']); ?>" class='check-box menu_<?php echo htmlentities($k); ?>_<?php echo htmlentities($key); ?>' type='checkbox' value='1'>
                            <!--<?php endif; ?>-->
                            加入菜单节点选择器
                        </label>
                        <?php endif; ?>
                    </td>
                    <td data-tips-filter="<?php echo htmlentities($vo['pnode']); ?>" class="loading-tips full-width"></td>
                </tr>
                <!--<?php endforeach; ?>-->
                <!--<?php endif; ?>-->
            </table>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!--<?php if(auth("$classuri/save")): ?>-->
<script>
    $(function () {

        syncLoginGroup.call(this);
        $('[data-login-group]').on('click', function () {
            var twoNode = this.getAttribute('data-login-group');
            if (!checkRequestStatus(twoNode)) {
                this.checked = !this.checked;
                return $.msg.tips('正在处理中, 请稍候...');
            }
            var checked = !!this.checked;
            $('[data-login-filter="' + twoNode + '"]').map(function () {
                if (!(this.checked = checked)) {
                    $('[data-auth-filter="' + twoNode + '"]').map(function () {
                        this.checked = false;
                    });
                }
                update(this);
            });
        });

        syncAuthGroup.call(this);
        $('[data-auth-group]').on('click', function () {
            var twoNode = this.getAttribute('data-auth-group');
            if (!checkRequestStatus(twoNode)) {
                this.checked = !this.checked;
                return $.msg.tips('正在处理中, 请稍候...');
            }
            var checked = !!this.checked;
            $('[data-auth-filter="' + twoNode + '"]').map(function () {
                if ((this.checked = checked)) {
                    $('[data-login-filter="' + twoNode + '"]').map(function () {
                        this.checked = checked;
                    });
                }
                update(this);
            });
        });

        syncMenuGroup.call(this);
        $('[data-menu-group]').on('click', function () {
            var twoNode = this.getAttribute('data-menu-group');
            if (!checkRequestStatus(twoNode)) {
                this.checked = !this.checked;
                return $.msg.tips('正在处理中, 请稍候...');
            }
            var checked = !!this.checked;
            $('[data-menu-filter="' + twoNode + '"]').map(function () {
                this.checked = checked;
                update(this);
            });
        });

        // 更新触发更新
        $('input.check-box').on('click', function () {
            update(this);
        });

        $('input.title-input').on('blur', function () {
            update(this);
        });

        // 数据自动更新
        function update(self) {
            var $item = $(self).parents('tr'), data = {list: []};
            $item.find('input').map(function () {
                var value = this.type === 'text' ? this.value : (this.checked ? 1 : 0);
                data.list.push({name: this.name, value: value, node: this.getAttribute('data-node')});
            });
            $item.find('.loading-tips').html('<p class="color-green"><i class="fa fa-spinner fa-spin"></i> 更新数据...</p>');
            $.form.load('<?php echo url("save"); ?>', data, 'post', function (ret) {
                if (ret.code === 0) {
                    var tips = '<p class="color-red"><i class="fa fa-close"></i> 更新异常</p>';
                    return $item.find('.loading-tips').html(tips), false;
                }
                return $item.find('.loading-tips').html(''), false;
            }, false);
            return syncLoginGroup(), syncMenuGroup(), syncAuthGroup();
        }

        // 状态网络处理状态
        function checkRequestStatus(twoNode) {
            var status = true;
            $('.loading-tips[data-tips-filter="' + twoNode + '"]').map(function () {
                $(this).html() && (status = false);
            });
            return status;
        }

        // 同步登录分组状态
        function syncLoginGroup() {
            $('[data-login-group]').map(function () {
                var node = this.getAttribute('data-login-group'), checked = true;
                $('[data-login-filter="' + node + '"]').map(function () {
                    this.checked || (checked = false);
                });
                this.checked = checked;
            });
        }

        // 同步权限分组状态
        function syncAuthGroup() {
            $('[data-auth-group]').map(function () {
                var node = this.getAttribute('data-auth-group'), checked = true;
                $('[data-auth-filter="' + node + '"]').map(function () {
                    this.checked || (checked = false);
                });
                this.checked = checked;
            });
        }

        // 同步菜单分组状态
        function syncMenuGroup() {
            $('[data-menu-group]').map(function () {
                var node = this.getAttribute('data-menu-group'), checked = true;
                $('[data-menu-filter="' + node + '"]').map(function () {
                    this.checked || (checked = false);
                });
                this.checked = checked;
            });
        }
    });
</script>
<!--<?php endif; ?>-->
</div>
</div>

<!-- 右则内容区域 结束 -->