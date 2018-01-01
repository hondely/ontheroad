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
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/order/wp-tab.css" />
<!--<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/order/163css.css" />-->
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/wp-calendar.css" />

<header id="header" class="aui-bar aui-bar-nav aui-bar-light">
    <a href="javascript:history.back(1);" class="aui-pull-left aui-btn">
        <span class="aui-iconfont aui-icon-left"></span>
    </a>
    <div  class="aui-title "><?php echo ($info["name"]); ?></div>
</header>

<div id="content"   class="aui-content aui-margin-b-15 " >
    <div class="wp-bg-white">
        <img style="display: block;" class="wp-width-100-percent" src="<?php echo ($info["thumbnail"]); ?>">
    </div>

    <div  class="wp-tab-box">
        <div class="wp-tab-box-top">
            <div id="wp-tab-box-top-nav" class="wp-tab-box-top-nav">
                <div class="wp-tab-box-top-nav-on wp-btn">房型介绍</div>
                <div class="wp-btn">预定</div>
                <span class="wp-clear-both"></span>
            </div>
            <span  id="wp-tab-box-top-line" class="wp-tab-box-top-line"></span>
        </div>

        <div  id="wp-tab-box-content" class="wp-tab-box-content  aui-margin-t-15 wp-margin-b-30">

            <div class="wp-tab-box-content-box">
                <div class="wp-border-radius-5 wp-bg-white ">
                    <div id="infoContent"  class="wp-pandding-a-15 wp-kindeditor-content" >
                        <?php echo ($info["detail"]); ?>
                    </div>
                </div>
             </div>

            <div class="wp-tab-box-content-box">
                <div class="wp-border-radius-5 wp-bg-white">
                    <div class="wp-pandding-a-15" >
                        <div class="wp-order-date">
                            <div onclick="orderDateStart()" class="wp-order-date-start">
                                <h3>入住时间</h3>
                                <span id="startDate">2016-05-02</span>
                                <!--<span >(周四)</span>-->
                            </div>
                            <div  onclick="orderDateEnd()" class="wp-order-date-end">
                                <h3>退房时间</h3>
                                <span id="endDate">2016-05-02</span>
                                <!--<span >(周五)</span>-->
                            </div>
                            <span class="wp-clear-both"></span>
                        </div>
                    </div>
                </div>

                <div class="wp-border-radius-5 wp-bg-white  aui-margin-t-15">
                    <div class="wp-pandding-a-15 wp-width-100-percent wp-order-info" >

                        <div class="wp-width-100-percent  wp-form-inline">
                            <div class="wp-form-inline-text" >住几间</div>
                            <div class="wp-form-inline-input" >
                                <select>
                                    <option value="1">1间</option>
                                    <option value="2">2间</option>
                                </select>
                            </div>
                            <span class="wp-clear-both"></span>
                        </div>

                        <div class="wp-width-100-percent aui-margin-t-15">
                            <div class="wp-form-inline-text">手机号</div>
                            <div class="wp-form-inline-input">
                                <input type="number"  placeholder="用于预定房间">
                            </div>
                            <span class="wp-clear-both"></span>
                        </div>

                        <div class="wp-width-100-percent aui-margin-t-15" >
                            <div class="wp-form-inline-text">入住人</div>
                            <div class="wp-form-inline-input">
                                <input type="text"  placeholder="姓名，只需填写一人">
                            </div>
                            <span class="wp-clear-both"></span>
                        </div>

                        <div class="wp-width-100-percent aui-margin-t-15">
                            <div class="wp-form-inline-text" >房费</div>
                            <div class="wp-form-inline-input" >
                                <div class="wp-order-total"><span >￥</span><span id="wp-order-total"><?php echo ($info["price"]); ?></span></div>
                            </div>
                            <span class="wp-clear-both"></span>
                        </div>
                    </div>
                </div>

                <div class="wp-border-radius-5 wp-bg-white  aui-margin-t-15">
                    <div class="wp-pandding-a-15 wp-width-100-percent wp-order-pay-way" >
                        <div class="aui-form">
                            <div class="aui-input-row">
                                <label class="aui-input-addon">微信支付</label>
                                <div class="aui-pull-right"><input class="aui-radio" checked="checked" type="radio" name="demo1"></div>
                            </div>
                            <div class="aui-input-row aui-margin-t-15">
                                <label class="aui-input-addon">到店支付</label>
                                <div class="aui-pull-right"><input class="aui-radio" type="radio" name="demo1" ></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div onclick="wxPay()" class="wp-border-radius-5 wp-bg-white  aui-margin-t-15">
                    <div class="aui-btn aui-btn-danger aui-btn-block my-btn">提交订单</div>
                </div>
            </div>

            <span class="wp-clear-both"></span>
        </div>
    </div>
</div>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/wp-calendar.js"></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/wp-tab.js"></script>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/zepto.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-slide.js"></script>

<script type="text/javascript">
    auiSliderHeight="200px";
//    wpCalender.regist(document.getElementById('startDate'));
//    wpCalender.regist(document.getElementById('endDate'));

    function orderDateStart(){
        var startDate=document.getElementById('startDate');
        wpCalender.show(startDate.innerHTML,function(ret){
            var date=new Date(ret);
            startDate.innerHTML= date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
        })
    }

    function orderDateEnd(){
        var endDate=document.getElementById('endDate');
        wpCalender.show(endDate.innerHTML,function(ret){
            var date=new Date(ret);
            endDate.innerHTML= date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
        })
    }

    function wxPay(){

    }
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