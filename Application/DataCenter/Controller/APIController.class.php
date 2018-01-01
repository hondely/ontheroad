<?php
namespace DataCenter\Controller;
use Think\Controller;
class APIController extends Controller {

    public function upload()
    {
        header('Access-Control-Allow-Origin:*');
//        header('Access-Control-Allow-Credentials: true');
//        ini_set('file_uploads','ON');//Http上传文件的开关，默认为开
//        ini_set('max_input_time','180');//通过post,以及put接收数据时间，默认为60秒
//        ini_set('max_execution_time','360');//默认为30秒，脚本执行时间修改为180秒
//        ini_set('post_max_size','300M');//修改post变量由2m变成1om,要比upload_max_filesize大
//        ini_set('upload_max_filesize','150M');//文件上传最大
//        ini_set('memory_limit','450M');//内存使用问题，最好比post_max_size大1.5倍
        $type=I('type');
        if(!$type){
            $type='unknown';
        }
        $rootPath='Uploads/';
        if($_FILES){
            $config = array(
                'maxSize'    =>    500*1024*1024,//500M
                'rootPath'   =>    $rootPath,
                'savePath'   =>    '',
                'saveName'   =>    array('uniqid',''),
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'    =>    true,
                'subName'    =>    $type,
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $info   =   $upload->upload();
            $result['result']=1;
            if(!$info) {
                $result['result']=-1;
                $result['message']='Failed';
                $result['val']=$upload->getError();
                echo getjson($result);
            }else{// 上传成功 获取上传文件信息
                $info['rootPath']=__ROOT__.'/'.$rootPath;
                $result['result']=1;
                $result['message']='Succeed';
                $result['val']=$info;
                echo getjson($result);
            }
        }
    }
}