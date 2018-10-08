<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"D:\wamp64\www\phone/application/index\view\nuclear\master_nuclear.html";i:1511414469;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511310882;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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

<script src='__indexStatic__js/city-picker.js'></script>
 <link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/style.css">

<div class='app'>
  <headers></headers>
  <mian></mian>
  <menus></menus>
</div>
<template id="mian">
	<div class="hedanbaogao">
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
                  <div class="tupian" :id="'uploaderInput'+index">
                      <img  :id="'img_data'+index" height="75" width="81" onerror="this.src='__PUBLIC__static/index/images/tj.png'" :src="item.imagesids" alt="">
                  </div>
                  <p class="text6">点击上传</p>
              </div>
          </div>
      </div>
		</div>
		<div class="guzhang">
			<div class="guzhang_border">
				  <input type="text" class="text1" id="text1" v-model="result[index].content" placeholder ="请描述故障" name="">
			</div>
		</div>
      <div class="weui-flex name" v-if="index == result.length-1">
        <div class="weui-flex__item yezhu_name">
          <span class="yezhu">核单所需费用</span>
          <span>
              <input type="text" id="" v-model="result[0].price" name="">
          </span>
        </div>
      </div>
    </div>
		<div class="weui-flex name" v-if="result[0].sign==1">
			<div class="weui-flex__item yezhu_name" >
				 <img :src="'__PUBLIC__public/'+result[0].qianming" alt="">
			</div>
		</div>
		<div class="btn" v-if="result[0].sign==0">
			<input type="button" @click="submits()" value="提交报告" class="btn1">
			<!-- <a href="#"><div class="btn2">提交报告</div></a> -->
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

<script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
<script>
  var data = {
    sex: 1,
    order_number:'<?php echo $order_number; ?>',
    result:<?php echo $result; ?>,
    hendanimg:[],
    conent:[],
    money:''
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
      images:function(){
        var arr=[];
        for(var i=0;i<this.result.length;i++){
          arr.push(this.result[i].imagesids)
        }
        this.hendanimg = arr;
      },
      submits:function(){
        var _this = this; 
        var sa=false;
        var mi=0;
        if(_this.hendanimg.length==0){
             $.toptip('请上传核单照片','error');
             return false;
        }else{
           for(var i=0;i<_this.hendanimg.length;i++){
              if(_this.hendanimg[i]==""){
                 $.toptip('请上传核单照片','error');
                 return false;
              }
           }
        }
        if(_this.results==''){
             $.toptip('请填写核单费用','error');
             return false;
        }
          $.ajax({
             url:'__PUBLIC__submit_nuclear',
             data:{order_number:_this.order_number,conent:_this.content,money:_this.results,hendanimg:_this.hendanimg},
             dataType:'json',
             type:'post',
             success:function(data){
                if(data.code==200){
                   $.toast(data.msg,function(){
                    window.location.href="";
                   });
                }else{
                   $.toast(data.msg);
                }
             }
          })
      }

    },
    computed:{
      results:function(){
        return this.result[0].price
      },
      content:function(){
        var arr=[];
        for(var i=0;i<this.result.length;i++){
          arr.push(this.result[i].content)
        }
        return arr;
      },
      
    },
    mounted: function () {
       var _this=this;
       this.images()
       fun=function(i){
         WebUploader.create({
              auto: true,// 选完文件后，是否自动上传。   
               swf: '__PUBLIC__static/index/webupload/Uploader.swf',// swf文件路径
              server: '__PUBLIC__dsupload',// 文件接收服务端。
              duplicate :true,// 重复上传图片，true为可重复false为不可重复
              pick: '#uploaderInput'+(i),// 选择文件的按钮。可选。
              accept: {
                  title: 'Images',
                  extensions: 'gif,jpg,jpeg,bmp,png',
                  mimeTypes: 'image/jpg,image/jpeg,image/png'
              },
              'onUploadSuccess': function(file, data, response) {
                  _this.hendanimg[i]='__DsQINiu__' +data._raw;
                  $("#img_data"+(i)).attr('src', '__DsQINiu__' + data._raw).show();
                  console.log($("#img_data"+(i)))
              }
           });
       }
       for(var i=0;i<this.result.length;i++){
           fun(i)
       }
      $('#time').datetimePicker({
        min: this.getdata(1)
      });
        var html=$(".one").html();
      $(".add").click(function(){
           $(".one").append(html);
      });
      $('.one').on('click','.icon-close',function(){
    	$(this).parent('a').parent().parent().parent().remove(); 

    });
//    ;       var uploader = 

    },
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