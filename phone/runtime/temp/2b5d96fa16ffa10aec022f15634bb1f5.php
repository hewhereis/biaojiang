<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"D:\wamp64\www\phone/application/index\view\repair\dingdandingbiao.html";i:1511754021;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
  <div class='Dingdan'>
      <div class="weui-cells weui-cells_form border-none">
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label label">订单编号：</label></div>
            <div class="weui-cell__bd">
               <span class='weui-input label'>{{order_number}}</span>
            </div>
         </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label label">您的称呼：</label></div>
            <div class="weui-cell__bd">
               <span class='weui-input label'>{{contact_name}}</span>
               <div class='raido label'>
               </div>
            </div>
         </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label label">详细地址：</label></div>
            <div class="weui-cell__bd">
               <span class='weui-input label'>{{full_location}}</span>
            </div>
         </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label label">楼号-门牌号：</label></div>
            <div class="weui-cell__bd">
               <span class='weui-input label'>{{location_ext}}</span>
            </div>
         </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label label">服务时间：</label></div>
            <div class="weui-cell__bd label">
               <span> {{start_time}}</span>
            </div>
         </div>
         <div class="weui-cell bg"></div>
         <div class="weui-table">
            <div class="weui-table-tr">
               <div class="weui-cell-item"><span>项目</span></div>
               <div class="weui-cell-item"><span>客户预算价</span></div>
               <div class="weui-cell-item"><span>故障详情</span></div>
            </div>
            <!-- 维修 -->
            <div class='weui-table-th' v-if="item.service_type_id===2" v-for="(item,index) in list">
               <div class="weui-cell-item"><span>维修{{item.commodity}}</span></div>
               <div class="weui-cell-item">￥<span>{{item.budget}}</span></div>
               <div class="weui-cell-item"><a :href="'__PUBLIC__repair_details/'+item.id" class='a-link'><span>查看详情>></span></a></div>
            </div>
            <!-- 安装 -->
            <div class='weui-table-th' v-if="item.service_type_id===1" v-for="(item,index) in list">
               <div class="weui-cell-item"><span>维修{{item.commodity}}</span></div>
               <div class="weui-cell-item">￥<span>{{item.budget}}</span></div>
               <div class="weui-cell-item"><a href="" class='a-link'><span>查看详情>></span></a></div>
            </div>
            <!-- 更换灯片 -->
            <div class='weui-table-th' v-if="item.service_type_id===5" v-for="(item,index) in list">
               <div class="weui-cell-item"><span>维修{{item.commodity}}</span></div>
               <div class="weui-cell-item">￥<span>{{item.budget}}</span></div>
               <div class="weui-cell-item"><a href="" class='a-link'><span>查看详情>></span></a></div>
            </div>
            <!-- 围板搭建 -->
            <div class='weui-table-th' v-if="item.service_type_id===6" v-for="(item,index) in list">
               <div class="weui-cell-item"><span>维修{{item.commodity}}</span></div>
               <div class="weui-cell-item">￥<span>{{item.budget}}</span></div>
               <div class="weui-cell-item"><a href="" class='a-link'><span>查看详情>></span></a></div>
            </div>
         </div>
         <div class='weui-table'>
            <div class='weui-text label'>
               <span>合 计：</span>
               <span>￥</span><span>{{totals}}</span>
               <!-- <span class='tip'>（含12%的税费）</span> -->
            </div>
         </div>
         <div class="weui-cell bg"></div>
         <div v-if="master.length==0">还没有师傅抢单哦</div>
         
         <div v-if="master.length!==0" class="weui-card" v-for="(item,index) in master">
            <div class="weui-card-coneten">
               <div class="weui-card-top">
                  <div class="photo">
                     <img class='img' src="{{item.img}}" alt="" width='37' height='37' onerror="this.src='__PUBLIC__static/index/images/moren.jpg'">
                  </div>
                  <div class='info'>
                     <p class='p'>
                        <span class='name'>{{item.real_name}}</span>  
                        <span class='icon renzhen'></span>
                        <span class='icon bao' v-show="item.guarantee"></span>
                     </p>
                     <p class='p'>
                        <span class='b-price'>师傅报价：</span>
                        <span class='price'>￥<span >{{item.totals}}</span></span>
                     </p>
                     <input type="button" @click="add(item.worker_id,'<?php echo $order_number; ?>',item.totals)" class="weui-btn weui-btn_mini weui-btn_primary ok" value="选定师傅">
                     
                  </div>
               </div>
               <div class="weui-card-bottom">
                  <div class='class'>
                     <span>服务类型：</span>
                     <span v-for="(items,i) in item.service">{{items.name}}&nbsp;</span>
                  </div>
                  <div class='message'>
                     <span>抢单留言：</span>
                     <span>{{item.message}}</span>
                     <a :href="'__PUBLIC__master_information/'+item.order_number+'/wid/'+item.worker_id+'?dd=1'" class='golook'>查看详细>></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="weui-cell bg"></div>
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
      counter:' ',
      sex:2,
      location_ext:"<?php echo $order['location_ext']; ?>",
      order_number:'<?php echo $order_number; ?>',
      contact_name:"<?php echo $order['contact_name']; ?>",
      full_location:"<?php echo $order['full_location']; ?>",
      start_time:"<?php echo date('Y-m-d H:i:s',$order['start_time']); ?>",
      list:<?php echo $list; ?>,
      totals:<?php echo $total; ?>,
      master:<?php echo $master; ?>,

    }
    Vue.component('mian', {
      template: '#mian',
      data: function () {
        return data
      },
      methods: {
        getdate:function(){
          var x=new Date();
          var n=x.getFullYear(); //获取当前日期
          var y=x.getMonth()+1; //获取当前日期
          var r=x.getDate(); //获取当前日期
          return n+"-"+y+"-"+r;
        },
        add:function(worker_id,order_number,totals){
            $.ajax({
              url:'__PUBLIC__confirm_master',
              data:{order_number:order_number,worker_id:worker_id,totals:totals},
              dataType:'json',
              type:'post',
              success:function(data){
                  if(data.code==200){
                      window.location.href="__PUBLIC__settlement/"+order_number;
                  }else{
                      $.toast(data.msg);
                  }
              }
            })
         }

      },
      mounted:function() {
        $('#time').datetimePicker({
          min:this.getdate()
        });
      },
    })
    //头
    Vue.component('headers', {
      template: '#header',
      data: function () {
        return {
          title: "订单定标"
        }
      },
      methods:{
         goback:function(){
            window.history.go(-1)
         },
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