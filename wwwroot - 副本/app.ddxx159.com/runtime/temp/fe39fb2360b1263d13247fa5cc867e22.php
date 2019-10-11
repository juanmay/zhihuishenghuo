<?php /*a:1:{s:78:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\allmember\form.html";i:1566453650;}*/ ?>
<style type="text/css">
    .layui-form-label {
        width: 120px;
    }
    .layui-input-block {
        margin-left: 140px;
    }
</style>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">法人手机</label>
        <div class="layui-input-block">
            <input type="text" name="phone" value='<?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:"")); ?>' required="required" title="请输入平台手机" placeholder="请输入平台手机" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，法人手机，保证手机号的唯一性</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">法人姓名</label>
        <div class="layui-input-block">
            <input type="text" name="realname" value='<?php echo htmlentities((isset($vo['realname']) && ($vo['realname'] !== '')?$vo['realname']:"")); ?>' required="required" title="请输入平台姓名" placeholder="请输入平台姓名" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，法人姓名</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">公司名称</label>
        <div class="layui-input-block">
            <input type="text" name="companyName" value='<?php echo htmlentities((isset($vo['companyName']) && ($vo['companyName'] !== '')?$vo['companyName']:"")); ?>' required="required" title="请输入平台昵称" placeholder="请输入平台昵称" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，公司名称</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">身份证号</label>
        <div class="layui-input-block">
            <input type="text" name="idcard" value='<?php echo htmlentities((isset($vo['idcard']) && ($vo['idcard'] !== '')?$vo['idcard']:"")); ?>' required="required" title="请输入身份证号" placeholder="请输入身份证号" class="layui-input">
            <p class="help-block color-desc"><b>必填</b>，身份证号</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">账户余额</label>
        <div class="layui-input-block">
            <input type="text" name="accountMoney" value='<?php echo htmlentities((isset($vo['accountMoney']) && ($vo['accountMoney'] !== '')?$vo['accountMoney']:"")); ?>' readonly="" title="请输入账户余额" placeholder="请输入账户余额" class="layui-input">
            <p class="help-block color-desc">平台可提现金额</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">冻结金额</label>
        <div class="layui-input-block">
            <input type="text" name="freezeMoney" value='<?php echo htmlentities((isset($vo['freezeMoney']) && ($vo['freezeMoney'] !== '')?$vo['freezeMoney']:"")); ?>' readonly="" title="请输入冻结金额" placeholder="请输入冻结金额" class="layui-input">
            <p class="help-block color-desc">平台提现冻结金额</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">收益金额</label>
        <div class="layui-input-block">
            <input type="text" name="bonusMoney" value='<?php echo htmlentities((isset($vo['bonusMoney']) && ($vo['bonusMoney'] !== '')?$vo['bonusMoney']:"")); ?>' readonly="" title="请输入收益金额" placeholder="请输入收益金额" class="layui-input">
            <p class="help-block color-desc">平台累计获得收益分配</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">环讯通道</label>
        <div class="layui-input-block">
            <input type="text" name="firstRepaymentRate" value='<?php echo htmlentities((isset($vo['firstRepaymentRate']) && ($vo['firstRepaymentRate'] !== '')?$vo['firstRepaymentRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">畅捷110002通道</label>
        <div class="layui-input-block">
            <input type="text" name="secondRepaymentRate" value='<?php echo htmlentities((isset($vo['secondRepaymentRate']) && ($vo['secondRepaymentRate'] !== '')?$vo['secondRepaymentRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">畅捷110001通道</label>
        <div class="layui-input-block">
            <input type="text" name="thirdRepaymentRate" value='<?php echo htmlentities((isset($vo['thirdRepaymentRate']) && ($vo['thirdRepaymentRate'] !== '')?$vo['thirdRepaymentRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">畅捷110003通道</label>
        <div class="layui-input-block">
            <input type="text" name="fourthRepaymentRate" value='<?php echo htmlentities((isset($vo['fourthRepaymentRate']) && ($vo['fourthRepaymentRate'] !== '')?$vo['fourthRepaymentRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷小额通道</label>
        <div class="layui-input-block">
            <input type="text" name="seventhRepaymentRate" value='<?php echo htmlentities((isset($vo['seventhRepaymentRate']) && ($vo['seventhRepaymentRate'] !== '')?$vo['seventhRepaymentRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">空卡通道</label>
        <div class="layui-input-block">
            <input type="text" name="fifthRepaymentRate" value='<?php echo htmlentities((isset($vo['fifthRepaymentRate']) && ($vo['fifthRepaymentRate'] !== '')?$vo['fifthRepaymentRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">一卡还卡通道</label>
        <div class="layui-input-block">
            <input type="text" name="sixthRepaymentRate" value='<?php echo htmlentities((isset($vo['sixthRepaymentRate']) && ($vo['sixthRepaymentRate'] !== '')?$vo['sixthRepaymentRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">代还单笔</label>
        <div class="layui-input-block">
            <input type="text" name="RepaymentFee" value='<?php echo htmlentities((isset($vo['RepaymentFee']) && ($vo['RepaymentFee'] !== '')?$vo['RepaymentFee']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/笔</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷收款</label>
        <div class="layui-input-block">
            <input type="text" name="cjQuickRate" value='<?php echo htmlentities((isset($vo['cjQuickRate']) && ($vo['cjQuickRate'] !== '')?$vo['cjQuickRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">易宝收款</label>
        <div class="layui-input-block">
            <input type="text" name="ybQuickRate" value='<?php echo htmlentities((isset($vo['ybQuickRate']) && ($vo['ybQuickRate'] !== '')?$vo['ybQuickRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
	<!-- <div class="layui-form-item">
        <label class="layui-form-label">先锋收款</label>
        <div class="layui-input-block">
            <input type="text" name="firstQuickRate" value='<?php echo htmlentities((isset($vo['firstQuickRate']) && ($vo['firstQuickRate'] !== '')?$vo['firstQuickRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div> -->
    <!-- <div class="layui-form-item">
        <label class="layui-form-label">畅捷收款1</label>
        <div class="layui-input-block">
            <input type="text" name="secondQuickRate" value='<?php echo htmlentities((isset($vo['secondQuickRate']) && ($vo['secondQuickRate'] !== '')?$vo['secondQuickRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">畅捷收款2</label>
        <div class="layui-input-block">
            <input type="text" name="thirdQuickRate" value='<?php echo htmlentities((isset($vo['thirdQuickRate']) && ($vo['thirdQuickRate'] !== '')?$vo['thirdQuickRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">畅捷收款3</label>
        <div class="layui-input-block">
            <input type="text" name="fourthQuickRate" value='<?php echo htmlentities((isset($vo['fourthQuickRate']) && ($vo['fourthQuickRate'] !== '')?$vo['fourthQuickRate']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/万元</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div> -->
    <div class="layui-form-item">
        <label class="layui-form-label">收款单笔</label>
        <div class="layui-input-block">
            <input type="text" name="QuickFee" value='<?php echo htmlentities((isset($vo['QuickFee']) && ($vo['QuickFee'] !== '')?$vo['QuickFee']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/笔</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">二要素鉴权</label>
        <div class="layui-input-block">
            <input type="text" name="twoVerify" value='<?php echo htmlentities((isset($vo['twoVerify']) && ($vo['twoVerify'] !== '')?$vo['twoVerify']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/笔</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">四要素鉴权</label>
        <div class="layui-input-block">
            <input type="text" name="fourVerify" value='<?php echo htmlentities((isset($vo['fourVerify']) && ($vo['fourVerify'] !== '')?$vo['fourVerify']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/笔</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">最小提现金额</label>
        <div class="layui-input-block">
            <input type="text" name="cashMinMoney" value='<?php echo htmlentities((isset($vo['cashMinMoney']) && ($vo['cashMinMoney'] !== '')?$vo['cashMinMoney']:"")); ?>' required="required" title="请输入最小提现金额" placeholder="请输入最小提现金额" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/笔</b>，用户使用软件时的最小提现金额</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">最大提现金额</label>
        <div class="layui-input-block">
            <input type="text" name="cashMaxMoney" value='<?php echo htmlentities((isset($vo['cashMaxMoney']) && ($vo['cashMaxMoney'] !== '')?$vo['cashMaxMoney']:"")); ?>' required="required" title="请输入最大提现金额" placeholder="请输入最大提现金额" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/笔</b>，用户使用软件时的最大提现金额</p>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">提现单笔手续费</label>
        <div class="layui-input-block">
            <input type="text" name="memberCashFee" value='<?php echo htmlentities((isset($vo['memberCashFee']) && ($vo['memberCashFee'] !== '')?$vo['memberCashFee']:"")); ?>' required="required" title="请输入费率成本" placeholder="请输入费率成本" class="layui-input">
            <p class="help-block color-desc"><b>必填，元/笔</b>，用户使用软件时的费率与此成本差奖励给平台</p>
        </div>
    </div>
    <div class="form-group">
        <label class="layui-form-label">审核状态</label>
        <div class='col-sm-8'>
            <?php  if (!isset($vo['status'])) { $vo['status'] = '1'; } foreach(['1'=>'正常','2'=>'禁用'] as $k=>$v): ?>
            <label class="think-radio">
                <!--<?php if($vo['status'] == $k): ?>-->
                <input checked type="radio" name="status" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php else: ?>-->
                <input type="radio" name="status" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-ignore>
                <!--<?php endif; ?>-->
                <?php echo htmlentities($v); ?>
            </label>
            <?php endforeach; ?>
            <p class="help-block">品牌端是否可以登录使用。</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"0")); ?>' name='id' id='id'><?php endif; if(!isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities(app('session')->get('user.id')); ?>' name='fid' id='fid'><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>
</form>