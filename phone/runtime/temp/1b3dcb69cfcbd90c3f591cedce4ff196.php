<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wamp64\www\phone/application/index\view\repair\page.html";i:1511586781;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
<body>
<div id="bj-app">
    <div class="page">
        <si-headers></si-headers>
        <si-content></si-content>
    </div>
</div>
<script type="text/x-template" id="content">
    <form autocomplete="off">
        <div class="weui-cells_form">
            <div class="weui-cell bj-weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label bj-label-color">服务类型:</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input label-span" v-model="datau.lei" type="text" disabled value="维修">
                </div>
            </div>
            <div class="weui-cell bj-weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label bj-label-color">服务品牌:</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input label-span" type="text" name="brand"  v-model="datau.brand" id="brand" placeholder="请选择服务品牌">
                </div>
            </div>
            <div class="weui-cell bj-weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label bj-label-color">商品大类:</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input label-span" type="text" v-model="datau.service" id="service"  placeholder="请选择商品大类">
                </div>
            </div>
            <div class="weui-cell bj-weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label bj-label-color">商品小类:</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input label-span" type="text" v-model="datau.little" id="little"  placeholder="请选择商品小类">
                </div>
            </div>
            <div class="weui-cell bj-weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label  bj-label-color">故障概括:</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input label-span" type="text" v-model="datau.malfunction" id="malfunction"  placeholder="请选择故障概括">
                </div>
            </div>
            <div class="weui-cell bj-weui-cell">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label bj-label-color">商品型号:</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="text" class="page_xinhao" v-model="datau.xinhao" id="xinhao"  >
                </div>
                <div class="weui-cell__ft">
                    <ul class="btn-numbox">
                        <li>
                            <ul class="count">
                                <li>
                                    <span id="num-jian"  @click="add(-1)"  class="num-jian">-</span>
                                </li>
                                <li style="margin-left: 5px;margin-right: 5px">
                                    <input type="text" disabled name="num" style="width:38px; "  v-model="datau.msg" class="input-num" id="input-num"/>
                                </li>
                                <li>
                                    <span id="num-jia"  @click="add(1)" class="num-jia">+</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item bj_shangchuan">
                    <div class="weui-label">
                            <i  class="icon-camera_c title icon-camera "></i>
                            上传图片:
                    </div>
                </div>
            </div>
            <div class="weui-flex" style="min-height: 120px">
                 <div class="weui-flex__item">
                     <div id="uploaderInput">
                         <img id="img_data"  style="width: 100%;height: 120px"  onerror="this.src='__PUBLIC__static/index/images/tj.png'" src="__PUBLIC__static/index/images/tj.png"/>
                     </div>
                 </div>
                 <div class="weui-flex__item" >
                     <div id="uploaderInput1">
                         <img id="img_data1" style="width: 100%;height: 120px"  onerror="this.src='__PUBLIC__static/index/images/tj.png'" src="__PUBLIC__static/index/images/tj.png"/>
                     </div>
                 </div>
                 <div class="weui-flex__item" >
                     <div id="uploaderInput2">
                         <img id="img_data2"  style="width: 100%;height: 120px" onerror="this.src='__PUBLIC__static/index/images/tj.png'" src="__PUBLIC__static/index/images/tj.png"/>
                     </div>
                 </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item">
                    <input class="weui-input bj-guzhang " v-model="datau.accident"  type="text"  placeholder="请描述故障详情">
                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item" >
                </div>
            </div>
            <div class="weui-flex button">
                <div class="weui-flex__item">
                    <input type="button" @click="baochun(1)" class="weui-btn bj_button_orange" value="添加项目" id="baochun">
                </div>
                <div class="weui-flex__item">
                    <input type="button"  class="weui-btn bj_button_blue" @click="baochun(2)" value="下一步">
                </div>
            </div>
        </div>
    </form>
</script>
 <script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
