<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\wamp64\www\phone/application/index\view\repair\kehuxingxi.html";i:1511484706;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
  <link rel="stylesheet" href="__indexStatic__css/index2.css">
  <link rel="stylesheet" href="__indexStatic__css/index3.css">
  <script src='__indexStatic__js/vue.min.js'></script>
  <script src='__indexStatic__js/jquery-2.1.4.js'></script>
  <script src='__indexStatic__js/jquery-weui.min.js'></script>
  <!-- <script src='__indexStatic__js/fastclick.js'></script> -->
  <script src='__indexStatic__js/index.js'></script>
  <script src='__indexStatic__js/public.js'></script>
  <script>
  var ds_public='__PUBLIC__';
    var html = $('html')
    var hW = html.outerWidth() > 640 ? 640 : html.outerWidth()
    _rem = 16
    html.css('fontSize', _rem)
    $(function () {
      // FastClick.attach(document.body)
    })
     Vue.prototype.WebUploader=function (element,func,i) {
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
    Vue.prototype.WebUploader1=function (element,i) {

     setTimeout(function(){
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
          'onUploadSuccess': function(file, data, response){
            $("#arr"+i).attr("src","__DsQINiu__" + data._raw).show();
            var urls = data._raw;
            $.ajax({
              url:'__PUBLIC__img',
              data:{urls:urls},
              dataType:'json',
              type:'post',
              success:function(data){
                  if(data.code==200){
                    var ids = data.datas;
                    datas.arr[i]=ids;
                  }else {
                    $.tiptop(data.msg);
                  }
               }
            })
          },
      })
     },10)
    }
    Vue.prototype.WebUploader2=function (element,i) {

setTimeout(function(){
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
          'onUploadSuccess': function(file, data, response){
             $("#arrs"+i).attr("src","__DsQINiu__" + data._raw).show();
             var urls =  data._raw;
            $.ajax({
              url:'__PUBLIC__img',
              data:{urls:urls},
              dataType:'json',
              type:'post',
              success:function(data){
                  if(data.code==200){
                    var ids = data.datas;
                    datas.arrs[i]=ids;
                  }else {
                    $.tiptop(data.msg);
                  }
               }
            })
          }
      })
},10)
      
    }
  </script>
</head>

<body>
<span hidden="hidden"><?php echo session('id'); ?><?php echo session('ds_username'); ?><?php echo session('type'); ?><?php echo session('openid'); ?></span>
  <div id="app" style='padding-bottom: 53px;padding-top:40px'>
<script type="text/x-template" id='header'>
      <div class='header'>
          <div class="header-wrapper">
            <div class="header-left" @click='goback()'>
              <i class='icon-arrow_lift'></i>
              <span class='goback'>返回</span>
            </div>
            <div class="header-content">
              <span class='text'>{{title}}</span>
            </div>
            <div class="header-right"></div>
          </div>
        </div>
    </script>

<script src='__indexStatic__js/city-picker.js'></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__static/index/webupload/style.css">
<div class='app' id="">
    <headers></headers>
    <mian></mian>
    <menus></menus>
