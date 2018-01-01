(function(global){

    var wpBase=function(){};

    wpBase.prototype={
        'appName':'ontheroad',
        'enterFile':'index.php',
        'module':'WeChat'
	};

    //wpBase.auiSliderHeight="330px";
    function loadSlide(){
        var slider=document.getElementById("aui-slide");
        if(slider){
            auiSlide = new global.auiSlide({
                container:slider,
                // "width":300, //宽度
                "height":global.auiSliderHeight, //高度
                "speed":500, //速度
                "autoPlay": 3000, //自动播放
                "loop":true,//是否循环
                "pageShow":true,//是否显示分页器
                "pageStyle":'dot', //分页器样式，分dot,line
                'dotPosition':'center' //当分页器样式为dot时控制分页器位置，left,center,right
            })
        }
    }

    wpBase.intLayout=function(){
        var windowH=$(window).height();
        var footerH=$('#footer').height();
        var headerH=$('#header').height();
        var contenH=windowH-footerH-headerH;
        //headerH?contenH=windowH-footerH:contenH=windowH-footerH-headerH;
        $('#content').height(contenH);
        loadSlide();
    };

    wpBase.tab=function(path){
        path="http://"+window.location.host+"\/"
            +this.prototype.appName+"\/"+
            this.prototype.enterFile+"\/"+
            this.prototype.module+"\/"
            +path;
       window.location.href=path;
    }

    wpBase.href=function(path,par){
        if(path.match('http')){
            window.location.href=path;
        }else{
            path="http://"+window.location.host+"\/"
            +this.prototype.appName+"\/"+
            this.prototype.enterFile+"\/"+
            this.prototype.module+"\/"
            +path;
            for (var key in par) {
                path+='\/'+key+'\/'+par[key];
            }
            window.location.href=path;
        }
        //https://item.taobao.com/item.htm?spm=a230r.1.14.14.lD1I2o&id=532126018025&ns=1&abbucket=2#detail
    }

    global.wpBase=wpBase;
    wpBase.intLayout();
})(this)