<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>追梦青年旅舍</title>
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/aui.2.0.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/wp-base.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/MyCenter/style.css" />
</head>

<body ontouchstart="" >

<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/aui-slide.css" />
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/index.css" />

<div id="content"  class="aui-content" >

    <div style="width: 100%;height: 200px;background-image: url('/ontheroad/Public/WeChat/images/MyCenter/headerBg.png');background-size: 100% 100%;"  class="wp-text-align-center aui-margin-b-10">
        <?php if(($userInfo["headimgurl"]) == ""): ?><img style="margin-top: 15px;width: 80px;height: 80px;border-radius:40px;" src="/ontheroad/Public/WeChat/images/myCenter/userIco.png">
            <div style="color: white;font-weight: bold;">Allen</div>
            <?php else: ?>
            <img style="margin-top: 15px;width: 80px;height: 80px;border-radius:40px;" src="<?php echo ($userInfo["headimgurl"]); ?>">
            <div style="color: white;font-weight: bold;"><?php echo ($userInfo["nickname"]); ?></div><?php endif; ?>

        <div style="margin-right: 15%;margin-left: 15%;" >
            <div style="width: 25%;float: left;">
                <img class="wp-btn" style="width: 50px;height: 50px;border-radius:25px;display: inline;" src="/ontheroad/Public/WeChat/images/myCenter/vipIcon1.png">
                <div style="margin-top: -10px;">白卡</div>
            </div>
            <div style="width: 25%;float: left;">
                <img class="wp-btn" style="width: 50px;height: 50px;border-radius:25px;display: inline;" src="/ontheroad/Public/WeChat/images/myCenter/userSet.png">
                <div style="margin-top: -10px;">账户</div>
            </div>
            <div style="width: 25%;float: left;">
                <img class="wp-btn" style="width: 50px;height: 50px;border-radius:25px;display: inline;" src="/ontheroad/Public/WeChat/images/myCenter/order.png">
                <div style="margin-top: -10px;">订单</div>
            </div>
            <div style="width: 25%;float: left;">
                <img class="wp-btn" style="width: 50px;height: 50px;border-radius:25px;display: inline;" src="/ontheroad/Public/WeChat/images/myCenter/notice.png">
                <div style="margin-top: -10px;">通知</div>
            </div>
        </div>
    </div>

    <div class="aui-margin-b-10">
        <div  class="wp-row">
            <div class="wp-col ">
                <div class="wp-btn">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item1.png">
                    <div>优惠券</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'1'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item2.png">
                    <div>客房服务</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForMulti',{'type':'2','typeName':'旅游手册'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item3.png">
                    <div>旅游手册</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item4.png">
                    <div>收藏</div>
                </div>
            </div>
        </div>

        <div  class="wp-row">
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForMulti',{'type':'4','typeName':'户外路线'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item5.png">
                    <div>户外路线</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForMulti',{'type':'4','typeName':'旅行社报团'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item6.png">
                    <div>旅行社报团</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'2'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item7.png">
                    <div>DreamWalk</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForMulti',{'type':'1','typeName':'精彩图集'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item8.png">
                    <div>精彩图集</div>
                </div>
            </div>
        </div>
    </div>

    <div class="aui-margin-b-10">
        <div  class="wp-row">
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'3'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item9.png">
                    <div>停车场</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'4'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item10.png">
                    <div>晾晒区</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'5'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item11.png">
                    <div>叫醒服务</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item12.png">
                    <div>追梦良品</div>
                </div>
            </div>
        </div>

        <div  class="wp-row">
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'6'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item13.png">
                    <div>萌庭放映室</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'7'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item14.png">
                    <div>时光书吧</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn" onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'8'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item15.png">
                    <div>潘小姐餐厅</div>
                </div>
            </div>
            <div class="wp-col ">
                <div class="wp-btn"  onclick="wpBase.href('MyCenter\/indexForSingle',{'id':'9'})">
                    <img  src="/ontheroad/Public/WeChat/images/myCenter/item16.png">
                    <div>追梦青年</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-slide.js"></script>


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