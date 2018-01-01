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

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >旅舍管理</li>
            <li>房型管理</li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">

    <div class="row">
        <div class="col-sm-10">
            <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img alt="<?php echo ($vo["name"]); ?>" src="<?php echo ($vo["thumbnail"]); ?>" data-holder-rendered="true" style="height: 108px;width: 100%; display: block;">
                        <div class="caption">
                            <h3><?php echo ($vo["name"]); ?></h3>
                            <p><?php echo ($vo["brief"]); ?></p>
                            <h4 style="color: red;">￥<?php echo ($vo["price"]); ?></h4>
                            <p>
                                <!--<div onclick="openSub('<?php echo U('Food/info');?>')" class="btn btn-primary" >编辑</div>-->
                                <div onclick="detail('<?php echo U('detail',array('id'=>$vo['id']));?>')" class="btn btn-primary" >编辑</div>
                                <!--<div onclick="detail('http://www.baidu.com/')" class="btn btn-default">删除</div>-->
                            </p>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="col-sm-2">
            <button type="button" onclick="add('<?php echo U("add");?>')" class="btn btn-info">添加房型</button>
        </div>
    </div>
</div>

<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader-core.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>

<script>

    function detail(url){
        var uid = Date.parse(Date());
        top.topManager.openPage({
            id : uid,
            href :url,
            title : '房型详情'
        });
    }

    function add(url){
        var uid = Date.parse(Date());
        top.topManager.openPage({
            id : uid,
            href :url,
            title : '新的房型'
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