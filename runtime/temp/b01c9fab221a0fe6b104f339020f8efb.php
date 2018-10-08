<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"E:\web-php-5.6\bjtp5/application/index\view\orders\repair_orders.html";i:1510103679;s:62:"E:\web-php-5.6\bjtp5/application/index\view\public\header.html";i:1510103679;s:59:"E:\web-php-5.6\bjtp5/application/index\view\public\zsa.html";i:1510103679;s:62:"E:\web-php-5.6\bjtp5/application/index\view\public\footer.html";i:1510103679;}*/ ?>
<!--nav-->
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

</script>

<link href="__PUBLIC__static/index/css/select2.css" rel="stylesheet" />
<script src="__PUBLIC__static/index/js/select2.js"></script>
<script type="text/javascript" src="__PUBLIC__static/admin/webupload/webuploader.min.js"></script>
<script src="__CITY__/distpicker.data.js"></script>
<script src="__CITY__/distpicker.js"></script>
<script src="__CITY__/main.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__static/admin/webupload/webuploader.css">

<link rel="stylesheet" type="text/css" href="__PUBLIC__static/admin/webupload/style.css">
<style>
    .btn-numbox {

        margin-top: 0px;
    }
    .btn-numbox li {
        float: left;
    }
    .btn-numbox li .number,
    .kucun {
        display: inline-block;
        font-size: 12px;
        color: #808080;
        vertical-align: sub;
    }
    .btn-numbox .count {
        overflow: hidden;
        margin: 0 16px 0 -20px;
    }
    .btn-numbox .count .num-jian,
    .input-num,
    .num-jia {
        display: inline-block;
        width: 28px;
        height: 32px;
        line-height: 28px;
        text-align: center;
        font-size: 18px;
        color: #999;
        cursor: pointer;
        border: 1px solid #e6e6e6;
    }

    .btn-numbox .count .num-jia {
        margin-left: 1px;
    }

    .btn-numbox .count .input-num {
        width: 58px;
        height: 32px;
        color: #333;
        border-left: 0;
        border-right: 0;
    }
    .xin{
        position: relative;
        top: 3px;
    }
    @media (min-width: 776px ) {
        .metaclass{
            margin-top: 60px;
        }
    }
    .file-item {
        float: left;
        position: relative;
        width: 110px;
        height: 110px;
        margin: 0 20px 20px 0;
    }

    .file-item .info {
        overflow: hidden;
    }

    .uploader-list {
        width: 100%;
        overflow: hidden;
    }

    .webuploader-pick {
        position: relative;
        display: inline-block;
        cursor: pointer;
        background: #fff;
        padding: 10px 15px;
        color: #fff;
        text-align: center;
        border-radius: 3px;
        overflow: hidden;
    }

    .dele1 {
        line-height: 40px;
    }

    .count * {
        line-height: 28px;
    }

    .j {
        border-bottom: 1px solid #dddddd;
        margin: 0px 0px 0px -10px;
    }

    .jk {
        padding: 10px 10px 10px 10px;
    }

    .l_lin {
        padding-top: 30px;
    }

    .jkdele1 {
        padding-top: 20px;
    }
</style>

<style>

</style>

