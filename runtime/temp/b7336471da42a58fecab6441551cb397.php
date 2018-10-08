<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"E:\web-php-5.6\bjtp5/application/index\view\personal\client_location.html";i:1508491199;s:68:"E:\web-php-5.6\bjtp5/application/index\view\public\style_header.html";i:1510103679;}*/ ?>
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

<!--/*标题*/-->

<div class='panel panel-orange' style="min-height:1000px;">
	<div class='panel-heading'>
		<div class='panel-title'>地址管理</div>
	</div>
	<div class='panel-body'>
        <div class='row' style='padding-bottom:5px;'>
            <div class='col-xs-12' style='border-bottom:1px solid #ccc;'>
                <a href="__PUBLIC__addlocation" class='btn btn-success'>添加新地址</a>
            </div>
        </div> 
		<div class='row'>
			<div class='col-xs-12'>
                <table class="layui-table">
                    <thead>
                    <tr>
                        <th>联系人</th>
                        <th>详细地址</th>
                        <th>电话/手机号</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody  class='location'>
                    <?php if(is_array($location) || $location instanceof \think\Collection || $location instanceof \think\Paginator): $i = 0; $__LIST__ = $location;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><span><?php echo $l['name']; ?></span></td>
                            <td><?php echo $l['province']; ?>-<?php echo $l['city']; ?>-<?php echo $l['district']; ?>-<?php echo $l['location']; ?></td>
                            <td>
                                <?php echo $l['phone']; ?>
                            </td>
                            <td>
                                <div style='display:inline-block;margin-right:20px;cursor:pointer' data-toggle='modal' data-target='#loactionModal'>
                                    <a href="__PUBLIC__editlocation/client/<?php echo $l['id']; ?>">
                                        编辑
                                    </a>
                                </div>
                                <div style='display:inline-block;cursor:pointer' onclick="del_ser(<?php echo $l['id']; ?>)">
                                    删除
                                </div>
                                <div class="radio radio-info radio-inline" style='display:inline-block' >
                                    <?php if($l['default']==1): ?>
                                    <input type="radio" id="inlineRadio<?php echo $l['id']; ?>" name="radioInline" checked='true'>
                                    <span style="background: #ffd6cc;padding: 2px 5px;color: #f30;font-size: 12px;border: 1px solid #ff3800;border-radius: 5px">
                                        默认地址
                                    </span>
                                    <?php else: ?>
                                    <input type="radio" id="inlineRadio<?php echo $l['id']; ?>" name="radioInline" >
                                    <span  class="tacitly"  style="padding: 2px 5px; opacity: 0;background: #f60; color: #fff; border: 1px solid #f60; border-radius: 3px;text-decoration: none" onclick="default1(<?php echo $l['id']; ?>)">
                                        设为默认
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
				<ul>

			</div>
		</div>
	</div>
</div>
<script src="__CITY__/distpicker.data.js"></script>
<script src="__CITY__/distpicker.js"></script>
<script src="__CITY__/main.js"></script>
<script>
	//删除
    function del_ser(id){
		lunhui.ds_confirmz(id,'__PUBLIC__del_address');
    }
$(".layui-table").on("mouseover",".tacitly",function () {
        $(this).css("opacity","1")
})
    $(".layui-table").on("mouseout ",".tacitly",function () {
        $(this).css("opacity","0")
    })
 var  default1 = function (id) {

        $.ajax({
            url:'__PUBLIC__client_location/default',
            type:"post",
            dataType:"json",
            data:{id:id},
            success:function(res){
                window.location.href='__PUBLIC__client_location';
            }
        })
    }
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