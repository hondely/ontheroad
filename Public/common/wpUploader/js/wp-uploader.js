/**
 * Created by 久鹏 on 2016-12-28.
 */
(function(global){

    var uploader={};
    function newUpload(){

        uploader=wpUploaderCore();
        uploader.formData=wpUploader.formData;
        uploader.url=wpUploader.url;
        //uploader.url="http://120.26.238.251/OrderOnline/index.php/Business/login/setPic";
        uploader.uploading=function(ret){
            var speedDiv=document.getElementById('wp-uploader-speed');
            speedDiv.innerHTML=getSpeed(ret.speed);
            var percentDiv=document.getElementById('wp-uploader-percent');
            percentDiv.innerHTML=getPercent(ret.percent);
            console.log(ret);
        }

        uploader.uploaded=function(ret){
            if(ret.code){
                uploader.deleteFile();
                hidePreviewImage();
                wpUploader.uploaded(ret.result);
            }else {

            }
            showNotice(ret.code,ret.message);
            console.log("upload file end:"+JSON.stringify(ret));
        }
    }

    function show(){
        var element=document.getElementById('wp-uploader-bg');
        element.style.visibility='visible';
        element.className='wp-uploader-bg-show';

        element=document.getElementById('wp-uploader-main');
        element.className='wp-uploader-main-show';

        var img =document.getElementById('wp-uploader-img');
        img.style.visibility='hidden';

        newUpload();
        resetInfo();
        closeNotice();
    }

    function close(){
        var element=document.getElementById('wp-uploader-bg');
        element.className='wp-uploader-bg-hide';
        setTimeout("document.getElementById('wp-uploader-bg').style.visibility='hidden';",1000);

        element=document.getElementById('wp-uploader-main');
        element.className='wp-uploader-main-hide';
    }

    function getSize(size){
        var units= ["B","KB", "MB", "G", "T"];
        var count=0;
        while(size>1024){
            size=(size/1024).toFixed(2);
            count++;
        }
        return size+units[count];
    }

    function getSpeed(speed){
        var speedStr=getSize(speed);
        return speedStr+"/S";
    }

    function getPercent(percent){
        percent=(percent*100).toFixed(0);
        return percent+"%";
    }

    function showDeleteImgCover(){
        var deleteImgCover=document.getElementById('wp-uploader-delete-img-cover');
        deleteImgCover.style.visibility='visible';
        //deleteImgCover.className="show-delete-img-cover";
    }

    function hideDeleteImgCover(){
        var deleteImgCover=document.getElementById('wp-uploader-delete-img-cover');
        deleteImgCover.className="hide-delete-img-cover";
        hidePreviewImage();
        setTimeout(function(){
            deleteImgCover.style.visibility='hidden';
        },1000);
    }

    function hidePreviewImage(){
        var img =document.getElementById('wp-uploader-img');
        img.style.visibility='hidden';
    }

    function showPreviewImage(file){
        showDeleteImgCover();
        var img =document.getElementById('wp-uploader-img');
        img.style.visibility='visible';
        var reader = new FileReader();
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
    }

    function iniDeleteImgCoverEventListener(){
        var deleteImgCover=document.getElementById('wp-uploader-delete-img-cover');
        deleteImgCover.addEventListener("click", function (e) {
            hideDeleteImgCover();
            uploader.deleteFile();
        }, false);

        deleteImgCover.addEventListener("mouseover", function (e) {
            var length=uploader.fileStatic.files.length;
            if(length>0){
                var deleteImgCover=document.getElementById('wp-uploader-delete-img-cover');
                deleteImgCover.style.visibility='visible';
                deleteImgCover.className="show-delete-img-cover";
            }
        }, false);

        deleteImgCover.addEventListener("mouseout", function (e) {
            var deleteImgCover=document.getElementById('wp-uploader-delete-img-cover');
            deleteImgCover.className="hide-delete-img-cover";
        }, false);
    }

    function iniDropboxEventListener() {
        var dropbox = document.getElementById("wp-uploader-drag");
        dropbox.addEventListener("dragenter", dragenter, false);
        dropbox.addEventListener("dragover", dragover, false);
        dropbox.addEventListener("dragexit",dragexit, false);
        dropbox.addEventListener("drop", drop, false);

        function dragenter(e) {
            e.stopPropagation();
            e.preventDefault();
            var dropbox=document.getElementById('wp-uploader-drag');
            dropbox.className="wp-uploader-drag-enter";
        }

        function dragover(e) {
            e.stopPropagation();
            e.preventDefault();
        }

        function dragexit(e) {
            e.stopPropagation();
            e.preventDefault();
            var dropbox=document.getElementById('wp-uploader-drag');
            dropbox.className="wp-uploader-drag-over";
        }

        function drop(e) {
            e.stopPropagation();
            e.preventDefault();
            var dt = e.dataTransfer;
            var files = dt.files;
            uploader.addFile(files[0],function(info){
                if(info.code==1){
                    var file=info.result.files[0];
                    document.getElementById('wp-uploader-file-size').innerHTML=getSize(file.size);
                    showPreviewImage(file);
                }else {
                    alert("The type of this file not allow to upload.");
                }
            });

            var dropbox=document.getElementById('wp-uploader-drag');
            dropbox.className="wp-uploader-drag-over";
        }
    }

    function  iniSelectFileEventListener() {
        var fileSelect = document.getElementById("wp-uploader-add-file-btn");
        var fileElem = document.getElementById("wp-uploader-add-file-input");
        fileSelect.addEventListener("click", function (e) {
            if (fileElem) {
                fileElem.click();
            }
            e.preventDefault();
        }, false);

        var inputElement = document.getElementById("wp-uploader-add-file-input");
        inputElement.addEventListener("change", handleFiles, false);
        function handleFiles() {
            uploader.addFile(this.files[0],function(info){
                if(info.code==1){
                    file=info.result.files[0];
                    document.getElementById('wp-uploader-file-size').innerHTML=getSize(file.size);
                    showPreviewImage(file);
                }else {
                    alert("The type of this file not allow to upload.");
                }
            });
        }
    }

    function  iniUploadBtnEventListener(){
        var uploadBtn = document.getElementById("wp-uploader-do-btn");
        uploadBtn.addEventListener("click", function (e) {
            upload();
        }, false);
    }

    function iniCloseBtnEventListener(){
        var closeBtn = document.getElementById("wp-uploader-close");
        closeBtn.addEventListener("click", function (e) {
            close();
        }, false);
    }

    function showNotice(type,info){
        var noticeDiv =document.getElementById('wp-uploader-notice');
        noticeDiv.style.visibility='visible';
        if(type==1){
            noticeDiv.className="wp-uploader-notice-info";
        }else{
            noticeDiv.className="wp-uploader-notice-warning";
        }
        setTimeout(function(){
            noticeDiv.innerHTML=info;
        },300);

        //setTimeout(function(){
        //    closeNotice();
        //},3000);
    }

    function closeNotice(){
        var noticeDiv =document.getElementById('wp-uploader-notice');
        noticeDiv.innerHTML="";
        noticeDiv.className="wp-uploader-notice-close";
    }

    function upload(){
        var data={
            "id":"1",
            "name":"name"
        };
        closeNotice();
        if(file){

        }else {

        }
        uploader.doUpload(data);
    }

    function resetInfo(){
        document.getElementById('wp-uploader-file-size').innerHTML='0MB';
        document.getElementById('wp-uploader-speed').innerHTML='0KB/S';
        document.getElementById('wp-uploader-percent').innerHTML='0%';
    }

    function cancel(){
        uploader.cancelUpload();
    }

    var wpUploader={
        url:'',
        formData:{},
        creatHtmlDOM:function(){
            var viewStr=''+
                //'<div id="wp-uploader-bg">'+

                    '<div id="wp-uploader-main">'+
                        '<div id="wp-uploader-notice"></div>'+
                        '<div id="wp-uploader-close" ></div>'+
                        '<div id="wp-uploader-row-1">'+
                            '<div id="wp-uploader-img-div" >'+
                                '<div id="wp-uploader-delete-img-cover" >'+
                                    '<div id="wp-uploader-delete-img" ></div>'+
                                '</div>'+
                                '<img id="wp-uploader-img">'+
                            '</div>'+
                            '<div id="wp-uploader-drag" class="wp-uploader-drag-over">'+
                                '<div id="wp-uploader-drag-info">拖拽文件到此处</div>'+
                            '</div>'+
                        '</div>'+
                        '<div id="wp-uploader-row-2">'+
                            '<div id="wp-uploader-add-file">'+
                                '<div id="wp-uploader-add-file-btn">点击选择文件</div>'+
                                '<input id="wp-uploader-add-file-input" type="file" size="30" name="fileselect[]" >'+
                            '</div>'+
                            '<div id="wp-uploader-info">'+
                                '<span id="wp-uploader-file-size" >0MB</span>'+
                                '<span id="wp-uploader-speed" >0KB/S</span>'+
                                '<span id="wp-uploader-percent">0%</span>'+
                            '</div>'+
                            '<div id="wp-uploader-do-btn">开始上传</div>'+
                        '</div>'+
                    '</div>';
                //'</div>';
            var element = document.createElement("div");
            element.id = 'wp-uploader-bg';
            element.innerHTML=viewStr;
            element.className="wp-uploader-hide";
            element.style.visibility='hidden';
            document.body.appendChild(element);

        },
        reset:function(){
            resetInfo();
        },
        iniEventListener:function(){
            iniDropboxEventListener();
            iniSelectFileEventListener();
            iniUploadBtnEventListener();
            iniCloseBtnEventListener();
            iniDeleteImgCoverEventListener();
        },
        show:show,
        uploaded:function(){

        }
    };

    wpUploader.creatHtmlDOM();
    wpUploader.iniEventListener();

    global.wpUploader=wpUploader;
})(this)