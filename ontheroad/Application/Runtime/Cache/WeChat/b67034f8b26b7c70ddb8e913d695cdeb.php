<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>追梦青年</title>
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/aui.2.0.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/wp-base.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/regist/style.css" />
</head>

<body class="wp-bg-white" ontouchstart="">

    <div  class="wp-text-align-center wp-margin-t-30 aui-padded-l-15 aui-padded-r-15">
        <img onclick="goIndex()" class="wp-width-100-percent wp-btn" src="/ontheroad/Public/WeChat/images/Regist/logo.png">
        <img id="describeImg" style="display: none;" class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/Regist/describe.png">

        <div class="wp-width-100-percent wp-margin-t-30 wp-pandding-l-20-percent wp-pandding-r-20-percent" >
            <input id="number" class="regist-input"  type="tel" maxlength="11" placeholder="手机号">
        </div>

        <div class="wp-width-100-percent wp-margin-t-30   wp-pandding-l-20-percent wp-pandding-r-20-percent " >
            <div class="wp-width-100-percent " >
                <div class="wp-verify" >
                    <input id="code"  type="number"  placeholder="验证码">
                </div>
                <div class="wp-send-code-btn" >
                    <div style="" onclick="sendCode()" id="sendButton"  class="wp-width-100-percent wp-btn aui-btn aui-btn-info aui-btn-outlined">发送验证码</div>
                </div>
                <div class="wp-clear-both"></div>
            </div>
        </div>

        <div class="wp-margin-t-30">
            <div onclick="regist()"  class="wp-margin-t-30 wp-btn wp-regist-btn">注册</div>
        </div>
    </div>
    <div class="wp-regist-lace"></div>
</body>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-dialog.js"></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-toast.js"></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/wp-util.js"></script>
<script type="text/javascript">

    var dialog = new auiDialog();
    var toast = new auiToast();

    $('#describeImg').fadeIn(2000);
    var time=120;
    var isTimeOut=true;

    function goIndex(){
        window.location="<?php echo U('Index/index');?>";
    }
    function sendCode(){
        if(!isTimeOut){
            dialog.alert({
                title:"提示",
                msg:'验证码已发送',
                buttons:['确定']
            },function(ret){
                var index=ret.buttonIndex;//下标从1开始
            })
            return;
        }

        var number=$('#number').val();
        if(!wpUtil.isPhoneNumber(number)){
            dialog.alert({
                title:"提示",
                msg:'不可用的手机号',
                buttons:['确定']
            },function(ret){

            })
            return;
        }
        var data = new FormData();
        data.append("number",number);
        var url="<?php echo U('Regist/sendCode');?>";
        $.ajax({
            data: data,
            type: "POST",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function(ret) {
                var retJson=JSON.parse(ret);
                if(retJson.result==1)
                {
                    toast.success({
                        title:"验证码已发送",
                        duration:2000
                    });
                    time=120;
                    isTimeOut=false;
                    $('#sendButton').html("请等待120秒" );
                    setInterval("timer()",1000);
                }else{
                    toast.fail({
                        title:"失败请重试",
                        duration:2000
                    });
                }
            },
            error:function(ret){
                toast.fail({
                    title:"失败请重试",
                    duration:2000
                });
            }
        });
    }

    function timer(){
        if(time>0){
            time--;
            $('#sendButton').html("请等待"+time+'秒');
        }else{
            isTimeOut=true;
            $('#sendButton').html('发送验证码');
        }
    }

    function regist() {
        var code=$('#code').val();
        var number=$('#number').val();
        if(!wpUtil.isPhoneNumber(number)){
            dialog.alert({
                title:"提示",
                msg:'不可用的手机号',
                buttons:['确定']
            },function(ret){

            })
            return;
        }

        if(code===""){
            dialog.alert({
                title:"提示",
                msg:'请输入验证码',
                buttons:['确定']
            },function(ret){

            })
            return;
        }

        var data = new FormData();
        data.append("number",number);
        data.append("code",code);
        var url="<?php echo U('Regist/regist');?>";
        $.ajax({
            data: data,
            type: "POST",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function(ret) {
                var retJson=JSON.parse(ret);
                if(retJson.result==1)
                {
                    var succeedUrl="<?php echo U('Regist/succeed');?>";
                    window.location.href=succeedUrl;
                }else{
                    toast.fail({
                        title:retJson.message,
                        duration:2000
                    });
                }
            },
            error:function(ret){
                toast.fail({
                    title:"失败请重试",
                    duration:2000
                });
            }
        });
    }
</script>
</html>