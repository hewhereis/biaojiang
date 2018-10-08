<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\wamp64\www\phone/application/index\view\repair\message_list.html";i:1511511273;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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

  <link rel="stylesheet" href="__indexStatic__css/style/liuyanpeishifu.css">

<div class='app'>
  <headers></headers>
  <mian></mian>
  <menus></menus>
</div>
<template id='mian'>
  <div class="liuyanpeishifu">
    <div class="weui-cells1 weui-cells_form">
    <div class="weui-cell">
      <div class="weui-cell_hd">
          <label class="weui-label">您的称呼：</label>
      </div>
      <div class="weui-cell_bd" style='width:100%'>
        <span class="weui-input">{{order.contact_name}}</span>
        
      </div>
    </div> 
    <div class="weui-cell">
      <div class="weui-cell_hd">
        <label class="weui-label">详细地址：</label>
      </div>
      <div class="weui-cell__bd">
          <span class='weui-input label-span'>{{order.full_location}}</span>
        </div>
    </div>
    <div class="weui-cell">
      <div class="weui-cell_hd">
        <div class="weui-label">楼号-门牌号：</div>
      </div>
      <div class="weui-cell__bd">
          <span class='weui-input label-span'>{{order.location_ext}}</span>
        </div>
    </div>
  </div>
  <div class="backgroundColor"> </div>
    <div class="backgroundColor"> 
       <div class="zm">
         <span>招募留言：</span>
         <span>{{comments}}</span>
       </div>
       <!--维修 -->
       <div class="xiangmu" v-if="item.service_type_id===2" v-for="(item,index) in list">
          <div class="xiangmu1">维修{{item.commodity}}</div>
          <div class="time">
            <span> {{order.start_time}}</span>
            <span>（当地时间）</span>
          </div>
          <div class="yusuanjia">
            <span>项目预算价</span>
            <span class="text10"><input type="text" class="text11" readonly="" name="" :value="item.budget"></span>
            <span class="btn"><a :href="'__PUBLIC__repair_details/'+item.id" class="btn_ck">查看</a></span>
          </div>
       </div>
       <!--安装 -->
       <div class="xiangmu" v-if="item.service_type_id===1" v-for="(item,index) in list">
          <div class="xiangmu1">安装{{item.commodity}}</div>
          <div class="time">
            <span> {{order.start_time}}</span>
            <span>（当地时间）</span>
          </div>
          <div class="yusuanjia">
            <span>项目预算价</span>
            <span class="text10"><input type="text" class="text11" readonly="" name="" :value="item.budget"></span>
            <span class="btn"><button class="btn_ck">查看</button></span>
          </div>
       </div>
       <!--维修 -->
       <div class="xiangmu" v-if="item.service_type_id===5" v-for="(item,index) in list">
          <div class="xiangmu1" >更换灯片{{item.commodity}}</div>
          <div class="time">
            <span> {{order.start_time}}</span>
            <span>（当地时间）</span>
          </div>
          <div class="yusuanjia">
            <span>项目预算价</span>
            <span class="text10"><input type="text" class="text11" readonly="" name="" :value="item.budget"></span>
            <span class="btn"><button class="btn_ck">查看</button></span>
          </div>
       </div>
       <!--维修 -->
       <div class="xiangmu" v-if="item.service_type_id===6" v-for="(item,index) in list">
          <div class="xiangmu1" >围板搭建{{item.commodity}}</div>
          <div class="time">
            <span> {{order.start_time}}</span>
            <span>（当地时间）</span>
          </div>
          <div class="yusuanjia">
            <span>项目预算价</span>
            <span class="text10"><input type="text" class="text11" readonly="" name="" :value="item.budget"></span>
            <span class="btn"><button class="btn_ck">查看</button></span>
          </div>
       </div>

       <div class="content">
          <div class="xuanshifu">
            <input type="button"  class="xuanshifu_btn" @click="select_master()" value="选师傅">
          </div>
        <div class="total">
            <span class="heji">合&nbsp;&nbsp;&nbsp;计:￥{{totals}}</span>
        </div>
            <div class="read_quality">阅读量：{{rob_num}}次</div>
        </div>

      </div>
  <div class="xie">
    <div class="pinglun">
      <span>写评论</span>
      <span class="icon-bubbles3"></span>
      
    </div>
  </div>
  <div class="weui-cell">
    <div class="weui-cell_hd yuan"></div>
    <div class="weui-cell_bd heading">
      <a href="#">布鲁没谁了</a>
      <p>今天01:10</p>
    </div>
  </div>
  <div class="content1">
    <p>这个项目离我家挺近，报价也合理，这个单我接了</p>
  </div>
  <div class="content2">
    <div class="liulan">
      <span>浏览20次</span>
      <span class="icon-bubble2"></span>
      <span class="icon-thumb_up one"></span>
    </div>
  </div>
  <div class="weui-cell heading2">
    <div class="weui-cell_hd jia">
     <span class="icon-thumb_up two"> </span>
    </div>
    <div class="weui-cell_bd">
     <span><a href="#">时间煮雨也煮</a>、
     <a href="#">抠脚不收费</a></span>
    </div>
  </div>
  <div class="pinglun2">
    <span> <a href="#">爱情如水中月</a>：</span>
    <span>说的对！那你去吧</span>
  </div>
  <div class="textarea">
    <div class="textarea_one">
      <textarea class="weui-textarea" placeholder="评论" rows="1"></textarea>
    </div>
  </div>
  <div class="backgroundColor">
  </div>
    <div class="weui-cell">
    <div class="weui-cell_hd yuan"></div>
    <div class="weui-cell_bd heading">
      <a href="#">布鲁没谁了</a>
      <p>今天01:10</p>
    </div>
  </div>
  <div class="content1">
    <p>这个项目离我家挺近，报价也合理，这个单我接了</p>
  </div>
  <div class="content2">
    <div class="liulan">
      <span>浏览20次</span>
      <span class="icon-bubble2"></span>
      <span class="icon-thumb_up one"></span>
    </div>
  </div>
  <div class="weui-cell heading2">
    <div class="weui-cell_hd jia">
     <span class="icon-thumb_up two"> </span>
    </div>
    <div class="weui-cell_bd">
     <span><a href="#">时间煮雨也煮</a>、
     <a href="#">抠脚不收费</a></span>
    </div>
  </div>
  <div class="pinglun2">
    <span> <a href="#">爱情如水中月</a>：</span>
    <span>说的对！那你去吧</span>
  </div>
  <div class="textarea">
    <div class="textarea_one">
      <textarea class="weui-textarea" placeholder="评论" rows="1"></textarea>
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
    order:<?php echo $order; ?>,
    list:<?php echo $list; ?>,
    totals:<?php echo $total; ?>,
    comments:'<?php echo $comments; ?>',
    rob_num:<?php echo $rob_num; ?>
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
     select_master:function(){
      var _this=this;
      $.ajax({
        url:'__PUBLIC__change_status',
        data:{order_number:_this.order_number},
        dataType:'json',
        type:'post',
        success:function(data){
           if(data.code==200){
             window.location.href="__PUBLIC__select_master/"+_this.order_number;
           }else{
             $.toast(data.msg);
           }
         }
      })
         
      }
    },
    mounted: function () {
      $('#time').datetimePicker({
        min: this.getdata(1)
      });
    }
  })
  //头
  Vue.component('headers', {
    template: '#header',
    data: function () {
      return {
        title: "订单撮合"
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