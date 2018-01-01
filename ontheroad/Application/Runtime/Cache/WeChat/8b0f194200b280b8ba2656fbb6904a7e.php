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


<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/aui-slide.css" />
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/order/style.css" />
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/MyCenter/wp-list-view.css" />
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/common/css/wp-color.css" />

<header id="header" class="aui-bar aui-bar-nav aui-bar-light">
    <a href="javascript:history.back(1);" class="aui-pull-left aui-btn">
        <span class="aui-iconfont aui-icon-left"></span>
    </a>
    <div  class="aui-title "><?php echo ($typeName); ?></div>
</header>

<div id="content"  class="aui-content aui-margin-b-15" >
    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="wp-list-item wp-btn" onclick="wpBase.tab('MyCenter\/detailForMulti?id=<?php echo ($vo["id"]); ?>&typeName=<?php echo ($typeName); ?>')">
            <div class="wp-list-item-img-div">
                <img alt="<?php echo ($vo["title"]); ?>" src="<?php echo ($vo["thumbnail"]); ?>">
            </div>
            <div class="wp-list-item-info-div">
                <div>
                    <?php echo (subtext($vo["title"],'25')); ?>
                </div>
                <div >
                    <!--<span class="wp-color-silver"><?php echo ($vo["time"]); ?></span>-->
                    <span class="wp-color-silver aui-iconfont aui-icon-like"><?php echo ($vo["hot_degress"]); ?></span>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-slide.js"></script>
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