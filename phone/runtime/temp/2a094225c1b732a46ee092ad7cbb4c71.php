<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:60:"D:\wamp64\www\phone/application/index\view\helper\index.html";i:1511572933;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\star.html";i:1510107843;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
    <!-- 342
      26
        x214
        y288 -->
    <headers></headers>
    <mian></mian>
    <menus></menus>
</div>
<script type="text/x-template" id='mian'>

    <div class='zhaobangshoushifu' >
        <div class="weui-flex">
            <div class="weui-flex__item" v-for="item in results">
                <a v-if="item.status==0" :href="'__PUBLIC__helper1/<?php echo $order; ?>/wid/'+item.worker_id" class="weui-btn weui-btn_mini weui-btn_primary btn-green" style="background: #ec971f">{{item.worker_id}}</a>
                <a v-if="item.status==1" :href="'__PUBLIC__helper1/<?php echo $order; ?>/wid/'+item.worker_id" class="weui-btn weui-btn_mini weui-btn_primary btn-green" style="background: #58a22f ">{{item.worker_id}}</a>
                <a v-if="item.status==2" :href="'__PUBLIC__helper1/<?php echo $order; ?>/wid/'+item.worker_id" class="weui-btn weui-btn_mini weui-btn_primary btn-green" style="background: #ff4500">{{item.worker_id}}</a>
            </div>
        </div>
        <div class="weui-master">
            <div class="weui-bjmasterinfo">
                <div class="photo">
                    <img :src="'__DsQINiu__'+masters.img"  onerror="this.src='__PUBLIC__static/index/images/more.png'" alt="" width="100px" height='144'>
                    <span class='rz-icon'></span>
                </div>
                <div class="content">
                    <span>{{masters.real_name}}</span>
                    <template type="text/x-template" id='star'>
    <div class='starContent'>
        <div class="star">
            <span v-for="item in stars" class='star-item' :class='item'></span>
        </div>
    </div></template>

                    <stars></stars>
                    <div class='text'>

                        <span class='text-pf'>{{fenshu.score}}</span>
                        <span class='text-span'>评分</span>
                    </div>
                    <div class="price">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label label">保障金：</label>
                            </div>
                            <div class="weui-cell__bd">
                                <span class="weui-input label-span">￥{{masters.guarantee}}</span>
                                <span class='bao-icon'></span>
                            </div>
                        </div>
                    </div>
                    <div class='scort'>
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label label">诚信分：</label>
                            </div>
                            <div class="weui-cell__bd">
                                <span class="weui-input label-span">{{masters.credit_score}}</span>
                                <span class='bao-icon'></span>
                            </div>
                        </div>
                    </div>
                    <div class="tag">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label label">技能标签：</label>
                            </div>
                            <div class="weui-cell__bd">
                                <span class="weui-input label-span">{{masters.work_skill}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <a href="javascript:;" style="background:#58a22f " @click="yaoqing" class="weui-btn weui-btn_mini weui-btn_primary btn-blue">邀请</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui-flex" style='padding: 0px 15px;'>
            <div class="weui-flex__item">
                <a href="__PUBLIC__screen/<?php echo $order; ?>/zt/2" class="weui-btn buttomadd">增加师傅
                    <i class='icon-add_circles'></i>
                </a>
            </div>
            <div class="weui-flex__item">
            </div>
            <div class="weui-flex__item">
                <a href="javascript:;" @click="dele" class="weui-btn buttomreduce">减少师傅
                    <i class='icon-cancel-circles'></i>
                </a>
            </div>
        </div>
        <div class='weui-list'>
            <div class='forms'>
                <div class="weui-cells__title" style='color:#666;padding-left:0'>师傅工号</div>
                <div class="forms-item">
                    <div class="forms-input">
                        <input type="text" v-model="wid" class='weui-input'>
                    </div>
                    <div class="forms-buttom">
                        <a href="javascript:;" @click="yanzheng" style="background: #dddddd" class="weui-btn weui-btn_mini weui-btn_primary btn-blue">验证</a>
                    </div>
                </div>
                <div class="weui-cells__title" style='color:#666;padding-left:0'>所需时长</div>
                <div class="forms-item">
                    <div class="forms-input">
                        <input type="text" v-model="shichang" class='weui-input'>
                    </div>
                </div>
                <div class="weui-cells__title" style='color:#666;padding-left:0'>师傅技能需求</div>
                <div class="forms-item">
                    <div class="forms-input">
                        <input class="weui-input" v-model="xuqiu" id="select" type="text"  readonly="">
                    </div>
                </div>
                <div class="weui-cells__title" style='color:#666;padding-left:0'>佣金数额</div>
                <div class="forms-item">
                    <div class="forms-input">
                        <input type="text" v-model="jine" class='weui-input'>
                    </div>
                </div>
                <div class="forms-item" style='height:85px'>
                    <div class="forms-input" style='height:85px'>
                        <textarea class="weui-textarea" placeholder="请输入您对师傅的需求！" v-model="jieshi" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui-flex">
            <div class="weui-flex__item">

                <a href="__PUBLIC__masterc/<?php echo $order; ?>/wid/<?php echo $wa; ?>" class="weui-btn " style="background: #58a22f;width: 80%;margin: 0 auto">去报价</a>
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
        fenshu: <?php echo $master; ?>,
        wid:"<?php echo $wid; ?>",
        datas:{},
        results:<?php echo $results; ?>,
        masters:<?php echo $masters; ?>,
        shichang:'<?php echo $shichang; ?>', xuqiu: '<?php echo $xuqiu; ?>',jine:'<?php echo $jine; ?>', jieshi:'<?php echo $jieshi; ?>',
        yan:<?php echo $zhuangf; ?>,
    }
    var star = {
        template: '#star'
    }
    Vue.component('mian', {
        template: '#mian',
        components: {
            "stars": star
        },
        data: function () {
            return data
        },
        methods: {
            yaoqing:function () {
                if(this.results.length>="<?php echo $num; ?>"){
                    $.toptip("已近要求上限,不能在邀请了","error");
                    return false
                }
                var _this=this
                if(!this.yan){
                    $.toptip("请先验证师傅","error");
                    return false
                }
                if(this.shichang==""){
                    $.toptip("请填写所需时长","error");
                    return false
                }
                if(this.xuqiu==""){
                    $.toptip("请填写师傅技能需求","error");
                    return false
                }
                if(this.jine==""){
                    $.toptip("请填写金额","error");

                    return false
                }
                if(this.jieshi==""){
                    $.toptip("请填写你对师傅的要求","error");
                    return false
                }

                $.ajax({
                    type:"post",
                    data:{working_hours:_this.shichang,cost:_this.jine,skill:_this.xuqiu,need:_this.jieshi,worker_id:_this.wid,order_number:'<?php echo $order; ?>',link:"__PUBLIC__helper5"},
                    url:"__PUBLIC__helper3",
                    success:function (data) {
                        if(data.code==200){
                            $.toptip(data.msg,"success")
                            window.location.href="__PUBLIC__helper1/<?php echo $order; ?>/wid/"+_this.wid

                        }else{
                            $.toptip(data.msg,"error")

                        }
                    }
                })
            },
            dele:function () {
                _this=this;
                $.ajax({
                    url:"__PUBLIC__helper4",
                    type:"POST",
                    data:{worker_id:_this.wid,order_number:'<?php echo $order; ?>'},
                    success:function (data) {
                        if(data.code===200){
                            $.toptip(data.msg,"success")
                            window.location.href="__PUBLIC__helper1/<?php echo $order; ?>/wid/0"
                        }else{
                            $.toptip(data.msg,"error")
                        }
                    }
                })
            },
            yanzheng:function () {
                var _this=this;
                if(this.yan){
                    $.toptip("不需要验证了","success")
                    return false
                }
                $.ajax({
                    type:"POST",
                    url:"__PUBLIC__helper2",
                    data:{wid:_this.wid},
                    success:function (data) {
                        if(data.code===200){
                            $.toptip(data.msg,"success")
                            _this.results=data.data.data1
                            _this.fenshu=data.data.data2
                            _this.yan=true

                        }else{
                            $.toptip(data.msg,"error")
                            _this.yan=false
                        }
                    },

                })
            }
        },
        mounted: function () {
            var _this=this
            $("#select").select({
                title: "请选择你需求技能",
                multi: true,
                items: <?php echo $work_skills; ?>,
                onChange:function (data) {
                    _this.xuqiu= data.titles
                }
            });
        },
        computed: {
            stars: function(){
                var LENGTH = 5
                var CLS_ON = 'on'
                var CLS_HALF = 'half'
                var CLS_OFF = 'off'
                var stars = []
                var score = Math.floor(this.fenshu * 2) / 2;
                var hasDecimal = score % 1 !== 0;
                var integer = Math.floor(score);
                for (var i = 0; i < integer; i++) {
                    stars.push(CLS_ON);
                }
                if (hasDecimal) {
                    stars.push(CLS_HALF);
                }
                while (stars.length < LENGTH) {
                    stars.push(CLS_OFF);
                }
                return stars;
            }
        },
        watch:{
            wid:function () {
                this.yan=false
            }
        }
    })
    //头
    Vue.component('headers', {
        template: '#header',
        data: function () {
            return {
                title: "找帮手师傅"
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