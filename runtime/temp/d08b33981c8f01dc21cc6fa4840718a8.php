<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\web-php-5.6\bjtp5/application/index\view\personal\clent_basics.html";i:1510103679;s:68:"E:\web-php-5.6\bjtp5/application/index\view\public\style_header.html";i:1510103679;}*/ ?>
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
	.a_s {
		width: 20px;
		height: 20px;
		border: 1px solid #00B83F;
		color: #00B83F;
		padding: 2px;
	}
	.bg-b {
		background: #00B83F;
	}
	.text-default {
		color: #ffffff;
		padding-right: 3px;
		padding-left: 3px;
	}
	.b_a {
		border: 1px solid #ff5200;
		color: #ff5200;
		width: 85px;
		float: left;
		padding-bottom: 5px;
		padding-top: 5px;
		text-align: center;
	}
	.b_gorage {
		background: #ff5200;
		color: #ffffff;
		padding-left: 2%;
		padding-right: 2%;
	}
	.b-sefr {
		background: #ffffff;
		padding: 20px;
		margin-left: -10px;
		color: #000000;
	}
	.h_s img {
		height: 200px;
	}
	.h_s span {
		position: absolute;
		right: 20px;
		bottom: 20px;
		color: #ffffff;
		font-size: 26px;
	}

</style>
<!--/*标题*/-->
<div class="The-test-panel-head"><span class="pl-10">基本信息</span></div>
<input type="hidden" id="worker_id" value="">
<div class="The-test-panel-body pb-0" style="min-height:1000px;">
	<div class="row pr-20 b-se b-se_l  b-sefr" >
		<div class="col-sm-8 col-xs-8">
				<div class="" style="line-height:40px" >
					<div class="row">
						<div class="col-xs-6 col-sm-3">用户名:</div>
						<div class="col-xs-6 col-sm-6"><?php echo $list['username']; ?></div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-3">真实姓名:</div>
						<div class="col-xs-6 col-sm-6">
						<?php if($list['real_name']==''):?>
						-
						<?php else:?>
						<?php echo $list['real_name']; endif;?>
						
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-3">注册类型:</div>
						<div class="col-xs-6 col-sm-6">
						客户
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-3">所在地:</div>
						<div class="col-xs-6 col-sm-6">
						<?php if($list['province']==''):?>
						-
						<?php else:?>
						<?php echo $list['province']; endif;?>
						
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-3">详细地址:</div>
						<div class="col-xs-6 col-sm-6">
						<?php if($list['city']==''):?>
						-
						<?php else:?>
						<?php echo $list['province']; ?>-<?php echo $list['city']; ?>-<?php echo $list['town']; ?>-<?php echo $list['location']; endif;?>
					
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-3">手机号:</div>
						<div class="col-xs-6 col-sm-6">
						<?php if($list['phone']==''):?>
						-
						<?php else:?>
						<?php echo $list['phone']; endif;?>
						</div>
					</div>
					
				
				<div class="row">
					<div class="col-xs-12">
						<button class="btn btn-orange border-radius" id="xiugai">编辑</button>
					</div>
				</div>
			</div>
			</div>
		<div class="col-md-4 text-center col-xs-4 pl-20">
                <a href="javascript:;">
                     <img src="__DsQINiu__<?php echo $list['img']; ?>" class="img-circle"  width='200' height='200' onerror="this.src='__PUBLIC__static/index/images/zhenxiang.png'"/> 
                </a><br> <a href="__PUBLIC__mase_headportrait" class="">修改头像</a>
            </div>
	</div>
	<form id="demoa" name="demoa" id="demoa" method="post" action="__PUBLIC__ajax_client_modify" >
		<div class="b-se hidden b-sefr" style="line-height: 45px">
			<div class="row">
				<div class="col-xs-6 col-sm-2"><span style="color:red">*</span>用户名:</div>
				<div class="col-xs-6 col-sm-4">
					<input type="text" id="contac" class="form-control" name="uname" value="<?php echo $list['username']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-2"><span style="color:red">*</span>真实姓名:</div>
				<div class="col-xs-6 col-sm-4"><input type="text" id="there_is_a_pre_survey" class="form-control" name="ranme" value="<?php echo $list['real_name']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-2"><span style="color:red">*</span>服务地区:</div>
				<div class="col-xs-6 col-sm-8">
					<div class="row">
						<div data-toggle="distpicker">
							<div class="col-sm-4 mb-10 ">
								<select data-province="<?php echo $list['province']; ?>" class="form-control" name="province10" id="province10">
								</select>
							</div>
							<div class="col-sm-4 mb-10">
								<select data-city="<?php echo $list['city']; ?>" class="form-control" name="city10" id="city10"></select>
							</div>
							<div class="col-sm-4 mb-10 ">
								<select data-district="<?php echo $list['town']; ?>" class="form-control" name="district10" id="district10"></select>
							</div>
							<div class="col-sm-12 mb-10">
								<input type="text" name="location" class='form-control' id='location' placeholder="请输入您的详细信息~" value='<?php echo $list['location']; ?>'>
							</div>
						</div>
					</div>
				</div>
                </div>
                <div class="row">
					<div class="col-sm-2 col-xs-6 col-sm-offset-4">
                        <input type="submit" class="btn border-radius btn-success" value="确认">
					</div>
					<div class="col-sm-2 col-xs-6">
                        <input type="button" id="quxiao" class="btn border-radius btn-default" value="取消"></div></div>
		</div>
	</form>
