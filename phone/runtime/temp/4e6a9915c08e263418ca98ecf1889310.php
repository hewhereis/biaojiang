<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\wamp64\www\phone/application/index\view\masterhome\master_home.html";i:1510799168;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;}*/ ?>
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
	<div class="shifushouye">
		<si-headers></si-headers>
		<si-content></si-content>
          <si-footer></si-footer>
	</div>
</div>
<script type="text/x-template" id="content">
    <div class="parent">
        <div class="bj-header" >
            <ul class="nav-header">
				<li @click="setype(0)" :class="{active:topheader==0||topheader==''}">
				   全部
                </li>
                <li class=""   v-for="(item,index) in service" @click="setype(item.id)" :class="{active:topheader==item.id}">
                   {{item.name}}
                </li>
            </ul>
        </div>
			<form  name="myfroms" id="myforms" method="post" action="__PUBLIC__masterhome">
					<input  hidden style="hidden" name="ser" id="ser" value="<?php echo $ser; ?>" />
		    </form>
        <div class="content">
            <div class="bg-primary-hieght">
            </div>
			<div v-for="(item,index) in list">
					<div class="tablet" >
						<div class="weui-flex dingdanhao">
							<div class="weui-flex__item dingdanhao-left">
								订单号:{{item.order_number}}
							</div>
						</div>
						<div class="weui-panel weui-panel_access">
							<div class="weui-panel__bd tuwenzhenghe">
								<div  class="weui-media-box weui-media-box_appmsg">
									<div class="weui-media-box__hd">
										<img class="weui-media-box__thumb img" :src="DsQINiu+item.uimg" onerror="this.src='__indexStatic__images/tuyi.png'" >
									</div>
									<div class="weui-media-box__bd">
										<h4 class="weui-media-box__title title">类型:{{item.sname}}</h4>
										<h4 class="weui-media-box__title title">施工地址:{{item.full_location}}</h4>
										<h4 class="weui-media-box__title title">施工时间:{{item.start_time}}</h4>
										<h4 class="weui-media-box__title title jiage ">
											<span v-if='item.service_type_id==1' class="jiages">价格:{{item.eprice}}</span>
											<span v-if='item.service_type_id==2' class="jiages">价格:{{item.dprice}}</span>
											<span v-if='item.service_type_id==5' class="jiages">价格:{{item.gprice}}</span>
											<span v-if='item.service_type_id==6' class="jiages">价格:{{item.mprice}}</span>
											
											<div v-if="item.order_number==item.o_ord && uid==item.o_wid && item.o_rob==1">
												<input type="button" class=" bj-button-orange" value="您已抢单,等待客户选择">
											</div>
											<div v-else>
											    <input type="button" @click="grab_single(item.order_number)" class="bj-button-orange" value="抢单">
											</div>
											
											
											
											
										</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="bg-primary-hieght">
					</div>
				</div>	
				<if condition="count($list) eq 6">
					<a  id="btn"  href="javascript:;"></a>
				</if>
        </div>
    </div>
</script>
<script>
var data={
	list:<?php echo $list; ?>,
	service:<?php echo $service; ?>,
	topheader:'<?php echo $ser; ?>',
	uid:'<?php echo $uid; ?>',
	DsQINiu:'__DsQINiu__'
}
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "师傅首页",
                left:"",
                right:"<div><span  class=\"icon-消息\"></span>消息</div>"
            }
        },
        methods:{
        }
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return data
        },
        methods:{
		setype: function(id){
				$('#ser').val(id);
				document.getElementById("myforms").submit();
				},
		grab_single: function(order_number){
					$.showLoading();
					$.ajax({
							url:ds_public+'real_name',
							type:'post',
							dataType:'json',
							success:function(data){
							if (data.code == 200) {
								$.hideLoading();
									window.location.href = "__PUBLIC__grab_single/"+order_number;
								}else{
								 $.hideLoading();
									if(data.code==0){
										$.modal({
										  title: "提示",
										  text: data.msg,
										  buttons: [
											{ text: "去看看", onClick: function(){ window.location.href = "__PUBLIC__true_master";} },
											{ text: "取消", className: "default", onClick: function(){ console.log(3)} },
										  ]
										});
									}else if(data.code==1){
										 $.hideLoading();	
										 $.toptip(data.msg,'warning');
										
									}else if(data.code==3){
										$.modal({
										  title: "提示",
										  text: data.msg,
										  buttons: [
											{ text: "去看看", onClick: function(){ window.location.href = "__PUBLIC__true_master";} },
											{ text: "取消", className: "default", onClick: function(){ console.log(3)} },
										  ]
										});
									}
							}
							
						}
					});
				
				
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
					  $.post("__PUBLIC__masterhome", {start: nStart,ser:ser}, function(res){
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
    Vue.component('si-footer', {
        template: '#menu',
        data: function () {
            return {

            }
        },
        methods:{

        },
        computed:{

        },
        mounted:function () {

            var le =$(".list_item").length;
            var wd =$(".list_item").height();
            var lis=$(".lis");
            var zo=le*wd;
            var i=0;
            setInterval(function () {

                lis.css('transform','translateY('+i+'px)');
                if(i<-zo+20){
                    i=0;
                }
                i--;
            },600)
        },
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