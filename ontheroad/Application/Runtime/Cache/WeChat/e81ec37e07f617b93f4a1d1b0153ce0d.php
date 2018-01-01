<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>追梦青年旅舍</title>
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/aui.2.0.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/wp-base.css" />

    <style type="text/css">
        /*.active{*/
            /*border-bottom: 3px solid red;*/
        /*}*/
    </style>
</head>

<body class="wp-bg-silver" ontouchstart="" >

<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/around/style.css" />

<header id="header" class="aui-bar aui-bar-nav aui-bar-light">
    <a href="javascript:history.back(1);" class="aui-pull-left aui-btn">
        <span  class="aui-iconfont aui-icon-left"></span>
    </a>
    <div class="aui-title ">追梦良品</div>
</header>

<div id="content"  class="aui-content aui-margin-b-15" >
    <div >
        <ul id="wp-select-class">
            <?php if(-1 == $classId): ?><li class="wp-btn type-one type-one-selected">
                    <a href="<?php echo U('Around/index');?>">所有</a>
                </li>
                <?php else: ?>
                <li class="wp-btn type-one">
                    <a href="<?php echo U('Around/index');?>">所有</a>
                </li><?php endif; ?>
            <?php if(is_array($classList)): $k = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo["id"] == $classId): ?><li class="wp-btn type-one type-one-selected">
                        <a href="<?php echo U('Around/index',array('class'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                    </li>
                    <?php else: ?>
                    <li class="wp-btn type-one">
                        <a href="<?php echo U('Around/index',array('class'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li class="wp-clear-both"></li>
        </ul>
    </div>

    <div >
        <?php if(is_array($aroundList)): $i = 0; $__LIST__ = $aroundList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div  onclick="wpBase.href('Around/detail',{id:'<?php echo ($vo["id"]); ?>'})" class="wp-btn wp-waterfall-box">
                <div  class="wp-waterfall-box-bg">
                    <img  src="<?php echo ($vo["thumbnail"]); ?>" />
                    <div class="wp-waterfall-box-content">
                        <div class="wp-waterfall-box-l">
                            <p  class="wp-waterfall-box-about" ><?php echo ($vo["brief"]); ?></p>
                            <p  class="wp-waterfall-box-name" ><?php echo ($vo["name"]); ?></p>
                            <p  class="wp-waterfall-box-price" >￥<?php echo ($vo["price"]); ?></p>
                        </div>
                        <div class="wp-waterfall-box-r">
                            <div  class="aui-btn aui-btn-danger wp-waterfall-box-order-btn" >购买</div>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <div style="clear: both;"></div>
    </div>
</div>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>

<script type="text/javascript">
    auiSliderHeight="200px";
</script>

<footer style="z-index: 4096 !important;" id="footer" class="aui-bar aui-bar-tab" >

    <div onclick="wpBase.tab('Index\/index')" class="wp-btn aui-bar-tab-item <?php if($controller == index ): ?>aui-active<?php else: endif; ?>">
        <i class="aui-iconfont  aui-icon-home"></i>
        <div class="aui-bar-tab-label">首页</div>
    </div>

    <div onclick="wpBase.tab('Order\/index')" class="wp-btn aui-bar-tab-item <?php if($controller == order ): ?>aui-active<?php else: endif; ?>">
        <i class="wp-iconfont  wp-icon-order"></i>
        <div class="aui-bar-tab-label">旅舍预定</div>
    </div>

    <div onclick="wpBase.tab('Around\/index')" class="wp-btn aui-bar-tab-item <?php if($controller == around ): ?>aui-active<?php else: endif; ?>">
        <i class="aui-iconfont aui-icon-cart"></i>
        <div class="aui-bar-tab-label">追梦良品</div>
    </div>

    <div onclick="wpBase.tab('MyCenter\/index')" class="wp-btn aui-bar-tab-item <?php if($controller == myCenter ): ?>aui-active<?php else: endif; ?>">
        <!--<div class="aui-badge">99</div>-->
        <i class="aui-iconfont aui-icon-my"></i>
        <div class="aui-bar-tab-label">会员中心</div>
    </div>
</footer>
</body>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-tab.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/wp-base.js" ></script>

</html>