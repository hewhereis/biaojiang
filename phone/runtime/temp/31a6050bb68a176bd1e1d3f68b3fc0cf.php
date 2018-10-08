<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"D:\wamp64\www\phone/application/index\view\allinformation\orderinfomationlist.html";i:1510646756;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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

<link rel="stylesheet" href="__indexStatic__/layui/css/layui.css">
<script src="__indexStatic__/layui/layui.js"></script>
<div class='app'>
    <headers></headers>
    <mian></mian>
    <menus></menus>
    <script type="text/x-template" id='mian'>
        <div class='infomationList'>
            <div class="messagesList" v-for='(item,index) in orders'>
                <div class="messTime" >
                    <span class='messTimes' v-html="item.sending_time"></span>
                </div>
                <div class="messContent">
                    <div class='messContentTitle'>你的订单消息</div>
                    <div class="messContentInfo">
                       <a :href="item.link"><span v-html="item.content"></span></a>
                    </div>
                    <div class='messContentDel'>
                        <span class='delete' @click="deletes(item.id,index)">删除</span>
                    </div>
                </div>
            </div>
        </div>
    </script>
         <if condition="count($orders) eq 6">
                    <a  id="btn"  href="javascript:;"></a>
                </if>
</div>
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
         orders:<?php echo $orders; ?>
    }
    Vue.component('mian', {
        template: '#mian',
        data: function () {
            return data

        },
        methods: {
            deletes: function(id,index){
                _that = this
                $.confirm({
                    title: '确认删除?',
                    text: '',
                    onOK: function () {
                        $.ajax({
                            type:"post",
                            url:"__PUBLIC__delete_messages",
                            data:{id:id},
                            dataType:'json',
                            success:function(data){
                              if(data.code==1){

                                $.toptip('操作成功', 'success');
                                _that.orders.splice(index,1)
                                
                              }else{
                                $.toptip('系统繁忙', 'error');
                              }
                           },
                           erorr:function(){

                           }
                        })
                  },
                  onCancel: function () {
                  }
                });
                
                
            },     
             load:function(){
             _that = this;
                var nStart = 6;
               
                layui.use('flow', function(){
                var $ = layui.jquery; //不用额外加载jQuery，flow模块本身是有依赖jQuery的，直接用即可。
                  flow = layui.flow;
                  flow.load({
                    elem: '#btn' //指定列表容器
                    ,done: function(page, next){ //到达临界点（默认滚动触发），触发下一页
                      var lis = [];
                      //以jQuery的Ajax请求为例，请求下一页数据（注意：page是从2开始返回）
                      $.post("__PUBLIC__orderinfomationlist", {start: nStart}, function(res){
                        //假设你的列表返回在data集合中
                        layui.each(res.result, function(index, item){
                         _that.orders.push(item)
                        }); 
                        //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
                        //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
                        next(lis.join(''), nStart < res.totals,nStart += 6); 
                      }); 
                    }
                  });
                });
        }
         },
        mounted: function () {
            this.load()
        }
    })
    //头
    Vue.component('headers', {
        template: '#header',
        data: function () {
            return {
                title: "消息"
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
     },

       
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