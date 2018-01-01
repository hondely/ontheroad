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


<link rel="stylesheet" href="/ontheroad/Public/Admin/IndexManage/css/style.css" />
<link rel="stylesheet" href="/ontheroad/Public/common/wpUploader/css/wp-uploader.css" />
<style>
    .wp-icon-new{
        /*height: 100px;*/
    }
</style>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >文档中心</li>
            <li>撰写文档</li>
            <li><?php echo ($typeName); ?></li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">

    <div class="row">
        <div class="col-sm-10">
            <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="col-sm-6 col-md-3 wp-icon-new" >
                    <div class="thumbnail">
                        <img alt="<?php echo ($vo["name"]); ?>" src="<?php echo ($vo["thumbnail"]); ?>" data-holder-rendered="true" style="height: 108px;width: 100%; display: block;">
                        <div class="caption">
                            <p style="min-height: 3em;"><?php echo (subtext($vo["title"],'20')); ?></p>
                            <h4 ><?php echo (subtext($vo['time'],'10')); ?></h4>
                            <p>
                                <div onclick="detail('<?php echo U("detail",array("id"=>$vo['id'],"typeName"=>$typeName));?>','<?php echo ($vo["id"]); ?>','<?php echo ($typeName); ?>')"  class="btn btn-primary" >编辑</div>
                            </p>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            <div class="row">
                <div class="col-sm-12 col-md-12 text-center">
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <button type="button" onclick="add('<?php echo U("addForMulti",array("type"=>$type,"typeName"=>$typeName));?>','roomService','<?php echo ($typeName); ?>')" class="btn btn-info">&nbsp;&nbsp;新增&nbsp;&nbsp;</button>
        </div>
    </div>
</div>

<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader-core.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>

<script>

    function detail(url,id,title){
//        var uid = Date.parse(Date());
//        id=uid+id;
        id='multi'+id;
        top.topManager.openPage({
            id : id,
            href :url,
            title :"编辑"+title
        });
    }

    function add(url,id,title){
        var uid = Date.parse(Date());
        id=uid+id;
        top.topManager.openPage({
            id : id,
            href :url,
            title :"新增"+title
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