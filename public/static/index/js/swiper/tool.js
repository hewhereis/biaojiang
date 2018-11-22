//配置layer全局属性
layer.config({
  shade: 0.1, //默认动画风
});
//图片预览方法
function tpyl(file1,file2,img){
				var file1=file1;
				var file2=file2;
				var img1=img;
			$("."+file1).each(function(i) {
		i = i + 1;
		$("."+file2+ i).change(function() {
			var $file = $(this);
			var fileObj = $file[0];
			var windowURL = window.URL || window.webkitURL;
			var dataURL;
			var $img = $("#"+img+i);
			if(fileObj && fileObj.files && fileObj.files[0]) {
				dataURL = windowURL.createObjectURL(fileObj.files[0]);
				$img.attr('src', dataURL);
			} else {
				dataURL = $file.val();
				var imgObj = document.getElementById(img + i);
				imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
				imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
			}

		})
	});
}
//倒计时隐藏
settimeOut =function(id,time){
	var defatultime =2000;
		time=time?time:defaultime;
	setTimeout(function(){
		$('#'+id).addClass('hide');
	},time)
};
//javscript Ajax 对象
function getXhr(){
	var xhr=null;
	if(window.XMLHttpRequest){
		xhr =new XMLHttpRequest();
	}else{
		xhr=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xhr;
}

//select2 js
function select(id){
		$(".service").each(function(i){
					i=i+1;
					$(id+i).select2({
				 data: data,
				 placeholder:'请选择',
//				 allowClear:true
				});
			});
	};

//图片上传插件
	function img(classname,num) {
		var defaultnum = 1;
		var num=num?num:defaultnum;
		$("." + classname).fileinput({
			language: 'zh',
			//			   uploadUrl: "", //上传后台操作的方法  
			//			   uploadAsync: true, //设置上传同步异步 此为同步  
			maxFileSize: 2000,
			//			   maxImageWidth: 800,
			//			   resizePreference: 'height',
			//			   resizeImage: true,
			maxFileCount:num,
			showBrowse: false,
			//			   resizeIfSizeMoreThan:800, 
			showUpload: false, //是否显示上传按钮
			showRemove: true, //显示移除按钮
            showCaption: false,//是否显示标题,就是那个文本框
            showPreview : true, //是否显示预览,不写默认为true
			allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'] //限制上传文件后缀  
		}); //初始化 后 上传插件的样子  

}
//图片上传插件可以多传
	function imgAll(classname,num,url,type) {
		var defaultnum = 1;
		var num=num?num:defaultnum;
		base ='';
		$("." + classname).on('fileloaded', function(event, file, previewId, index, reader) 
		{
			uid = $(this).parent().attr('num');
 			base = reader.result;
 			
		});
		$("." + classname).fileinput({
		language: 'zh',
		uploadUrl: url, // you must set a valid URL here else you will get an error
		uploadAsync: true, //设置上传同步异步 此为同步  
        allowedFileExtensions : ['jpg', 'png','gif'],
        showBrowse: false,
        overwriteInitial: false,
        maxFilesNum: 10,
        autoReplace:false,
        showCaption: true,//是否显示标题,就是那个文本框
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'], //限制上传文件后缀  
 		uploadExtraData:function (previewId, index) {    
//注意这里，传参是json格式,后台直接使用对象属性接收，比如employeeCode，我在RatingQuery 里面直接定义了employeeCode属性，然后最重要的也是
//最容易忽略的，传递多个参数时，不要忘记里面大括号{}后面的分号，这里可以直接return {a:b}; 或者{a:b}都可以，但必须要有大括号包裹
                    var data = {
                    	file_data:base,
                        type : 'type',
						folder_id: type,
                    };

                    return data;
                   }
		}).on("fileuploaded", function (event, data, previewId, index) {
			msg(data.response.msg,1,1,1000);
  			var ids = data.response.ids;
  			var val = $('input[name=imagsids_'+uid+']').val();
  			if(val==''){
				val = ids;
  			}else{
  				val = val+','+ids;
  			}
  			$('input[name=imagsids_'+uid+']').val(val);

}); //初始化 后 上传插件的样子  
}

//签名图片上传方法

AJAXsignature =	function(url,file_data,folder_id,file_id,type,classname){
		$.ajax({
				url:url,
				type: 'post',
				dataType:'json',
				data: {
					file_data:file_data,
					folder_id:folder_id,
					file_id:file_id,
					type:type,
				},
				success:function(response) {
					$('#'+classname).val(response.ids);
				},
				error: function(response) {
					msg();
				}
			});
	}
AJAXsignatures =	function(url,file_data,folder_id,file_id,type,classname,links){
		$.ajax({
				url:url,
				type: 'post',
				dataType:'json',
				data: {
					file_data:file_data,
					folder_id:folder_id,
					file_id:file_id,
					type:type,
					links:links
				},
				success:function(response) {
					console.log(response)
					$('#'+classname).val(response.ids);
				},
				error: function(response) {
console.log(response)
				}
			});
	}

//文件上传插件
	function file(classname,num) {
		var defaultnum = 1;
		var num=num?num:defaultnum;
		$("." + classname).fileinput({
			language: 'zh',
			uploadUrl: "#", //上传后台操作的方法  
			// uploadAsync: false, //设置上传同步异步 此为同步  
			// maxFileSize: 2000,
			//			   maxImageWidth: 800,
			//			   resizePreference: 'height',
			resizeImage: true,
			maxFileCount:num,
			showUpload : false,
            showRemove : false,
			showBrowse: false,
			layoutTemplates:{
				actionUpload:'',
			},
			//			   resizeIfSizeMoreThan:800, 
			showUpload: false, //是否显示上传按钮
			showRemove: true, //显示移除按钮
            showCaption: false,//是否显示标题,就是那个文本框
            showPreview : true, //是否显示预览,不写默认为true
			// allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg','doc','docx','pdf'] //限制上传文件后缀  
		}); //初始化 后 上传插件的样子  
}



// 发送信息
captcha_time = function(el) {
							var time = 3;
							$('.btn-get-captcha').attr('disabled', true);
							$('.time').show();
							setTime = setInterval(function() {
								if(time <= 0) {
									clearInterval(setTime);
									$('.btn-get-captcha').attr('disabled', false);
									$('.time').hide();
									return;
								}
								time--;
								$(".time").html('(' + time + ')');
							}, 1000);
						}

send_captcha = function(phone,required, i) {
							$.ajax({
								url: send_sms_captcha,
								type: 'POST',
								dataType: 'json',
								data: {
									phone: phone,
									required: required
								},
								success: function(response) {
									$('.ajax-response'+i).html('<div class="alert alert-' + response.type + '">' + response.msg +
									'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').show();
								},
								error: function(response) {

								}
							});
						}
//刷新
reload=function(time){	
	var defaultime=2000;
		time=time?time:defaultime;
	setTimeout(function(){
		window.location.reload();
	},time);
}
//4级联动
linkageLocations = function(cityid,pre_id,level){
			var defaullevel=1;
				level=level?msg:defaullevel;
			var defaulpre_id=0;
				pre_id=pre_id?pre_id:defaulpre_id;
			var $city = $('#'+cityid);
			var locations='';
			$.ajax({
				url:redirect['linkage_location'],
				type: 'GET',
				dataType: 'json',
				data: {
					pre_id:pre_id,
					level:level
				},
				success:function(response) {
					var obj = response.data;
					$.each(obj,function(key,item){
					});
					$city.html(' ');
					$city.html(locations);
				},
				error: function(response) {
					hint();
				}
			});
		}
linkageChange = function(id,lastid,level){
	var defaullevel=0;
	level=level?level:defaullevel;
	var $idname = $('#'+id);
	var $lastid = $('#'+lastid);
	$idname.change(function(){
		var val = $(this).val();
		$lastid.parent('div').removeClass('hide');
		linkageLocations(lastid,val,level);
	})
}
//layer ui 框架的提示框
msg = function(msg,icon,anim,time){
	var defaultMsg='网络开了点小差';
	var defaultIcon=5;
	var defaultAnim=6;
	var defaultTime=1000;
	msg=msg?msg:defaultMsg;
	icon=icon?icon:defaultIcon;
	anim=anim?anim:defaultAnim;
	time=time?time:defaultTime;
	layer.msg(msg, {
        icon: icon,
        anim: anim,
        time: time
    });
    // 1:是勾
    // 2:是x
    // 3:是问号
    // 4:是锁
    // 5:是哭脸
    // 6:是笑脸
}
GoLocation = function(url){
	window.location.href=url;
}
// 判断是否考试ajax
goAjax = function(url){
	$.ajax({
		url:url,
		type:'post',
		dataType:'json',
		data:{},
		async: false,
		error:function(data){
			msg();
		}
	}).done(function(data){
　　returnValue=data;
});
}


var IsPC= function (){
            var userAgentInfo = navigator.userAgent;
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = true;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
            }
            return flag;
        }


// 提示

Tip = function(id,msg){
	if(IsPC()){
		layer.tips(msg, "#"+id,{ icon: 2, time: 1500, shade: 0.1 ,tips:[1,"#ff5200"],shade:0}, function (index) {layer.close(index);});
    	$('#'+id).focus().css("border","1px solid red");
    	$('#'+id).focusout(function () {
    	$(this).css("border","1px solid #ddd");
    });
	}else{
		parnet.layer.msg(msg,{ icon: 2, time: 1500, shade: 0.1 ,tips:[1,"#ff5200"],shade:0}, function (index) {layer.close(index);});
    	
    	
	}
	
}