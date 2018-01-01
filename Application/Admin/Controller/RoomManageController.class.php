<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");
class RoomManageController extends AdminController {

    public function index(){
        $where['state']=1;
        $list=M('room_type')->where($where)->select();
        $this->list=$list;
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
            $roomType = M('room_type');
            $roomType->create();
            $ret=$roomType->save();
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
            $info=M('room_type')->where($where)->find();
            $info['detail']=htmlspecialchars_decode($info['detail']);
            $this->info=$info;
            $this->display();
        }
    }

    public function add(){
        if(IS_POST){
            $roomType = M('room_type');
            $roomType->create();
            $ret=$roomType->add();
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
            $this->display();
        }
    }

}