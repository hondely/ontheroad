<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

//include_once "../lib/WxPay.Api.php";
//include_once '../lib/WxPay.Notify.php';
//include_once 'log.php';

include("../lib/WxPay.Notify.php");

//初始化日志
$logHandler= new \CLogFileHandler();
$log = \Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("order query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}

    var $handleDataProcess;
    public function setHandleDataProcess($handleDataProcess){
        $this->handleDataProcess=$handleDataProcess;
    }

	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
        $handDataProcessRet=call_user_func($this->handleDataProcess,$data);
		return $handDataProcessRet;
	}
}

//Log::DEBUG("begin notify");
//$notify = new PayNotifyCallBack();
//$notify->Handle(false);
