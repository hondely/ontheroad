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


<link rel="stylesheet" href="/ontheroad/Public/Admin/Around/css/style.css" />
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >追梦良品</li>
            <li>良品管理</li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">
    <div class="wp-left-box">
        <ul class="nav nav-pills nav-stacked wp-left-box-nav"  role="tablist" >
            <li role="presentation" class="active" onclick="openClassList()" ><a href="#"><i class="icon-edit"></i>&nbsp;&nbsp;类别管理</a></li>
            <li role="presentation" class="active" onclick="add('<?php echo U("Around/add",array('id'=>$selectClass));?>')"><a href="#"><i class="icon-plus"></i>&nbsp;&nbsp;添加</a></li>
        </ul>
        <div style="overflow: auto;height: 390px;">
            <ul class="nav nav-pills nav-stacked wp-left-box-nav"  role="tablist" >
                <?php if(is_array($classList)): $k = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo["id"] == $selectClass): ?><li role="presentation" class="active"><a href="<?php echo U('Around/index',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></li>
                        <?php else: ?>
                        <li role="presentation" ><a  href="<?php echo U('Around/index',array('class'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

    <div class="wp-right-box">
        <?php if(is_array($aroundList)): $k = 0; $__LIST__ = $aroundList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img alt="<?php echo ($vo["name"]); ?>" src="<?php echo ($vo["thumbnail"]); ?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                    <div class="caption">
                        <h3><?php echo ($vo["name"]); ?></h3>
                        <p><?php echo ($vo["brief"]); ?></p>
                        <p style="color: red;font-weight: bolder;">¥<?php echo ($vo["price"]); ?></p>
                        <p>
                            <div onclick="openDetail('<?php echo U('Around/detail',array('id'=>$vo['id']));?>')" class="btn btn-primary" >详情</div>
                            <div onclick="openSub('http://www.baidu.com/')" class="btn btn-default">删除</div>
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
    <div style="clear: both;"></div>
</div>

<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader-core.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>

<script>

    function openDetail(url){
        var uid = Date.parse(Date());
        top.topManager.openPage({
            id : uid,
            href :url,
            title : '详情'
        });
    }

    function openClassList(){
        var url='<?php echo U("Around/classList");?>';
        top.topManager.openPage({
            id : 'AroundClassList',
            href :url,
            title : '类别管理'
        });
    }

    function add(url){
        var uid = Date.parse(Date());
        top.topManager.openPage({
            id : uid,
            href :url,
            title : '添加良品'
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