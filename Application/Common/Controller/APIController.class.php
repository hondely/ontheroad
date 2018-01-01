<?php 
namespace Common\Controller;

use Think\Controller;
use Org\Phpseclib;

/**
* API控制器 基础类
*/
class APIController extends Controller
{
    var  $result;

	public function _initialize()
	{
        $time=I('time');
        $token=I('token');
        $userId=I('id');

        if($time&&$token&&$userId)
        {
            date_default_timezone_set('PRC');
            $startTime = strtotime($time);//转为时间戳
            $currentTime=time();

            $diff=abs($currentTime-$startTime);
            $a=5*60;//5分钟以内
            if($diff>$a)
            {
                //返回 -4 表示验证失败
                $this->result['result']=-4;
                $this->result['val']="";
                $this->result['message']='时间戳出错！';
                echo getjson($this->result);
                exit();
            }

            $condition['id']=$userId;
            $condition['state']=1;
            $user=M('user')->field('privatekey')->where($condition)->find();
            if(!$user)
            {
                //返回 2 表示用户不存在或被禁用
                $this->result['result']=-2;
                $this->result['val']='';
                $this->result['message']='用户不存在或被禁用！';
                echo getjson($this->result);
                exit();
            }
            openssl_private_decrypt(base64_decode($token),$decryptedStr,$user['privatekey']);

            if($time!=$decryptedStr){

                //返回 -3 表示验证失败
                $this->result['result']=-3;
                $this->result['val']=$decryptedStr;
                $this->result['message']='验证失败！';
                echo getjson($this->result);
                exit();

            }
        }else
        {
            //返回 -1表示参数丢失
            $this->result['result']=-1;
            $this->result['val']='';
            $this->result['message']='参数丢失,请重试！';
            echo getjson($this->result);
            exit();
        }
    }
}
