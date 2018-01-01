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



<link rel="stylesheet" href="/ontheroad/Public/Admin/kindeditor/plugins/code/prettify.css" />

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li >文档中心</li>
            <li>撰写文档</li>
            <li><?php echo ($info["mark"]); ?></li>
        </ol>
    </div>
</div>

<div class="container wp-margin-bottom-50px">
    <div class="col-sm-12">
        <textarea id="detail" name="detail" style="width:100%;height:300px;">
            <?php echo ($info["content"]); ?>
        </textarea>
        <input id="document" type="text" style="display: none;" value="<?php echo ($info["id"]); ?>">
    </div>

    <div class="col-sm-12 wp-margin-top-15px">
        <!--<button type="button" onclick="preview()" class="btn btn-info">&nbsp;&nbsp;预览&nbsp;&nbsp;</button>-->
        <!--<button type="button" onclick="saveInfo()" class="btn btn-success wp-margin-left-15px">&nbsp;&nbsp;保存&nbsp;&nbsp;</button>-->
        <button type="button" onclick="saveInfo()" class="btn btn-success">&nbsp;&nbsp;保存&nbsp;&nbsp;</button>
    </div>
</div>

<script charset="utf-8" src="/ontheroad/Public/Admin/kindeditor/plugins/code/prettify.js"></script>

<script charset="utf-8" src="/ontheroad/Public/Admin/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="/ontheroad/Public/Admin/kindeditor/lang/zh-CN.js"></script>

<script>

    KindEditor.ready(function(K) {
        window.editor = K.create('#detail');
    });

    function preview(){
        myUi.alert('成功.',1,function(ret){});
    }

    function saveInfo(){
        var id=$('#document').val();
        var editorHtml =""+editor.html();
        var detail=editorHtml;

        data = new FormData();
        data.append("id",id);
        data.append("content",detail);

        var url="<?php echo U('DocumentCenter/editForSingle');?>";
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