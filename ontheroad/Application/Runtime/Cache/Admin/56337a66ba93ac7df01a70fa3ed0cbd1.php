<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title><?php echo ($htmlTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="/ontheroad/Public/Admin/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/ontheroad/Public/Admin/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/ontheroad/Public/Admin/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/ontheroad/Public/Admin/myStyle/css/style.css" />

</head>
<body>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >基础功能</li>
            <li>系统信息</li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne" class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne">
                    <h4 class="panel-title">
                        当前运行环境
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                    <table  class="table table-hover table-striped  table-bordered">
                        <tbody>
                        <tr>
                            <td>版本：</td>
                            <td><?php echo ($system_info["dn_version"]); ?></td>
                            <td>服务器域名/IP：</td>
                            <td><?php echo ($system_info["server_domain"]); ?></td>
                        </tr>
                        <tr>
                            <td>服务器操作系统：</td>
                            <td><?php echo ($system_info["server_os"]); ?></td>
                            <td>Web 服务器：</td>
                            <td><?php echo ($system_info["web_server"]); ?></td>
                        </tr>
                        <tr>
                            <td>PHP 版本：</td>
                            <td><?php echo ($system_info["php_version"]); ?></td>
                            <td>MySQL 版本：</td>
                            <td><?php echo ($system_info["mysql_version"]); ?></td>
                        </tr>
                        <tr>
                            <td>文件上传限制：</td>
                            <td><?php echo ($system_info["upload_max_filesize"]); ?></td>
                            <td>执行时间限制：</td>
                            <td><?php echo ($system_info["max_execution_time"]); ?></td>
                        </tr>
                        <tr>
                            <td>安全模式：</td>
                            <td><?php echo ($system_info["safe_mode"]); ?></td>
                            <td>Zlib 支持：</td>
                            <td><?php echo ($system_info["zlib"]); ?></td>
                        </tr>
                        <tr>
                            <td>CURL 支持：</td>
                            <td><?php echo ($system_info["curl"]); ?></td>
                            <td>时区设置：</td>
                            <td><?php echo ($system_info["timezone"]); ?></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/ontheroad/Public/Admin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/Admin/bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">

</script>

</body>
</html>