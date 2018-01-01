<?php
namespace WeChat\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function _initialize(){
//        parent::_initialize();
        $this->assign('controller', 'order');
    }

    public function index(){
        $list=M('banner')->select();
        $this->bannerlist=$list;

        $roomTypeList=M('room_type')->where("state=1")->select();
        $this->roomTypeList=$roomTypeList;

        $this->display();
    }

    public function detail(){
        $id=I('id');
        $where['id']=$id;
        $info=M('room_type')->where($where)->find();
        $info['detail']=htmlspecialchars_decode($info['detail']);
        $this->info=$info;
        $this->display();
    }

}