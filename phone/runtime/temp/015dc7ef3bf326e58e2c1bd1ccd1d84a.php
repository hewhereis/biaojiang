<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"D:\wamp64\www\phone/application/index\view\confrimreport\update_master_reports.html";i:1511404289;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511310882;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
</style>
<div class='app'>
  <headers></headers>
  <mian></mian>
  <menus></menus>
</div> 
<template id="mian">
	<div class="shifu_weixiubaogaotianxie">
		<div class="weui-cells weui-cells_form border-none">
		    <div class="heading1">
            	<span class="left">订单编号：</span>
            	<span class="right">{{list.order_number}}</span>
            </div>
            <div class="heading">
            	<span class="left">项目名称：</span>
            	<span class="right">维修-{{list.l1_category_id}}</span>
            </div>
            <div class="heading">
            	<span class="left">客户名称：</span>
            	<span class="right">{{list.contact_name}}</span>
            </div>
            <div class="heading">
            	<span class="left">客户电话：</span>
            	<span class="right">{{list.contact_phone}}</span>
            </div>
            <div class="heading">
            	<span class="left">店铺地址：</span>
            	<span class="right"><input type="text" class="text" id="text" readonly="" name="text" v-model="list.full_location" value=""></span>
            </div>
            <!-- <div class="heading2">
            	<span class="left">完成时间：</span>
            	<span class="right">2017-10-20</span>
            </div> -->
		</div>
    <div class="boox">
		<div class="border">
		    <!-- <div class="content1">
		    	<span class="zuo1">施工公司:</span>
		    	<span class="you1">上海标匠有限公司</span>
		    </div> -->
		    <div class="content">
		    	<span class="zuo">施工师傅:</span>
		    	<span class="you">{{list.real_name}}</span>
		    </div>
		    <div class="content">
		    	<span class="zuo2">施工联系人:</span>
		    	<span class="you">{{list.real_name}}</span>
		    </div>
		    <div class="content">
		    	<span class="zuo3">施工方电话:</span>
		    	<span class="you">{{list.phone}}</span>
		    </div>
		</div>
    </div>
		<div class="xgzhaopian">
			<span class="icon-camera"></span>
			<span class="zhaopian">上传照片</span>
		</div>
    <div class="weui-flex shangchuan">
     <div class="weui-flex__item">
      <div class="border1">
        <div class="tupian" id="uploaderInput">
          <img id="img_data" height="47" width="65" :src="'__DsQINiu__'+mentouzhao" alt="">
        </div>
        <p class="text6">上传门头照片</p>
      </div>
     </div>
     <div class="weui-flex__item">
      <div class="border1">
        <div class="tupian" id="uploaderInput1">
          <img id="img_data1" height="47" width="65" :src="'__DsQINiu__'+qianshoudan" alt="">
        </div>
        <p class="text6">上传维修签收单</p>
      </div>
     </div>
    </div>
    <!-- 上传专柜全景 -->
    <div class="weui-flex shangchuan3">
     <div class="weui-flex__item">
      <div class="border1">
        <div class="tupian" id="uploaderInput2">
          <img id="img_data2" height="47" width="65" :src="'__DsQINiu__'+quanjing" alt="">
        </div>
        <p class="text6">上传专柜全景</p>
      </div>
     </div>
     <div class="weui-flex__item">
     </div>
     <div class="weui-flex__item">
     </div>
    </div>
    <div class="box" v-for="(item,index) in append">
    <div class="duibi" >
      <span class="icon-camera"></span>
			<span class="qianhouduibi">维修前后对比照上传</span>
       <span v-if="index!==0" @click="deletes(index)" class="cha">×</span>
			<div class="weui-flex shangchuan4">
        <div class="weui-flex__item">
          <div class="border1" :id="'uploaderInputq'+index">
            <div class="tupian">
            <input type="hidden" v-model="arr[index]">
               <img :src="'__DsQINiu__'+item.qian" height="47" width="65" :id="'arr'+index" alt="">
            </div>
            <p class="text6">维修前</p>
          </div>
         </div>
         <div class="weui-flex__item">
          <div class="border1" :id="'uploaderInputw'+index">
            <div class="tupian">
            <input type="hidden" v-model="arrs[index]">
              <img :src="'__DsQINiu__'+item.hou" height="47" width="65" :id="'arrs'+index"  alt="">
            </div>
            <p class="text6">维修后</p>
          </div>
         </div>
        </div>
     
    </div>
    </div> 
    <div class="box">
        <div class="duibi">
           <div class="text2" >
        <input type="text3" v-model="arr1" class="text3" name="texe3" id="text3" placeholder="请对故障进行详细描述">
      </div>
        </div>
    </div>
        <div class="weui-cells weui-cells_form tianjia">
            <div class="weui-cell" v-if="is_ok==0">
                <span class="duibizhao" @click="zeng">添加维修前后对比照</span> 
            </div>
            <div class="weui-cell" v-if="is_ok==1">
                <img :src="'__PUBLIC__public/'+user_sign" alt="">
            </div>
            <div class="weui-cell"  v-if="is_ok==1">
                <input type="text" v-model='querenma' placeholder="请输入服务确认码">
            </div>
        </div>
        <div class="btn" v-if="is_ok==0">
        	<input type="button" value="确认" class="btn1" @click="btn()">
	      </div>
        <div class="btn" v-if="is_ok==1">
          <input type="button" value="确认" class="btn1" @click="btns()">
        </div>
