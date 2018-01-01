<?php
namespace Org\SMS;

// +----------------------------------------------------------------------
//SMS 短信类
// +----------------------------------------------------------------------
include('ServerAPI.php');

class SMS
{
    var  $AppKey = 'e5b6e8486617f108934cd5662f8541bf';
    var $AppSecret = '6774eef25364';

//    var  $AppKey = '2a5bf5a03216997216183b53003b1d72';
//    var $AppSecret = '94453462728a';
//    var $templateid=15074;

    public function sendCode($mobile)
    {
        $p = new \ServerAPI($this->AppKey,$this->AppSecret,'curl');//php curl库
        return  $p->sendSmsCode($mobile,$deviceId='');
    }


    public  function verifyCode($mobile,$code)
    {
        $p = new \ServerAPI($this->AppKey,$this->AppSecret,'curl');//php curl库
        return  $p->verifycode($mobile,$code);
    }

    public function  sendSMS($mobiles=array(),$params=''){
        $p = new \ServerAPI($this->AppKey,$this->AppSecret,'curl');//php curl库
        return  $p->sendSMSTemplate($this->templateid,$mobiles,$params='');
    }

}
