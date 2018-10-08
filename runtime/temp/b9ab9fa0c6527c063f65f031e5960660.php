<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"E:\web-php-5.6\bjtp5/application/admin\view\cost\index.html";i:1506569857;s:62:"E:\web-php-5.6\bjtp5/application/admin\view\public\header.html";i:1505545259;s:62:"E:\web-php-5.6\bjtp5/application/admin\view\public\footer.html";i:1505545259;}*/ ?>
<!DOCTYPE html>
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
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>服务费用列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->

            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>

            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover" style="table-layout: fixed;">
                        <thead>
                        <tr class="long-tr">
                            <th >咨询费</th>
                            <th><?php echo $list['amount_consulting']; ?></th>
                            <th><a href="__RETURN__/cost/amount_consulting.html"class="btn btn-primary btn-xs btn-outline"> <i class="fa fa-paste"></i>编辑</a></label></th>
                        </tr>
                        <tr></tr>

                        </thead>



                        <tr class="long-tr">
                            <th  >没交保证金平台服务收费比例</th>
                            <th> <?php echo $list['platform_service']; ?></th>
                            <th><a href="__RETURN__/cost/platform_service.html"class="btn btn-primary btn-xs btn-outline"> <i class="fa fa-paste"></i>编辑</a></label></th>
                        </tr>

                        <tr class="long-tr">
                            <th >交完保证金之后的平台服务费</th>
                            <th> <?php echo $list['g_platform_service']; ?></th>
                            <th><a href="__RETURN__/cost/g_platform_service.html"class="btn btn-primary btn-xs btn-outline"> <i class="fa fa-paste"></i>编辑</a></th>
                        </tr>





                        <tbody id="list-content"></tbody>
                    </table>
                    <div id="AjaxPage" style=" text-align: right;"></div>
                    <div id="allpage" style=" text-align: right;"></div>
                </div>
            </div>
            <!-- End Example Pagination -->
        </div>
    </div>
</div>
<!-- End Panel Other -->
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

<script type="text/javascript">






    function ad_state(val){
        $.post('<?php echo url("ad_state"); ?>',
            {id:val},
            function(data){

                if(data.code==1){
                    var a='<span class="label label-warning">已审核</span>'
                    $('#zt'+val).html(a);
                    layer.msg(data.msg,{icon:2,time:1500,shade: 0.1,});
                    return false;
                }else{
                    var b='<span class="label label-info">已审核</span>'
                    $('#zt'+val).html(b);
                    layer.msg(data.msg,{icon:1,time:1500,shade: 0.1,});
                    return false;
                }

            });
        return false;
    }

</script>
</body>
</html>