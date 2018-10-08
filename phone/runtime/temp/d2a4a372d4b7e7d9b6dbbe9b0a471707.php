<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wamp64\www\phone/application/index\view\choose\index.html";i:1511830951;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
<div id="bj-app" class="yanzeng">
    <form>
        <si-headers></si-headers>
        <si-content ></si-content>
        <si-footer ></si-footer>
    </form>
</div>
<script type="text/x-template" id="content">
    <div>
        <div class="bj-top-bar">
            <div class="bj-shaixuan-left">
                <a href="__PUBLIC__screen/<?php echo $ornumber; ?>/zt/1" class="weui-btn weui-btn-yanzhemg bj_button_bluess">挑师父</a>
            </div>
            <div class="bj-shaixuan-content" >
                <span v-if="!fangdaShow"  class="icon-放大镜 img"></span>
                <input type="text" v-model="fangdaShow"  class="bj-input" placeholder="请输入师傅工号">
            </div>
            <div class="bj-shaixuan-right">

                <input type="button"  class="weui-btn-yanzhemg weui-btn bj_button_dali" value="验证" @click="yanzheng">
            </div>
        </div>
        <div class="weui-flex bj-huanyipi">
            <div class="weui-flex__item text-left">
                平台推荐师傅

            </div>
            <div class="weui-flex__item text-right" >
                <a href="javascript:;" @click="suini()">
                    <span class="text-right">换一批</span>
                </a>
            </div>
        </div>
        <div class="weui-panel weui-panel_access" v-for="item in datas">
            <div class="weui-panel__bd" >
                <a :href="PUBLIC+'master_information/'+ornumber+'/wid/'+item.uid+'?dd=2'" class="weui-media-box  weui-media-box_appmsg">
                    <div class="weui-media-box__hd weui-media-box_appmsg-img">
                        <img class="weui-media-box__thumb"  onerror="this.src='__PUBLIC__static/index/images/more.png'"  :src="DsQINiu+item.img">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">

                            <span v-if="item.real_name">{{item.real_name}}</span>
                            <span v-if="!item.real_name">当前师傅没有名字</span>
                        </h4>
                        <p class="weui-media-box__desc">服务类型:
                            <span v-if="item.service_type_id" v-for="che in item.service_type_id" >
                                {{che.title}}
                            </span>
                            <span v-if="!item.service_type_id">当前师傅没有服务类型</span>
                        </p>
                        <p class="weui-media-box__desc">技能标签:
                            <span v-if="item.work_skill" v-for="che in item.work_skill" class="">
                                {{che.title}}
                            </span>
                            <span v-if="!item.work_skill">当前师傅没有服务类型</span>
                        </p>
                        <p class="weui-media-box__desc size">累计接单:
                            <span v-if="item.wage">{{item.wage}}</span>
                            <span v-if="!item.wage">当前师傅还没有接单</span>
                        </p>
                    </div>
                </a>
            </div>
        </div>

    </div>

</script>
<script type="text/x-template" id="footer">

</script>
<script>



    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "挑选主任咨询主任师傅",
                left:"<span class=\"icon-返回2\"></span>返回",
                right:"",
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
                fangdaShow:'',
                datas:[],
                ornumber:'<?php echo $ornumber; ?>',

            }
        },
        methods:{
            suini:function () {
               var  $this=this;
                $.ajax({
                    url:"__PUBLIC__roand",
                    type:"post",
                    dataType:"json",
                    success:function (data) {
                        if(data.code){
                            $this.datas=data.data;
                        }
                    },
                    error:function () {

                    }
                })
            },
            yanzheng:function () {
                var  $this=this;
                if($this.fangdaShow==""){
                    $.toptip("请先输入师傅工号", 'error');
                    return false;
                }
                var link="__PUBLIC__"
                $.showLoading("正在发送请求");
                $.ajax({
                    url:"__PUBLIC__masterc",
                    type:"post",
                    dataType:"json",
                    data:{wid:$this.fangdaShow,ornumber:'<?php echo $ornumber; ?>',link:link},
                    success:function (data) {

                        if(data.code===200){
                            $.hideLoading();
                            setTimeout(function () {
                                window.location.href="__PUBLIC__consult1/"+$this.ornumber+'/wid/'+$this.fangdaShow;
                            },1000)
                            $.toptip(data.msg, 'success');
                        }else{
                            $.hideLoading();
                            $.toptip(data.msg, 'error');
                            $this.fangdaShow="";
                        }
                    },
                    error:function () {

                    }
                })
            }
        },
        mounted:function () {
            this.$nextTick(function () {
                    this.suini();
            })
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
</body>
