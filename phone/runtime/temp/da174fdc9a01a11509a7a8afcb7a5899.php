<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:66:"D:\wamp64\www\phone/application/index\view\master\shifuxingxi.html";i:1511831180;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\star.html";i:1510107843;s:60:"D:\wamp64\www\phone/application/index\view\public\stars.html";i:1510107843;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
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
</div>

<script type="text/x-template" id='mian'>


  <div class='shifuxingxi'>

    <div class="weui-cells__title">以下是您挑选的师傅资料</div>
    <div class="weui-master">
      <div class="weui-bjmasterinfo">
        <div class="photo">
          <img src="{{masters.img}}" alt="" onerror="this.src='__PUBLIC__static/index/images/moren.jpg'" width="100px" height='144'>
          <span class='rz-icon'></span>
        </div>
        <div class="content">
          <div class="masterName">
            <span class='names'>{{masters.real_name}}</span>
            <span>(工号
              <span>{{masters.id}}</span>)</span>
          </div>
          <template type="text/x-template" id='star'>
    <div class='starContent'>
        <div class="star">
            <span v-for="item in stars" class='star-item' :class='item'></span>
        </div>
    </div></template>

          <star></star>
          <div class='text'>
            <span class='text-pf'>{{master.score}}</span>
            <span class='text-span'>评分</span>
          </div>
          <div class="price">
            <div class="weui-cell">
              <div class="weui-cell__hd">
                <label class="weui-label label">保障金：</label>
              </div>
              <div class="weui-cell__bd" >
                <span class="weui-input label-span priceSpan">￥{{masters.guarantee}}
                  <span class='bao-icon'></span>
                </span>
              </div>
            </div>
          </div>
          <div class='scort'>
            <div class="weui-cell">
              <div class="weui-cell__hd">
                <label class="weui-label label">诚信分：</label>
              </div>
              <div class="weui-cell__bd">
                <span class="weui-input label-span scortSpan">{{masters.credit_score}}
                  <span class='bao-icon'></span>
                </span>

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
        </div>
      </div>
    </div>
    <div class="masterInfoTab">
      <div class="weui-tab" style='border: 1px solid #DCDCDC'>
        <div class="weui-navbar" style='z-index:19;'>
          <a class="weui-navbar__item weui-bar__item--on" href="#tab1">
            详细资料
          </a>
          <a class="weui-navbar__item" href="#tab2">
            完工照片
          </a>
          <a class="weui-navbar__item" href="#tab3">
            客户评价
          </a>
        </div>
        <div class="weui-tab__bd masterInfoTab-item">
          <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class='mastertabs'>
              <div class='tabs-left'>联系人：</div>
              <div class='tabs-right'>
                <span>{{datas.real_name}}</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>所在地：</div>
              <div class='tabs-right'>
                <span>{{datas.province}}-{{datas.city}}-{{datas.town}}</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务介绍：</div>
              <div class='tabs-right'>
                <span>{{datas.service_introduction}}</span>
              </div>
            </div>
            <div class="bottomLine"></div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务类型：</div>
              <div class='tabs-right'>
                <span>{{datas.service_type_id}}</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务品牌：</div>
              <div class='tabs-right'>
                <span>{{datas.brand}}</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务地区：</div>
              <div class='tabs-right'>
                <span>{{datas.service_province}}-{{datas.service_city}}</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>员工人数：</div>
              <div class='tabs-right'>
                <span>
                  <span>{{datas.staff_num}}</span>人</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务时间：</div>
              <div class='tabs-right'>
                <span>{{datas.service_time}}</span>
              </div>
            </div>
            <div class='mastertabs' style='margin-bottom:10px'>
              <div class='tabs-left'>车辆情况：</div>
              <div class='tabs-right'>
                <span>{{datas.truck_situation}}</span>
              </div>
            </div>
          </div>
          <div id="tab2" class="weui-tab__bd-item">
            <div class="weui-cells__title" style='margin-top:2px'>
              以下均为
              <span style='color:#333333;font-size:16px;font-weight:bold'>{{datas.real_name}}</span>师傅完成订单后提供的真实照片
            </div>
            <div class="weui-cells weui-cells_form">
              <div class="weui-cell mediaWeui-cell">
                <div class="weui-cell__bd">
                  <div class="weui-uploader">
                    <div class="weui-uploader__bd">
                      <ul class="weui-uploader__files" id="uploaderFiles">
                        <li class="weui-uploader__file" style="background-image:url(__indexStatic__images/pic_160.png)"></li>
                        <li class="weui-uploader__file" style="background-image:url(__indexStatic__images/pic_160.png)"></li>
                        <li class="weui-uploader__file" style="background-image:url(__indexStatic__images/pic_160.png)"></li>
                        <li class="weui-uploader__file" style="background-image:url(__indexStatic__images/pic_160.png)"></li>
                        <li class="weui-uploader__file" style="background-image:url(__indexStatic__images/pic_160.png)"></li>
                        <li class="weui-uploader__file" style="background-image:url(__indexStatic__images/pic_160.png)"></li>
                        <li class="weui-uploader__file" style="background-image:url(__indexStatic__images/pic_160.png)"></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <ul class='pages'>
                <li class='pages-pre'>
                  <a href="">上一页</a>
                </li>
                <li class='pages-num on'>
                  <a href="">1</a>
                </li>
                <li class='pages-num'>
                  <a href="">2</a>
                </li>
                <li class='pages-num'>
                  <a href="">3</a>
                </li>
                <li class='pages-next'>
                  <a href="">下一页</a>
                </li>
              </ul> -->
            </div>
          </div>
          <div id="tab3" class="weui-tab__bd-item">
            <div class="masterComment">
              <div class="scoreAndComment">
                <div class="scoreStars">
                  <span class='scoreStarsText'>综合评价</span>
                  <span class='scoreText'>{{fenshu.score}}/5分</span>
                  <template type="text/x-template" id='stars'>
    <div class='starContent'>
        <div class="star">
            <span v-for="item in stars" class='star-item-32' :class='item'></span>
        </div>
    </div>
