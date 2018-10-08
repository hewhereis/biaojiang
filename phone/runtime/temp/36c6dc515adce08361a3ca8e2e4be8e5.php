<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp64\www\phone/application/index\view\repair\settlement.html";i:1510882675;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
<div id="bj-app" class="selection">
        <si-headers></si-headers>
        <si-content></si-content>
</div>
<script type="text/x-template" id="content">
    <div class="weui-cells_form ">
        <div class="dingdan">
            <span class="bj-label-color">订单编号:</span> <span>{{order_number}}</span>
        </div>
      
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label bj-label-color">客户名称:</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input bj-font-item-content" type="text" disabled   name="nickname" v-model="order.contact_name" id="">
            </div>
            <div class="weui-cell__ft" style="width: 100px;">
                    <!-- <span style="color: red">{{xian}}</span> -->
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label bj-label-color">详细地址:</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input bj-font-item-content" type="text" disabled id="address" v-model="order.full_location">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label bj-label-color">楼号-门牌号:</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input bj-font-item-content" type="text" disabled id="address" v-model="order.location_ext">
            </div>
        </div>
        <!-- <div class="weui-cell">
            <div class="weui-cell__hd">
                <label for="" class="weui-label bj-label-color">预约时间:</label>
            </div>
            <div class="weui-cell__bd">
                <span  class="weui-input bj-font-item-content">{{order.start_time}}</span>
            </div>
        </div> -->
        <!-- 维修 -->
        <div class="tab" v-for="(item,index) in project_detail" v-if="item.service_type_id==2">
            <div class="weui-flex tab-header">
                <div class="weui-flex__item left">
                   {{item.service}}
                </div>
                <div class="weui-flex__item right">
                    预计费用: {{item.tender_cost}}
                </div>
            </div>
            <div class="weui-flex tab-content">
                <div class="weui-flex__item">
                    <p class="time"> {{item.start_time}} (当地时间)</p>
                    <p class="text">师傅工号:{{item.worker_id}}</p>
                   <!--  <p class="text">项目费用 {{item.shichang}}小时</p> -->
                </div>
            </div>
        </div>
        <!-- 安装 -->
        <div class="tab" v-for="(item,index) in project_detail" v-if="item.service_type_id==1">
            <div class="weui-flex tab-header">
                <div class="weui-flex__item left">
                   {{item.service}}
                </div>
                <div class="weui-flex__item right">
                    预计费用: {{item.tender_cost}}
                </div>
            </div>
            <div class="weui-flex tab-content">
                <div class="weui-flex__item">
                    <p class="time"> {{item.start_time}} (当地时间)</p>
                    <p class="text">师傅工号:{{item.worker_id}}</p>
                   <!--  <p class="text">项目费用 {{item.shichang}}小时</p> -->
                </div>
            </div>
        </div>
        <!-- 勘测 -->
        <div class="tab" v-for="(item,index) in project_detail" v-if="item.service_type_id==4">
            <div class="weui-flex tab-header">
                <div class="weui-flex__item left">
                   {{item.service}}
                </div>
                <div class="weui-flex__item right">
                    预计费用: {{item.tender_cost}}
                </div>
            </div>
            <div class="weui-flex tab-content">
                <div class="weui-flex__item">
                    <p class="time"> {{item.start_time}} (当地时间)</p>
                    <p class="text">师傅工号:{{item.worker_id}}</p>
                   <!--  <p class="text">项目费用 {{item.shichang}}小时</p> -->
                </div>
            </div>
        </div>
        <!-- 更换灯片 -->
        <div class="tab" v-for="(item,index) in project_detail" v-if="item.service_type_id==5">
            <div class="weui-flex tab-header">
                <div class="weui-flex__item left">
                   {{item.service}}
                </div>
                <div class="weui-flex__item right">
                    预计费用: {{item.tender_cost}}
                </div>
            </div>
            <div class="weui-flex tab-content">
                <div class="weui-flex__item">
                    <p class="time"> {{item.start_time}} (当地时间)</p>
                    <p class="text">师傅工号:{{item.worker_id}}</p>
                   <!--  <p class="text">项目费用 {{item.shichang}}小时</p> -->
                </div>
            </div>
        </div>
       <!-- 围板搭建 -->
        <div class="tab" v-for="(item,index) in project_detail" v-if="item.service_type_id==6">
            <div class="weui-flex tab-header">
                <div class="weui-flex__item left">
                   {{item.service}}
                </div>
                <div class="weui-flex__item right">
                    预计费用: {{item.tender_cost}}
                </div>
            </div>
            <div class="weui-flex tab-content">
                <div class="weui-flex__item">
                    <p class="time"> {{item.start_time}} (当地时间)</p>
                    <p class="text">师傅工号:{{item.worker_id}}</p>
                   <!--  <p class="text">项目费用 {{item.shichang}}小时</p> -->
                </div>
            </div>
        </div>
        <div class="bj-feiliv">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    合计:<span class="title"></span>
                   {{totals}}
                </div>
            </div>
        </div>
        <div class="weui-flex ">
            <div class="weui-flex__item">
                <input type="button" @click="fukuan(order_number,totals)" class="weui-btn bj_button_orange" value="去付款">
            </div>
        </div>
    </div>
