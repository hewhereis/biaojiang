<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:77:"D:\wamp64\www\phone/application/index\view\master\fufeizixun_shifuxingxi.html";i:1510107843;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1510625091;s:59:"D:\wamp64\www\phone/application/index\view\public\star.html";i:1510107843;s:60:"D:\wamp64\www\phone/application/index\view\public\stars.html";i:1510107843;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510107843;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
  <title>bjdemo</title>
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
  </script>
</head>

<body>
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
  <div class='shifuxingxi'>
    <div class="weui-cells__title">以下是您挑选的即将咨询的主任师傅</div>
    <div class="weui-master">
      <div class="weui-bjmasterinfo">
        <div class="photo">
          <img src="__indexStatic__images/pic_160.png" alt="" width="100px" height='144'>
          <span class='rz-icon'></span>
        </div>
        <div class="content">
          <div class="masterName">
            <span class='names'>王小二</span>
            <span>(工号
              <span>1850</span>)</span>
          </div>
          <template type="text/x-template" id='star'>
    <div class='starContent'>
        <div class="star">
            <span v-for="item in stars" class='star-item' :class='item'></span>
        </div>
    </div></template>

          <star></star>
          <div class='text'>
            <span class='text-pf'>{{fenshu}}</span>
            <span class='text-span'>评分</span>
          </div>
          <div class="price">
            <div class="weui-cell">
              <div class="weui-cell__hd">
                <label class="weui-label label">保障金：</label>
              </div>
              <div class="weui-cell__bd">
                <span class="weui-input label-span priceSpan">￥2000
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
                <span class="weui-input label-span scortSpan">1000
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
                <span class="weui-input label-span">电工、木工....</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="masterInfoTab">
      <div class="weui-tab" style='border: 1px solid #DCDCDC'>
        <div class="weui-navbar">
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
                <span>王小二</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>所在地：</div>
              <div class='tabs-right'>
                <span>上海市-嘉定区</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务介绍：</div>
              <div class='tabs-right'>
                <span>我从事维修8年，有丰富的经验....</span>
              </div>
            </div>
            <div class="bottomLine"></div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务类型：</div>
              <div class='tabs-right'>
                <span>安装</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务品牌：</div>
              <div class='tabs-right'>
                <span>香奈儿，阿迪达斯，阿达凡...</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务地区：</div>
              <div class='tabs-right'>
                <span>嘉定区（安亭镇，马路镇...）</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>员工人数：</div>
              <div class='tabs-right'>
                <span>
                  <span>5</span>人</span>
              </div>
            </div>
            <div class='mastertabs'>
              <div class='tabs-left'>服务时间：</div>
              <div class='tabs-right'>
                <span>周一至周五 （08：00 - 21:00）</span>
              </div>
            </div>
            <div class='mastertabs' style='margin-bottom:10px'>
              <div class='tabs-left'>车辆情况：</div>
              <div class='tabs-right'>
                <span>火车|中型|1吨</span>
              </div>
            </div>
          </div>
          <div id="tab2" class="weui-tab__bd-item">
            <div class="weui-cells__title" style='margin-top:2px'>
              以下均为
              <span style='color:#333333;font-size:16px;font-weight:bold'>王小二</span>师傅完成订单后提供的真实照片
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
              <ul class='pages'>
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
              </ul>
            </div>
          </div>
          <div id="tab3" class="weui-tab__bd-item">
            <div class="masterComment">
              <div class="scoreAndComment">
                <div class="scoreStars">
                  <span class='scoreStarsText'>综合评价</span>
                  <span class='scoreText'>5.0/5分</span>
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
                <li class='allCommentsType-item allCommentsType-itemOns' @click='getComment' val='0'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">全部(35)</label>
                </li>
                <li class='allCommentsType-item' @click='getComment' val='1'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">好评(35)</label>
                </li>
                <li class='allCommentsType-item' @click='getComment' val='2'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">中评(35)</label>
                </li>
                <li class='allCommentsType-item' @click='getComment' val='3'>
                  <span class='masterInfoAndCommentsOnline'></span>
                  <label for="">差评(35)</label>
                </li>
              </ul>
            </div>
            <div class="commentContent" style='padding-top: 20px;'>
              <div class="clientName">
                <span class='clinetNameSpan'>赵四</span>
                <span class=''>(客户)</span>
                <template type="text/x-template" id='stars'>
    <div class='starContent'>
        <div class="star">
            <span v-for="item in stars" class='star-item-32' :class='item'></span>
        </div>
    </div>
</template>

                <stars></stars>
                <span class='time clinetNameSpan'>2017-10-08</span>
              </div>
              <div class="serviceGood">
                <span>质量5(非常好)</span>
                <span>态度5(非常好)</span>
                <span>速度5(非常好)</span>
              </div>
              <div class="serviceType">
                <span>服务类型：</span>
                <span style='color:#ff5200'>安装</span>
              </div>
              <div class="weui-cells weui-cells_form">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="useCoupon">
      <div class="weui-cells__title">订单编号：
        <span>999955555555559</span>
      </div>
      <div class="weui-cells__title" style='margin-top:20px'>
        <div class="checkbox">
          <input type="checkbox" id="checkbox1" name="checkboox[]">
          <label for="checkbox1" class="label-span">使用平台优惠卷</label>
        </div>
      </div>
      <div class="weui-cells__title" style='margin-top:20px'>
        <b>
          <span class='priceColor'>合计： ￥
            <span>99995</span>
          </span>
        </b>
        <span>(含12%税费)</span>
      </div>
      <div class="weui-cells__title" style='margin-top:20px'>
        <a href="javascript:;" class="weui-btn weui-btn_warn btn-orange">去付款</a>
      </div>
    </div>
  </div>
</script>
<script type="text/x-template" id='menu'>
  <div>
    <div class="weui-tabbar" style='position:fixed'>
      <a href="javascript:;" class="weui-tabbar__item weui-bar__item--on">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_button.png" alt="">
        </div>
        <p class="weui-tabbar__label">微信</p>
      </a>
      <a href="javascript:;" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_msg.png" alt="">
        </div>
        <p class="weui-tabbar__label">通讯录</p>
      </a>
      <a href="javascript:;" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_article.png" alt="">
        </div>
        <p class="weui-tabbar__label">发现</p>
      </a>
      <a href="javascript:;" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
          <img src="__indexStatic__/images/icon_nav_cell.png" alt="">
        </div>
        <p class="weui-tabbar__label">我</p>
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
    fenshu: 3.5
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
      "stars": stars
    },
    data: function () {
      return data
    },
    methods: {
      getComment: function () {

      }
    },
    mounted: function () {},
    computed: {
      stars: starComponted
    }
  })
  //头
  Vue.component('headers', {
    template: '#header',
    data: function () {
      return {
        title: "付费咨询-师傅信息"
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