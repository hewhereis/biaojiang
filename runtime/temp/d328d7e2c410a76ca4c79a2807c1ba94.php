<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:73:"E:\web-php-5.6\bjtp5/application/index\view\orderlogic\order_logic_g.html";i:1505986379;s:68:"E:\web-php-5.6\bjtp5/application/index\view\public\style_header.html";i:1510103679;s:69:"E:\web-php-5.6\bjtp5/application/index\view\stype\service_type_1.html";i:1509175157;s:69:"E:\web-php-5.6\bjtp5/application/index\view\stype\install_repair.html";i:1510103679;s:61:"E:\web-php-5.6\bjtp5/application/index\view\stype\repair.html";i:1510103679;s:61:"E:\web-php-5.6\bjtp5/application/index\view\stype\survey.html";i:1510103679;s:64:"E:\web-php-5.6\bjtp5/application/index\view\stype\gjmrepair.html";i:1510103679;s:69:"E:\web-php-5.6\bjtp5/application/index\view\stype\coaming_repair.html";i:1510103679;}*/ ?>
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
<!-- 定义主题头部图片-->
<div class="order_manage_client">
    <div class="" id="navigatesLeft">
        <!--右边-->
        <div class="" id='navigatesRigth'>
            <table style="border: none" class="table table-bordered table-hover">
	<script id="list-template" type="text/html">
		{{# for(var i=0;i<d.length;i++){  }}
		<div class="panel panel-default">
			<div class="panel-heading  " style="z-index: 0">
				<div>

					<input type="checkbox" name="items" value="{{d[i].id}}" />
					<!--<span>{{d[i].create_time}}</span>-->
					<span>订单号:{{d[i].order_number}}</span>

					<a href="javascript:;"class="glyphicon glyphicon-trash "style="float: right;top:5px;" onclick="del_ser({{d[i].id}})" ></a>
				</div>
			</div>
			<div class="panel-body">
				<div class="media">
					<div class="media-left">

						<a  href="__PUBLIC__order/status/{{d[i].id}}"  target="_blank"  class="w-h-img">
							<p class="">
								师傅名称:{{# if(d[i].uname==null){ }}
								{{# }else{ }}
								{{d[i].uname}}
								{{# } }}
							</p>
							<br/>
							{{# if(d[i].service_type_id==1){ }}
							<img src="__DsQINiu__{{d[i].install_img}}" class="img-circle"  onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/> 
							{{# }if(d[i].service_type_id==2){ }}
							<img src="__DsQINiu__{{d[i].m_img}}" class="img-circle"  onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>   
							{{# }if(d[i].service_type_id==3){ }}
							品质监理图片(表待完善)
							{{# }if(d[i].service_type_id==4){ }}
							<img src="__DsQINiu__{{d[i].sur_img}}" class="img-circle"  onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>   
							{{# }if(d[i].service_type_id==5){ }}
							<img src="__DsQINiu__{{d[i].d_img_describe}}" class="img-circle"  onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>
							{{# }if(d[i].service_type_id==6){ }}
							<img src="__DsQINiu__{{d[i].coam_img}}" class="img-circle"  onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'"/>
							{{# }else{ }}
							{{# } }}
						</a>
					</div>
					<div class="media-body">
						<p><span>服务项目：</span>{{d[i].sname}}</p>
						<p><span>品牌：</span>
							{{# if(d[i].service_type_id==1){ }}
							{{d[i].i_brand}}
							{{# }if(d[i].service_type_id==2){ }}
							{{d[i].m_brand}}
							{{# }if(d[i].service_type_id==3){ }}
							品质监理品牌(表待完善)
							{{# }if(d[i].service_type_id==4){ }}
							{{d[i].sur_brand}}
							{{# }if(d[i].service_type_id==5){ }}
							{{d[i].d_brand}}
							{{# }if(d[i].service_type_id==6){ }}
							{{d[i].coam_brand}}
							{{# }else{ }}
							{{# } }}
						</p>
						<p><span>地址：</span>{{d[i].full_location}} {{d[i].location_ext}}</p>
						<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank" class="text-blue">查看订单状态>></a>
					</div>
					<div class="media-right text-center">
						{{# if(d[i].status==1){ }}
						<p>待定标</p>
						{{# }if(d[i].status==2){ }}
						<p>待付款</p>
						{{# }if(d[i].status==3){ }}
						<p>待完工</p>
						{{# }if(d[i].status==4){ }}
						<p>待验收</p>
						{{# }if(d[i].status==5){ }}
						<p>待评价</p>
						{{# }if(d[i].status==6){ }}
						<p>追加评价</p>
						{{# }if(d[i].status==7){ }}
						<p>交易完成</p>
						{{# }if(d[i].status==8){ }}
						<p>订单关闭</p>
						{{# } }}
						{{# if(d[i].service_type_id==1){ }}
						﻿<!--判断当前安装步骤为1时-->
{{# if(d[i].step_type==3){ }}
	{{# if(d[i].amount_total==null){ }}
		{{# }else{ }}
		￥{{d[i].amount_total}}
		{{# } }}
		<br/>
		{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}
		{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
			{{# if(d[i].ampunt_addition==null){ }}
			<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
			{{# }else{ }}
			{{# } }}
			
		{{# }else{ }}
		{{# } }}

		{{# }else{ }}
		{{# } }}
		{{# if(d[i].status==1){ }}
		<a href="__PUBLIC__install_message_pairing/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去选标</span>
		</a>
		{{# }if(d[i].status==2){ }}
		<a href="__PUBLIC__install_settlement/{{d[i].order_number}}/url/0" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去付款</span>
		</a>
		{{# }if(d[i].status==3){ }}
			{{# if(d[i].step_number==8){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# } }}
		{{# }if(d[i].status==4){ }}
		<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去验收</span>
		</a>
		{{# }if(d[i].status==5){ }}
		<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去评价</span>
		</a>
		{{# }if(d[i].status==6){ }}
		<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">追加评价</span>
		</a>	
	{{# } }}
<!--判断当前安装步骤为2时-->
{{# }if(d[i].step_type==4){ }}
		{{# if(d[i].amount_total==null){ }}
			{{# }else{ }}
			￥{{d[i].amount_total}}
			{{# } }}
			<br/>

			{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}

			{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
				{{# if(d[i].ampunt_addition==null){ }}
<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
				{{# }else{ }}
				{{# } }}
				
			{{# }else{ }}
			{{# } }}

			{{# }else{ }}
			{{# } }}
			{{# if(d[i].status==1){ }}
				{{# if(d[i].step_number==2){ }}
					<a href="__PUBLIC__master_filters/{{d[i].order_number}}/cid/choose_wid/sid/0" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">挑主任师傅</span>
					</a>
				{{# }if(d[i].step_number==3){ }}
					<a href="__PUBLIC__install_director_master/{{d[i].order_number}}/wid/3" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">咨询主任师傅</span>
					</a>
				{{# }if(d[i].step_number==4){ }}
					{{# if(d[i].d_num!=0){ }}
					<a href="__PUBLIC__common_master/{{d[i].order_number}}/wid/0" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">增加普通师傅</span>
					</a>
					{{# } }}
				{{# } }}

			{{# }if(d[i].status==2){ }}
			<a href="__PUBLIC__install_settlement/{{d[i].order_number}}/url/0" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去付款</span>
			</a>
			{{# }if(d[i].status==3){ }}
					{{# if(d[i].step_number==8){ }}
					<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
					</a>
				{{# } }}
			{{# }if(d[i].status==4){ }}
			<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去验收</span>
			</a>
			{{# }if(d[i].status==5){ }}
			<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去评价</span>
			</a>
			{{# }if(d[i].status==6){ }}
			<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">追加评价</span>
			</a>	
		{{# } }}
{{# } }}
						{{# }if(d[i].service_type_id==2){ }}
						﻿<!--判断当前维修步骤为1时-->
{{# if(d[i].step_type==1){ }}
	{{# if(d[i].amount_total==null){ }}
		{{# }else{ }}
		￥{{d[i].amount_total}}
		{{# } }}
		<br/>

		{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}

		{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
			{{# if(d[i].ampunt_addition==null){ }}
			<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
			{{# }else{ }}
			{{# } }}
			
		{{# }else{ }}
		{{# } }}

		{{# }else{ }}
		{{# } }}
		{{# if(d[i].status==1){ }}
		<a href="__PUBLIC__guestbook/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去选标</span>
		</a>
		{{# }if(d[i].status==2){ }}
		<a href="__PUBLIC__settlement/{{d[i].order_number}}/url/0" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去付款</span>
		</a>
		{{# }if(d[i].status==3){ }}
			{{# if(d[i].step_number==8){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# } }}
		{{# }if(d[i].status==4){ }}
		<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去验收</span>
		</a>
		{{# }if(d[i].status==5){ }}
		<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去评价</span>
		</a>
		{{# }if(d[i].status==6){ }}
		<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">追加评价</span>
		</a>	
	{{# } }}
<!--判断当前维修步骤为2时-->
{{# }if(d[i].step_type==2){ }}
		{{# if(d[i].amount_total==null){ }}
			{{# }else{ }}
			￥{{d[i].amount_total}}
			{{# } }}
			<br/>

			{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}

			{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
				{{# if(d[i].ampunt_addition==null){ }}
<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
				{{# }else{ }}
				{{# } }}
				
			{{# }else{ }}
			{{# } }}

			{{# }else{ }}
			{{# } }}
			{{# if(d[i].status==1){ }}
				{{# if(d[i].step_number==2){ }}
					<a href="__PUBLIC__master_filters/{{d[i].order_number}}/cid/choose/sid/0" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">挑主任师傅</span>
					</a>
				{{# }if(d[i].step_number==3){ }}
					<a href="__PUBLIC__director_master/{{d[i].order_number}}/wid/3" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">咨询主任师傅</span>
					</a>
				{{# }if(d[i].step_number==4){ }}
					{{# if(d[i].d_num!=0){ }}
					<a href="__PUBLIC__common_master/{{d[i].order_number}}/wid/0" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">增加普通师傅</span>
					</a>
					{{# } }}
				{{# } }}

			{{# }if(d[i].status==2){ }}
			<a href="__PUBLIC__settlement/{{d[i].order_number}}/url/0" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去付款</span>
			</a>
			{{# }if(d[i].status==3){ }}
				{{# if(d[i].step_number==8){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# } }}
			{{# }if(d[i].status==4){ }}
			<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去验收</span>
			</a>
			{{# }if(d[i].status==5){ }}
			<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去评价</span>
			</a>
			{{# }if(d[i].status==6){ }}
			<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">追加评价</span>
			</a>	
		{{# } }}
{{# } }}
						{{# }if(d[i].service_type_id==3){ }}
						3
						{{# }if(d[i].service_type_id==4){ }}
						﻿<!--判断当前勘测步骤为5时-->
	{{# if(d[i].amount_total==null){ }}
		{{# }else{ }}
		￥{{d[i].amount_total}}
		{{# } }}
		<br/>
		
		{{# if(d[i].status==2){ }}
			<a href="__PUBLIC__ds_survey_payment/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去付款</span>
		</a>
		{{# }if(d[i].status==3){ }}
			{{# if(d[i].step_number==5){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# }if(d[i].step_number==6){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# } }}
		
		
		
		{{# }if(d[i].status==4){ }}
		<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去验收</span>
		</a>
		{{# }if(d[i].status==5){ }}
		<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去评价</span>
		</a>
		{{# }if(d[i].status==6){ }}
		<a href="javascript:;" onclick="" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">追加评价</span>
		</a>	
		{{# } }}


						{{# }if(d[i].service_type_id==5){ }}
						<!--判断当前更换灯片为6时-->
{{# if(d[i].step_type==6){ }}
{{# if(d[i].amount_total==null){ }}
{{# }else{ }}
￥{{d[i].amount_total}}
{{# } }}
<br/>

{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}

{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
{{# if(d[i].ampunt_addition==null){ }}
<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
{{# }else{ }}
{{# } }}

{{# }else{ }}
{{# } }}

{{# }else{ }}
{{# } }}
{{# if(d[i].status==1){ }}
<a href="__PUBLIC__gjmguestbook/{{d[i].order_number}}" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">去选标</span>
</a>
{{# }if(d[i].status==2){ }}
<a href="__PUBLIC__settlements/{{d[i].order_number}}/url/0" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">去付款</span>
</a>
{{# }if(d[i].status==3){ }}
		{{# if(d[i].step_number==8){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# } }}
{{# }if(d[i].status==4){ }}
<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">去验收</span>
</a>
{{# }if(d[i].status==5){ }}
<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">去评价</span>
</a>
{{# }if(d[i].status==6){ }}
<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">追加评价</span>
</a>
{{# } }}
<!--判断当前更换灯片为7时-->
{{# }if(d[i].step_type==7){ }}
{{# if(d[i].amount_total==null){ }}
{{# }else{ }}
￥{{d[i].amount_total}}
{{# } }}
<br/>

{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}

{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
{{# if(d[i].ampunt_addition==null){ }}
<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
{{# }else{ }}
{{# } }}

{{# }else{ }}
{{# } }}

{{# }else{ }}
{{# } }}
{{# if(d[i].status==1){ }}
{{# if(d[i].step_number==2){ }}
<a href="__PUBLIC__master_filters/{{d[i].order_number}}/cid/choose/sid/0" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">挑主任师傅</span>
</a>
{{# }if(d[i].step_number==3){ }}
<a href="__PUBLIC__director_master/{{d[i].order_number}}/wid/3" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">咨询主任师傅</span>
</a>
{{# }if(d[i].step_number==4){ }}
{{# if(d[i].d_num!=0){ }}
<a href="__PUBLIC__common_master/{{d[i].order_number}}/wid/0" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">增加普通师傅</span>
</a>
{{# } }}
{{# } }}

{{# }if(d[i].status==2){ }}
<a href="__PUBLIC__settlement/{{d[i].order_number}}/url/0" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">去付款</span>
</a>
{{# }if(d[i].status==3){ }}
		{{# if(d[i].step_number==8){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# } }}
{{# }if(d[i].status==4){ }}
<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">去验收</span>
</a>
{{# }if(d[i].status==5){ }}
<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">去评价</span>
</a>
{{# }if(d[i].status==6){ }}
<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
    <span class="btn btn-xs btn-sm btn-orange">追加评价</span>
</a>
{{# } }}
{{# } }}
						{{# }if(d[i].service_type_id==6){ }}
						﻿<!--判断当前围板搭建步骤为8时-->
{{# if(d[i].step_type==8){ }}
	{{# if(d[i].amount_total==null){ }}
		{{# }else{ }}
		￥{{d[i].amount_total}}
		{{# } }}
		<br/>

		{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}

		{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
			{{# if(d[i].ampunt_addition==null){ }}
			<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
			{{# }else{ }}
			{{# } }}
			
		{{# }else{ }}
		{{# } }}

		{{# }else{ }}
		{{# } }}
		{{# if(d[i].status==1){ }}
		<a href="__PUBLIC__guestbook/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去选标</span>
		</a>
		{{# }if(d[i].status==2){ }}
		<a href="__PUBLIC__coaming_settlement/{{d[i].order_number}}/url/0" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去付款</span>
		</a>
		{{# }if(d[i].status==3){ }}
			{{# if(d[i].step_number==8){ }}
				<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
				<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
				</a>
			{{# } }}
	
		{{# }if(d[i].status==4){ }}
		<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去验收</span>
		</a>
		{{# }if(d[i].status==5){ }}
		<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">去评价</span>
		</a>
		{{# }if(d[i].status==6){ }}
		<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
		<span class="btn btn-xs btn-sm btn-orange">追加评价</span>
		</a>	
	{{# } }}
<!--判断当前围板搭建步骤为9时-->
{{# }if(d[i].step_type==9){ }}
		{{# if(d[i].amount_total==null){ }}
			{{# }else{ }}
			￥{{d[i].amount_total}}
			{{# } }}
			<br/>

			{{# if(d[i].service_type_id==1||d[i].service_type_id==2||d[i].service_type_id==5){ }}

			{{# if(d[i].status==1 || d[i].status==2 || d[i].status==3 || d[i].status==4){ }}
				{{# if(d[i].ampunt_addition==null){ }}
<a href="__PUBLIC__order/additional/{{d[i].id}}" target="_blank" class="btn btn-xs btn-sm btn-primary">追加项目</a>
				{{# }else{ }}
				{{# } }}
				
			{{# }else{ }}
			{{# } }}

			{{# }else{ }}
			{{# } }}
			{{# if(d[i].status==1){ }}
				{{# if(d[i].step_number==2){ }}
					<a href="__PUBLIC__master_filters/{{d[i].order_number}}/cid/choose/sid/0" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">挑主任师傅</span>
					</a>
				{{# }if(d[i].step_number==3){ }}
					<a href="__PUBLIC__director_master/{{d[i].order_number}}/wid/3" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">咨询主任师傅</span>
					</a>
				{{# }if(d[i].step_number==4){ }}
					{{# if(d[i].d_num!=0){ }}
					<a href="__PUBLIC__common_master/{{d[i].order_number}}/wid/0" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange">增加普通师傅</span>
					</a>
					{{# } }}
				{{# } }}

			{{# }if(d[i].status==2){ }}
			<a href="__PUBLIC__settlement/{{d[i].order_number}}/url/0" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去付款</span>
			</a>
			{{# }if(d[i].status==3){ }}
				{{# if(d[i].step_number==8){ }}
					<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
					<span class="btn btn-xs btn-sm btn-orange" >确认报告</span>
					</a>
				{{# } }}
			{{# }if(d[i].status==4){ }}
			<a href="__PUBLIC__order/status/{{d[i].id}}" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去验收</span>
			</a>
			{{# }if(d[i].status==5){ }}
			<a href="__PUBLIC__client_evaluate/{{d[i].order_number}}" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">去评价</span>
			</a>
			{{# }if(d[i].status==6){ }}
			<a href="javascript:;" onclick="ad_state({{d[i].id}});" target="_blank">
			<span class="btn btn-xs btn-sm btn-orange">追加评价</span>
			</a>	
		{{# } }}
{{# } }}
						{{# } }}
					</div>
				</div>
			</div>
		</div>
		{{# } }}
	</script>
	<tbody id="list-content"></tbody>
</table>					
        </div>
        <!-- 分页条-->
            <div class="col-md-4">
                <input type="button" id="check_all" class="btn border-radius btn-default" value="全选">
                <input type="button" id="Invert_Selection" class="btn border-radius btn-default"  value="删除所选">
            </div>
            <div class="col-md-6" style="margin-top:1%">
                <div id="AjaxPage" style=" text-align: right;"></div>
                <a id="list-content"></a>
            </div>
        </div>
</div>
<!-- 加载动画 -->
<div class="spiner-example">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
    </div>
</div>
<script>
    //全选
    $(function () {
        var ty=true;
        $("#check_all").click(function () {
            if(ty){
                var checknbox=$(".panel-heading input[type='checkbox']");
                checknbox.each(function (i,value) {
                    $(value).prop('checked',true);
                    ty=false;
                })
            }else{
                var checknbox=$(".panel-heading input[type='checkbox']");
                checknbox.each(function (i,value) {
                    $(value).prop('checked',false);
                    ty=true;
                })
            }

        })
		//删除所有
		 $("#Invert_Selection").click(function() {
				var id="";
				$("input[name=items]").each(function() {
					if ($(this).prop("checked")) {
						id += ","+$(this).val();
					}
				});

				if(id==''){
				parent.layer.msg('至少选择一个哟',{icon:2,time:1500,shade: 0.1});
				 return false;
				}
				id = id.substring(1);
				lunhui.confirmz(id,'__PUBLIC__orders/del_sers');
			});
    })

</script>




<script type="text/javascript">
    //laypage分页
    Ajaxpage();
    function Ajaxpage(curr){
        var laytpl=layui.laytpl;
        var  laypage=layui.laypage;
        $.getJSON('__PUBLIC__orders/client', {page: curr || 1,key:parent.key_se}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画
            if(data==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            }else{
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data, function(html){
                    document.getElementById('list-content').innerHTML = html;
                });
                laypage({
                    cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                    pages:'<?php echo $allpage; ?>',//总页数
                    skip: true,//是否开启跳页
                    skin: '#1AB5B7',//分页组件颜色
                    curr: curr || 1,
                    groups: 3,//连续显示分页数
                    jump: function(obj, first){
                        if(!first){
                            Ajaxpage(obj.curr)
                        }
                        $('#allpage').html('第'+ obj.curr +'页，共'+ obj.pages +'页');
                    }
                });
            }
        });
    }
    //删除
    function del_ser(id){
        lunhui.confirm(id,'__PUBLIC__orders/del_ser');

    }
    //订单状态
    function orderstatus(id){
        location.href = '__PUBLIC__order/status/'+id;
    }
    //订单追加
    function order_additional(id){
        location.href = '__PUBLIC__order/additional/'+id;
    }

</script>





