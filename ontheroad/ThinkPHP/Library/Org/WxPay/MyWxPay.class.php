<?php
namespace Org\WxPay;

// +----------------------------------------------------------------------
//微信支付
// +----------------------------------------------------------------------

ini_set('date.timezone','Asia/Shanghai');
include("/WxpayAPIV3/lib/WxPay.Api.php");
include("/WxpayAPIV3/example/WxPay.JsApiPay.php");
include("/WxpayAPIV3/example/log.php");

include("/WxpayAPIV3/lib/WxPay.Notify.php");
include("/WxpayAPIV3/example/notify.php");

//初始化日志
//$logHandler= new \CLogFileHandler("../logs/".date('Y-m-d').'.log');
//$log = \Log::Init($logHandler, 15);

class MyWxPay
{
    var  $openId = '';

    //获取用户的openId
    public function getOpenid($type){
        $tools = new \JsApiPay();
        $this->openId = $tools->GetOpenid($type);
        return $this->openId;
    }

    //获取用户信息
    public function getUserInfo(){
        $tools = new \JsApiPay();
        $userInfo=$tools->GetUserInfo();
        return $userInfo;
    }

    //初始化统一下单对象
    public function iniWxPayUnifiedOrder(){
        $input = new \WxPayUnifiedOrder();
		$input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis"));
        return $input;
    }

    //统一下单
    public function createUnifiedOrder($input){
        $tools = new \JsApiPay();
        $order = \WxPayApi::unifiedOrder($input);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        return $jsApiParameters;
    }

    //通知
    public  function iniPayNotifyCallBack($dataProcess){
        $notify = new \PayNotifyCallBack();
        $notify->setHandleDataProcess($dataProcess);
        return $notify;
    }

}
