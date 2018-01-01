<?php
namespace WeChat\Controller;
use Think\Controller;
class AroundController extends Controller {

    public function _initialize(){
//        parent::_initialize();
        $this->assign('controller', 'around');
    }

    public function index(){
        $classId=I('class');
        $classList=M('around_class')->where('state=1')->select();
        if($classId){
            $aroundListWhere['class_id']=$classId;
        }else{
            $classId=-1;
        }
        $aroundListWhere['data_state']=1;
        $aroundList= M('around')->where($aroundListWhere)->order('id desc')->select();
        foreach($aroundList as &$value){
            $value['price']=number_format($value['price']/100, 2, '.', ",");
        }
        $this->classId=$classId;
        $this->classList=$classList;
        $this->aroundList=$aroundList;
        $this->display();
    }

    public function detail(){
        $id=I('id');
        $info=M('around')->where("id=$id")->find();
        $info['price']=number_format($info['price']/100, 2, '.', "");
        $info['detail']=htmlspecialchars_decode($info['detail']);
        $this->info=$info;
        $this->display();
    }
}