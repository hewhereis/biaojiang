<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"E:\web-php-5.6\bjtp5/application/index\view\personal\client_home.html";i:1510103679;s:62:"E:\web-php-5.6\bjtp5/application/index\view\public\header.html";i:1510103679;s:68:"E:\web-php-5.6\bjtp5/application/index\view\public\style_header.html";i:1510103679;s:62:"E:\web-php-5.6\bjtp5/application/index\view\public\footer.html";i:1510103679;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>__Dstitle__</title>
		<link rel="icon" type="image/png" href="__PUBLIC__static/index/images/favicon.png" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="description" content="">
		<meta name='keywords' content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="__PUBLIC__static/index/js/layui/css/layui.css">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrapValidator/bootstrapValidator.min.css">
		<link rel="stylesheet" href="__PUBLIC__static/index/js/bootstrapfileinput/css/fileinput.min.css">
		<!-- Font awesome -->

		<link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/font-awesome.min.css">
		<link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/awesome-bootstrap-checkbox.css">
		<!--swiper-->
		<link rel="stylesheet" href="__PUBLIC__static/index/js/swiper/swiper.min.css">

		<!-- Main -->
		<link rel="stylesheet" href="__PUBLIC__static/index/css/main.css">
		<!-- Custom -->
		<link rel="stylesheet" href="__PUBLIC__static/index/css/custom.css">
		<link rel="stylesheet" href="__PUBLIC__static/index/css/custom2.css">
		<!--[if lt IE 9]>
              <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
              <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
		<!--jQuery -->
		<script src="__PUBLIC__static/index/js/jquery/jquery-1.11.2.min.js"></script>
		<!--Bootstrap -->
		<script src="__PUBLIC__static/index/js/bootstrap/bootstrap.min.js"></script>
		<script src="__PUBLIC__static/index/js/bootstrap/bootstrap-datetimepicker.min.js"></script>
		<script src="__PUBLIC__static/index/js/bootstrap/bootstrap-datetimepicker.zh-CN.js"></script>
		<script src="__PUBLIC__static/index/js/bootstrapValidator/bootstrapValidator.min.js"></script>
		<script src="__PUBLIC__static/index/js/bootstrapValidator/zh_CN.js"></script>
		<script src="__PUBLIC__static/index/js/bootstrapfileinput/js/fileinput.min.js"></script>
		<script src="__PUBLIC__static/index/js/bootstrapfileinput/js/locales/zh.js"></script>
		<!--swiper-->
		<script type="text/javascript" src="__PUBLIC__static/index/js/swiper/swiper.min.js"></script>
		<!-- layui -->
		<script src="__PUBLIC__static/index/js/layui/lay/dest/layui.all.js" type="text/javascript"></script>
		<script src="__PUBLIC__static/index/js/placeholder/placeholder.min.js"></script>
		<script src="__PUBLIC__static/index/js/tool.js"></script>
		<script src="__PUBLIC__static/index/js/public.js"></script>
		<script src="__PUBLIC__static/index/js/jquery.form.js"></script>


		
		
		
		<!--<images src="image_origin.png" onerror="this.src=placeholder.getData({size:'256x128',})" title='logo'>-->
		
		
	</head>

	<body>
		<div class='wrapper'>
			<div class='inner-wrapper'>
				<!--login + order info strat-->
				<div class='header navbar-fixed-top'>
					<div class='header-login'>
						<div class='container'>
						
						<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>

							<div class='row p-5 '>
								<div class='col-xs-12 max-hight-media-0'>
								<!-- 未登入状态 -->
								<?php if(empty($_SESSION['think']['ds_username'])): ?>
									<div class='row'>
										<div class='col-xs-5 pull-right-max-width-media-765 col-sm-3 switchover'>
										<i class="fa text-orange fa-map-marker" aria-hidden="true"></i>
										<span>苏州</span>
										</div>
										<div class='col-xs-3 col-sm-1 col-sm-offset-3  text-center'>
											<a href='javascript:;' id="is_weixin" class='text-sm text-black'>登录</a>
											<i class='pull-right text-black-rgb hidden-xs'>|</i>
										</div>
										<div class='col-xs-6 col-sm-3 text-left hidden-xs' >
										<i class="fa fa-phone" aria-hidden="true"></i>
											<i href='' class='text-sm text-black font-awesome'>咨询热线:17770427747</i>
										</div>
									</div>
									<!-- 登入后的状态 -->
									<?php else: ?>
									<div class='row'>
										<div class='col-xs-5 col-md-5 col-sm-3 switchover pull-right-max-width-media-765'>
										<i class="fa text-orange fa-map-marker" aria-hidden="true"></i>
										<span>苏州</span>
										</div>
										<div class='col-xs-3 col-sm-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-6 text-center' style="margin-right: 20px;" id="touxiang">
										<div class='aba'></div>
											<a href='' class='text-sm text-black text-orange'><?php echo $_SESSION['think']['ds_username'] ?>
												<i class="fa fa-sort-asc"></i>
											</a>
											<ul >
												<li>
													<?php if($_SESSION['think']['type']==1): ?>
													<a href="__PUBLIC__core/customer">个人中心</a>
													<?php elseif($_SESSION['think']['type']==2): ?>
													<a href="__PUBLIC__core/master">个人中心</a>
													<?php endif; ?>
												</li>
												
												<li>
													<a href="javascript:void(0);" style='display: inline-block;width:100%' class='logout_btn'>退出</a>
												</li>
											</ul>
										</div>
                                        <div class='col-xs-3 col-sm-1 margin-left-20  text-center' id="xingxi">
                                        <div class='aba'></div>
											<?php if($carr==''):?>
											<a href="javascript:;"class='text-sm text-black'><img  src="__PUBLIC__static/index/images/xiaoxi1.png">&nbsp;&nbsp;消息
											<i class="fa fa-sort-asc mr-9"></i>
											</a>
										
											<?php else:?>
											<a href="javascript:;" id="ds_img"class='text-sm text-black'><img style="margin-top:-4%" src="__PUBLIC__static/index/images/xiaoxi2.png">&nbsp;&nbsp;消息
											<i class="fa fa-sort-asc mr-9"></i>
											</a>
											<?php endif;?>
											<ul>
												<li>
													<a href="__PUBLIC__messages/all">我的消息
														<?php if($carr==''):?>
																&nbsp;&nbsp;&nbsp;&nbsp;<i class='text-orange' id="refresh">0</i>
															<?php else:?>
																&nbsp;&nbsp;&nbsp;&nbsp;<i class='text-orange' id="refresh"><?php echo $carr?></i>
															<?php endif;?>
													</a>
												</li>
												
												
											</ul>
										
										</div>
										<div class='col-xs-6 margin-left-20 hide col-sm-2 col-md-3 col-sm-offset-1 text-right hidden-sm hidden-xs' >
										<i class="fa fa-phone" aria-hidden="true"></i>
											<i href='' class='text-sm text-black font-awesome'>咨询热线:17770427747</i>
										</div>
										<div class="col-xs-3 col-sm-2 dingdan col-sm-offset-1 col-md-1">
											<a href='__PUBLIC__orders/client' class='text-sm text-black font-awesome'>订单管理</a>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<!--login + order info end-->
					<div class='header-column hidden-xs'>
						<div class="container">
							<!--logo ++ column start-->
							<div class="row p-10">
								<div class="col-xs-3 header-logo">
									<a href="__PUBLIC__index" class=" ">
										<img src="__PUBLIC__static/index/images/logolong.png" alt="" class="images-responsive logo">

									</a>
								</div>
								<div class="col-xs-9">
									<nav class="navbar navbar-default"  role="navigation">
										<div class="container-fluid nav-bar">
											<!-- Brand and toggle get grouped for better mobile display -->
											<div class="navbar-header">
												<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
											        <span class="sr-only"></span>
											        <span class="icon-bar"></span>
											        <span class="icon-bar"></span>
											        <span class="icon-bar"></span>
					      						</button>
											</div>

											<!-- columt  -->
											<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="">
												<ul class="nav navbar-nav navbar-right">
													<li>
														<a class="menu" href="__PUBLIC__index">首页</a>
													</li>
													<li>
														<a class="menu" href="__PUBLIC__Bjnews">新闻资讯</a>
													</li>
													<li>
														<a class="menu" href="__PUBLIC__Bjservice">师傅入驻</a>
													</li>
													<li>
														<a class="menu" href="__PUBLIC__Bjclientorder">下单流程 </a>
													</li>
													<li>
														<a class="menu" href="__PUBLIC__Bjmasterreg">平台保障</a>
													</li>
													<li>
														<a class="menu" href="__PUBLIC__Bjhelp">帮助中心</a>
													</li>
													<li>
														<a class="menu" href="__PUBLIC__Bjintroduce">关于我们</a>
													</li>
												</ul>
											</div>
											<!-- /columt -->
										</div>
									</nav>
								</div>
							</div>
							<!--logo ++ column end-->
						</div>
					</div>
				</div>
				<script type="text/javascript">

			var IsPC= function (){
            var userAgentInfo = navigator.userAgent;
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = true;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
            }
            return flag;
        }
        


    var alertmsg={
        ker:false,
        kers:false,
        msgk:function (sele,va) {
        	
            if ('' == $.trim($('#'+sele).val())) {
            	if(IsPC()){

            		 layer.tips(va, "#"+sele,{ icon: 2, time: 1500, shade: 0.1 ,tips:[1,"#ff5200"],shade:0}, function (index) {
                    layer.close(index);
                });
                $('#'+sele).focus().css("border","1px solid red");
                $('#'+sele).focusout(function () {
                    $(this).css("border","1px solid #ddd")
                });

            	}else{
            		 layer.msg(va,{icon: 5})
            	}
               
                return false;
            }else{
                return true;
            }
        }
    }

	$(window).ready(function(){
			
    var xiala=function(select,select2,select3){
           var h = $(jojn(select));
     var show=function(){
      $(jojn(select2)).show();
      $(jojn(select3)).children().removeClass('fa-sort-asc');
      $(jojn(select3)).addClass('active');
       $(jojn(select3)).children().addClass(' fa-sort-desc');
     }
     var selechidde=function(){
     	 hide();
     	$(jojn(select2)).mouseenter(function(){
         show();

     	})
     	$(jojn(select2)).mouseleave(hide)
     }
     var hide=function(){
     	  $(jojn(select2)).hide();
     	  $(jojn(select3)).children().addClass(' fa-sort-asc');
     	  $(jojn(select3)).children().removeClass(' fa-sort-desc');
     	   $(jojn(select3)).removeClass('active');
     }
     	h.hover(show,selechidde);
        
           }
   var jojn=function(jojn){
         return '#'+jojn;
   }

       				
       xiala('touxiang>.aba','touxiang ul','touxiang>a');
       xiala('xingxi>.aba','xingxi ul','xingxi>a');



       //添加样式
       var mousel=function(name){
       	$(name).mouseenter(function(){
       		$(this).siblings().removeClass('active');
       		$(this).addClass('active')
       	});
       }
       mousel('#xingxi>ul>li');
       mousel('#touxiang>ul>li');
	});
	// 提示