</div>
	<script src="__CITY__/distpicker.data.js"></script>
<script src="__CITY__/distpicker.js"></script>
<script src="__CITY__/main.js"></script>
<script>
    $(".k").click(function() {
        $(this).addClass("activee");
        $(this).siblings("").removeClass("activee");
        if($(this).index()==1){
            $(".b-se_l").addClass("hidden")
            $(".b-se_k").removeClass("hidden");

            $(".messamge").addClass("hidden");
            $(".list_lh").addClass("hidden");


        }else  if($(this).index()==0){
            $(".b-se_k").addClass("hidden")
            $(".b-se_l").removeClass("hidden");

            $(".messamge").removeClass("hidden");
            $(".list_lh").removeClass("hidden");
        
        }
    });
    $("#xiugai").click(function () {
        $(".b-se").eq(0).addClass("hidden");
        $(".b-se").eq(1).removeClass("hidden");

    });
    $("#quxiao").click(function () {
        $(".b-se").eq(1).addClass("hidden");
        $(".b-se").eq(0).removeClass("hidden");

    });
    $(".b_a img").css("width", "20px");
    $(document).ready(function() {
        $('#demoa').ajaxForm({
            success: complete, // 这是提交后的方法
            dataType: 'json',
            beforeSubmit:function () {
                var op={icon:2,time:1500,shade: 0.1,shade:0};
                if( '' == $.trim($('#contac').val())){
                    parent.layer.msg('请填写用户名',op, function(index){
                        layer.close(index);
                    });
                    return false;
                }
				if( '' == $.trim($('#there_is_a_pre_survey').val())){
                    parent.layer.msg('请填写真实姓名',op, function(index){
                        layer.close(index);
                    });
                    return false;
                }
				if( '' == $.trim($('#province10').val())){
                    parent.layer.msg('请填写所在地区省',op, function(index){
						layer.close(index);
					});
					return false;
				}
				if( '' == $.trim($('#city10').val())){
                    parent.layer.msg('请填写所在地区市',op, function(index){
						layer.close(index);
					});
					return false;
				}
				if( '' == $.trim($('#district10').val())){
                    parent.layer.msg('请填写所在地区区',op, function(index){
						layer.close(index);
					});
					return false;
				}
				if( '' == $.trim($('#location').val())){
                    parent.layer.msg('请填写详细地址·',op, function(index){
						layer.close(index);
					});
					return false;
				}
            }
        });
        function complete(data){
			if(data.code==200){
				 parent.layer.msg(data.msg, {icon: 6,time:1500}, function(index){
                    $(".b-se").eq(1).addClass("hidden");
					$(".b-se").eq(0).removeClass("hidden");
                    window.location.reload(true);
                });
            }else{
               parent.layer.msg(data.msg, {icon: 5,time:1500});
                return false;   
            }


        }
    });
</script>