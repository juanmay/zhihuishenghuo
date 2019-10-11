<?php
class CryptAES{
    protected $cipher = MCRYPT_RIJNDAEL_128;
    protected $mode = MCRYPT_MODE_ECB;
    protected $pad_method = NULL;
    protected $secret_key = '';
    protected $iv = '';
    protected $appKey='';
    //商户注册1
    protected  $registMerchant='http://47.107.104.250:8099/rest/v1.0/paybar/registMerchant';
    //商户开通产品接口2
    protected  $registMerchantProduct='http://47.107.104.250:8099/rest/v1.0/paybar/registMerchantProduct';
    //商户查询结算卡信息3
    protected  $queryMerchantSettlementInfo='http://47.107.104.250:8099/rest/v1.0/paybar/queryMerchantSettlementInfo';
    //商户查询费率信息4
    protected  $queryMerchantFeeInfo='http://47.107.104.250:8099/rest/v1.0/paybar/queryMerchantFeeInfo';
    //商户修改结算卡信息接口5
    protected  $modifyMerchantSettlementInfo='http://47.107.104.250:8099/rest/v1.0/paybar/modifyMerchantSettlementInfo';
    //商户修改产品费率接口6
    protected  $modifyMerchantFeeInfo='http://47.107.104.250:8099/rest/v1.0/paybar/modifyMerchantFeeInfo';
    //商户绑卡7
    protected  $bindCard='http://47.107.104.250:8099/rest/v1.0/paybar/bindCard';
    //商户绑卡短信确认（不用）8
    protected  $confirmBindCard='http://47.107.104.250:8099/rest/v1.0/paybar/confirmBindCard';
    //商户查询绑卡9
    protected  $queryBindCard='http://47.107.104.250:8099/rest/v1.0/paybar/queryBindCard';
    //商户绑卡已绑卡10
    //queryBankCardList
    protected  $queryBankCardList='http://47.107.104.250:8099/rest/v1.0/paybar/queryBankCardList';
    //支付交易收单11
    //pay
    protected  $pay='http://47.107.104.250:8099/rest/v1.0/paybar/pay';
    //快捷支付短信确认12
    //queryPay
    protected  $confirmPay='http://47.107.104.250:8099/rest/v1.0/paybar/confirmPay';
    //支付交易查询13
    //queryPay
    protected  $queryPay='http://47.107.104.250:8099/rest/v1.0/paybar/queryPay';
    //代付提现接口14
    //withdrawDeposit
    protected  $withdrawDeposit='http://47.107.104.250:8099/rest/v1.0/paybar/withdrawDeposit';
    //代付提现查询接口15
    //queryWithdraw
    protected  $queryWithdraw='http://47.107.104.250:8099/rest/v1.0/paybar/queryWithdraw';
    
    //商户余额查询16
    //queryMerchantWallet
    protected  $queryMerchantWallet='http://47.107.104.250:8099/rest/v1.0/paybar/queryMerchantWallet';
    //商户信息查询17
    //queryMerchantInfo
    protected  $queryMerchantInfo='http://47.107.104.250:8099/rest/v1.0/paybar/queryMerchantInfo';
    /**
     * 架构函数
     * @access public
     * @param array $values  初始化数组元素
     */
    public function __construct() {
        $keyStr = 'b04df5d660174fe687706d541d28913f';//秘钥
        $keyStr = substr($keyStr,0,16);
        $this->set_key($keyStr);
        $this->require_pkcs5();
        $this->appKey='12000288';//商户号
    }
    
    
    
    public function set_cipher($cipher)
    {
        $this->cipher = $cipher;
    }
    
    public function set_mode($mode)
    {
        $this->mode = $mode;
    }
    
    public function set_iv($iv)
    {
        $this->iv = $iv;
    }
    
    public function set_key($key)
    {
        $this->secret_key = $key;
    }
    
    public function require_pkcs5()
    {
        $this->pad_method = 'pkcs5';
    }
    
    protected function pad_or_unpad($str, $ext)
    {
        if ( is_null($this->pad_method) )
        {
            return $str;
        }
        else
        {
            $func_name = __CLASS__ . '::' . $this->pad_method . '_' . $ext . 'pad';
            if ( is_callable($func_name) )
            {
                $size = mcrypt_get_block_size($this->cipher, $this->mode);
                return call_user_func($func_name, $str, $size);
            }
        }
        return $str;
    }
    
