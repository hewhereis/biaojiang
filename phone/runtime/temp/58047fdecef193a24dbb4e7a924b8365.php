<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"D:\wamp64\www\phone/application/index\view\maintence\master_report.html";i:1511142019;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1510799168;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510646756;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
		<div class="header">
			<div class="header-wrapper">
				<div class="header-left" @click="goback()">
					<i class="icon-arrow_lift"></i>
					<span class="goback">返回</span>
				</div>
				<div class="header-content">
					<span class="text">{{title}}</span>
				</div>
				<div class="header-right"></div>
			</div>
		</div>
		<div class="weixiuquerenbaogao">
			<div class="box1">
				<div class="weui-cells_form">
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">订单编号：</label>
						</div>
						<div class="weui-cell__bd ">
							<input type="text" readonly="" class="text" placeholder="" name="" value="12345678910">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">项目名称：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" readonly="" class="text" placeholder="" name="" value="勘测-街边店">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">客户名称：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" class="text" readonly="" placeholder="" name="" value="张三">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">客户电话：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" class="text" readonly="" placeholder="" name="" value="12314546121">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">店铺地址：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" readonly="" class="text" placeholder="" name="" value="上海市嘉定区安亭镇方泰路25号">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">完成时间：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" readonly="" class="text" placeholder="" name="" value="2017-11-25">
						</div>
					</div>
				</div>
			</div>
			<div class="box2">
				<div class="weui-cells_form">
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">施工公司：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" class="text" placeholder="" name="" value="上海标匠有限公司">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">施工师傅：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" class="text" placeholder="" name="" value="李师傅">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">施工联系人：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" class="text" placeholder="" name="" value="张大脚">
						</div>
					</div>
					<div class="weui-cell row">
						<div class="weui-cell__hd">
							<label class="weui-label">施工方电话：</label>
						</div>
						<div class="weui-cell__bd">
							<input type="text" class="text" placeholder="" name="" value="12345645121">
						</div>
					</div>
				</div>
			</div>
			<div class="uploadPictures">
				<span class="camera">
					<img src="__indexStatic__/images/zhaoxiangji.png">
				</span>
				<span class="uploadPhoto">施工项目图片</span>
			</div>
			<div class="box3">
				<div class="weui-flex">
					<div class="weui-flex__item">
						<div class="weui-uploader__input-box">
							<input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="" name="">
						</div>
					</div>
					<div class="weui-flex__item">
						<div class="weui-uploader__input-box">
							<input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="" name="">
						</div>
					</div>
					<div class="weui-flex__item">
						<div class="weui-uploader__input-box">
							<input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="" name="">
						</div>
					</div>
				</div>
				<div class="weui-flex">
					<div class="weui-flex__item btn">
						<div class="">
							<span class="mentouBtn1">门头照</span>
						</div>
					</div>
					<div class="weui-flex__item btn">
						<div class="">
							<span class="mentouBtn2">签收单</span>
						</div>
					</div>
					<div class="weui-flex__item btn">
						<div class="">
							<span class="mentouBtn3">专柜全景</span>
						</div>
					</div>
				</div>
			</div>
			<div class="duibi">
                <span class="icon-camera"></span>
			    <span class="qianhouduibi">维修前后对比照上传</span>
			    <div class="weui-flex shangchuan4">
                    <div class="weui-flex__item">
                        <div class="border1">
                            <div class="tupian">
                                <img src="__indexStatic__/images/tupian.png" alt="">
                            </div>
                            <p class="text6">维修前</p>
                        </div>
                    </div>
                    <div class="weui-flex__item">
                        <div class="border1">
                            <div class="tupian">
                                <img src="__indexStatic__/images/tupian.png" alt="">
                            </div>
                            <p class="text6">维修后</p>
                        </div>
                    </div>
                </div>
                <div class="text2">
                    <input type="text3" readonly="" class="text3" name="texe3" id="text3" value="请对故障进行详细描述">
                </div>
             </div> 

			<div class="user">
				<span class="name">业主签字：</span>
				<span class="write">
					<input type="text" class="text2" placeholder="请业主签字" name="">
				</span>
			</div>
			<div class="user2">
				<span class="name2">服务确认码：</span>
				<span class="write2">
					<input type="text" class="text3" placeholder="请填写6位服务确认码" name="">
				</span>
			</div>
			<div class="button">
				<button class="button1">确认</button>
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
  }
  Vue.component('mian', {
    template: '#mian',
    data: function () {
      return { 	
      	title:'维修确认报告',

      }
    },
    methods: {
      goback: function () {
        window.history.go(-1)
      },
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
    },
    mounted: function () {
      $('#time').datetimePicker({
        min: this.getdata(1)
      });
      $("#time1").calendar();
      $("#time2").calendar();
     
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