<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wamp64\www\phone/application/index\view\choose\screen.html";i:1511577982;s:64:"D:\wamp64\www\phone/application/index\view\public\header_sy.html";i:1510987403;}*/ ?>
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
<link rel="stylesheet" href="__indexStatic__/layui/css/layui.css">
<script src="__indexStatic__/layui/layui.js"></script>
<div id="bj-apps" class="shaixuan">
    <si-headers></si-headers>
    <si-content ></si-content>
    <si-footer ></si-footer>

</div>
<script type="text/x-template" id="bj-searchBar">

        <div class="">
            <div class="bj-top-bar">
                <div class="bj-shaixuan-left"  @click="fanhui">
                    <span class="icon-fh img" ></span>
                </div>
                <div class="bj-shaixuan-content">
                    <span class="icon-放大镜 img"></span>
                    <input type="text" v-model="fangdaShow"  class="bj-input" placeholder="请输入师傅工号/技能">
                    <span class="icon-关闭 guanbi" @click="showFangda" v-show="fangdaShow"></span>
                </div>
                <div class="bj-shaixuan-right">
                    <input type="button" v-show="fangdaShow" @click="seek()" class="weui-btn weui-btn_mini weui-btn_primary" value="搜索">
                </div>
            </div>
        </div>
</script>
<script type="text/x-template" id="content">
    <div class="content">
        <div class="weui-flex filtrate">
            <div class="weui-flex__item orientation" @click="zongheShow">
                <span class="text"  v-bind:class="{ acvtive: showZonghes }">{{paixunvalue}}</span>
                <span class="icon-下箭头 title" v-if="showZonghe==false"  v-bind:class="{ acvtive: showZonghes }"></span>
                <span class="icon-上箭头 title" v-if="showZonghe==true"  v-bind:class="{ acvtive: showZonghes }"></span>
            </div>
            <div class="weui-flex__item orientation" @click="jiedanShow">
                <span class="text" v-bind:class="{ acvtive: isActiveb }">累计接单</span>
            </div>
            <div class="weui-flex__item orientation" @click="leiShow">
                <span class="text" v-bind:class="{ acvtive: fuleiShows }">{{jinengradio}}</span>
                <span class="icon-下箭头 title" v-if="fuleiShows==false" v-bind:class="{ acvtive: fuleiShows }"></span>
                <span class="icon-上箭头 title" v-if="fuleiShows==true"  v-bind:class="{ acvtive: fuleiShows }"></span>
            </div>
            <div class="weui-flex__item orientation" @click="shaiShow">
                <span class="text" v-bind:class="{ acvtive: isActived }">筛选</span>
                <span class="icon-右上角筛选 title" v-bind:class="{ acvtive: isActived }"></span>
            </div>
        </div>
        <div v-show="showZonghe" class="bj-weui-cells weui-cells_radio">
            <label class=" weui-check__label" for="x11" @click="zonghe">
                <div class="weui-cell__bd">
                    <p>综合排序</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" class="weui-check" v-model="paixunvalue" value="综合排序" name="radios" id="x11">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
            <label class=" weui-check__label" for="x12" @click="zonghe">
                <div class="weui-cell__bd">
                    <p>价格排序</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" name="radios" class="weui-check " value="价格排序" v-model="paixunvalue"  id="x12" checked="checked">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
            <label class=" weui-check__label" for="x13"  @click="zonghe">
                <div class="weui-cell__bd">
                    <p>等级排序</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" name="radios" v-model="paixunvalue" value="等级排序" class="weui-check" id="x13" checked="checked">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
        </div>
        <div  v-show="fuleiShows" class="bj-weui-cells weui-cells_radio">
            <label v-for="item in leixing" class=" weui-check__label" @click="fuuwlei(item.value,1)">
                <div class="weui-cell__bd">
                    <p>{{item.title}}</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" class="weui-check" v-model="jinengradio" :value="item.title" name="radio1">
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
        </div>
        <div class="weui-flex leixin">

            <div class="weui-flex__item" v-bind:class="{ active: brandactive }" @click="showBrand">
                <div class="orientation">
                    <span class="text">{{brandradio}}</span>
                    <span class="icon-下箭头 title" v-if="brandactive==false" ></span>
                    <span class="icon-上箭头 title" v-if="brandactive==true" ></span>
                </div>
            </div>
            <div class="weui-flex__item" v-bind:class="{ active: jinengactive }">
                <div class="orientation" @click="showJineng"  >
                    <span class="text">{{jinengradios}}</span>
                    <span class="icon-下箭头 title" v-if="jinengactive==false" ></span>
                    <span class="icon-上箭头 title" v-if="jinengactive==true" ></span>
                </div>
            </div>
            <div class="weui-flex__item" v-bind:class="{ active: dengjiactive }">
                <div class="orientation" @click="showDengji" >
                    <span class="text">{{dengjiradio}}</span>
                    <span class="icon-下箭头 title" v-if="dengjiactive==false" ></span>
                    <span class="icon-上箭头 title" v-if="dengjiactive==true" ></span>
                </div>
            </div>
            <div v-show="brandactive"  class="bj-weui-color  weui-cells_radio">
                <label v-for="item in brand" class=" weui-check__label"  @click="brnadquereng(item.value,1)">
                    <div class="weui-cell__bd">
                        <p>{{item.title}}</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" v-model="brandradio" :value="item.title" name="brandradio">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
            </div>

            <div v-show="jinengactive"  class="bj-weui-color  weui-cells_radio">
                <label v-for="item in jineng" class=" weui-check__label"  @click="jinenquereng(item.value,1)">
                    <div class="weui-cell__bd">
                        <p>{{item.title}}</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" v-model="jinengradios" :value="item.title" name="jinengradios">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
            </div>

            <div v-show="dengjiactive"  class="bj-weui-color  weui-cells_radio">
                <label v-for="item in dengji" class=" weui-check__label"  @click="dengjiquereng(item.value,1)">
                    <div class="weui-cell__bd">
                        <p>{{item.title}}</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" v-model="dengjiradio" :value="item.title" name="dengjiradio">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
            </div>
        </div>

        <div class="bg-primary-hieght"></div>
        <div v-if="elme.length==0" style="color: red;text-align: center">当前师傅没有在线</div>
        <div class="weui-panel weui-panel_access">

            <div class="weui-panel__bd" v-for="(item,index) in elme" v-if="elme.length>0">
                <div  class="weui-media-box  weui-media-box_appmsg" style="height: auto;">
                    <div class="weui-media-box__hd weui-media-box_appmsg-img" @click="url(item.uid)">
                        <img class="weui-media-box__thumb"  onerror="this.src='__PUBLIC__static/index/images/more.png'"  :src="DsQINiu+item.img">
                    </div>
                    <div class="weui-media-box__bd" @click="url(item.uid)">
                        <h4 class="weui-media-box__title">
                            <span v-if="item.real_name">{{item.real_name}}</span>
                            <span v-if="item.is_tui==1" style="color: red;font-size: 12px">推荐师傅</span>
                            <span v-if="!item.real_name">
                                当前师傅没有名字
                            </span>
                        </h4>
                        <p class="weui-media-box__desc">服务类型:
                            <span v-if="item.service_type_id" v-for="che in item.service_type_id" >
                                {{che.title}}
                            </span>
                            <span v-if="!item.service_type_id">当前师傅没有服务类型</span>
                        </p>
                        <p class="weui-media-box__desc">技能标签:
                            <span v-if="item.work_skill" v-for="che in item.work_skill" class="">
                                {{che.title}}
                            </span>
                            <span v-if="!item.work_skill">当前师傅没有服务类型</span>
                        </p>
                        <p class="weui-media-box__desc size">累计接单:
                            <span v-if="item.wage">{{item.wage}}</span>
                            <span v-if="!item.wage">当前师傅还没有接单</span>
                        </p>
                    </div>
                    <div class="weui-media-box__bd button" @click="urls(item.uid)">
                        <input type="button" class="weui-btn  bj_button_bai" value="选中">
                    </div>
                </div>
            </div>
            <div class="weui-loadmore"  v-if="loading">
                <i class="weui-loading"></i>
                <span class="weui-loadmore__tips">{{text}}</span>
            </div>
        </div>

        <transition name="fade">
            <div class="bj-flex-right" v-show="isActived">
                <div class="bj-flex-left-bg" @click="shaihidden">
                </div>
                <div class="bj-flex-right-bg">
                    <div class=" bj-top">
                        <div class="weui-flex">
                            <div class="weui-flex__item">标匠服务</div>
                            <div class="weui-flex__item text-right text-oanger" @click="dizhiguanlishow(1)">
                                上海市徐汇区
                            </div>
                        </div>
                    </div>
                    <div class="fuwuleixing">
                        <div class="fuwuleixings">
                            <div class="weui-flex">
                                <div class="weui-flex__item">服务类型</div>
                                <div class="weui-flex__item text-right" >
                                    <div class="text-hui" @click="fuwuleixingShow">
                                        <span >全部</span>
                                        <span class="icon-下箭头 title" v-if="fuwuleixingShowactive==false" ></span>
                                        <span class="icon-上箭头 title" v-if="fuwuleixingShowactive==true" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="bj-weui-item-parent" v-bind:class="{ bj_weui_item_parents: fuwuleixingShowactive }">
                                <div class="bj-weui-item weui-cells_radio ">
                                    <label v-for="item in leixing" class=" weui-check__label"  @click="dengjiquereng(item.value)">
                                        <div class="weui-cell__bd">
                                            <p>{{item.title}}</p>
                                        </div>
                                        <div class="weui-cell__ft">
                                            <input type="radio" class="weui-check" v-model="jinengradio" :value="item.title" name="leixingradio">
                                            <span class="weui-icon-checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="weui-flex">
                                <div class="weui-flex__item">品牌</div>
                                <div class="weui-flex__item text-right" >
                                    <div class="text-hui" @click="brandShow">
                                        <span >全部</span>
                                        <span class="icon-下箭头 title" v-if="brandShowactive==false" ></span>
                                        <span class="icon-上箭头 title" v-if="brandShowactive==true" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="bj-weui-item-parent" v-bind:class="{ bj_weui_item_parents: brandShowactive }">
                                <div class="bj-weui-item weui-cells_radio " >
                                    <label v-for="(item,ind) in brand"  class=" weui-check__label"  @click="brnadquereng(item.value)">
                                        <div class="weui-cell__bd"  v-if="ind<1000">
                                            <p >{{item.title}}</p>
                                        </div>
                                        <div class="weui-cell__ft"  v-if="ind<1000">
                                            <input type="radio" class="weui-check" v-model="brandradio" :value="item.title" name="brandradios">
                                            <span class="weui-icon-checked"></span>
                                        </div>


                                        <div class="weui-cell__bd" v-if="ind==1000">
                                            <p >全部品牌</p>
                                        </div>
                                        <div class="weui-cell__ft" v-if="ind==1000" style="padding-right:5px ">
                                            <input type="radio" class="weui-check" v-model="brandradio" :value="item.title" name="brandradios">
                                            <span class="icon-更多"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="weui-flex">
                                <div class="weui-flex__item">师傅技能</div>
                                <div class="weui-flex__item text-right" >
                                    <div class="text-hui" @click="jinengShow">
                                        <span >全部</span>
                                        <span class="icon-下箭头 title" v-if="jinengShowactive==false" ></span>
                                        <span class="icon-上箭头 title" v-if="jinengShowactive==true" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="bj-weui-item-parent" v-bind:class="{ bj_weui_item_parents: jinengShowactive }">
                                <div class="bj-weui-item weui-cells_radio ">
                                    <label v-for="item in jineng" class=" weui-check__label"  @click="jinenquereng(item.value)">
                                        <div class="weui-cell__bd">
                                            <p>{{item.title}}</p>
                                        </div>
                                        <div class="weui-cell__ft">
                                            <input type="radio" class="weui-check" v-model="jinengradios" :value="item.title" name="jinengs">
                                            <span class="weui-icon-checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="weui-flex">
                                <div class="weui-flex__item">平台等级</div>
                                <div class="weui-flex__item text-right" >
                                    <div class="text-hui" @click="dengjiShow">
                                        <span >全部</span>
                                        <span class="icon-下箭头 title" v-if="dengjiShowactive==false" ></span>
                                        <span class="icon-上箭头 title" v-if="dengjiShowactive==true" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="bj-weui-item-parent" v-bind:class="{ bj_weui_item_parents: dengjiShowactive }">
                                <div class="bj-weui-item weui-cells_radio ">
                                    <label v-for="item in dengji" class=" weui-check__label"  @click="dengjiquereng(item.value)">
                                        <div class="weui-cell__bd">
                                            <p>{{item.title}}</p>
                                        </div>
                                        <div class="weui-cell__ft">
                                            <input type="radio" class="weui-check" v-model="dengjiradio" :value="item.title" name="dengjiradios">
                                            <span class="weui-icon-checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bj-foooter">
                        <div class="weui-flex bj-weui-flex bj-button">
                            <div class="weui-flex__item">
                                <a href="javascript:;"  @click="brandchongzhi" class="weui-btn bj_button_bais" >重置</a>
                            </div>
                            <div class="weui-flex__item">
                                <a href="javascript:;" @click="shaihidden"  class="weui-btn weui-btn_warn">确认</a>
                            </div>
                        </div>

                    </div>
                    <div class="dizhiguanli" v-show="dizhiguanli">
                        <div class=" bj-top">
                            <div class="weui-flex">
                                <div class="weui-flex__item">服务区域</div>
                                <div class="weui-flex__item text-right text-oanger">
                                    <span class="icon-关闭"  @click="dizhiguanlishow(-1)"></span>
                                </div>
                            </div>

                        </div>
                        <div class="fuwuleixing">

                        </div>
                        <div class="bj-foooter">
                            <div class="weui-flex bj-weui-flex bj-button">

                                <div class="weui-flex__item">
                                    <a href="javascript:;"   class="weui-btn weui-btn_warn">选择其他地址</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </transition>


    </div>
