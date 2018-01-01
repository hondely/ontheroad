/**
 * Created by 久鹏 on 2016-09-27.
 */
(function(global){
    var wp={
        _regist$wp:function(){
            window.$wp= function(childrenStr) {
                return  childrenStr[0]=='#'?document.getElementById(childrenStr.substring(1)):document.getElementsByClassName(childrenStr.substring(1));
            };
        },
        _registAddClass:function(){
            Node.prototype.addClass= function(classStr) {
                this.className=this.className+' '+classStr;
            };
        },
        _registRemoveClass:function(){
            Node.prototype.removeClass= function(classStr) {
                var res=new RegExp(classStr,'g');
                this.className=this.className.replace(res,' ');
            };
        },
        _registHasClass:function(){
            Node.prototype.hasClass= function(classStr) {
                return this.className.match(classStr)?true:false;
            };
        },
        _registAppendChildren: function(){
            Node.prototype.appendChildren = function(childrenStr) {
                var originalHtml= this.innerHTML;
                this.innerHTML=originalHtml+childrenStr;
            };
        },
        regist:function(){
            this._regist$wp();
            this._registAddClass();
            this._registRemoveClass();
            this._registHasClass();
            this._registAppendChildren();
        }
    }
    wp.regist();

    //通用函数
    var wpf = {
        //获得某年某月有多少天
        getDaysCountInMonth : function(year, month){
            return new Date(year, month, 0).getDate();
        },
        //获得某月1号是星期几
        getWeekOnMonthFirstDay: function(year, month){
            return new Date(year, month-1, 1).getDay();
        },
        //获得 某年某月 前一个月的最后一天的日期
        getPreMonthLastDay : function(year, month){
            var d=new Date(year,month-1,1);
            d.setDate(d.getDate()-1);
            return d.getDate();
        },
        getMonth : function(m){
            return ['一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二'][m];
        },
        //计算某年某月的最后一天日期
        getLastDayInMonth : function(year, month){
            return new Date(year, month, this.getDaysCountInMonth(year, month));
        },
        addMonth:function(date,i){
            var d=new Date(date);
            d.setMonth(d.getMonth()+i);
            return  d;
        },
        addDay:function (date,i){
            var d=new Date(date);
            d.setDate(d.getDate()+i);
            return d;
        }
    }
    global.wpf=wpf;

    var wpCalender={
        wpConfig:{
            date:'',
            minDate:'',
            maxDate:'',
            callback:''
        },
        _init: function(){
            this._renderHTML();
        },
        regist:function(ele){
            ele.onclick=function(e){
				wpCalender.show(e.target.innerHTML,function(ret){
					var date=new Date(ret);
					e.target.innerHTML= date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
				})
            };
        },
        show:function(originalDate,callback){
            originalDate = originalDate.replace(/-/g,"/");
            var date=new Date(originalDate);
            date!='Invalid Date'?this.wpConfig.date=date:this.wpConfig.date=new Date();
            this.wpConfig.callback=callback;
            this._visible();
            this._initListeners();
            this._loadDate();
        },
        _loadDate:function(){
            var year=$wp('#wp-data-year').innerHTML;
            var month=$wp('#wp-data-month').innerHTML;
            var weekOnMonthFirstDay=wpf.getWeekOnMonthFirstDay(year,month);
            var daysCount=wpf.getDaysCountInMonth(year,month);

            var dateStr= '<ul  class="wp-datearea ">';

            var preMonthLastDay=wpf.getPreMonthLastDay(year,month);
            for(var i=weekOnMonthFirstDay-1;i>=0;i--){
                dateStr+=  '<li class="wp-prevdate" data-day="'+(preMonthLastDay-i)+'">'+(preMonthLastDay-i)+'</li>';
            }

            var selectedYear=(new Date(this.wpConfig.date)).getFullYear();
            var selectedMonth=(new Date(this.wpConfig.date)).getMonth()+1;
            var selectedDay=(new Date(this.wpConfig.date)).getDate();

            for(var i=1;i<=daysCount;i++){
                if(selectedYear==year&&selectedMonth==month&&i==selectedDay){
                    dateStr+=  '<li class="wp-selected-day" data-day="'+i+'">'+i+'</li>';
                }else {
                    dateStr+=  '<li class="" data-day="'+i+'">'+i+'</li>';
                }
            }

            var nextdateCount=7-(weekOnMonthFirstDay+daysCount)%7;
            for(var i=1;i<=nextdateCount;i++){
                dateStr+= '<li class="wp-nextdate" data-day="'+i+'">'+i+'</li>';
            }
            dateStr+= '</ul>';
            $wp('#wp-calender-body').appendChildren(dateStr);
        },
        _visible:function(){
            $wp('#wp-calender-panel').addClass('show');
            $wp('#wp-calender-mask').addClass('show');
            $wp('#wp-data-year').innerHTML=(new Date(this.wpConfig.date)).getFullYear();
            $wp('#wp-data-month').innerHTML=(new Date(this.wpConfig.date)).getMonth()+1;
        },
        _hide:function(){
            $wp('#wp-calender-panel').removeClass('show');
            $wp('#wp-calender-mask').removeClass('show');
            var node=$wp('.wp-datearea')[0];
            node.parentNode.removeChild(node);
            this.wpConfig.callback(this.wpConfig.date);
        },
        _renderHTML:function(){
            var body= document.getElementsByTagName('body')[0];
            var maskStr='<div id="wp-calender-mask"></div>';
            body.appendChildren(maskStr);
            var dateStr='<div id="wp-calender-panel">'+
                            '<div id="wp-calender-head" class="wp-calender-head">'+
                                '<div class="wp-selectarea">'+
                                    '<span class="wp_prev change_year wp-btn" >&lt;</span>'+
                                    '<span id="wp-data-year" class="wp_headtext yeartag" >2016</span><span class="wp_headtext">年</span>'+
                                    '<span class="wp_next change_year wp-btn">&gt;</span>'+
                                '</div>'+
                                '<div class="wp-selectarea">'+
                                    '<span class="wp_prev change_month wp-btn" >&lt;</span>'+
                                    '<span id="wp-data-month" class="wp_headtext monthtag" >11</span><span class="wp_headtext">月</span>'+
                                    '<span class="wp_next change_month wp-btn" >&gt;</span>'+
                                '</div>'+
                            '</div>'+
                            '<div id="wp-calender-body" class="wp-calender-body">'+
                                '<ul  class="wp-weekarea">'+
                                    '<li>日</li>'+
                                    '<li>一</li>'+
                                    '<li>二</li>'+
                                    '<li>三</li>'+
                                    '<li>四</li>'+
                                    '<li>五</li>'+
                                    '<li>六</li>'+
                                '</ul>'+
                                //'<ul id="wp-datearea" class="wp-datearea in">'+
                                //'</ul>'+
                           '</div>'+
                            '<div id="wp-calender-foot" class="wp-calender-foot">'+
                                '<span  id="wp-calender-ok-btn" class="wp-calender-ok-btn wp-btn">确定</span>'+
                                '<span  id="wp-calender-cancel-btn"  class="wp-calender-cancel-btn wp-btn">取消</span>'+
                            '</div>'+
                        '</div>';
            body.appendChildren(dateStr);
        },
        _updateView:function(i){
            var c2='wp-out-left';
            i<0?c2 = 'wp-out-right':'';
            window.wpCalender._loadDate();
            var node=$wp('.wp-datearea')[0];
            node.parentNode.removeChild(node);

            $wp('.wp-datearea')[0].addClass(c2);
            setTimeout(function(){
                $wp('.wp-datearea')[0].removeClass(c2);
            },0);
        },
        _changeYear:function(i){
            var year=parseInt($wp('#wp-data-year').innerHTML)+i;
            year>=1992?$wp('#wp-data-year').innerHTML=year:'';
            this._updateView(i);
        },
        _changeMonth:function(i){
            var month=parseInt($wp('#wp-data-month').innerHTML)+i;
            if(month==13){
                $wp('#wp-data-month').innerHTML=1;
                this._changeYear(1);
            }else if(month==0){
                $wp('#wp-data-month').innerHTML=12;
                this._changeYear(-1);
            }else{
                $wp('#wp-data-month').innerHTML=month;
                this._updateView(i);
            }
        },
        _initListeners:function(){
            var _this=this;
            $wp('#wp-calender-head').onclick=function(e){
                if(e.target && e.target.nodeName.toLocaleLowerCase() == "span") {
                    e.target.hasClass('wp_prev')?e.target.hasClass('change_year')? _this._changeYear(-1):_this._changeMonth(-1):e.target.hasClass('change_year')?_this._changeYear(1):_this._changeMonth(1);
                }
            };

            $wp('#wp-calender-body').onclick=function(e){
                e.stopPropagation();
                var datearea=$wp('.wp-datearea')[0];
                for(var i=0;i<datearea.childNodes.length;i++)
                {
                    e.target.parentNode.hasClass('wp-datearea')?datearea.childNodes[i].removeClass('wp-selected-day'):'';
                }
                if(e.target.parentNode.hasClass('wp-datearea')){
                    var date=new Date(wpCalender.wpConfig.date);
                    var selectedDay=e.target.getAttribute('data-day');
                    date.setDate(selectedDay);
                    if(e.target.hasClass('wp-prevdate')){
                        wpCalender._changeMonth(-1);
                        var node=$wp('.wp-datearea')[0];
                        for(var i=0;i<node.childNodes.length;i++){
                            var day=node.childNodes[i].getAttribute('data-day');
                            if(day==selectedDay&&(!node.childNodes[i].hasClass('wp-prevdate'))&&(!node.childNodes[i].hasClass('wp-nextdate'))){
                                node.childNodes[i].addClass('wp-selected-day');
                                break;
                            }
                        }
                    }else  if(e.target.hasClass('wp-nextdate')){
                        wpCalender._changeMonth(1);
                        var node=$wp('.wp-datearea')[0];
                        for(var i=0;i<node.childNodes.length;i++){
                            var day=node.childNodes[i].getAttribute('data-day');
                            if(day==selectedDay&&(!node.childNodes[i].hasClass('wp-prevdate'))&&(!node.childNodes[i].hasClass('wp-nextdate'))){
                                node.childNodes[i].addClass('wp-selected-day');
                                break;
                            }
                        }

                    }else {
                        e.target.addClass('wp-selected-day');
                    }
                    var month=parseInt($wp('#wp-data-month').innerHTML);
                    date.setMonth(month-1);
                    var year=parseInt($wp('#wp-data-year').innerHTML);
                    date.setYear(year);
                    wpCalender.wpConfig.date=date;

                }
            };

            $wp('#wp-calender-body').ontouchstart=function(e){
                nStartX = e.targetTouches[0].pageX;
            };

            $wp('#wp-calender-body').ontouchend=function(e){
                nChangX = e.changedTouches[0].pageX;
                if(Math.abs(nStartX-nChangX)>100){
                    (nStartX-nChangX)>0?wpCalender._changeMonth(-1): wpCalender._changeMonth(1);
                }
            };

            $wp('#wp-calender-ok-btn').onclick=function(){
                _this._hide();
            };

            $wp('#wp-calender-cancel-btn').onclick=function(){
                //_this.wpConfig.date='';
                _this._hide();
            };
        }
    };
    wpCalender._init();
    global.wpCalender=wpCalender;
})(this)