<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"D:\wamp64\www\phone/application/index\view\nuclear\baogaoyouwenti.html";i:1510993243;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1510799168;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510646756;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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


<div class='app'>
    <headers></headers>
    <mian></mian>
    <menus></menus>
</div>


<script type="text/template" id="mian">
	<div class="">
		<div class='header'>
			<div class="header-wrapper">
				<div class="header-left" @click='goback()'>
					<i class='icon-arrow_lift'></i>
                    <span class='goback'>返回</span>
				</div>
				<div class="header-content">
                    <span class='text'>{{title}}</span>
                </div>
                <div class="header-right">
                </div>
		    </div>
		</div>
		<div class="baogaoyouwenti">
			<div class="box">
				<div class="textarea">
					<textarea class="textarea1" v-model="content"  placeholder="请填写反馈的问题"></textarea>
				</div>
			</div>
			<div class="btn">
				<input type="button" class="btn1" @click="btn()" value="确认" >
        <input type="button" @click='goback1()' class="btn2" value="取消" >
			</div>
		</div>
	</div>
</script>





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
      <a href="javascript:;" class="weui-tabbar__item">
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
    title:"",
    order_number:'<?php echo $order_number; ?>',
    content:'',
    title:'报告有问题',
  }
  Vue.component('mian', {
    template: '#mian',
    data: function () {
      return data 
      	

     
    },
    methods: {
      goback: function () {
        window.history.go(-1)
      },
      goback1: function () {
        window.history.go(-1)
      },
      btn:function(){
        var _this= this;
        var link = '__PUBLIC__master_nuclear/'+_this.order_number;
        $.ajax({
          url:'__PUBLIC__feedback',
          data:{order_number:_this.order_number,content:_this.content,link:link},
          dataType:'json',
          type:'post',
          success:function(data){
             if(data.code==200){
               $.toast(data.msg,function(){

               });
             }else{
               $.toast(data.msg,'error');
             }
          }
        })
         
      }

    },
    mounted: function () {
      $("#time1").calendar();
      $("#time2").calendar();
    
    }
  });
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