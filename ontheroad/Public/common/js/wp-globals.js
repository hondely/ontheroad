(function(global){
    var pathSeparate='\/';
    var Globals={
        'appName':'ontheroad',
        'enterFile':'index.php',
        'dataCenterUrl':''
    };
    var dataCenterPath='/DataCenter/API/upload';
    Globals.dataCenterUrl=pathSeparate+Globals.appName+pathSeparate+Globals.enterFile+dataCenterPath;

    global.Globals=Globals;
})(this)