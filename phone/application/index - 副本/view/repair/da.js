{include file='public/header'}
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
                    <input class='weui-input label' v-model="datas.shanchuang" type='text' placeholder="请填写商场名称">
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
            <div class="weui-flex" style="margin-top: 20px">
                <div class="weui-flex__item">
                    <input @click="baocun(1)" type="button" class="weui-btn" style=" background: -webkit-linear-gradient(left, #FF8C00 , #FE5403);width: 80%;color :#ffffff" value="直接下单">
                </div>
                <div class="weui-flex__item">
                    <input @click="baocun(2)" type="button" class="weui-btn" style=" background: -webkit-linear-gradient(left, #4FBBED , #2F80B9);width: 80%;color :#ffffff" value="咨询下单">
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/javascript" src="__PUBLIC__static/index/webupload/webuploader.min.js"></script>
{include file='public/menu'} {include file='public/footer'}
<script>
var data = {
    sex: 1,
    datas:{$list},
    radio1:1,
    shanchuang:'',
    times:"",
    hedan:0,
    yuejie:0,
    mentouzhao:'',
    yanshou:""
}
Vue.component('mian', {
        template: '#mian',
        data: function() {
            return data
        },
        methods: {
            getdata: "",
            baocun:function(i){
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }
                
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }
                
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }
                
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }
                
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }
                
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }
                
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }
                
                if(this.datas.name===""){
                    $.toptip('请填写真实姓名', 2000, 'error');
                    return false
                }

                var seee=sessionStorage.baochun;
                var vu=this._data;
                var data=[seee,vu] ;
                $.ajax({
                    url:"__PUBLIC__direct_order",
                    data:{data:data,i:i},
                    type:'post',
                    dataType:'json',
                    success:function(data){
                         if(data.code==200){
                            window.location.href="__PUBLIC__customer_rejection/"+data.order_number;
                         }
                    }

                })
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
