<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;

class IndexController extends AdminController {

    //后台框架 主页面
    public function main(){
        $this->display();
    }

    //首页显示系统信息
    public function index(){
        $this->display();
    }

    //系统信息
    public function systemInfo(){
//        mysql_connect('127.0.0.1','root','WP20117238');
        //获取服务器系统信息
        $system_info = array(
            'dn_version' => DN_VERSION . ' RELEASE '. DN_RELEASE ,
            'server_domain' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
            'server_os' => PHP_OS,
            'web_server' => $_SERVER["SERVER_SOFTWARE"],
            'php_version' => PHP_VERSION,
            'mysql_version' => mysql_get_server_info(),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'max_execution_time' => ini_get('max_execution_time') . '秒',
            'safe_mode' => (boolean) ini_get('safe_mode') ?  '是' : '否',
            'zlib' => function_exists('gzclose') ?  '是' : '否',
            'curl' => function_exists("curl_getinfo") ? '是' : '否',
            'timezone' => function_exists("date_default_timezone_get") ? date_default_timezone_get() : L('no')
        );

        $this->assign('system_info', $system_info);
        $this->display();
    }


    //退出系统
    public function logout()
    {
        session('[destroy]');
        $LoginURL= "http://".$_SERVER["SERVER_NAME"]."/".__ROOT__."/index.php/Admin/Login/index";
        echo '<script>window.parent.location="'.$LoginURL.'";'.'</script>';

        //echo '<script>if(confirm("确定关闭窗口？")){   window.parent.location="'.$LoginURL.'";}else{ }</script>';

    }


    //修改密码
    public function editPassword(){
        if(IS_POST)
        {
            $oldPassword=I('oldPassword');
            $newPassword1=I('newPassword1');
            $newPassword2=I('newPassword2');

            $this->oldPassword=$oldPassword;
            $this->newPassword1=$newPassword1;
            $this->newPassword2=$newPassword2;

            if($newPassword1!=$newPassword2)
            {
                $this->error('两次密码不一致！');
            }

            $userId=$_SESSION['current_manger']['id'];
            $admin_user=M('manager')->where(array('id'=>$userId))->find();
            if(!$admin_user)
            {
                $this->error('请先登录',U('Login/index'));
            }

            if($admin_user['password']!=md5($oldPassword))
            {
                $this->error('旧的密码输入错误！');
            }

            $admin_user['password']=md5($newPassword1);
            $result=M('manager')->save($admin_user);
            if($result)
            {
                session('current_manger',null);
                $this->success('密码修改成功！','Login/index');
            }else
            {
                $this->error('密码修改失败，请重试！');
            }
        }else
        {
            $this->display();
        }
    }

    //富文本
    public function richText()
    {
        $this->display();
    }

    public function saveRichText()
    {
        if(IS_POST)
        {

            $content= I('content');
//            $htmlData = '';
//            if (!empty($content)){
//                if (get_magic_quotes_gpc()) {
//                    $htmlData = stripslashes($content);
//                } else {
//                    $htmlData = $content;
//                }
//            }
//            $data['content']=$htmlData;

            $data['content']=$content;
            $rich_text=M('rich_text');
            $result=$rich_text->add($data);


        }else
        {

        }
    }



    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'img/'; // 设置附件上传（子）目录
        $upload->autoSub=false;
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $error['error']=1;
            $error['message']=$upload->getError();
            exit(json_encode($error));
        }else{// 上传成功
            $url='';
//            foreach($info as $file){
//                //var_dump($info);
//                $url.='Uploads/img/'.$info['imgFile']['savename'];
//            }

           // $url=
            $data=array(
                    'url'=>$url,
                    'error'=>0
                );
            //var_dump($url);
            exit(json_encode($data));
        }



//        if($_FILES){
//            $message=uploadfile(array('jpg','jpeg','png','gif'),'./Uploads/','img/');
//            if($message['status']==0){
//                $error['error']=1;
//                $error['message']=$message['info'];
//                exit(json_encode($error));
//            }else{
//                foreach($message as $key=>$val){
//                    if($key==0){
//                        $img="Uploads/img/".$val['savename'];
//                    }else{
//                        $img.=",Uploads/img/".$val['savename'];
//                    }
//                }
//                $data=array(
//                    'url'=>$img,
//                    'error'=>0
//                );
//
//                exit(json_encode($data));
//            }
//        }else
//        {
//            $error['error']=1;
//            $error['message']='失败';
//            exit(json_encode($error));
//        }
    }

    public function  showRichText()
    {
        $rich_text=M('rich_text')->order('id DESC')->find();
        $content=$rich_text['content'];
        $this->content=htmlspecialchars_decode($content);
        //var_dump(htmlspecialchars_decode($content));

        $this->display();
    }
}