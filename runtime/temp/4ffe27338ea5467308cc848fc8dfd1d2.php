<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"E:\masterarea.com\biaojiang.local\public/../application/index\view\bjhelp\index.html";i:1542902331;s:85:"E:\masterarea.com\biaojiang.local\public/../application/index\view\public\header.html";i:1542902331;s:85:"E:\masterarea.com\biaojiang.local\public/../application/index\view\public\footer.html";i:1542902331;}*/ ?>
<style>
    #demo2{
        width:100%;
        height: auto;
        background: #DADADA;
        margin-top: 0;
    }
    #demo2>li{
       margin-left: 3rem;
    }
</style>
<!--帮助中心-->
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
<!--main-->
<div class="main Bjhelp" >
    <!--header-img-->
    <div class="container container-hidden">
        <h5 class="page-header bx">
            <span>当前位置：</span>
            <small>帮助中心</small><span>>></span>
        </h5>
        <div class="row">
            <div class="col-md-12 pl-10 pr-10 pt-10 pb-10">
                <div class="row" id="r-l">
                    <div id="l" class="col-md-3 col-sm-4">
                        <span class='btn text-elg hidden-sm text-orange hidden-lg hidden-md' style='position:absolute;z-index: 999;left:220px;top: -10px;' id='menu_btn'>
                             <i class="fa fa-times hide text-orange" aria-hidden="true"></i>
                                <i class="fa fa-bars text-orange" aria-hidden="true"></i>
                        </span>
                        <ul class="bjhelp_ul">
                            <li>
                                常见问题分类
                            </li>
                            <li>
                                <a href="" num="att.zhagnhu">账户问题</a>
                            </li>
                            <li>
                                <a href="" num="att.xiadan">下单问题</a>
                            </li>
                            <li>
                                <a href="" num="att.fufei">付费问题</a>
                            </li>
                            <li>
                                <a href="" num="att.shifu">师傅相关</a>
                            </li>
                        </ul>
                        <ul id="demo2" class=" "></ul>
                    </div>
                    <div id="r" class="col-md-9 col-sm-7" >
                        <div class="row">
                            <div class="col-md-12"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="controller">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 pl-10 pr-10 pt-10 pb-10  col-xs-offset-1">
                <div class="row">
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var att={
        zhagnhu:[
            [
                title='如何注册或登陆',
                nerrong='进入标匠官网，点击右上角“注册”按钮，输入相关信息，完成注册<br>进入标匠官网，点击右上角“登陆”按钮，输入账号密码，完成登陆',
            ],
            [
                title='无法登陆账号怎么办',
                nerrong='1.请核对账户或密码是否正确<br>2.请确认网络是否正常连接<br>3.若均无问题，请直接联系客户人员为您处理',
            ],
            [
                title='登陆密码忘记了怎么办',
                nerrong='1.点击网站首页右上角“登陆”按钮进入登陆页面<br>2.点击“密码重置”按钮，进入“重置密码”页面<br>3.使用手机号验证方式，输入验证码，找回密码'
            ],
            [
                title='如何绑定手机',
                nerrong='在注册时用户已绑定手机。'
            ],
            [
                title='账户丢失或被盗',
                nerrong='请联系客服为您处理。'
            ],
                [
                title='什么是用户等级',
                    nerrong='是标匠为用户打造的一套回馈、增值奖励方案，用户等级越高享受的权益越多，如现金券奖励，使用特殊功能等。'
                ],
                [
                title='如何提高用户等级',
                    nerrong='用户的等级由获取的成长值决定。成长值是通过在线完成交易后获得的经验值，由累计消费金额及交易次数计算获得，它标志着您在标匠平台累计的经验值，经验值越高则等级越高，同时享有更多的特权服务！'
                ]
        ],
        xiadan:[
            [
                title='如何在网站下单找师傅',
                nerrong='登陆后进入客户首页，选择您所需要的服务类型，进入下单页面，填写相应的信息，点击“提交订单”按钮，即可发布任务',
            ],
            [
                title='什么是甩单模式',
                nerrong='安装、维修、更换灯片、围板搭建与拆除采用甩单模式，甩单模式即客户提交订单，由师傅抢单出价，最后由客户选择合适的师傅进行交易。',
            ],
            [
                title='什么是平台估价模式',
                nerrong='勘测、品质监理采取平台估价模式，平台估价模式即客户提交订单后，由平台自配师傅对其估价，再推送给平台师傅，师傅查看订单详情及价格后决定接不接单。'
            ],
            [
                title='如何绑定手机',
                nerrong='在注册时用户已绑定手机'
            ],
            [
                title='账户丢失或被盗',
                nerrong='请联系客服为您处理'
            ],
            [
                title='什么是用户等级',
                nerrong='是标匠为用户打造的一套回馈、增值奖励方案，用户等级越高享受的权益越多，如现金券奖励，使用特殊功能等。'
            ],
            [
                title='如何提高用户等级',
                nerrong='用户的等级由获取的成长值决定。成长值是通过在线完成交易后获得的经验值，由累计消费金额及交易次数计算获得，它标志着您在标匠平台累计的经验值，经验值越高则等级越高，同时享有更多的特权服务！'
            ],
        ],
        fufei:[
            [
                title='提交订单后如何付费',
                nerrong='客户可根据个人喜好采用钱包余额或第三方（平台现支持微信支付、支付宝支付和银行卡支付）进行支付。平台保证每一份资金的安全',
            ],
            [
                title='订单支付时可用钱包余额支付吗',
                nerrong='平台建议优先使用钱包余额支付，如余额不足可采用第三方支付。',
            ],
            [
                title='订单重复付款了怎么办',
                nerrong='如由于网络原因或其他原因造成订单重复支付，请您主动和网站客服进行联系确认。网站人员会核实并协助进行处理，核查无误后平台将把重复支付的钱款原路退回您的账户'
            ],
            [
                title='如何挑选好师傅',
                nerrong='标匠建议您优先选择缴纳了保证金的师傅，结合师傅的评价、技能评分和服务次数来挑选师傅。'
            ],
            [
                title='为什么我不能使用钱包余额支付',
                nerrong='造成您不能支付的原因可能有：1.您的钱包没有余额。2.支付账户或支付密码错误。3.您的网络可能没有连接。若无以上问题，请联系平台客服，客服将协助您解决该问题'
            ],
            [
                title='钱包余额不足时该如何支付',
                nerrong='当钱包余额不足时，可采用钱包余额+第三方支付的方式进行支付。'
            ],
            [
                title='如何使用现金券与优惠券',
                nerrong='当客户下单支付时勾选可使用的现金券或优惠券，平台将自动进行优惠。'
            ]
        ],
        shifu:[
            [
                title='平台师傅目前可提供哪些服务',
                nerrong='平台师傅现可提供安装、维修、勘测、品质监理、更换灯片、围板的搭建与拆除六种服务。',
            ],
            [
                title='成为平台师傅有什么要求',
                nerrong='成为平台师傅必须具备安装、维修、勘测、品质监理、更换灯片、围板搭建与拆除中至少一种能力，认可标匠平台，且能够为平台服务。',
            ],
            [
                title='网站的师傅服务有保障吗',
                nerrong='平台的师傅都是经过平台严格筛选及考核的，其身份及服务水平都有保障，且平台对于违规的师傅有严厉的处罚规定，客户可放心选择平台上的师傅标匠友情建议您选择缴纳了保证金的师傅。'
            ],
            [
                title='如何挑选好师傅',
                nerrong='标匠建议您优先选择缴纳了保证金的师傅，结合师傅的评价、技能评分和服务次数来挑选师傅'
            ]
        ],
        xiyifanwei:[
            [
                title="1、签约主体",
                nerrong="【平等主体】本协议由您与标匠平台经营者共同缔结，本协议对您与标匠平台经营者均具有合同效力。【主体信息】标匠平台经营者是指经营标匠平台的各法律主体，您可随时查看标匠平台各网站首页底部公示的证照信息以确定与您履约的标匠平台主体。本协议项下，标匠平台经营者可能根据标匠平台的业务调整而发生变更，变更后的标匠平台经营者与您共同履行本协议并向您提供服务，标匠平台经营者的变更不会影响您本协议项下的权益。标匠平台经营者还有可能因为提供新的标匠平台服务而新增，如您使用新增的标匠平台服务的，视为您同意新增的标匠平台经营者与您共同履行本协议。发生争议时，您可根据您具体使用的服务及对您权益产生影响的具体行为对象确定与您履约的主体及争议相对方"
            ],
            [
                title="2、补充协议",
                nerrong="由于互联网高速发展，您与标匠平台签署的本协议列明的条款并不能完整罗列并覆盖您与标匠平台所有权利与义务，现有的约定也不能保证完全符合未来发展的需求。因此，标匠平台法律声明及隐私权政策为本协议的补充协议，与本协议不可分割且具有同等法律效力。如您使用标匠平台服务，视为您同意上述补充协议。"
            ],


        ],
        Account_registration_and_use:[
            [
                title="1、用户资格",
                nerrong="您确认，在您开始注册程序使用标匠平台服务前，您应当具备中华人民共和国法律规定的与您行为相适应的民事行为能力。若您不具备前述与您行为相适应的民事行为能力，则您及您的监护人应依照法律规定承担因此而导致的一切后果。"
            ],
            [
                title="2、账户说明",
                nerrong="【账户获得】当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，您可获得标匠平台账户并成为标匠平台用户标匠平台只允许每位用户使用一个标匠平台账户。如有证据证明或标匠平台有理由相信您存在不当注册或不当使用多个标匠平台账户的情形，标匠平台可采取冻结或关闭账户、取消订单、拒绝提供服务等措施，如给标匠平台及相关方造成损失的，您还应承担赔偿责任。【账户使用】您有权使用您设置或确认的标匠平台用户名、邮箱、手机号码（以下简称“账户名称”）及您设置的密码（账户名称及密码合称“账户”）登录标匠平台。由于您的标匠平台账户关联您的个人信息及标匠平台商业信息，您的标匠平台账户仅限您本人使用。未经标匠平台同意，您直接或间接授权第三方使用您标匠平台账户或获取您账户项下信息的行为无效。如标匠平台判断您标匠平台账户的使用可能危及您的账户安全及/或标匠平台信息安全的，标匠平台可拒绝提供相应服务或终止本协议。【账户转让】由于用户账户关联用户信用信息，仅当有法律明文规定、司法裁定或经标匠平台同意，并符合标匠平台规则规定的用户账户转让流程的情况下，您可进行账户的转让。您的账户一经转让，该账户项下权利义务一并转移。除此外，您的账户不得以任何方式转让，否则标匠平台有权追究您的违约责任，且由此产生的一切责任均由您承担。"
            ],
            [
                title="3、 注册信息管理",
                nerrong="3.1 真实合法【信息真实】在使用标匠平台服务时，您应当按标匠平台页面的提示准确完整地提供您的信息（包括您的姓名及电子邮件地址、联系电话、联系地址等），以便标匠平台或其他用户与您联系。您了解并同意，您有义务保持您提供信息的真实性及有效性。【用户名的合法性】您设置的标匠平台用户名不得违反国家法律法规及标匠平台规则关于用户名的管理规定，否则标匠平台可回收您的标匠平台用户名。标匠平台用户名的回收不影响您以邮箱、手机号码登录标匠平台并使用标匠平台服务。3.2 更新维护您应当及时更新您提供的信息，在法律有明确规定要求标匠平台作为平台服务提供者必须对部分用户的信息进行核实的情况下，标匠平台将依法不时地对您的信息进行检查核实，您应当配合提供最新、真实、完整、有效的信息。如标匠平台按您最后一次提供的信息与您联系未果、您未按标匠平台的要求及时提供信息、您提供的信息存在明显不实或行政司法机关核实您提供的信息无效的，您将承担因此对您自身、他人及标匠平台造成的全部损失与不利后果。标匠平台可向您发出询问或要求整改的通知，并有权直接做出删除相应资料的处理，直至中止、终止对您提供部分或全部标匠平台服务，标匠平台对此不承担责任。",
            ],
            [title="4、 账户安全规范",
                nerrong="【账户安全保管义务】您的账户为您自行设置并由您保管，标匠平台任何时候均不会主动要求您提供您的账户密码。因此，建议您务必保管好您的账户， 并确保您在每个上网时段结束时退出登录并以正确步骤离开标匠平台。账户因您主动泄露或因您遭受他人攻击、诈骗等行为导致的损失及后果，标匠平台并不承担责任，您应通过司法、行政等救济途径向侵权行为人追偿。【账户行为责任自负】除标匠平台存在过错外，您应对您账户项下的所有行为结果（包括但不限于在线签署各类协议、发布信息、兑换商品及服务及披露信息等）负责。【日常维护须知】如发现任何未经授权使用您账户登录标匠平台或其他可能导致您账户遭窃、遗失的情况，建议您立即通知标匠平台。您理解标匠平台对您的任何请求采取行动均需要合理时间，且标匠平台应您请求而采取的行动可能无法避免或阻止侵害后果的形成或扩大，除标匠平台存在法定过错外，标匠平台不承担责任。"
            ]
        ],
        standard:[
            [title="",
                nerrong="【服务概况】您有权在标匠平台上享受招标雇佣、资金交易等服务。标匠平台提供的服务内容众多，具体您可登录标匠平台浏览。标匠平台保留在任何时候自行决定对标匠平台服务及其相关功能、应用软件变更、升级的权利。 标匠平台进一步保留在平台服务中开发新的模块、功能和软件或其它语种服务的权利。 上述所有新的模块、功能、软件服务的提供，除非标匠平台另有说明，否则仍适用本协议。 服务随时可能因标匠平台的单方判断而被增加或修改，或因定期、不定期的维护而暂缓提供， 您将会得到相应的变更通知。您在此同意标匠平台在任何情况下都无需向其或第三方在使用服务时对其在传输或联络中的迟延、不准确、错误或疏漏及因此而致使的损害负责。"
            ],
            [title="1、 招标雇佣",
                nerrong="【招标信息发布】通过标匠平台提供的服务，您有权通过文字、图片等形式在标匠平台上发布家居服务需求、招标和选择雇佣对象、达成交易。标匠平台不对您所发布信息的删除或储存失败负责。【雇佣服务商】您有权依据自己的独立判断选择雇佣对象，标匠平台仅通过提供在线信息平台的方式， 向您提供信息服务，本协议的签署并不意味着标匠平台成为您在标匠平台上与服务商所进行的服务或交易的参与者；标匠平台本身不对服务商的上传内容 （包括其发布的供服务商参考报价的订单内容及其他全部由其上传的内容）负责，亦不对服务商在标匠平台上发布的信息及其提供的线下服务作任何明示或默示的担保。标匠平台不担保标匠平台中服务商提供的家居服务一定能满足您及线下客户的要求，您明确同意其使用本网站服务及通过本网站雇佣的服务所存在的风险将完全由其自己承担；因您使用本网站服务而产生的一切后果也由您自己承担，标匠平台不对消费者承担任何责任。【交易秩序保障】您应当遵守诚实信用原则，确保您所发布的家居服务需求真实并在交易过程中切实履行您的交易承诺。您应当维护标匠平台市场良性竞争秩序，不得贬低、诋毁竞争对手以及服务商，不得干扰标匠平台上进行的任何交易、活动，不得以任何不正当方式提升或试图提升自身的信用度，不得以任何方式干扰或试图干扰标匠平台的正常运作。"
            ],
            [title="2、资金交易",
                nerrong="【钱包账户】 您需了解并同意，如您系在标匠平台完成注册，只要您注册成功，您即自动开通标匠钱包账户，同意使用标匠钱包账户结算与标匠平台发生联系的款项，您可以对钱包账户进行充值，使用钱包余额支付雇佣等款项，订单的退款以及先行赔付的赔付金会依据标匠平台规则进入钱包账户。您有权根据需要更改账户钱包密码。因您的过错导致的任何钱包资金损失由您自行承担，该过错包括但不限于：不按照交易提示操作，未及时进行交易操作，遗忘或泄漏密码，密码被他人破解，用户使用的计算机被他人侵入。【担保交易】 标匠平台不担保服务商提供的服务一定能满足您以及您客户的需求，只对您在支付雇佣款之后的资金进行担保交易。您有权依据标匠平台规定在服务商提交服务完成后再进行确认付款，服务商的服务完成后若您未主动确认付款，订单将在7天（返货订单15天）之后自动确认付款。"
            ],
            [title="3、 交易争议处理",
                nerrong="【交易争议处理途径】您在标匠平台交易过程中与服务商发生争议的，您有权选择以下途径解决：（一）与争议相对方自主协商；（二）使用标匠平台提供的争议调处服务；（三）请求消费者协会或者其他依法成立的调解组织调解；（四）向有关行政部门投诉；（五）根据与争议相对方达成的仲裁协议（如有）提请仲裁机构仲裁；【平台调处服务】如您依据标匠平台规则（包括但不限于交易退款、费用增加等）使用标匠平台的争议调处服务，则表示您认可并愿意履行标匠平台的维权专员或大众评审员（“调处方”）作为独立的第三方根据其所了解到的争议事实并依据标匠平台规则所作出的调处决定（包括调整相关订单的交易状态、判定将争议款项的全部或部分支付给交易一方或双方，部分符合先行赔付规则的交易订单，标匠平台可依据单方面的判断提供相应赔偿服务等）。在标匠平台调处决定作出前，您可选择上述（三）、（四）、（五）途径（下称“其他争"
            ]
        ],
        userinfo:[
            [title="1、个人信息的保护",
                nerrong="标匠平台非常重视用户个人信息（即能够独立或与其他信息结合后识别用户身份的信息）的保护，在您使用标匠平台提供的服务时，您同意标匠平台按照在标匠平台上公布的隐私权政策收集、存储、使用、披露和保护您的个人信息。标匠平台希望通过隐私权政策向您清楚地介绍标匠平台对您个人信息的处理方式，因此标匠平台建议您完整地阅读隐私权政策（点击此处或点击标匠平台首页底部链接），以帮助您更好地保护您的隐私权。"
            ],
            [title="2、非个人信息的保证与授权",
                nerrong="【信息的发布】您声明并保证，您对您所发布的信息拥有相应、合法的权利。否则，标匠平台可对您发布的信息依法或依本协议进行删除或屏蔽。【禁止性信息】您应当确保您所发布的信息不包含以下内容：（一）违反国家法律法规禁止性规定的；（二）政治宣传、封建迷信、淫秽、色情、赌博、暴力、恐怖或者教唆犯罪的；（三）欺诈、虚假、不准确或存在误导性的；（四）侵犯他人知识产权或涉及第三方商业秘密及其他专有权利的；（五）侮辱、诽谤、恐吓、涉及他人隐私等侵害他人合法权益的；（六）存在可能破坏、篡改、删除、影响标匠平台任何系统正常运行或未经授权秘密获取标匠平台及其他用户的数据、个人资料的病毒、木马、爬虫等恶意软件、程序代码的；（七）其他违背社会公共利益或公共道德或依据相关标匠平台协议、规则的规定不适合在标匠平台上发布的。【授权使用】对于您提供及发布除个人信息外的文字、图片等非个人信息，在版权保护期内您免费授予标匠平台获得全球排他的许可使用权利及再授权给其他第三方使用的权利。您同意标匠平台存储、使用、复制、修订、编辑、发布、展示、翻译、分发您的非个人信息或制作其派生作品，并以已知或日后开发的形式、媒体或技术将上述信息纳入其它作品内。为方便您使用标匠平台其他相关服务，您授权标匠平台将您在账户注册和使用标匠平台服务过程中提供、形成的信息传递给标匠平台其他相关服务提供者，例如，标匠平台可能将该信息发送至信用卡服务商以完成付款程序。或从标匠平台其他相关服务提供者获取您在注册、使用相关服务期间提供、形成的信息。"
            ]
        ],
        break_a_contract:[
            [title="1、 违约认定",
                nerrong="发生如下情形之一的，视为您违约：（一）使用标匠平台服务时违反有关法律法规规定的；（二）违反本协议或本协议补充协议（即本协议第2.2条）约定的。为适应平台发展和满足海量用户对高效优质服务的需求，您理解并同意，标匠平台可在标匠平台规则中约定违约认定的程序和标准。如：标匠平台可依据服务商提供的证据来认定您是否构成违约；您有义务对您的指控进行充分举证和合理解释，否则将被认定为违约。"
            ],
            [title="2、 违约处理措施",
                nerrong="【信息处理】您在标匠平台上发布的信息构成违约的，标匠平台可根据相应规则立即对相应信息进行删除、屏蔽处理等。【行为限制】您在标匠平台上实施的行为，或虽未在标匠平台上实施但对标匠平台及其用户产生影响的行为构成违约的，标匠平台可依据相应规则对您执行限制参加商业活动、中止向您提供部分或全部服务、冻结或删除账户等处理措施。【处理结果公示】标匠平台可将对您上述违约行为处理措施信息以及其他经国家行政或司法机关生效法律文书确认的违法信息在标匠平台上予以公示。"
            ],
            [title="3、赔偿责任",
                nerrong="如您的行为使标匠平台遭受损失（包括自身的直接经济损失、商誉损失及对外支付的赔偿金、和解款、律师费、诉讼费等间接经济损失），您应赔偿标匠平台的上述全部损失。如您的行为使标匠平台遭受第三人主张权利，标匠平台可在对第三人承担金钱给付等义务后就全部损失向您追偿。"
            ],
            [title="4、特别约定",
                nerrong="【商业贿赂】如您向标匠平台的雇员或顾问等提供实物、现金、现金等价物、劳务、旅游等价值明显超出正常商务洽谈范畴的利益，则可视为您存在商业贿赂行为。发生上述情形的，标匠平台可立即终止与您的所有合作并向您收取违约金及/或赔偿金，该等金额以标匠平台因您的贿赂行为而遭受的经济损失和商誉损失作为计算依据。【关联处理】如您因严重违约导致标匠平台终止本协议时，出于维护平台秩序及保护消费者权益的目的，标匠平台可对与您在其他协议项下的合作采取中止甚或终止协议的措施，并以本协议第八条约定的方式通知您。如标匠平台与您签署的其他协议及标匠平台与您签署的协议中明确约定了对您在本协议项下合作进行关联处理的情形，则标匠平台出于维护平台秩序及保护消费者权益的目的，可在收到指令时中止甚至终止协议，并以本协议第八条约定的方式通知您。"
            ]
        ],
        inform:[
            [title="1、有效联系方式",
                nerrong="您在注册成为标匠平台用户，并接受标匠平台服务时，您应该向标匠平台提供真实有效的联系方式（包括您的电子邮件地址、联系电话、联系地址等），对于联系方式发生变更的，您有义务及时更新有关信息，并保持可被联系的状态。您在注册标匠平台用户时生成的用于登陆标匠平台接收站内信、系统消息也作为您的有效联系方式。标匠平台将向您的上述联系方式的其中之一或其中若干向您送达各类通知，而此类通知的内容可能对您的权利义务产生重大的有利或不利影响，请您务必及时关注。"
            ],
            [title="2、 通知的送达",
                nerrong="标匠平台通过上述联系方式向您发出通知，其中以电子的方式发出的书面通知，包括但不限于在标匠平台公告，向您提供的联系电话发送手机短信，向您提供的电子邮件地址发送电子邮件，在发送成功后即视为送达；以纸质载体发出的书面通知，按照提供联系地址交邮后的第五个自然日即视为送达。对于在标匠平台上因交易活动引起的任何纠纷，您同意司法机关（包括但不限于人民法院）可以通过手机短信、电子邮件等现代通讯方式或邮寄方式向您送达法律文书（包括但不限于诉讼文书）。您指定接收法律文书的手机号码、电子邮箱等联系方式为您在标匠平台注册、更新时提供的手机号码、电子邮箱联系方式，司法机关向上述联系方式发出法律文书即视为送达。您指定的邮寄地址为您的法定联系地址或您提供的有效联系地址。您同意司法机关可采取以上一种或多种送达方式向您达法律文书，司法机关采取多种方式向您送达法律文书，送达时间以上述送达方式中最先送达的为准。您同意上述送达方式适用于各个司法程序阶段。如进入诉讼程序的，包括但不限于一审、二审、再审、执行以及督促程序等。你应当保证所提供的联系方式是准确、有效的，并进行实时更新。如果因提供的联系方式不确切，或不及时告知变更后的联系方式，使法律文书无法送达或未及时送达，由您自行承担由此可能产生的法律后果。"
            ]
        ],
        termination:[
            [title="1 、终止的情形",
                nerrong="用户发起的终止】您有权通过以下任一方式终止本协议：<br>（一）变更事项生效前您停止使用并明示不愿接受变更事项的；<br>（二）您明示不愿继续使用标匠平台服务，且符合标匠平台终止条件的。<br>【标匠平台发起的终止】出现以下情况时，标匠平台可以本协议第八条的所列的方式通知您终止本协议：<br>（一）您违反本协议约定，标匠平台依据违约条款终止本协议的；（二）您盗用他人账户、发布违禁信息、骗取他人财物、引导线下交易、扰乱市场秩序、采取不正当手段谋利等行为，标匠平台依据标匠平台规则对您的账户予以查封的；<br>（三）除上述情形外，因您多次违反标匠平台规则相关规定且情节严重，标匠平台依据标匠平台规则对您的账户予以查封的；<br>（四）您的账户被标匠平台依据本协议回收的；（五）其它应当终止服务的情况。<br>"
            ],
            [title="2、 协议终止后的处理",
                nerrong="【用户信息披露】本协议终止后，除法律有明确规定外，标匠平台无义务向您或您指定的第三方披露您账户中的任何信息。【标匠平台权利】本协议终止后，标匠平台仍享有下列权利：（一）继续保存您留存于标匠平台的本协议第五条所列的各类信息；（二）对于您过往的违约行为，标匠平台仍可依据本协议向您追究违约责任。【交易处理】本协议终止后，对于您在本协议存续期间产生的交易订单，标匠平台可通知交易相对方并根据交易相对方的意愿决定是否关闭该等交易订单；如交易相对方要求继续履行的，则您应当就该等交易订单继续履行本协议及交易订单的约定，并承担因此产生的任何损失或增加的任何费用。"
            ]
        ],
        Use_of_law:[
            [
                title="",
                nerrong="【法律适用】本协议之订立、生效、解释、修订、补充、终止、执行与争议解决均适用中华人民共和国大陆地区法律；如法律无相规定的，参照商业惯例及/或行业惯例。<br>【管辖】您因使用标匠平台服务所产生及与标匠平台服务有关的争议，由标匠平台与您协商解决。协商不成时，任何一方均可向深圳市仲裁委员会提起仲裁。<br>【可分性】本协议任一条款被视为废止、无效或不可执行，该条应视为可分的且并不影响本协议其余条款的有效性及可执行性。<br>"
            ]
        ],
        Payment_terms:[
            [title="",
                nerrong="标匠作为国内互联网服务行业创新模式的代表，致力于为用户提供标准专业的装饰相关服务，让用户工作生活更简单！推出 “标匠先行赔付保障计划”（以下亦简称“保障计划”）目的在于为用户营造一个安全、可信的装饰服务网络环境，让用户放心的使用标匠以满足各种装饰服务需求。<br>1、“标匠先行赔付保障计划”是指标匠的注册用户在标匠平台在线交易过程中，因标匠平台的师傅（以下亦简称“相关师傅”）在提供装饰服务服务过程中未按照《标匠平台服务规范》要求服务，导致用户在与师傅交易或接受其服务时受到由于师傅的过错造成的直接、实际经济损失的，用户可以依据本保障计划相关的有关规则、细则、赔付流程向标匠平台针对相关师傅发起投诉，并申请先行赔付。<br>2、“赔付时效”是指用户应在本协议约定的时效期间内向标匠发起先行赔付申请，超出该时效期间的申请，标匠将不予受理。"
            ],
        ],
        Scope_of_compensation:[
            [title="",
                nerrong="1、用户应为标匠注册用户。<br>2、用户在标匠平台发布订单任务后与接受雇佣的师傅发生了交易。用户必须先雇佣师傅并在线托管了服务费用并最终与相关师傅进行交易，方可申请先行赔付（注：如用户与师傅在交易发生前已产生问题，不在赔付范围）。<br>3、用户在与相关师傅进行交易或接受其服务时，或在交易或服务结束后的服务保障期等期限（上述统称“保障期”）内发生以下情况可及时发起投诉维权，申请先行赔付：<br>1）用户发布任务后，因无师傅报价导致系统自动关闭订单的（注：该情况无需用户申请，系统将自动对用户进行现金券赔付）；<br>2）用户雇佣师傅后，师傅未在2小时内预约客户的（注：a、时间以用户完成付款和以及订单涉及货物最后到达指定物流配送点的时间中最晚时间开始计算，其中货物最后到达指定的物流配送点以用户在网站上在线显示的物流到达时间为准；b、22:00-8:00时间期间师傅有权不预约客户）；<br>3）用户雇佣师傅后，师傅未能在订单所涉及货物最后到达物流点后48小时内完成服务，且事后师傅与用户无法协商一致的（注：a、时间以用户付款和货物最后到达指定物流配送点的时间中最晚时间开始计算，其中货物最后到达指定的物流配送点以用户在网站上在线显示的物流到达时间为准；b、若因非师傅自身的原因（如：天气或客户原因）导致的未完成服务，不在赔付范围）；<br>4）师傅在服务过程中造成客户其它商品损坏或丢失，且用户与师傅就赔偿事宜无法协商一致的（注：a、用户必须提供相关证据材料；b、玻璃、陶瓷、大理石等易碎家具不在赔付范围内）；<br>5）师傅服务问题导致用户第三方店铺（仅限淘宝店、天猫店、京东店）被客户进行差评，且用户与师傅就赔偿事宜无法协商一致的（注：用户必须提供相关证据材料）；<br>4、用户应在赔付期限内提起先行赔付申请并同时提供相关证据材料：a、订单雇佣师傅并付款后；b、订单交易完成或交易关闭日起算的15天内；<br>5、赔付额度：根据协议内容赔付现金券或现金，现金赔偿限额最高不超过2000元人民币。"
            ]
        ],
        Compensation_process:[
            [
                title='',
                nerrong='1、申请赔付流程：在线进入订单师傅报价页面-提交投诉申请并申请赔付-平台客服审核仲裁-赔付（现金券/现金）。基于以上维权申请流程，标匠依照以下细则进行赔付执行：用户需提交的举证材料：a、主张服务过程中/服务结束后，相关师傅造成对客户商品或客户家中其它家居商品损坏/丢失的，需提供商品损坏照片、商品销售价格凭证、店铺销售交易证明、物流发货单照片、提货签收单照片。b、主张因相关师傅服务问题导致用户第三方店铺差评的，需提供店铺差评截图证明。c、维权证据范围：包括但不限于合同协议、收据、押金条、监控录像、通话记录、权威机构检测报告等任何有效证据。<br>2、举证时限：a、平台维权客服收到用户投诉后，如5天内无法联系上用户进行核实证据，系统将自动默认投诉无效。b、平台维权客服认为证据不充分并联系到用户，如用户未在收到通知后48小时内容提交完整证据，系统将自动默认投诉无效。<br>3、标匠赔付：标匠平台仲裁判定为符合赔付条件的，标匠将在结束仲裁后24小时内向用户支付先行赔付款项（现金券/现金）。'
            ]
        ],
        The_principle_of_franchise:[
            [title="",
                nerrong="满足但不限于以下任一情况的，标匠将不提供先行赔付服务，不负责先行赔付：<br>1、用户非在线交易行为。<br>2、用户与相关师傅共同骗取赔付，将不予赔付。在不予赔付的同时，标匠将保留追究相关人员法律责任的权利。<br>3、用户提供证据不充分或作假，无法证明相关师傅责任的，标匠将不予赔付。<br>4、用户超出赔付发起时限提交赔付申请。<br>5、用户已获相关师傅或第三方赔付或补偿的，标匠不予赔付。<br> 6、因用户的故意行为、重大过失行为、违法行为而导致的经济损失，标匠不予赔付。<br> 7、其他标匠认为不应承担赔付的情形。"
            ]
        ],
        punish:[
            [
                title='',
                nerrong="1、标匠有权向相关师傅对赔付金额进行追偿。<br>2、标匠有权对被执行维权、存在欺诈行为的相关师傅进行关停账户、拨付其账户内余额优先作为赔付金额等处理。",
            ]
        ],
        limited_liability:[
            [
                title='',
                nerrong='1、标匠仅有义务根据先行赔付规则向用户索要相关证据，但并无义务对用户证据的真实性与准确性及交易的实际情况做进一步调查。<br>2、由于用户过错导致的仲裁错误，标匠不对用户承担补偿责任。并且一旦发现用户存在骗取赔付的行为，标匠保留追索权。<br>3、用户未在规定赔付时效内发起先行赔付申请并提交完整证据的，视为用户主动放弃先行赔付申请的权利。'
            ]
        ],
        other_terms:[
            [
                title='',
                nerrong='1、本协议相关的一切争议的解决均适用中华人民共和国法律。对本协议有异议或者基于本协议产生的一切纠纷应当协商解，协商不成的，应诉诸苏州仲裁委员会按照中华人民共和国相关法律裁决；<br>2、如本协议的任何条款被视作无效或无法执行，不影响其余条款的法律效力；<br>3、标匠对本协议及相关先行赔付保障计划的所有内容享有法律范围内的最终解释权。'
            ]
        ],
        Bronze_the_artisan:[
            [
                title='',
                nerrong='<span class="text-orange">注册标匠升级为正式标匠（铜牌标匠）</span>，<br>注册标匠参加由公司维修服务中心组织的培训会，会后通审核包括证件（身份证，工作证，技能证）审核和技能审核并经我司人员在后台确认即可晋升为正式标匠。<br> >>>><br>晋升流程：<br>培训会<br>市场部人员召集见注册标匠参加培训会<br>▼<br>维修服务中心负责培训会的讲解<br>▼<br>维修服务中心对参加培训会见习标匠进行培训考核（培训考核通过后）<br>▼<br>市场部人员配合标匠运营部完成证件认证，发放工装、工牌等<br>▼<br>维修服务中心人员进行正式标匠信息录入<br>▼<br>维修服务中心三个工作日完成系统审核<br>▼<br>成为正式标匠<br>（抽佣标准：抽佣比例20%）',
            ]
        ],
        Silver_standard_artisan:[
            [
                title='',
                nerrong='<spna class="text-orange">正式标匠（铜牌标匠）升级为银牌标匠</spna><br>由公司工作人员按照标准进行筛选，维修服务中心审核通过，并在系统上进行操作，该标匠晋升为银牌标匠。<br>工作人员筛选银牌标匠标准如下：<br>硬性条件：<br>①接单量超过20单；<br>②施工完毕后客户评价平均分在4.7分以上；<br>③拥有2项以上的服务技能；<br>④拥有国家机构颁布的专项技能证件；<br>⑤工具齐备，有基础的交通工具（如电动车）；<br>加分条件：<br>①认可公司文化，有责任心；<br>②有一定的文化基础和口才，善于与人沟通；<br>抽佣标准：<br>抽佣比例15%'
            ]
        ],
        Gold_standard_artisan:[
            [
                title='',
                nerrong='<span class="text-orange">银牌标匠升级为金牌标匠</span><br>由公司工作人员按照标准进行筛选，维修服务中心审核通过，并在系统上进行操作，该标匠晋<br>金牌标匠。<br>工作人员筛选金牌标匠标准如下：<br>硬性条件：<br>①接单量超过100单；<br>②施工完毕后客户评价平均分在4.7分以上；<br>③拥有3项以上的服务技能；<br>④拥有国家机构颁布的专项技能证件；<br>⑤工具齐备，有机动的交通工具（如摩托车、汽车）；<br>⑥拥有维修装修行业8年以上工作经验<br>⑦有一定的文化基础和口才，善于与人沟通；<br> 加分条件：<br>①  认可公司文化，有责任心；<br>②  有良好的文化基础和口才，善于与人沟通；<br>抽佣标准：<br>抽佣比例10%'
            ]
        ],
        Disciplinary_system:[
            [
                title='',
                nerrong='违规标匠处罚制度为了规范标匠在受理订单及上门服务的行为，特别指出标匠注意事项。服务中心客服人员及客户投诉由服务中心查明属实按照以下制度执行。<br> 违规分类<br>投诉按严重程度分为初级违规，中级违规，高级违规。具体内容如下：<br>1、初级违规<br>(1).未能礼貌对待顾客，服务态度消极；<br>(2).未按预约时间到达；<br>(3).如有特殊情况不能按时到达，未提前45分钟向顾客解释；<br>(4).未携带工牌、穿戴工装、鞋套；<br>(5).未清理卫生，还原现场；<br>2、中级违规<br>(1).订单完成售后期内未对顾客提供售后服务<br>(2).订单完成后，收取现金未提交维修金额（师傅代付），<br>(3).维修事后骚扰顾客；<br>(4).未按照公司统一价格进行报价，多收费乱收费用；<br>(5).在顾客家吸烟，吐痰；<br>(6).中途拒绝施工；<br>(7).未经顾客许可擅自购买配件；<br>(8).与顾客沟通后同意代购配件，但未提供收据或开发票；<br>(9).损坏顾客物品；<br>3、高级违规<br>(1).偷盗顾客物品；<br>(2).酒后接单；<br>(3).辱骂肢体冲突；<br>违规积分分值<br>初级违规3分/次，中级违规6分/次，高级违规直接清退永不合作<br>违规积分处理方法<br>积分清算周期按照自然季度结算<br>积分<br>3分<br>6分<br>12分<br>处理方式<br>短信通告<br>个人通知<br>账号停用3天<br>短信通告<br>个人通知<br>账号停用1周<br>短信通告<br>个人通知<br>账号停用3周<br>重新培训学习<br>交服务保证金500元<br>'
            ]
        ],
        }




    layui.use(['tree', 'layer'], function(){
        var layer = layui.layer
            ,$ = layui.jquery;
        var k=null;
        layui.tree({
            elem: '#demo2' //指定元素
            ,target: '_blank' //是否新选项卡打开（比如节点返回href才有效）
            ,click: function(item){ //点击节点回调
                   var si= item.alias;
                try    {
                    forvcontroller_li(att[si])
                }
                catch(exception){
                    forvcontroller(att.zhagnhu);

                }
            }
            ,nodes: [ //节点
                {
                    name: '标匠月结客户服务协议'
                    ,id: 1
                    ,alias: 'xiyifanwei'
                    ,children: [
                    {
                        name: '协议范围'
                        ,id: 11
                        ,href: ''
                        ,alias: 'xiyifanwei',
                        children:[
                            {
                                name:'签约主体',
                                id:10,
                                alias: 'xiyifanwei',
                            }
                            ,{
                                name:"补充协议",
                                alias: 'xiyifanwei',
                            }
                        ]
                    }, {
                        name: '账户注册与使用'
                        ,id: 12,
                        alias:"Account_registration_and_use",
                        children:[
                            {
                                name:'用户资格',
                                id:10,
                                alias:"Account_registration_and_use",
                            }
                            ,{
                                name:"账户咨询",
                                alias:"Account_registration_and_use",
                            }
                            ,{
                                name:'注册信息管理',
                                alias:"Account_registration_and_use",
                            },
                            {
                                name:"注册信息管理",
                                alias:"Account_registration_and_use",
                            },
                            {
                                name:"真实合法",
                                alias:"Account_registration_and_use",
                            }
                            ,{
                                name:'更新维护',
                                alias:"Account_registration_and_use",
                            }
                            ,{
                                name:"账户安全规范",
                                alias:"Account_registration_and_use",
                            }
                        ]
                    }, {
                        name: '标匠平台服务及规范',
                        id: 13,
                        alias:"standard",
                        children:[
                            {
                                name:'招标雇佣',
                                id:10,
                                alias:"standard",
                            }
                            ,{
                                name:"资金交易",
                                alias:"standard",
                            }
                            ,{
                                name:'交易争议处理',
                                alias:"standard",
                            },
                            {
                                name:"费用",
                                alias:"standard",
                            },
                            {
                                name:"责任限制",
                                alias:"standard",
                            }

                        ]

                    },
                    {
                        name:'用户信息的保护及授权',
                        alias:"userinfo",
                        children:[
                            {
                                name:'个人信息',
                                id:10,
                                alias:"userinfo",
                            }
                            ,{
                                name:"非个人信息的保证与授权",
                                alias:"userinfo",
                            }
                        ]
                    },
                    {
                        name:'用户的违约及处理',
                        alias:"break_a_contract",
                        children:[
                            {
                                name:'违约认定',
                                id:10,
                                alias:"break_a_contract",
                            }
                            ,{
                                name:"违约处理措施",
                                alias:"break_a_contract",
                            }
                            ,{
                                name:'赔偿责任',
                                alias:"break_a_contract",
                            },
                            {
                                name:"特别约定",
                                alias:"break_a_contract",
                            },
                            {
                                name:"协议的变更",
                                alias:"break_a_contract",
                            }

                        ]
                    }
                    ,{
                        name:'通知',
                        alias:"inform",
                        children:[
                            {
                                name:'有效联系方式',
                                id:10,
                                alias:"inform",
                            }
                            ,{
                                name:"通知的送达",
                                alias:"inform",
                            }
                        ]
                    }
                    ,{
                        name:'协议的终止',
                        alias:"termination",
                        children:[
                            {
                                name:'终止的情形',
                                id:10,
                                alias:"termination",
                            }
                            ,{
                                name:"协议终止后的处理",
                                alias:"termination",
                            }
                        ]
                    }
                    ,{
                        name:'法律的使用,管辖与其他',
                        alias:"Use_of_law"
                    }

                ]
                }, {
                    name: '标匠先行赔付服务条款',
                    id: 2,
                    alias:"Payment_terms",
                    children:[
                        {
                            name:'赔付范围',
                            alias:"Scope_of_compensation",
                            id:10
                        }
                        ,{
                            name:"赔付流程",
                            alias:"Compensation_process"
                        }
                        ,{
                            name:"免赔原则",
                            alias:"The_principle_of_franchise"
                        }
                        ,{
                            name:"追偿及处罚相关师傅原则",
                            alias:"punish"
                        }
                        ,{
                            name:"有限责任",
                            alias:"limited_liability"
                        }
                        ,{
                            name:"其他条款",
                            alias:"other_terms"
                        }
                    ]
                }
                ,{
                    name: '师傅晋升流程'
                    ,id: 3
                    ,alias: 'Bronze_the_artisan'
                    ,children: [
                        {
                            name:"铜牌标匠",
                            alias: 'Bronze_the_artisan'
                        },
                        {
                            name:"银牌标匠",
                            alias: 'Silver_standard_artisan'
                        },
                        {
                            name:"金牌标匠",
                            alias: 'Gold_standard_artisan'
                        },
                        {
                            name:"违规处罚制度",
                            alias: 'Disciplinary_system'
                        }
                    ]
                }
            ]
        });
        //生成一个模拟树
    });

    $(function () {
        var i=0;
        var tre= setInterval(function () {
            $("i.layui-tree-branch").remove();
            if(i>1000){
                clearInterval(tre)
            }
            i++;
        },1);


    })
    $(".bjhelp_ul li:not(:first-child)").click(function (e) {
        e.preventDefault();
        forvcontroller(eval($(this).find('a').attr('num')));

    });

    var forvcontroller=function (name) {
        cun1= name;
        cun=name.length;
        var html='';
        for(var i=0;i<cun;i++){
            html+=' <div class="layui-collapse" lay-filter="test"> <div class="layui-colla-item "> <h2 class="layui-colla-title mb-0 mt-0 bg-orange text-center">'+cun1[i][0]+'</h2> <div class="layui-colla-content"><p>'+cun1[i][1]+'</p> </div> </div> </div>';
        }

        $("#controller").html(html);

        layui.use("element",function () {
            var element=layui.element();
            element.init();
            $(".layui-icon.layui-colla-icon").remove();

        })
    }
    var forvcontroller_li=function (name) {
        cun1= name;
        cun=name.length;
        var html='';
        for(var i=0;i<cun;i++){
            html+= ' <div class="b" lay-filter="test"> <h3>'+cun1[i][0]+'</h3> <p>'+cun1[i][1]+'</p> </div>';
        }

        $("#controller").html(html);
        

    }
    forvcontroller(att.zhagnhu);
    var m;
    var la=true;
    $(window).resize(function () {
    var $l=$("#l");
    var $r=$("#r");

       var widht_s= $(window).width();
        if(widht_s<768){
            m=la;
            $("#menu_btn").click(function () {
                if(la){
                    $("#l").addClass("left_l");
                    $("#r").addClass("left_r");
                    $("#menu_btn>i:eq(1)").addClass("hide");
                    $("#menu_btn>i:eq(0)").removeClass("hide");
                    la=false;
                }else{
                    $("#l").removeClass("left_l");
                    $("#r").removeClass("left_r");
                    la=true;
                    $("#menu_btn>i:eq(0)").addClass("hide");
                    $("#menu_btn>i:eq(1)").removeClass("hide");
                }

            })
        }else{
        }
    });
    $("#controller").on("click",".layui-colla-title",function () {
       if(m) {
           $("#l").removeClass("left_l");
           $("#r").removeClass("left_r");
           $("#menu_btn>i:eq(0)").addClass("hide");
           $("#menu_btn>i:eq(1)").removeClass("hide");
           la=true;
       }else{

       }
    });

    $(function () {
        var wid=$(window).width();
        if(wid<776){
            var $l=$("#l");
            var $r=$("#r");

            var widht_s= $(window).width();
            if(widht_s<768){
                m=la;
                $("#menu_btn").click(function () {
                    if(la){
                        $("#l").addClass("left_l");
                        $("#r").addClass("left_r");
                        $("#menu_btn>i:eq(1)").addClass("hide");
                        $("#menu_btn>i:eq(0)").removeClass("hide");
                        la=false;
                    }else{
                        $("#l").removeClass("left_l");
                        $("#r").removeClass("left_r");
                        la=true;
                        $("#menu_btn>i:eq(0)").addClass("hide");
                        $("#menu_btn>i:eq(1)").removeClass("hide");
                    }

                })
            }else{
            }
        }
    })
</script>
<style>
    #bs-example-navbar-collapse-1>ul>li:nth-child(6)>a{
        color: #ff5200;
    }


</style>
<script>

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
