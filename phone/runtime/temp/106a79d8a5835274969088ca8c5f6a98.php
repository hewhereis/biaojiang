<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"D:\wamp64\www\phone/application/index\view\mastersingle\grab_page.html";i:1511572933;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
<script type="text/template" id="mian">
<form  name="myfroms" id="myforms" method="post" action="__PUBLIC__grab_pageajax">
<input type="hidden" name="link" value="__PUBLIC__message_list/<?php echo $onumber; ?>">
   <div class="qiangdan">
      <div class="weui-cells weui-cells_form border-none">
          <div class="weui-cell one">
             <div class="weui-cell__hd"><label class="weui-label label">订单编号：</label></div>
             <div class="weui-cell__bd">
                <span class='weui-input label'><?php echo $onumber; ?></span>
				         <input hidden type="hidden" value="<?php echo $onumber; ?>" id="onumber" name="onumber">
             </div>
          </div>
            <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">客户名称</label></div>
             <div class="weui-cell__bd">
               
				<span class="weui-input"><?php echo $list['uname']; ?></span>
            </div>
          </div>
          <div class="weui-cell">
             <div class="weui-cell__hd"><label class="weui-label">店铺地址</label></div>
             <div class="weui-cell__bd">
				<span class="weui-input"><?php echo $list['address']; ?></span>
             </div>
          </div>
          <div class="weui-cell">
              <div class="weui-cell__hd"><label class="weui-label">预约施工</label></div>
              <div class="weui-cell__bd">
				  <span class="weui-input"><?php echo $list['laddress']; ?></span>
              </div>
           </div>
      </div>
      <div class="bg">
	    <!--安装-->
        <div class="xiangmu1" v-if='service_type_id==1' v-for="(item,index) in install_list">
          <div class="xiangmu1_header">
            安装-{{item.name}}
          </div>
          <div class="xiangmu1_body1">
            <span><?php echo $start_time; ?></span>
            <span>（当地时间）</span>
          </div>
          <div class="xiangmu1_body2">
            <span>项目投标价</span>
            <span class="toubiao">
                <input type="text" class="hongxian" placeholder="请输入" name="price[]" v-model="jisuan[index]" onkeyup="value=value.replace(/[^\d]/g,'')">
            </span>
          </div>
          <div class="xiangmu1_footer">
           
            <span class="xiangmu1_footer2">
               <button type="button" class="chakan">查看</button>
            </span>
          </div>
        </div>
	  <!--维修-->
        <div class="xiangmu1" v-if='service_type_id==2' v-for="(item,index) in repair_list">
          <div class="xiangmu1_header">
            维修-{{item.name}}
          </div>
          <div class="xiangmu1_body1">
            <span><?php echo $start_time; ?></span>
            <span>（当地时间）</span>
          </div>
          <div class="xiangmu1_body2">
            <span>师傅投标价</span>
            <span class="toubiao">
                <input type="text" class="hongxian" placeholder="请输入" name="price[]" v-model="jisuan[index]" onkeyup="value=value.replace(/[^\d]/g,'')">
            </span>
          </div>
          <div class="xiangmu1_footer">
           
            <span class="xiangmu1_footer2">
               <a  class="chakan" :href="'__PUBLIC__repair_details/'+item.id">查看</a>
            </span>
          </div>
        </div>
	    <!--更换-->
        <div class="xiangmu1" v-if='service_type_id==5' v-for="(item,index) in replace_list">
          <div class="xiangmu1_header">
            更换换灯片
          </div>
          <div class="xiangmu1_body1">
            <span><?php echo $start_time; ?></span>
            <span>（当地时间）</span>
          </div>
          <div class="xiangmu1_body2">
            <span>项目投标价</span>
            <span class="toubiao">
                <input type="text" class="hongxian" placeholder="请输入"  name="price[]" v-model="jisuan[index]" onkeyup="value=value.replace(/[^\d]/g,'')" >
            </span>
          </div>
          <div class="xiangmu1_footer">
           
            <span class="xiangmu1_footer2">
               <button type="button" class="chakan">查看</button>
            </span>
          </div>
        </div>
		
		<!--围板-->
        <div class="xiangmu1" v-if='service_type_id==6' v-for="(item,index) in coaming_list">
          <div class="xiangmu1_header">
            围板搭建和拆除
          </div>
          <div class="xiangmu1_body1">
            <span><?php echo $start_time; ?></span>
            <span>（当地时间）</span>
          </div>
          <div class="xiangmu1_body2">
            <span>项目投标价</span>
            <span class="toubiao">
                <input type="text" class="hongxian" placeholder="请输入" name="price[]" v-model="jisuan[index]" onkeyup="value=value.replace(/[^\d]/g,'')">
            </span>
          </div>
          <div class="xiangmu1_footer">
           
            <span class="xiangmu1_footer2">
               <button type="button" class="chakan">查看</button>
            </span>
          </div>
        </div>
		
		 <div class="toubiao">
          <div class="toubiaozongji">投标总计:</div>
          <div class="money">
           
			<span>{{zongjia}}</span>
          </div>
        </div>
      </div>
	  <div class="qiangdanliuyan">
        <div class="liuyan">抢单留言:</div>
        <input type="text" class="text1" placeholder="请输入你对此项目的看法" name="content">
      </div>
      <div class="btn">
        <button class="btn1"    id="pageajax">确认</button>
      </div>
   </div>
</form>

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
var order_number;

    $(function(){
        $('#myforms').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });
        function checkForm(){
            
        }
        function complete(data){
          if(data.code==200){
			    $.toast(data.msg,function(){
             window.location.href="__PUBLIC__grab_single/"+order_number;
          });
		   }else{
		      $.toptip(data.msg,'error');
		  }
        }
    });
   
</script>

<script>
    var data = {
	  install_list:<?php echo $install_list; ?>,
	  repair_list:<?php echo $repair_list; ?>,
	  coaming_list:<?php echo $coaming_list; ?>,
	  replace_list:<?php echo $replace_list; ?>,
	  service_type_id:<?php echo $service_type_id; ?>,
      counter: 1,
      sex:2,
	  jisuan:[]
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
        }
      },
      mounted:function() {
         order_number=$("#onumber").val();
        $('#time').datetimePicker({
          min:this.getdate()
        });
      },
	
	  computed:{
	  zongjia:function(){
		
		var _this=this;
		var i=0;
		_this.jisuan.forEach(function(item,index){
		if(item!==""){
		i+=parseInt(item)	
		}
			
		})
		return i;
	  }
	  }
    })
    //头
    Vue.component('headers', {
      template: '#header',
      data: function () {
        return {
          title: "抢单"
        }
      },
      methods:{
         goback:function(){
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