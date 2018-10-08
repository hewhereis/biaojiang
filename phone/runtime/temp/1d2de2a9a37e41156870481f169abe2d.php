<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\wamp64\www\phone/application/index\view\wxpay\index.html";i:1510824952;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1510799168;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
﻿<?php
		require_once ("wxpay/lib/WxPay.Api.php");
        require_once ("wxpay/example/WxPay.NativePay.php");
        require_once ('wxpay/example/log.php');
//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */


 $aa='100';
 $bb=$qq*$aa;
 $bb = ceil($bb);
 $input = new WxPayUnifiedOrder();
 $input->SetBody("标匠订单-$number");
 $input->SetAttach("test");
 //$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
 $num=WxPayConfig::MCHID.date("YmdHis");
 $input->SetOut_trade_no($num);
 $input->SetTotal_fee($bb);
 $input->SetTime_start(date("YmdHis"));
 $input->SetTime_expire(date("YmdHis", time() + 600));
 $input->SetGoods_tag("test");
 $input->SetNotify_url("http://www.bj-wang.com/wxpay/example/notify.php");
 $input->SetTrade_type("NATIVE");
 $input->SetProduct_id("123456789");
 $result = GetPayUrl($input);
 var_dump($result);
 die;
 $url2 = $result["code_url"];

?>
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
  <link rel="stylesheet" href="__indexStatic__css/index2.css">
  <link rel="stylesheet" href="__indexStatic__css/index3.css">
  <script src='__indexStatic__js/vue.min.js'></script>
  <script src='__indexStatic__js/jquery-2.1.4.js'></script>
  <script src='__indexStatic__js/jquery-weui.min.js'></script>
  <!-- <script src='__indexStatic__js/fastclick.js'></script> -->
  <script src='__indexStatic__js/index.js'></script>
  <script src='__indexStatic__js/public.js'></script>
  <script>
	var ds_public='__PUBLIC__';
    var html = $('html')
    var hW = html.outerWidth() > 640 ? 640 : html.outerWidth()
    _rem = 16
    html.css('fontSize', _rem)
    $(function () {
      // FastClick.attach(document.body)
    })
  </script>
</head>

<body>
<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>
  <div id="app" style='padding-bottom: 53px;padding-top:40px'>
<script type="text/x-template" id='header'>
      <div class='header'>
          <div class="header-wrapper">
            <div class="header-left" @click='goback()'>
              <i class='icon-arrow_lift'></i>
              <span class='goback'>返回</span>
            </div>
            <div class="header-content">
              <span class='text'>{{title}}</span>
            </div>
            <div class="header-right"></div>
          </div>
        </div>
    </script>

<div class="main">
	<div class="container">
		<div class="header">
				<h5 class="page-header bx">
					<span>当前所在位置</span>
					<span>>></span>
					<small>微信支付</small>
				</h5>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<p class="panel-title-p">
						<span>微信支付</span>
					</p>
				</div>
			</div>
		   <div class="panel-body">
			  <div class="row">
			  	<div class="col-md-4" style="border:2px solid #cacaca;padding-top:4em;padding-bottom:10.45em;font-size: 1.275em">
			  		<span>你正在使用微信快捷支付，请及时付款</span>
			  		<p class="pt-30" style="font-size:1.3em;color: #000;font-weight:bold">标匠订单:</p>
			  		<p style="font-size:1.3em;color: #000;font-weight:bold"><?php echo $num;?></p>
			  		<p class="pt-30">订单号：<?php echo $number; ?></p>
			  		<p class="pt-30">商品类型：<?php echo $service; ?></p>
			  		<p class="pt-30">交易金额：￥<?php echo $bb/100; ?></p>
			  	</div>
			  	<div class="col-md-8" style="border:2px solid #cacaca">
			  		<div class="row">
			  			<div class="col-md-5" style="padding-top:5.5em;padding-left:4em;padding-bottom:19.3em">
			  				<span style="font-size:1.3em">请使用
                            <a href="" style="color:#ff6633;font-size: 1.3em">微信扫一扫</a>
			  		        </span>
			  		        <p class="pt-10" style="font-size: 1.3em">扫描二维码支付</p>
			  	          <!-- 生成二维码 -->	
			  		        <img alt="模式二扫码支付"src="http://www.bj-wang.com/wxpay/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>
	                     <!--   <div id="myDiv"></div><div id="timer"><?php echo $num;?></div>  -->	
	                        <input type="hidden" id="order_number" value="<?php echo $number; ?>">
							
			  			</div>
			  			<div class="col-md-7 pr-0">
			  				
                     	        <img src="__PUBLIC__static/index/images/weixin9.png" class="img-resposive" alt="">
			  			    
			  			</div>
			  		</div>
                </div>
			  </div>
		   </div>
		</div>
	</div>
</div>

<script src="__PUBLIC__static/index/js/jquery.form.js"></script>
<script type="text/x-template" id='footers'>
	<div>
		<div class="weui-footer">
		    <p class="weui-footer__links">
		        <a href="javascript:void(0);" class="weui-footer__link">Biao-Jiang  首页</a>
		    </p>
		    <p class="weui-footer__text">Copyright © 2008-2016 biao.jiang</p>
		</div>
	</div>
</script>




<script src="__PUBLIC__static/index/js/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
var ajaxstatus = function(){  
       // document.getElementById("timer").innerHTML=parseInt(document.getElementById("timer").innerHTML)+1; 
          var xmlhttp;    
          if (window.XMLHttpRequest){    
              //  code for IE7+, Firefox, Chrome, Opera, Safari    
              xmlhttp=new XMLHttpRequest();    
          }else{    
              // code for IE6, IE5    
             xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");    
          }    
          xmlhttp.onreadystatechange=function(){    
              if (xmlhttp.readyState==4 && xmlhttp.status==200){    
                 trade_state=xmlhttp.responseText;		 
                if(trade_state=='SUCCESS'){  
                     // document.getElementById("myDiv").innerHTML='支付成功';  		  
                      //alert(transaction_id);  
                      //延迟3000毫秒执行tz() 方法
                      clearInterval(myIntval);  
					   var order_number = $('#order_number').val();
					   
					   $.ajax({
					       url:'__PUBLIC__adds',
						   data:{order_number:order_number},
						   dataType:'json' ,
						   type:'post',
						   success:function(data){
						      if(data.code==200){
							   // setTimeout("location.href='http://www.bj-wang.com/'",2000);  
							   location.href='http://www.bj-wang.com/';
							  }
						   }
					   })
 
                  }   
              }    
          }    
        // orderquery.php 文件返回订单状态，通过订单状态确定支付状态  
         xmlhttp.open('post',"__PUBLIC__/wxpay/example/orderquery.php",false); 		         
         //把标签/值对添加到要发送的头文件。    
         xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");    
         xmlhttp.send("out_trade_no=<?php echo $num;?>");  
         }
         var myIntval= setInterval(ajaxstatus, 3000); 
       }); 
	
</script>
