<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\wamp64\www\phone/application/index\view\nuclear\customer_nuclear.html";i:1511414322;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511310882;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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

<script src="__indexStatic__/js/sign/flashcanvas.js"></script>
<script src="__indexStatic__/js/sign/jSignature.min.js"></script>
<script>

</script>
<div class='app'>
  <headers></headers>
  <mian></mian>
  <menus></menus>
</div>
<template id="mian">
	<div class="hedanbaogaobiao">
		<div class="xiangm">
			<span class="xm">订单号：</span>
			<span class="az">{{order_number}}</span>
			<!-- <button class="add">添加</button> -->
		</div>

    <div v-for="(item,index) in result">
		<div class="shangchuan1">
			<div class="sczhaopian">
				<span class="zhaopian">{{item.service}}-{{item.l2_category_id}}</span>
				<!-- <a href="#"><span class="icon-close"></span></a> -->
			</div>
			    <!-- 上传专柜全景 -->
             <div class="weui-flex shangchuan3">
                <div class="weui-flex__item">
                    <div class="border1">
                        <div class="tupian">
                            <img src="__indexStatic__/images/tupian.png" alt="">
                        </div>
                        <p class="text6">上传专柜全景</p>
                    </div>
                </div>
                <div class="weui-flex__item">
                    <div class="border2">
                        <div class="tupian">
                            <img :src="item.imagesids" height="75" width="81" alt="">
                        </div>
                        <!-- <p class="text6">点击上传</p> -->
                    </div>
                </div>
            </div>
		</div>
		<div class="guzhang">
			 <div class="guzhang_border">
				  <input type="text" class="text1" readonly="" id="text1" v-model="item.content"  value="请描述故障" name="">
			 </div>
		</div>
		</div>

    <div class="weui-flex name">
      <div class="weui-flex__item yezhu_name">
        <span class="yezhu">核单所需费用</span>
        <span class="name1"><input type="text" readonly="" disabled v-model="result[0].price" class="text2" id="text2" name=""></span>
      </div>
    </div>
		<div class="weui-flex name">
			<div class="weui-flex__item yezhu_name" v-if="result[0].sign==0">
				<!-- <span class="name1"><input type="text" name="" v-model="customer_sign" ></span> -->
        <a href="__PUBLIC__nuclear_sign/<?php echo $order_number; ?>" class="duibizhao">点击签字</a>
			</div>
      <div class="weui-flex__item yezhu_name" v-if="result[0].sign==1">
        <img :src="'__PUBLIC__public/'+result[0].qianming" alt="">
      </div>
		</div>
		<div class="btn" v-if="result[0].sign==0">
			<input type="button" value="提交报告" @click="submits_sign()" class="btn1">
			<a :href="'__PUBLIC__report_error/'+order_number"><div class="btn2">报告有问题</div></a>
		</div>
    <div class="signModal">
      <div class="signModalContent">
        <div class="signModal-header"></div>
        <div class="signModal-body"></div>
      </div>
    </div>
	</div>
</template>

<script type="text/x-template" id='menu'>
  <div>
    <div class="weui-tabbar" style='position:fixed'>
      <a href="__PUBLIC__" class="weui-tabbar__item weui-bar__item--on">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_button.png" alt="">
        </div>
        <p class="weui-tabbar__label">首页</p>
      </a>
      <a href="__PUBLIC__order_customer_home" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_msg.png" alt="">
        </div>
        <p class="weui-tabbar__label">订单管理</p>
      </a>
      <a href="javascript:;" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_article.png" alt="">
        </div>
        <p class="weui-tabbar__label">购物车</p>
      </a>
     <a href="__PUBLIC__customer_home" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_cell.png" alt="">
        </div>
        <p class="weui-tabbar__label">我的</p>
      </a>
    </div>
  </div>
</script> 
<script src="__PUBLIC__static/index/js/jquery.form.js"></script>
<script type="text/x-template" id='footers'>
	<div>
		<div class="weui-footer">
		    <p class="weui-footer__links">
		        <a href="javascript:void(0);" class="weui-footer__link">Biao-Jiang  首页</a>
		    </p>
		    <p class="weui-footer__text">Copyright © 2008-2016 biao.jiang</p>
		</div>
	</div>
</script>


<script>


  var data = {
    sex: 1,
    order_number:'<?php echo $order_number; ?>',
    result:<?php echo $result; ?>,
    customer_sign:''
  }
  Vue.component('mian', {
    template: '#mian',
    data: function () {
      return data
    },
    methods: {
      getdata: function (type) {
        var date = new Date();
        if (type == 1) {
          var year = date.getFullYear();
          var mounth = date.getMonth() + 1;
          var dates = date.getDate();
          return year + "-" + mounth + "-" + dates;
        } else {
          var hours = date.getHours();
        }
      },
      submits_sign:function(){
            var _this = this;
            $.ajax({
            url:'__PUBLIC__submit_sign',
            data:{order_number:_this.order_number},
            dataType:'json',
            type:'post',
            success:function(data){
               if(data.code==200){
                  $.toast(data.msg,function(){
                    
                  });
               }else{
                  $.toptip(data.msg)
               } 
            }
        })
      }
    },
    mounted: function () {
      $('#time').datetimePicker({
        min: this.getdata(1)
      });
      $jSignature = $('#clientSign');
    width = $jSignature.parent().width() - 20;
    $jSignature.jSignature({
        height: 200,
        width: width,
        lineWidth: "2",
        signatureLine: false
    });
    //     var html=$(".one").html();
    //   $(".add").click(function(){
    //        $(".one").append(html);
    //   });
    //   $('.one').on('click','.icon-close',function(){
    // 	$(this).parent('a').parent().parent().parent().remove(); 
    // });

    }
  })
  //头
  Vue.component('headers', {
    template: '#header',
    data: function () {
      return {
        title: "核单报告表"
      }
    },
    methods: {
      goback: function () {
        window.history.go(-1)
      }
    }
  })
  Vue.component('menus', {
    template: '#menu',
    data: function () {
      return {}
    }
  })
  Vue.component('footers', {
    template: '#footers',
    data: function () {
      return {}
    }
  })
  new Vue({
    el: '.app'
  })

  
</script>