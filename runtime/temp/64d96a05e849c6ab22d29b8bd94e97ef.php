<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"E:\web-php-5.6\bjtp5/application/admin\view\survey\index.html";i:1510103679;s:62:"E:\web-php-5.6\bjtp5/application/admin\view\public\header.html";i:1505545259;s:62:"E:\web-php-5.6\bjtp5/application/admin\view\public\footer.html";i:1505545259;}*/ ?>
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
            <h5>勘测订单列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->           
            <div class="row">
                <div class="col-sm-12">   
                                              
                    <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('index'); ?>">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>" placeholder="输入需查询的订单号" />   
                                <span class="input-group-btn"> 
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 搜索</button> 
                                </span>
                            </div>
                        </div>
                    </form>                         
                </div>
            </div>
            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>
            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="long-tr">
                               
                                <th width="9%">订单号</th>
                                <th width="9%">联系人名称</th>
                                <th width="5%">联系人手机号</th>
								<th width="5%">品牌</th>
                                <th width="5%">店铺地址</th>
                                <th width="6%">预约时间</th>
                                <th width="10%">下单时间</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                            <tr class="long-td">
                                <td>{{d[i].order_number}}</td>
                                <td>{{d[i].contact_name}}</td>
								<td>{{d[i].contact_phone}}</td>
                                <td>{{d[i].s_brand}}</td>     
								<td>{{d[i].full_location}}{{d[i].location_ext}}</td>     
								<td>{{d[i].start_time}}</td>     
								<td>{{d[i].create_time}}</td>      
                           
								<td>                                  
                                    <a href="javascript:;" onclick="dispensing_master({{d[i].id}})" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-paste"></i>分配师傅</a>&nbsp;&nbsp;
                                     
                                </td>
                            </tr>
                            {{# } }}
                        </script>
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

<!-- 加载动画 -->
<div class="spiner-example">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
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

<script type="text/javascript">
   
    //laypage分页
    Ajaxpage();
    function Ajaxpage(curr){
        var key=$('#key').val();
        $.getJSON('<?php echo url("Survey/index"); ?>', {page: curr || 1,key:key}, function(data){
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

//分配师傅
function dispensing_master(id){
    location.href = './dispensing_master/id/'+id+'.html';
}




</script>
</body>
</html>