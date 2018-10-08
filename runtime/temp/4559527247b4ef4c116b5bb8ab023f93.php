<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"E:\web-php-5.6\bjtp5/application/index\view\bjnews\index.html";i:1510103679;s:62:"E:\web-php-5.6\bjtp5/application/index\view\public\header.html";i:1510103679;s:62:"E:\web-php-5.6\bjtp5/application/index\view\public\footer.html";i:1510103679;}*/ ?>
<!--新闻咨询-->
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

<div class="main Bjnews  mt-130" >

    


    <div class="container text-center">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <h2 class="text-center text-orange h3">新闻咨询</h2>
                <h4 class="text-center text-orange h4">About &nbsp;us</h4>
                <span class="text-orange" style="width: 40px;border-top: 2px solid #ff5200;display: inline-block"></span>
            </div>
        </div>

       <div class="row m mb-30 mt-20">
           <div class="col-md-3"> <img src="__PUBLIC__static/index/images/20170818114419.png" class="img-responsive " alt=""/></div>
           <div class="col-md-9 text-left">
               <p class="h4 text-center">陈列，吸引顾客的第一道风景</p>
               <p>   　　  在人际交往中，第一次形成印象对人的认知往往具有很大的影响力。第一印象不管正确与否，总是最鲜明、最牢固的，左右着对对方的评价影响着以后的交往。同样道理，一个柜台给予顾客的第一印象也能对顾客产生深远的影响，它决定了顾客是否会采取购买行为。</p>

               <p>　　一个人给他人第一印象的主要因素一般是他的衣着打扮。而一个柜台给顾客的第一印象的主要因素就是柜台的陈列。心理学家认为：顾客在购买活动中，最容易受暗示因素影响。其中，以购物现场环境的暗示影响最大。北京的一个心理学研究机构曾对北京一些主要商场购买服装的顾客进行了一次问卷调查，结果显示，柜台的陈列能对顾客的购买行为产生一定的影响，有61.7%顾客认为购买某种产品是因为该柜台的陈列给他们留下深刻印象;有81%的顾客认为是陈列引起了人们的购物兴趣;而有29.3%的顾客则认为陈列促使他们立即采取了购买的行动。</p>

               <p>　　由此可见，陈列是吸引顾客在柜台前驻留的重要因素之一，也是营业员开展销售工作最基本的条件。一个精彩的、整洁的柜台陈列能够制造出一种强烈的震撼力；而一个平庸的、杂乱无章的陈列则会使顾客对柜台感到索然无趣，甚至会赶跑他们。</p>
                   　
               <p>　　以视感良好的陈列来留住顾客的心，这是柜台销售的第一步工作。虽然很多企业都有自己的设计人员去进行店铺和专柜的陈列设计，但人为柜台的核心人物，营业员掌握相关的陈列知识也是非常必要的。</p>
           </div>
       </div>
        <div class="row m mb-30 mt-30">
            <div class="col-md-3"> <img src="__PUBLIC__static/index/images/20170818114543.png" class="img-responsive " alt=""/></div>
            <div class="col-md-9 text-left">

                <p class="h4 text-center">五大知识技巧</p>
                <p>随着社会的发展商铺的装修也是越来越多元化，很多商家都会用不同的方式来装修商铺，把商铺打造的很漂亮很吸引人，其实商铺的装修只要合理的装饰设计也能寸托商品的价值，商铺的装修就是门面也是对商品的价值做出了体现，所以大家在装修时都希望能够把商铺装修的很漂亮，下面小编就跟大家分享一下关于商铺装修的一些知识技巧。</p>
                <p class="h4 text-center">店内颜色</p>
                <p>装修颜色的个性化会让你更加的区别于别的店面，让你更加的突出和引人注目。如果产品的主色调被合理的应用在店面的话，这种设计将更加的实用，也能充分体现产品内在的品质和文化，让消费者在店面中很容易体会到产品的精髓。恰当的使用好产品可以让装修事半功倍，而使用错了产品会让人眼花头痛，让人无法接受，而把不应该配在一起的颜色配在一起，甚至会影响客户的视觉，导致心烦意乱直至放弃购买</p>
                <p class="h4 text-center">分类格局</p>
                <p>装修好了是为了让更多客户对购物的环境满意，而格局是重点之重，好的格局，会让人舒服，让人感觉与产品的距离更近，而产品分类区别也将是格局中的重点，展示产品的地方要更好的满足客户的视觉，展示音响的地方要更好的满足客户的听觉，而这些分类的区别格局的设置，让人有乐在其中的感觉更加的投入，以促进购买力，除此之外，柜子，架子，展示台，视听台的位置和布局和逛起来的舒适程度也将影响客户心理的微小变化。</p>
                <p class="h4 text-center">展示柜与灯具</p>
                <p>看上去很好看的展示柜可以宣示产品，而底部却无法装一些配件或是产品;看上去很好看的灯箱，灯坏了，却无法更换;采用更多射灯的吊顶，而在使用的时候此亮彼暗，设计展示柜和选择灯具时要多注意产品在长期使用过程中的实用性。</p>
                <p class="h4 text-center">广告位置</p>
                <p>所有的颜色和格局定下来之后，别忘记留一点位置给你的产品，可以在方便的无法展示产品的位置上留给你下你的广告位，这样，产品整体形象将更加的全面。展示厅或是公司最明显的正中间的部位，最好是有公司的形象或是产品的大形象LOGO，这样才可以更加的突出。</p>
                <p class="h4 text-center">店面与通道</p>
                <p>具有开放感的门面容易吸引顾客,使用玻璃门，玻璃窗提高透视性，店面里面宜宽不宜窄，店内第一主通道是欢迎来店客户的重要通道，让顾客进入第一主通道，就能明确了解本卖场的特长。为此，第一主通道必须呈现出细致差别化。</p>
            </div>
        </div>
        <div class="row m mb-30 mt-30">
            <div class="col-md-3"> <img src="__PUBLIC__static/index/images/20170818114817.png" class="img-responsive " alt=""/></div>
            <div class="col-md-9 text-left">
                <p class="h4 text-center">  陈列，吸引顾客的第一道风景</p>
                <p>   　在人际交往中，第一次形成印象对人的认知往往具有很大的影响力。第一印象不管正确与否，总是最鲜明、最牢固的，左右着对对方的评价影响着以后的交往。同样道理，一个柜台给予顾客的第一印象也能对顾客产生深远的影响，它决定了顾客是否会采取购买行为。

                    　　一个人给他人第一印象的主要因素一般是他的衣着打扮。而一个柜台给顾客的第一印象的主要因素就是柜台的陈列。心理学家认为：顾客在购买活动中，最容易受暗示因素影响。其中，以购物现场环境的暗示影响最大。北京的一个心理学研究机构曾对北京一些主要商场购买服装的顾客进行了一次问卷调查，结果显示，柜台的陈列能对顾客的购买行为产生一定的影响，有61.7%顾客认为购买某种产品是因为该柜台的陈列给他们留下深刻印象;有81%的顾客认为是陈列引起了人们的购物兴趣;而有29.3%的顾客则认为陈列促使他们立即采取了购买的行动。

                    　　由此可见，陈列是吸引顾客在柜台前驻留的重要因素之一，也是营业员开展销售工作最基本的条件。一个精彩的、整洁的柜台陈列能够制造出一种强烈的震撼力；而一个平庸的、杂乱无章的陈列则会使顾客对柜台感到索然无趣，甚至会赶跑他们。
                    　
                    　　以视感良好的陈列来留住顾客的心，这是柜台销售的第一步工作。虽然很多企业都有自己的设计人员去进行店铺和专柜的陈列设计，但人为柜台的核心人物，营业员掌握相关的陈列知识也是非常必要的。</p>
                <p class="h4 text-center">     巧手装扮你的柜台</p>
               <ul>
                   <li>
                       柜台的陈列并不是简单地把商品堆放在一起，它必须能表现出艺术感和感染力，散发出个性魅力。营业员在进行柜台陈列时，必须要合理地规划，精心地布置，这样才能使你的柜台形象与众不同，迅速抓住顾客的心。
                   </li>
                   <li>
                       1、陈列的基本形式
                   </li>
                   <li>
                       　一般来说，柜台的陈列有两种类型：一种是商品的陈列，即将出售的商品摆放或悬挂于货架，以充分展示商品的外形、特色的展示方式。该方式所展示的商品大多可供顾客自由触摸、选购。另一种是展示品的陈列，即以商品实物为主体，将商品放置于橱窗、陈列台，配合各种道具、灯光照明、背景装饰，艺术地展示商品的形式。该方式所展示的商品较少用于现场交易，其功能主要是起到烘托柜台气氛，诱发顾客购买动机的作用。
                   </li>
                   <li>
                       　2、样品陈列的基本方法
                   </li>
                   <li>
                       一个柜台所销售的商品数量成百上千，要让顾客在短时间内对你的柜台产品有一个鲜明的认识，样品陈列自然就成为了必不可少的手段。由于样品色彩搭配协调。一般来说，样品的陈列有以下三种方法：（图）
                   </li>

                   <li>（1） 联想陈列法 </li>

                   <li>　所谓联想陈列法就是从产品的特性，包括商品名称、性能、产地、原料、用途、使用对象、季节等出发，联想产品与周围物品的内在联系，定出一个主题，最后根据这一主题来布置背景的方法。比如陈列茶具的橱窗，可以联想到古朴典雅的环境，还有品质优良的茶叶。因此在陈列时可以以“古典”作为陈列的主调，用古朴的木材、旧式的收音机等作为辅助品，再配上颜色鲜丽的茶叶，这样就能把茶具的特性和环境完美的结合起来。</li>
                   <li>
                   　　联想陈列法有两个优点，第一是能使产品更加鲜明突出，富有艺术感染力；第二是它能使顾客对产品的成本功能、适用场合等有一个感性的认识，从而激发顾客的兴趣，反潜在的购买力变为现实的购买力。 </li>
                   <li> （2） 醒目陈列法 </li>

                   　 <li> 　醒目陈列法就是把你表柜台经营特点、重点、促销或是滞销的商品进行陈列的方法。通过选取一些有你表性的产品，通过以主代次、以畅销带滞销的方式进行陈列，使得样品的陈列有强有弱、有主有次消费者在先对重点产品注意后，附带也会关注到次要的产品，从而达到良好的促销效果。</li>

                   <li>   （3） 相关陈列法</li>
                   <li>
                   　　相关陈列是指将种类不同但效用方面相互补充的产品陈列在一起的方法。这些放在一起陈列的产品的使用价值必须是相同的或具有相关性。比如卖鞋的柜台，在橱窗陈列皮鞋的同时，可以同进陈列出鞋垫、鞋带、鞋油、鞋刷，又比如把牙膏与牙刷，照相机与胶卷放在一起。

                   　　这种陈列方法可以帮助顾客对商品的使用和特点有全方位的认识，诱发其对相关陈列品的消费冲动，从而提高多种商品的销售量。</li>

               </ul>
            </div>
        </div>
    </div>
</div>
<style>
    /*新闻咨询*/
    #bs-example-navbar-collapse-1>ul>li:nth-child(2)>a{
        color: #ff5200;

    }


</style>
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

