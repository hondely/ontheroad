<?php
use Org\Util\Category;
/*公用函数库*/

/*文件上传封装*/
function uploadfile($type=array(),$root_path='',$save_path=''){

    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     31457289999999999;// 设置附件上传大小
    $upload->exts      =     $type;// 设置附件上传类型
    $upload->rootPath  =     $root_path; // 设置附件上传根目录
    $upload->savePath  =     $save_path; // 设置附件上传（子）目录
    $upload->autoSub=false;
    $info   =   $upload->upload();
    if($info){
        return array('info'=>$info,'status'=>1);
    }else{
        return array('info'=>$upload->getError(),'status'=>0);
    }
}

/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}


/*
*Page分页封装
*/
function page($mode, $order='', $pagesize = 10, $relation = false, $where=''){
    if (isset($mode)&&!empty($mode)) {
        if ($relation) {
            if (!empty($where)) {
               $count = D($mode)->where($where)->count(); 
            }
            else
            {
                $count = D($mode)->count();
            }
			
            $page = new \Common\Org\Util\Page($count, $pagesize);
            //import('ORG.Util.Page');       //导入分页类
            //$page = new Page($count, $pagesize);
            if (!empty($order)) {
                if (!empty($where)) {
                    $result = D($mode)->relation(true)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
                }
                else
                {
                    $result = D($mode)->relation(true)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
                }
            }
            else
            {
                if (!empty($where)) {
                    $result = D($mode)->relation(true)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
                }
                else
                {
                    $result = D($mode)->relation(true)->limit($page->firstRow.','.$page->listRows)->select();
                }
            }
        }
        else
        {
            if (!empty($where)) {
               $count = M($mode)->where($where)->count(); 
            }
            else
            {
                $count = M($mode)->count();
            }
            
            $page = new \Common\Org\Util\Page($count, $pagesize);
            //import('ORG.Util.Page');       //导入分页类
            //$page = new Page($count, $pagesize);
            if (!empty($order)) {
                if (!empty($where)) {
                   $result = M($mode)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select(); 
                }
                else
                {
                    $result = M($mode)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
                }
            }
            else
            {
                if (!empty($where)) {
                    $result = M($mode)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
                }
                else
                {
                    $result = M($mode)->limit($page->firstRow.','.$page->listRows)->select();
                }     
            }
        }
        $page->rollPage = 5;
        $page->setConfig('theme', '<ul class="pagination"> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%<li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li></ul>');
        return array('result' =>$result , 'page'=>$page->show(),'sql'=>D($mode)->getlastSql());
    }
    return array('result' =>array(),'page'=>'');
}


function subtext($text, $length)
 {
    if(mb_strlen($text, 'utf8') > $length) 
    return mb_substr($text, 0, $length, 'utf8').'...';
    return $text;
 }

function _get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] AS $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    }
    return $ip;

}

function getIP()
{
    $realip='';
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}

    function getjson($arr){
        return urldecode(json_encode($arr));
    }

//table查询分页封装
function page_table($table_arr=array(),$order='',$num,$where){

    if($order!=""){

        $count=M()->table($table_arr)->where($where)->order($order)->count();
        $page = new \Common\Org\Util\Page($count, $num);
        $page->setConfig('theme', '<ul><li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%</ul>');
        $list=M()->table($table_arr)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
        $show=$page->show();
    }else{
        $count=M()->table($table_arr)->where($where)->count();
        $page = new \Common\Org\Util\Page($count, $num);
        $page->setConfig('theme', '<ul><li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%</ul>');
        $list=M()->table($table_arr)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $show=$page->show();
    }
    return array('result'=>$list,'show'=>$show);

}

function getcity($pid){

    return M('region')->where("id=$pid")->getField('name');
}

function getsq($id){

    return M('commerce_circle')->where("cm_id=$id")->getField('cm_name');
}


function getstr($str,$table){

    $item='';
    $arr=explode(',',$str);
    foreach($arr as $val){
        if(!empty($val)){
        $item.=M($table)->where("item_id=$val")->getField('item_name').' ';
        }
    }

    return $item;
}
function put_file_x($path,$byte){

    $byte = str_replace(' ','',$byte);   //处理数据
    $byte = str_ireplace("<",'',$byte);
    $byte = str_ireplace(">",'',$byte);
    $byte=pack("H*",$byte);     	 //16进制转换成二进制
    $file =tempnam_sfx($path, ".png");
    $handle  =  fopen ( $file ,  "w" );
    fwrite ( $handle ,$byte);
    fclose ( $handle );
    return $file;
}