</script>
<script>
//    <!--searal 订单编号-->
//    <!--nickname 客户名称-->
//    <!--time 时间-->
//    <!--address 地址-->
//    <!--yuna 总价-->
//    <!--sui 税率-->
//    <!--xian 先生女士-->
//   tab 数据 json 格式
//    name 项目名称
//    yujifeiyong 预计费用
//    tiem 时间
//    gonghao 工号
//    shichang 预计时长
  var data={
      order_number:'<?php echo $order_number; ?>',
      order:<?php echo $order; ?>,
      project_detail:<?php echo $project_detail; ?>,
      totals:<?php echo $totals; ?>
  }
  Vue.filter("ke", function(value) {   //全局方法 Vue.filter() 注册一个自定义过滤器,必须放在Vue实例化前面
      return "￥"+value +".00元";
  });
  Vue.filter("bk", function(value) {   //全局方法 Vue.filter() 注册一个自定义过滤器,必须放在Vue实例化前面
      return value + "%";
  });
  Vue.filter("times", function(time) {   //全局方法 Vue.filter() 注册一个自定义过滤器,必须放在Vue实例化前面
      if(time){
          var oDate=new Date();
          oDate.setTime(time);
          var y=oDate.getFullYear();
          var m=oDate.getMonth()+1;
          var d=oDate.getDate();
          var h=oDate.getHours();
          var m=oDate.getMinutes();
          var s=oDate.getSeconds();
          return y+'-'+m+'-'+d+' '+h+':'+m+':'+s;
      }
  });
    Vue.component('si-headers', {
        template: '#header',
        data: function () {
            return {
                title: "结算页面",
                left:"<span class=\"icon-返回2\"></span><a  style='color: #fff'>返回</a>",
                right:""
            }
        },
        methods:{
            goback:function () {
                window.history.go(-1)
            }
        }
        ,

    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return data
        },
        methods:{
            fukuan:function(order_number,totals){
                $.ajax({
                    url:'__PUBLIC__is_weixin',
                    type:'post',
                    data:{},
                    dataType:'json',
                    success:function(data){
                        if(data==true){
                            location.href="http://www.bj-wang.com/PhoneWxpay/project_cost?total="+totals+"&&number="+order_number;
                        }else{
                            $.ajax({
                                url:'__PUBLIC__add_money',
                                type:'post',
                                data:{totals:totals,order_number:order_number},
                                dataType:'json',
                                success:function(data){
                                    if(data.code==200){
                                        //location.href="http://www.bj-wang.com/wxpay/scan/number/"+order_number;
                                        window.location.href="__PUBLIC__payment/"+order_number;
                                    }

                                }
                            })

                        }

                    }
                })
            }
        },
        
    });
    new Vue({
        el: '#bj-app',
    });
</script>
</body>
