<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"D:\wamp64\www\phone/application/index\view\repair\suaidanpeishifu.html";i:1511586781;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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

<div class='app'>
  <headers></headers>
  <mian></mian>
  <menus></menus>
</div>
<script type="text/x-template" id='mian'>

  <div class='suaidanpeishifu'>
    <div class="weui-cells weui-cells_form border-none">
      <div class="weui-cell">
        <div class="weui-cell__hd">
          <label class="weui-label label">订单编号：</label>
        </div>
        <div class="weui-cell__bd">
          <span class='weui-input label-span'>{{order_number}}</span>
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd">
          <label class="weui-label label">您的称呼：</label>
        </div>
        <div class="weui-cell__bd">
          <span class='weui-input label-span'>{{order.contact_name}}</span>
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd">
          <label class="weui-label label">详细地址：</label>
        </div>
        <div class="weui-cell__bd">
          <span class='weui-input label-span'>{{order.full_location}}</span>
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd">
          <label class="weui-label label">楼号-门牌号：</label>
        </div>
        <div class="weui-cell__bd">
          <span class='weui-input label-span'>{{order.location_ext}}</span>
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd">
          <label class="weui-label label">服务时间：</label>
        </div>
        <div class="weui-cell__bd label-span">
          <span> {{order.start_time}}</span>
        </div>
      </div>
      <div class="weui-cell bg"></div>
      <div class="weui-table">
        <div class="weui-table-tr">
          <div class="weui-cell-item">
            <span>项目</span>
          </div>
          <div class="weui-cell-item">
            <span>平台指导价</span>
          </div>
          <div class="weui-cell-item">
            <span>客户预算价</span>
          </div>
        </div>
        <!--维修-->
        <div class='weui-table-th' v-if="item.service_type_id===2" v-for="(item,index) in list[0]">
            <div class="weui-cell-item">
                <span >维修{{item.commodity}}</span>
            </div>
            <div class="weui-cell-item">
                <span >自定义</span>
            </div>
            <div class="weui-cell-item">
                <input type="text" v-model="datas.baojia[index]" class="weui-input">
            </div>
        </div>
        <!--安装-->
        <div class='weui-table-th' v-if="item.service_type_id===1" v-for="(item,index) in list[0]">
            <div class="weui-cell-item">
                <span >安装{{item.commodity}}</span>
            </div>
            <div class="weui-cell-item">
                <span >自定义</span>
            </div>
            <div class="weui-cell-item">
                <input type="text" v-model="datas.baojia[index]" class="weui-input">
            </div>
        </div>
        <!--更换灯片-->
        <div class='weui-table-th' v-if="item.service_type_id===5" v-for="(item,index) in list[0]">
            <div class="weui-cell-item">
                <span >更换灯片{{item.commodity}}</span>
            </div>
            <div class="weui-cell-item">
                <span >自定义</span>
            </div>
            <div class="weui-cell-item">
                <input type="text" v-model="datas.baojia[index]" class="weui-input">
            </div>
        </div>
        <!--围板搭建-->
        <div class='weui-table-th' v-if="item.service_type_id===6"  v-for="(item,index) in list[0]">
            <div class="weui-cell-item">
                 <span>围板搭建{{item.commodity}}</span>
            </div>
            <div class="weui-cell-item">
                 <span >自定义</span>
            </div>
            <div class="weui-cell-item">
                 <input type="text" v-model="datas.baojia[index]" class="weui-input">
            </div>
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd">
          <label class="weui-label label">招募留言：</label>
        </div>
        <div class="weui-cell__bd label-span">
          <div class="weui-cell weui-cell_select">
            <div class="weui-cell__bd select-after">
              <input type="text" v-model="datas.message" class="weui-input" id="eleme">
            </div>
          </div>
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__bd">
           <div class='checkbox'>
             <input type='checkbox' value="1" v-model="datas.xianshi" id='checkbox1' name='checkboox'>
             <label for='checkbox1' class='label-span'>招标是否显示预算价</label>
           </div>
         </div>
        </div>
      </div>

      <div class="weui-flex-userbtn">
      <div class="weui-flex-item">
         
          <input type="button"  @click="order_select" class="weui-btn weui-btn_warn btn-orange" value="下单找师傅">
      </div>
    </div>
    </div>
    
  </div>
</script>
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
    sex: 2,
    order_number:'<?php echo $order_number; ?>',
    order:<?php echo $order; ?>,
    list:<?php echo $list; ?>,
    datas:{
      baojia:[],
      message:"",
      xianshi:"",

    }
    
  }
  Vue.component('mian', {
    template: '#mian',
    data: function () {
      return data
    },
    methods: {
      getdate: function () {
        var x = new Date();
        var n = x.getFullYear(); //获取当前日期
        var y = x.getMonth() + 1; //获取当前日期
        var r = x.getDate(); //获取当前日期
        return n + "-" + y + "-" + r;
      },
      order_select:function(){
        var i=0;
        if(this.datas.baojia.length!==this.list[0].length){
            $.toast('请填写预算价');
            return false;
        }
        for(var m=0;m<this.datas.baojia.length;m++){
          var ns=this.datas.baojia[m];
          if(ns==""||ns==0){
              i++;
            }
        }
        if(i==this.list[0].length){
          $.toast('请填写预算价');
           return false;
        }
        var _this=this;
        var link = '__PUBLIC__grab_single/'+_this.order_number;
        $.showLoading();
        $.ajax({
          url:'__PUBLIC__get_money',
          data:{datas:_this.datas,order_number:_this.order_number,link:link},
          dataType:'json',
          type:'post',
          success:function(data){
             if(data.code==200){
               $.hideLoading();
               window.location.href="__PUBLIC__message_list/"+_this.order_number;
             }else{
               $.hideLoading();
               $.tiptop(data.msg);

             }
          }
        })
      }
    },
    mounted: function () {
        var _this=this;
      $('#time').datetimePicker({
        min: this.getdate()
      });
     $("#eleme").select(
    {
      title:"选择发送信息",
      items:[{
        value:"施工工具齐全,无需师傅携带工具",
        title:"施工工具齐全,无需师傅携带工具"
      },{
        value:"施工时间不限制，随时都可以",
        title:"施工时间不限制，随时都可以"
      },{
        value:"交通便利,师傅出行方便",
        title:"交通便利,师傅出行方便"
      },{
        value:"运输工具齐全,省时又省力",
        title:"运输工具齐全,省时又省力"
      }],
       onChange:function (val) {
            _this.datas.message=val.titles;
          }
      });
    }
  }) 
  //头
  Vue.component('headers', {
    template: '#header',
    data: function () {
      return {
        title: "甩单配师傅"
      }
    },
    methods: {
      goback: function () {
        window.history.go(-1)
      }
    }
  })
  Vue.component('menus', {
    template: '#menu',
    data: function () {
      return {}
    }
  })
  Vue.component('footers', {
    template: '#footers',
    data: function () {
      return {}
    }
  })
  new Vue({
    el: '.app'
  })
</script>