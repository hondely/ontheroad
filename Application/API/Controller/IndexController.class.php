<?php
namespace API\Controller;
use Think\Controller;
use Think\Log;

/**
 * 基础控制器
 */
header("Content-Type: text/html;charset=utf-8");
class IndexController extends Controller
{
    var  $result;

    public function  enter($uid,$p,$cl)
    {
        Log::record('测试日志信息，这是警告级别','WARN');
        $userId=I('uid');
        $password=I('p');
        $column=I('cl');

        $cookie_file = tempnam('./temp','cookie');
        $login_url  = 'http://oaadsso.gzloco.csr.com/names.nsf?Login';
        //$post_fields = 'Username=012100010118&Password=GJGSad8130';
        $post_fields = 'Username='.$userId.'&Password='.$password;
        $ch = curl_init($login_url);

        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        $content=curl_exec($ch);
        preg_match('/Set-Cookie:(.*);/iU',$content,$str);
        curl_close($ch);
        if((isset($str[1])))
        {
            $cookie = $str[1];
            session('ck',$cookie);
            $this->redirect('Index/'.$column,array('ct'=>20,'s'=>1,'uid'=>$userId));
        }else
        {
            $this->result['result']=0;
            $this->result['val']='';
            $this->result['message']='失败！';
            echo json_encode($this->result);
            exit();
        }
    }

    //已阅文件
    public function  readedList1()
    {
        header("Content-Type: text/html;charset=GB2312");
        $myfile = fopen("table.txt", "r") or die("Unable to open file!");
        $table=fread($myfile,filesize("table.txt"));
        $this->table=$table;
        fclose($myfile);
        //$this->display();

        //返回 1 表示登录成功
        $this->result['result']=1;
        $this->result['val']=$table;
        $this->result['message']='成功！';
        echo json_encode($this->result);
        exit();
    }

    public function detail($url)
    {
        $cookie_file = tempnam('./temp','cookie');
        $login_url  = 'http://oaadsso.gzloco.csr.com/names.nsf?Login';
        $post_fields = 'Username=012100010295&Password=GJGSad4321';
        //$post_fields = 'Username=012100010118&Password=GJGSad8130';

        $ch = curl_init($login_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        curl_exec($ch);
        curl_close($ch);

        //$url='http://oa.gzloco.csr.com'.$url;
        $url='http://oa.gzloco.csr.com/todo/012100010295.nsf/ebe3591c8282773f482579bb002407d2/8a8ef708f688646148257f40004a1575?OpenDocument';
        //$url='http://oa.gzloco.csr.com/todo/012100010118.nsf/ebe3591c8282773f482579bb002407d2/eede9046b97ea4fd48257cc4002eae0d?OpenDocument&view=vwreaddoc&start=1&count=20&readdoc=true';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        $contents = curl_exec($ch);

        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $contents);
        fclose($myfile);

//        header("Content-Type: text/html;charset=GB2312");
//        echo "<a href='http://oa.gzloco.csr.com/gjapp/dep22266/swgl_22266.nsf/0/BFCC8000F3B1158548257F3A00264361/\$file/130942929964531250J.pdf'>wendnag  </a>";
//        echo $contents;

        curl_close($ch);

        if(!$contents)
        {
            //返回 1 表示登录成功
            $this->result['result']=0;
            $this->result['val']="";
            $this->result['message']='失败！';
            echo json_encode($this->result);
            exit();
        }
        echo $contents;
//        file_put_contents("detail.txt",$contents."\r\n",FILE_APPEND);

        //返回 1 表示登录成功
        $this->result['result']=1;
        $this->result['val']=$contents;
        $this->result['message']='成功！';
        echo json_encode($this->result);
        exit();
    }


