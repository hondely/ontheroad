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

<link rel="stylesheet" href="/ontheroad/Public/Admin/kindeditor/plugins/code/prettify.css" />

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >文档中心</li>
            <li>撰写文档</li>
            <li><?php echo ($typeName); ?></li>
            <li>编辑</li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">

    <div class="form-horizontal">
        <input id="id" style="display: none" value="<?php echo ($info["id"]); ?>">
        <div class="form-group">
            <label class="col-sm-2 control-label">缩略图</label>
            <div class="col-sm-6">
                <div class="thumbnail">
                    <img alt="缩略图" id="thumbnailImg"  onclick="showWpUploader()" src="<?php echo ($info["thumbnail"]); ?>" style="height: 288px; width: 432px;  display: block;cursor: pointer;">
                </div>
            </div>
            <input type="text" style="display: none" name="thumbnail" id="thumbnail" value="<?php echo ($info["thumbnail"]); ?>">
        </div>

        <div class="form-group" >
            <label for="title" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
                <input type="text" value="<?php echo ($info["title"]); ?>" class="form-control" name="title" id="title" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">内容</label>
            <div class="col-sm-10">
                <textarea id="content" name="content" style="width:100%;height:300px;">
                    <?php echo ($info["content"]); ?>
                </textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" onclick="saveInfo()" class="btn btn-success">&nbsp;&nbsp;保存&nbsp;&nbsp;</button>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader-core.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUploader/js/wp-uploader.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>

<script charset="utf-8" src="/ontheroad/Public/Admin/kindeditor/plugins/code/prettify.js"></script>

<script charset="utf-8" src="/ontheroad/Public/Admin/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="/ontheroad/Public/Admin/kindeditor/lang/zh-CN.js"></script>


<script>
    var type="<?php echo ($type); ?>";
    var multiListName=['gallery','travelGuide','sightseeingPath','travelAgency'];
    wpUploader.formData={'type':multiListName[type-1]};
    wpUploader.url=Globals.dataCenterUrl;
    function showWpUploader(){
        wpUploader.uploaded=function(ret){
            ret=JSON.parse(ret);
            if(ret.result==1){
                var val =ret.val;
                var src=val.rootPath+""+val.fileToUpload.savepath+val.fileToUpload.savename;
                $('#thumbnailImg').attr('src',src);
                $('#thumbnail').attr('value',src);
            }else{
                myUi.alert('文件上传失败.',0,function(ret){});
            }
        };
        wpUploader.show();
    }

    KindEditor.ready(function(K) {
        window.editor = K.create('#content');
    });

    function saveInfo(){
        var id=$('#id').val();
        var thumbnail=$('#thumbnail').val();
        var title=$('#title').val();
        var editorHtml =""+editor.html();
        var detail=editorHtml;

        data = new FormData();
        data.append("id",id);
        data.append("title",title);
        data.append("thumbnail",thumbnail);
        data.append("content",detail);

        var url="<?php echo U('DocumentCenter/detail');?>";
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
                    top.topManager.reloadPage(multiListName[type-1]);
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
</script>
<script type="text/javascript" src="/ontheroad/Public/Admin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUI/js/MyUi.js"></script>

<script type="text/javascript">

</script>

</body>
</html>