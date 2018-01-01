<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title><?php echo ($htmlTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="/ontheroad/Public/Admin/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/ontheroad/Public/Admin/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/ontheroad/Public/Admin/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/ontheroad/Public/Admin/myStyle/css/style.css" />
    <link href="/ontheroad/Public/Admin/Index/editPassword.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >基础功能</li>
            <li>修改密码</li>
        </ol>
    </div>
</div>

<div class="container">
    <form class="form-signin"  method="post" action="<?php echo U('Index/editPassword');?>">


        <input type="password" name="oldPassword"  id="oldPassword" class="form-control" placeholder="旧密码" required autofocus>

        <input type="password" name="newPassword1" id="newPassword1" class="form-control" placeholder="新密码第一次" required>

        <input type="password" name="newPassword2" id="newPassword2" class="form-control" placeholder="新密码第二次" required>

        <button class="btn btn-lg btn-danger btn-block" type="submit">修改</button>
    </form>
</div>


<script type="text/javascript" src="/ontheroad/Public/Admin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/Admin/bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">

</script>

</body>
</html>