<?php 
namespace Common\Controller;
use Org\Util\Rbac;
use Org\Util\Category;
use Think\Controller;
use Common\Org\Util\Page;
/**
* 管理后台控制器
*/
class AdminController extends Controller
{
	public function _initialize()
	{
        $this->htmlTitle="追梦青年";
        if(!isset($_SESSION['current_manger'])||empty($_SESSION['current_manger'])){
            $LoginURL= "http://".$_SERVER["SERVER_NAME"]."/".__ROOT__."/index.php/Admin/Login/index";
            echo '<script>alert("请先登录！");window.parent.location="'.$LoginURL.'";</script>';
            die();
        }

        $id=$_SESSION['current_manger']['id'];
        $admin_user = M('manager')->where(array('id' => $id))->find();
        if (!$admin_user ) {
            $LoginURL= "http://".$_SERVER["SERVER_NAME"]."/".__ROOT__."/index.php/Admin/Login/index";
            echo '<script>alert("请先登录！");window.parent.location="'.$LoginURL.'";</script>';
            die();
        }
	}
}
