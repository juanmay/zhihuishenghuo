<?php /*a:1:{s:74:"C:\phpStudy\PHPTutorial\WWW\dscjall\application\admin\view\quick\info.html";i:1566470245;}*/ ?>
<form autocomplete="off" class="layui-form layui-box modal-form-box" action="<?php echo request()->url(); ?>" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">用户手机</label>
        <div class="layui-input-block">
            <input type="text" name="phone" value='<?php echo htmlentities((isset($info['phone']) && ($info['phone'] !== '')?$info['phone']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户姓名</label>
        <div class="layui-input-block">
            <input type="text" name="realname" value='<?php echo htmlentities((isset($info['realname']) && ($info['realname'] !== '')?$info['realname']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">身份证号</label>
        <div class="layui-input-block">
            <input type="text" name="idcard" value='<?php echo htmlentities((isset($info['idcard']) && ($info['idcard'] !== '')?$info['idcard']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">收款通道</label>
        <div class="layui-input-block">
            <input type="text" name="type" value='<?php foreach(["xf"=>"先锋","yb"=>"易宝","cj"=>"畅捷"] as $k=>$v): if($info['type'] == "$k"): ?><?php echo htmlentities($v); endif; endforeach; ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">收款单号</label>
        <div class="layui-input-block">
            <input type="text" name="order_no" value='<?php echo htmlentities((isset($info['order_no']) && ($info['order_no'] !== '')?$info['order_no']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">出账卡号</label>
        <div class="layui-input-block">
            <input type="text" name="credit_card_num" value='<?php echo htmlentities((isset($info['credit_card_num']) && ($info['credit_card_num'] !== '')?$info['credit_card_num']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">出账银行</label>
        <div class="layui-input-block">
            <input type="text" name="credit_card_name" value='<?php echo htmlentities((isset($info['credit_card_name']) && ($info['credit_card_name'] !== '')?$info['credit_card_name']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">入账卡号</label>
        <div class="layui-input-block">
            <input type="text" name="debit_card_num" value='<?php echo htmlentities((isset($info['debit_card_num']) && ($info['debit_card_num'] !== '')?$info['debit_card_num']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">入账银行</label>
        <div class="layui-input-block">
            <input type="text" name="debit_card_name" value='<?php echo htmlentities((isset($info['debit_card_name']) && ($info['debit_card_name'] !== '')?$info['debit_card_name']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">收款金额</label>
        <div class="layui-input-block">
            <input type="text" name="money" value='<?php echo htmlentities((isset($info['money']) && ($info['money'] !== '')?$info['money']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">手续费用</label>
        <div class="layui-input-block">
            <input type="text" name="fee_money" value='<?php echo htmlentities((isset($info['fee_money']) && ($info['fee_money'] !== '')?$info['fee_money']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">入账金额</label>
        <div class="layui-input-block">
            <input type="text" name="can_money" value='<?php echo htmlentities(sprintf("%.2f",$info['money']-$info['fee_money'])); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">订单状态</label>
        <div class="layui-input-block">
            <input type="text" name="status" value='<?php foreach(["0"=>"未支付","1"=>"支付中","2"=>"支付失败","3"=>"支付成功","4"=>"提现中","5"=>"提现失败","6"=>"已完成"] as $k=>$v): if($info['status'] == "$k"): ?><?php echo htmlentities($v); endif; endforeach; ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">处理信息</label>
        <div class="layui-input-block">
            <input type="text" name="deal_info" value='<?php echo htmlentities((isset($info['deal_info']) && ($info['deal_info'] !== '')?$info['deal_info']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">交易时间</label>
        <div class="layui-input-block">
            <input type="text" name="add_time" value='<?php echo htmlentities((isset($info['add_time']) && ($info['add_time'] !== '')?$info['add_time']:"---")); ?>' readonly class="layui-input">
        </div>
    </div>

    <div class="layui-form-item text-center">
        <button class="layui-btn layui-btn-danger" type='button' data-close>关闭</button>
    </div>

    <div class="hr-line-dashed"></div>
</form>
