<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"D:\wamp64\www\phone/application/index\view\ordermanage\order_master_home.html";i:1511572933;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:64:"D:\wamp64\www\phone/application/index\view\workstype\repair.html";i:1511428396;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
  <title>__Dstitle__</title>
  <link rel="stylesheet" href="__indexStatic__css/reset.css">
  <link rel="stylesheet" href="__indexStatic__css/style.css">
  <link rel="stylesheet" href="__indexStatic__font/style.css">
  <link rel="stylesheet" href="__indexStatic__css/weui.min.css">
  <link rel="stylesheet" href="__indexStatic__css/jquery-weui.min.css">
  <script src='__indexStatic__js/vue.min.js'></script>
  <script src='__indexStatic__js/vuex.js'></script>
  <script src='__indexStatic__js/jquery-2.1.4.js'></script>
  <script src='__indexStatic__js/jquery-weui.min.js'></script>
  <script src='__indexStatic__js/fastclick.js'></script>
  <link rel="stylesheet" href="__indexStatic__css/index.css">
  <link rel="stylesheet" href="__indexStatic__css/index2.css">

  <link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/webuploader.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/style.css">
  <script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
  <script>
  var ds_public='__PUBLIC__';
    var html = $('html')
    var hW = html.outerWidth() > 640 ? 640 : html.outerWidth()
    _rem = 16
    html.css('fontSize', _rem)
    $(function () {
      FastClick.attach(document.body)
    })
    Vue.prototype.select=function (element,text,multi,items,onchange) {
      $("#"+element).select({
          title: text,
          multi: multi,
          items: items,
          onChange:onchange
      })}
  Vue.prototype.WebUploader=function (element,func) {

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
  Vue.prototype.DsQINiu='__DsQINiu__';
  Vue.prototype.PUBLIC='__PUBLIC__';



  </script>
</head>
<body>
<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>
<script type="text/x-template" id='header'>
  <div class='header'>
    <div class="header-wrapper">
      <div class="header-left" @click='goback()' v-html="left">

      </div>
      <div class="header-content">
        <span class='text'>{{title}}</span>
      </div>
      <div class="header-right"  v-html="right">

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
     <a href="__PUBLIC__customer_home" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_cell.png" alt="">
        </div>
        <p class="weui-tabbar__label">我的</p>
      </a>
    </div>
  </div>
</script>
<link rel="stylesheet" href="__indexStatic__/layui/css/layui.css">
<script src="__indexStatic__/layui/layui.js"></script>
<body>
<div id="bj-app">
	<div class="wodedingdan">
		<si-headers></si-headers>
		<si-content></si-content>
		<si-footer></si-footer>
	</div>
</div>
<script type="text/x-template" id="content">
    <div class="parent">
        <div class="bj-header">
            <ul class="nav-header">
                <li class="" :class="{active:topheader==0}" @click="topclick(0)">
                    <span>全部</span>
                </li>
                <li class="" :class="{active:topheader==1}" @click="topclick(1)">
                    <span>待定标</span>
                </li>
                <li :class="{active:topheader==2}" @click="topclick(2)">
                    <span>待付款</span>
                </li>
                <li :class="{active:topheader==3}" @click="topclick(3)">
                    <span>待完工</span>
                </li>
                <li class="" :class="{active:topheader==4}" @click="topclick(4)">
                    <span>待验收</span>
                </li>
                <li :class="{active:topheader==5}" @click="topclick(5)">
                    <span>待评价</span>
                </li>
            </ul>
        </div>
		<form  name="myfroms" id="myforms" method="post" action="__PUBLIC__order_master_home">
					<input  hidden style="width:100px;height:50px;margin-top:50px;" name="ser" id="ser" value="<?php echo $ser; ?>" />
		   </form>
        <div class="content">
            <div class="tab">
				<div  v-for="(item,index) in list">
					 <div class="bg-primary-hieght"></div>
						<div class="tab-header">
							<div class="weui-flex">
								<div class="weui-flex__item left">
								<span class="orange">{{item.sname}}</span>
								
								</div>
								<div class="weui-flex__item text-hui right">付款金额 : <span class="orange">￥{{item.amount_urgent}}</span></div>
							</div>
						</div>
					<a :href="'__PUBLIC__order_master_state/'+item.id">	
			
					<div class="tab-content">
						<div class="text weui-flex">
							<div class="left"> 客户名称:<span class="">{{item.bname}}</span></div>
							<div class="right">
								<span class="icon-倒计时 tl"></span>
								<span class="orange"  v-if="item.master_status==1">待定标</span>
								<span class="orange"  v-if="item.master_status==2">待付款</span>
								<span class="orange"  v-if="item.master_status==3">待完工</span>
								<span class="orange"  v-if="item.master_status==4">待验收</span>
								<span class="orange"  v-if="item.master_status==5">待评价</span>
								<span class="orange"  v-if="item.master_status==6">追加评价</span>
								<span class="orange"  v-if="item.master_status==7">交易完成</span>
								<span class="orange"  v-if="item.master_status==8">交易关闭</span>
								
								
							</div>
						</div>
						<div class="text weui-flex">

							<div class="left ">
								品牌名称:  
								<span v-if="item.service_type_id==1" >{{item.e_brand}}</span>
								<span v-if="item.service_type_id==2" >{{item.d_brand}}</span>
								<span v-if="item.service_type_id==4" >{{item.s_brand}}</span>
								<span v-if="item.service_type_id==5" >{{item.g_brand}}</span>
								<span v-if="item.service_type_id==6" >{{item.m_brand}}</span>
							</div>
							<div class="right">
								<span v-if="item.service_type_id==1" >安装</span>
								<span v-if="item.service_type_id==2" >﻿<div v-if="item.work_step_service==1">
			 <div v-if="item.master_status==1">	
				 <a href="javascript:;" class="bg-orange">已抢单</a> 
			 </div>
			 
			 <div v-if="item.master_status==2">	
				 <a href="javascript:;" class="bg-orange">提醒付款</a> 
			 </div>
	 
			 <div v-if="item.master_status==3">	
				 <div v-if="item.work_step_number==2">	
					<a :href="'__PUBLIC__contact_customers/'+item.order_number" class="bg-orange">联系客户</a> 
				 </div>
				
				 <div v-if="item.work_step_number==3">	
					<a :href="'__PUBLIC__master_sign/'+item.id" class="bg-orange">点击签到</a> 
				 </div>
				
				 <div v-if="item.work_step_number==4">	
					<div v-if="item.is_bomb==0">	
						<a :href="'__PUBLIC__master_reports/'+item.order_number" class="bg-orange">提交施工报告</a> 
					 </div>
					 <div v-if="item.is_bomb==1">	
						<a :href="'__PUBLIC__master_nuclear/'+item.order_number" class="bg-orange">提交核单报告</a> 
					</div>
				</div>
				
				<div v-if="item.work_step_number==5">	
					<a :href="'__PUBLIC__master_reports/'+item.order_number" class="bg-orange">提交施工报告</a> 
				</div>
				
				 <div v-if="item.work_step_number==6">	
					<a :href="'__PUBLIC__master_sign_out/'+item.id" class="bg-orange">点击签退</a> 
				</div>
				
			 </div>
			 <div v-if="item.master_status==4">	
				 	<a :href="'__PUBLIC__master_reports/'+item.order_number" class="bg-orange">提交验收报告</a> 
			 </div>
			 <div v-if="item.master_status==5">	
				 <a href="" class="bg-orange">去评价</a> 
			 </div>
			 <div v-if="item.master_status==6">	
				 <a href="" class="bg-orange">追加评价</a> 
			 </div>
		
</div>
<div v-else-if="item.work_step_service==2">
		 <div v-if="item.master_status==2">	
			 <a href="" class="bg-orange">提醒客户付款</a> 
		 </div>
		 <div v-if="item.master_status==3">	
		 
			 <div v-if="item.work_step_number==5">	
				<a :href="'__PUBLIC__contact_customers/'+item.order_number" class="bg-orange">联系客户</a> 
		 	 </div>
			  <div v-if="item.work_step_number==6">	
				<a :href="'__PUBLIC__master_sign/'+item.id" class="bg-orange">点击签到</a> 
		 	 </div>
			  <div v-if="item.work_step_number==7">	
					<div v-if="item.is_bomb==0">	
						<a :href="'__PUBLIC__master_reports/'+item.order_number" class="bg-orange">提交施工报告</a> 
					 </div>
					 <div v-if="item.is_bomb==1">	
						<a :href="'__PUBLIC__master_nuclear/'+item.order_number" class="bg-orange">提交核单报告</a> 
					</div>
		 	 </div>
			  <div v-if="item.work_step_number==8">	
				<a :href="'__PUBLIC__master_reports/'+item.order_number" class="bg-orange">提交施工报告</a> 
		 	 </div>
			  <div v-if="item.work_step_number==9">	
				<a :href="'__PUBLIC__master_sign_out/'+item.id" class="bg-orange">点击签退</a> 
		 	 </div>
			
		 </div>
		 <div v-if="item.master_status==4">	
			 <a :href="'__PUBLIC__master_reports/'+item.order_number" class="bg-orange">提交验收报告</a> 
		 </div>
		 <div v-if="item.master_status==5">	
			 <a href="" class="bg-orange">去评价</a> 
		 </div>
		 <div v-if="item.master_status==6">	
			 <a href="" class="bg-orange">追加评价</a> 
		 </div>
</div></span>
								<span v-if="item.service_type_id==4" >勘测</span>
								<span v-if="item.service_type_id==5" >更换</span>
								<span v-if="item.service_type_id==6" >围板</span>
							</div>
								
						</div>
						
						<p class="text">店铺地址: <span>{{item.full_location}}-{{item.location_ext}}</span> </p>
					</div>
					</a>
					<div class="tab-footer weui-flex">
						<div class="left">
							<span class="text-hui">订单编号:{{item.order_number}}</span>
						</div>
						<div class="right">
							
							
							
						</div>
					</div>
				</div>
            </div>
            <div class="bg-primary-hieght"></div>
        </div>
		<if condition="count($list) eq 6">
					<a  id="btn"  href="javascript:;"></a>
				</if>
    </div>
</script>
<script>
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "我的订单",
                left:"",
                right:""
            }
        },
        methods:{
        }
    });
    Vue.component('si-footer', {
        template: '#menu',
        data: function () {
        },
        methods:{
        }
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return {
				list:<?php echo $list; ?>,
			    topheader:'<?php echo $ser; ?>',
			    DsQINiu:'__DsQINiu__',
                
            }
        },
        methods:{
            topclick:function (i) {
                this.topheader=i;
				$('#ser').val(i);
				$("#myforms").submit();
            },
			load:function(){
				_that = this;
				var nStart = 6;
				var ser=$('#ser').val();
				layui.use('flow', function(){
				var $ = layui.jquery; //不用额外加载jQuery，flow模块本身是有依赖jQuery的，直接用即可。
				  flow = layui.flow;
				  flow.load({
					elem: '#btn' //指定列表容器
					,done: function(page, next){ //到达临界点（默认滚动触发），触发下一页
					  var lis = [];
					  //以jQuery的Ajax请求为例，请求下一页数据（注意：page是从2开始返回）
					  $.post("__PUBLIC__order_master_home", {start: nStart,ser:ser}, function(res){
						//假设你的列表返回在data集合中
								layui.each(res.result, function(index, item){
								_that.list.push(item)
						}); 
						//执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
						//pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
						next(lis.join(''), nStart < res.totals,nStart += 6); 
					  });
					}
				  });
				});
		}
        },
		mounted:function(){
			this.load()
		}
    });
    new Vue({
        el: '#bj-app',
        mounted:function () {
        },
        methods:{
        }
    })
</script>
</body>