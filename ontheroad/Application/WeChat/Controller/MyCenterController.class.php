<?php
namespace WeChat\Controller;
use Think\Controller;


class MyCenterController extends Controller {

    public function _initialize(){
        $this->assign('controller', 'myCenter');
    }

    public function index(){
//        $userInfo=session('userInfo');
//        if(!$userInfo['isLogin']){
//            $myWxPay =new \Org\WxPay\MyWxPay();
//            $openId=$myWxPay->getOpenid("base");
//            $where['openid']=$openId;
//            $where['state']=1;
//            $userInfo=M('user')->where($where)->find();
//            $userInfo['isLogin']=true;
//            session('userInfo',$userInfo);
//        }
//        $this->userInfo=$userInfo;
        $this->display();
    }

    public function indexForSingle(){
        $id=I('id');
        $where['id']=$id;
        $info=M('document')->where($where)->find();
        $info['content']=htmlspecialchars_decode($info['content']);
        $this->info=$info;
        $this->display();
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

    public function detailForMulti(){
        $id=I('id');
        $where['id']=$id;
        $info=M('document_for_multi')->where($where)->find();
        $info['hot_degress']=$info['hot_degress']+1;
        M('document_for_multi')->save($info);
        $info['content']=htmlspecialchars_decode($info['content']);
        $typeName=I('typeName');
        $this->typeName=$typeName;
        $this->type=$info['type'];
        $this->info=$info;
        $this->display();
    }

}