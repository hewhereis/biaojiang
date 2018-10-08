<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\web-php-5.6\bjtp5/application/index\view\personal\ds_client_home.html";i:1510103679;s:68:"E:\web-php-5.6\bjtp5/application/index\view\public\style_header.html";i:1510103679;}*/ ?>
<head>
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
        .ak{
            padding: 10px;
            box-sizing: border-box;
            height: 250px;
        }
        .ak>div{
           
            position: relative;
            
        }
        .ak_s{
            position: absolute;
            left: 0;
            bottom: 0;
            color: #ffffff;
            background: rgba(0,0,0,.3);
            transition: bottom 1s;
            width: 100%;
            height: 100%;
            z-index: 10;
        }
     .als{
        height: 100%;
        width: 100%;
     }
        .afa{
            min-height: 40%;
            margin-left: 35%;
			margin-right: 50%;
			margin-top: 21%;
        }
		.asv span{
			display: block;
		}

			@media (max-width: 776px) {
				.asv{
					display: block;
				}
			}
</style>
</head>
<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>
<div style="width:100%;height: auto;position: absolute;">
	<div class="panel mb-0 panel-default">
	<div class="panel-heading pt-0 text-orange ">
		<img src="__PUBLIC__static/index/images/s1.png" class="img-responsive pull-left " alt=""/>
		<span class="text-orange" style="display: inline-block;margin-top: 5px">最新订单</span>
	</div>
	<div class="panel-body" style="border: none">
		<!--最新订单表格-->
		<div class="media ">
			<?php if($list==''):?>
				<p style="text-align:center">您暂时还没有最近订单哦</p>
			<?php else:?>
				<!-- 店铺图片-->
			<span class="text-orange">订单号:<?php echo $list['order_number']; ?></span>
			<div class="media-left ">
				<a href="__PUBLIC__order/status/<?php echo $list['id']; ?>" class="w-h-img" target="_blank">
				<?php if($list['service_type_id']==1):?>
				<img src="__DsQINiu__<?php echo $list['ins_img']; ?>" class="img-circle" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>
				<?php elseif($list['service_type_id']==2):?>
				<img src="__DsQINiu__<?php echo $list['m_img']; ?>" class="img-circle" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>
				<?php elseif($list['service_type_id']==3):?>
				品质监理图片
				<?php elseif($list['service_type_id']==4):?>
				<img src="__DsQINiu__<?php echo $list['sur_img']; ?>" class="img-circle" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>
				<?php elseif($list['service_type_id']==5):?>
				<img src="__DsQINiu__<?php echo $list['g_photo_store']; ?>" class="img-circle" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>
				<?php elseif($list['service_type_id']==6):?>
				<img src="__DsQINiu__<?php echo $list['coam_img']; ?>" class="img-circle" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>
				<?php endif; ?>
				</a>
			</div>
			<?php if($list['service_type_id']==1):?>
			<div class="media-body asv">
					<span>服务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目&nbsp;: &nbsp;&nbsp;<?php echo $list['sname']; ?></span>

					<span>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址&nbsp;：&nbsp;&nbsp;<?php echo $list['full_location']; ?> <?php echo $list['location_ext']; ?></span>
					<?php if($list['start_time']==0){ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;无 </span>
					<?php }else{ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;<?php echo date("Y-m-d",$list['start_time'])?> </span>
					<?php } ?>
				<span>订单&nbsp;&nbsp;&nbsp;预估价&nbsp;:&nbsp;&nbsp;￥<?php echo $list['ins_budget']; ?></span>
				<?php if($list['b_budget']==null):else: endif;?>
			</div>
			<?php elseif($list['service_type_id']==2):?>
			<div class="media-body asv">
					<span>服务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目&nbsp;: &nbsp;&nbsp;<?php echo $list['sname']; ?></span>

					<span>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址&nbsp;：&nbsp;&nbsp;<?php echo $list['full_location']; ?> <?php echo $list['location_ext']; ?></span>
					<?php if($list['start_time']==0){ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;无 </span>
					<?php }else{ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;<?php echo date("Y-m-d",$list['start_time'])?> </span>
					<?php } ?>
				<span>订单&nbsp;&nbsp;&nbsp;预估价&nbsp;:&nbsp;&nbsp;￥<?php echo $list['b_budget']; ?></span>
				<?php if($list['b_budget']==null):else: endif;?>
			</div>
			
			<?php elseif($list['service_type_id']==4):?>
			<div class="media-body asv">
					<span>服务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目&nbsp;: &nbsp;&nbsp;<?php echo $list['sname']; ?></span>

					<span>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址&nbsp;：&nbsp;&nbsp;<?php echo $list['full_location']; ?> <?php echo $list['location_ext']; ?></span>
					<?php if($list['start_time']==0){ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;无 </span>
					<?php }else{ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;<?php echo date("Y-m-d",$list['start_time'])?> </span>
					<?php } if($list['b_budget']==null):else: endif;?>
			</div>

			<?php elseif($list['service_type_id']==5):?>
			<div class="media-body asv">
					<span>服务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目&nbsp;: &nbsp;&nbsp;<?php echo $list['sname']; ?></span>

					<span>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址&nbsp;：&nbsp;&nbsp;<?php echo $list['full_location']; ?> <?php echo $list['location_ext']; ?></span>
					<?php if($list['start_time']==0){ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;无 </span>
					<?php }else{ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;<?php echo date("Y-m-d",$list['start_time'])?> </span>
					<?php } ?>
				<span>订单&nbsp;&nbsp;&nbsp;预估价&nbsp;:&nbsp;&nbsp;￥<?php echo $list['g_budget']; ?></span>
				<?php if($list['b_budget']==null):else: endif;?>
			</div>

			<?php elseif($list['service_type_id']==6):?>
			<div class="media-body asv">
					<span>服务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目&nbsp;: &nbsp;&nbsp;<?php echo $list['sname']; ?></span>

					<span>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址&nbsp;：&nbsp;&nbsp;<?php echo $list['full_location']; ?> <?php echo $list['location_ext']; ?></span>
					<?php if($list['start_time']==0){ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;无 </span>
					<?php }else{ ?>
					<span>预约施工时间&nbsp;:&nbsp;&nbsp;<?php echo date("Y-m-d",$list['start_time'])?> </span>
					<?php } ?>
				<span>订单&nbsp;&nbsp;&nbsp;预估价&nbsp;:&nbsp;&nbsp;￥<?php echo $list['coam_budget']; ?></span>
				<?php if($list['b_budget']==null):else: endif;?>
			</div>
			<?php endif;endif;?>
			
		</div>
	</div>
	<div class="panel-heading text-orange " style="background: #fff;border-top: 1px solid #dddddd">
		<img src="__PUBLIC__static/index/images/s2.png" class="img-responsive pull-left " alt=""/>
		<span class="text-orange" style="display: inline-block;margin-top: 5px">快捷下单</span>
	</div>
