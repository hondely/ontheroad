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
            <li >追梦良品</li>
            <li>良品管理</li>
            <li>详情</li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">

    <div class="form-horizontal">

        <div class="form-group">
            <label class="col-sm-2 control-label">缩略图</label>
            <div class="col-sm-6">
                <div class="thumbnail">
                    <img alt="缩略图" id="thumbnailImg"  onclick="showWpUploader()" src="<?php echo ($around["thumbnail"]); ?>" style="height: 240px; width: 540px; display: block;cursor: pointer;">
                </div>
            </div>
            <input type="text" style="display: none" name="thumbnail" id="thumbnail" value="<?php echo ($around["thumbnail"]); ?>">
        </div>

        <div class="form-group" >
            <label for="name" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" id="name" value="<?php echo ($around["name"]); ?>" placeholder="">
            </div>
        </div>

        <div class="form-group" style="text-align: center">
            <label for="price" class="col-sm-2 control-label">价格</label>
            <div class="col-sm-2">
                <input type="number" min="1" class="form-control" id="price" value="<?php echo ($around["price"]); ?>" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label for="brief" class="col-sm-2 control-label">简介</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="brief" name="brief" value="<?php echo ($around["brief"]); ?>" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">详述</label>
            <div class="col-sm-10">
                <textarea id="detail" name="detail"  style="width:100%;height:300px;">
                    <?php echo ($around["detail"]); ?>
                </textarea>
            </div>
        </div>
        <input style="display: none" id="id" value="<?php echo ($around["id"]); ?>">
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

    wpUploader.formData={'type':'aroound'};
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
        window.editor = K.create('#detail');
    });

    function saveInfo(){
        var id=$('#id').val();
        var thumbnail=$('#thumbnail').val();
        var name=$('#name').val();
        var price=$('#price').val();
        var brief=$('#brief').val();
        price=parseInt(parseFloat(price)*100);
        var classId="<?php echo ($classId); ?>";

        var editorHtml =""+editor.html();
        var detail=editorHtml;

        data = new FormData();
        data.append("id",id);
        data.append("thumbnail",thumbnail);
        data.append("name",name);
        data.append("price",price);
        data.append("brief",brief);
        data.append("detail",detail);

        var url="<?php echo U('Around/detail');?>";
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
                    top.topManager.reloadPage('roomType');
                    myUi.alert('成功.',1,function(ret){
                        top.topManager.reloadPage('around');
                    });
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