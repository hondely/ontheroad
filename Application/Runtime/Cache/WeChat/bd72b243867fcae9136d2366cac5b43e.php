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
<link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/around/style.css" />

<header id="header" class="aui-bar aui-bar-nav aui-bar-light">
    <a href="javascript:history.back(1);" class="aui-pull-left aui-btn">
        <span class="aui-iconfont aui-icon-left"></span>
    </a>
    <div  class="aui-title "><?php echo ($info["name"]); ?></div>
</header>

<div id="content"  class="aui-content aui-margin-b-15 " >
    <div class=" wp-bg-white wp-margin-a-15-px">
        <div class="wp-pandding-a-15" >
            <?php echo ($info["detail"]); ?>
        </div>
    </div>
    <div style="height: 50px;"></div>
</div>

<div style="position: fixed;bottom: 0px;width: 100%;padding: 10px;background-color: white;" class="">
    <div class="aui-row">
        <div  class="aui-col-xs-4">
            <div style="padding: 5px;">
                <i onclick="countUpdate(-1)" style="border: 1px solid #000000;padding: 3px;" class="wp-btn aui-iconfont aui-icon-minus"></i>
                <span id="count" style="text-align: center;display: inline-block;width: 30px;">1</span>
                <i onclick="countUpdate(1)" style="border: 1px solid #000000;padding: 3px;"  class="wp-btn aui-iconfont aui-icon-plus"></i>
            </div>
        </div>
        <div  class="aui-col-xs-4">
            <div style="padding: 5px;">
                <span>￥<span id="cash_fee" style="color: red;" ><?php echo ($info["price"]); ?></span></span>
            </div>
        </div>
        <input id="price" style="display: none;" value="<?php echo ($info["price"]); ?>">
        <div class="aui-col-xs-4">
            <div style="text-align: center;background-color: red;color: white;border-radius: 5px;padding: 5px;" class="wp-btn">
                购买
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/jquery.min.js" ></script>

<script type="text/javascript">

    function toDecimal2(x) {
        var f = parseFloat(x);
        if (isNaN(f)) {
            return false;
        }
        var f = Math.round(x*100)/100;
        var s = f.toString();
        var rs = s.indexOf('.');
        if (rs < 0) {
            rs = s.length;
            s += '.';
        }
        while (s.length <= rs + 2) {
            s += '0';
        }
        return s;
    }

    function countUpdate(val){
        var count=$('#count').html();
        var price=$('#price').val();
        count= parseInt(val)+parseInt(count);
        count<1?count=1:'';
        price=price*count;
        $('#count').html(count);
        $('#cash_fee').html(toDecimal2(price));
    }
</script>
</body>

<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-tab.js" ></script>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/wp-base.js" ></script>

</html>