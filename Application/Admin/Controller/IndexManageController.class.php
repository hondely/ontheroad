<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");
class IndexManageController extends AdminController {

    //首页banner管理
    public function banner(){
        $list=M('banner')->select();
        $this->list=$list;
        $this->display();
    }

    public function setBanner(){
        $id = I('post.id','');
        if($id==''){
            $result['result']=-1;
            $result['val']="";
            $result['message']='Failed.';
            echo getjson($result);
            return;
        }

        $banner = M('banner');
        $banner->create();
        $ret=$banner->save();
        if($ret){
            $result['result']=1;
            $result['val']="";
            $result['message']='Succeed.';
            echo getjson($result);
        }else{
            $result['result']=-1;
            $result['val']="";
            $result['message']='Failed';
            echo getjson($result);
        }
    }
}