<?php
namespace kubao\mimerpay;
use kubao\mimerpay\Testtools;
/**
 * Created by PhpStorm.
 * User: lzhangyongqinag
 * Date: 17/8/22
 * Time: 16:46
 * demo只是提供一个接口对接编写的思路，具体接口对接商户技术以自身项目的实际情况来进行接口代码的编写。
 */
@include_once(dirname ( __File__ ) . "/conf.php");
class Mimerpay{
	
	
/**
   * 小微商户入网
   * mimer_register_merchant
   * @param array $data
*/
	function mimer_register_merchant($data=array()){
		 
        /**************基本参数****************/
	    $service = register_merchant;//服务名称
	    $version = version;//接口版本
	    $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
	    $partner_id = partner_id;//合作者身份ID
	    $_input_charset = _input_charset;//参数编码字符集
	    $sign_type = sign_type;//签名类型
	    $notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
		
        /****************业务参数***********************/
        $request_no = $data['request_no'];//商户请求号
		$identity_id = $data['identity_id'];//小微商户ID
        require_once 'vendor/kubao/mimerpay/Testtools.php';
		$testTools = new TestTools();
		//小微商户姓名 需要RSA公钥加密处理
		$mimer_name = $testTools -> Rsa_encrypt($data['mimer_name'],$_input_charset) ;
		//小微商户身份证号 需要RSA公钥加密处理
		$mimer_cert_no = $testTools -> Rsa_encrypt($data['mimer_cert_no'],$_input_charset) ;
		//小微商户手机号 需要RSA公钥加密处理
		$mimer_phone = $testTools -> Rsa_encrypt($data['mimer_phone'],$_input_charset) ;
		//小微商户邮箱 需要RSA公钥加密处理
		if($data['mimer_mail'] != null){
			$mimer_mail = $testTools -> Rsa_encrypt($data['mimer_mail'],$_input_charset) ;
		}else{
		    $mimer_mail='';
		}
		$mimer_cert_pic1 = $data['mimer_cert_pic1'];//身份证影印正面
		$mimer_cert_pic2 = $data['mimer_cert_pic2'];//身份证影印反面
		if($data['business_scope'] != null){
		    $business_scope = $data['business_scope'];//经营范围
		}else{
		    $business_scope='';
		}
		
		/****************组织基本参数***********************/
        $param=array();
        $param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['request_no']=$request_no;
		$param['identity_id']=$identity_id;
		$param['mimer_name']=$mimer_name;
		$param['mimer_cert_no']=$mimer_cert_no;
		$param['mimer_phone']=$mimer_phone;
		if($mimer_mail != null){
			$param['mimer_mail']=$mimer_mail;
		}
		$param['mimer_cert_pic1']=$mimer_cert_pic1;
		$param['mimer_cert_pic2']=$mimer_cert_pic2;
		if($business_scope != null){
			$param['business_scope']=$business_scope;
		}
		
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户入网参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }

	
/**
   * 小微商户绑定结算卡
   * mimer_bind_fundout_card
   * @param array $data
*/
	function mimer_bind_fundout_card($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = bind_fundout_card;//服务名称
		$version = version;//接口版本
		$request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
		$partner_id = partner_id;//合作者身份ID
		$_input_charset = _input_charset;//参数编码字符集
		$sign_type = sign_type;//签名类型
		$notify_url = notify_url;//异步通知地址
		$encrypt_version = encrypt_version;//加密版本
		$sign_version = sign_version;//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$request_no = $data['request_no'];//绑卡请求号
        $mimer_member_id = $data['mimer_member_id'];//小微商户编号
		//结算银行卡号 需要RSA公钥加密处理
		$settle_bank_card = $testTools -> Rsa_encrypt($data['settle_bank_card'],$_input_charset) ;
		//小微商户绑卡手机号 需要RSA公钥加密处理
		$mimer_bind_phone = $testTools -> Rsa_encrypt($data['mimer_bind_phone'],$_input_charset) ;
        $is_real_time = $data['is_real_time'];//是否实时结算
        $bank_code = $data['bank_code'];//开户银行编号
        $branch_bank_name = $data['branch_bank_name'];//开户支行名称
        $province = $data['province'];//开户省
        $city = $data['city'];//开户市
		
		
		/****************组织基本参数***********************/
        $param=array();
        $param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['request_no']=$request_no;
		$param['mimer_member_id']=$mimer_member_id;
		$param['settle_bank_card']=$settle_bank_card;
		$param['mimer_bind_phone']=$mimer_bind_phone;
		$param['is_real_time']=$is_real_time;
		$param['bank_code']=$bank_code;
		if($branch_bank_name != null){
			$param['branch_bank_name']=$branch_bank_name;
		}
		if($province != null){
			$param['province']=$province;
		}
		if($city != null){
			$param['city']=$city;
		}
		
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户绑定结算卡请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }
	