<form autocomplete="off" id="myForm" class="" method="post" action="__PUBLIC__orders/placeorder">

    <div class="container main">
        <h5 class="page-header bx">
            <span>当前位置：</span>
            <small>维修下单</small>
            <span>>></span>
        </h5>
        <div class="The-test-panel-head">
            <span class="ml-10">维修下单</span>
        </div>
        <div class="The-test-panel-body" style="position: relative;">
            <div class="" style="line-height: 40px">
                <?php if(empty($_SESSION['think']['ds_username'])){ ?>
                <div class="row">
                    <label style="float:left;" class="pl-50">您还未登录,登录后给您更好的服务</label>
                    <div class="col-md-6 pl-40 ">
                        <a href="__PUBLIC__auth" class="text-orange">登录>></a>
                    </div>
                </div>
                <div class="j"></div>
                <?php } ?>
                <div class="row mt-10">
                    <!--客户信息-->
                    <!-- 未登入状态 -->
                    <?php if(empty($_SESSION['think']['ds_username'])): ?>

                    <div class="col-md-6 hidden">
                        <div>
                            <label style="float:left;">您还未登录,登录后给您更好的服务</label>
                            <div class="col-md-6 pl-40 ">
                                <a href="__PUBLIC__auth" class="text-orange">登录>></a>
                            </div>
                        </div>
                        <div class="row hidden">
                            <div class="col-md-3">
                                <label>您还未登录,登录后给您更好的服务</label>
                                <a href="__PUBLIC__auth" class="form-control text-orange">
                                    登录
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <!-- 登入后的状态 -->
                    <?php else: ?>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-xs-12">客户ID </label>
                            <div class="col-md-8 col-xs-10">
                                <input type="text" readonly unselectable="on" id="client" name="uid" class="form-control ds-uid" value="<?php echo $_SESSION['think']['id'] ?>">
                                <input type="text" style="display:none" id="uname" name="uname" class="form-control ds-uid" value="<?php echo $_SESSION['think']['ds_username'] ?>">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--预约开始时间-->

                    <div class="col-md-6">
                        <div class=" row">
                            <label class="col-md-3 col-xs-12" name="market_cer">商城名称</label>
                            <div class="col-md-8 col-xs-10">
                                <input type="text" autocomplete="off" name="designation" id="designation" class="form-control">
                            </div>
                            <label class="col-xs-1">
                                <b class='text-orange xin'>*</b>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--联系人-->
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-xs-12">联系人</label>
                            <div class="col-md-8 col-xs-10">
                                <input type="text" name="linkman_contacts" id="linkman_contacts" class="form-control" value="<?php echo $loaction['name']; ?>">
                            </div>
                            <label class="col-xs-1">
                                <b class='text-orange xin'>*</b>
                            </label>
                        </div>
                    </div>


                    <!--目标维修地址-->
                    <div class="col-md-6">
                        <div class="row">
                            <label for="input_date" class="col-md-3 col-xs-12">预约施工时间</label>
                            <div class="col-md-8 col-xs-10">
                                <div class="input-append date form_datetime" id="input_date" data-date="2013-02-21T15:25:00Z">
                                    <input class="layui-input"  autocomplete="off" id="form_datetime" class="form-control" placeholder="" name="input_date" onclick="layui.laydate({elem: this, format:'YYYY-MM-DD hh:mm:ss',istime: true,min: laydate.now()})">

                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                            <label class="col-xs-1">
                                <b class='text-orange xin'>*</b>
                            </label>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <!--联系电话-->
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-xs-12">联系电话</label>
                            <div class="col-md-8 col-xs-10">
                                <input type="text" autocomplete="off" name="telephone" id="telephone" class="form-control" value="<?php echo $loaction['phone']; ?>">
                            </div>
                            <label class="col-xs-1">
                                <b class='text-orange xin'>*</b>
                            </label>
                        </div>

                    </div>
                    <?php if($loaction['province']==''):?>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-xs-12">维修地址</label>
                            <div class="col-md-8 col-xs-10">
                                <div id="distpicker5" class="row">

                                    <div class="col-md-4 mb-10">
                                        <label class="sr-only" for="province10">Province</label>
                                        <select class="form-control" id="province10" name="province">
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-10">
                                        <label class="sr-only" for="city10">City</label>
                                        <select class="form-control" id="city10" name="city">
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-10">
                                        <label class="sr-only" for="district10">District</label>
                                        <select class="form-control" id="district10" name="district">
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <label class="col-xs-1"><b class='text-orange xin'>*</b></label>
                        </div>
                    </div>
                    <?php else:?>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-xs-12">维修地址</label>
                            <div class="col-md-8 col-xs-10">
                                <div class="row" >
                                    <div class="col-md-12">
                                        <input type="hidden"  style="border:none;background:#fff"  class='form-control' name="province" id="province10" value="<?php echo $loaction['province']; ?>">
                                        <input type="hidden" style="border:none;background:#fff"  class='form-control' name="district" id="district10" value="<?php echo $loaction['district']; ?>">
                                        <input type="hidden" style="border:none;background:#fff"   class='form-control' name="city" id="city10" value="<?php echo $loaction['city']; ?>">
                                        <span id="ds_u_pro"><?php echo $loaction['province']; ?></span>
                                        <span id="ds_u_cit"><?php echo $loaction['city']; ?></span>
                                        <span id="ds_u_dis"><?php echo $loaction['district']; ?></span>
                                        <span id="ds_u_ars"><?php echo $loaction['location']; ?></span>
                                        <a class="ds_add_dizhi" style="cursor: pointer;">使用新地址</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>






                </div>
                <div class="row pb-20">
                    <div class="col-md-6"></div>
                    <?php if($loaction['province']==''):?>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-xs-12"></label>
                            <div class="col-md-8 col-xs-10">
                                <input type="text" autocomplete="off" name="address" id="address" placeholder="请输入详细地址，精确到街道、门牌号" class="form-control">
                            </div>
                            <label class="col-xs-1"><b class='text-orange xin'>*</b></label>
                        </div>
                    </div>
                    <?php else:?>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 col-xs-12" name="market_cer"></label>
                            <div class="col-md-6">
                                <input type="hidden" class='form-control' style="border:none;background:#fff"   name="address" id="address" value="<?php echo $loaction['location']; ?>">
                            </div>

                        </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="j"></div>
            <div class="dele1" id="show1">
                <!--服务类别-->

            </div>
            <div class="row j jk l_lin  Increase_the_project_title">
                <div class="col-md-5 pl-40">
                    <input value="增加维修项目" type="button" class="btn border-radius mb-10 btn-success" id="increase">
                </div>
            </div>

            <div class="row l_lin">
                <!--商场办证-->
                <div class="col-md-2  col-xs-12">
                    商场办证 <b class='text-orange xin'>*</b>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="radio mt-0  radio-success">
                        <input value="1" type="radio" id="master_worker" checked name="departure_card">
                        <label for="master_worker">
                            师傅代办
                        </label>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="radio mt-0 radio-success">
                        <input value="2" type="radio" id="clientele" name="departure_card">
                        <label for="clientele">
                            客户办理
                        </label>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="radio mt-0 radio-success">
                        <input value="3" type="radio" id="do_without" name="departure_card">
                        <label for="do_without">
                            不需要办证
                        </label>
                    </div>
                </div>
            </div>
			<div class="row pb-20 l_lin">
                <div class="col-md-2">
                    <label class="btn btn-default">维修验收单(图)</label>
                </div>
                <div class="col-md-3" id="imgysd" style="margin-left:1%">
                    <input type="hidden" id="ds_ysd" name="ysimg">
                    <img id="img_ysd" class="mt-0_xs" style="width: 200px;height: 200px" src="__PUBLIC__static/index/images/tj.png" />
                </div>
            </div> 
            <div class="row l_lin">
                <div class="col-md-2">
                    <label class="btn btn-default">门头照片</label>
                </div>
                <div class="col-md-6" id="imgPickers">
                    <input type="hidden" id="data_photos" name="aimg">
                    <img id="img_datas" class="mt-0_xs" style="width: 200px;height: 200px" src="__PUBLIC__static/index/images/tj.png" />
                </div>
            </div>
            <div class="j"></div>
            <!--需求-->
            <div class="row j pb-20">
                <div class="col-md-12 mt-20">
                    <div class="checkbox-warning checkbox">
                        <input type="checkbox"  value="1"   id="nuclear_list_in_advance">
                        <label for="nuclear_list_in_advance">
                            需现场调查，进一步核实
                        </label>
                    </div>
                </div>
                <div class="col-md-3 mt-20">
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox"  id="ds-s"    value="" >
                        <label for="ds-s">
                            使用平台月结服务
                        </label>
                    </div>
                    <input type="password" autocomplete="off"  name="pwd" placeholder="月结客户使用的密码" id="year_service_ordere_pwd" class="form-control" style="opacity: 0">
                </div>
            </div>
            <div class="row pt-20">
                <!--协议-->
                <div class="col-xs-6 " style="color:red;">
                    注： <b class='text-orange xin'>*</b> 表示必填项
                </div>
            </div>
        </div>
        <input id="ds-sub" name="ds_step" hidden="hidden" value="">
        <input id="judge" name="judge" hidden="hidden" value="">
        <!--同意协议-->
        <input value="0" id="ds_hedan" name="hedan" hidden="hidden">
        <input value="0" id="ds_yue" name="yue" hidden="hidden">
        <?php if(empty($_SESSION['think']['type'])) :else: ?>
        <input value="<?php echo $_SESSION['think']['type']; ?>" id="ds_worker_type" name="ds_worker_type" hidden>
        <?php endif ?>
        <div class="row">
            <div class="col-md-12 mt-10">
                <a id="yezhuxieyi" href="javascript:;" class="" id="yz">《业主协议》</a>
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input type="radio" id="agreement">
                    <label for="agreement">
                        我同意协议
                    </label>
                </div>
            </div>
        </div>
        <div class="row pb-20 pl-10">
            <div class="col-md-3 col-sm-4 col-xs-6 col-sm-offset-1 text-center mt-20">
                <button id="xiandan" disabled="display" lay-submit="" lay-filter="demo1" style="width: 100%" class="btn btn-success  border-radius ">直接下单</button>
            </div>
            <input type="hidden" id="step_type" value="" name="step_type">
            <div class="col-md-3 col-md-offset-4  col-sm-4 col-xs-6 text-center mt-20">
                <input type="submit" disabled="display" id="quick_consulting" class="btn btn-blue form-control border-radius " value="快捷咨询">
            </div>
        </div>
    </div>
