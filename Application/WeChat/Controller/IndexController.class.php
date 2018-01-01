<?php
namespace WeChat\Controller;
use Think\Controller;
use Common\Controller\WeChatController;

class IndexController extends WeChatController {

    public function _initialize(){
        parent::_initialize();
        $this->assign('controller', 'index');
    }

    public function index(){
        $this->option=$this->$option;

        $list=M('banner')->select();
        $this->bannerlist=$list;

        $this->display();
    }

}