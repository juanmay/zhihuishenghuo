<?php
/**
 * Created by PhpStorm.
 * User: zhangyongqiang
 * Date: 17/8/22
 * Time: 16:46
 */
class Kbpay {
	

	/**
	 * 接口版本，人品一码通接口文档参数
	 */
	protected $version = "1.0";//接口版本
	/**
	 * 商户号，由人品一码通提供
	 */
	protected $partner_id = "200006503094";//接口商户号
	/**
	 * 商户接口字符集，人品一码通接口文档参数
	 */
	protected $_input_charset = "utf-8";//接口字符集编码
	/**
	 * 商户签名类型，人品一码通接口文档参数
	 */
	protected $sign_type = "RSA";//签名类型
	/**
	 * 商户签名私钥，由商户自己生成
	 */
	protected $rsa_sign_private_key = __DIR__."/kbkey/Privatekey.pem";//签名私钥
	/**
	 * 商户验证签名公钥，由酷宝支付提供
	 */
	protected $rsa_sign_public_key = __DIR__."/kbkey/Publickey_Verify.pem";//验证签名公钥
	/**
	 * 人品一码通特殊参数加密，公钥，由酷宝支付提供
	 */
	protected $rsa_public_key = __DIR__."/kbkey/Publickey_Encrypt.pem";//加密公钥
	/**
	 *异步回调地址，商户自定义自己系统的回调地址
	 */
	protected $notify_url = "http://10.1.210.174:18080/mocknotify/backurl";
	/**
	 * 网关地址，
	 */
	protected $masRequestUrl = "http://test.gate.yacolpay.com/mas/gateway.do";//网关地址
	/**
	*
	**/
	protected $debug_status = true;//true 开启日志记录  false 关闭日志记录

