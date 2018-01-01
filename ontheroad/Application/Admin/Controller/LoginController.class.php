<?php 
namespace Admin\Controller;
use Think\Controller;

/**
* 登录
*/
header("Content-Type: text/html;charset=utf-8");
class LoginController extends Controller
{
	public function index()
	{
        $this->display();
	}

	public function checklogin()
	{
        $verify = I('verify');

        if(!check_verify($verify)) {
            $this->error('验证码输入有误.');
        }

        $admin_user = M('manager');
        $admin_user = $admin_user->where(array('name' => I('name')))->find();

        if (!$admin_user || $admin_user['password'] != md5(I('password'))) {
            $this->error('账号或者密码有误.');
        }

        session('current_manger',$admin_user);
        $logs['user']=$admin_user['id'];
        $logs['time']=date('Y-m-d H:i:s');
        $logs['operation']="登录";
        $logs['ip']=$this->getClientIp();
        M('manager_logging')->add($logs);
        $this->redirect('Index/main');
	}

	public function verify()
	{
		$verify = new \Think\Verify();
		$verify->fontSize = 18;
		$verify->imageL = "160";
		$verify->imageH = "45";
		$verify->entry(1);
	}

    private  function getClientIp() {
        $unknown = 'unknown';
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        /**
         * 处理多层代理的情况
         * 或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown;
         */
        if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip));
        return $ip;
    }

}