<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>追梦青年</title>
    <link href="/ontheroad/Public/Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/ontheroad/Public/Admin/Login/css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="login-container">
    <div id="login-user-icon">
        <img src="/ontheroad/Public/Admin/Login/images/userIco.png">
    </div>
    <div id="login-form">
        <form  method="post" action="<?php echo U('Login/checklogin');?>">
            <input id="name" name="name" class="form-control input-lg" type="text" placeholder="账号">
            <input id="password" name="password" class="form-control input-lg" type="password" placeholder="密码">
            <input id="verify" name="verify" class="form-control input-lg" type="text" placeholder="验证码">
            <div>
                <img class="verify-pic"  src="<?php echo U('Login/verify');?>" onclick="this.src=this.src+'?'+Math.random()" />
                <input id="loginBtn" type="submit" class="btn btn-primary btn-lg " value="登录">
            </div>
        </form>
    </div>
</div>

</body>
</html>