</script>
<script type="text/x-template" id="footer">

</script>
<script>
    var state= {
        elme:<?php echo $lists; ?>,
        text:"正在加载",
        titl:"店铺维修",
        showZonghe:false,
        showZonghes:false,
        fuleiShows:false,
        isActiveb:false,
        isActived:false,
        fuleiShowr:false,
        jinengradio:"服务类型",
        paixunvalue:"综合排序",
        brandradio:"品牌",
        jinengradios:"师傅技能",
        dengjiradio:"师傅等级",
        brandactive:false,
        jinengactive:false,
        dengjiactive:false,
        shaixuanShow:false,
        fuwuleixingShowactive:true,
        brandShowactive:true,
        jinengShowactive:false,
        dengjiShowactive:false,
        dizhiguanli:false,
        brand:[],
        count:0,
        jineng:[],
        dengji:[],
        leixing:[],
        list:<?php echo $list; ?>,
        title: "#bj-searchBar",
        left:" <i class='icon-arrow_lift'></i>",
        right:"",
        fangdaShow:'',
        elementID1:"",
        elementID2:"",
        elementID3:"",
        elementID4:"",
        loading:false,
        zt:<?php echo $zt; ?>
    }
    const store = new Vuex.Store({
        state:state,
        mutations:{
            showZonghefales:function (state) {
                state.showZonghe=false
            },
            showZonghetrue:function (state) {
                state.showZonghe=true
            },
            showZonghestrue:function (state) {
                state.showZonghes=true
            },
            showZonghesfales:function (state) {
                state.showZonghes=false
            },
            fuleiShowstrue:function (state) {
                state.fuleiShows=true
            },
            fuleiShowsfales:function (state) {
                state.fuleiShows=false
            },
            isActivebtrue:function (state) {
                state.isActiveb=true
            },
            isActivebfalse:function (state) {
                state.isActiveb=false
            },
            isActivedtrue:function (state) {
                state.isActived=true
            },
            isActivedbfalse:function (state) {
                state.isActived=false
            },
            brandactivetrue:function (state) {
                state.brandactive=true
            },
            brandactivefalse:function (state) {
                state.brandactive=false
            },
            dengjitrue:function (state) {
                state.dengjiactive=true
            },
            dengjifalse:function (state) {
                state.dengjiactive=false
            },
            jinengactivetrue:function (state) {
                state.jinengactive=true
            },
            jinengactivefalse:function (state) {
                state.jinengactive=false
            },
            brandrightShowtrue:function (state) {
                state.brandShowactive=true
            },
            brandrightShowfales:function (state) {

                state.brandShowactive=false
            },
            jinengShowtrue:function (state) {
                state.jinengShowactive=true
            },
            jinengShowfales:function (state) {
                state.jinengShowactive=false
            },
            dengjiShowtrue:function (state) {

                state.dengjiShowactive=true
            },
            dengjiShowfales:function (state) {

                state.dengjiShowactive=false
            },

        }
    });
    Vue.component('si-headers', {
        template: '#bj-searchBar',
        data: function () {
            return state
        },
        methods:{
            showFangda:function () {
                this.fangdaShow='';
            },
            fanhui:function () {
                window.history.go(-1)
            },
//            搜索
            seek:function () {
                $.showLoading();
                var $this=this;
                $.ajax({
                    type:"POST",
                    url:"__PUBLIC__screen1",
                    data:{data:$this.fangdaShow,page:null},
                    success:function (data) {
                        $.hideLoading();
                        if(data.code===200){
                            $.toptip(data.msg,"success");
                            $this.elme=data.data
                        }else{
                            $.toptip(data.msg,"success");
                        }
                    },
                    error:function (data) {
                        console.log(data);
                    }
                })
            },

        },
            watch:{
                fangdaShow:function (va) {
                if(va==""){
                    this.seek()
                }
                }
            }
    });
    Vue.component('si-content', {
        template: '#content',
        data: function () {
            return state
        },
        methods:{
            brandfales:function () {
                store.commit('brandactivefalse')
                store.commit('dengjifalse')
                store.commit('jinengactivefalse')
            },
            guanbi1:function () {
                store.commit('fuleiShowsfales')
                store.commit('isActivebfalse')
                store.commit('isActivedbfalse')
                this.brandfales()
            },
            guanbi2:function () {
                store.commit('showZonghefales')
                store.commit('showZonghesfales')
                store.commit('isActivebfalse')
                store.commit('isActivedbfalse')
                this.brandfales()
            },
            guanbi3:function () {
                store.commit('showZonghefales')
                store.commit('showZonghesfales')
                store.commit('fuleiShowsfales')
                store.commit('isActivedbfalse')
                this.brandfales()
            },
            guanbi4:function () {
                store.commit('showZonghefales')
                store.commit('showZonghesfales')
                store.commit('fuleiShowsfales')
                store.commit('isActivebfalse')
                this.brandfales()
            },

            zongheShow:function () {
                this.guanbi1();
                if(!this.showZonghe){
                    store.commit('showZonghetrue')
                    store.commit('showZonghestrue')
                }else{
                    store.commit('showZonghefales')
                    store.commit('showZonghesfales')
                }
            },
            leiShow:function () {

                this.guanbi2();
                if(!this.fuleiShows){
                    store.commit('fuleiShowstrue')
                }else{
                    store.commit('fuleiShowsfales')
                }
            }
            ,jiedanShow:function () {
                this.guanbi3();

                if(!this.isActiveb){
                    store.commit('isActivebtrue')
                }else {
                    store.commit('isActivebtrue')
                }
            },
            shaiShow:function () {
                this.guanbi4();
                if(!this.isActived){
                    store.commit('isActivedtrue')
                }
            },
            shaihidden:function () {
                this.guanbi4();
                store.commit('isActivedbfalse')
                this.shaixuan();
            }
            ,zonghe:function () {
                store.commit('showZonghefales')
                store.commit('showZonghesfales')
            },

            chongzhi:function () {
                $(".fuxuan").removeClass("fuxuanactive")
                $(".fuxuan").find("span").addClass("imgs");
                $(".fuxuan").find("span").removeClass("img");
            },
            queren:function () {
                this.fuleiShows=false
            },
            showBrand:function () {
                this.jinengactive=false
                this.dengjiactive=false
                if(!this.brandactive){
                    store.commit('brandactivetrue')
                }else {
                    store.commit('brandactivefalse')
                }
            },
            showJineng:function () {
                this.brandactive=false
                this.dengjiactive=false
                if(!this.jinengactive){
                    store.commit('jinengactivetrue')
                }else {
                    store.commit('jinengactivefalse')
                }
            } ,
            showDengji:function () {
                this.jinengactive=false
                this.brandactive=false
                if(!this.dengjiactive){
                    store.commit('dengjitrue')
                }else {
                    store.commit('dengjifalse')
                }
            },
            brandchongzhi:function () {
                    this.brandradio="品牌"
                    this.jinengradio="服务类型"
                    this.dengjiradio="师傅技能"
                    this.jinengradios="师傅等级"
                this.elementID1=""
                this.elementID2=""
                this.elementID3=""
                this.elementID4=""
            }
            ,brnadquereng:function(id,ud){
                this.brandactive=false
                this.elementID1=id;
                if(ud==1){
                    this.shaixuan()
                }else{

                }

            }
            ,jinenchongzhi:function () {
                $(".jineng-click").removeClass("color-red")
                $(".jineng-click").find("span").addClass("imgs");
                $(".jineng-click").find("span").removeClass("img");
            } ,
            jinenquereng :function (id,ud) {
                this.jinengactive=false
                this.elementID2=id;
                if(ud==1){
                    this.shaixuan()
                }else{

                }
            } ,
            dengjichongzhi:function () {
                $(".dengji-click").removeClass("color-red")
                $(".dengji-click").find("span").addClass("imgs");
                $(".dengji-click").find("span").removeClass("img");
            } ,
            dengjiquereng:function (id,ud) {
                this.dengjiactive=false
                this.elementID3=id;
                if(ud==1){
                    this.shaixuan()
                }else{

                }
            },
            fuwuleixingShow:function () {
                if(!this.fuwuleixingShowactive){
                    this.fuwuleixingShowactive=true;
                }else{
                    this.fuwuleixingShowactive=false;
                }
            },
            jinengShow:function () {
                if(!this.jinengShowactive){
                    store.commit('jinengShowtrue')

                }else {
                    store.commit('jinengShowfales')
                }

            },
            dengjiShow:function () {
                if(!this.dengjiShowactive){
                    store.commit('dengjiShowtrue')

                }else{
                    store.commit('dengjiShowfales')
                }
            },
            brandShow:function () {

                if(!this.brandShowactive){

                    store.commit('brandrightShowtrue')
                }else{

                    store.commit('brandrightShowfales')
                }
            },
            dizhiguanlishow:function (i) {
                if(i>0){
                    this.dizhiguanli=true
                }else{
                    this.dizhiguanli=false
                }

            },
            fuuwlei:function (id,ud) {
                this.fuleiShows=false;
              this.elementID4=id;
                if(ud==1){
                    this.shaixuan()
                }else{

                }
            },
            shaixuan:function (ia) {

              var  $this=this;
//                品牌
               var elementID1=this.elementID1
//                技能
                var elementID2=this.elementID2
//                等级
                var elementID3=this.elementID3
//                服务类型
                var elementID4=this.elementID4
                var data={elementID1:elementID1,elementID2:elementID2,elementID3:elementID3,elementID4:elementID4};
                if(ia==1){

                    data.page=$this.elme.length;
                }else {
                    data.page=null;
                    $.showLoading();
                }
                $.ajax({
                    url:"__PUBLIC__screen2",
                    data:data,
                    dataType:'json',
                    type:"post",
                    success:function (data) {
                        $.hideLoading();

                        if(data.code===200){
                            if(ia==1){
                                for(var i=0;i<data.data.length;i++){
                                    $this.elme.push(data.data[i]);
                                }
                                $this.text=data.msg
                                $this.loading=true
                            }else{
                                $this.loading=false;
                                $this.loading=false;
                                $this.elme=data.data
                            }
                        }else{
                            $this.loading=false;
                            $.toptip(data.msg,"error");
                        }
                    },
                    error:function () {
                    }
                })
            },

            xoa:function () {
               var  $this=this;
                var loading = false;
                var zi=true;
                $(".weui-panel_access").infinite().on("infinite", function() {
                    if(loading) return;
                    loading = true;
                    setTimeout(function() {
                        if( $this.fangdaShow==""){
                            $this.shaixuan(1)
                        }else {
                            $this.seek(1);
                        }
                        loading = false;
                    },1000);
                });
            },
            seek:function (ia) {
                 $.showLoading();
                var $this=this;
                $.ajax({
                    type:"POST",
                    url:"__PUBLIC__screen1",
                    data:{data:$this.fangdaShow,page:$this.elme.length},
                    success:function (data) {
                        $.hideLoading();
                        if(data.code===200){
                            if(ia==1){
                                for(var i=0;i<data.data.length;i++){
                                    $this.elme.push(data.data[i]);
                                }

                            }else{
                                $this.loading=false;
                                $.toast(data.msg);
                                $this.elme=data.data
                            }
                        }else{
                            $.hideLoading();
                            $.toast(data.msg);
                        }
                    },
                    error:function (data) {

                    }
                })
            },
            urls:function (id) {
                var link="__PUBLIC__masterc"
                if(this.zt==1){
                   $.ajax({
                       url:"__PUBLIC__screen3",
                       data:{order:'<?php echo $order; ?>',worker_id:id,link:link},
                       type:"POST",
                       success:function (data) {
                                if(data.code===200){
                                    window.location.href="__PUBLIC__consult1/<?php echo $order; ?>/wid/"+id;
                                }else {

                                }
                       }
                   })
                }else{
                                window.location.href="__PUBLIC__helper1/<?php echo $order; ?>/wid/"+id;
                }


            },
            url:function (id) {
                window.location.href="__PUBLIC__master_information/<?php echo $order; ?>/wid/"+id;
            }
        }
        ,
        mounted:function () {
            this.leixing=this.list['service_type_id']
            this.brand=this.list['brand']
            this.jineng=this.list['work_skill']
            this.dengji=this.list['grabfe']
this.xoa()
        },
    });
    Vue.component('si-footer', {
        template: '#footer',
        data: function () {
            return {

            }
        },
        methods:{
        }
    });
    new Vue({
        el: '#bj-apps',
        mounted:function () {

        },
        methods:{
        }
    });

</script>
</body>
