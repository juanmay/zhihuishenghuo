<?php
// +------------------------------------------------------------------
// | 信用卡代还管理系统 -- 畅捷SDK
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

class CjSdk
{

    // 访问地址
    static protected $url_list = [
        //3.1、获取令牌
        "getQkSpToken" => 'https://dev-api.chanpay.co/v2/base/getQkSpToken',
        //3.2、商户注册
        "merchantReg" => 'https://dev-api.chanpay.co/v2/merchant/merchantReg',
        //3.3、银行卡签约短信发送
        "merchantSignSms" => 'https://dev-api.chanpay.co/v2/sign/merchantSignSms',
        //3.4、银行卡签约
        "merchantSign" => 'https://dev-api.chanpay.co/v2/sign/merchantSign',
        //3.5、签约状态查询
        "signQuery" => 'https://dev-api.chanpay.co/v2/sign/signQuery',
        //3.6、消费短信
        "merchantConsumeSms" => 'https://dev-api.chanpay.co/v2/trans/merchantConsumeSms',
        //3.7、消费
        "merchantConsume" => 'https://dev-api.chanpay.co/v2/trans/merchantConsume',
        //3.9、消费状态查询
        "consumeQuery" => 'https://dev-api.chanpay.co/v2/trans/consumeQuery',
        //3.10 商户变更
        // 1 变更商户快捷交易费率信息  2 新增商户快捷交易费率信息 3 变更商户快捷提现费率信息
        // 4 变更商户扫码提现费率信息  5 变更商户银联二维码主扫交易费率信息  6 新增商户银联二维码主扫交易费率信息
        // 7 变更商户银联二维码被扫交易费率信息 8 新增商户银联二维码被扫交易费率信息
        "merchantChange" => 'https://dev-api.chanpay.co/v2/merchant/merchantChange',
        //3.11、提现
        "withdraw" => 'https://dev-api.chanpay.co/v2/trans/withdraw',
        //3.12、提现结果查询
        "withdrawQuery" => 'https://dev-api.chanpay.co/v2/trans/withdrawQuery',
        //3.13、商户钱包查询
        "walletQuery" => 'https://dev-api.chanpay.co/v2/wallet/walletQuery',
        //3.14、商户信息查询
        "queryQkMerchant" => 'https://dev-api.chanpay.co/v2/merchant/queryQkMerchant',
        
    ];

    static protected $shop_id = ''; //后台ID
    static protected $encrypt_key = '86D1324DD1654038E5D21DA5395701BC530F4128F08004BC'; //加密key

    static protected $comm_param = [
        'spCode' => '10000261',//后台ID
    ];

