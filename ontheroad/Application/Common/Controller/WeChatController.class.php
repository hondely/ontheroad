<?php 
namespace Common\Controller;
use Think\Controller;
/**
* 管理后台控制器
*/
class WeChatController extends Controller{
    public function _initialize(){
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
//        if ((strpos($agent, 'micromessenger') !== false)&&(strpos($agent, 'mobile') !== false)) {
//
//        } else {
//            echo "请在微信中打开!";
//            exit();
//        }
    }
}