	/**
	 * getSignMsg 计算签名
	 * @param array $pay_params
	 *        	计算签名数据
	 * @param string $sign_type
	 *        	签名类型
	 * @return string $signMsg 返回密文
	 */
	function getSignMsg($pay_params = array(), $sign_type,$_input_charset) {
		$params_str = "";
		$signMsg = "";

		foreach ( $pay_params as $key => $val ) {
			if ($key != "sign" && $key != "sign_type" && $key != "sign_version" && isset ( $val ) && @$val != "") {
				$params_str .= $key . "=" . $val . "&";
			}
		}
		$params_str = substr ( $params_str, 0, - 1 );
		$params_str=mb_convert_encoding($params_str,$_input_charset);
		switch (@$sign_type) {
			case 'RSA' :
				self::write_log("RSA参与签名运算数据".$params_str);
				$priv_key = file_get_contents ( $this->rsa_sign_private_key );
				$pkeyid = openssl_pkey_get_private ( $priv_key );
				self::write_log("RSApkeyid:".$pkeyid);
				openssl_sign ( $params_str, $signMsg, $pkeyid, OPENSSL_ALGO_SHA1 );
				openssl_free_key ( $pkeyid );
				$signMsg = base64_encode ( $signMsg );
				self::write_log("RSA计算得出签名值：".$signMsg);
				break;
			case 'MD5' :
			default :
//				$params_str = $params_str . @rpymt_md5_key;
//				self::write_log("MD5参与签名运算数据".$params_str);
//				$signMsg = strtolower ( md5 ( $params_str ) );
//				self::write_log("MD5计算得出签名值：".$signMsg);
				break;
		}
		return $signMsg;
	}
	/**
	 * 通过公钥进行rsa加密
	 *
	 * @param type $name
	 *        	Descriptiondata
	 *        	$data 进行rsa公钥加密的数必传
	 *        	$pu_key 加密用的公钥 必传
	 *          $_input_charset 字符集编码
	 * @return 加密好的密文
	 */
	function Rsa_encrypt($data, $_input_charset) {
		$encrypted = "";
		$data=mb_convert_encoding($data,$_input_charset);
		$cert = file_get_contents ($this->rsa_public_key );
		$pu_key = openssl_pkey_get_public ( $cert ); // 这个函数可用来判断公钥是否是可用
		openssl_public_encrypt ( $data, $encrypted, $pu_key ); // 公钥加密
		$encrypted = base64_encode ( $encrypted ); // 进行编码
		return $encrypted;
	}
	/**
	 * [createcurl_data 拼接模拟提交数据]
	 *
	 * @param array $pay_params
	 * @return string url格式字符
	 */
	function createcurl_data($pay_params = array()) {
		$params_str = "";
		foreach ( $pay_params as $key => $val ) {
			if (isset ( $val ) && ! is_null ( $val ) && @$val != "") {
				$params_str .= "&" . $key . "=" . urlencode ( urlencode ( trim ( $val ) ) );
			}
		}
		if ($params_str) {
			$params_str = substr ( $params_str, 1 );
		}
		return $params_str;
	}
	/**
	 * checkSignMsg 回调签名验证
	 *
	 * @param array $pay_params 参与签名验证的数据
	 * @param string $sign_type  签名类型
	 * @param $_input_charset   签名字符集编码
	 * @return boolean  签名结果
	 */
	function checkSignMsg($pay_params = array(), $sign_type,$_input_charset) {
		$params_str = "";
		$signMsg = "";
		$return = false;
		foreach ( $pay_params as $key => $val ) {
			if ($key != "sign" && $key != "sign_type" && $key != "sign_version" && ! is_null ( $val ) && @$val != "") {
				$params_str .= "&" . $key . "=" . $val;
			}
		}
		if ($params_str) {
			$params_str = substr ( $params_str, 1 );
		}
		//验证签名demo需要支持多字符集所以此处对字符编码进行转码处理,正常商户不存在多字符集问题
		$params_str=mb_convert_encoding($params_str,$_input_charset,"UTF-8");
		$this->write_log("本地验证签名数据".$params_str);
		$this->write_log("本地获取签名".$pay_params ['sign']);
		switch (@$sign_type) {
			case 'RSA' :
				$cert = file_get_contents ( $this->rsa_sign_public_key );
				$pubkeyid = openssl_pkey_get_public ( $cert );
				$ok = openssl_verify ( $params_str, base64_decode ($pay_params ['sign']), $cert, OPENSSL_ALGO_SHA1 );
				$return = $ok == 1 ? true : false;
				openssl_free_key ( $pubkeyid );
				break;
			default :
				break;
		}
		return $return;
	}
	/**
	 * 文件摘要算法
	 */
	function md5_file($filename) {
		return md5_file ( $filename );
	}
	/**
	 * sftp上传企业资质
	 * sftp upload
	 * @param $file 上传文件路径
	 * @return false 失败   true 成功
	 */
	function sftp_upload($file,$filename) {
		$strServer = sftp_address;
		$strServerPort = sftp_port;
		$strServerUsername = sftp_Username;
		$strServerprivatekey = sftp_privatekey;
		$strServerpublickey = sftp_publickey;
		$resConnection = ssh2_connect ( $strServer, $strServerPort );
		if (ssh2_auth_pubkey_file ( $resConnection, $strServerUsername, $strServerpublickey, $strServerprivatekey )) 
		{
			$resSFTP = ssh2_sftp ( $resConnection );
			file_put_contents ( "ssh2.sftp://{$resSFTP}/upload/".$filename, $file);
			if (! copy ( $file, "ssh2.sftp://{$resSFTP}/upload/$filename" )) {
				return false;
			}
			return true;
		}
		return false;
	}
	/**
	 * [curlPost 模拟表单提交]
	 *
	 * @param string $url  请求网关地址
	 * @param string $data  请求数据key=value格式
	 * @param $_input_charset 字符集编码
	 * @return string $data
	 */
	function curlPost($url, $data,$_input_charset) {
		self::write_log("请求网关地址".$url);
		self::write_log("请求网关数据".$data);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		$data = curl_exec ( $ch );
		curl_close ( $ch );
		self::write_log("请求网关返回内容:".mb_convert_encoding(urldecode($data),"UTF-8"));
		//由于json转数组使用了json_decode所以需要将非UTF-8的内容强转为UTF-8字符集
		//return mb_convert_encoding(urldecode($data),"UTF-8");
		$data = urldecode($data);
		return $data;
	}
	/**
	 * 日志记录
	 *
	 * @param unknown $msg
	 * @return boolean
	 */
	function write_log($msg) {
		date_default_timezone_set("PRC");
		if($this->debug_status){
		$result=error_log( date ( "[YmdHis]" ) ."\t" . $msg . "\r\n", 3, '../'. date ( "Ymd" ) . '.log' );
			return $result;
		}else
		{
			return false;
		}

	}

	/**
	 * 获取IP范例，具体以实现代码已自身网络架构来进行编写
	 * @return string
	 */
	function get_ip(){
		if (isset($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], "unknown"))
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], "unknown"))
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if (isset($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
			$ip = $_SERVER['REMOTE_ADDR'];
		else if (isset($_SERVER['REMOTE_ADDR']) && isset($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
			$ip = $_SERVER['REMOTE_ADDR'];
		else $ip = "";
		return ($ip);
	}

	/**
	 * 对交易信息中的敏感字段进行加密
	 * @param String $ostr 原交易列表
	 * @param String $_input_charset 字符集
	 * @return String
	 */
	function create_detail_list($ostr,$_input_charset){
		$encdetail = "";
		$split_deal = explode("|", $ostr);
		for ($i=0; $i < count($split_deal); $i++) { 
			$detail = explode("^", $split_deal[$i]);
			for ($j=0; $j < count($detail) ; $j++) { 
				if($j == 1 || $j == 2 || $j == 3){
					if($detail[$j] != "" && $detail[$j] != null){
						$end = self::Rsa_encrypt($detail[$j],$_input_charset);
						$encdetail = $encdetail."^".$end;
					}
				}
				else if($j == 0){
					$encdetail = $encdetail."|".$detail[$j];
				}
				else{
					$encdetail = $encdetail."^".$detail[$j];
				}
			}
		}
		$encdetail = substr($encdetail, 1);
		return ($encdetail);
	}
	
}
?>