<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\wamp64\www\phone/application/index\view\personalcenter\zhifumima.html";i:1511416553;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
    <div class="shezhimima">
        <si-headers></si-headers>
        <si-content></si-content>
    </div>
</div>
<script type="text/x-template" id="content">
    <div>
        <div class="ora "></div>
        <div class="orange ora">
            <p>为了安全,先进行手机验证</p>
        </div>
        <div class="weui-cells_form">
            <div class="weui-cell bj-weui-cell">

                <div class="weui-cell__bd">
                    <input class="weui-input "  type="text"   v-model="phone"    value="">
                </div>
            </div>

            <div class="weui-cell bj-weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input "  type="text" v-model="yanzheng" id="" placeholder="请输入手机验证码" value="">
                </div>
                <div class="weui-cell__hd">
                    <label class="weui-label bj-label-color" @click="btn()" id="btnSendCode">获取验证码</label>
                </div>
            </div>
        </div>

        <div class="weui-flex button">
            <div class="weui-flex__item">
                <input value="下一步" type="button" class="weui-btn bj_button_orange" @click="nexts()">
            </div>
        </div>
        <div class="orange">
            <p>1.设置密码不可以和登录密码一致</p>
            <br>
            <p>2.一个手机号只能绑定一个手机号</p>
        </div>
    </div>
</script>

<script>
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "手机验证",
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
              phone:<?php echo $phone; ?>,
                yanzheng:''
            }
        },
        methods:{
btn:function(){
                var _this=this;
                //立即注册获取验证码
                var InterValObj; //timer变量，控制时间
                var count = 60; //间隔函数，1秒执行
                var curCount; //当前剩余秒数
                var phone  =$('#phone').val();

                $.showLoading();
                $.ajax({
                    timeout:60*1000,
                    type:'POST',
                    dataType:'json',
                    url:"__PUBLIC__auth/master_vcode",
                    data:{phone:_this.phone},
                    success: function(data) {
                        if (data.code == 200) {
                            $.hideLoading();
                            $.toast(data.msg, 'success', function(){
                                curCount = count;　　 //设置button效果，开始计时
                                $("#btnSendCode").attr("disabled",true);
                                $("#btnSendCode").css("pointer-events","none");
                                $("#btnSendCode").css("color","#ccc");
                                $("#btnSendCode").html(curCount + "秒后获取");
                                InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                            });
                        } else {
                            $.hideLoading();
                            $.toptip(data.msg, 'error');
                            return false;
                        }
                    }
                });
                //timer处理函数
                function SetRemainTime() {
                    if (curCount == 0) {
                        window.clearInterval(InterValObj); //停止计时器
                        $("#btnSendCode").removeAttr("disabled"); //启用按钮
                        $("#btnSendCode").css("pointer-events","auto");
                        $("#btnSendCode").css("color","##008cd0");
                        $("#btnSendCode").html("重新发送");
                    } else {

                        curCount--;
                        $("#btnSendCode").html(curCount + "秒后获取");
                    }
                }
            },
            nexts:function(){
               if(this.yanzheng==''){
                   $.toast('请输入验证码');
                   return;
               }
               var _this=this;
               $.ajax({
                   url:'__PUBLIC__chapt',
                   data:{yanzheng:_this.yanzheng,phone:_this.phone},
                   dataType:'json',
                   type:'post',
                   success:function(data){
                      if(data.code==200){
                         window.location.href="__PUBLIC__wallet/index9"
                      }else{
                          $.toptip(data.msg);
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
