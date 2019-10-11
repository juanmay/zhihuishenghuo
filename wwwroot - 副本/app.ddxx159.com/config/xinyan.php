<?php
return array (
    //编码格式
    'charset' => "UTF-8",
    //商户公钥(暂不使用)
    'merchant_public_key' => "./extend/certificate/8150733762_pub.cer",
    //商户私钥
    'merchant_private_key' => "./extend/certificate/8150733762_pri.pfx",
    //商户号
    'memberId' => '8150733762',
    //终端号
    'terminalId' => '8150733762',
    //私钥密码
    'pfxPwd' => '731272',
    //数据类型
    'dataType' => 'json',
    //2.2.1 银行卡认证(二、三、四要素)
    'bankCardAuthUrl' => "https://api.xinyan.com/bankcard/v3/auth",
    //======2.2.2 银行卡四要素验证短信申请======
    'authApplyUrl' => "https://api.xinyan.com/bankcard/v1/authsms",
    //======2.2.3银行卡四要素验证确认======
    'authConfirmUrl' => "https://api.xinyan.com/bankcard/v1/authconfirm",
    //======卡bin======
    'bankCardBinUrl' => "https://api.xinyan.com/bankcard/v1/cardBin",
    //======身份证======
    'idCardAuthUrl' => "https://api.xinyan.com/idcard/v2/auth",
);