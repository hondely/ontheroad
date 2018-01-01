(function(global){

	var myUi=function(){
	
	};
	
//	myUi.prototype={
//	
//	};
//

	myUi.showToast=function(message,type,time){
        var myloadinDiv="";
        if(!type)
        {
            myloadinDiv+= '<div id="myMaskBackground" >'+
            '<div id="myMaskContent">'+
            '<div id="myMaskErrorToast"></div>'+
            '<div id="myMaskMessage">'+message+'</div>'+
            '</div>'+
            ' </div>';
        }else
        {
            myloadinDiv+=
            '<div id="myMaskBackground" >'+
                '<div id="myMaskContent">'+
                    '<div id="myMaskRightToast"></div>'+
                    '<div id="myMaskMessage">'+message+'</div>'+
                '</div>'+
             ' </div>';
        }
        $('body').prepend(myloadinDiv);
        $('#myMaskBackground').fadeIn('100');
        setTimeout(function(){$('#myMaskBackground').fadeOut('100',function(){$("#myMaskBackground").remove();})},time);
        //setTimeout(function(){$("#myMaskBackground").remove()},'5000');
    }


	myUi.showMessageBox=function(message,type,callBack){
        var myloadinDiv=
            '<div id="myMaskBackground" >'+
                '<div id="myMaskMessageBoxBg">'+
                    '<div id="myMaskMessageBoxTitel">提示</div>'+
                        '<div id="myMaskMessageBoxContent">'+message+'</div>'+
                        '<div id="myMaskButtonList" >'+
                            '<button class="myMaskMessageBoxButton"  id="myMaskMessageBoxEnsureButton">确定</button>'+
                            '<button class="myMaskMessageBoxButton"  id="myMaskMessageBoxCancelButton">取消</button>'+
                        '</div>'+
                '</div>'+
            ' </div>';


        $('body').prepend(myloadinDiv);
        $("#myMaskMessageBoxEnsureButton").click(function(){
            callBack(1);
            $('#myMaskBackground').fadeOut('100',function(){$("#myMaskBackground").remove();});
        });
        $("#myMaskMessageBoxCancelButton").click(function(){
            callBack(0);
            $('#myMaskBackground').fadeOut('100',function(){$("#myMaskBackground").remove();});
        });
        if(type==0)
        {
            $('#myMaskMessageBoxTitel').css("background-color","#FF0000");
        }
        $('#myMaskBackground').fadeIn('100');
    }

    myUi.alert=function(message,type,callBack){
        var myloadinDiv=
            '<div id="myMaskBackground" >'+
            '<div id="myMaskMessageBoxBg">'+
            '<div id="myMaskMessageBoxTitel">提示</div>'+
            '<div id="myMaskMessageBoxContent">'+message+'</div>'+
            '<div id="myMaskButtonList" >'+
            '<button class="myMaskMessageBoxButton"  id="myMaskMessageBoxEnsureButton">确定</button>'+
            '</div>'+
            '</div>'+
            ' </div>';


        $('body').prepend(myloadinDiv);
        $("#myMaskMessageBoxEnsureButton").click(function(){
            callBack(1);
            $('#myMaskBackground').fadeOut('100',function(){$("#myMaskBackground").remove();});
        });
        $("#myMaskMessageBoxCancelButton").click(function(){
            callBack(0);
            $('#myMaskBackground').fadeOut('100',function(){$("#myMaskBackground").remove();});
        });
        if(type==0)
        {
            $('#myMaskMessageBoxTitel').css("background-color","#FF0000");
        }
        $('#myMaskBackground').fadeIn('100');
    }

    myUi.showLoading=function(message){
        var myloadinDiv=
            '<div id="myMaskBackground" >'+
                '<div id="myMaskContent">'+
                    '<div id="myMaskLoadingImg"></div>'+
                    '<div id="myMaskMessage">'+message+'</div>'+
                '</div>'+
           ' </div>';

        $('body').prepend(myloadinDiv);
        $('#myMaskBackground').fadeIn('100');
    }

    myUi.closeLoading=function(message){
        $('#myMaskBackground').fadeOut('100',function(){$("#myMaskBackground").remove();});
    }
    
	global.myUi=myUi;
	
})(this)