    //已阅文件
    public function  readedList()
    {
        //header("Content-Type: text/html;charset=GB2312");

        $count=I('ct');
        $start=I('s');
        $userId=I('uid');

        $url='http://oa.gzloco.csr.com/todo/'.$userId.'.nsf/myview?openform&view=vwreaddoc&count='.$count.'&start='.$start;
        //$url='http://oa.gzloco.csr.com/todo/012100010118.nsf/myview?openform&view=vwreaddoc&count=20&start=1';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE,session('ck'));

        $contents = curl_exec($ch);

        if(!$contents)
        {
            $this->result['result']=0;
            $this->result['val']='';
            $this->result['message']='失败！';
            echo json_encode($this->result);
            exit();
        }

        //echo $contents;
        //file_put_contents("contents.txt",$contents."\r\n",FILE_APPEND);

        $start=stripos($contents,'table border="0" cellpadding="2" cellspacing="0"');
        $start=stripos($contents,'tr valign="top"',$start);
        $end=stripos($contents,'</textarea>');

        $length=$end-$start;
        $table=substr($contents,$start,$length);
        if(!$table)
        {
            $this->result['result']=0;
            $this->result['val']='';
            $this->result['message']='失败！';
            echo json_encode($this->result);
            exit();
        }

        $table= htmlspecialchars_decode($table);
        str_replace('&lt;','<',$table);
        str_replace('&gt;','>',$table);
        $table= "<table><tbody><".$table;
        $table=gbk2utf8($table);

        $resultVal['table']=$table;
        $resultVal['ck']=session('ck');

        file_put_contents("table.txt",$table."\r\n",FILE_APPEND);

        //返回 1 表示登录成功
        $this->result['result']=1;
        $this->result['val']=$resultVal;
        $this->result['message']='成功！';
        echo json_encode($this->result);
        exit();

        //$this->table=$table;

        //$this->display();
        //file_put_contents("table.txt",$table."\r\n",FILE_APPEND);
        //$this->display();

//        $start=stripos($table,'<tr valign="top">',$start);
//        $end=stripos($table,'</tr>',$start);
//        $tr=substr($table,$start,$end-$start);
//        file_put_contents("newfile.txt",$tr."\r\n",FILE_APPEND);


//        while($start)
//        {
//            $start=stripos($table,'<tr valign="top">',$start);
//            $end=stripos($table,'</tr>',$start);
//            $tr=substr($table,$start,$end-$start);
//            file_put_contents("newfile.txt",$tr."\r\n",FILE_APPEND);
////            echo $tr;
////            $pres=getPos($tr,'<td>');
////            print_r($pres);
////            //print_r(getPos($tr,'td'));
//            $table=substr($table,$end+5);
//            file_put_contents("newfile1.txt",$table."\r\n",FILE_APPEND);
////            echo $table;
//        }

//
//        Vendor('simpleHtmlDom.simple_html_dom');
//        // 新建一个Dom实例
//        $html = new \simple_html_dom();
//
//        // 从字符串中加载
//        $html->load($table);
//
//        //信息数组集合
//        $oneList=$html->nodes[2]->children;
//
//        //单条信息
//        var_dump($oneList[0]->children[3]->children);
//        $html->clear();
     }



    //待办列表
    public  function  todoList()
    {
        $count=I('ct');
        $start=I('s');
        $userId=I('uid');


        $url='http://oa.gzloco.csr.com/gjapp/dep22266/tzgl_22266.nsf/0/0FBE9B33D8050EF248257CA0001256AE?opendocument';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch, CURLOPT_COOKIE, session('ck'));
        echo session('ck');
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER ,false);//不要问为什么， 这么设置才能使用
        curl_setopt($ch,CURLOPT_CAPATH ,dirname(__FILE__)."/");
        curl_setopt($ch,CURLOPT_CAINFO ,"out.pem");


        $contents = curl_exec($ch);



        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $contents);
        fclose($myfile);

        header("Content-Type: text/html;charset=GB2312");
        echo "<a href='http://oa.gzloco.csr.com/gjapp/dep22266/swgl_22266.nsf/0/BFCC8000F3B1158548257F3A00264361/\$file/130942929964531250J.pdf'>wendnag  </a>";
        echo $contents;

        curl_close($ch);
