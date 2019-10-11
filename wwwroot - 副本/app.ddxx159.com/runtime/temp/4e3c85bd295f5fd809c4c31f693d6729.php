<?php /*a:2:{s:74:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\channel\index.html";i:1560473308;s:75:"C:\phpStudy\PHPTutorial\WWW\dscj\application\admin\view\public\content.html";i:1556184467;}*/ ?>
<!-- 右则内容区域 开始 -->

<div class="layui-card">
    <!--<?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?>-->
    <div class="layui-header notselect">
        <div class="pull-left"><span><?php echo htmlentities($title); ?></span></div>
        <div class="pull-right margin-right-15"></div>
    </div>
    <!--<?php endif; ?>-->
    <div class="layui-card-body">
<form autocomplete="off" onsubmit="return false;" action="<?php echo request()->url(); ?>" data-auto="true" method="post" class='form-horizontal layui-form padding-top-20'> 
    <div class="form-group">
        <label class="col-sm-2 control-label">
            payTitle<br><span class="nowrap color-desc">模拟消费标题</span>
        </label>
        <div class='col-sm-8'>
            <input name="payTitle" required="required" title="请输入模拟消费标题" placeholder="请输入模拟消费标题" value="<?php echo sysconf('payTitle'); ?>" class="layui-input">
            <p class="help-block">当前系统代还提交给渠道银行消费的标题</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            payInfo<br><span class="nowrap color-desc">模拟消费详情</span>
        </label>
        <div class='col-sm-8'>
            <input name="payInfo" required="required" title="请输入模拟消费详情" placeholder="请输入模拟消费详情" value="<?php echo sysconf('payInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统代还提交给渠道银行消费的详细描述</p>
        </div>
    </div>

    <hr/>

    <!-- <div class="form-group">
        <label class="col-sm-2 control-label">
            accountPayStatus<br><span class="nowrap color-desc">余额支付</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <?php if(sysconf('accountPayStatus') == $k): ?>
                <input checked type="radio" name="accountPayStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <?php else: ?>
                <input type="radio" name="accountPayStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <?php endif; ?>
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统客户升级缴费使用支付方式状态。</p>
        </div>
    </div> -->

    <div class="form-group">
        <label class="col-sm-2 control-label">
            wechatPayStatus<br><span class="nowrap color-desc">微信支付</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('wechatPayStatus') == $k): ?>-->
                <input checked type="radio" name="wechatPayStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="wechatPayStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统客户升级缴费使用支付方式状态。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            alipayPayStatus<br><span class="nowrap color-desc">支付宝支付</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('alipayPayStatus') == $k): ?>-->
                <input checked type="radio" name="alipayPayStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="alipayPayStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统客户升级缴费使用支付方式状态。</p>
        </div>
    </div>

    <hr/>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstRepaymentStatus<br><span class="nowrap color-desc">银联扫码通道状态</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('firstRepaymentStatus') == $k): ?>-->
                <input checked type="radio" name="firstRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="firstRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统通道展示状态，是否允许客户使用产品。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstRepaymentName<br><span class="nowrap color-desc">银联扫码通道名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="firstRepaymentName" required="required" title="请输入通道名称" placeholder="请输入通道名称" value="<?php echo sysconf('firstRepaymentName'); ?>" class="layui-input">
            <p class="help-block">当前系统通道名称，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstRepaymentInfo<br><span class="nowrap color-desc">银联扫码通道描述</span>
        </label>
        <div class='col-sm-8'>
            <input name="firstRepaymentInfo" required="required" title="请输入通道描述" placeholder="请输入通道描述" value="<?php echo sysconf('firstRepaymentInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统通道描述，用于APP展示。</p>
        </div>
    </div>
    <hr/>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondRepaymentStatus<br><span class="nowrap color-desc">101002和110002通道状态</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('secondRepaymentStatus') == $k): ?>-->
                <input checked type="radio" name="secondRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="secondRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统通道展示状态，是否允许客户使用产品。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondRepaymentName<br><span class="nowrap color-desc">101002和110002通道名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="secondRepaymentName" required="required" title="请输入通道名称" placeholder="请输入通道名称" value="<?php echo sysconf('secondRepaymentName'); ?>" class="layui-input">
            <p class="help-block">当前系统通道名称，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondRepaymentInfo<br><span class="nowrap color-desc">101002和110002通道描述</span>
        </label>
        <div class='col-sm-8'>
            <input name="secondRepaymentInfo" required="required" title="请输入通道描述" placeholder="请输入通道描述" value="<?php echo sysconf('secondRepaymentInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统通道描述，用于APP展示。</p>
        </div>
    </div>
    <hr/>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            thirdRepaymentStatus<br><span class="nowrap color-desc">110001、101001和1000通道状态</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('thirdRepaymentStatus') == $k): ?>-->
                <input checked type="radio" name="thirdRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="thirdRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统通道展示状态，是否允许客户使用产品。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            thirdRepaymentName<br><span class="nowrap color-desc">110001、101001和1000通道名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="thirdRepaymentName" required="required" title="请输入通道名称" placeholder="请输入通道名称" value="<?php echo sysconf('thirdRepaymentName'); ?>" class="layui-input">
            <p class="help-block">当前系统通道名称，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            thirdRepaymentInfo<br><span class="nowrap color-desc">110001、101001和1000通道描述</span>
        </label>
        <div class='col-sm-8'>
            <input name="thirdRepaymentInfo" required="required" title="请输入通道描述" placeholder="请输入通道描述" value="<?php echo sysconf('thirdRepaymentInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统通道描述，用于APP展示。</p>
        </div>
    </div>
    <hr/>

    <div class="form-group">
        <label class="col-sm-2 control-label">
            fourthRepaymentStatus<br><span class="nowrap color-desc">110003通道状态</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('fourthRepaymentStatus') == $k): ?>-->
                <input checked type="radio" name="fourthRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="fourthRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统通道展示状态，是否允许客户使用产品。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            fourthRepaymentName<br><span class="nowrap color-desc">110003通道名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="fourthRepaymentName" required="required" title="请输入通道名称" placeholder="请输入通道名称" value="<?php echo sysconf('fourthRepaymentName'); ?>" class="layui-input">
            <p class="help-block">当前系统通道名称，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            fourthRepaymentInfo<br><span class="nowrap color-desc">110003通道描述</span>
        </label>
        <div class='col-sm-8'>
            <input name="fourthRepaymentInfo" required="required" title="请输入通道描述" placeholder="请输入通道描述" value="<?php echo sysconf('fourthRepaymentInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统通道描述，用于APP展示。</p>
        </div>
    </div>
    <hr/>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">
            fifthRepaymentStatus<br><span class="nowrap color-desc">信汇小额状态</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('fifthRepaymentStatus') == $k): ?>-->
                <input checked type="radio" name="fifthRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="fifthRepaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统通道展示状态，是否允许客户使用产品。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            fifthRepaymentName<br><span class="nowrap color-desc">信汇小额名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="fifthRepaymentName" required="required" title="请输入通道名称" placeholder="请输入通道名称" value="<?php echo sysconf('fifthRepaymentName'); ?>" class="layui-input">
            <p class="help-block">当前系统通道名称，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            fifthRepaymentInfo<br><span class="nowrap color-desc">信汇小额描述</span>
        </label>
        <div class='col-sm-8'>
            <input name="fifthRepaymentInfo" required="required" title="请输入通道描述" placeholder="请输入通道描述" value="<?php echo sysconf('fifthRepaymentInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统通道描述，用于APP展示。</p>
        </div>
    </div>
    <hr/>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstPaymentStatus<br><span class="nowrap color-desc">畅捷收款状态</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('firstPaymentStatus') == $k): ?>-->
                <input checked type="radio" name="firstPaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="firstPaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统通道展示状态，是否允许客户使用产品。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstPaymentName<br><span class="nowrap color-desc">畅捷收款名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="firstPaymentName" required="required" title="请输入通道名称" placeholder="请输入通道名称" value="<?php echo sysconf('firstPaymentName'); ?>" class="layui-input">
            <p class="help-block">当前系统通道名称，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstPaymentMoney<br><span class="nowrap color-desc">畅捷额度范围</span>
        </label>
        <div class='col-sm-8'>
            <input name="firstPaymentMoney" required="required" title="请输入额度范围" placeholder="请输入额度范围" value="<?php echo sysconf('firstPaymentMoney'); ?>" class="layui-input">
            <p class="help-block">当前畅捷额度范围，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstPaymentTime<br><span class="nowrap color-desc">畅捷交易时间</span>
        </label>
        <div class='col-sm-8'>
            <input name="firstPaymentTime" required="required" title="请输入交易时间" placeholder="请输入交易时间" value="<?php echo sysconf('firstPaymentTime'); ?>" class="layui-input">
            <p class="help-block">当前畅捷交易时间，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            firstPaymentInfo<br><span class="nowrap color-desc">畅捷收款描述</span>
        </label>
        <div class='col-sm-8'>
            <input name="firstPaymentInfo" required="required" title="请输入通道描述" placeholder="请输入通道描述" value="<?php echo sysconf('firstPaymentInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统通道描述，用于APP展示。</p>
        </div>
    </div>
    <hr/>


    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondPaymentStatus<br><span class="nowrap color-desc">先锋收款状态</span>
        </label>
        <div class='col-sm-8'>
            <?php foreach(['1'=>'开启','0'=>'关闭'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if(sysconf('secondPaymentStatus') == $k): ?>-->
                <input checked type="radio" name="secondPaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="secondPaymentStatus" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">当前系统通道展示状态，是否允许客户使用产品。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondPaymentName<br><span class="nowrap color-desc">先锋收款名称</span>
        </label>
        <div class='col-sm-8'>
            <input name="secondPaymentName" required="required" title="请输入通道名称" placeholder="请输入通道名称" value="<?php echo sysconf('secondPaymentName'); ?>" class="layui-input">
            <p class="help-block">当前系统通道名称，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondPaymentMoney<br><span class="nowrap color-desc">先锋额度范围</span>
        </label>
        <div class='col-sm-8'>
            <input name="secondPaymentMoney" required="required" title="请输入额度范围" placeholder="请输入额度范围" value="<?php echo sysconf('secondPaymentMoney'); ?>" class="layui-input">
            <p class="help-block">当前先锋额度范围，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondPaymentTime<br><span class="nowrap color-desc">先锋交易时间</span>
        </label>
        <div class='col-sm-8'>
            <input name="secondPaymentTime" required="required" title="请输入交易时间" placeholder="请输入交易时间" value="<?php echo sysconf('secondPaymentTime'); ?>" class="layui-input">
            <p class="help-block">当前先锋交易时间，用于APP展示。</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            secondPaymentInfo<br><span class="nowrap color-desc">先锋收款描述</span>
        </label>
        <div class='col-sm-8'>
            <input name="secondPaymentInfo" required="required" title="请输入通道描述" placeholder="请输入通道描述" value="<?php echo sysconf('secondPaymentInfo'); ?>" class="layui-input">
            <p class="help-block">当前系统通道描述，用于APP展示。</p>
        </div>
    </div>
    <hr/>


    <div class="hr-line-dashed"></div>

    <div class="col-sm-4 col-sm-offset-2">
        <div class="layui-form-item text-center">
            <button class="layui-btn" type="submit">保存配置</button>
        </div>
    </div>

</form>

</div>
</div>

<!-- 右则内容区域 结束 -->