</form>
<script>
    $(".ds_add_dizhi").click(function () {
        var uid=$('#ds_uid').val();
        var layer=layui.layer;
        var  url="__PUBLIC__/client_location";
        parent.layer.open({
            type:2,
            area:["800px","650px"],
            title:" ",
            shade:0,
            content: ['__PUBLIC__/client_location', 'no'],
            scrollbar:false,
            end: function() {
                ds_show();
            },
            success:function (inde) {
            }
        });
    });
</script>
<script type="text/javascript">
    function ds_show(){
        $.get("__PUBLIC__api_uid_address", function(data) {
            $('#linkman_contacts').val(data.name);
            $('#telephone').val(data.phone);

            $('#province10').val(data.province);
            $('#city10').val(data.city);
            $('#district10').val(data.district);
            $('#address').val(data.location);

            $('#ds_u_pro').html(data.province);
            $('#ds_u_cit').html(data.city);
            $('#ds_u_dis').html(data.district);
            $('#ds_u_ars').html(data.location);


        }, "json" );
    }

</script>
<script>
    $(function () {
//        自动添加默认开始值
        var  i=1;
        var zidongzengjia=function () {

//            自动添加加载模版
            var html='<div class="row l_lin"><div class=col-md-6><div class=row><label class="col-md-3  col-xs-12">服务类别</label><div class="col-md-8 col-xs-10"><input type=text autocomplete=off disabled class=form-control value="维修"></div></div></div><div class=col-md-6><div class=row><label class="col-md-3 col-xs-12">商品大类</label><div class="col-md-8 col-xs-10"><select class="form-control product_categories ml-0" name="product_categories[]"><option value="<?php echo $rlist["id"]?>"><?php echo $rlist["name"]; if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo $v['id']; ?>"><?php echo $v['name']; endforeach; endif; else: echo "" ;endif; ?></select></div><label class=col-xs-1><b class="text-orange xin">*</b></label></div></div></div><div class=row><div class=col-md-6><div class=row><label class="col-md-3 col-xs-12">商品小类</label><div class="col-md-8 col-xs-10"><select class="form-control ml-0 product_categoriesx_xiao col-xs-8 mb-10" name="product_categoriesx_xiao[]"><option name=comm id=comm value="<?php echo $clist["id"]?>"><?php echo $clist["name"]; if(is_array($comm) || $comm instanceof \think\Collection || $comm instanceof \think\Paginator): $i = 0; $__LIST__ = $comm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo $v['id']; ?>"><?php echo $v['name']; endforeach; endif; else: echo "" ;endif; ?></select></div><label class=col-xs-1><b class="text-orange xin">*</b></label></div></div><div class=col-md-6><div class=row><label class="col-md-3 col-xs-12">品牌</label><div class="col-md-8 col-xs-10"><select name="brand[]" class="form-control js-example-tags" autocomplete=off><?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo $v['brand']; ?>"><?php echo $v['brand']; endforeach; endif; else: echo "" ;endif; ?></select></div><label class=col-xs-1><b class="text-orange xin">*</b></label></div></div></div><div class="row mb-10"><div class=col-md-6><div class=row><label class=col-md-3>商品型号</label><div class="col-md-5 col-xs-10"><input type=text autocomplete=off name="marquey[]" class="form-control mb-10" value=""></div><div class="col-md-4 col-xs-offset-1 col-md-offset-0 col-xs-12"><ul class=btn-numbox><li><ul class=count><li><span id=num-jian class=num-jian>-</span><li><input type=text name="input-num[]" class=input-num value=""><li><span id=num-jia class=num-jia>+</span></ul></ul></div></div></div></div><div class=j></div><div class="row j jk"><div class="col-md-3 col-xs-4 "><div class="btn btn-default">故障概况</div></div><div class="col-md-8 col-xs-6"><div class=site_survey_measurement style="line-height: 14px;"><?php if(is_array($glist) || $glist instanceof \think\Collection || $glist instanceof \think\Paginator): $i = 0; $__LIST__ = $glist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="checkbox checkbox-success" style="display:inline-block;"><input autocomplete=off name="site_survey_measurement[]" id="<?php echo $v['id']; ?>" value="<?php echo $v['id']; ?>" type=checkbox><label for=""><?php echo $v['name']; ?></label></div>&nbsp; <?php endforeach; endif; else: echo "" ;endif; ?></div></div></div><div class="text-orange font_xs pl-10 j" style="background-color:#EFD9CE;line-height: 2">请按照实际情况上传照片，最多可上传3张，支持JPEG/JPG/PNG格式。</div><div class="row l_lin"><div class=col-md-4><div class="row text-center"><div class="col-sm-8 col-sm-offset-2  col-xs-10"><input type=text class=form-control name="ds_imgs1[]" placeholder="请描述上传图片信息"></div><div class="col-xs-10 col-sm-12" id=imgPickera><input type=hidden name="bimg[]"><img style="width: 200px;height: 200px" class=mt-0_xs src=__PUBLIC__static/index/images/tj.png></div></div></div><div class=col-md-4><div class="row text-center"><div class="col-sm-8 col-sm-offset-2  col-xs-10 "><input type=text class=form-control name="ds_imgs2[]" placeholder="请描述上传图片信息"></div><div class="col-xs-10 col-sm-12" id=imgPickerb><input type=hidden name="cimg[]"><img height="" class=mt-0_xs style="width: 200px;height: 200px" src=__PUBLIC__static/index/images/tj.png></div></div></div><div class="col-md-4 pr-30"><div class="row text-center"><div class="col-sm-8 col-sm-offset-2 col-xs-10 "><input type=text class=form-control name="ds_imgs3[]" placeholder="请描述上传图片信息"></div><div class="col-xs-10 col-sm-12" id=imgPickerc><input type=hidden name="dimg[]"><img height="" class=mt-0_xs style="width: 200px;height: 200px" src=__PUBLIC__static/index/images/tj.png></div></div></div></div><div class="row j l_lin" style="border-bottom: 5px solid #ddd"><label class="col-md-2 col-md-offset-1 col-xs-4 ">故障详情描述</label><div class="col-md-8 col-xs-8"><input id=malfunction autocomplete=off placeholder="请详细描述你的故障详细" type=text class=form-control name="malfunction[]"></div></div>';
//            添加图片正则替换
            html=html.replace(/imgPicker/g,"imgPicker"+i);
//            渲染
            $("#show1").append(html);
            automatically(i);
            i++;

        }
//        自动添加按钮点击事件
        $("#increase").click(function(
        	
        	){
        	zidongzengjia();
        });
        zidongzengjia()
        //加
        $("#show1").on("click",".num-jian",function () {
            var m=  $(this).parent().siblings("li").find(".input-num").val();
            if(m==""){
                m=0;
            }
            if(m>0){
                m--;
            }
            $(this).parent().siblings("li").find(".input-num").val(m)
        })
        //减
        $("#show1").on("click",".num-jia",function () {
            var m=  $(this).parent().siblings("li").find(".input-num").val();
             if(m==""){
                m=0;
            }
            m++;
            $(this).parent().siblings("li").find(".input-num").val(m)
        });
        //服务大类
        $("#show1").on("change",".product_categories",function () {
            var va=$(this).val();
            var thise=$(this);
            var his=$(this).parent().parent().parent().parent().next().find(".product_categoriesx_xiao");
            
            $.getJSON("__PUBLIC__orders/twostclass",{bigname:va},function(json){
                //清空原有的选项
                his.html("");
                $.each(json,function(index,array){
                    var option = "<option value='"+array['id']+"'>"+array['name']+"</option>";
                    his.append(option);
                });
                var awr=$(thise).parent().parent().parent().parent().next().find(".product_categoriesx_xiao").val()
                $.getJSON("__PUBLIC__orders/threestclass",{bigname:awr},function(json){
                    var smallname=his.parent().parent().parent().parent().next().next().next().find(".site_survey_measurement");
                    smallname.html(''); //清空原有的选项
                    $.each(json,function(index,array){
                        var option = "<div style='display: inline-block' class='checkbox checkbox-success'><input type='checkbox'  name='site_survey_measurement[]' id='"+array['id']+"' value='"+array['id']+"'><label for=''>"+array['name']+"</label></div>&nbsp;";
                        smallname.append(option);
                    });
                });
            });
        });
        //服务小类
        $("#show1").on("change",".product_categoriesx_xiao",function () {
            var thi=$(this);
            $.getJSON("__PUBLIC__orders/threestclass",{bigname:$(this).val()},function(json){
                var smallname=thi.parent().parent().parent().parent().next().next().next().find(".site_survey_measurement");
                
               
                smallname.html(''); //清空原有的选项
                $.each(json,function(index,array){
                    var option = "<div style='display: inline-block' class='checkbox checkbox-success'><input type='checkbox'  name='site_survey_measurement[]' id='"+array['id']+"' value='"+array['id']+"'><label for=''>"+array['name']+"</label></div>&nbsp;";
                    smallname.append(option);
                });
            });
        });
        //我同意

        $("#agreement").click(function () {

            if ($(this).prop("checked")) {
                $(this).prop("checked", true);
                $("#xiandan").prop("disabled", false);
                $("#quick_consulting").prop("disabled", false);
            } else {
                $(this).prop("checked", false);
                $("#xiandan").prop("disabled", true);
                $("#quick_consulting").prop("disabled", true);
            }
        });

        $("#ds-s").change(function () {
            if ($(this).prop("checked") === true) {
                $("#year_service_ordere_pwd").css("opacity", '1');
                $("#quick_consulting").css("opacity", "0");
                $('#ds_yue').val(1);
            } else {
                $("#year_service_ordere_pwd").css("opacity", '0');
                $("#quick_consulting").css("opacity", "1");
                $('#ds_yue').val(0);
            }
        });
        $("#xiandan").click(function () {
            $("#ds-sub").val(1);
            $("#judge").val(1);
        })
        $("#quick_consulting").click(function () {
            $("#ds-sub").val(2);
        })
        function automatically(i) {

            WebUploader.create({
                auto: true,// 选完文件后，是否自动上传。
                swf: '__PUBLIC__static/admin/webupload/Uploader.swf',// swf文件路径
                server: "<?php echo url('__PUBLIC__/admin/Uploads/dsupload'); ?>",// 文件接收服务端。
                duplicate: true,// 重复上传图片，true为可重复false为不可重复
                pick: '#imgPicker'+i+'a',// 选择文件的按钮。可选。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/jpg,image/jpeg,image/png'
                },
                'onUploadSuccess': function (file, data, response) {
                    $("#imgPicker"+i+'a').find("input[type=hidden]").val(data._raw);
                    $("#imgPicker"+i+'a').find("img").attr("src","__DsQINiu__"+data._raw);
                    msg("添加成功",1);
                },

            });
            WebUploader.create({
                auto: true,// 选完文件后，是否自动上传。
                swf: '__PUBLIC__static/admin/webupload/Uploader.swf',// swf文件路径
                server: "<?php echo url('__PUBLIC__/admin/Uploads/dsupload'); ?>",// 文件接收服务端。
                duplicate: true,// 重复上传图片，true为可重复false为不可重复
                pick: '#imgPicker'+i+'c',// 选择文件的按钮。可选。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/jpg,image/jpeg,image/png'
                },
                'onUploadSuccess': function (file, data, response) {
                    $("#imgPicker"+i+'c').find("input[type=hidden]").val(data._raw);
                    $("#imgPicker"+i+'c').find("img").attr("src","__DsQINiu__"+data._raw);
                    msg("添加成功",1);
                },

            });
            WebUploader.create({
                auto: true,// 选完文件后，是否自动上传。
                swf: '__PUBLIC__static/admin/webupload/Uploader.swf',// swf文件路径
                server: "<?php echo url('__PUBLIC__/admin/Uploads/dsupload'); ?>",// 文件接收服务端。
                duplicate: true,// 重复上传图片，true为可重复false为不可重复
                pick: '#imgPicker'+i+'b',// 选择文件的按钮。可选。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/jpg,image/jpeg,image/png'
                },
                'onUploadSuccess': function (file, data, response) {
                    $("#imgPicker"+i+'b').find("input[type=hidden]").val(data._raw);
                    $("#imgPicker"+i+'b').find("img").attr("src","__DsQINiu__"+data._raw);
                    msg("添加成功",1);
                },

            });
           
            $(".js-example-tags").select2({tags: true});
            $(".select2-container").css("width", "100%");
            $(".select2-selection").css("border","none")
            $(".select2").addClass("form-control").css({
            });
            $(".select2-selection__rendered").css("margin-top","-3px");
        }
        $('#nuclear_list_in_advance').click(function () {
            if ($(this).prop("checked") === true) {
                $('#ds_hedan').val(1);
            } else {
                $('#ds_hedan').val(0);
            }
        })
    });
    WebUploader.create({
        auto: true,// 选完文件后，是否自动上传。
        swf: '__PUBLIC__static/admin/webupload/Uploader.swf',// swf文件路径
        server: "<?php echo url('__PUBLIC__/admin/Uploads/dsupload'); ?>",// 文件接收服务端。
        duplicate: true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPickers',// 选择文件的按钮。可选。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },
        'onUploadSuccess': function (file, data, response) {
            $("#data_photos").val(data._raw);
            $("#img_datas").attr('src', '__DsQINiu__' + data._raw).show();
            msg("添加成功",1);
        },

    });
	
	   WebUploader.create({
        auto: true,// 选完文件后，是否自动上传。
        swf: '__PUBLIC__static/admin/webupload/Uploader.swf',// swf文件路径
        server: "<?php echo url('__PUBLIC__/admin/Uploads/dsupload'); ?>",// 文件接收服务端。
        duplicate: true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgysd',// 选择文件的按钮。可选。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },
        'onUploadSuccess': function (file, data, response) {
            $("#ds_ysd").val(data._raw);
            $("#img_ysd").attr('src', '__DsQINiu__' + data._raw).show();
            msg("添加成功",1);
        },

    });
	
	
    $(".js-example-tags").select2({tags: true});
    $(".select2-container").css("width", "100%");
    $(".select2-selection").css("border","none")
    $("#select2-brand-container").addClass("form-control").css({
        lineHeight:"22px"
    });
    $("#yezhuxieyi").click(function () {
        var   layer=layui.layer;
        parent.layer.open({
            type:2,
            title:"业主协议",
            btn:['我同意',"我再看看"],
            content:" __PUBLIC__yezhuxieyi",
            area:["80%","80%"],
            yes:function(index,layero){
                $("#agreement").prop("checked",'true');
                layer.close(index);
                $("#xiandan").prop("disabled",false);
                $("#quick_consulting").prop("disabled",false);
            },
            btn2:function(index,layero){
                $("#agreement").prop("checked",false);
                layer.close(index);
                $("#xiandan").prop("disabled",true);
                $("#quick_consulting").prop("disabled",true);
            }
        })

    });
    
    // 缓存机制
    window.localStorage.setItem("input-num", 0);
    window.onload = function () {
        // window.localStorage.clear();
        //      保存数据：localStorage.setItem(key,value);
        //      读取数据：localStorage.getItem(key);
        //      删除单个数据：localStorage.removeItem(key);
        //      删除所有数据：localStorage.clear();
        //      得到某个索引的key：localStorage.key(index);
        function savelocalStorage(key, value) {
            window.localStorage.setItem(key, value);
        }
        function addlocalStorage(id) {
            $('#' + id).on('change', function () {
                var brand = $(this).val();
                savelocalStorage(id, brand);
                console.log(window.localStorage);
            });
        }
        function setVal(id) {

            val = localStorage.getItem(id);
            if (localStorage.getItem('input-num') == '') {
                val = 0;
            }
            $('#' + id).val(val);
        }
        if (window.localStorage) {
            setVal('brand');
            setVal('marquey');
            setVal('input-num');
            setVal('malfunction');
            setVal('');
            
            setVal('designation');
            addlocalStorage('brand');
            addlocalStorage('marquey');
            addlocalStorage('input-num');
            addlocalStorage('');
            addlocalStorage('malfunction');
            
            addlocalStorage('designation');
        }else{}
    }
    //控制隐藏元素开启
    $(document).ready(function () {
       
        



        $('#myForm').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });
        function checkForm() {
            var ds_types=$("#ds_worker_type").val();
            if(ds_types==2){
                msg('您是师傅,不能下单',2);
                return false;
            }
            var designation=alertmsg.msgk("designation","商城名称不能为空");
            if(!designation){
                return false;
            }
            var  form_datetime= alertmsg.msgk("form_datetime","请填写预约施工时间")
            if(!form_datetime){
                return false;
            }
            var linkman_contacts=alertmsg.msgk("linkman_contacts","请填写联系人");
            if(!linkman_contacts){
                return false;
            }
            var telephone=alertmsg.msgk("telephone","请填写联系人电话");
            if(!telephone){
                return false;
            }
            if(!(/^1[34578]\d{9}$/.test($("#telephone").val()))){

                layer.msg('手机号格式不正确，请重新输入手机号码', { icon: 2, time: 1500, shade: 0 }, function (index) {
                    layer.close(index);
                });
                $("#telephone").focus()
                return false;
            }
            var province10=alertmsg.msgk("province10","请输入目标维修地址");
            if(!province10){
                return false;
            }
            var city10=alertmsg.msgk("city10","请输入维修地址");
            if(!city10){
                return false;
            }
            var city10=alertmsg.msgk("city10","请输入维修地址");
            if(!city10){
                return false;
            }

            var district10=alertmsg.msgk("district10","请输入维修地址");
            if(!district10){
                return false;
            }
            var address=alertmsg.msgk("address","请输入详细地址，精确到街道、门牌号");
            if(!address){
                return false;
            }
            
            if($("#ds-s").prop("checked")){
                var year_service_ordere_pwd=alertmsg.msgk("year_service_ordere_pwd","请填写月结客户密码");
                if(!year_service_ordere_pwd){
                    return false;
                }
            }
        }
        function complete(data) {
            var layer=layui.layer;
            var dsurl = $('#ds-sub').val();
            if (data.code == 200) {
                var jump = data.msg;
                if (dsurl == 1) {
                    if($("#ds-s").prop("checked")){
                        window.location.href = "__PUBLIC__month_order/";
                    }else{
                        window.location.href = "__PUBLIC__jilt_single/" + jump;
                    }

                } else {
                    window.location.href = "__PUBLIC__choose/" + jump + "/wid/0";
                }
            } else if (data.code == -1) {
                layer.open({
                    content:"你还未登录还不能开始下单,是否去登录账号",
                    btn:['登录', '我在看看'],
                    title:"登录",
                    shade:0,
                    yes:function () {
                        window.location.href = "__PUBLIC__auth";
                    }
                })

            } else if(data.code==0) {
                layer.open({
                    content: data.msg+'是否前去申请月结客户'
                    ,btn: ['申请月结客户', '我在看看'],
                    title:"申请月结客户",
                    shade:0,
                    skin:"layui-layer-lan"
                    ,yes: function(index, layero){
                        //按钮【按钮一】的回调
                        window.location.href="__PUBLIC__core/customer";
                    }
                });
                return false;
            }else{
                msg(data.msg);
            }
        }
    });
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
