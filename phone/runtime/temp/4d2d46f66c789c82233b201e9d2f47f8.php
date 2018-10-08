<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\wamp64\www\phone/application/index\view\mastersign\qiantui.html";i:1511227700;s:66:"D:\wamp64\www\phone/application/index\view\public\headerlogin.html";i:1510799168;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
  <title>__Dstitle__</title>
  <link rel="stylesheet" href="__indexStatic__css/reset.css">
  <link rel="stylesheet" href="__indexStatic__css/style.css">
  <link rel="stylesheet" href="__indexStatic__css/weui.min.css">
  <link rel="stylesheet" href="__indexStatic__css/jquery-weui.min.css">
  <link rel="stylesheet" href="__indexStatic__css/index.css">
  <script src='__indexStatic__js/jquery-2.1.4.js'></script>
  <script src='__indexStatic__js/jquery-weui.min.js'></script>
  <script src='__indexStatic__js/fastclick.js'></script>
  <script src='__indexStatic__js/public.js'></script>
  <script src='__indexStatic__js/index.js'></script>
  <script>
	var ds_public='__PUBLIC__';
    var html = $('html')
    var hW = html.outerWidth() > 640 ? 640 : html.outerWidth()
    _rem = 16
    html.css('fontSize', _rem)
    $(function () {
      FastClick.attach(document.body)
    })
  </script>
</head>

<body>


<script type="text/javascript" src="https://3gimg.qq.com/lightmap/components/geolocation/geolocation.min.js"></script>
<div class='signOut'>
    <div class="signOut-top">
        <div class="orderNumber">
            <span>订单号：</span>
            <span><?php echo $list['order_number']; ?></span>
        </div>
        <div class="price">
            <span>￥<span><?php echo $list['amount_engineer']; ?></span>元</span>
            <br>
            <span class='priceText'>总价</span>
        </div>
    </div>
    <input id="id"  hidden="hidden" value="<?php echo $id; ?>">
    <div class="signOut-bottom">
        <div class="siginOut-buttom">
             <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default" id="ds_work_sign">签退</a>
        </div>
        <div class="signOut-location" id="pos-area">
            <span><i class='icon-location2'></i>当前位置：<span class='location' id="demo"></span></span>
        </div>
    </div>
</div>
<script>
$("#ds_work_sign").click(function () {
     var position=$('#demo').html();
     var obj = document.getElementById("ds_work_sign");
     var id = $('#id').val(); 

     if(position==''){
         $.toptip('没有获取到您的位置信息');
         geolocation.getLocation(showPosition, showErr, options);
     }else{
        $.ajax({
                url: '__PUBLIC__signajax_out',
                dataType: 'json',
                data: {
                    id:id,
                    position:position
                },
                type: 'post',
                success: function(data) {
                    if (data.code == 200) {
                        $.toast(data.msg,  function() {
                            obj.innerText= "已签到"; 
                            location.href = '__PUBLIC__';
                        });
                    } else {
                         $.toptip('不要重复签到');
                    }
                },
            })
     }
})
</script>

<script type="text/JavaScript">
    var geolocation = new qq.maps.Geolocation("TFGBZ-MO4WO-6AEWJ-S2GB3-3MVGJ-4RBP4", "myapp");
    document.getElementById("pos-area").style.height = (document.body.clientHeight - 110) + 'px';
    var positionNum = 0;
    var options = {timeout: 8000};
    function showPosition(position) {
        positionNum ++;
        var weizhi =JSON.stringify(position, null, 4);
        var obj = JSON.parse(weizhi);
        var province=obj.province;//省
        var city=obj.city;//市
        var district=obj.district;//市]
        var ds='<br>';
        var addr=obj.addr;//详细地址
        var information =province+city+district+ds+addr;
        if(addr==''){
            $.toptip('定位失败,请确保已在手机上打开位置信息');
            return false;
        }
        document.getElementById("demo").innerHTML = information;
        document.getElementById("pos-area").scrollTop = document.getElementById("pos-area").scrollHeight;
    };
    function showErr() {
        positionNum ++;
        $.toptip('定位失败,请确保已在手机上打开位置信息');
        document.getElementById("pos-area").scrollTop = document.getElementById("pos-area").scrollHeight;
    };
    geolocation.getLocation(showPosition, showErr, options);
</script>