</div>
<script type="text/x-template" id='mian'>
    <div class='kehuinfo'>
        <div class="weui-cells weui-cells_form border-none">
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">客户ID：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label' disabled type='text' v-model="datas.uid" placeholder="">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">联系人：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label' type='text'  v-model="datas.name" placeholder="请输入您的姓名...">
                </div>
                <div class="weui-cell__hd">
                    <a href="__PUBLIC__address_admin" class="weui-label label">编辑地址</a>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">联系电话：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label' type='text'  v-model="datas.phone" placeholder="请输入您的联系电话...">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">店铺地址：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label' id="city-picker" type='text' v-model="datas.address_area" placeholder="请填写您的店铺地址">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">详细地址：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label' type='text' v-model="datas.address" placeholder="请填写您的详细地址">
                </div>
            </div>
            <div class="weui-cell bg"></div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">商场名称：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label' v-model="shanchuang" type='text' placeholder="请填写商场名称">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">服务时间：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label'  type='text' id='datetime-picker'>
                </div>
            </div>
            <div class="weui-cell bg"></div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">商场办证：</label>
                </div>
                <div class="weui-cell__bd">
                    <span class="radio_box">
            <input type="radio" id="radio_1" name="radio" value="1" :checked="radio1==1" v-model="radio1">
            <label for="radio_1"></label>
            <span class='text'>商场代办</span>
                    </span>
                    <span class="radio_box">
            <input type="radio" id="radio_2" name="radio" value="2" :checked="radio1==2" v-model="radio1">
            <label for="radio_2"></label>
            <span class='text'>客户办理</span>
                    </span>
                    <span class="radio_box">
            <input type="radio" id="radio_3" name="radio" value="3" :checked="radio1==3" v-model="radio1">
            <label for="radio_3"></label>
            <span class='text'>不需要</span>
                    </span>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd">
                            <p class="weui-uploader__title"><i class='icon-camera' style='color: #ff5200;'></i> 门头照</p>
                        </div>
                        <div class="weui-uploader__bd">
                            <ul class="weui-uploader__files" id="uploaderFiles">
                                <div class="weui-flex__item" id="uploaderInput" >
                                    <img id="img_data" height="100" width="100" onerror="this.src='__PUBLIC__static/index/images/tj.png'" src="__PUBLIC__static/index/images/tj.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class='checkbox'>
                        <input type='checkbox' @click="hedan==1?hedan=0:hedan=1" id='checkbox1' name='checkboox[]'>
                        <label for='checkbox1'  class='label-span'>需现场调查，进一步核实</label>
                    </div>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class='checkbox'>
                        <input type='checkbox' @click="yuejie==1?yuejie=0:yuejie=1" id='checkbox2' name='checkboox[]'>
                        <label for='checkbox2'  class='label-span'>使用平台月结服务</label>
                    </div>
                </div>
            </div>
            <div class="weui-cell" v-if="yuejie">
                <div class="weui-cell__hd">
                    <label class="weui-label label">月结密码：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class='weui-input label' v-model="pwd" type='text' placeholder="请填写月结密码">
                </div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item">
                    <a href="__PUBLIC__agreement">
                        <span style="color: #00a2d4;font-size: 12px" class="yezhu">《业主协议》</span>
                    </a>
                    <span class="checkbox_box agree">
                		<input type="checkbox" v-model="checked3" id="checked3" name="checkbox2">
                        <label style="color: #000;font-size: 12px" for="checked3">我同意</label>
                	</span>
                </div>
            </div>
            <div class="weui-flex" style="margin-top: 20px">
                <div class="weui-flex__item">
                    <input @click="baocun(1)" :disabled="!checked3" type="button" class="weui-btn" style=" background:#58a22f ;width: 80%;color :#ffffff" value="直接下单">
                </div>
                <div class="weui-flex__item"  v-if="!yuejie">
                    <input @click="baocun(2)" :disabled="!checked3" type="button" class="weui-btn" style=" background:#ff8270;width: 80%;color :#ffffff" value="咨询下单">
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
<script type="text/x-template" id='menu'>
  <div>
    <div class="weui-tabbar" style='position:fixed'>
      <a href="__PUBLIC__" class="weui-tabbar__item weui-bar__item--on">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_button.png" alt="">
        </div>
        <p class="weui-tabbar__label">首页</p>
      </a>
      <a href="__PUBLIC__order_customer_home" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_msg.png" alt="">
        </div>
        <p class="weui-tabbar__label">订单管理</p>
      </a>
      <a href="javascript:;" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_article.png" alt="">
        </div>
        <p class="weui-tabbar__label">购物车</p>
      </a>
     <a href="__PUBLIC__customer_home" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_cell.png" alt="">
        </div>
        <p class="weui-tabbar__label">我的</p>
      </a>
    </div>
  </div>