//配置layer全局属性
var layer=layui.layer;
layer.config({
  shade: 0.1, //默认动画风
});

</script> <head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>
    </title>
    <link rel="icon" type="image/png" href="__PUBLIC__static/index/images/favicon.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name='keywords' content="">
    <meta name="author" content="">
    <script src="https://og6593g2z.qnssl.com/fundebug.0.2.0.min.js"
            apikey="ced4ff39cb6ff79030f6afda70bb65a5faea0395c43f4216773b3bbb3a0c1c0f"></script>
    <link rel="stylesheet" href="__PUBLIC__static/index/js/layui/css/layui.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrapValidator/bootstrapValidator.min.css">
    <link rel="stylesheet" href="__PUBLIC__static/index/js/bootstrapfileinput/css/fileinput.min.css">
    <!-- Font awesome -->

    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/font-awesome.min.css">
    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/awesome-bootstrap-checkbox.css">
    <!--swiper-->
    <link rel="stylesheet" href="__PUBLIC__static/index/js/swiper/swiper.min.css">

    <!-- Main -->
    <link rel="stylesheet" href="__PUBLIC__static/index/css/main.css">
    <!-- Custom -->
    <link rel="stylesheet" href="__PUBLIC__static/index/css/custom.css">
    <link rel="stylesheet" href="__PUBLIC__static/index/css/custom2.css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--jQuery -->
    <script src="__PUBLIC__static/index/js/jquery/jquery-1.11.2.min.js"></script>
    <!--Bootstrap -->
    <script src="__PUBLIC__static/index/js/bootstrap/bootstrap.min.js"></script>
    <script src="__PUBLIC__static/index/js/bootstrap/bootstrap-datetimepicker.min.js"></script>
    <script src="__PUBLIC__static/index/js/bootstrap/bootstrap-datetimepicker.zh-CN.js"></script>
    <script src="__PUBLIC__static/index/js/bootstrapValidator/bootstrapValidator.min.js"></script>
    <script src="__PUBLIC__static/index/js/bootstrapValidator/zh_CN.js"></script>
    <script src="__PUBLIC__static/index/js/bootstrapfileinput/js/fileinput.min.js"></script>
    <script src="__PUBLIC__static/index/js/bootstrapfileinput/js/locales/zh.js"></script>
    <!--swiper-->
    <script type="text/javascript" src="__PUBLIC__static/index/js/swiper/swiper.min.js"></script>
    <!-- layui -->
    <script src="__PUBLIC__static/index/js/layui/lay/dest/layui.all.js" type="text/javascript"></script>
    <script src="__PUBLIC__static/index/js/placeholder/placeholder.min.js"></script>
    <script src="__PUBLIC__static/index/js/tool.js"></script>
    <script src="__PUBLIC__static/index/js/public.js"></script>
    <script src="__PUBLIC__static/index/js/jquery.form.js"></script>
