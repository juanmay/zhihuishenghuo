<?php
namespace kubao\batchpay;
use kubao\batchpay\Testtools;
/**
 * Created by PhpStorm.
 * User: lzhangyongqinag
 * Date: 17/8/22
 * Time: 16:46
 * demo只是提供一个接口对接编写的思路，具体接口对接商户技术以自身项目的实际情况来进行接口代码的编写。
 */
@include_once(dirname ( __File__ ) . "/conf.php");
class Batchpay{
	
	
/**
   * 批量付款到银行卡
   * create_batch_pay2bank
   * @param array $data
*/
	function create_batch_pay2bank($data=array()){
        /**************基本参数****************/
        $service = create_service;//服务名称
        $version = version;//接口版本
        $request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
        $partner_id = partner_id;//合作者身份ID
        $_input_charset = _input_charset;//参数编码字符集
        $sign_type = sign_type;//签名类型
        $notify_url = batchpay_notify_url;//异步通知地址
        $encrypt_version = encrypt_version;//加密版本
        $sign_version = sign_version;//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		
        $batch_no=$data['batch_no'];//批次号
        $extend_param=$data['extend_param'];//批次号
        $testTools = new TestTools();
        $detail_list = $testTools->create_detail_list($data['detail_list'],$_input_charset);
        //交易明细列表 需要对敏感字段加密

		
		/****************组织基本参数***********************/
        $param=array();
        $param['service']=$service;
        $param['version']=$version;
        $param['request_time']=$request_time;
        $param['partner_id']=$partner_id;
        $param['_input_charset']=$_input_charset;
        $param['sign_type']=$sign_type;
        if($extend_param != null){
            $param['extend_param']=$extend_param;
		}
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
		$param['batch_no']=$batch_no;
		$param['extend_param']=$extend_param;
		$param['detail_list']=$detail_list;

		
        ksort($param);//对签名参数据排序
        //进行签名
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("批量付款到银行卡请求参数".json_encode($param));
        $data = $testTools->createcurl_data($param); 
		// 调用createcurl_data创建模拟表单需要的数据
        $result = $testTools->curlPost(masRequestUrl,$data,$_input_charset); 
        //echo "请求已经发送";
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
   * 出款查询
   * query_b2c_batch_fundout_order
   * @param array $data
*/
	function query_b2c_batch_fundout_order($data=array()){
		
        /**************基本参数****************/
	    $service = query_service;//服务名称
		$version = version;//接口版本
		$request_time = date('YmdHis');//请求时间yyyyMMddhhmmss
		$partner_id = partner_id;//合作者身份ID
		$_input_charset = _input_charset;//参数编码字符集
		$sign_type = sign_type;//签名类型
		$notify_url = batchpay_notify_url;//异步通知地址
		$encrypt_version = encrypt_version;//加密版本
		$sign_version = sign_version;//签名版本
		$memo = $data['memo'];//备注
        /****************业务参数***********************/
		
		$out_batch_no = $data['out_batch_no'];//批次号
		
		
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
		$param['out_batch_no']=$out_batch_no;
		
		
        ksort($param);//对签名参数据排序
        //进行签名
        
        $testTools = new TestTools();
        $sign=$testTools->getSignMsg($param,$sign_type,$_input_charset);
        //将签名结果存入请求数组中
        $param['sign']=$sign;
        $testTools->write_log("出款查询请求参数".json_encode($param));
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