    // static protected $example_data = [
    //     'gettoken' => [],
    //     'member' => [
    //         'token' => '',
    //         'spCode' => '10000000',
    //         'channelCode' => '1000',
    //         'merName' => '徐xx',
    //         'merAbbr' => '徐xx',
    //         'idCardNo' => '36220419',
    //         'bankAccountNo' => '6222280023', //银行卡号
    //         'mobile' => '18888888888',
    //         'bankAccountName' => '徐x刚',
    //         'bankAccountType' => '2',          //银行卡账户类型 2 对私
    //         'bankName' => '广发银行',
    //         'bankSubName' => '南山支行',
    //         'bankCode' => '306',
    //         'bankAbbr' => 'CGB',
    //         'bankChannelNo' => '305421000067',    //联行号
    //         'bankProvince' => '广东省',
    //         'bankCity' => '广州市',
    //         'debitRate' => '0.005',
    //         'debitCapAmount' => '99999999',   //分
    //         'creditRate' => '0.005',
    //         'creditCapAmount' => '99999999',
    //         'withdrawDepositRate' => '0',
    //         'withdrawDepositSingleFee' => '100',
    //         'reqFlowNo' => 'M' . date('YmdHis'),
    //     ],
    //     'settle' => [
    //         'cusid' => 'YQ_B1638424',
    //         'orderid' => 'T32432432',
    //         'amount' => '23800',
    //         'isall' => '1',// 如果设置了全额提取,则amount无效
    //         'notify_url' => 'http://abaidu.cn/yq-oss/bootapi/v2/test/notify',
    //     ],
    //     'pay' => [
    //         'cusid' => '101000000000001',
    //         'orderid' => 'YQ' . randomStr(4) . date('YmdHis'),
    //         'agreeid' => '201808070900388244',
    //         'trxcode' => 'QUICKPAY_OL_HP',
    //         'amount' => '2000',   //分
    //         'currency' => 'CNY',
    //         'subject' => '日用百货',
    //         'validtime' => 720,
    //         'notifyurl' => 'http://xxxst.cn/yq-oss/bootapi/v2/test/notify',
    //     ],
    //     'checkpay' => [
    //         'cusid' => '101000000000001',
    //         'orderid' => 'YQ3242323432',
    //         'agreeid' => '201808070900388244',
    //         'smscode' => '111111',
    //         'thpinfo' => '',
    //     ],
    //     'repay' => [
    //         'cusid' => '201000000001',
    //         'orderid' => '201000000001',  // 付款流水号
    //         'amount' => '20100',
    //         'agreeid' => '20100',   // 协议编号
    //         'notifyurl' => 'http://xxxlst.cn/yq-oss/bootapi/v2/test/notify',
    //     ],
    //     'updatefee' => [
    //         'cusid' => '101000000000001',
    //         'acctid' => '6214851204370725',
    //         'accttp' => '00',
    //         'prodlist' => [
    //             'trxcode' => 'QUICKPAY_OL_NP',
    //             'feerate' => '0.4',
    //         ],
    //         'settfee' => '1.00',
    //     ],

    //     //trxstatus交易状态: 0000:绑卡成功,流程完成；3051: 协议已存在,请勿重复签约；1999: 短信验证码已发送,请继续调用签约确认接口完成绑卡操作；其他,交易失败
    //     'bindsms' => [     //resendsms，相同参数
    //         'cusid' => '100000000001',    //商户号
    //         'meruserid' => 'MOFU0001',    //商户用户号
    //         'cardno' => '62133333304370725',
    //         'acctname' => '章三',
    //         'accttype' => '02',
    //         'validdate' => '0123',
    //         'cvv2' => '222',
    //         'idno' => '440982198508183015',
    //         'tel' => '13760710513',
    //     ],
    //     'confirmcard' => [
    //         'cusid' => '100000000001',
    //         'meruserid' => 'MOFU0001',
    //         'cardno' => '5555555555555',
    //         'acctname' => '章三',
    //         'accttype' => '02',
    //         'validdate' => '0123',
    //         'cvv2' => '222',
    //         'idno' => '440982198508183015',
    //         'tel' => '13760710513',
    //         'smscode' => '123456',
    //         'thpinfo' => '',    //发送时返回值
    //     ],
    //     'unbind' => [
    //         'cusid' => '100000000001',
    //         'cardno' => '32312312312312312',
    //     ],
    //     'query' => [
    // //      'AGENT_CD'=>'',
    //         'MERC_CD' => '800000041473558',
    //         'ORDER_NO' => '',
    //         'OUT_ORDER_NO' => 'YQl1zlPQ20180705104143',
    // //      'SIGN'=>'',
    //     ],
    //     'mquery' => [    //进件查询
    //         'outcusid' => '201808070900388244'
    //     ],
    //     'accountquery' => [    //进件查询
    //         'cusid' => '201808070900388244'
    //     ],
    //     'settlequery' => [
    //         'cusid' => '',
    //         'orderid' => '',
    //         'date' => date('Ymd'),
    //     ],
    //     'bill' => [
    //         'trxdate' => '2018-08-01'
    //     ]
    // ];


