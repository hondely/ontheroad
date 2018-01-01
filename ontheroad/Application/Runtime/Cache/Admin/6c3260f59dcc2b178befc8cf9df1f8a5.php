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



<link href="/ontheroad/Public/Admin/myStyle/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/common/wpUI/css/style.css">
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/common/wpUI/css/myUi.css">

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li >首页</li>
            <li>追梦良品</li>
            <li>良品管理</li>
            <li>类别管理</li>
        </ol>
    </div>
</div>

<div class="container">

    <div class="row " style="margin-top: 15px;">
        <div class="col-md-6">
            <table class="table table-hover table-bordered table-condensed " style="border: 0px solid red;">
                <thead class="my-table" style="border-top: 1px solid #ddd;background-color:#c0c0c0;">
                    <tr >
                        <th >序号</th>
                        <th >类别名称</th>
                        <!--<th class="my-width-100px ">操作</th>-->
                   </tr>
                </thead>

                <tbody class="my-table">

                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="classId<?php echo ($vo["id"]); ?>" onclick="selectedClass('<?php echo ($vo["id"]); ?>')">
                        <th><?php echo ($k); ?></th>
                        <td ><?php echo ($vo["name"]); ?></td>
                        <!--<td>-->
                            <!--<a  class="btn btn-danger" title="删除"  href="<?php echo U('Withdrawal/edit',array('id'=>$vo['id'],'is_done'=>'1'));?>">-->
                                <!--删除-->
                            <!--</a>-->
                        <!--</td>-->
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <div>
                <div class="form-horizontal">
                    <div class="form-group" style="text-align: center">
                        <label for="className" class="col-md-2 control-label">类型名称</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="className" placeholder="">
                        </div>
                    </div>
                    <div class="row col-md-offset-2" style="text-align: left">
                        <button type="button" onclick="renameClass()" class="btn btn-success">保存</button>
                        <button type="button" onclick="add()" class="btn btn-info wp-margin-left-15px">新增</button>
                        <button type="button" onclick="deleteClass()" class="btn btn-danger wp-margin-left-15px">删除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="/ontheroad/Public/Admin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUI/js/MyUi.js"></script>
<script>
    var selectedClassId=1;
    function selectedClass(id){
        $('#classId'+selectedClassId).removeClass('info');
        $('#classId'+id).addClass('info');
        selectedClassId=id;
    }

    function renameClass(){
        var name=$('#className').val();
        if(name==""){
            window.parent.myUi.alert("请输入类型名称！",1,function(ret){});
            return ;
        }
        var host=window.location.host;
        var url="http://"+host+"<?php echo U('renameClass','','');?>";
        url+='/name/'+name+'/id/'+selectedClassId;
        window.location.href=url;
    }

    function add(){
        var name=$('#className').val();
        if(name==""){
            window.parent.myUi.alert("请输入类型名称！",1,function(ret){});
            return ;
        }
        var host=window.location.host;
        var url="http://"+host+"<?php echo U('addClass','','');?>";
        url+='/name/'+name;
        window.location.href=url;
    }

    function deleteClass(){
        window.parent.myUi.showMessageBox("数据无价，请谨慎操作，确定删除?",1,function(ret){
            if(ret){
                var host=window.location.host;
                var url="http://"+host+"<?php echo U('deleteClass','','');?>";
                url+='/id/'+selectedClassId;
                window.location.href=url;
            }
        });
    }
    top.topManager.reloadPage('around');
</script>
<script type="text/javascript" src="/ontheroad/Public/Admin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/js/wp-globals.js"></script>
<script type="text/javascript" src="/ontheroad/Public/common/wpUI/js/MyUi.js"></script>

<script type="text/javascript">

</script>

</body>
</html>