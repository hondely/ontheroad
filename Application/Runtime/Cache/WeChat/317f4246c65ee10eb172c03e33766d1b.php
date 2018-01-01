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

<header id="header" class="aui-bar aui-bar-nav aui-bar-light">
    <a href="javascript:history.back(1);" class="aui-pull-left aui-btn">
        <span class="aui-iconfont aui-icon-left"></span>
    </a>
    <div  class="aui-title ">旅舍预定</div>
</header>

<div id="content"  class="aui-content aui-margin-b-15" >

    <div id="aui-slide" class="wp-width-100-percent" >
        <div class="aui-slide-wrap" >
            <?php if(is_array($bannerlist)): $i = 0; $__LIST__ = $bannerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div onclick="wpBase.href('<?php echo ($vo["url"]); ?>')" class="aui-slide-node bg-dark">
                    <img  src="<?php echo ($vo["pic"]); ?>" />
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="aui-slide-page-wrap"><!--分页容器--></div>
    </div>

    <div class="wp-car-list">

        <?php if(is_array($roomTypeList)): $i = 0; $__LIST__ = $roomTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div onclick="wpBase.href('Order/detail',{id:'<?php echo ($vo["id"]); ?>'})"  class="aui-margin-l-15 aui-margin-r-15 wp-btn wp-car-list-item wp-border-radius-5" >
                <img  class="wp-width-100-percent" src="<?php echo ($vo["thumbnail"]); ?>">
                <div >
                    <div class="wp-about">
                        <div  class="wp-car-list-item-describe"><?php echo ($vo["brief"]); ?></div>
                        <div class="wp-car-list-item-titel"><?php echo ($vo["name"]); ?><span class="aui-text-danger wp-font-weigh-bold">&nbsp;&nbsp;￥<?php echo ($vo["price"]); ?></span></div>
                    </div>
                    <div class="wp-order">
                        <div   class="aui-btn wp-order-btn">预定</div>
                    </div>
                    <div class="wp-clear-both">
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <!--<div onclick="wpBase.href('Order/detail',{asd:'234'})"  class="aui-margin-l-15 aui-margin-r-15 wp-btn wp-car-list-item wp-border-radius-5" >-->
            <!--<img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/order/item1.png">-->
            <!--<div >-->
                <!--<div class="wp-about">-->
                    <!--<div  class="wp-car-list-item-describe">独立卫浴，私人存储柜，24小时热水，空调。</div>-->
                    <!--<div class="wp-car-list-item-titel">床位4人间<span class="aui-text-danger wp-font-weigh-bold">&nbsp;&nbsp;￥55</span></div>-->
                <!--</div>-->
                <!--<div class="wp-order">-->
                    <!--<div   class="aui-btn wp-order-btn">预定</div>-->
                <!--</div>-->
                <!--<div class="wp-clear-both">-->
                <!--</div>-->
            <!--</div>-->
         <!--</div>-->

        <!--<div  class="aui-margin-l-15 aui-margin-r-15 wp-btn wp-car-list-item wp-border-radius-5" >-->
            <!--<img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/order/item2.png">-->
            <!--<div>-->
                <!--<div class="wp-about">-->
                    <!--<div  class="wp-car-list-item-describe">精致的房间设施用品，人性化贴心的服务。</div>-->
                    <!--<div  class="wp-car-list-item-titel">臻选标准间<span class="aui-text-danger wp-font-weigh-bold">&nbsp;&nbsp;￥198</span></div>-->
                <!--</div>-->
                <!--<div class="wp-order">-->
                    <!--<div class="aui-btn wp-order-btn">预定</div>-->
                <!--</div>-->
                <!--<div class="wp-clear-both">-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div  class="aui-margin-l-15 aui-margin-r-15 wp-btn wp-car-list-item wp-border-radius-5" >-->
            <!--<img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/order/item3.png">-->
            <!--<div >-->
                <!--<div class="wp-about">-->
                    <!--<div  class="wp-car-list-item-describe">精致的房间设施用品，人性化贴心的服务。</div>-->
                    <!--<div  class="wp-car-list-item-titel">雅致大床房<span class="aui-text-danger wp-font-weigh-bold">&nbsp;&nbsp;￥188</span></div>-->
                <!--</div>-->
                <!--<div class="wp-order">-->
                    <!--<div   class="aui-btn wp-order-btn">预定</div>-->
                <!--</div>-->
                <!--<div class="wp-clear-both">-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div  class="aui-margin-l-15 aui-margin-r-15 wp-btn wp-car-list-item wp-border-radius-5" >-->
            <!--<img class="wp-width-100-percent" src="/ontheroad/Public/WeChat/images/order/item4.png">-->
            <!--<div>-->
                <!--<div  class="wp-about">-->
                    <!--<div class="wp-car-list-item-describe">深度定制主题房，悦旅行悦生活。</div>-->
                    <!--<div class="wp-car-list-item-titel">熊猫王国主题房<span class="aui-text-danger wp-font-weigh-bold">&nbsp;&nbsp;￥358</span></div>-->
                <!--</div>-->
                <!--<div class="wp-order">-->
                    <!--<div class="aui-btn wp-order-btn">预定</div>-->
                <!--</div>-->
                <!--<div class="wp-clear-both">-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

    </div>

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