</div>
<!-- 最新订单店铺-->
<div class="row ml-0 mr-0 mt-0 shop" style="border: 1px solid #dddddd;border-top: none; ">
	<a class="col-sm-4  col-xs-12 ak" href="__PUBLIC__orders/index/sid/2/cid/3" target="_blank">
	
		<div>
			<img src="__PUBLIC__static/index/images/ds_005.jpg" class="img-responsive als" alt=""/>
			<div class="ak_s">
				<img src="__PUBLIC__static/index/images/ds_b2.png" class="img-responsive afa" alt=""/>
			</div>
		</div>
	
	</a>
	<a href="__PUBLIC__publish" target="_blank" class="col-sm-4  col-xs-12 ak">
	
		<div>
			<img src="__PUBLIC__static/index/images/ds_001.jpg" class="img-responsive als" alt=""/>
			<div class="ak_s">
				<img src="__PUBLIC__static/index/images/ds_b6.png" class="img-responsive afa" alt=""/>
			</div>
		</div>
	
	</a>
	<a href="__PUBLIC__survey" class="col-sm-4  col-xs-12 ak" target="_blank">
	
		<div>
			<img src="__PUBLIC__static/index/images/ds_002.jpg" class="img-responsive als " alt=""/>
			<div class="ak_s">
				<img src="__PUBLIC__static/index/images/ds_b5.png" class="img-responsive afa">
			</div>
		</div>
	
	</a>
	<a href="__PUBLIC__replacing_the_lamp" target="_blank" class="col-sm-4  col-xs-12 ak">
	
		<div>
			<img src="__PUBLIC__static/index/images/ds_004.jpg" class="img-responsive als" alt=""/>
			<div class="ak_s">
				<img src="__PUBLIC__static/index/images/ds_b4.png" class="img-responsive afa" alt=""/>
			</div>
		
	</div>
	</a>
	<a href="__PUBLIC__coaming_construct_dismantles" target="_blank" class="col-sm-4  col-xs-12 ak">
	
		<div>
			<img src="__PUBLIC__static/index/images/ds_003.jpg" class="img-responsive als" alt=""/>
			<div class="ak_s">
				<img src="__PUBLIC__static/index/images/ds_b1.png" class="img-responsive afa" alt=""/>
			</div>
		</div>
	
	</a>
	<a href="" target="_blank" class="col-sm-4 col-xs-12 ak">
	
		<div>
			<img src="__PUBLIC__static/index/images/ds_006.jpg" class="img-responsive als" alt=""/>
			<div class="ak_s">
				<img src="__PUBLIC__static/index/images/ds_b3.png" class="img-responsive afa" alt=""/>
			</div>
		</div>
	
	</a>
</div>
</div>
