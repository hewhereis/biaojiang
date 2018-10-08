<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wamp64\www\phone/application/index\view\repair\index.html";i:1511508971;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/style.css">
<div id="bj-app" class="weixiuxiadan">
    <form>
        <si-headers></si-headers>
        <si-content ></si-content>
        <si-footer ></si-footer>
    </form>
</div>
<template type="text/x-template" id="content">
        <div  class="content">
                <div v-for="(item, index) in xis" class="tab">
                    <div class="tab-header">
                        <div class="weui-flex">
                            <div class="weui-flex__item left">
                                <label for="" class="weui-label bj-label-color">维修项目 {{index+1}}</label>
                            </div>
                            <div class="weui-flex__item">
                <span class="weui-label content-item">
                    
                </span>
                            </div>
                            <div class="weui-flex__item right">
                                <label for=""  class="weui-label" @click="deletes(index)">
                                    <span>删除</span>
                                </label>
                            </div>
                        </div>
                    </div>
                     <div class="weui-flex">
                            <div class="weui-flex__item left">
                                <label for="" class="weui-label bj-label-color">服务类型</label>
                            </div>
                            <div class="weui-flex__item">
                <span class="weui-label content-item">
                    {{item.lei}}
                </span>
                            </div>
                            <div class="weui-flex__item right">
                              
                            </div>
                        </div>
                    <div class="weui-flex">
                        <div class="weui-flex__item left">
                            <label class="weui-label bj-label-color" for="">服务品牌</label>
                        </div>
                        <div class="weui-flex__item">
                            <label class="weui-label content-item">
                                {{item.brand}}
                            </label>
                        </div>
                    </div>
                    <div class="weui-flex">
                        <div class="weui-flex__item left">
                            <label class="weui-label bj-label-color" for="">商品类别</label>
                        </div>
                        <div class="weui-flex__item">
                            <label class="weui-label content-item">
                                {{item.service}}{{item.little}}
                            </label>
                        </div>
                    </div>
                    <div class="weui-flex">
                        <div class="weui-flex__item left" >
                            <label class="weui-label bj-label-color" for="">商品型号</label>
                        </div>
                        <div class="weui-flex__item">
                            <label class="weui-label content-item">
                                {{item.xinhao}}   {{item.msg}}
                            </label>
                        </div>
                    </div>
                    <div class="weui-flex">
                        <div class="weui-flex__item left">
                            <label class="weui-label bj-label-color" for="">故障概括</label>
                        </div>
                        <div class="weui-flex__item">
                            <label class="weui-label content-item">
                                {{item.malfunction}}
                            </label>
                        </div>
                    </div>
                    <div class="weui-flex">
                        <div class="weui-flex__item">
                            <label class="weui-label bj-label-color" for="">维修照片</label>
                        </div>
                    </div>
                    <div class="weui-flex img" >
                        <div  class="weui-flex__item">
                            <img :src="item.img" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'">
                        </div>
                        <div  class="weui-flex__item">
                            <img :src="item.img1" alt="" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'">
                        </div>
                        <div  class="weui-flex__item">
                            <img :src="item.img2" alt="" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'">
                        </div>
                    </div>
                    <div class="weui-flex">
                        <div class="weui-flex__item left">
                            <label class="weui-label bj-label-color" for="">故障描述:</label>
                        </div>
                        <div class="weui-flex__item">
                            <label class="weui-label content-item">
                                {{item.accident}}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="weui-cell__bd yanshou">
            <div class="weui-uploader">
                <div class="weui-uploader__hd">
                    <p class="weui-uploader__title">
                        <i class="icon-camera">
                        </i>
                        <span>上传项目图片</span>
                    </p>
                </div>
                <div class="weui-uploader__hd">
                    <div class="" id="uploaderInput" >
                        <img id="img_data" height="100" width="100" onerror="this.src='__PUBLIC__static/index/images/taj.png'" src="__PUBLIC__static/index/images/taj.png"/>
                    </div>
                    <div class="bn">
                        <span>维修验收单</span>
                    </div>
                </div>
            </div>
        </div>
            <div class="weui-flex">
                <div class="weui-flex__item">
                    <!-- <button  class="weui-btn bj_button_orange"></button> -->
                    <a href="__PUBLIC__customer_information" class="weui-btn bj_button_orange">下一步</a>
                </div>
            </div>
        </div>
</template>
<script type="text/x-template" id="footer">

</script>
<script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
<script>
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "店铺维修",
                left:" <span class=\"icon-返回2\"></span><a  style='color: #fff'>返回</a>",
                right:"  <div id='zengjia'> <span style='font-size: 22px;position: relative;top: 5px' <span class='icon-jiahao'></span></span> <span>添加</span> </div></div>"


            }
        },
        methods:{
            goback:function () {
                window.history.go(-1)
            },
        },
        mounted:function () {
            $("#zengjia").click(function () {
                window.location.href="__PUBLIC__repair_order"
            })
        },
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return {
                titl:"店铺维修",
                xis:[],



            }
        },
        methods:{
            deletes:function (index) {
                var _this=this;
                $.actions({
                    actions: [{
                        text: "确定删除吗",
                        onClick: function() {
                            if(_this.xis.length!==0){
                                _this.xis.splice(index,1);
                                if(_this.xis.length==0){
                                    sessionStorage.removeItem("baochun")

                             sessionStorage.id=_this.xis.length;
                                }else{
                                    var str = JSON.stringify(_this.xis);
                                    sessionStorage.baochun=str;
                                    sessionStorage.id=_this.xis.length;
                                }
                            }
                        }
                    },
                    ]
                });
            },
            fun1:function (file, data, response) {
                sessionStorage.yanshou='__DsQINiu__' +data._raw;
                $("#img_data").attr('src', '__DsQINiu__' + data._raw).show();
            }
        },
        mounted:function () {
            if (sessionStorage.baochun){
                var arr=sessionStorage.baochun
                arr = "["+arr+"]";
                arr = JSON.parse(arr)
                this.xis=arr
            }
            //图片上传
            this.WebUploader("uploaderInput",this.fun1)
        }
    });
    Vue.component('si-footer', {
        template: '#footer',
        data: function () {
            return {
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
<script>

</script>
</body>
