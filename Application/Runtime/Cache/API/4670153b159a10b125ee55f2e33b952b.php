<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/aui.2.0.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/wp-base.css" />
    <link rel="stylesheet" type="text/css" href="/ontheroad/Public/WeChat/css/weui.css" />
</head>

<body style="background-color: #f8f8f8;" ontouchstart="">
<div class="page">
    <div class="page__hd" style="padding: 40px 15px;">
        <h1 class="page__title" style="text-align: left;font-size: 20px;font-weight: 400;">订单详情</h1>
    </div>
    <div class="page__bd">
        <div class="weui-form-preview">
            <div class="weui-form-preview__hd">
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">付款金额</label>
                    <em class="weui-form-preview__value">¥2400.00</em>
                </div>
            </div>
            <div class="weui-form-preview__bd">
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">商品</label>
                    <span class="weui-form-preview__value">苹果</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">单价</label>
                    <span class="weui-form-preview__value">1</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">数量</label>
                    <span class="weui-form-preview__value">1</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">单号</label>
                    <span class="weui-form-preview__value">2017043010000</span>
                </div>

            </div>

            <div class="weui-form-preview__ft ">
                <div onclick="callpay()" class="weui-btn weui-btn_primary wp-width-100-percent wp-margin-a-15-px"  id="showTooltips">支付</div>
            </div>
        </div>
    </div>

    <div class="weui-footer weui-footer_fixed-bottom">
        <p class="weui-footer__links">
            <a href="javascript:home();" class="weui-footer__link">Dream it. Build it. Love it.</a>
        </p>
        <p class="weui-footer__text">Powered by WP &copy; itiswpweb.com</p>
    </div>

</div>
<script type="text/javascript" src="/ontheroad/Public/WeChat/js/aui-toast.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script type="text/javascript">
    var toast = new auiToast();
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
            <?php echo $jsApiParameters; ?>,
            function(res){
                if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                    window.location="<?php echo U('success');?>";
                }else{
                    toast.fail({
                        title:"支付失败请重试",
                        duration:2000
                    });
                }
            }
        );
    }

    function callpay()
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }

    function onBridgeReady(){
        WeixinJSBridge.call('hideOptionMenu');
    }

    if (typeof WeixinJSBridge == "undefined"){
        if( document.addEventListener ){
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        }else if (document.attachEvent){
            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
        }
    }else{
        onBridgeReady();
    }
</script>

</body>
</html>