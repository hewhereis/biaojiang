<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\wamp64\www\phone/application/index\view\mastersingle\grab_single.html";i:1511572933;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
<script type="text/template" id="mian">
<div class="liuyanpeishifu">
	<div class="bianhao">
		<span>订单编号：</span>
		<span><?php echo $onumber; ?></span>
		<input hidden type="hidden" value="<?php echo $onumber; ?>" id="onumber">
	</div>
	<div class="weui-cells1 weui-cells_form">
		<div class="weui-cell">
			<div class="weui-cell_hd">
				<label class="weui-label">客户名称</label>
			</div>
			<div class="weui-cell_bd" style='width:100%'>
				<span class="weui-input"><?php echo $list['uname']; ?></span>
			</div>
		</div>
		<div class="weui-cell">
			<div class="weui-cell_hd">
				<label class="weui-label">店铺地址</label>
			</div>
			<div class="weui-cell_bd">
				<input type="text" name="address" readonly="" id="address" value="<?php echo $list['address']; ?>">
			</div>
		</div>
		<div class="weui-cell">
			<div class="weui-cell_hd">
				<div class="weui-label">
					预约施工
				</div>
			</div>
			<div class="weui-cell_bd">
				<input type="text" name="menpaihao" readonly="" id="menpaihao" value="<?php echo $list['laddress']; ?>">
			</div>
		</div>
		<div class="zm">
			<span>招募留言：</span>
			<?php if($list['service_type_id']==1): ?>
			<span><?php echo $list['ecomments']; ?></span>
			<?php elseif($list['service_type_id']==2):?>
			<span><?php echo $list['dcomments']; ?></span>
			<?php elseif($list['service_type_id']==5):?>
			<span><?php echo $list['gcomments']; ?></span>
			<?php elseif($list['service_type_id']==6):?>
			<span><?php echo $list['mcomments']; ?></span>
			<?php endif;?>
		</div>
	</div>
	<!-- 安装 -->
	<div class="backgroundColor" v-if='service_type_id==1' v-for="(item,index) in install_list">
		<div class="xiangmu">
			<div class="xiangmu1">
				安装-{{item.name}}
			</div>
			<div class="time">
				<span><?php echo $start_time; ?></span>
				<span>（当地时间）</span>
			</div>
			<div class="yusuanjia">
				<span>项目预算价</span>
				<span class="text10">{{item.budget}}</span>
				<span class="btn"><button class="btn_ck" style="background-color:#58a22f ">查看</button></span>
			</div>
		</div>
	</div>
	<!-- 维修 -->
	<div class="backgroundColor" v-if='service_type_id==2' v-for="(item,index) in repair_list">
		<div class="xiangmu">
			<div class="xiangmu1">
				维修-{{item.name}}
			</div>
			<div class="time">
				<span><?php echo $start_time; ?></span>
				<span>（当地时间）</span>
			</div>
			<div class="yusuanjia">
				<span>客户招标价</span>
				<span class="text10">{{item.budget}}</span>
				<span class="btn" style="background-color:#58a22f "><a :href="'__PUBLIC__repair_details/'+item.id" class="btn_ck">查看</a></span>
			</div>
		</div>
	</div>
	<!-- 更换 -->
	<div class="backgroundColor" v-if='service_type_id==5' v-for="(item,index) in replace_list">
		<div class="xiangmu">
			<div class="xiangmu1">
				更换换灯片
			</div>
			<div class="time">
				<span><?php echo $start_time; ?></span>
				<span>（当地时间）</span>
			</div>
			<div class="yusuanjia">
				<span>项目预算价</span>
				<span class="text10">{{item.budget}}</span>
				<span class="btn"><button class="btn_ck">查看</button></span>
			</div>
		</div>
	</div>
	<!-- 围板 -->
	<div class="backgroundColor" v-if='service_type_id==6' v-for="(item,index) in coaming_list">
		<div class="xiangmu">
			<div class="xiangmu1">
			   围板搭建和拆除
			</div>
			<div class="time">
				<span><?php echo $start_time; ?></span>
				<span>（当地时间）</span>
			</div>
			<div class="yusuanjia">
				<span>项目预算价</span>
				<span class="text10">{{item.budget}}</span>
				<span class="btn"><button class="btn_ck">查看</button></span>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="xuanshifu">
			<button class="xuanshifu_btn" @click="grab_sing">
			抢单
			</button>
		</div>
		<div class="total">
			<?php if($list['service_type_id']==1): ?>
			<span><span class="heji">合&nbsp;&nbsp;&nbsp;计:￥<?php echo $install_sum; ?></span></span>
			<?php elseif($list['service_type_id']==2):?>
			<span><span class="heji">合&nbsp;&nbsp;&nbsp;计:￥<?php echo $repair_sum; ?></span></span>
			<?php elseif($list['service_type_id']==5):?>
			<span><span class="heji">合&nbsp;&nbsp;&nbsp;计:￥<?php echo $replace_sum; ?></span></span>
			<?php elseif($list['service_type_id']==6):?>
			<span><span class="heji">合&nbsp;&nbsp;&nbsp;计:￥<?php echo $coaming_sum; ?></span></span>
			<?php endif;?>
		</div>
		<div class="read_quality">
		阅读量：<?php echo $list['rob_num']; ?>次
		</div>
	</div>
	<div class="xie">
		<div class="pinglun">
			<span>写评论</span>
			<span class="pinglun_tu">
			<img src="__indexStatic__/images/xiepinglun.png">
			</span>
		</div>
	</div>
	<div class="weui-cell">
		<div class="weui-cell_hd yuan">
		</div>
		<div class="weui-cell_bd heading">
			<a href="#">布鲁没谁了</a>
			<p>
			今天01:10
			</p>
		</div>
	</div>
	<div class="content1">
		<p>
		这个项目离我家挺近，报价也合理，这个单我接了
		</p>
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
	install_list:<?php echo $install_list; ?>,
	repair_list:<?php echo $repair_list; ?>,
	coaming_list:<?php echo $coaming_list; ?>,
	replace_list:<?php echo $replace_list; ?>,
	service_type_id:<?php echo $service_type_id; ?>,
    sex: 1
  }
  Vue.component('mian', {
    template: '#mian',
    data: function () {
      return data
    },
    methods: {
	   grab_sing: function(){
		var onumber=$('#onumber').val();
		$.showLoading();
				$.ajax({
					url:ds_public+'ds_single',
					type:'post',
					dataType:'json',
					data:{
					onumber:onumber
					},
					success:function(data){
					if (data.code == 200) {
							$.hideLoading();
							window.location.href = "__PUBLIC__grab_page/"+onumber;
						}else{
						$.hideLoading();	
						$.toptip(data.msg,'error');
					}
				}
			});
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