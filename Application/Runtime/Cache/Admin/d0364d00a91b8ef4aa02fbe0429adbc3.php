<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title><?php echo ($htmlTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="/ontheroad/Public/Admin/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/ontheroad/Public/Admin/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/ontheroad/Public/Admin/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/ontheroad/Public/Admin/myStyle/css/style.css" />
    <link rel="stylesheet" href="/ontheroad/Public/common/wpUI/css/myUi.css" />

</head>
<body>


<link rel="stylesheet" href="/ontheroad/Public/Admin/DocumentCenter/css/style.css" />
<link rel="stylesheet" href="/ontheroad/Public/common/css/wp-color.css" />


<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >文档中心</li>
            <li>撰写文档</li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">

    <div class="wp-item-box" onclick="openPage('<?php echo U("indexForMulti",array("type"=>1,"typeName"=>"精彩图集"));?>','gallery','精彩图集')" >
        <div class="wp-bg-themeprimary">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item8.png">
            <div >精彩图集</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("indexForMulti",array("type"=>2,"typeName"=>"旅游手册"));?>','travelGuide','旅游手册')" >
        <div class="wp-bg-themesecondary">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item3.png">
            <div >旅游手册</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("indexForMulti",array("type"=>3,"typeName"=>"户外路线"));?>','sightseeingPath','户外路线')">
        <div class="wp-bg-themethirdcolor">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item5.png">
            <div >户外路线</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("indexForMulti",array("type"=>4,"typeName"=>"旅行社报团"));?>','travelAgency','旅行社报团')">
        <div class="wp-bg-themefourthcolor">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item6.png">
            <div >旅行社报团</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>1));?>','roomService','客房服务')">
        <div class="wp-bg-themeprimary">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item2.png">
            <div >客房服务</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>2));?>','dreamWalk','DreamWalk')">
        <div class="wp-bg-themesecondary">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item7.png">
            <div >DreamWalk</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>3));?>','parking','停车场')">
        <div class="wp-bg-themethirdcolor">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item9.png">
            <div >停车场</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>4));?>','dryingArea','晾晒区')">
        <div class="wp-bg-themefourthcolor">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item10.png">
            <div >晾晒区</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>5));?>','morningCall ','叫醒服务')">
        <div class="wp-bg-themeprimary">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item11.png">
            <div >叫醒服务</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>6));?>','movie','萌庭放映室')">
        <div class="wp-bg-themesecondary">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item13.png">
            <div >萌庭放映室</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>7));?>','bookBar','时光书吧')">
        <div class="wp-bg-themethirdcolor">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item14.png">
            <div >时光书吧</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>8));?>','restaurant','潘小姐餐厅')">
        <div class="wp-bg-themefourthcolor">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item15.png">
            <div >潘小姐餐厅</div>
        </div>
    </div>

    <div class="wp-item-box" onclick="openPage('<?php echo U("editForSingle",array("id"=>9));?>','dream','追梦青年')">
        <div class="wp-bg-themeprimary">
            <img  style="" src="/ontheroad/Public/WeChat/images/myCenter/item16.png">
            <div >追梦青年</div>
        </div>
    </div>
</div>

<script>
    function openPage(url,id,title){
        top.topManager.openPage({
            id : id,
            href :url,
            title : title
        });
    }
</script>
<script type="text/javascript" src="/ontheroad/Public/Admin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUI/js/MyUi.js"></script>

<script type="text/javascript">

</script>

</body>
</html>