function put_file_x1($path,$byte){

    $byte = str_replace(' ','',$byte);   //处理数据
    $byte = str_ireplace("<",'',$byte);
    $byte = str_ireplace(">",'',$byte);
    $byte=file_get_contents($byte);
    $file =tempnam_sfx($path, ".mp4");
    $handle  =  fopen ( $file ,  "w" );
    fwrite ( $handle ,$byte);
    fclose ( $handle );
    return $file;
}

function tempnam_sfx($path, $suffix){
    do{
        $file = $path."/".mt_rand().$suffix;
        $fp = @fopen($file, 'x');
    }
    while(!$fp);

    fclose($fp);
    return $file;
}

function random($length = 6 , $numeric = 0) {
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if($numeric) {
        $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}




function xml_to_array($xml){
    $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches)){
        $count = count($matches[0]);
        for($i = 0; $i < $count; $i++){
            $subxml= $matches[2][$i];
            $key = $matches[1][$i];
            if(preg_match( $reg, $subxml )){
                $arr[$key] = xml_to_array( $subxml );
            }else{
                $arr[$key] = $subxml;
            }
        }
    }
    return $arr;
}


function Post($curlPost,$url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    $return_str = curl_exec($curl);
    curl_close($curl);
    return $return_str;
}

function getCoordinate($content,$ct){

    $address=$content;
    $json=file_get_contents("http://api.map.baidu.com/geocoder?address=".trim($address)."&output=json&key=96980ac7cf166499cbbcc946687fb414");
    $infolist=json_decode($json);
    $array=array('errorno'=>'1');
    if(isset($infolist->result->location) && !empty($infolist->result->location)){
        $array=array(
            'lng'=>$infolist->result->location->lng,
            'lat'=>$infolist->result->location->lat,
            'errorno'=>'0'
        );
    }
    return json_encode($array);
}

function getdistance($lng1,$lat1,$lng2,$lat2){
    //将角度转为狐度
    $radLat1=deg2rad($lat1);//deg2rad()函数将角度转换为弧度
    $radLat2=deg2rad($lat2);
    $radLng1=deg2rad($lng1);
    $radLng2=deg2rad($lng2);
    $a=$radLat1-$radLat2;
    $b=$radLng1-$radLng2;
    $s=2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6378.137*1000;
    return $s;
}

function getaddress($arr=array()){

    $data['id']=array('in',$arr);
    return M('region')->where($data)->getField('name',true);

}



/**
 * 获取当前页面完整URL地址
 * Allen 2016-06-14 23:42:00
 */
function get_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}


/**
 * AES解密
 * Allen 2016-06-14 23:42:00
 */
function My_AES_Decrypt($encryptStr)
{
    $condition['my_key']='ase_key';
    $ase_key=M('key_val')->where($condition)->getField('my_val');

    $condition['my_key']='aes_iv';
    $aes_iv=M('key_val')->where($condition)->getField('my_val');

    $key = md5($ase_key);  //CuPlayer.com提示key的长度必须16，32位,这里直接MD5一个长度为32位的key
    $iv=$aes_iv;

    $decryptStr = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encryptStr), MCRYPT_MODE_CBC, $iv);
    $decryptStr = substr($decryptStr, 0, strpos($decryptStr, "\0"));

    return $decryptStr;
}

//子字符串在母字符串中第N次出现的位置
function getPos($str, $sonStr, $iIndex=0) {

    static $aPos = array();
    $ipos = false;
    $ipos = strpos($str, $sonStr, $iIndex);
    if ($ipos !== false) {

        $aPos[count($aPos)] = $ipos;
        getPos($str, $sonStr, $ipos+1);
    }
    return $aPos;
}

/**
 *自动判断把gbk或gb2312编码的字符串转为utf8
 *能自动判断输入字符串的编码类，如果本身是utf-8就不用转换，否则就转换为utf-8的字符串
 *支持的字符编码类型是：utf-8,gbk,gb2312
 *@$str:string 字符串
 */
function gbk2utf8($str){
    $charset = mb_detect_encoding($str,array('UTF-8','GBK','GB2312'));
    $charset = strtolower($charset);
    if('cp936' == $charset){
        $charset='GBK';
    }
    if("utf-8" != $charset){
        $str = iconv($charset,"UTF-8//IGNORE",$str);
    }
    return $str;
}

function getWxPayURL(){
    $url = U('API/WxPay/index','','').'/';
    return $url;
}