//        $userId= My_AES_Decrypt($userId);
    }


    //待阅列表
    public function  toreadList()
    {
           echo "23";
    }


    //用户登录
    public function  login()
    {
        $name=I('name');
        $password=I('password');
        $verifyCode=I('verifyCode');

        if($name&&$password&&$verifyCode)
        {
            if(!check_verify($verifyCode))
            {
                //返回 3 表示验证码输入有误
                $this->result['result']=3;
                $this->result['val']='';
                $this->result['message']='验证码输入有误！';
                echo getjson($this->result);
                exit();
            }

            $condition['job_number']=My_AES_Decrypt($name);
            $condition['state']=1;
            $user=M('user')->field('privatekey,state',true)->where($condition)->find();
            if($user)//表示用户邮箱已经注册
            {
                $password=My_AES_Decrypt($password);
                $passwordMd5=md5($password);
                if($user['password']==$passwordMd5)
                {
                    $where['id']=$user['belong_dept_id'];
//                    $where['state']=1;
                    $department=M('department')->field('name')->where($where)->find();
                    $user['department']=$department['name'];

                    //返回 1 表示登录成功
                    $this->result['result']=1;
                    $this->result['val']=$user;
                    $this->result['message']='登录成功！';

                    echo json_encode($this->result);
                    exit();
                }else
                {
                    //返回 4 表示用户密码有误
                    $this->result['result']=4;
                    $this->result['val']='';
                    $this->result['message']='密码错误！';
                    echo getjson($this->result);
                    exit();
                }
            }else//表示用户邮箱还未注册
            {
                //返回 2 表示用户邮箱不存在
                $this->result['result']=2;
                $this->result['val']='';
                $this->result['message']='用户不存在或被禁用！';
                echo getjson($this->result);
                exit();
            }
        }else
        {
            //返回 -1 表示登录失败 参数不全
            $this->result['result']=-1;
            $this->result['val']='';
            $this->result['message']='登录失败，参数丢失,请重试！';
            echo getjson($this->result);
            exit();
        }
    }


    //注册新用户
    public function  regist()
    {
        $email=I('email');
        $name=I('name');
        $password1=I('password1');
        $password2=I('password2');
        $verifyCode=I('verifyCode');

        if($email&&$name&&$password1&&$password2&&$verifyCode)
        {
            if(!check_verify($verifyCode))
            {
                //返回 3 表示验证码输入有误
                $this->result['result']=3;
                $this->result['val']='';
                $this->result['message']='验证码输入有误！';
                echo getjson($this->result);
                exit();
            }


            if($password1!=$password2)
            {
                //返回 4 表示两次密码不一致
                $this->result['result']=4;
                $this->result['val']='';
                $this->result['message']='两次密码不一致！';
                echo getjson($this->result);
                exit();
            }


            $isEmail=filter_var($email, FILTER_VALIDATE_EMAIL);
            if(!$isEmail)
            {
                //返回 6 表示邮箱格式有误
                $this->result['result']=6;
                $this->result['val']='';
                $this->result['message']='邮箱格式有误!';
                echo getjson($this->result);
                exit();
            }

            $condition['my_key']='ase_key';
            $ase_key=M('key_val')->where($condition)->getField('my_val');

            $condition['my_key']='aes_iv';
            $aes_iv=M('key_val')->where($condition)->getField('my_val');

            $key = md5($ase_key);  //CuPlayer.com提示key的长度必须16，32位,这里直接MD5一个长度为32位的key
            $iv=$aes_iv;

            $password1 = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($password1), MCRYPT_MODE_CBC, $iv);
            $password2 = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($password2), MCRYPT_MODE_CBC, $iv);

            $password1 = substr($password1, 0, strpos($password1, "\0"));
            $password2 = substr($password2, 0, strpos($password2, "\0"));

            if(!isset($password1{5}))
            {
                //返回 5 密码至少为6位
                $this->result['result']=5;
                $this->result['val']='';
                $this->result['message']='密码至少为6位!';
                echo getjson($this->result);
                exit();
            }

            $condition['email']=$email;
            $user=M('user')->where($condition)->find();
            if($user)//表示用户邮箱已经注册
            {
                //返回 2 表示用户邮箱已经注册
                $this->result['result']=2;
                $this->result['val']='';
                $this->result['message']='该邮箱已注册！';
                echo getjson($this->result);
                exit();

            }else//表示用户邮箱还未注册 可以进行注册
            {
                $user=M('user');

                $rsa=\Org\Phpseclib\RSA::createRSA();
                $key=$rsa->createKey(1024);

                $data['privatekey']=$key['privatekey'];
                $data['publickey']=$key['publickey'];
                $data['email']=$email;
                $data['name']=$name;
                $data['password']=md5($password1);
                $data['head_ico_url']='http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/OnePercent/headIco/headIco3.jpg';
                $data['regtime']=date('y-m-d H:i:s',time());

                $saveResult=$user->add($data);
                if($saveResult)
                {
                    //$data['id']=$saveResult;
                    //返回 1 表示注册成功
                    $this->result['result']=1;
                    $this->result['val']='success';
                    $this->result['message']='注册成功！';
                    echo getjson($this->result);
                    exit();
                }else
                {
                    //返回 0 表示注册失败
                    $this->result['result']=0;
                    $this->result['val']='';
                    $this->result['message']='注册失败，网络故障,请重试！';
                    echo getjson($this->result);
                    exit();
                }
            }

        }else
        {
            //返回 -1 表示注册失败 参数不全
            $this->result['result']=-1;
            $this->result['val']='';
            $this->result['message']='注册失败，参数丢失,请重试！';
            echo getjson($this->result);
            exit();
        }

