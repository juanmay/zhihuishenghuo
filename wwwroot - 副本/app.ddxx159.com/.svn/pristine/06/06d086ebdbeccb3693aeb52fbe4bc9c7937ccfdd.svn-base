<?php
namespace kubao\fastpay;
use kubao\fastpay\Testtools;
/**
 * Created by PhpStorm.
 * User: lzhangyongqinag
 * Date: 17/8/22
 * Time: 16:46
 * demo只是提供一个接口对接编写的思路，具体接口对接商户技术以自身项目的实际情况来进行接口代码的编写。
 */
@include_once(dirname ( __File__ ) . "/conf.php");
class Fastpay{
	
	
/**
   * 绑定银行卡
   * fastpay_binding_bank_card
   * @param array $data
*/
	function fastpay_binding_bank_card($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $request_no=$data['request_no'];//绑卡请求号
		$identity_id = $data['identity_id'];//用户标识
		$client_ip = $data['client_ip'];//请求者IP
		$bank_code = $data['bank_code'];//银行编码
		//银行卡号 需要RSA公钥加密处理
		$bank_account_no = $testTools -> Rsa_encrypt($data['bank_account_no'],$_input_charset) ;
		$card_type = $data['card_type'];//银行卡类型
		$card_attribute = $data['card_attribute'];//银行卡属性
		//银行卡开户名称 需要RSA公钥加密处理
		$account_name = $testTools -> Rsa_encrypt($data['account_name'],$_input_charset) ;
		$cert_type = $data['cert_type'];//证件类型
		//证件号码 需要RSA公钥加密处理
		$cert_no = $testTools -> Rsa_encrypt($data['cert_no'],$_input_charset);
		//银行预留手机号 需要RSA公钥加密处理
		$phone_no = $testTools -> Rsa_encrypt($data['phone_no'],$_input_charset);
		$province = $data['province'];//省
		$city = $data['city'];//市
		
		
		
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
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['request_no']=$request_no;
		$param['identity_id']=$identity_id;
		$param['client_ip']=$client_ip;
		$param['bank_code']=$bank_code;
		$param['bank_account_no']=$bank_account_no;
		$param['card_type']=$card_type;
		$param['card_attribute']=$card_attribute;
		$param['account_name']=$account_name;
		$param['cert_type']=$cert_type;
		$param['cert_no']=$cert_no;
		$param['phone_no']=$phone_no;

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
        $testTools->write_log("绑定银行卡请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
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
		return $result;
    }

	
/**
   * 绑卡下发短信
   * fastpay_binding_bank_card_advance
   * @param array $data
*/
	function fastpay_binding_bank_card_advance($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$ticket = $data['ticket'];//绑卡时返回的ticket
        $client_ip = $data['client_ip'];//请求者IP
		$valid_code = $data['valid_code'];//短信验证码
		
		
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
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['ticket']=$ticket;
		$param['client_ip']=$client_ip;
		$param['valid_code']=$valid_code;
		
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("绑卡下发短信请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
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
		return $result;
    }
	
	/**
   * 绑卡短信重发
   * fastpay_binding_bank_card_sms
   * @param array $data
*/
	function fastpay_binding_bank_card_sms($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $ticket = $data['ticket'];//绑卡时返回的ticket
        $client_ip = $data['client_ip'];//请求者IP
		
		
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
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['ticket']=$ticket;
		$param['client_ip']=$client_ip;
		
				
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("绑卡短信重发接口请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
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
		return $result;
    }
	
	/**
   * 解绑银行卡
   * fastpay_unbinding_bank_card
   * @param array $data
   */
	function fastpay_unbinding_bank_card($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $identity_id=$data['identity_id'];//商户系统的用户标识
		$client_ip = $data['client_ip'];//请求者IP
		$card_id = $data['card_id'];//卡ID
		
		
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
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['identity_id']=$identity_id;
		$param['client_ip']=$client_ip;
		$param['card_id']=$card_id;
		
				
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("解绑银行卡接口请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
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
		return $result;
    }
	
	/**
   * 已绑定银行卡查询
   * fastpay_query_bank_card
   * @param array $data
   */
	function fastpay_query_bank_card($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $identity_id=$data['identity_id'];//用户标识信息
		$client_ip = $data['client_ip'];//请求者IP
		
		
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
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['identity_id']=$identity_id;
		$param['client_ip']=$client_ip;
		
		
				
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("已绑定银行卡查询请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(mgsRequestUrl,$data,$_input_charset); 
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
		return $result;
    }
	
	/**
   * 卡要素支付
   * fastpay_bank_card_pay
   * @param array $data
*/
	function fastpay_bank_card_pay($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = bank_card_pay;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = fastpay_notify_url;//异步通知地址
        $encrypt_version = encrypt_version;//加密版本
        $sign_version = sign_version;//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $out_trade_no=$data['out_trade_no'];//商户订单号
		$summary = $data['summary'];//摘要
		$payer_id = $data['payer_id'];//付款用户标识
		$amount = $data['amount'];//金额
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
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['out_trade_no']=$out_trade_no;
		if($summary != null){
			$param['summary']=$summary;
		}
		$param['payer_id']=$payer_id;
		$param['amount']=$amount;
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
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("卡要素支付接口请求参数".json_encode($param));
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
   * 已绑银行卡支付
   * fastpay_bind_card_pay
   * @param array $data
*/
	function fastpay_bind_card_pay($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
        $out_trade_no=$data['out_trade_no'];//交易订单号
		$summary = $data['summary'];//摘要
		$payer_id = $data['payer_id'];//付款用户标识
		$amount = $data['amount'];//金额
		$card_id = $data['card_id'];//卡ID
		$payer_ip = $data['payer_ip'];//请求者IP

		
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
		if($encrypt_version != null){
			$param['encrypt_version']=$encrypt_version;
		}
		if($sign_version != null){
			$param['sign_version']=$sign_version;
		}
		if($memo != null){
			$param['memo']=$memo;
		}
		/****************组织业务参数***********************/
		$param['out_trade_no']=$out_trade_no;
		$param['summary']=$summary;
		$param['payer_id']=$payer_id;
		$param['amount']=$amount;
		$param['card_id']=$card_id;
		$param['payer_ip']=$payer_ip;

		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("已绑银行卡支付接口请求参数".json_encode($param));
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
		return $result;
    }
	
	/**
   * 支付短信重发
   * fastpay_pay_sms
   * @param array $data
*/
	function fastpay_pay_sms($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$ticket = $data['ticket'];//绑卡支付时返回的ticket
		$client_ip = $data['client_ip'];//请求者IP

		
		
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
		$param['client_ip']=$client_ip;
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("支付短信重发请求参数".json_encode($param));
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
		return $result;
    }

    /**
   * 确认支付
   * fastpay_advance_pay
   * @param array $data
*/
	function fastpay_advance_pay($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$out_advance_no = $data['out_advance_no'];//确认支付订单号
		$ticket = $data['ticket'];//支付时返回的ticket
		$user_ip = $data['user_ip'];//用户IP
		$validate_code = $data['validate_code'];//短信验证码

		
		
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
		$param['out_advance_no']=$out_advance_no;
		$param['ticket']=$ticket;
		$param['user_ip']=$user_ip;
		$param['validate_code']=$validate_code;
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("支付确认接口发请求参数".json_encode($param));
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
		return $result;
    }

    /**
   * 单笔支付查询接口
   * fastpay_query_single_pay
   * @param array $data
*/
	function fastpay_query_single_pay($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = query_single_pay;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = fastpay_notify_url;//异步通知地址
        $encrypt_version = encrypt_version;//加密版本
        $sign_version = sign_version;//签名版本
		$memo = $data['memo'];//备注
		
        /****************业务参数***********************/
		$out_trade_no = $data['out_trade_no'];//请求单号
		//$client_ip = $data['client_ip'];//请求IP

		
		
		/****************组织基本参数用来签名********************************************************/
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
		$param['out_trade_no']=$out_trade_no;
		//$param['client_ip']=$client_ip;

		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("单笔订单查询接口请求参数".json_encode($param));
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
   * 退款
   * fastpay_refund
   * @param array $data
*/
	function fastpay_refund($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$out_trade_no = $data['out_trade_no'];//请求订单号
		$orig_outer_trade_no = $data['orig_outer_trade_no'];//需要退款的原商户订单号
		$refund_amount = $data['refund_amount'];//退款金额
		$summary = $data['summary'];//摘要
		$user_ip = $data['user_ip'];//请求IP

		
		
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
		$param['out_trade_no']=$out_trade_no;
		$param['orig_outer_trade_no']=$orig_outer_trade_no;
		$param['refund_amount']=$refund_amount;
		if($summary != null){
			$param['summary']=$summary;
		}
		$param['user_ip']=$user_ip;

		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("退款接口发请求参数".json_encode($param));
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
   * 退款查询
   * fastpay_query_refund
   * @param array $data
*/
	function fastpay_query_refund($data=array()){
        $testTools = new TestTools();
		
        /**************基本参数****************/
        $service = $data['service'];//服务名称
        $version = $data['version'];//接口版本
        $request_time = $data['request_time'];//请求时间
        $partner_id = $data['partner_id'];//合作者身份ID
        $_input_charset = $data['_input_charset'];//参数编码字符集
        $sign_type = $data['sign_type'];//签名类型
		$notify_url = $data['notify_url'];//异步通知地址
		$encrypt_version = $data['encrypt_version'];//加密版本
		$sign_version = $data['sign_version'];//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		$out_trade_no = $data['out_trade_no'];//原交易订单号
		$identity_id = $data['identity_id'];//用户标识
		$identity_type = $data['identity_type'];//用户标识类型

		
		
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
		$param['out_trade_no']=$out_trade_no;
		$param['identity_id']=$identity_id;
		$param['identity_type']=$identity_type;
		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("退款查询接口发请求参数".json_encode($param));
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
