(function(global){

    var wpUtil=function(){};

    wpUtil.prototype={
        'appName':'ontheroad',
        'enterFile':'index.php',
        'module':'WeChat'
	};

    wpUtil.isPhoneNumber=function(str) {
        re = /^1\d{10}$/;
        return re.test(str);
    }

    global.wpUtil=wpUtil;
})(this)