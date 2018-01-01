<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title><?php echo ($htmlTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">

    <link href="/ontheroad/Public/Admin/bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/ontheroad/Public/Admin/bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/ontheroad/Public/Admin/bui/assets/css/main.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="/ontheroad/Public/common/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/ontheroad/Public/Admin/myStyle/css/style.css" />
    <link rel="stylesheet" href="/ontheroad/Public/Admin/myStyle/css/myUi.css" />
</head>
<body>

<div class="header">
    <div class="dl-title">
        <a href="<?php echo U('index/main');?>" title="<?php echo ($htmlTitle); ?>" >
            <img src="/ontheroad/Public/Admin/Index/images/logo.png">
        </a>
    </div>

    <div class="dl-log">欢迎您  [<span class="dl-log-user"><?php echo ($_SESSION['current_manger']['nickname']); ?></span>]<a href="<?php echo U('Index/logout');?>" title="退出系统" class="dl-log-quit">[退出系统]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">首页</div></li>
            <!--<li class="nav-item"><div class="nav-item-inner nav-order">酒店管理系统</div></li>-->
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="/ontheroad/Public/Admin/bui/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/Admin/bui/assets/js/bui.js"></script>
<script type="text/javascript" src="/ontheroad/Public/Admin/bui/assets/js/config.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUI/js/MyUi.js"></script>
<script>
    BUI.use('common/main',function(){
        var config = [{
            id:'index',
            homePage : 'systemInfo',
            menu:[{
                text:'基础功能',
                items:[
                    {id:'systemInfo',text:'系统信息',href:'systemInfo.html',closeable : false},
                    {id:'editPassword',text:'修改密码',href:'editPassword.html'}
                ]
            },{
                text:'首页管理',
                items:[
                    {id:'indexManage',text:'幻灯管理',href:"<?php echo U('IndexManage/banner');?>"}
                ]
            },{
                text:'旅舍管理',
                items:[
                    {id:'roomType',text:'房型管理',href:"<?php echo U('RoomManage/index');?>"}
                ]
            },{
                text:'追梦良品',
                items:[
                    {id:'around',text:'良品管理',href:"<?php echo U('Around/index');?>"}
                ]
            },{
                text:'会员管理',
                items:[
                    {id:'vipManage',text:'会员信息',href:"<?php echo U('User/index');?>"}
                ]
            },{
                text:'文档中心',
                items:[
                    {id:'documentCenter',text:'撰写文档',href:"<?php echo U('DocumentCenter/index');?>"}
                ]
            }]
        }];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
</body>
</html>