<script>
//t头部模版声明三个变量
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "新增加项目"+(sessionStorage.id?parseInt(sessionStorage.id):1),
                left:"",
                right:"",
            }
        },
    });
//    声明中间 需要提交的v-model双向数据绑定
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return {
                datau:{
                        msg:"",
                        lei:"维修",
                        accident:'',
                        dalei:"",
                        xiaolei:"",
                        pianpai:"",
                        guzhang:"",
                        xinhao:"",
                        img:"",
                        img1:"",
                        img2:"",
                        service:'',
                        brand:'',
                        malfunction :"",
                        little:"",

                },

                brands:<?php echo $brand; ?>,
                category:<?php echo $category; ?>,
                commodity:<?php echo $commodity; ?>,
                goods:<?php echo $goods; ?>,
                ids:sessionStorage.id?sessionStorage.id+1:1
            }
        },
        methods: {
            add: function (wa) {
                if (wa > 0) {
                    this.datau.msg++;
                } else {
                    this.datau.msg--;
                    if (this.datau.msg < 1) {
                        this.datau.msg = 0;
                    }
                }
            },
            baochun: function (i) {
                if(this.ids==3){
                    $.toptip("只能添加三次","success");
                    return false;
                }

                if(this.datau.brand===""){
                    $.toptip('请选择品牌', 2000, 'error');
                    return false
                }
                if(this.datau.service===""){
                    $.toptip('请选择商品大类', 2000, 'error');
                    return false
                }
                if(this.datau.little===""){
                    $.toptip('请选择商品小类', 2000, 'error');
                    return false
                }
                if (sessionStorage.baochun)
                {

                    var data=[sessionStorage.baochun];
                    var str = JSON.stringify(this._data.datau);
                    data.push(str)
                    sessionStorage.baochun=data;

                    sessionStorage.id=++this.ids;
                        if(i==2){
                            window.location.href="__PUBLIC__repair_information";
                        }else {
                            window.location.href="__PUBLIC__repair_order"
                        }

                }
                else
                {

                    var str = JSON.stringify(this._data.datau);
                    var data=[str];
                    sessionStorage.baochun=data;
                    sessionStorage.id=++this.ids;
                    if(i==2){
                        window.location.href="__PUBLIC__repair_information";
                    }else {
                        window.location.href="__PUBLIC__repair_order"
                    }
                }
                


            },
            quxiao:function () {
               
            },
            fun1:function (val) {
                this.datau.brand=val.titles;
                this.datau.pianpai=val.values;
            },
            fun2:function (val) {
                this.datau.malfunction=val.titles;
                this.datau.guzhang=val.values;
            },
            fun3:function (val) {
                this.datau.little=val.titles;
                this.datau.xiaolei=val.values;
            },
            fun4:function (val) {
                this.datau.service=val.titles;
                this.datau.dalei=val.values;
            },
            fun5:function (file, data, response) {
                this.datau.img='__DsQINiu__' +data._raw;
                $("#img_data").attr('src', '__DsQINiu__' + data._raw).show();
            },
            fun6:function (file, data, response) {
                this.datau.img1='__DsQINiu__' +data._raw;
                $("#img_data1").attr('src', '__DsQINiu__' + data._raw).show();
            },
            fun7:function (file, data, response) {
                this.datau.img2='__DsQINiu__' +data._raw;
                $("#img_data2").attr('src', '__DsQINiu__' + data._raw).show();
            }
        }
        ,mounted:function () {
            this.select("brand","选择品牌",false,this.brands,this.fun1)
            this.select("malfunction","选择故障概括",true,this.goods,this.fun2)
            this.select("little","请选择商品小类",false,this.commodity,this.fun3)
            this.select("service","请选择商品大类",false,this.category,this.fun4)
            this.WebUploader("uploaderInput",this.fun5)
            this.WebUploader("uploaderInput1",this.fun6)
            this.WebUploader("uploaderInput2",this.fun7)
        },
    });
    new Vue({
        el: '#bj-app',
        methods:{
        }
    })
</script>
</body>
