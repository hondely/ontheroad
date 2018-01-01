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
            <li >首页管理</li>
            <li>幻灯片管理</li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">

    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="row" >
            <div class="panel-group " role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab"  class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne<?php echo ($k); ?>">
                        <h4 class="panel-title">
                            第<?php echo ($k); ?>张幻灯片
                        </h4>
                    </div>
                    <div id="collapseOne<?php echo ($k); ?>" class="panel-collapse collapse in" role="tabpane<?php echo ($k); ?>" aria-labelledby="headingOne">
                        <div class="form-horizontal wp-margin-top-15px">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">链接URL</label>
                                <div class="col-sm-8">
                                    <input id="url<?php echo ($vo["id"]); ?>" type="url" class="form-control" value="<?php echo ($vo["url"]); ?>"  placeholder="">
                                </div>
                                <div class="col-sm-2">
                                    <button onclick="preview(<?php echo ($vo["id"]); ?>)" type="button" class="btn btn-info">&nbsp;&nbsp;预览&nbsp;&nbsp;</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">图片</label>
                                <div class="col-sm-10">
                                    <img id="pic<?php echo ($vo["id"]); ?>" onclick="showWpUploader(<?php echo ($vo["id"]); ?>)" class="banner-img"  src="<?php echo ($vo["pic"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="button" onclick="save(<?php echo ($vo["id"]); ?>)" class="btn btn-danger">&nbsp;&nbsp;保存&nbsp;&nbsp;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

    <!--<div class="row " >-->
        <!--<div class="panel-group " role="tablist" aria-multiselectable="true">-->
            <!--<div class="panel panel-default">-->
                <!--<div class="panel-heading" role="tab"  class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne1">-->
                    <!--<h4 class="panel-title">-->
                        <!--第1张幻灯片-->
                    <!--</h4>-->
                <!--</div>-->
                <!--<div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">-->
                    <!--<div class="form-horizontal wp-margin-top-15px">-->
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-2 control-label">链接URL</label>-->
                            <!--<div class="col-sm-8">-->
                                <!--<input type="url" class="form-control"  placeholder="">-->
                            <!--</div>-->
                            <!--<div class="col-sm-2">-->
                                <!--<button type="button" class="btn btn-info">&nbsp;&nbsp;预览&nbsp;&nbsp;</button>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="form-group">-->
                            <!--<label  class="col-sm-2 control-label">图片</label>-->
                            <!--<div class="col-sm-10">-->
                                <!--<img class="banner-img"  src="/ontheroad/Public/WeChat/images/l7.png">-->
                            <!--</div>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                            <!--<label  class="col-sm-2 control-label"></label>-->
                            <!--<div class="col-sm-10">-->
                                <!--<button type="button" class="btn btn-danger">&nbsp;&nbsp;保存&nbsp;&nbsp;</button>-->
                            <!--</div>-->
                        <!--</div>-->

                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</div>

<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader-core.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>

<script>
    wpUploader.formData={'type':'banner'};
    wpUploader.url=Globals.dataCenterUrl;
    function showWpUploader(id){
        wpUploader.uploaded=function(ret){
            ret=JSON.parse(ret);
            if(ret.result==1){
                var val =ret.val;
                var src=val.rootPath+""+val.fileToUpload.savepath+val.fileToUpload.savename;
                $('#pic'+id).attr('src',src);
            }else{
                myUi.alert('文件上传失败.',0,function(ret){});
            }
        };
        wpUploader.show();
    }

    function save(id){
        var bannerPic=$('#pic'+id).attr('src');
        var bannerUrl=$('#url'+id).val();

        data = new FormData();
        data.append("id",id);
        data.append("url",bannerUrl);
        data.append("pic",bannerPic);

        var url="<?php echo U('IndexManage/setBanner');?>";
        $.ajax({
            data: data,
            type: "POST",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function(ret) {
                console.log(ret);
                var retJson=JSON.parse(ret);
                if(retJson.result==1)
                {
                    myUi.alert('成功.',1,function(ret){});
                }else{
                    myUi.alert('失败.',0,function(ret){});
                }
            },
            error:function(ret){
                myUi.alert('失败.',0,function(ret){});
            }
        });
    }

    function preview(id){
        var url=$('#url'+id).val();
//        window.open(url);
        top.topManager.openPage({
            id : 'preview',
            href :url,
            title : '预览'
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