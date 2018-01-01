<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");
class DocumentCenterController extends AdminController {

    public function index(){
        $this->display();
    }

    public function editForSingle(){
        if(IS_POST){
            $id = I('post.id','');
            if($id==''){
                $result['result']=-1;
                $result['val']="";
                $result['message']='Failed.';
                echo getjson($result);
                return;
            }
            $roomType = M('document');
            $roomType->create();
            $roomType->time=date('Y-m-d H:i:s');
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
            $info=M('document')->where($where)->find();
            $info['content']=htmlspecialchars_decode($info['content']);
            $this->info=$info;
            $this->display();
        }
    }

    public function indexForMulti(){
        $type=I('type');
        $typeName=I('typeName');
        $where['type']=$type;
        $where['state']=1;
//        $list=M('document_for_multi')->where($where)->select();
        $list = page('document_for_multi', 'time desc',10, false, $where);
        $this->list = $list['result'];
//        var_dump($list);
//        die();
        $this->page = $list['page'];
        $this->type = $type;
        $this->typeName=$typeName;
        $this->display();
    }

    public function addForMulti(){
        if(IS_POST){
            $document = M('document_for_multi');
            $document->create();
            $document->time=date('Y-m-d H:i:s');
            $ret=$document->add();
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
            $type=I('type');
            $typeName=I('typeName');
            $this->type=$type;
            $this->typeName=$typeName;
            $this->display();
        }
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