<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;
class AroundController extends AdminController {

    var $limitCount=4;
    public function index(){
        $classId=I('class');
        $classList=M('around_class')->where('state=1')->select();

        if($classId){
            $aroundListWhere['class_id']=$classId;
        }else{
            $classId=$classList[0]['id'];
            $aroundListWhere['class_id']=$classList[0]['id'];
        }
        $aroundListWhere['data_state']=1;
        $aroundList= page('around', 'id desc', $this->limitCount, false, $aroundListWhere);
        foreach($aroundList['result'] as &$value){
            $value['price']=number_format($value['price']/100, 2, '.', ",");
        }
        $this->aroundList = $aroundList['result'];
        $this->page = $aroundList['page'];
        $this->selectClass=$classId;
        $this->classList=$classList;
        $this->display();
    }

    public function detail(){
        if(IS_POST){
            $roomType = M('around');
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
            $around = M('around')->where("id=$id")->find();
            $around['price']=number_format($around['price']/100, 2, '.', "");
            $this->around=$around;
            $this->display();
        }
    }

    public function add(){
        if(IS_POST){
            $roomType = M('around');
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
            $this->classId=I('id');
            $this->display();
        }
    }

    //类别管理 start
    public function classList(){
        $list=M('around_class')->where('state=1')->select();
        $this->list=$list;
        $this->display();
    }

    public function renameClass(){
        $id=I('id');
        $name=I('name');
        if($name==""){
            $this->error('操作失败!');
        }
        $data['id']=$id;
        $around_class = M("around_class");
        $around_class->name =$name;
        $result=$around_class->where($data)->save();
        if($result){
            $this->success('操作成功！');
        }else{
            $this->error('操作失败!');
        }
    }

    public function addClass(){
        $name=I('name');
        if($name==""){
            $this->error('操作失败!');
        }
        $Model = M('around_class');
        $Model->name =$name;
        $result=$Model->add();
        if($result){
            $this->success('操作成功！');
        }else{
            $this->error('操作失败!');
        }
    }

    public function deleteClass(){
        $id=I('id');
        $data['id']=$id;
        $around_class = M("around_class");
        $around_class->state =-1;
        $result=$around_class->where($data)->save();
        if($result){
            $this->success('操作成功！');
        }else{
            $this->error('操作失败!');
        }
    }
    //类别管理 end

}