</head>
<script>
    var lunhui = {

        //成功弹出层
        success: function(message,url){
            parent.layer.msg(message, {icon: 6,time:2000}, function(index){
                layer.close(index);
                window.location.href=url;
            });
        },
        // 错误弹出层
        error: function(message) {
            parent.layer.msg(message, {icon: 5,time:2000}, function(index){
                layer.close(index);
            });
        },
        // 确认弹出层
        confirm : function(id,url) {
            parent.layer.confirm('确认删除此条记录吗?', {icon: 3, title:'提示'}, function(index){
                $.getJSON(url, {'id' : id}, function(res){
                    if(res.code == 1){
                        parent.layer.msg(res.msg,{icon:1,time:1500,shade: 0});
                        Ajaxpage();
                        window.location.reload();
                    }else{
                        parent.layer.msg(res.msg,{icon:0,time:1500,shade: 0});
                    }
                });
                parent.layer.close(index);
            })
        },
        // 确认弹出层
        confirmz : function(id,url) {
            parent.layer.confirm('确认删除此条记录吗?', {icon: 3, title:'提示'}, function(index){
                $.getJSON(url, {'id' : id}, function(res){
                    if(res.code == 1){

                        parent.layer.msg(res.msg,{icon:1,time:1500,shade: 0});
                        Ajaxpage();
                        window.location.reload();
                    }else{

                        parent.layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                    }
                });
                parent.layer.close(index);
            })
        },
			 // 确认弹出层
        ds_confirmz : function(id,url) {
            parent.layer.confirm('确认删除此条记录吗?', {icon: 3, title:'提示'}, function(index){
                $.getJSON(url, {'id' : id}, function(res){
                    if(res.code == 1){
                        parent.layer.msg(res.msg,{icon:1,time:1500,shade: 0});
                        window.location.reload();
                    }else{
                        parent.layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                    }
                });
                parent.layer.close(index);
            })
        },
        //状态
        status : function(id,url){
            $.post(url,{id:id},function(data){
                if(data.code==1){
                    var a='<span class="label label-danger">禁用</span>'
                    $('#zt'+id).html(a);
                    layer.msg(data.msg,{icon:2,time:1500,shade: 0.1,});
                    return false;
                }else{
                    var b='<span class="label label-info">开启</span>'
                    $('#zt'+id).html(b);
                    layer.msg(data.msg,{icon:1,time:1500,shade: 0.1,});
                    return false;
                }
            });
            return false;
        }

    }
    var IsPC= function (){
            var userAgentInfo = navigator.userAgent;
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = true;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
            }
            return flag;
        }


    var alertmsg={
        ker:false,
        kers:false,
        msgk:function (sele,va) {
        	
            if ('' == $.trim($('#'+sele).val())) {
            	if(IsPC()){

            		 layer.tips(va, "#"+sele,{ icon: 2, time: 1500, shade: 0.1 ,tips:[1,"#ff5200"],shade:0}, function (index) {
                    layer.close(index);
                });
                $('#'+sele).focus().css("border","1px solid red");
                $('#'+sele).focusout(function () {
                    $(this).css("border","1px solid #ddd")
                });

            	}else{
            		 layer.msg(va,{icon: 5})
            	}
               
                return false;
            }else{
                return true;
            }
        }
    }
    // 提示
