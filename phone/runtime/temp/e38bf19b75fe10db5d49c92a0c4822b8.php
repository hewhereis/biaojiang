<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\wamp64\www\phone/application/index\view\wallet\index_home1.html";i:1511492866;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
    <div class="chengxinbaozheng">
        <si-headers></si-headers>
        <si-content></si-content>
    </div>
</div>
<script type="text/x-template" id="content">
    <div class="conten">
        <div class="tablet">
            <div class="weui-panel weui-panel_access">
                <div class="weui-panel__bd">
                    <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <div class="title">
                                <span class="icon-保证金"></span>
                            </div>
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">保证金</h4>

                            <p class="weui-media-box__desc">
                                <span v-if="!guarantee">你还未缴纳保证金</span>
                                <span v-if="guarantee">已缴纳{{guarantee}} 元</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="weui-flex fuwu">
                <div class="weui-flex__item">
                    <span class="icon-品质"></span>
                    品质保证
                </div>
                <div class="weui-flex__item acti">

                    <span class="icon-服务"></span>
                    服务保证
                </div>
                <div class="weui-flex__item acti"><span class="icon-售后"></span>
                    售后服务
                </div>
            </div>

        </div>
        <div class="weui-flex xieyi">
            <div class="weui-flex__item ">
                了解并同意
                <a href="">《标匠平台用户保障协议》</a>
            </div>
        </div>
        <div class="weui-flex button">
            <div class="weui-flex__item">
                <a href="__PUBLIC__wallet/index14" class="weui-btn bj_button_orange">我的缴纳</a>
            </div>
        </div>
        <div class="xinxi">
            <h3 class="title-xinxi">保证金说明</h3>
            <p class="text-xinxi">
                1.保证金是根据《标匠平台用户保障服务协议》约定的条款和条件及标匠平台用户其他公示规则的规定缴存并冻结你的账户,在你未履行用户保障服务承若时用于对用户进行赔付的资金.

            </p>
            <p class="text-xinxi">
                2.师傅缴纳保证金是对用户的一种保障m所以客户在下单时候会出现优先选择缴纳保证金的师傅
            </p>
            <p class="text-xinxi">
                3.师傅缴纳保证金只收取12%的服务费,如果没有缴纳保证金将收取15%的服务费。</p>


        </div>
    </div>
</script>
<script>
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "诚信保证金",
                left:"<span class=\"icon-返回2\"></span><a  style='color: #fff'>返回</a>",
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
