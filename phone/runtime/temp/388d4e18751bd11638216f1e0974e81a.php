<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"D:\wamp64\www\phone/application/index\view\details\details.html";i:1511167209;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
<div id="bj-app" class="weixiuxiadan">
    <form>
        <si-headers></si-headers>
        <si-content ></si-content>
        <si-footer ></si-footer>
    </form>
</div>
<script type="text/x-template" id="content">
    <div>
        <div  class="content" style="background: #fff">
            <div class="weui-flex">
                <div class="weui-flex__item left">
                    <label for="" class="weui-label bj-label-color">服务类型:</label>
                </div>
                <div class="weui-flex__item">
                <span class="weui-label content-item">
                    {{details.service}}
                </span>
                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item left">
                    <label class="weui-label bj-label-color" for="">服务品牌:</label>
                </div>
                <div class="weui-flex__item">
                    <label class="weui-label content-item">
                         {{details.brand}}
                    </label>
                </div>
                <div class="weui-flex__item">

                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item left">
                    <label class="weui-label bj-label-color" for="">商品类别:</label>
                </div>
                <div class="weui-flex__item">
                    <label class="weui-label content-item">
                        {{details.l1_category_id}}-{{details.l2_category_id}}
                    </label>
                </div>
                <div class="weui-flex__item">

                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item left" >
                    <label class="weui-label bj-label-color" for="">商品型号:</label>
                </div>
                <div class="weui-flex__item">
                    <label class="weui-label content-item">
                       {{details.type}} 
                    </label>
                </div>
                <div class="weui-flex__item">
                    <span>数量</span><span>{{details.qty}} </span>
                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item left">
                    <label class="weui-label bj-label-color" for="">故障概括:</label>
                </div>
                <div class="weui-flex__item">
                    <label class=" content-item">
                        {{details.trouble_tags}} 
                    </label>
                </div>
                <div class="weui-flex__item">
                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item border">
                    <label class="weui-label bj-label-color" for="">商品图片</label>
                </div>
            </div>
            <div class="weui-flex img" >
                <div  class="weui-flex__item">
                    <img :src="details.photo_trouble_position" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'">
                </div>
                <div  class="weui-flex__item">
                    <img :src="details.photo_trouble_detail1" alt="" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'">
                </div>
                <div  class="weui-flex__item">
                    <img :src="details.photo_trouble_detail2" alt="" onerror="this.src='__PUBLIC__static/index/images/ds_qiuqiu.png'">
                </div>
            </div>
            <div class="bg-primary-hieght"></div>
        </div>
        <div class="weui-cell__bd yanshou">
            <div class="weui-uploader">
                <div class="weui-uploader__hd">
                    <p class="weui-uploader__title">
                        <i class="icon-camera">
                        </i>
                        验收单
                    </p>
                </div>
                <div class="weui-uploader__bd">
                    <div class="weui-flex__item" id="uploaderInput" > 
                        <img id="img_data" height="100" width="100" onerror="this.src='__PUBLIC__static/index/images/tj.png'" :src="details.img_ysd"/>
                    
                    </div>
                    <div class="bn">
                        <input id=""  type="button" value=""  class="">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-primary-hieght"></div>
    </div>
</script>
<script type="text/x-template" id="footer">
        <div class="weui-flex">
            <div class="weui-flex__item">
                 <input type="button" @click="goback()"  class="weui-btn bj_button_orange" value="返回">
            </div>
        </div>
</script>
<script>
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "单个故障详情",
                left:"",
                right:""
                

            }
        },
        methods:{
           
        },
        mounted:function () {
            
        },
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return {
                titl:"单个故障详情",
                xis:[],
                details:<?php echo $details; ?>
            }
        },
        methods:{
            
        },
        mounted:function () {
            if (sessionStorage.baochun){
                var arr=sessionStorage.baochun
                arr = "["+arr+"]";
                arr = JSON.parse(arr)
                this.xis=arr
            }
        }
    });
    Vue.component('si-footer', {
        template: '#footer',
        data: function () {
            return {
            }
        },
        methods:{
             goback:function () {
                window.history.go(-1)
            },
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