</template>

                  <stars></stars>
                </div>
                <div class="allSay">
                  <span class='sayTitle'>大家都在说:</span>
                  <span class='allSayMaster'>上门准时 (2)</span>
                  <span class='allSayMaster'>做事效率高 (2)</span>
                  <span class='allSayMaster'>技术好 (2)</span>
                  <span class='allSayMaster'>态度好 (2)</span>
                  <span class='allSayMaster'>价格公道 (2)</span>
                </div>
              </div>
            </div>
            <div class="bottomLine"></div>
            <div class="allComments" id='masterInfoAndComments'>
              <ul class='allCommentsType'>
                <li class='allCommentsType-item allCommentsType-itemOns' @click='getComment(2)' val='2'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">全部({{all}})</label>
                </li>
                <li class='allCommentsType-item' @click='getComment(1)' val='1'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">好评({{good}})</label>
                </li>
                <li class='allCommentsType-item' @click='getComment(0)' val='2'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">中评({{secondary}})</label>
                </li>
                <li class='allCommentsType-item' @click='getComment(-1)' val='3'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">差评({{bad}})</label>
                </li>
              </ul>
            </div>
            <div class="commentContent" style='padding-top: 20px;' v-for="(item,index) in defaults">
              <div class="clientName">
                <span class='clinetNameSpan'>{{item.username}}</span>
                <span class=''>(客户)</span>
                <div class='starContent'>
                    <div class="star">
                        <span v-for="item in starsClinet(item.totals_core)" class='star-item-32' :class='item' style="margin-top: 2px;"></span>
                    </div>
                </div>
                <span class='time clinetNameSpan'>{{item.create_time}}</span>
                <!-- <span style='color:#ff5200;font-size: 16px'>安装</span> -->
              </div>
              <div class="serviceType">
                <span>{{item.comments}}</span>
              </div>
              <div class="serviceGood">
                <span>质量:{{item.work_quality}}({{setQuality(item.work_quality)}})</span>
                <span>态度:{{item.service_attitude}}({{setQuality(item.service_attitude)}})</span>
                <span>速度:{{item.work_speed}}({{setQuality(item.work_speed)}})</span>
                  <input id="wid" type="hidden" value="<?php echo $wid; ?>">
              </div>
                
              <div class="weui-cells bg"></div>
