<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wamp64\www\phone/application/index\view\auth\register.html";i:1510221038;s:66:"D:\wamp64\www\phone/application/index\view\public\headerlogin.html";i:1510799168;}*/ ?>
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
                <span class='label-span'>注册</span>
            </div>
            <div class="header-right">
                <span class='text'></span>
            </div>
        </div>
    </div>
    <div class="login-center">
        <div class="login-logo">
            <div class="loginLogo">
                <img src="__indexStatic__images/logo.png" class='logoImg' alt="">
            </div>
        </div>
        <div class="login-form">
            <form action="">
                <div class="login-user">
                    <input type="text" class='user-input' id="phone" placeholder="请输入手机号">
                </div>
                <div class="login-user">
                    <input type="text" class='user-input registerVCode' id="captcha" size="6" placeholder="请输入短信验证码">
                    <a class='registerVCodeSpan' id="btnSendCode" onclick="sendMessage()" disabled=true>获取验证码</a>
                </div>
                <div class="login-user">
                    <input type="password" class='user-input' id="password" placeholder="请输入密码">
                </div>
                <div class="login-user">
                    <input type="password" class='user-input' id="passwords" placeholder="请输再次确认密码">
                </div>
                <div class="login-user registersType">
                    <div class="registerType on" style=''>
                        <input type="radio" class='registerRaio' value="2" id='master' name="type"  checked>
                        <label for='master' class='registerLabels'>注册为师傅</label>
                    </div>
                    <div class="registerType">
                        <input type="radio" class='registerRaio' value="1" id='client' name="type">
                        <label for='client' class='registerLabels'>注册为客户</label>
                    </div>
                    <!-- <div class="registerType" style='text-align: right'> -->
                        <!-- <input type="radio" class='registerRaio' id='serverShop' name="type"> -->
                        <!-- <label for='serverShop' class='registerLabels'>注册为服务商</label> -->
                    <!-- </div> -->
                </div>
        <div class="login-user-bottom" style='margin-top: 20px;'>
            <a href="javascript:;" id="complete" class="weui-btn weui-btn_plain-warn btn-orange user-bottom">完成注册</a>
        </div>
        </form>
    </div>
</div>
</div>
<script src='__indexStatic__xwf/dsres.js'></script>