//        if($_FILES){
//            $upload = new \Think\Upload();// 实例化上传类
//            $upload->maxSize   =     3145728 ;// 设置附件上传大小
//            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
//            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
//            $upload->savePath  =     'user_header/'; // 设置附件上传（子）目录
//            $upload->autoSub=false;
//            $info   =   $upload->upload();
//            if($info){
//                $data['head_img']='Uploads/user_header/'.$info['head_img']['savename'];
//            }else{
//                echo getjson(array('status'=>'-1'));
//                exit();
//            }
//        }
    }


    //获得验证码
    public function verify()
    {
        $verify = new \Think\Verify();
        $verify->fontSize = 18;
        $verify->length=4;
        $verify->imageL = "160";
        $verify->imageH = "45";
        $verify->entry(1);
    }


    //发送验证码到用户邮箱 重置密码
    public function sendEmail()
    {
        $verifyCode=I('verifyCode');
        $userEmail=I('userEmail');
        if($verifyCode&&$userEmail)
        {
            if(!check_verify($verifyCode))
            {
                //返回 3 表示验证码输入有误
                $this->result['result']=3;
                $this->result['val']='';
                $this->result['message']='验证码输入有误！';
                echo getjson($this->result);
                exit();
            }

            $isEmail=filter_var($userEmail, FILTER_VALIDATE_EMAIL);
            if(!$isEmail)
            {
                //返回 2 表示邮箱格式有误
                $this->result['result']=2;
                $this->result['val']='';
                $this->result['message']='邮箱格式有误!';
                echo getjson($this->result);
                exit();
            }


            $condition['email']=$userEmail;
            $user=M('user')->where($condition)->find();
            if(!$user)//表示用户邮箱未注册
            {
                //返回 5 表示用户邮箱未注册
                $this->result['result']=5;
                $this->result['val']='';
                $this->result['message']='该邮箱还未注册!';
                echo getjson($this->result);
                exit();
            }

            $sendTo[]=$userEmail;

            $dateTime=date('y-m-d H:i:s',time());
            $data['email']=$userEmail;
            $data['time']=$dateTime;

            $code=md5($dateTime+'HWT0827');
            $data['code']=$code;
            $addResult=M('reset_password_code')->add($data);

            if(!$addResult)
            {
                //返回 0 邮箱发送失败
                $this->result['result']=0;
                $this->result['val']='';
                $this->result['message']='邮件发送失败，请重试！';
                echo getjson($this->result);
                exit();
            }

            $url="http://".$_SERVER["SERVER_NAME"].__ROOT__.'/index.php/Index/resetPassword/index?userEmail='.$userEmail.'&code='.$code;

            $content='<p>亲爱的，点击下面的链接重置密码，切记此链接只能使用一次！</p><a href="'.$url.'">'.$url.'</a>';

            $sendResult=\Org\PHPMailer\PHPMailer::SendEmail("云通讯录",$content,"重置您的云通讯录密码",$sendTo);
            if($sendResult==1)
            {
                //返回 1 发送成功
                $this->result['result']=1;
                $this->result['val']='';
                $this->result['message']='邮件发送成功！';
                echo getjson($this->result);
                exit();
            }else
            {
                //返回 0 邮箱发送失败
                $this->result['result']=0;
                $this->result['val']='';
                $this->result['message']='邮件发送失败，请重试！';
                echo getjson($this->result);
                exit();
            }
        }else
        {
            //返回 -1 丢失参数
            $this->result['result']=-1;
            $this->result['val']='';
            $this->result['message']='丢失参数，请重试！';
            echo getjson($this->result);
            exit();
        }
    }


//    public function  sendEmail($message,$sendTo)
//    {
//        set_time_limit(0);
//
//        //$message='<p>weolsdhf</p><img  src="www.baidu.com/img/bd_logo1.png" style="width: 5em;height:4em;" >';
//
//        $message = '
//        <html>
//        <head>
//         <title>Birthday Reminders for August</title>
//        </head>
//        <body>
//        搜索<p>Here are the birthdays upcoming in August!</p>
//        <img  src="http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/OnePercent/headIco/headIco3.jpg" style="width: 5em;height:4em;" >
//         <table>
//         <tr>
//         <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
//         </tr>
//         <tr>
//         <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
//         </tr>
//         <tr>
//         <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
//         </tr>
//         </table>
//        </body>
//        </html>
//        ';
//
//
//        $sendResult=\Org\PHPMailer\PHPMailer::SendEmail("云通讯录",$message,"密码重置",$sendTo);
//        echo $sendResult;
//    }


}