<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wamp64\www\phone/application/index\view\wallet\index1.html";i:1511416553;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
    <div class="shouzhimingxi">
        <si-headers></si-headers>
        <si-content></si-content>
    </div>
</div>
<script type="text/x-template" id="content">
    <div class="content" @click="rightclick()">

        <div class="bj-flex" v-show="flexshow">
            <div class="weui-cells weui-cells_radio">
                <label class="weui-cell weui-check__label" for="x11" @click="ada(1)">
                    <div class="weui-cell__bd">
                        <p>支出</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="radio1" id="x11">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check__label" for="x12" @click="ada(2)">

                    <div class="weui-cell__bd">
                        <p>收入</p>
                    </div>
                    <div class="weui-cell__ft" >
                        <input type="radio" name="radio1" class="weui-check" id="x12" checked="checked">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
            </div>
        </div>

        <div class="tab" v-for="item in mingxi2">
            <div class="tab1">
                <div class="left">充值</div>
                <div class="right " :class="{active:item.guarantee<0}">{{item.guarantee}}</div>
            </div>
            <div class="tab2">
                <div class="left">{{item.create_time}}</div>
                <div class="right">余额:<?php echo $balance; ?></div>
            </div>
        </div>
        <span v-if="mingxi1.length==0">你还有收支明细</span>
        <div class="tab" v-for="item in mingxi1">
            <div class="tab1">
                <div class="left">
                    <span v-if="item.service_type_id==1">安装</span>
                    <span v-if="item.service_type_id==2">维修</span>
                    <span v-if="item.service_type_id==3">品质监理</span>
                    <span v-if="item.service_type_id==4">勘测</span>
                    <span v-if="item.service_type_id==5">更换灯片</span>
                    <span v-if="item.service_type_id==6">围板搭建</span>
                </div>
                <div class="right " :class="{active:item.amount_total<0}">{{item.amount_total}}</div>
            </div>
            <div class="tab2">
                <div class="left">{{item.order_time}}</div>
                <div class="right">余额:<?php echo $balance; ?></div>
            </div>
        </div>
    </div>
</script>

<script>
    var data={
        title: "收支明细",
        left:"<span class=\"icon-返回2\"></span><a  style='color: #fff'>返回</a>",
        right:"<div id='shaixuan'>筛选<span  class=\"icon-向下箭头2\"></span></div>",
        flexshow:false,
        mingxi1:<?php echo $mingxi1; ?>,
        mingxi2:<?php echo $mingxi2; ?>
    }
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return data
        },
        methods:{
            goback:function () {
                window.history.go(-1)
            },

        },
        mounted:function () {
            $("#shaixuan").click(function () {
                data.flexshow=!data.flexshow;
            })
        },
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return data
        },
        methods:{
            rightclick:function () {
                this.flexshow=false;
            },
            ada:function (i) {
                var _this=this;
                $.ajax({
                    type:"POST",
                    data:{id:i},
                    url:"__PUBLIC__wallet/index2",
                    success:function (data) {
                        if(data.code==200){
                            _this.mingxi1=data.data1
                            _this.mingxi2=data.data2
                        }
                    }
                })
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