    protected function pad($str)
    {
        return $this->pad_or_unpad($str, '');
    }
    
    protected function unpad($str)
    {
        return $this->pad_or_unpad($str, 'un');
    }
    
    public function encrypt($str)
    {
        $str = $this->pad($str);
        $td = mcrypt_module_open($this->cipher, '', $this->mode, '');
        
        if ( empty($this->iv) )
        {
            $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        }
        else
        {
            $iv = $this->iv;
        }
        
        mcrypt_generic_init($td, $this->secret_key, $iv);
        $cyper_text = mcrypt_generic($td, $str);
        //        $rt=base64_encode($cyper_text);
        $rt = bin2hex($cyper_text);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        
        return $rt;
    }
    
    public function decrypt($str){
        $td = mcrypt_module_open($this->cipher, '', $this->mode, '');
        
        if ( empty($this->iv) )
        {
            $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        }
        else
        {
            $iv = $this->iv;
        }
        
        mcrypt_generic_init($td, $this->secret_key, $iv);
        $decrypted_text = mdecrypt_generic($td, self::hex2bin($str));
        //        $decrypted_text = mdecrypt_generic($td, base64_decode($str));
        $rt = $decrypted_text;
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        
        return $this->unpad($rt);
    }
    
    public static function hex2bin($hexdata) {
        $bindata = '';
        $length = strlen($hexdata);
        for ($i=0; $i< $length; $i += 2)
        {
            $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
        }
        return $bindata;
    }
    
    public static function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
    
    public static function pkcs5_unpad($text)
    {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text)) return false;
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
        return substr($text, 0, -1 * $pad);
    }
    
    //开户签约
    public function registMerchant($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->registMerchant));
    }
    
    //2.2商户开通产品（不用）
    public function registMerchantProduct($data){ //不用
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->registMerchantProduct));
    }
    //2.3商户查询结算卡信息接口
    public function queryMerchantSettlementInfo($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryMerchantSettlementInfo));
    }
    
    
    //2.4商户查询费率信息接口
    public function queryMerchantFeeInfo($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryMerchantFeeInfo));
    }
    
    
    //2.5商户修改结算卡信息接口
    public function modifyMerchantSettlementInfo($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->modifyMerchantSettlementInfo));
    }
    
    //2.6商户修改产品费率接口
    public function modifyMerchantFeeInfo($data){
        
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->modifyMerchantFeeInfo));
    }
    //2.7商户绑卡请求接口
    public function bindCard($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->bindCard));
        
    }
    
    //2.7商户绑卡短信确认
    public function confirmBindCard($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->confirmBindCard));
        
    }
    
    //绑卡查询
    public function queryBindCard($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryBindCard));
        
    }
    
    //商户绑卡已绑卡
    public function queryBankCardList($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryBankCardList));
    }
    
    //支付交易收单
    public function pay($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->pay));
    }
    //快捷支付短信确认
    //confirmPay
    public function confirmPay($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->confirmPay));
    }
    
    //支付交易查询
    //queryPay
    public function queryPay($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryPay));
    }
    
    //代付提现接口
    //withdrawDeposit
    public function withdrawDeposit($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->withdrawDeposit));
    }
    
    //代付提现查询接口
    //queryWithdraw
    public function queryWithdraw($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryWithdraw));
    }
    
    
    //商户余额查询
    //queryMerchantWallet
    public function queryMerchantWallet($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryMerchantWallet));
    }
    //商户信息查询
    //queryMerchantInfo
    public function queryMerchantInfo($data){
        $Agt_infoStr = json_encode($data, JSON_UNESCAPED_UNICODE);
        $BodyArray['data'] = $this->encrypt($Agt_infoStr); //加密后
        $BodyArray['appKey']=$this->appKey;
        return $this->decrypt(postData($BodyArray,$this->queryMerchantInfo));
    }
    
    
    
    public function decryptt($data){
        //echo 11;
        P($this->decrypt($data));
        
    }
    
}