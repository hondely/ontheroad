<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");
class UserController extends AdminController {

    public function index(){
        $where['state']=1;
        $list = page('user', 'start_time desc',10, false, $where);
        $this->list = $list['result'];
        $this->page = $list['page'];
        $this->display();
    }

    public function detail(){
        if(IS_POST){
            $id = I('post.id','');
            if($id==''){
                $result['result']=-1;
                $result['val']="";
                $result['message']='Failed.';
                echo getjson($result);
                return;
            }
            $info = M('document_for_multi');
            $info->create();
            $ret=$info->save();
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
        }else{
            $id=I('id');
            $where['id']=$id;
            $info=M('document_for_multi')->where($where)->find();
            $info['content']=htmlspecialchars_decode($info['content']);
            $typeName=I('typeName');
            $this->typeName=$typeName;
            $this->type=$info['type'];
            $this->info=$info;
            $this->display();
        }
    }
}