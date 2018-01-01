<?php
namespace WeChat\Controller;
use Think\Controller;
class PathController extends Controller {

    public function _initialize(){
//        parent::_initialize();
        $this->assign('controller', 'path');
    }

    public function index(){
        $this->display();
    }
}