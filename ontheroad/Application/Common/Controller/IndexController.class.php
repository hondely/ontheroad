<?php
namespace Common\Controller;
use Think\Controller;
use Org\Util\Input;
use Think\UploadFile;
use Org\Util\Rbac;
use Org\Util\Category;
use Model\RelationModel;
use Common\Org\Util\Page;
/**
* 物业后台控制器
*/
class IndexController extends Controller
{
	public function _initialize()
	{
        $status['order_status']=50;
        $list=M('order')->where("order_status=20")->select();
        foreach($list as $val){
            $time=$val['add_time']+(15*60);
            if($time<time()){
                M('order')->where("order_id=".$val['order_id'])->save($status);
            }
        }
        $time=strtotime("-7day");
        M('history')->where("user_id=0 or history_time<$time")->delete();
	}
}
