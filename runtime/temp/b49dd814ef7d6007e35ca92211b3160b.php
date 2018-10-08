<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"E:\web-php-5.6\bjtp5/application/index\view\index\index.html";i:1510103679;s:67:"E:\web-php-5.6\bjtp5/application/index\view\public\headerindex.html";i:1510103679;s:67:"E:\web-php-5.6\bjtp5/application/index\view\public\footerindex.html";i:1510103679;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>
		</title>
		<link rel="icon" type="image/png" href="__PUBLIC__static/index/images/favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
										<div class='col-xs-3 col-sm-1 col-sm-offset-3  text-left'>
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
											<a href='' id="is_weixin" class='text-sm text-black text-orange'>
												<span><?php echo $_SESSION['think']['ds_username'] ?></span>
												
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
					<div class='header-column'>
						<div class="container">
							<!--logo ++ column start-->
							<div class="row" id='logo' style='line-height:60px;'>
								<div class="col-xs-3 header-logo">
									<a href="__PUBLIC__index" class=" ">
										<img src="__PUBLIC__static/index/images/logolong.png" alt="" class="images-responsive logo">

									</a>
								</div>
								<div class="col-xs-9" id='logocenter' >
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
					
	$(window).ready(function(){



		var is_weixin=$("#is_weixin span").text();
					if(is_weixin.length>5){
                        var ma=is_weixin.slice("0","5");
                        $("#is_weixin span").text(ma)
					}

    var xiala=function(select,select2,select3){
           var h = $(jojn(select));
     var show=function(){
      $(jojn(select2)).show();
      $(jojn(select3)).children("i").removeClass('fa-sort-asc');
      $(jojn(select3)).addClass('active');
       $(jojn(select3)).children("i").addClass(' fa-sort-desc');
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
     	  $(jojn(select3)).children("i").addClass(' fa-sort-asc');
     	  $(jojn(select3)).children("i").removeClass(' fa-sort-desc');
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

				</script>
<style>
#logo{
	padding:10px;
}
	@media screen and (max-width:414px) {
		.main{
			margin-top:93px!important;
		}
		.header-logo{
			width:20%;
		}
		#logocenter{
			width:80%;
		}
		#logo{
			padding:0;
		}
	}
</style>
<div class='main' style=''>
	<!--banner start-->
	<div id="carousel-example-generic" class="carousel slide mt" data-ride="carousel">
		<!-- Indicators -->
	
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">	    
		<?php foreach($ad as $vo) { if($vo['id']==$m) {?>
			<div class="item active">	
				<img src="__DsQINiu__<?php echo $vo['images']; ?>" alt="..."  >	
			</div>
		<?php }else{ ?>
			<div class="item">	
				<img src="__DsQINiu__<?php echo $vo['images']; ?>" alt="..."/>	
			</div>
			<?php } } ?>
			<!--...-->
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!--banner end-->

	<!--number start-->
	<div class='number'>
		<div class='advertisement'></div>
		<div class='container'>
			<div class='row'>
				<div class='col-md-6 col-md-offset-3 col-xs-12'>
					<div class='row '>
						<div class='col-xs-4 text-sm  text-center ' style='line-height:25px;height:25px'>
							<span class='text-white'>
								<span >拥有</span>
							<span>891</span>
							<span>名师傅</span>
							<span>
						</div>
						<div class='col-xs-4 text-sm text-center ' style='line-height:25px;height:25px'>
							<span class='text-white '>
								<span >服务</span>
							<span>486</span>
							<span>名客户</span>
							<span>
						</div>
						<div class='col-xs-4 text-sm text-center' style='line-height:25px;height:25px'>
							<span class='text-white '>
								<span >覆盖</span>
							<span>50+</span>
							<span>家城市</span>
							<span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--number end-->
	
	<!--service start-->
	<div class='service mb-15 pt-20 pb-20'>
		<h3 class='heading text-center text-orange service-name mb-20'>
			<span style='color:#333;font-weight:700'>&nbsp;服务类型</span>
			<br>
			<p class='text-pd text-orange' style='color:#666;margin-top:5px;margin-bottom:0px;'>Service Type</p>
		</h3>
		<br>
		<div class='container buttonmargin' id='servicetype'>
			<div class='swiper-container service1 phone-height' id='serviceone'>
				<div class='swiper-wrapper'>
					<?php $count=0;?>  
					<div class='row swiper-slide'>
					<?php foreach ($service as $se){ ?>		
						<div class='col-xs-3 clickshow'>
							<div class='service-img'>
								<img src='__DsQINiu__<?php echo $se["bimg"]; ?>' id = "service" class='m-auto img-circle img-responsive servicees' num="<?php echo $se['id']; ?>">
								<p style='width:64px;height: 40px;position: absolute;top: 40%;left: 45%; margin-left: -20px;display: none;z-index:9999;font-size:32px;color:#fff'><span style='width:64px;'><?php echo $se["name"]; ?></span></p>
								<div class='blcak'></div>
								<img src='__DsQINiu__<?php echo $se["aimg"]; ?>' class='m-auto typename img-circle img-responsive'>
							</div>
						</div>
						<?php $count++;if($count%4==0&&$count!=$num){?>			
					</div>
					<?php if($count%4==0){?>						
					<div class='row swiper-slide ml-20'>
						<?php } } } ?><!-- endforeach -->
					</div>
				</div>
			</div>
			<div class='button-right buttonleftright'></div>
			<div class='button-left buttonleftright'></div>
		</div>
		

		<!--服务类型默认显示开始-->
		<div class='container' id='servicechi'>
			<div class='swiper-container service3' id='servicethree'>
				<div class='row  swiper-wrapper screen' id="position">

				</div>
			</div>
			<div class='button-right-3 buttonleftright'></div>
			<div class='button-left-3 buttonleftright' ></div> 
		</div>
		
		<!--默认显示end-->
	</div>
	<!--service end-->
	
	<!--synthesize start-->
	<div class='synthesize pb-20'>
		<div class='container'>
			<div class='row'>
				<div class='col-md-6' id='Master'>
					<div class='row'>
						<h3 class='heading text-orange service-name mb-15'>
							<span style='color:#333;font-weight:700'>优秀师傅</span>
							<br>
							<p class='text-pd text-orange' style='color:#666;margin-top:5px;margin-bottom:0px'>Excellent Master</p>
						</h3>
					</div>
					<div class='row mb-20' style="font-size: 12px">
								<?php foreach($list as $lists){ ?>
						<div class='col-xs-4'>
							<div class='row' style="padding:8px 0">
								<div class='col-xs-12 p-0 text-center'>
									<img src="__DsQINiu__<?php echo $lists['img']; ?>"  style="margin:0px auto" class='img-circle img-responsive' width="100" height="100"/>
								</div>
								
								<div class='col-xs-12'>
									<div class='row' style="padding:2px 0px">
										<div class='col-sm-5 text-center pr-0 col-xs-7 pl-0' >
											<span>师傅姓名：</span>
										</div>
										<div class='col-sm-5 col-xs-5  p-0'>
											<span ><?php echo $lists['u_name']; ?></span>
										</div>

									</div>
								</div>
								<div class='col-xs-12'>
									<div class='row' style="padding:2px 0px">
										<div class='col-sm-5 text-center pr-0 col-xs-7 pl-0' >
											<span>服务类型：</span>
										</div>
										<div class='col-sm-5 col-xs-5  p-0'>

											<span ><?php echo $lists['service']; ?></span>
										</div>

									</div>
								</div>
								<div class='col-xs-12'>
									<div class='row' style="padding:2px 0px">
										<div class='col-sm-5 text-center pr-0 col-xs-7 pl-0'>
											<span>累计接单：</span>
										</div>
										<div class='col-sm-5 col-xs-5  p-0' >

											<span ><?php echo $lists['order']; ?></span>
										</div>
									</div>
								</div>
								<div class='col-xs-12'>
									<div class='row' style="padding:2px 0px">
										<div class='col-sm-5 text-center col-xs-7 pr-0 pl-0'>
											<span>服务介绍：</span>
										</div>
										<div class='col-sm-5 col-xs-5 p-0'>
											<div style='height:20px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;'>
											<span class="fuwu"><?php echo $lists['introduce']; ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>

					</div>
				</div>
				<div class='col-md-6' id='news'>
					<div class='row'>
						<h3 class='heading text-orange service-name mb-20'>
							<span style='color:#333;font-weight:700'>新闻资讯</span>
							
							<p class='text-pd text-orange' style='color:#666;margin:0px'>News Information</p>
						</h3>
					</div>
					
					<div class='row'>
						<div class='col-xs-12'>
							<div class="swiper-container">
							
								<ul class="swiper-wrapper" >
								    <li class="swiper-slide">
											<a href='__PUBLIC__show/<?php echo $news1[0]["cate_id"]; ?>/<?php echo $news1[0]["id"]; ?>'><img src='__DsQINiu__<?php echo $news1[0]["photo"]; ?>' style="width:580px;height:230px;" class='img-responsive'></a>
								    	<ul class="" style='padding-top:10px'>
								    	<?php foreach($news1 as $new1) { ?>
						    		<li class="p-5" style='width:100%'>
								    			<i class="fa fa-play text-orange"></i>
								    			<a href='__PUBLIC__show/<?php echo $new1['cate_id']; ?>/<?php echo $new1['id']; ?>' style='color:#333;display: inline-block;width: 60%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;vertical-align: bottom;'><?php echo $new1['title']; ?></a>
								    			<span class='pull-right' style='font-size:12px;color:#999'><?php echo date('Y-m-d',$new1['create_time']); ?></<span>
								    		</li>
								    		<?php } ?>								    			
										</ul>	 
								    </li>
								</ul>				
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--synthesize end-->
	
	 <!--Service Process start -->
	 <div class='process pb-20'>
	 	<div class='container'>
	 		<div class='row'>
		 		<h3 class='heading text-center text-orange service-name mb-40'>
					<span style='color:#333;font-weight:700'>服务流程</span>
					<br>
					<p class='text-pd text-orange' style='color:#666;margin-top:5px'>Service Process</p>
				</h3>
			</div>
			<div class='row list'>
				<div class='col-xs-2 col-xs-offset-1'>
					<img src='__PUBLIC__static/index/images/process1.png' class='m-auto img-responsive'>
				</div>
				<div class='col-xs-2'>
					<img src='__PUBLIC__static/index/images/process2.png' class='m-auto img-responsive'>
				</div>
				<div class='col-xs-2'>
				<img src='__PUBLIC__static/index/images/process3.png' class='m-auto img-responsive'>
				</div>
				<div class='col-xs-2'>
					<img src='__PUBLIC__static/index/images/process4.png' class='m-auto img-responsive'>
				</div>
				<div class='col-xs-2'>
					<img src='__PUBLIC__static/index/images/process5.png' class='m-auto img-responsive'>
				</div>
				
				
			</div>
	 	</div>
	 </div>
	 </div>
	 <!--Service Process end-->	
						<!-- ===============================================
	============== Page Specific Scripts ===============
	================================================ -->
<script>
	var  masterinfoheight= $('.master-info').siblings('img').height();//获取图片的高度
	var  masterinfowidth= $('.master-info').siblings('img').width();//获取图片的高度
	$('.master-info').css({
		'height':masterinfoheight,
		'width':masterinfowidth,
		'border-raius':'50%'
	})
	jQuery(document).ready(function($) {
		var characterwidth = $('.gray').width();
		var characterml = ($('.gray').width())/(-2);
		 characterheight = $('.gray').height()*(0.25);
		$('.character').css({
		'height':characterheight,
		'width':characterwidth,
		'margin-left':characterml,
		'bottom':0,
		'line-height':characterheight+'px',
		})

		var  mySwiper1 = new Swiper('#serviceone', {
			//autoplay: 5000,//可选选项，自动滑动 	
				prevButton: '.button-left',
				nextButton: '.button-right'
			});							
		$('#servicetype .col-xs-3').click(function(){
			var parentindex=$(this).parent().index();
			var index=$(this).index();
			var index2=index+(parentindex*4)+2;
			var mySwiperar=[];
			$('.servicetype').eq(index+(parentindex*4)).removeClass('hide');
			mySwiperar[index2] = new Swiper('.servicetype .service'+index2, {
			//autoplay: 5000,//可选选项，自动滑动 	
				prevButton: '.button-left-'+index2,
				nextButton: '.button-right-'+index2
			});
			$('.servicetype').not($('.servicetype').eq(index+(parentindex*4))).addClass('hide');
		});

		$(window).resize(function(){
				var width=$(window).width();
				if(width<768){
				$(".font-awesome").css({
					'font-size':'80%'
				});
				$('.switchover').addClass('pull-right');
				}else{
					$(".font-awesome").css({
					'font-size':'100%'
				});
				$('.switchover').removeClass('pull-right');
				}
			})
		
	});
</script>
<!--/ Page Specific Scripts -->
<script>
	$(function(){
		//服务类型联动
			//默认没有点击
				$.ajax({
				url:'index/defa',
				data:{},
				dataType:'json',               
				type:'post',
				success:function(data){
					var html = "";
					var cate = data.cate;
					var id = data.id;
						for(var i in cate){							        			
						html+="<div class='swiper-slide col-xs-3 w-25'><a href='orders/index/sid/"+id+"/cid/"+cate[i].id+"' ><img src='__DsQINiu__"+cate[i].img+"' class='m-auto img-responsive'><div class='gray hidden-xs'></div><span class='character'>"+cate[i].name+"</span></a></div>";
					  }
					$('#position').html(html);
					var  mySwiper99 = new Swiper('#servicethree', {
					pagination: '.swiper-pagination',
					slidesPerView: 4,
					loop:false,
					paginationClickable: true,
				//autoplay: 5000,//可选选项，自动滑动 	
					prevButton: '.button-left-3',
					nextButton: '.button-right-3'
				});
			}
		});
		});
</script>
<script>
	var widthall=$(window).width();
	if(widthall>1024){
		$('#servicetype .service-img').hover(function() {
					$(this).children('img').eq(1).stop(true).slideUp();
					$(this).children('p').stop(true).fadeIn();
					$(this).css({'cursor':'pointer'});
				}, function() {
					$(this).children('p').stop(true).fadeOut();
					$(this).children('img').eq(1).slideDown();
				});
		characterheight = $('.gray').height();
		$('#servicechi .swiper-container .swiper-wrapper').on("mouseover mouseout",'.swiper-slide',function(event){  if(event.type == "mouseover"){  

			$(this).find('div').hide();
		}else if(event.type == "mouseout"){ 
		  //鼠标离开 
			$(this).find('div').show();
		}});
	}
	//点击服务类型							
	$('.clickshow').click(function(){
		var id= $(this).find('div').find('.servicees').attr('num');
		mySwiper9=new Object();
		$('#position').css({'transform':'translate3d(0px, 0px, 0px)'});
		$.ajax({
			url:'index/linkage',
			data: {id:id},
			dataType:'json',
			type:'post',
			success:function(data){
			var html = "";
			var cate = data.cate;
				for(var i in cate){							        			
					html+="<div class='swiper-slide col-xs-3 w-25'><a href='orders/index/sid/"+id+"/cid/"+cate[i].id+"' ><img src='__DsQINiu__"+cate[i].img+"' class='m-auto img-responsive'><div class='gray hidden-xs'></div><span class='character'>"+cate[i].name+"</span></a></div>";
				  }
				$('#position').html(html);
				var  mySwiper9 = new Swiper('#servicethree', {
				pagination: '.swiper-pagination',
				slidesPerView: 4,
				loop:false,
				paginationClickable: true,
			   //autoplay: 5000,//可选选项，自动滑动 	
				prevButton: '.button-left-3',
				nextButton: '.button-right-3'
			});
			}
		})
	})
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
	           				<div class='col-xs-12 col-md-4 b-r-1 b-l-1 pb-15'>
	           					<div class='row'>
	           						<div class='col-xs-10 col-xs-offset-1 pt-15'>
	           							<img src='__PUBLIC__static/index/images/phone.png' class='m-auto img-responsive'>
	           						</div>
	           					</div>
	           					
	           					<div class='row mt-5'>
	           						<div class='col-xs-10 col-xs-offset-1 p-0 pt-10'>
	           							<p class='text-md text-white text-center'>
	           								<span style='color:#999;font-size:12px'>地址：江苏省苏州市昆山市花安路169号中寰广场五楼</span>
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
  </script>
    </body>
</html>