</template>
<script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
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
    var datas = {
      counter: 1,
      sex:2,
      append:<?php echo $update; ?>,
      list:<?php echo $list; ?>,
      arr:<?php echo $beforepics; ?>,
      arrs:<?php echo $afterpics; ?>,
      arr1:<?php echo $details; ?>,
      order_number:'<?php echo $order_number; ?>',
      mentouzhao:<?php echo $mentouzhao; ?>,
      qianshoudan:<?php echo $qianshoudan; ?>,
      quanjing:<?php echo $quanjing; ?>,
      is_ok:<?php echo $is_ok; ?>,
      user_sign:<?php echo $user_sign; ?>,
      querenma:''

    }
    Vue.component('mian', {
      template: '#mian',
      data: function () {
        return datas
      },
      watch:{
        append:function(){
          var  v=this.append.length;
             var  vs=this.append.length;
        for(var i=vs-1; i<v;i++){

           this.WebUploader1("uploaderInputq"+i,i)
           this.WebUploader2("uploaderInputw"+i,i)
        }
        }
      },
      methods: {
        zeng:function(){
            this.append.push({})
        },
        deletes:function(index){
          this.append.splice(index,1)
        }
        ,fun(file, data, response){
              this.mentouzhao=data._raw;
              $("#img_data").attr('src', '__DsQINiu__' + data._raw).show();
        },
        fun1(file, data, response){
              this.qianshoudan=data._raw;
              $("#img_data1").attr('src', '__DsQINiu__' + data._raw).show();
        }
        ,
        fun2(file, data, response){
              this.quanjing=data._raw;
              $("#img_data2").attr('src', '__DsQINiu__' + data._raw).show();
        },
        fun4:function(file, data, response){

        },
        btn:function(){
          var _this = this;
          $.ajax({
            url:'__PUBLIC__submit_reports',
            data:{mentouzhao:_this.mentouzhao,qianshoudan:_this.qianshoudan,quanjing:_this.quanjing,qian:_this.arr,hou:_this.arrs,xiangqing:_this.arr1,order_number:_this.order_number},
            dataType:'json',
            type:'post',
            success:function(data){
               if(data.code==200){
                 $.toast(data.msg,function(){
                    window.location.href="__PUBLIC__customer_home";
                 });
               }else{
                 $.tiptop(data.msg);
               }
            }
          })
        },
        btns:function(){
          var _this = this;
          if(_this.querenma==''){
            $.toptip('请输入确认码');
            return;
          }
           $.ajax({
            url:'__PUBLIC__querenma_ajax',
            data:{querenma:_this.querenma,order_number:_this.order_number},
            dataType:'json',
            type:'post',
            success:function(data){
               if(data.code==200){
                window.location.href="__PUBLIC__customer_home";
               }else{
                 $.tiptop(data.msg);
               }
            }
          })
        }
      },
      mounted:function() {

        var _this = this;
        this.WebUploader("uploaderInput",this.fun)
        this.WebUploader("uploaderInput1",this.fun1)
        this.WebUploader("uploaderInput2",this.fun2)
       v=this.append.length;
        for(var i=0; i<v;i++){
           _this.WebUploader1("uploaderInputq"+i,i)
           _this.WebUploader2("uploaderInputw"+i,i)
        }
      }
    })
    //头
    Vue.component('headers', {
      template: '#header',
      data: function () {
        return {
          title: "维修确认报告"
        }
      },
      methods:{
         goback:function(){
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