	/**
   	 * 小微商户信息查询
     * mimer_query_merchant
     * @param array $data
	*/
	function mimer_query_merchant($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = query_merchant;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $mimer_member_id = $data['mimer_member_id'];//小微商户编号
		//小微商户身份证号 需要RSA公钥加密处理
		$mimer_cert_no = $testTools -> Rsa_encrypt($data['mimer_cert_no'],$_input_charset) ;
		
		
		/****************组织基本参数***********************/
        $param=array();
        $param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		if($mimer_member_id != null){
			$param['mimer_member_id']=$mimer_member_id;
		}
		if($mimer_cert_no != null){
			$param['mimer_cert_no']=$mimer_cert_no;
		}
		
				
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户信息查询接口请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }

   /**
   	* 小微商户账户余额查询
   	* mimer_query_balance
   	* @param array $data
	*/
	function mimer_query_balance($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = query_balance;//服务名称
		$version = version;//接口版本
		$request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
		$partner_id = partner_id;//合作者身份ID
		$_input_charset = _input_charset;//参数编码字符集
		$sign_type = sign_type;//签名类型
		$notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $mimer_member_id = $data['mimer_member_id'];//小微商户编号
		//账户类型
		$balance_type = $data['balance_type'];
		
		
		/****************组织基本参数***********************/
        $param=array();
        $param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		if($mimer_member_id != null){
			$param['mimer_member_id']=$mimer_member_id;
		}
		if($balance_type != null){
			$param['balance_type']=$balance_type;
		}
		
				
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户账户余额查询接口请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }
	
	
	/**
   * 小微商户卡要素支付
   * mimer_bank_card_pay
   * @param array $data
*/
	function mimer_bank_card_pay($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = bank_card_pay;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
		//dump($notify_url);
        /****************业务参数***********************/
        $out_trade_no=$data['out_trade_no'];//商户订单号
		$summary = $data['summary'];//摘要
		$trade_close_time = $data['trade_close_time'];//交易关闭时间
		$payer_id = $data['payer_id'];//付款用户标识
		$payee_id = $data['payee_id'];//收款方用户标识
		$amount = $data['amount'];//金额
		$split_amount = $data['split_amount'];//分账金额
		$split_ratio = $data['split_ratio'];//分账比率
		$split_type = $data['split_type'];//分账类型

		$bank_code = $data['bank_code'];//银行编号
		//银行卡号 需要RSA公钥加密处理
		$bank_card_no = $testTools -> Rsa_encrypt($data['bank_card_no'],$_input_charset);
		//持卡人姓名 需要RSA公钥加密处理
		$account_name = $testTools -> Rsa_encrypt($data['account_name'],$_input_charset);
		$card_type = $data['card_type'];//卡类型
		$card_attribute = $data['card_attribute'];//卡属性
		$cert_type = $data['cert_type'];//证件类型
		//证件号码 需要RSA公钥加密处理
		$cert_no = $testTools -> Rsa_encrypt($data['cert_no'],$_input_charset);
		//手机号 需要RSA公钥加密处理
		$phone_no = $testTools -> Rsa_encrypt($data['phone_no'],$_input_charset);
		//有效期 需要RSA公钥加密处理
		$validity_period = $testTools -> Rsa_encrypt($data['validity_period'],$_input_charset);
		//CVV2 需要RSA公钥加密处理
		$verification_value = $testTools -> Rsa_encrypt($data['verification_value'],$_input_charset);
		$province = $data['province'];//省
		$city = $data['city'];//市
		$bank_branch = $data['bank_branch'];//支行名称
		$payer_ip = $data['payer_ip'];//请求者IP
		$extend_param = $data['extend_param'];//扩展参数
		$settle_account_type = $data['settle_account_type'];//结算账户类型
		$device_id = $data['device_id'];//付款用户设备标识
		$device_type = $data['device_type'];//付款用户设备类型
		
		
		
		/****************组织基本参数***********************/
        $param=array();
        $param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['out_trade_no']=$out_trade_no;
		if($summary != null){
			$param['summary']=$summary;
		}
		if($trade_close_time != null){
			$param['trade_close_time']=$trade_close_time;
		}
		$param['payer_id']=$payer_id;
		$param['payee_id']=$payee_id;
		$param['amount']=$amount;
		if($split_amount != null){
			$param['split_amount']=$split_amount;
		}
		if($split_ratio != null){
			$param['split_ratio']=$split_ratio;
		}
		$param['split_type']=$split_type;
		$param['bank_code']=$bank_code;
		$param['bank_card_no']=$bank_card_no;
		$param['account_name']=$account_name;
		$param['card_type']=$card_type;
		$param['card_attribute']=$card_attribute;
		$param['cert_type']=$cert_type;
		$param['cert_no']=$cert_no;
		$param['phone_no']=$phone_no;
		if($validity_period != null){
			$param['validity_period']=$validity_period;
		}
		if($verification_value != null){
			$param['verification_value']=$verification_value;
		}
		if($province != null){
			$param['province']=$province;
		}
		if($city != null){
			$param['city']=$city;
		}
		if($bank_branch != null){
			$param['bank_branch']=$bank_branch;
		}
		$param['payer_ip']=$payer_ip;
		if($extend_param != null){
			$param['extend_param']=$extend_param;
		}
		if($settle_account_type != null){
			$param['settle_account_type']=$settle_account_type;
		}
		if($device_id != null){
			$param['device_id']=$device_id;
		}
		if($device_type != null){
			$param['device_type']=$device_type;
		}
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户卡要素支付接口请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(masRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }
	
	/**
   * 小微商户支付短信验证
   * mimer_advance_pay
   * @param array $data
*/
	function mimer_advance_pay($data=array()){
        //导入类库
        //Vendor('kubao.mimerpay.Testtools');
        //实例化phprpc
        $testTools     =   new TestTools();
		
        /**************基本参数****************/
        $service = advance_pay;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $out_advance_no=$data['out_advance_no'];//请求订单号
		$ticket = $data['ticket'];//ticket
		$validate_code = $data['validate_code'];//短信验证码
		$user_ip = $data['user_ip'];//请求用户IP
		$extend_param = $data['extend_param'];//扩展参数

		
		/****************组织基本参数***********************/
        $param=array();
        $param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['out_advance_no']=$out_advance_no;
		$param['ticket']=$ticket;
		$param['validate_code']=$validate_code;
		$param['user_ip']=$user_ip;
		if($extend_param != null){
			$param['extend_param']=$extend_param;
		}

		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        dump($param);
        $testTools->write_log("小微商户支付短信验证接口请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(masRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
		return json_decode($result,true);
    }
	
	/**
   	* 小微商户支付短信重发
   	* mimer_pay_sms
  	* @param array $data
	*/
	function mimer_pay_sms($data=array()){
         //导入类库
        //Vendor('kubao.mimerpay.Testtools');
        //实例化phprpc
        $testTools     =   new TestTools();
		
        /**************基本参数****************/
        $service = pay_sms;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$ticket = $data['ticket'];//支付时返回的ticket
		$extend_param = $data['extend_param'];//扩展参数

		
		
		/****************组织基本参数用来签名********************************************************/
        $param=array();
        $param['service']=$service;
		$param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数用来签名**********************************************************/
		$param['ticket']=$ticket;
		if($extend_param != null){
			$param['extend_param']=$extend_param;
		}
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户支付短信重发请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(masRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
		return json_decode($result,true);
    }

    /**
   	 * 小微商户单笔支付订单查询
   	 * mimer_query_single_pay
   	 * @param array $data
	*/
	function mimer_query_single_pay($data=array()){
         //导入类库
        //Vendor('kubao.mimerpay.Testtools');
        //实例化phprpc
        $testTools     =   new TestTools();
        /**************基本参数****************/
        $service = query_single_pay;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
		
        /****************业务参数***********************/
		$out_trade_no = $data['out_trade_no'];//原商户交易订单号
		$extend_param = $data['extend_param'];//扩展参数
        
		/****************组织基本参数用来签名********************************************************/
        $param=array();
        $param['service']=$service;
		$param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数用来签名**********************************************************/
		$param['out_trade_no']=$out_trade_no;
		//$param['ticket']=$ticket;
		if($extend_param != null){
			$param['extend_param']=$extend_param;
		}
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        dump($param);
        $testTools->write_log("小微商户单笔支付订单查询接口发请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(masRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }

    /**
  	 * 小微商户单笔付款到银行卡
  	 * mimer_single_pay2bank
  	 * @param array $data
	*/
	function mimer_single_pay2bank($data=array()){
         //导入类库
        //Vendor('kubao.mimerpay.Testtools');
        //实例化phprpc
        $testTools     =   new TestTools();
		
        /**************基本参数****************/
        $service = single_pay2bank;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = notify_url_repayment;//异步通知地址
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$out_trade_no = $data['out_trade_no'];//请求订单号
		$identity_id = $data['identity_id'];//小微商户ID
		//银行卡号 需要RSA公钥加密处理
		$bank_account_num = $testTools -> Rsa_encrypt($data['bank_account_num'],$_input_charset);
		//手机号 需要RSA公钥加密处理
		$phone_no = $testTools -> Rsa_encrypt($data['phone_no'],$_input_charset);
		$bank_name = $data['bank_name'];
		$bank_code = $data['bank_code'];
		$province = $data['province'];
		$city = $data['city'];
		$bank_branch = $data['bank_branch'];
		$amount = $data['amount'];
		$split_amount = $data['split_amount'];
		$split_ratio = $data['split_ratio'];
		$split_type = $data['split_type'];
		$card_attribute = $data['card_attribute'];
		$card_type = $data['card_type'];
		$summary = $data['summary'];
		$account_type = $data['account_type'];
		$extend_param = $data['extend_param'];

		
		
		/****************组织基本参数用来签名********************************************************/
        $param=array();
        $param['service']=$service;
		$param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数用来签名**********************************************************/
		$param['out_trade_no']=$out_trade_no;
		$param['identity_id']=$identity_id;
		$param['bank_account_num']=$bank_account_num;
		$param['phone_no']=$phone_no;
		$param['bank_name']=$bank_name;
		$param['bank_code']=$bank_code;
		if($province != null){
			$param['province']=$province;
		}
		if($city != null){
			$param['city']=$city;
		}
		if($bank_branch != null){
			$param['bank_branch']=$bank_branch;
		}
		$param['amount']=$amount;
		if($split_amount != null){
			$param['split_amount']=$split_amount;
		}
		if($split_ratio != null){
			$param['split_ratio']=$split_ratio;
		}
		$param['split_type']=$split_type;
		$param['card_attribute']=$card_attribute;
		$param['card_type']=$card_type;
		if($summary != null){
			$param['summary']=$summary;
		}
		$param['account_type']=$account_type;
		if($extend_param != null){
			$param['extend_param']=$extend_param;
		}

		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户单笔付款到银行卡接口发请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(masRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }

    /**
  	 * 小微商户单笔代付查询
  	 * mimer_query_single_pay2bank
  	 * @param array $data
	*/
	function mimer_query_single_pay2bank($data=array()){
         //导入类库
       //Vendor('kubao.mimerpay.Testtools');
        //实例化phprpc
        $testTools     =   new TestTools();
		
        /**************基本参数****************/
        $service = query_single_pay2bank;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = notify_url;//异步通知地址
		$memo = $data['memo'];//备注
		
        /****************业务参数***********************/
		$out_trade_no = $data['out_trade_no'];//原交易订单号
		//$identity_id = $data['identity_id'];//小微商户标识
		$extend_param = $data['extend_param'];//扩展参数

		
		
		/****************组织基本参数用来签名********************************************************/
        $param=array();
        $param['service']=$service;
		$param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
		if($notify_url != null){
			$param['notify_url']=$notify_url;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数用来签名**********************************************************/
		$param['out_trade_no']=$out_trade_no;
		//$param['identity_id']=$identity_id;
		if($extend_param != null){
			$param['extend_param']=$extend_param;
		}
		
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("小微商户单笔代付查询接口发请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(masRequestUrl,$data,$_input_charset); 
		// 使用模拟表单提交进行数据提交
        $splitdata = json_decode($result,true);
        $sign_type = $splitdata ['sign_type'];//签名方式
		ksort($splitdata); // 对签名参数据排序
        if ($testTools->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
            $testTools->write_log("返回结果签名验证成功");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：成功";
        } else {
			$testTools->write_log("返回结果签名验证错误");
			//$result = "同步返回参数:\n".$result."\n\n返回结果签名验证：错误";
        }
        return json_decode($result,true);
    }

}
?>
