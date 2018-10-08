<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\wamp64\www\phone/application/index\view\wallet\index_home2.html";i:1511746801;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
  <title>__Dstitle__</title>
  <link rel="stylesheet" href="__indexStatic__css/reset.css">
  <link rel="stylesheet" href="__indexStatic__css/style.css">
  <link rel="stylesheet" href="__indexStatic__font/style.css">
  <link rel="stylesheet" href="__indexStatic__css/weui.min.css">
  <link rel="stylesheet" href="__indexStatic__css/jquery-weui.min.css">
  <script src='__indexStatic__js/vue.min.js'></script>
  <script src='__indexStatic__js/vuex.js'></script>
  <script src='__indexStatic__js/jquery-2.1.4.js'></script>
  <script src='__indexStatic__js/jquery-weui.min.js'></script>
  <script src='__indexStatic__js/fastclick.js'></script>
  <link rel="stylesheet" href="__indexStatic__css/index.css">
  <link rel="stylesheet" href="__indexStatic__css/index2.css">

  <link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/webuploader.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/style.css">
  <script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
  <script>
  var ds_public='__PUBLIC__';
    var html = $('html')
    var hW = html.outerWidth() > 640 ? 640 : html.outerWidth()
    _rem = 16
    html.css('fontSize', _rem)
    $(function () {
      FastClick.attach(document.body)
    })
    Vue.prototype.select=function (element,text,multi,items,onchange) {
      $("#"+element).select({
          title: text,
          multi: multi,
          items: items,
          onChange:onchange
      })}
  Vue.prototype.WebUploader=function (element,func) {

      WebUploader.create({
          auto: true,// 选完文件后，是否自动上传。
          swf: '__PUBLIC__static/index/webupload/Uploader.swf',// swf文件路径
          server: '__PUBLIC__dsupload',// 文件接收服务端。
          duplicate :true,// 重复上传图片，true为可重复false为不可重复
          pick: '#'+element,// 选择文件的按钮。可选。
          accept: {
              title: 'Images',
              extensions: 'gif,jpg,jpeg,bmp,png',
              mimeTypes: 'image/jpg,image/jpeg,image/png'
          },
          'onUploadSuccess': func
      })
    }
  Vue.prototype.DsQINiu='__DsQINiu__';
  Vue.prototype.PUBLIC='__PUBLIC__';



  </script>
</head>
<body>
<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>
<script type="text/x-template" id='header'>
  <div class='header'>
    <div class="header-wrapper">
      <div class="header-left" @click='goback()' v-html="left">

      </div>
      <div class="header-content">
        <span class='text'>{{title}}</span>
      </div>
      <div class="header-right"  v-html="right">

      </div>
    </div>
  </div>
</script>
<body>
<div id="bj-app">
    <div class="shifuziliao">
        <si-headers></si-headers>
        <si-content></si-content>
    </div>
</div>
<script type="text/x-template" id="content">
    <div class="weui-cells_form">
        <div class="weui-cell bj-weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label bj-label-color">充值金额:</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input label-span" v-model="mnu"  type="text"  placeholder="请输入充值金额">
            </div>
        </div>
        <div class="weui-cells weui-cells_radio" style="margin-top: 20px">
            <label class="weui-cell weui-check__label" for="x11">
                <div class="weui-cell__ft">
                    <span style="font-size: 20px;margin-right: 10px" class="icon-微信"></span>
                </div>
                <div class="weui-cell__bd">
                    <p>微信支付</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" v-model="radio1" value="1" class="weui-check" name="radio1" id="x11">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
            <label class="weui-cell weui-check__label" for="x12">
                <div class="weui-cell__ft">
                    <span style="font-size: 20px;margin-right: 10px" class="icon-支付宝"></span>
                </div>
                <div class="weui-cell__bd">
                    <p>支付包支付</p>
                </div>
                <div class="weui-cell__ft">
                    <input v-model="radio1" value="2" type="radio" name="radio1" class="weui-check" id="x12">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
        </div>
        <div class="weui-flex" style="margin-top: 20px">
            <div class="weui-flex__item">
                <input @click="xiadan" type="button" value="确认支付" class="weui-btn bj_button_orange">
            </div>
        </div>
    </div>
</script>
<script>
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "选择支付方式",
                left:"<span class='icon-返回2'></span><a  style='color: #fff'>返回</a>",
                right:""
            }
        },
        methods:{
            goback:function () {
                window.history.go(-1)
            }
        }
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return {
                radio1:0,
                mnu:"",
                uid:<?php echo $uid; ?>,
            }
        },
        methods:{
             xiadan:function () {
                var _this = this;
                if(this.radio1==0){
                    $.alert({
                        title: '选择支付方式',
                        text: '你还未选择支付方式',
                        shand:"red",
                        onOK: function () {
                            //点击确认
                        }
                    });
                }
                _this.fangshi();
            },
            fangshi:function(){
                var _this = this;
                if(this.mnu==""||this.mnu==0){
                    $.toptip("输入金额不能为空");
                    return false
                }
                if(this.radio1==1){
                        $.ajax({
                        url:'__PUBLIC__is_weixin',
                        type:'post',
                        data:{},
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            if(data==true){
                                location.href="http://www.bj-wang.com/PhoneWxpay/master_guarantee_jsapi?total="+_this.mnu+"&&uid="+_this.uid;
                            }else{
                                $.ajax({
                                    url:'__PUBLIC__add_guarantee',
                                    type:'post',
                                    data:{totals:_this.mnu,uid:_this.uid},
                                    dataType:'json',
                                    success:function(data){
                                        if(data.code==200){
                                            window.location.href="__PUBLIC__master_guarantee/"+_this.uid+'/times/'+data.msg;
                                        }

                                    }
                                })

                            }

                        }
                    })
                 }else{
                    $.toptip('目前还不支持支付宝支付')
                }
            }
        }
    });
    new Vue({
        el: '#bj-app',
        mounted:function () {

        },

        methods:{

        }
    })
</script>
</body>
