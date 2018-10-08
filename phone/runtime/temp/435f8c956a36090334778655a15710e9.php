<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"D:\wamp64\www\phone/application/index\view\personalcmaster\index.html";i:1511503505;s:66:"D:\wamp64\www\phone/application/index\view\public\headerblack.html";i:1510799168;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
  <div id="app" style='padding-bottom: 53px;padding-top:0px'>


<div class='app'>
    <headers></headers>
    <mian></mian>
    <menus></menus>
</div>
<script type="text/x-template" id='mian'>
    <div class="MasterCenter">
        <div class="CenterTop">
            <div class="centerTopLeft">
                <div class="photo">
                    <img src="__DsQINiu__<?php echo $customer['img']; ?>"  onerror="this.src='__PUBLIC__static/index/images/tuyi.png'" alt="" width="60" height="60">
                </div>
            </div>
            <div class="centerTopRight">
                <div class="userName">
                    <span><?php echo $customer['username']; ?></span>
                    <a href="__PUBLIC__infomation" style="float: right;position: relative;top: -10px">
                        <span class="icon-消息"></span>
                        <span style="color: #ffffff">消息</span>
                    </a>
                </div>
                <div class="userPhone">
                    <span><?php echo $customer['phone']; ?></span>
                </div>
                <div class="editInfo">

                    <a href="__PUBLIC__wallet/index10">
                        <span>我的账户</span>
                        <i class='icon-keyboard_arrow_right'></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="centerMenuList">

            <div class="centerMenuListInfo">
                <a href="__PUBLIC__studytrain_index" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/stution@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>学习中心</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
                <a href="__PUBLIC__master_choice" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/exam@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>在线考试</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="centerMenuListInfo">
                <a href="__PUBLIC__wallet/index8" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/goodPoint@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>综合评分</span>
                            </div>
                            <div class="centerMenuList-item-info-right">
                                <span class='spanColor'><?php echo $customer['credit_score']; ?>分</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="centerMenuListInfo">
                <a href="__PUBLIC__wallet/index_home" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/purse@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>我的钱包</span>
                            </div>
                            <div class="centerMenuList-item-info-right">
                                <span>提现、余额、收入明细</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
                <a href="__PUBLIC__wallet/index1" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/bills@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>账单明细</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="centerMenuListInfo">
                <a href="__PUBLIC__wallet/index5" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/evaluate@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>评价管理</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
                <a href="__PUBLIC__wallet/index6" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/complaint@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>投诉记录</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
                <!--<a href="__PUBLIC__wallet/index4" class="centerMenuList-item">-->
                    <!--<div class='centerMenuList-item-Content'>-->
                        <!--<div class="centerMenuList-item-photo">-->
                            <!--<img src="__indexStatic__images/share@2x.png" alt="" width='30' height='30'>-->
                        <!--</div>-->
                        <!--<div class="centerMenuList-item-info">-->
                            <!--<div class="centerMenuList-item-info-left">-->
                                <!--<span>分享推荐</span>-->
                            <!--</div>-->
                            <!--<i class='icon-keyboard_arrow_right'></i>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</a>-->
            </div>
            <div class="centerMenuListInfo">
                <a href="__PUBLIC__wallet/index7" class="centerMenuList-item">
                    <div class='centerMenuList-item-Content'>
                        <div class="centerMenuList-item-photo">
                            <img src="__indexStatic__images/picture@2x.png" alt="" width='30' height='30'>
                        </div>
                        <div class="centerMenuList-item-info">
                            <div class="centerMenuList-item-info-left">
                                <span>完工照片</span>
                            </div>
                            <i class='icon-keyboard_arrow_right'></i>
                        </div>
                    </div>
                </a>
            </div>
            <a href="__PUBLIC__logout" class="weui-btn" style="width: 80%;margin: 0 auto;background:#ff8270 ">退出当前账户</a>

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
        userName: "那年花儿开",
        userPhone: "180****9113",
        userPhoto: "__indexStatic__images/pic_160.png",
        goodPoint:100
    }
    Vue.component('mian', {
        template: '#mian',
        data: function () {
            return data
        },
        methods: {

        },
        mounted: function () {}
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
        el: '.app',
        data: data
    })
</script>