//配置layer全局属性
var layer=layui.layer;
layer.config({
  shade: 0.1, //默认动画风
});
</script>
<style type="text/css">
    .one{
        display: none;
    }
    #demo>li>a>cite{
        font-size: 14px;
        color: #5c6975;
        font-weight: 600;
    }
    #demo{
        line-height: 40px;
    }
    #demo>li{
        padding: 0;
    }
    #demo>li:hover{
        cursor: pointer;
    }
    #demo>li>a{
        padding-left: 10px;
    }
    #demo>li>a>i{
        color: #5c6975;
        font-size: 16px;
    }
    #demo>li>ul{
        margin: 0;
    }
    #demo>li>ul>li>a{
        padding-left: 20px;
    }
    #demo>li>ul>li:first-child{
        border-top: 1px solid #ddd;
    }
    #demo li{
        border-bottom: 1px solid #ddd;
    }
    #demo>li>ul>li>a>cite{
        color: #337ab7;
    }
    #demo>li>ul>li:hover{
        background: #ff5200;
        color: #fff;
    }
    #navigatesLeft>div>div>ul>li {
        margin-left: 0px !important;
        margin-right:0px !important;
    }
    @media (max-width: 776px) {
        #leftr{
            position: fixed;
            z-index: 10;
            width: 260px;
            left:0;
            transition: left 2s;
            -moz-transition: left 2s; /* Firefox 4 */
            -webkit-transition: left 2s; /* Safari 和 Chrome */
            -o-transition: left 2s;
            top: 150px;
        }
        #leftr.left_p{
            left: -245px;
            top: 150px;
        }
        #right{
            position: relative;
        }
    }

