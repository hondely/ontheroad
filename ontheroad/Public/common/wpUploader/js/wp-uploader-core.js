/**
 * Created by 久鹏 on 2016-12-28.
 */
(function(global){
    function generateUUID() {
        var d = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = (d + Math.random()*16)%16 | 0;
            d = Math.floor(d/16);
            return (c=='x' ? r : (r&0x3|0x8)).toString(16);
        });
        return uuid;
    };

    function wpUploaderCore(){
        var uploader={};
        var _this=uploader;

        _this.fileStatic={
            totalSize:0,
            files:[]
        };

        //_this.limtFileType=["image/png", "image/jpeg", "image/gif"];
        _this.limtFileType=[];
        _this.url="";
        _this.isUploading=false;
        _this.formData={};

        var xmlHttpRequest=new XMLHttpRequest();
        var uploadingStatic={
            percent:0,
            speed:0,
            costTime:0
        };

        var uploadedResult={
            code:0,
            message:"",
            result:{}
        };

        var resultCode={
            sucess:{
                code:1,
                message:"上传成功"
            },
            isUploading:{
                code:-1,
                message:"文件正在上传中"
            },
            noSelectFile:{
                code:-2,
                message:"没有选择上传的文件"
            },
            fail:{
                code:-3,
                message:"文件上失败"
            },
            timeOut:-{
                code:-4,
                message:"文件上传超时"
            }
        };

        var addFileResult={
            code:0,
            result:{}
        };

        var startTime = new Date().getTime();
        var loaded=0;

        _this.addFile=function(file,callback){
            if (_this.limtFileType.length>0&&_this.limtFileType.indexOf(file.type)==-1) {
                addFileResult.code=-1;
                callback(addFileResult);
                return;
            }
            var length=_this.fileStatic.files.length;
            if(length>0){
                _this.fileStatic.files.splice(0,1);
            }
            _this.fileStatic.totalSize=file.size;
            _this.fileStatic.files[0]=file;
            addFileResult.code=1;
            addFileResult.result=_this.fileStatic;
            callback(addFileResult);
        };

        _this.deleteFile=function(){
            var length=_this.fileStatic.files.length;
            if(length>0){
                _this.fileStatic.files.splice(0,1);
                _this.fileStatic.totalSize=0;
            }
        };

        _this.doUpload=function(data){

            //正在上传文件
            if(_this.isUploading){
                uploadedResult.code=resultCode.isUploading.code;
                uploadedResult.message=resultCode.isUploading.message;
                _this.uploaded(uploadedResult);
                return ;
            }

            //没有文件上传
            var length=_this.fileStatic.files.length;
            if(length==0){
                uploadedResult.code=resultCode.noSelectFile.code;
                uploadedResult.message=resultCode.noSelectFile.message;
                _this.uploaded(uploadedResult);
                return ;
            }
            _this.isUploading=true;
            doUpload(data);
        };

        _this.cancelUpload=function(callback){
            _this.isUploading=false;
            xmlHttpRequest.abort();
        };

        _this.uploading=function(callback){
            callback(_this.uploadResult);
        };

        _this.uploaded=function(callback){
            _this.isUploading=false;
            callback(_this.uploadResult);
        };

        function  doUpload(data){
            data=_this.formData;
            var formData = new FormData();
            for(var i in data){
                formData.append(i,data[i]);
            }
            var length=_this.fileStatic.files.length;
            if(length>0){
                formData.append("fileToUpload",_this.fileStatic.files[0]);
            }

            console.log("This file size is "+_this.fileStatic.files[0].size);

            xmlHttpRequest = new XMLHttpRequest();
            xmlHttpRequest.responseType = 'text';
            xmlHttpRequest.upload.onloadstart=onloadstart;
            xmlHttpRequest.upload.onprogress = onprogress;
            xmlHttpRequest.upload.onabort = onabort;
            xmlHttpRequest.upload.onerror = onerror;
            xmlHttpRequest.onload = onload;
            xmlHttpRequest.upload.ontimeout = ontimeout;
            //xmlHttpRequest.upload.onloadend = onloadend;

            xmlHttpRequest.open("POST",_this.url);
            xmlHttpRequest.send(formData);
        }

        function onloadstart(){
            startTime = new Date().getTime();
            loaded=0;
            console.log("begain upload file"+startTime);
        }

        function onprogress(oEvent){
            if (oEvent.lengthComputable) {
                var endTime = new Date().getTime();
                var timeDiff = (endTime-startTime)/1000;
                startTime= new Date().getTime();
                uploadingStatic.speed=(oEvent.loaded-loaded)/timeDiff;
                loaded=oEvent.loaded;
                uploadingStatic.percent = (oEvent.loaded / oEvent.total);
                uploadingStatic.costTime+=timeDiff;
                _this.uploading(uploadingStatic);

                console.log(uploadingStatic);
            } else {

            }
        }

        function  onabort(){
            _this.isUploading=false;
        }

        function  onerror(){
            _this.isUploading=false;
            uploadedResult.code=resultCode.fail.code;
            uploadedResult.message=resultCode.fail.message;
            uploadedResult.result=xmlHttpRequest.responseText;

            _this.uploaded(uploadedResult);
        }

        function  onload(result){
            _this.isUploading=false;
            uploadedResult.code=resultCode.sucess.code;
            uploadedResult.message=resultCode.sucess.message;
            uploadedResult.result=xmlHttpRequest.responseText;
            _this.uploaded(uploadedResult);
        }

        function  ontimeout(){
            _this.isUploading=false;
            uploadedResult.code=resultCode.timeOut.code;
            uploadedResult.message=resultCode.timeOut.message;
            uploadedResult.result=xmlHttpRequest.responseText;
            
            _this.uploaded(uploadedResult);
        }

        //function  onloadend(result){
        //    _this.isUploading=false;
        //    uploadedResult.code=resultCode.sucess.code;
        //    uploadedResult.message=resultCode.sucess.message;
        //    uploadedResult.result=result;
        //
        //    _this.uploaded(uploadedResult);
        //}

        return uploader;
    }
    global.wpUploaderCore=wpUploaderCore;
})(this)