<!--               <div class="weui-cells weui-cells_form">
                <div class="weui-cell mediaWeui-cell">
                  <div class="weui-cell__bd">
                    <div class="weui-uploader">
                      <div class="weui-uploader__bd">
                        <ul id="uploaderFiles" class="weui-uploader__files">
                          <li class="weui-uploader__file" style="background-image: url(&quot;http://192.168.0.168/phone/static/index/images/pic_160.png&quot;);"></li>
                          <li class="weui-uploader__file" style="background-image: url(&quot;http://192.168.0.168/phone/static/index/images/pic_160.png&quot;);"></li>
                          <li class="weui-uploader__file" style="background-image: url(&quot;http://192.168.0.168/phone/static/index/images/pic_160.png&quot;);"></li>
                          <li class="weui-uploader__file" style="background-image: url(&quot;http://192.168.0.168/phone/static/index/images/pic_160.png&quot;);"></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
             <if condition="count($defaults) eq 6">
                    <a  id="btn"  href="javascript:;"></a>
                </if>
          </div>
        </div>
      </div>
    </div>

    <div class="useCoupon" v-if="dd==3">
      <!-- <div class="weui-cells__title">订单编号：
        <span>999955555555559</span>
      </div> -->
      <div class="weui-cells__title" style='margin-top:20px'>
        <div class="checkbox">
         <!--  <input type="checkbox" id="checkbox1" name="checkboox[]">
          <label for="checkbox1" class="label-span">使用平台优惠卷</label> -->
        </div>
      </div>
      <div class="weui-cells__title" style='margin-top:20px'>
        <b>
          <span class='priceColor'>咨询费用： ￥
            <span>{{consult_pay}}</span>
          </span>
        </b>
      </div>
      <div class="weui-cells__title" style='margin-top:20px'>
          <a href="javascript:;" @click="pay" class="weui-btn weui-btn_warn btn-orange">去付款</a>
      </div>
    </div>

    <div class="useCoupon" v-if="dd==1">
         <a href="javascript:;" @click="go" class="weui-btn weui-btn_warn btn-orange">返回</a>
    </div>
    <div class="useCoupon" v-if="dd==2">
         <a @click="urls()" href="javascript:;" class="weui-btn weui-btn_warn btn-orange">选中</a>
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
    masters:<?php echo $masters; ?>,
    master:<?php echo $master; ?>,
    datas:<?php echo $datas; ?>,
    wid:<?php echo $wid; ?>,
    all:<?php echo $all; ?>,
    good:<?php echo $good; ?>,
    secondary:<?php echo $secondary; ?>,
    bad:<?php echo $bad; ?>,
    defaults:<?php echo $defaults; ?>,
    order_number:'<?php echo $order_number; ?>',
    dd:<?php echo $dd; ?>,
    consult_pay:'<?php echo $consult_pay; ?>'
  }
  var star = {  
    template: '#star',
  }
  var stars = {
    template: '#stars',
  }
  Vue.component('mian', {
    template: '#mian',
    components: {
      "star": star,
      "stars": stars,
    },
    data: function () {
      return data
    },
    methods: { 
       go:function(){
        window.history.go(-1)
      },
       load:function(){

             _that = this;
                var nStart = 6;
                var wid=$('#wid').val();
                layui.use('flow', function(){
                var $ = layui.jquery; //不用额外加载jQuery，flow模块本身是有依赖jQuery的，直接用即可。
                  flow = layui.flow;
                  flow.load({
                    elem: '#btn' //指定列表容器
                    ,done: function(page, next){ //到达临界点（默认滚动触发），触发下一页
                      var lis = [];
                      //以jQuery的Ajax请求为例，请求下一页数据（注意：page是从2开始返回）
                      $.post("__PUBLIC__master_information/"+wid, {start: nStart}, function(res){
                        console.log(res);
                        //假设你的列表返回在data集合中
                        layui.each(res.result, function(index, item){
                         _that.defaults.push(item)
                        }); 
                        //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
                        //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
                        next(lis.join(''), nStart < res.totals,nStart += 6); 
                      });
                    }
                  });
                });
             },
        //咨询付费     
       pay:function(){
        var _this=this;
          $.ajax({
              url:'__PUBLIC__is_weixin',
              type:'post',
              data:{},
              dataType:'json',
              success:function(data){
                  console.log(data);
                  if(data==true){
                      location.href="http://www.bj-wang.com/PhoneWxpay/add_consult_jsapi?total="+_this.consult_pay+"&&order_number="+_this.order_number;
                  }else{
                      $.ajax({
                          url:'__PUBLIC__add_consult',
                          type:'post',
                          data:{total:_this.consult_pay,order_number:_this.order_number},
                          dataType:'json',
                          success:function(data){
                              if(data.code==200){
                                  window.location.href="__PUBLIC__add_consult_index/"+_this.order_number+'/times/'+data.msg;
                              }

                          }
                      })

                  }

              }
          })
       },
      getComment: function (id) {
        var _this = this;
        var wid=$('#wid').val();
         $.ajax({
            url:'__PUBLIC__getcomment',
            data:{wid:_this.wid,id:id},
            dataType:'json',
            type:'post',
            success:function(data){
             _this.defaults = data ;
                
            }
         })
      },
      starsClinet:function(num){
            var LENGTH = 5
            var CLS_ON = 'on'
            var CLS_HALF = 'half'
            var CLS_OFF = 'off'
            var stars = []
            var score = Math.floor(num* 2) / 2;
            var hasDecimal = score % 1 !== 0;
            var integer = Math.floor(score);
            for (let i = 0; i < integer; i++) {
                stars.push(CLS_ON);
            }
            if (hasDecimal) {
                stars.push(CLS_HALF);
            }
            while (stars.length < LENGTH) {
                stars.push(CLS_OFF);
            }
            return stars;
      },
      setQuality:function(WorkQuality){
        if(WorkQuality<=1){
          return "极差"
        }else if(WorkQuality<=2){
          return "差"
        }else if(WorkQuality<=3){
          return "一般"
        }else if(WorkQuality<=4){
          return "良好"
        }else if(WorkQuality<=5){
          return "优秀"
        }
      },
        urls:function (id) {
                var link="__PUBLIC__masterc"
               
                   $.ajax({
                       url:"__PUBLIC__screen3",
                       data:{order:'<?php echo $order_number; ?>',worker_id:'<?php echo $wid; ?>',link:link},
                       type:"POST",
                       success:function (data) {
                                if(data.code===200){
                                    window.location.href="__PUBLIC__consult1/<?php echo $order_number; ?>/wid/<?php echo $wid; ?>";
                                }else {

                                }
                       }
            


            })}
     
    },
    mounted: function () {
      this.load()
    },
    computed: {
      stars: starComponted
    }
  })
  //头
  Vue.component('headers', {
    template: '#header',
    data: function () {
      return {
        title: "师傅信息"
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