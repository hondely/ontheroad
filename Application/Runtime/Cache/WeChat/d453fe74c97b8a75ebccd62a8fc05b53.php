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
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/index.css" />

<header  style="background: rgba(255,255,255,0.5);height: 48px;border-bottom: 0px solid #dddddd">
    <a href="<?php echo U('Regist/Index');?>" class="wp-btn header-btn header-left" >
        <span class="aui-iconfont aui-icon-my aui-font-size-18"></span>
    </a>
    <img  src="/ontheroad/Public/WeChat/images/IMG_1585_max.PNG">
    <a class="wp-btn header-btn header-right" >
        <span class="aui-iconfont aui-icon-comment aui-font-size-18"></span>
    </a>
</header>

<div id="content"  class="aui-content aui-margin-b-15" >

    <div id="aui-slide" class="wp-width-100-percent">
        <div class="aui-slide-wrap" >
            <?php if(is_array($bannerlist)): $i = 0; $__LIST__ = $bannerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div onclick="wpBase.href('<?php echo ($vo["url"]); ?>')" class="aui-slide-node bg-dark">
                    <img  src="<?php echo ($vo["pic"]); ?>" />
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--<div onclick="wpBase.href()" class="aui-slide-node bg-dark">-->
                <!--<img  src="/ontheroad/Public/WeChat/images/l5.png" />-->
            <!--</div>-->
            <!--<div  class="aui-slide-node bg-dark">-->
                <!--<img src="/ontheroad/Public/WeChat/images/l6.png" />-->
            <!--</div>-->
            <!--<div class="aui-slide-node bg-dark">-->
                <!--<img src="/ontheroad/Public/WeChat/images/l7.png" />-->
            <!--</div>-->
        </div>
        <div class="aui-slide-page-wrap"><!--分页容器--></div>
    </div>

    <div class="wp-car-list">
        <div onclick="wpBase.tab('MyCenter\/index')" class="wp-btn wp-car-list-item" >
                <img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/index/item1.jpg">
                <div  class="wp-car-list-item-describe">成为追梦会员，您能够享受更多的优惠和权益！每日签到有惊喜！</div>
                <div class="wp-car-list-item-titel">会员计划</div>
        </div>

        <div  onclick="wpBase.tab('Order\/index')" class="wp-btn wp-car-list-item" >
            <img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/index/item2.jpg">
            <div class="wp-car-list-item-describe">更加直接的旅舍预订方式，注册成为会员还能享受折扣优惠哦！</div>
            <div class="wp-car-list-item-titel">旅舍预订</div>
        </div>

        <div onclick="wpBase.tab('Around\/index')"  class="wp-btn wp-car-list-item" >
            <img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/index/item3.jpg">
            <div class="wp-car-list-item-describe">旅行和生活，因美好而铭记。不惧风雨，继续对世界上瘾！</div>
            <div class="wp-car-list-item-titel">追梦良品</div>
        </div>

        <div onclick="wpBase.tab('Path\/index')"   class="wp-btn wp-car-list-item" >
            <img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/index/item4.jpg">
            <div class="wp-car-list-item-describe">用一颗文艺的心，感受旅途的乐趣。户外旅行我们更加专业！</div>
            <div class="wp-car-list-item-titel">旅行线路</div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-slide.js"></script>
<script type="text/javascript">
    auiSliderHeight='330px';
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