    /**
     * @curl 请求
     * @param $url
     * @param string $post
     * @param string $cookie
     * @param int $returnCookie
     * @return mixed|string
     */
    public function curl_request($url, $data = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data),
                'X-AjaxPro-Method:ShowList',
                'User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36'
            )
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $res = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $res;
    }

    public function handle($_type, $_param)
    {
        $tokenStr = $this->curl_request(self::$url_list['getQkSpToken'], json_encode($this->prepareParam([])));
        $token = json_decode($tokenStr, true);
        if (isset($_param['spCode'])) {
            $_param['spCode'] = self::$comm_param['spCode'];
        }
        $_param['token'] = $this->Des3Decrypt($token['data']['token'], self::$encrypt_key);
        $postData = $this->prepareParam($_param);
        // dump($postData);
        $ret = $this->curl_request(self::$url_list[$_type], json_encode($postData, JSON_UNESCAPED_UNICODE));
        return json_decode($ret, true);
    }

    public function prepareParam($data)
    {
        $post_data = array_merge($data, self::$comm_param);
        ksort($post_data);
        $signdata = implode('', array_values($post_data));
        $signdata = self::$encrypt_key . $signdata;
        if (!empty($data)) {
            isset($post_data['idCardNo'])?$post_data['idCardNo'] = $this->Des3Encrypt($post_data['idCardNo'], self::$encrypt_key):"";
            isset($post_data['bankAccountNo'])?$post_data['bankAccountNo'] = $this->Des3Encrypt($post_data['bankAccountNo'], self::$encrypt_key):"";
            isset($post_data['mobile'])?$post_data['mobile'] = $this->Des3Encrypt($post_data['mobile'], self::$encrypt_key):"";
            isset($post_data['cvn2'])?$post_data['cvn2'] = $this->Des3Encrypt($post_data['cvn2'], self::$encrypt_key):"";
            isset($post_data['expired'])?$post_data['expired'] = $this->Des3Encrypt($post_data['expired'], self::$encrypt_key):"";
        }
        $sign = strtoupper(md5($signdata));
        ksort($post_data);
        $post_data['sign'] = $sign;
        return $post_data;
    }

    private static function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    ///3DES
    public function Des3Encrypt($str, $key = '')
    {
        $str = self::pkcs5_pad($str, 8);
//    $str = hex2bin($str);
        $keys = hex2bin($key);
        $keys = substr($keys, 0, 24);
        if (strlen($str) % 8) {
            $str = str_pad($str, strlen($str) + 8 - strlen($str) % 8, "\0");
        }
        $sign = openssl_encrypt(
            $str,
            'DES-EDE3',
            $keys,
            OPENSSL_RAW_DATA | OPENSSL_NO_PADDING,
            ''
        );
        return bin2hex($sign);
    }

    public function Des3Decrypt($str, $key = '')
    {
        $keys = hex2bin($key);
        $dataStr = hex2bin($str);
        $data = openssl_decrypt(
            $dataStr,
            'DES-EDE3',
            $keys,
            OPENSSL_RAW_DATA | OPENSSL_NO_PADDING,
            ''
        );
        $dec_s = strlen($data);
        $padding = ord($data[$dec_s - 1]);
        $decrypted = substr($data, 0, -$padding);
        return $decrypted;
    }

    // 十六进制字符串转为十六进制格式的二进制数据流
    public function format_strtoHex($str)
    {
        $str = strtoupper($str);
        $len = strlen($str);
        if ($pad = $len % 8 && $len < 16) {       //明文数据格式化，要加密的数据少于等于8字节
            $str = str_pad($str, $len + 8 - $pad, "F");
        }
        if ($len >= 32) {       //加密串格式化
            $str = substr($str . $str, 0, 48); // 取24个字节，48位
        }
        $hex = "";
        for ($i = 0; $i < strlen($str) / 2; $i++) {      //将加密串中大于F的一个字节（两个字符），替换为 FF
            $tmp1 = $str[$i * 2];
            $tmp2 = $str[$i * 2 + 1];
            $tmp = $tmp1 . $tmp2;
            if (strcasecmp($tmp1, 'F') > 0 || strcasecmp($tmp2, 'F') > 0) {
                $tmp = 'FF';
            }
            $hex .= $tmp;
        }
        $hex = strtoupper($hex);
        echo $hex . '<br>';
        return pack('H*', $hex);
    }

    public function BinToStr($str)
    {
        $arr = explode(' ', $str);
        foreach ($arr as &$v) {
            $v = pack("H" . strlen(base_convert($v, 2, 16)), base_convert($v, 2, 16));
        }
        return join('', $arr);
    }

    public function decrypt($str)
    {
        $decrypted = @mcrypt_decrypt(MCRYPT_DES, substr(self::$encrypt_key, 0.24), hex2bin($str), MCRYPT_MODE_ECB, '');
        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s - 1]);
        $decrypted = substr($decrypted, 0, -$padding);
        return $decrypted;
    }

    // public function aaa(){
    //     $data = array(
    //         token : String,                     //令牌，明文令牌
    //         spCode : String,                    //服务商编号
    //         merName : String,                   //商户名称
    //         merAbbr : String,                   //商户简称
    //         idCardNo : String,                  //身份证号，3DES加密
    //         bankAccountNo : String,             //银行卡卡号，3DES加密
    //         mobile : String,                    //银行卡预留手机号，3DES加密
    //         bankAccountName : String,           //银行卡户名
    //         "bankAccountType" : Integer,          //银行卡账户类型 2 对私
    //         "bankName" : String,                  //银行名称
    //         "bankSubName" : String,               //银行支行名称
    //         "bankCode" : String,                  //银行代码，请见银行代码、简称对照表
    //         "bankAbbr" : String,                  //银行代号，请见银行代码、简称对照表
    //         "bankChannelNo" : String,             //银行联行号
    //         "bankProvince" : String,              //银行所属省
    //         "bankCity" : String,                  //银行所属市
    //         "channelCode" : String,               //快捷渠道编号
    //               // <-- 选填快捷渠道编号--快捷相关费率以内字段必填。
    //         "debitRate" : String,                 //快捷借记卡费率，如0.006
    //         "debitCapAmount" : String,            //快捷借记卡封顶，单位：分
    //         "creditRate" : String,                //快捷信用卡费率，如0.006
    //         // creditCapAmount : String,           //快捷信用卡封顶，单位：分
    //         // qrChannelCode : String,               //扫码渠道编号
    //         //       <-- 选填扫码渠道编号-- 注：选填主扫费率，则主扫相关必填；选择被扫费率，则被扫相关必填。
    //         // mainDebitRate : String,                 //扫码主扫借记卡费率，如0.006
    //         // mainDebitCapAmount : String,            //扫码主扫借记卡封顶，单位：分
    //         // mainCreditRate : String,                //扫码主扫信用卡费率，如0.006
    //         // mainCreditCapAmount : String,           //扫码主扫信用卡封顶，单位：分
    //         // passiveDebitRate : String,                 //扫码被扫借记卡费率，如0.006
    //         // passiveDebitCapAmount : String,            //扫码被扫借记卡封顶，单位：分
    //         // passiveCreditRate : String,                //扫码被扫信用卡费率，如0.006
    //         // passiveCreditCapAmount : String,           //扫码被扫信用卡封顶，单位：分
    //         "withdrawDepositRate" : String,       //快捷提现费率，如0.006
    //         "withdrawDepositSingleFee" : String,  //快捷单笔提现手续费，单位：分
    //         // qrCodeWithdrawDepositRate : String,       //扫码提现费率，如0.006--不填默认0
    //         // qrCodeWithdrawDepositSingleFee : String,  //扫码单笔提现手续费，单位：分--不填默认0
    //         "reqFlowNo" : String,                 //请求流水号
    //         "sign" : String                       //签名
    //         );
    // }

    
}



?>