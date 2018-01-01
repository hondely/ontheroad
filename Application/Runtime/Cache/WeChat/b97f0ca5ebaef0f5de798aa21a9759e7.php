<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>追梦青年</title>
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/wp-base.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/weui.css" />
</head>

<body class="wp-bg-white" ontouchstart="">
<div class="weui-msg">
    <div class="weui-msg__icon-area"><i class="weui-icon-success weui-icon_msg"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">注册成功</h2>
        <p class="weui-msg__desc">
            账号:<?php echo ($userInfo['phone']); ?>
        </p>
        <p class="weui-msg__desc">
            密码:<?php echo ($userInfo['code']); ?>(短信验证码)
        </p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            <a href="<?php echo U('MyCenter/index');?>" class="weui-btn weui-btn_primary">登录</a>
        </p>
    </div>
    <div class="weui-msg__extra-area">
        <div class="weui-footer">
            <p class="weui-footer__text">Copyright &copy; 2016-2017 追梦青年</p>
        </div>
    </div>
</div>
</body>
</html>