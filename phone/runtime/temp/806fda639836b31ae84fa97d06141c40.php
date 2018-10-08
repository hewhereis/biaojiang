<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wamp64\www\phone/application/index\view\auth\login.html";i:1510221038;s:66:"D:\wamp64\www\phone/application/index\view\public\headerlogin.html";i:1510799168;}*/ ?>
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


<div class='login'>
<div class='headerlogin'>
    <div class="header-wrapper">
        <div class="header-left" id='goback'>
            <i class='icon-arrow_lift'></i>
            <span class='goback'>返回</span>
        </div>
        <div class="header-content">
        </div>
        <div class="header-right">
            <a href="__PUBLIC__register"><span class='text'>注册</span></a>
        </div>
    </div>
</div>

<div class="login-center">
    <div class="login-logo">
        <h2>账号登录</h2>
    </div>
    <div class="login-form">
        <form action="">
            <div class="login-user">
                <input type="text" class='user-input' id="phone" placeholder="手机号">
            </div>
            <div class="login-user">
                <input type="password"  id="password" class='user-input' placeholder="登入密码">
                <i class='icon-Eyes-closed' id='lookpassword'></i>
            </div>
            <div class="login-user-bottom">
                <a href="javascript:;" id="login" class="weui-btn weui-btn_plain-warn btn-orange user-bottom">登入</a>
            </div>
            <div class="login-user-text">
                <span class="weui-agree__text">
                    <a href="__PUBLIC__backpwdone" >找回密码</a>
                </span>
            </div>
        </form>
		
    </div>
</div>
<div class="login-footer">
    <span>登入即代表您同意我们的
        <a href="">服务协议</a> 和
        <a href="">隐私政策</a>
    </span>
</div>
</div>
<script src='__indexStatic__xwf/dslogin.js'></script>