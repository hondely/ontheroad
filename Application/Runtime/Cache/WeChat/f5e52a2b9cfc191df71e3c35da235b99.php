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

<div id="content"  class="aui-content aui-margin-b-15" style="display: table;vertical-align: middle;">

    <div id="aui-slide" style="width: 100%;">
        <div class="aui-slide-wrap" >
            <div class="aui-slide-node bg-dark">
                <img  src="/ontheroad/Public/WeChat/images/l5.png" />
            </div>
            <div  class="aui-slide-node bg-dark">
                <img src="/ontheroad/Public/WeChat/images/l6.png" />
            </div>
            <div class="aui-slide-node bg-dark">
                <img src="/ontheroad/Public/WeChat/images/l7.png" />
            </div>
        </div>
        <div class="aui-slide-page-wrap"><!--分页容器--></div>
    </div>

    <div style="display: table-row;">
        <div style="display: table;width: 100%;height: 100%;vertical-align: middle;">
            <div  style="display: table-cell;width: 50%;vertical-align: middle;text-align: center;border: 1px solid white;">
                <div class="wp-btn" style="height: 50%;width:100%;display: table;vertical-align: middle;text-align: center;background-size: 100% 100%;background-repeat: no-repeat; background-image: url('/ontheroad/Public/WeChat/images/order.png');border: 1px solid white;">
                    <div style="display: table-cell;vertical-align: middle;text-align: center;">
                        <div class="wp-text-white">
                            <span class="wp-iconfont  wp-icon-order aui-font-size-20"></span>
                        </div>
                        <div class="wp-text-white">旅舍预定</div>
                    </div>
                </div>

                <div class="wp-btn" style="height: 50%;width:100%;display: table;vertical-align: middle;text-align: center;background-size: 100% 100%;background-repeat: no-repeat; background-image: url('/ontheroad/Public/WeChat/images/path.png');border: 1px solid white;">
                    <div style="display: table-cell;vertical-align: middle;text-align: center;">
                        <div class="wp-text-white">
                            <span class="wp-iconfont wp-icon-path aui-font-size-20"></span>
                        </div>
                        <div class="wp-text-white">路线制定</div>
                    </div>
                </div>
            </div>
            <div class="wp-btn" style="display: table-cell;width: 50%;vertical-align: middle;text-align: center;border: 1px solid white;background-size: 100% 100%;background-repeat: no-repeat; background-image: url('/ontheroad/Public/WeChat/images/around.png') ;">
                <div class="wp-text-white">
                    <span class="aui-iconfont aui-icon-cart aui-font-size-20"></span>
                </div>
                <div class="wp-text-white">周边</div>
            </div>
        </div>
    </div>


</div>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-slide.js"></script>
<script type="text/javascript">
    var auiSlide = new auiSlide({
        container:document.getElementById("aui-slide"),
        // "width":300,
        "height":'100px',
        "speed":500,
        "autoPlay": 3000, //自动播放
        "loop":true,
        "pageShow":true,
        "pageStyle":'dot',
        'dotPosition':'center'
    })
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