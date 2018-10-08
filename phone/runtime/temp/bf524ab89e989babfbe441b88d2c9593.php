<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wamp64\www\phone/application/index\view\index\index.html";i:1511417215;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;}*/ ?>
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
    <script>
		var ds_public='__PUBLIC__';
        var html = $('html')
        var hW = html.outerWidth() > 640 ? 640 : html.outerWidth()
        _rem = 16
        html.css('fontSize', _rem)
        $(function () {
            FastClick.attach(document.body)
        })
    </script>
</head>
<body>
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
<div id="apps">
    <si-headers></si-headers>
    <si-footer></si-footer>
</div>
<script id="headers"   type="text/x-template">
    <div class="shouye">
        <div class="headers">
            <div class="brand">
                <img src="__indexStatic__images/logolong.png" alt="">
            </div>
				<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>
			    <!-- 判断登入状态 -->
					<?php if(empty($_SESSION['think']['ds_username'])): ?>
						<div class="auth">
							<a href="__PUBLIC__login">登录</a>
						</div>
					<?php else:?>
						<div class="auth">
						  <?php echo $_SESSION['think']['ds_username'] ?>
						</div>
					<?php endif; ?>
        </div>
        <div class="daohang">
            <a href="">
                <img src="__indexStatic__images/b1.png" alt="">
            </a>
            <div class="list">
                <ul class="lis">
					<?php if(empty($_SESSION['think']['type'])): ?>
						 <li v-for="item in list" class="list_item">
                            <a href="">
                            <span class="icon-喇"></span>
                            <span class="or" style="font-size:14px;">王师傅刚刚完成了维修的订单...</span>
                            <span class="time">{{item.create_time}}</span>
                            </a>
                        </li>
					<?php else:if($_SESSION['think']['type']==1): ?>
							<li v-for="item in list" class="list_item">
                            <a href="">
                            <span class="icon-喇"></span>
                            <span class="or" style="font-size:14px;">张师傅刚刚完成了维修的订单···</span>
                            <span class="time">{{item.create_time}}</span>
                            </a>
                        </li>
						<?php else:?>
							<li v-for="item in list" class="list_item">
                            <a href="">
                            <span class="icon-喇"></span>
                            <span class="or" style="font-size:14px;">张先生刚刚发布了维修的订单··· </span>
                            <span class="time">{{item.create_time}}</span>
                            </a>
                        </li>
						<?php endif; endif; ?>
						
				
                    
						
					
			

                </ul>
            </div>
        </div>
        <div class="bg-primary-hieght"></div>
        <div class="leixing">
            服务类型 | Aervice
        </div>
        <div class="weui-flex">
		
            <div class="weui-flex__item ">
                <a href="__PUBLIC__repair_order" class="banr-na ora">
                    <div class="img">
                        <img src="__indexStatic__images/q1.png" alt="">
                    </div>
                    <div class="text">

                        <span class="tl">
                            维修
                        </span>
                        <span class="t2">
                              Maintain
                        </span>

                    </div>
                </a>
            </div>
            <div class="weui-flex__item">
                <a href="index" class="banr-na">
                    <div class="img">
                        <img src="__indexStatic__images/q2.png" alt="">
                    </div>
                    <div class="text">
                        <span class="tl">
                            安装
                        </span>
                        <span class="t2">
                              Install
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="orb"></div>
        <div class="orbr"></div>
        <div class="weui-flex ma">
            <div class="weui-flex__item ">
                <a href="index" class="banr-na ora">
                    <div class="img">
                        <img src="__indexStatic__images/q3.png" alt="">
                    </div>
                    <div class="text">


                        <span class="tl">
                            勘测
                        </span>
                        <span class="t2">
                              Survey
                        </span>
                    </div>
                </a>
            </div>
            <div class="weui-flex__item">
                <a href="index" class="banr-na">
                    <div class="img">
                        <img src="__indexStatic__images/q4.png" alt="">
                    </div>
                    <div class="text">


                        <span class="tl">
                            更换灯片
                        </span>
                        <span class="t2">
                              Lamp Slice
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="orb"></div>
        <div class="orbr"></div>
        <div class="weui-flex ma">
            <div class="weui-flex__item ">
                <a href="index" class="banr-na ora">
                    <div class="img">
                        <img src="__indexStatic__images/q5.png" alt="">
                    </div>
                    <div class="text">

                        <span class="tl">
                            围板搭建
                        </span>
                        <span class="t2">
                              Strutcures
                        </span>

                    </div>
                </a>
            </div>
            <div class="weui-flex__item">
                <a href="index" class="banr-na">
                    <div class="img">
                        <img src="__indexStatic__images/q6.png" alt="">
                    </div>
                    <div class="text">


                        <span class="tl">
                            更多功能
                        </span>
                        <span class="t1">
                              尽情期待
                        </span>

                    </div>
                </a>
            </div>
        </div>
    </div>


</script>
<script>
var data={
	list:<?php echo $list; ?>
	
}
    Vue.component('si-headers', {
        template: '#headers',
        data: function () {
             return data
        },
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return data
        },
        methods:{

        },
        computed:{

        },
        beforeUpdate:function () {
        },
        updated:function () {

        },
        mounted:function () {

        },

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
        el: '#apps',
        mounted:function () {

        },
        methods:{
        }
    })
</script>
