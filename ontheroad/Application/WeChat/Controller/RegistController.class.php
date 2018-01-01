<?php
namespace WeChat\Controller;
use Think\Controller;
use Org\SMS;
use Org\WxPay;

class RegistController extends Controller {

    var  $result;

    public function index(){
        $myWxPay =new \Org\WxPay\MyWxPay();
        $userInfo=$myWxPay->getUserInfo();

        if($userInfo['openid']==""){
            $url = U('Regist/index');
            Header("Location: $url");
        }
        session('userInfo',$userInfo);
        $this->display();
    }

    //发送验证码
    public function sendCode(){
        $mobile=I('number');
        $sms =new \Org\SMS\SMS();
        $sendResult=$sms->sendCode($mobile);
        if($sendResult['code']=='200') {
            $this->result['result']=1;
            $this->result['val']='';
            $this->result['message']='获取验证码成功！';
        }else {
            $this->result['result']=0;
            $this->result['val']='';
            $this->result['message']='获取验证码失败，请重试！';
        }
        echo getjson($this->result);
        exit();
    }

//    public function verifyCode($mobile,$code){
//        $sms =new \Org\SMS\SMS();
//        $result=$sms->verifyCode($mobile,$code);
//        var_dump($result);
//    }
//
//    public function sendSMS()
//    {
//        $sms =new \Org\SMS\SMS();
//        $mobile=array("15676167104");
//        $result= $sms->sendSMS($mobile,'');
//        var_dump($result);
//    }

    //注册
    public function regist(){
        $mobile=I('number');
        $code=I('code');
        if($mobile==""||$code==""){
            $this->result['result']=-2;
            $this->result['val']="";
            $this->result['message']='参数错误';
            echo getjson($this->result);
            exit();
        }

        $where['phone']=$mobile;
        $where['state']=1;
        $count=M('user')->where($where)->count();
        if($count>0){
            $this->result['result']=-1;
            $this->result['val']="";
            $this->result['message']='用户已注册';
            echo getjson($this->result);
            exit();
        }

        $sms =new \Org\SMS\SMS();
        $result=$sms->verifyCode($mobile,$code);
        if($result['code']=='200') {
            $userInfo=session('userInfo');
            $userInfo['phone']=$mobile;
            $userInfo['password']=md5($code);
            $userInfo['start_time']=date('Y-m-d H:i:s');
            $user=M('user');
            $addResult=$user->add($userInfo);
            if($addResult){
                $userInfo['code']=$code;
                session('userInfo',$userInfo);
                $this->result['result']=1;
                $this->result['val']="";
                $this->result['message']='注册成功';
                echo getjson($this->result);
                exit();
            }else{
                $this->result['result']=-3;
                $this->result['val']="";
                $this->result['message']='注册失败';
                echo getjson($this->result);
                exit();
            }
        }else {
            $this->result['result']=0;
            $this->result['val']=$result;
            $this->result['message']='验证码有误';
            echo getjson($this->result);
            exit();
        }
    }

    public function succeed(){
        $userInfo=session('userInfo');
        if($userInfo['code']==""){
            $url = U('Regist/index');
            Header("Location: $url");
        }
        $this->userInfo=$userInfo;
        $this->display();
    }
}