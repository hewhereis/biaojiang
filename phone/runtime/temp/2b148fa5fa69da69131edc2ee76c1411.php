<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wamp64\www\phone/application/index\view\nuclear\index.html";i:1511408608;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511310882;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
  <title>__Dstitle__</title>
  <link rel="stylesheet" href="__indexStatic__css/reset.css">
  <link rel="stylesheet" href="__indexStatic__css/style.css">
  <link rel="stylesheet" href="__indexStatic__css/weui.min.css">
  <link rel="stylesheet" href="__indexStatic__css/jquery-weui.min.css">
  <link rel="stylesheet" href="__indexStatic__css/index.css">
  <link rel="stylesheet" href="__indexStatic__css/index2.css">
  <link rel="stylesheet" href="__indexStatic__css/index3.css">
  <script src='__indexStatic__js/vue.min.js'></script>
  <script src='__indexStatic__js/jquery-2.1.4.js'></script>
  <script src='__indexStatic__js/jquery-weui.min.js'></script>
  <!-- <script src='__indexStatic__js/fastclick.js'></script> -->
  <script src='__indexStatic__js/index.js'></script>
  <script src='__indexStatic__js/public.js'></script>
  <script>
	var ds_public='__PUBLIC__';
    var html = $('html')
    var hW = html.outerWidth() > 640 ? 640 : html.outerWidth()
    _rem = 16
    html.css('fontSize', _rem)
    $(function () {
      // FastClick.attach(document.body)
    })
     Vue.prototype.WebUploader=function (element,func,i) {
      WebUploader.create({
          auto: true,// 选完文件后，是否自动上传。
          swf: '__PUBLIC__static/index/webupload/Uploader.swf',// swf文件路径
          server: '__PUBLIC__dsupload',// 文件接收服务端。
          duplicate :true,// 重复上传图片，true为可重复false为不可重复
          pick: '#'+element,// 选择文件的按钮。可选。
          accept: {
              title: 'Images',
              extensions: 'gif,jpg,jpeg,bmp,png',
              mimeTypes: 'image/jpg,image/jpeg,image/png'
          },
          'onUploadSuccess': func
      })
    }
    Vue.prototype.WebUploader1=function (element,i) {

     setTimeout(function(){
       WebUploader.create({
          auto: true,// 选完文件后，是否自动上传。
          swf: '__PUBLIC__static/index/webupload/Uploader.swf',// swf文件路径
          server: '__PUBLIC__dsupload',// 文件接收服务端。
          duplicate :true,// 重复上传图片，true为可重复false为不可重复
          pick: '#'+element,// 选择文件的按钮。可选。
          accept: {
              title: 'Images',
              extensions: 'gif,jpg,jpeg,bmp,png',
              mimeTypes: 'image/jpg,image/jpeg,image/png'
          },
          'onUploadSuccess': function(file, data, response){
            $("#arr"+i).attr("src","__DsQINiu__" + data._raw).show();
            var urls = data._raw;
            $.ajax({
              url:'__PUBLIC__img',
              data:{urls:urls},
              dataType:'json',
              type:'post',
              success:function(data){
                  if(data.code==200){
                    var ids = data.datas;
                    datas.arr[i]=ids;
                  }else {
                    $.tiptop(data.msg);
                  }
               }
            })
          },
      })
     },10)
    }
    Vue.prototype.WebUploader2=function (element,i) {

setTimeout(function(){
WebUploader.create({
          auto: true,// 选完文件后，是否自动上传。
          swf: '__PUBLIC__static/index/webupload/Uploader.swf',// swf文件路径
          server: '__PUBLIC__dsupload',// 文件接收服务端。
          duplicate :true,// 重复上传图片，true为可重复false为不可重复
          pick: '#'+element,// 选择文件的按钮。可选。
          accept: {
              title: 'Images',
              extensions: 'gif,jpg,jpeg,bmp,png',
              mimeTypes: 'image/jpg,image/jpeg,image/png'
          },
          'onUploadSuccess': function(file, data, response){
             $("#arrs"+i).attr("src","__DsQINiu__" + data._raw).show();
             var urls =  data._raw;
            $.ajax({
              url:'__PUBLIC__img',
              data:{urls:urls},
              dataType:'json',
              type:'post',
              success:function(data){
                  if(data.code==200){
                    var ids = data.datas;
                    datas.arrs[i]=ids;
                  }else {
                    $.tiptop(data.msg);
                  }
               }
            })
          }
      })
},10)
      
    }
  </script>
</head>

<body>
<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>
  <div id="app" style='padding-bottom: 53px;padding-top:40px'>
<script type="text/x-template" id='header'>
      <div class='header'>
          <div class="header-wrapper">
            <div class="header-left" @click='goback()'>
              <i class='icon-arrow_lift'></i>
              <span class='goback'>返回</span>
            </div>
            <div class="header-content">
              <span class='text'>{{title}}</span>
            </div>
            <div class="header-right"></div>
          </div>
        </div>
    </script>

	<div class="htmleaf-container">
		<div class="container">
			<div class="js-signature" hidden></div>
			<div class="row">
				<div class="col-xs-12">
					<h3>客户签字</h3>
					<div class="js-signature" data-width="600" data-height="200" data-border="1px solid black" data-line-color="#bc0000" data-auto-fit="true"></div>
					<p><button id="clearBtn" class="btn btn-default" onclick="clearCanvas();">重新签字</button>&nbsp;<button id="saveBtn" class="btn btn-default" onclick="saveSignature();" disabled>确认签字</button></p>
					<div id="signature">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="__PUBLIC__static/index/js/jq-signature.js"></script>
	<script type="text/javascript">
		$(document).on('ready', function() {
			if ($('.js-signature').length) {
				$('.js-signature').jqSignature();
			}
		});

		function clearCanvas() {
			
			$('.js-signature').eq(1).jqSignature('clearCanvas');
			$('#saveBtn').attr('disabled', true);
		}

		function saveSignature() {
			$('#signature').empty();
			var dataUrl = $('.js-signature').eq(1).jqSignature('getDataURL');
			// var img = $('<img>').attr('src', dataUrl);
			dataUrl=dataUrl.split(",");
			img=dataUrl[1];
			$.ajax({
				type:"POST",
				data:{img:img,order:'<?php echo $order_number; ?>'},
				url:"__PUBLIC__submit_reports1",
				success:function(data){
						if(data.code==200){
								$.ajax({
									type:"POST",
									data:{id:data.ids,order:'<?php echo $order_number; ?>'},
									url:"__PUBLIC__nuclear_sign_ajax",
									success:function(data){
											if(data.code===200){
                                              alert(data.msg);
                                               window.location.href="__PUBLIC__customer_nuclear/"+'<?php echo $order_number; ?>';
											}else{
                                               alert(data.msg)
											}
									}
								})
						}
				}

			})
		}

		$('.js-signature').eq(1).on('jq.signature.changed', function() {
			$('#saveBtn').attr('disabled', false);
		});
	</script>
</body>
</html>