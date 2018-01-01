<?php
namespace API\Controller;
use Think\Controller;
use Think\Log;

header("Content-Type: text/html;charset=utf-8");
class WxPayController extends Controller
{
    var  $result;
    public function _initialize(){
        $this->assign('controller', 'index');
    }

    public function index(){
        $myWxPay =new \Org\WxPay\MyWxPay();
        $openId=$myWxPay->getOpenid("base");
        if($openId==""){
			$url =getWxPayURL();
            Header("Location: $url");
            return;
        }

        //统一下单
        $input=$myWxPay->iniWxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
//        $input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis"));
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
//        $input->SetNotify_url("http://itiswpweb.com/wxplay/example/notify.php");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $jsApiParameters =$myWxPay->createUnifiedOrder($input);
        $this->jsApiParameters=$jsApiParameters;
        $this->display();
    }

    public function notify(){
        Log::record("WxPay notify start",Log::INFO);
        $myWxPay =new \Org\WxPay\MyWxPay();
        $notify=$myWxPay->iniPayNotifyCallBack(array($this, 'NotifyCallBack'));
        $notify->Handle(false);
        Log::record("WxPay notify end",Log::INFO);
    }

    public static  function NotifyCallBack($data){
        Log::record("WxPay notifyCallBack Data is :".json_encode($data),Log::INFO);
        $notify=M('notify');
        $addResult=$notify->add($data);
        if($addResult){
            return true;
        }else{
            return false;
        }
    }
}