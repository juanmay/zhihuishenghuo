<?php
class TlSkbSdk
{
       /**
     * 通联的待还，收款(utf-8)
     * @author dev
     * 
     * @method Addcus            商户进件
     * @method cusquery          商户进件状态查询
     * @method updatesettinfo    商户进件状态查询
     * @method bindcard          商户绑定消费银行卡
     * @method resendbindsms     重新获取绑卡验证码
     * @method bindcardconfirm   商户绑定银行卡确认
     * @method resendbindsms     商户解绑消费银行卡
     * @method unbindcard        商户解绑消费银行卡     
     * @method applypay          快捷交易支付申请     
     * @method confirmpay        快捷交易支付确认     
     * @method query             快捷交易查询
     * @method paysms            短信重新获取
     * @method balance           余额查询
     * @method pay               付款
     * @method querypay          提现(付款)交易查询
     * 
     * 
     */
    protected $config;
     /**
     * 架构函数
     * @access public
     * @param array $values  初始化数组元素
     */

    function __construct(){

        $this->config=array(
            // 测试配置信息  
            'Url'=>'https://ipay.allinpay.com/apiweb/org/', #进件           
            'orgid'      => '201003990690', //测试接入机构号
            'appid'      => '0000492', //平台分配的机构APPID
            'version'    => '11', //版本号
            'randomstr'  => 'DY-'.time(),//随机字符串
            'reqip'      => getIP(),//请求IP
            'reqtime'    => time(), 
            'key'        => '7c8bef5acc8a4819749d1d26b0b0fabb',
            'Pay_Url'=>'https://ipay.allinpay.com/apiweb/qpay/', #交易
            'Acct_Url'=>'https://ipay.allinpay.com/apiweb/acct/', #查询
            'Dict_Url'=>'https://ipay.allinpay.com/apiweb/dict/', #mcc
        );
    }


    #商户进件
    public  function Addcus($arr){      
        $data['belongorgid']   = $this->config['orgid'];
        $data['outcusid']      = $arr['outcusid'];
        $data['cusname']    = $arr['cusname'];
        $data['cusshortname']    = $arr['cusshortname'];
        $data['merprovice']    = $arr['merprovice'];
        $data['areacode']      = $arr['areacode'];
        $data['legal']         = $arr['legal'];
        $data['idno']          = $arr['idno'];
        $data['phone']         = $arr['phone'];
        $data['address']       = $arr['address'];
        $data['acctid']        = $arr['acctid'];
        $data['acctname']      = $arr['acctname'];
        $data['accttp']        = "00";
        $data['prodlist']      = $arr['prodlist'];
        $data['settfee']       = $arr['settfee'];  
        return $this->send($data,'addcus');       
    }

    #商户进件状态查询
    public function cusquery($arr){
        return $this->send($arr,'cusquery'); 
    }

    #商户结算/费率信息修改
    public function updatesettinfo($arr){
        $data=$arr;
        //$data['acctid']='6214851204370725';
        $data['accttp']='00';
        //test($data);
        return $this->send($data,'updatesettinfo');
    }


    #商户结算/费率信息修改
    public function bindcard($arr){
        $data=$arr;        
        return $this->send($data,'bindcard');
    }

    #重新获取绑卡验证码
    public function resendbindsms($arr){
        $data=$arr;      
        return $this->send($data,'resendbindsms');
    }

    #商户绑定银行卡确认
    public function bindcardconfirm($arr){
        $data=$arr; 
        return $this->send($data,'bindcardconfirm');
    }

     #商户解绑消费银行卡
    public function unbindcard($arr){
        $data=$arr;      
        return $this->send($data,'unbindcard');        
    }

    #快捷交易支付申请
    public function applypay($arr){
        $data=$arr;         
        $data['currency']='CNY';
        return $this->send($data,'applypay',2);
    }

    #快捷交易支付申请
    public function quickpass($arr){
        $data=$arr;         
        $data['currency']='CNY';
        return $this->send($data,'quickpass',2);
    }

    #快捷交易支付确认
    public function confirmpay($arr){
        $data=$arr;   
        return $this->send($data,'confirmpay',2);
    }


     #快捷交易查询
    public function query($arr){
        $data=$arr;   
        return $this->send($data,'query',2);
    }

    #短信重新获取
    public function paysms($arr){
        $data=$arr;   
        return $this->send($data,'paysms',2);
    }

    #余额查询
    public function balance($arr){
        $data=$arr;   
        return $this->send($data,'balance',3);
    }

    #付款
    public function pay($arr){
        $data=$arr;   
        return $this->send($data,'pay',3);
    }

    #提现(付款)交易查询
    public function querypay($arr){
        $data=$arr;   
        return $this->send($data,'querypay',3);
    }


    #提现(付款)交易查询
    public function querymcc($arr){
        $data=$arr;   
        return $this->send($data,'findMccByAreacode',4);
    }




    


    #提交信息进行处理
    public function send($data,$url,$type=''){
        $data['orgid']      = $this->config['orgid'];
        $data['appid']      = $this->config['appid'];     
        $data['version']    = $this->config['version'];
        $data['randomstr']  = $this->config['randomstr'];
        $data['reqip']      = $this->config['reqip'];
        $data['reqtime']    = $this->config['reqtime'];  
        $data['key']        = $this->config['key'];          
        $array=$data;  
        $array['sign']       = $this->sign($data);   
        unset($array['key']);    
        if($type == 2){             
            $res= postData($array,  $this->config['Pay_Url'].$url);
        }elseif ($type == 3) {
            $res= postData($array,  $this->config['Acct_Url'].$url);
        }elseif ($type == 4) {
            // dump($array);
            $res= postData($array,  $this->config['Dict_Url'].$url);
        }else{           
            $res= postData($array,  $this->config['Url'].$url); 
        }        
        return json_decode($res,true);

   }

    //获取sign
    public function sign($data){
        ksort($data);
        $str = '';
        foreach ($data as $k => $value) {
            $str.=$k."=".$value."&";
        }
        $str=substr($str, 0,-1); 
        // dump($str);
        return md5($str);
    }  


}




?>