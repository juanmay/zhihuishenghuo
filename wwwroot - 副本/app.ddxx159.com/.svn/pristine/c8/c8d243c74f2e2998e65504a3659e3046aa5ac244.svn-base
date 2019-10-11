<?php

// +------------------------------------------------------------------
// | 信用卡代还管理系统
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

namespace service;

use think\Exception;
use think\facade\Log;

/**
 * Soap服务对象
 * Class SoapService
 * @package service
 */
class SoapService
{

    /**
     * SOAP实例对象
     * @var \SoapClient
     */
    protected $soap;

    /**
     * SoapService constructor.
     * @param string|null $wsdl WSDL连接参数
     * @param array $params Params连接参数
     * @throws \think\Exception
     */
    public function __construct($wsdl, $params)
    {
        set_time_limit(3600);
        if (!extension_loaded('soap')) {
            throw new Exception('Not support soap.');
        }
        $this->soap = new \SoapClient($wsdl, $params);
    }

    /**
     * @param string $name SOAP调用方法名
     * @param array|string $arguments SOAP调用参数
     * @return array|string|bool
     * @throws \think\Exception
     */
    public function __call($name, $arguments)
    {
        try {
            return $this->soap->__soapCall($name, $arguments);
        } catch (\Exception $e) {
            Log::error("Soap Error. Call {$name} Method --- " . $e->getMessage());
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

}