</script> 
<script src="__PUBLIC__static/index/js/jquery.form.js"></script>
<script type="text/x-template" id='footers'>
	<div>
		<div class="weui-footer">
		    <p class="weui-footer__links">
		        <a href="javascript:void(0);" class="weui-footer__link">Biao-Jiang  首页</a>
		    </p>
		    <p class="weui-footer__text">Copyright © 2008-2016 biao.jiang</p>
		</div>
	</div>
</script>

<script>
    var data = {
        sex: 1,
        datas:<?php echo $list; ?>,
        radio1:1,
        shanchuang:'',
        times:"",
        hedan:0,
        yuejie:0,
        mentouzhao:'',
        yanshou:"",
        pwd:"",
        checked3:false
    }
    Vue.component('mian', {
        template: '#mian',
        data: function() {
            return data
        },
        methods: {
            baocun:function(i){
                if(this.datas.name===""){
                    $.toptip('请输入您的姓名', 2000, 'error');
                    return false
                }

                if(this.datas.phone===""){
                    $.toptip('请输入您的联系电话', 2000, 'error');
                    return false
                }

                if(this.datas.address_area===""){
                    $.toptip('请填写您的店铺地址', 2000, 'error');
                    return false
                }

                if(this.datas.address===""){
                    $.toptip('请填写您的详细地址', 2000, 'error');
                    return false
                }
                if(this.shanchuang===""){
                    $.toptip('请填写商场名称', 2000, 'error');
                    return false
                }
                if(this.yuejie){
                    if(this.pwd===""){
                        $.toptip('请填写月结密码', 2000, 'error');
                        return false
                    }
                }
                var seee=sessionStorage.baochun;
                var vu=this._data;
                var data=[seee,vu] ;
                $.ajax({
                    url:"__PUBLIC__direct_order",
                    data:{data:data,i:i,yue:vu.yuejie,pwd:vu.pwd},
                    type:'post',
                    dataType:'json',
                    success:function(data){
                        if(data.code==200){
                            console.log()
                            if(data.data.code==202){
                                window.location.href="__PUBLIC__apply/month";
                            }else{
                                sessionStorage.removeItem("baochun")
                                sessionStorage.removeItem("id");
                                if(i==1){
                                    window.location.href="__PUBLIC__customer_rejection/"+data.order_number;
                                }else{
                                    window.location.href="__PUBLIC__choose/"+data.order_number;
                                }
                            }



                        }else if(data.code==202){
                            $.toptip(data.msg, 2000, 'error');
                        }else if(data.code==201){
                            $.toptip(data.msg, 2000, 'error');
                        }
                    }

                });

            },
            fun1:function (file, data, response) {
                this.mentouzhao='__DsQINiu__' +data._raw;
                $("#img_data").attr('src', '__DsQINiu__' + data._raw).show();
            }
        },
        mounted: function() {
            var _this=this;
            $("#city-picker").cityPicker({
                title: "请选择所在地区",onChange:function(data){
                    _this.datas.address_area=data.displayValue.join('-');
                }
            });
            $("#datetime-picker").datetimePicker({
                onChange:function(data){
                    _this.times =data.displayValue.join('-')
                }
            });
            if(sessionStorage.yanshou){
                this.yanshou=sessionStorage.yanshou;
            }
            this.WebUploader("uploaderInput",this.fun1)

        }
    })
    //头
    Vue.component('headers', {
        template: '#header',
        data: function() {
            return {
                title: "客户信息"
            }
        },
        methods: {
            goback: function() {
                window.history.go(-1)
            }
        }
    })
    Vue.component('menus', {
        template: '#menu',
        data: function() {
            return {}
        }
    })
    Vue.component('footers', {
        template: '#footers',
        data: function() {
            return {}
        }
    })
    new Vue({
        el: '.app'
    })
</script>
