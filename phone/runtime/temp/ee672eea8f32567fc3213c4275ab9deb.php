<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp64\www\phone/application/index\view\wallet\index_home.html";i:1511492866;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
    <div class="wodeqianbao shouzhimingxi">
        <si-headers></si-headers>
        <si-content></si-content>
    </div>
</div>
<script type="text/x-template" id="content">
    <div class="content">
        <div class="qianbao-tab">
            <h3>可用余额（元）</h3>
            <h1><?php echo $balance; ?></h1>
        </div>
        <div class="weui-cells tip">
            <!--<a class="weui-cell weui-cell_access" href="__PUBLIC__wallet/index12">-->
                <!--<div class="weui-cell__bd">-->
                    <!--<p>-->
                        <!--<span class="icon-提现"></span>-->
                        <!--</p>-->
                <!--</div>-->
                <!--<div class="weui-cell__ft">-->
                <!--</div>-->
            <!--</a>-->
            <a class="weui-cell weui-cell_access" href="__PUBLIC__pay_pwd">
                <div class="weui-cell__bd">
                    <p><span class="icon-密码"></span>钱包密码</p>
                </div>
                <div class="weui-cell__ft">
                </div>
            </a>
        </div>
        <div class="weui-cells">
            <a class="weui-cell weui-cell_access" href="__PUBLIC__wallet/index13">
                <div class="weui-cell__bd">
                    <p><span class="icon-保证金1"></span>诚信保证金</p>
                </div>
                <div  class="weui-cell__ft">
                    <span v-if="!guarantee">还未缴纳</span>
                    <span v-if="guarantee">已缴纳{{guarantee}}</span>
                </div>
            </a>

        </div>
    </div>

    </div>
</script>
<script>
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "我的钱包",
                left:"<span class=\"icon-返回2\"></span><a  style='color: #fff'>返回</a>",
                right:"<a href='__PUBLIC__wallet/index1'>收支明细</a>"
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
                guarantee:"<?php echo $guarantee; ?>"
            }
        },
        methods:{

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
