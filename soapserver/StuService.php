<?php
/**
 * Created by PhpStorm.
 * User: qinchong
 * Date: 2016/7/28
 * Time: 16:55
 */
require('Service.php');
require('SoapDiscovery.php');
//动态生成wsdl文件
if (!file_exists('service.wsdl')) {
    $wsdl = new SoapDiscovery('Service', 'Service', 'http://my-pc/soapserver/StuService.php');
    $wsdlfile = $wsdl->getWSDL();
    file_put_contents(__DIR__ . '/../wsdl/service.wsdl', $wsdlfile);
}
$server = new SoapServer(__DIR__ . '/../wsdl/service.wsdl', array('soap_version' => SOAP_1_2));
$server->setClass("Service"); //注册Service类的所有方法
$server->handle(); //处理请求