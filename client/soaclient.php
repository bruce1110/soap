<?php
/**
 * Created by PhpStorm.
 * User: qinchong
 * Date: 2016/7/28
 * Time: 11:42
 */
ini_set('soap.wsdl_cache_enable', '0');
$soap = new SoapClient('http://my-pc/soapserver/StuService.php?WSDL');
echo $soap->__soapCall('tea', array(1001)) . "\n";