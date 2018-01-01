/**
 * Created by 久鹏 on 2016-10-30.
 */
(function(global){
    var wpTab={
        nav_content:0,
        nStartX:0,
        nChangX:0,
        index:0,
        percent:100,
        int: function(){

            this.nav_content=$('#wp-tab-box-top-nav div').length;

            wpTab.percent=100/this.nav_content;
            var percent=wpTab.percent;
            $('#wp-tab-box-top-nav div').css({'width':percent+"%"});
            $('#wp-tab-box-top-line').css({'width':percent+"%"} );

            var totalWidth=this.nav_content*100;
            $('#wp-tab-box-content').css({'width':totalWidth+"%"} );

            var boxList = $("#wp-tab-box-content .wp-tab-box-content-box");
            $.each(boxList, function(){
                $(this).css({'width':percent+"%"} );
            });

            $(".wp-tab-box-content-box").on("touchstart", function(e) {
                wpTab.nStartX =e.originalEvent.targetTouches[0].clientX;
            });

            $(".wp-tab-box-content-box").on("touchend", function(e) {
                wpTab.nChangX =   e.originalEvent.changedTouches[0].pageX;
                if(Math.abs(wpTab.nStartX-wpTab.nChangX)>50){
                    (wpTab.nStartX-wpTab.nChangX)>0?wpTab.index++:wpTab.index--;
                    wpTab.index<0?wpTab.index=0:'';
                    wpTab.index>(wpTab.nav_content-1)?wpTab.index=(wpTab.nav_content-1):'';
                    $('#wp-tab-box-top-nav').children().removeClass('wp-tab-box-top-nav-on');

                    var marginLeft=wpTab.index*percent;
                    $('#wp-tab-box-top-line').css({'margin-left':marginLeft+'%'} );
                    $("#wp-tab-box-top-nav").children().eq(wpTab.index).addClass('wp-tab-box-top-nav-on');

                    marginLeft="-"+wpTab.index*100+"%";
                    $('#wp-tab-box-content').css({'margin-left':marginLeft} );
                }
            });

            $('.wp-tab-box-top-nav div').click(function(){
                var index=$(this).index();
                wpTab.index=index;

                var boxList = $("#wp-tab-box-content .wp-tab-box-content-box");
                $.each(boxList, function(){
                    var i=$(this).index();
                    if(i=index){
                        $(this).css({'display':'block'} );
                    }else{
                        $(this).css({'display':'none'} );
                    }
                });

                $(this).parents().children().removeClass('wp-tab-box-top-nav-on');
                var marginLeft=index*percent;
                $('#wp-tab-box-top-line').css({'margin-left':marginLeft+'%'} );
                $(this).addClass('wp-tab-box-top-nav-on');

                marginLeft="-"+index*100+"%";
                $('#wp-tab-box-content').css({'margin-left':marginLeft} );
            })
        }
    };
    wpTab.int();
    global.wpTab=wpTab;
})(this)