</style>
<style>
@media (max-width: 776px) {
    .hc {
        height: 300px;
        overflow-x: hidden;
    }
}
</style>
<div class="mt_md-130">
    <div class="container pl-0 pr-0">
        <!--面包屑导航-->
        <h5 class="page-header bx">
            当前位置：
            <small>个人中心</small> >>
        </h5>
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="panel-title">
                    个人中心
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 left_p" id="leftr">
                        <div style="width:100%;text-align:center;font-size:2.3rem;background-color:#FA8955;color:white"><a style="color:white" href="__PUBLIC__core/customer">我的标匠</a></div>
                        <ul id="demo" class="text-center hc">
                        </ul>
                        <span class='btn text-elg text-orange hidden-lg hidden-md' style='position:absolute;z-index: 999;left:236px;top:-14px' id='menu_btn'>
            <i class="fa fa-times hide text-orange" aria-hidden="true"></i>
            <i class="fa fa-bars text-orange" aria-hidden="true"></i>
        </span>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <iframe src="__PUBLIC__customer/personalcenter" width="100%" height="100%" frameborder="0" name="ip" scrolling="no"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
layui.tree({
    elem: '#demo',
    target: "ip"
        //传入元素选择器
        ,
    nodes: [ //	<!--{ //节点 -->
        //			<!-- name: '交易管理' -->
        //			<!-- ,children: [{ -->
        //				<!-- name: '我的任务' -->
        //			<!-- },{ -->
        //				<!-- name: '施工管理' -->
        //			<!-- },{ -->
        //				<!-- name: '评价管理' -->
        //			<!-- },{ -->
        //				<!-- name: '投诉管理' -->
        //			<!-- },{ -->
        //				<!-- name: '退款管理' -->
        //			<!-- },{ -->
        //				<!-- name: '分享推荐' -->
        //			<!-- }] -->
        <!-- },-->
        {
            name: '账户管理',
            children: [{
                name: '基本资料',
                href: "__PUBLIC__client_basics",
                target: "ip"
            }, {
                name: '我的消息',
                href: "__PUBLIC__messages/all",

            }, {
                name: '地址管理',
                href: "__PUBLIC__client_location",

            }]
        }, {
            name: '我的钱包',
            children: [{
                name: '钱包余额',
                href: "__PUBLIC__wallet_center",
            }, {
                name: '钱包充值',
                href: "__PUBLIC__wallet_center_pay",
            }, {
                name: '密码管理',
                href: "__PUBLIC__password",
            }]
        }, {
            name: '申请月结客户',
            href: "__PUBLIC__apply_monthly_statement",
            children: [{
                name: '申请月结客户',
                href: "__PUBLIC__apply_monthly_statement",
                target: "ip"
            }]

        }

    ]
});
$("i.layui-icon").remove();
$("#demo").addClass("list-group")
$("#demo>li").addClass("list-group-item");
var asm = true;
$("#demo>li>a").click(function() {
    if (asm) {
        $(this).siblings("ul").css("display", "block");
        $(this).siblings("ul").removeClass("layui-show");
        asm = false;
    } else {
        $(this).siblings("ul").css("display", "none");
        $(this).siblings("ul").removeClass("layui-show");
        asm = true;
    }
});
$("#demo>li a").width("100%");
$("#demo>li a").height("100%");
$("#demo>li>a").click(function(e) {
    e.preventDefault();
});
$("#demo>li>ul>li").mouseover(function() {
    $(this).find("cite").css("color", "#fff")
});
$("#demo>li>ul>li").mouseleave(function() {
    $(this).find("cite").css("color", "#337ab7")
})
$("#demo>li:eq(0)>a").prepend("<i class='fa fa-list-alt' ></i>");
$("#demo>li:eq(1)>a").prepend("<i class='fa fa-folder'></i>");
$("#demo>li:eq(2)>a").prepend("<i class='fa fa-user'></i>");
$("#demo>li:eq(3)>a").prepend("<i class='fa fa-graduation-cap'></i>");
</script>
<script>
$(".x_d").mousemove(function() {
    $(this).css("cursor", "pointer");
});
$(".x_d").click(function() {
    $(this).parent().css("display", "none");
});
var sfn = true;
$("#menu_btn").click(function() {
    if (sfn) {
        $("#leftr").removeClass("left_p");

        sfn = false;
    } else {
        $("#leftr").addClass("left_p");
        sfn = true;
    }
})
$("#demo>li:eq(0)>ul>li>a:eq(1)").attr("target", "__blank");
</script>
<style>
	@font-face {
		font-family: 'icomoon';
		src:  url('__PUBLIC__static/index/fonts/icomoon.eot?rd7qcq');
		src:  url('__PUBLIC__static/index/fonts/icomoon.eot?rd7qcq#iefix') format('embedded-opentype'),
			  url('__PUBLIC__static/index/fonts/icomoon.ttf?rd7qcq') format('truetype'),
			  url('__PUBLIC__static/index/fonts/icomoon.woff?rd7qcq') format('woff'),
			  url('__PUBLIC__static/index/fonts/icomoon.svg?rd7qcq#icomoon') format('svg');
		font-weight: normal;
		font-style: normal;
		}

		[class^="icon-"], [class*=" icon-"] {
		/* use !important to prevent issues with browser extensions that change fonts */
		font-family: 'icomoon' !important;
		speak: none;
		font-style: normal;
		font-weight: normal;
		font-variant: normal;
		text-transform: none;
		line-height: 1;

		/* Better Font Rendering =========== */
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		}

	#footerNav{
		height:55px;
		min-width: 300px;
		max-width: 640px;
		margin: 0 auto;
		background:#fff;
		box-shadow: 10px 10px 5px #888888;
		/* padding-right: 10px;
		padding-left: 10px; */
		
		/* backface-visibility: hidden; */
	}
	#footerNav .tab-item{
		position: relative;
		display: table-cell;
		width: 1%;
		height: 2.5rem;
		color: #565353;
		text-align: center;
		padding: 9px 5px;
	}
	#footerNav .tab-item .icon-home:before{
		font-size:20px;
	}
	#footerNav .tab-item .index:before{
		content:'\e900';
	}
	#footerNav .tab-item .order:before{
		content:'\e9bd';
	}
	#footerNav .tab-item .newOrder:before{
		content:'\e922';
	}
	#footerNav .tab-item .my:before{
		content:'\e971';
	}
	#footerNav .tab-item .icon-home{
		top: .05rem;
		height: 1.2rem;
		font-size: 1.2rem;
		line-height: 1.2rem;
		padding-top: 0;
		padding-bottom: 0;
		/* display: block; */
	}
	#footerNav .tab-item .tab-label{
		display: block;
		font-size:12px;
	}
	#footerNav .active{
		background: #ff5200;
		color:#fff;
	}
