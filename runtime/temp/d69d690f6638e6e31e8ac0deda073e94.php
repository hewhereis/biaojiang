<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"E:\web-php-5.6\bjtp5/application/admin\view\index\index.html";i:1505545259;s:62:"E:\web-php-5.6\bjtp5/application/admin\view\public\header.html";i:1505545259;s:62:"E:\web-php-5.6\bjtp5/application/admin\view\public\footer.html";i:1505545259;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('WEB_SITE_TITLE'); ?></title>
    <link href="__PUBLIC__static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__static/admin/css/font-awesome.min.css" rel="stylesheet">
    <link href="__PUBLIC__static/admin/css/animate.min.css" rel="stylesheet">
    <link href="__PUBLIC__static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="__PUBLIC__static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="__PUBLIC__static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="__PUBLIC__static/admin/css/style.min.css" rel="stylesheet">
    <link href="__PUBLIC__static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="__PUBLIC__static/index/js/layui/lay/dest/layui.all.js" type="text/javascript"></script>
    <style type="text/css">
    .long-tr th{
        text-align: center
    }
    .long-td td{
        text-align: center
    }
    </style>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <div>尊敬的<?php echo $username; ?><span id="weather"></span></div>
    </div>

    <!-- 上方tab -->
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>会员</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">564654</h1>
                    <small>今日新增</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>订单</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">275,800</h1>
                    <small>总订单</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>注册</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">106,120</h1>
                    <small>新增</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="#question">
                        <i class="fa fa-question" style="color:red;margin-left:10px" data-container="body" data-toggle="popover" data-placement="bottom"
                           data-content="日活跃用户 = 当日登录游戏的用户 - 当日新增用户数(去重)@@@@@@@@月活跃用户 = 最近30天登录游戏的用户 - 最近30天新增用户(去重)"></i>
                    </a>
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>活跃用户</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,600</h1>
                    <small>7月</small>
                </div>
            </div>
        </div>
    </div>

    <!-- 中间折线 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 显示信息1
                    </div>
                    <div class="panel-body">
                        <p><i class="fa fa-sitemap"></i> 1
                        </p>
                        <p><i class="fa fa-windows"></i> 2
                        </p>
                        <p><i class="fa fa-warning"></i> 3
                        </p>
                        <p><i class="fa fa-credit-card"></i> 4
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 显示信息2
                    </div>
                    <div class="panel-body">
                        <p><i class="fa fa-sitemap"></i> 1
                        </p>
                        <p><i class="fa fa-windows"></i> 2
                        </p>
                        <p><i class="fa fa-warning"></i> 3
                        </p>
                        <p><i class="fa fa-credit-card"></i> 4
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="__JS__/jquery.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/content.min.js"></script>
<script src="__JS__/plugins/chosen/chosen.jquery.js"></script>
<script src="__JS__/plugins/iCheck/icheck.min.js"></script>
<script src="__JS__/plugins/layer/laydate/laydate.js"></script>
<script src="__JS__/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script src="__JS__/jquery.form.js"></script>
<script src="__JS__/layer/layer.js"></script>
<script src="__JS__/laypage/laypage.js"></script>
<script src="__JS__/laytpl/laytpl.js"></script>
<script src="__JS__/lunhui.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script src="__PUBLIC__static/admin/js/jquery.leoweather.min.js"></script>

<script type="text/javascript">
    $('#weather').leoweather({format:'，{时段}好！<span id="colock">现在时间是：<strong>{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}</strong>，</span> <b>{城市}天气</b> {天气} {夜间气温}℃ ~ {白天气温}℃'});
</script>

</body>
</html>