</style>
<div class="row visible-xs-block navbar-fixed-bottom" id='footerNav'>
		<a class="tab-item external" href="__PUBLIC__index">
		    <span class="icon icon-home index"></span>
		    <span class="tab-label">首页</span>
		  </a>
		  <a class="tab-item external" href="<?php if(session('type')==2): ?>__PUBLIC__orders/master<?php else: ?>__PUBLIC__orders/client<?php endif; ?>">
		    <span class="icon icon-home order"></span>
		    <span class="tab-label">订单管理</span>
		  </a>
		  <a class="tab-item external" href="<?php if(session('type')==2): ?>__PUBLIC__core/master/1<?php else: ?>__PUBLIC__core/customer/1<?php endif; ?>">
		    <span class="icon icon-home newOrder"></span>
		    <span class="tab-label">最新订单</span>
		  </a>
		  <a class="tab-item external" href="<?php if(session('type')==2): ?>__PUBLIC__core/master<?php else: ?>__PUBLIC__core/customer<?php endif; ?>">
		    <span class="icon icon-home my"></span>
		    <span class="tab-label">我的</span>
		</a>
</div>
<script type="text/javascript">
var href = window.location.href;
console.log(href);
console.log('__PUBLIC__core/master');
if((href == '__PUBLIC__core/master') || (href == '__PUBLIC__core/customer') ){
	console.log(1);
	$('#footerNav a').eq(3).addClass('active').siblings('a').removeClass('active');
}
if((href == '__PUBLIC__core/master/1') || (href == '__PUBLIC__core/customer/1') ){
	console.log(1);
	$('#footerNav a').eq(2).addClass('active').siblings('a').removeClass('active');
}
if((href == '__PUBLIC__orders/master') || (href == '__PUBLIC__orders/master') ){
	console.log(1);
	$('#footerNav a').eq(1).addClass('active').siblings('a').removeClass('active');
}

</script>
	           <div class='footer mt-30'>
	           		<div class='container'>
	           			<div class='row'>
	           				<div class='col-sm-12 col-md-4 pt-30 pb-30 dis'>
	           					<div class='row'>
	           						<div class='col-sm-3 col-md-offset-0 col-md-3 col-xs-4'>
										<img src='__PUBLIC__static/index/images/logo.png' class='m-auto img-responsive'>
	           						</div>
	           						<div class='col-xs-4 col-sm-4 col-md-3'>
	           							<ul>
	           								<li class='footer-li'><a href=''>新闻资讯</a></li>
	           								<li class='footer-li'><a href=''>下单流程</a></li>
	           								<li class='footer-li'><a href=''>帮助中心</a></li>
	           							</ul>
	           						</div>
	           						<div class='col-xs-4 col-sm-4 col-md-3 col-md-offset-0'>
	           							<ul>
	           								<li class='footer-li'><a href=''>师傅入驻</a></li>
	           								<li class='footer-li'><a href=''>平台保障</a></li>
	           								<li class='footer-li'><a href=''>关于我们</a></li>
	           							</ul>
	           						</div>
	           					</div>
	           				</div>
	           				<div class='col-xs-12 col-md-4 b-r-1 b-l-1 pb-20'>
	           					<div class='row'>
	           						<div class='col-xs-10 col-xs-offset-1 pt-30'>
	           							<img src='__PUBLIC__static/index/images/phone.png' class='m-auto img-responsive'>
	           						</div>
	           					</div>
	           					
	           					<div class='row mt-5'>
	           						<div class='col-xs-10 col-xs-offset-1 pt-30'>
	           							<p class='text-md text-white text-center'>
	           								<span>地址：江苏省苏州市昆山市花安路169号中寰广场五楼</span>
	           							</p>
	           						</div>
	           					</div>
	           				</div>
	           				<div class='col-xs-12 col-md-4 pt-20 dis'>
	           					<div class='row'>
	           						<div class='col-xs-6 col-xs-offset-3'>
	           							<img src='__PUBLIC__static/index/images/weixing.jpg' class='m-auto img-responsive'>
	           						</div>
	           					</div>
	           					
	           					<div class='row mt-10'>
	           						<div class='col-xs-6 col-xs-offset-3 text-center'>
										<span class='text-md text-white'>微信公众号</span>
	           						</div>
	           					</div>
	           				</div>
	           			</div>
	           			<div class='row p-30 text-white dis' style='border-top:1px solid;'>
	           				<h4 class='heading'>友情链接：</h4>
	           				<div class='col-xs-9 col-xs-offset-1'>
	           					<span class='link'><a href="http://www.baidu.com">百度一下</a></span>
	           				</div>
							<div class="col-xs-12 text-center">
								<span>版权所有：标匠（昆山）网络科技有限公司</span>
								<br>
								<span>备案号：</span><a href='http://www.miitbeian.gov.cn'>苏ICP备17047108</a>
							</div>
	           			</div>
	           		</div>
	           </div>	
           </div>
        </div>
	<script>
		//退出登录
		$(document).ready(function(){
			$('.logout_btn').click(function(){
				window.location.href='__PUBLIC__auth/logout';
			  });

			   goto = function(url){
				GoLocation(url);
			  }
			});
	</script>	
	<script src="__JS__/layer/layer.js"></script>
	<script src="__JS__/laypage/laypage.js"></script>
	<script src="__JS__/laytpl/laytpl.js"></script>
	<script src="__JS__/jquery.form.js"></script>
    <script src="__JS__/lunhui.js"></script>
<script type="text/javascript">
    function show(){
        $.get("__PUBLIC__api/message_refresh", function(data) {
            $('#refresh').html(data);
			$('#ds_img img').attr('src','__PUBLIC__static/index/images/xiaoxi2.png');
			$('#ds_img img').css('margin-top','-4%');
			
        }, "json" );
    }
	setInterval('show()',30000); //指定多少秒刷新一次 
</script>
<script>
  $('#is_weixin').click(function(){

		var ua = navigator.userAgent.toLowerCase(); 
		if(ua.match(/MicroMessenger/i)=="micromessenger") { 
			window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa0a4b634184f1e0f&redirect_uri=http%3A%2F%2Fwww.bj-wang.com%2Fweixinzc%2Fregister&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
		} else { 
			window.location.href="__PUBLIC__auth";
		} 
	});

	
	
  $("form").attr("autocomplete","off");

  function reinitIframe(){
      var iframe = document.getElementsByTagName("iframe")[0];
      try{
          var bHeight = iframe.contentWindow.document.body.scrollHeight;
          var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
          var height = Math.max(bHeight, dHeight);
          iframe.height = height;

      }catch (ex){}
  }
  window.setInterval('reinitIframe()', 200);
</script>

  

</body>
</html>

