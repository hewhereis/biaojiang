<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:61:"D:\wamp64\www\phone/application/index\view\masterc\index.html";i:1511832165;s:61:"D:\wamp64\www\phone/application/index\view\public\header.html";i:1511417328;s:59:"D:\wamp64\www\phone/application/index\view\public\menu.html";i:1510987403;s:61:"D:\wamp64\www\phone/application/index\view\public\footer.html";i:1510625091;s:63:"D:\wamp64\www\phone/application/index\view\consult\consult.html";i:1511572933;}*/ ?>
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
    <div class='kehu_zixunzhurenshifu'>
        <div class="weui-cells weui-cells_form margin-none">
            <div class="weui-cells__title">主任师傅工号：<span class='masterid'><?php echo $id; ?></span></div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">品牌 </label>
                </div>
                <div class="weui-cell__bd">
                    <span class='weui-input label-span'>{{data.brand['title']}}</span>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">客户名称：</label>
                </div>
                <div class="weui-cell__bd">
                    <span class='weui-input label-span'>{{data.contact_name}}</span>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">店铺地址：</label>
                </div>
                <div class="weui-cell__bd">
                    <span class='weui-input label-span'>{{data.full_location}}</span>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">预约时间：</label>
                </div>
                <div class="weui-cell__bd">
                    <span class='weui-input label-span'>{{data.start_time}}</span>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label label">师傅个数：</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="Number" v-model="bangshouenumber" class='weui-input user-input label-span' placeholder="请输入个数">
                </div>
                <a href="javascript:;" @click="bangshou" class="weui-btn weui-btn_mini weui-btn_primary" style='background-color: #58a22f;'>帮手</a>
            </div>
            <div class="weui-cells__title">
                <div class="weui-cell__bd">
                    <div class='checkbox'>
                        <input type='checkbox' v-model="checkbox1" id='checkbox1' name='checkboox[]'>
                        <label for='checkbox1' class='label-span'>确认施工时间是否可行</label>
                    </div>
                </div>
            </div>
            <div class="weui-table">
                <div class="weui-table-tr">
                    <div class="weui-cell-item"><span>项目</span></div>
                    <div class="weui-cell-item"><span>项目预算价</span></div>
                    <div class="weui-cell-item"><span>故障详情</span></div>
                </div>
                <div class='weui-table-th' v-for="(item,index) in result">

                    <div class="weui-cell-item" >
                        <span v-if="item.service_type_id==1">安装</span>
                        <span v-if="item.service_type_id==2">维修</span>
                        <span v-if="item.service_type_id==3">品质监理</span>
                        <span v-if="item.service_type_id==4">勘测</span>
                        <span v-if="item.service_type_id==5">更换灯片</span>
                        <span v-if="item.service_type_id==6">围板搭建</span>
                    </div>
                    <div class="weui-cell-item">
                        <input type="text" class="qian" :id="'qian'+index" v-model="qian[index]">
                    </div>
                    <div class="weui-cell-item">
                        <a href="" class='a-link' v-if="item.service_type_id==1"><span>查看详情>></span></a>
                        <a :href="'__PUBLIC__repair_details/'+item.id" class='a-link' v-if="item.service_type_id==2"><span>查看详情>></span></a>
                        <a href="" class='a-link' v-if="item.service_type_id==3"><span>查看详情>></span></a>
                        <a href="" class='a-link' v-if="item.service_type_id==4"><span>查看详情>></span></a>
                        <a href="" class='a-link' v-if="item.service_type_id==5"><span>查看详情>></span></a>
                        <a href="" class='a-link' v-if="item.service_type_id==6"><span>查看详情>></span></a>
                    </div>

                </div>

            </div>
            <div class="weui-tim">
                <div class="weui-tim-content" id="login">
                    <!--<div class="weui-tim-content-left">-->
                        <!--<div class='weui-tim-content-left-photo'>-->
                            <!--<img src="__DsQINiu__<?php echo $useridimageurl; ?>" onerror="this.src='__PUBLIC__static/index/images/more.png'" height='45' width='45' alt="">-->
                        <!--</div>-->
                        <!--<div class='weui-tim-content-left-text'>-->
                            <!--<span></span>-->
                            <!--<span class=''></span>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="weui-tim-content-right">-->
                        <!--<div class='weui-tim-content-right-photo'>-->
                            <!--<img src="__DsQINiu__<?php echo $customerimageurl; ?>" onerror="this.src='__PUBLIC__static/index/images/more.png'"  height='45' width='45' alt="">-->
                        <!--</div>-->
                        <!--<div class='weui-tim-content-right-text'>-->
                            <!--<span class=''></span>-->
                            <!--<span></span>-->
                        <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-cell weui-cell_select">
                        <input id="job" v-model="usermsg" class="xunwen2 weui-input" style="border: 1px solid #dddddd">
                    </div>
                </div>
                <div class="weui-cell__hd">
                    <label class="weui-label" style='text-align: center;line-height: 1px;' @click="send">
                        <div   class="weui-btn weui-btn_mini weui-btn_primary" style='background-color: #58a22f;'>发送</div>
                    </label>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <a href="javascript:;" @click ="gobacks()" class="weui-btn weui-btn_warn bg-color">返回</a>
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
    $ur=0;
    var data = {
        sex: 1,
        data:<?php echo $data; ?>,
        result:<?php echo $result; ?>,
        elemarrleft:[],
        usermsg:"",
        elemarright:[],
        checkbox1:false,
        qian:[],
        qians:[],
        order_number:'<?php echo $order_number; ?>',
        bangshouenumber:'<?php echo $num; ?>',
        ud:0,
        pay:<?php echo $pay; ?>
    }
    Vue.component('mian', {
        template: '#mian',
        data: function () {
            return data
        },
        methods: {
            gobacks:function(){
                window.history.go(-1);
            },
            send:function () {
                var i=0;
                var _this=this;
                if(this.usermsg==""){
                    $.toptip("发送内容不能为空","error");
                    return false
                }
                if(this.ud==2){

                    if(_this.qian.length==0){
                        $.toptip("请填写报价金额","error");
                        return false
                    }
                    _this.qian.forEach(function (p1, p2, p3) {
                        if(p1>=10){
                            i++;
                        }
                    });
                    if(i!==_this.qian.length){
                        $.toptip("报价不能小于10","error");
                        return false
                    }
                    if(!_this.checkbox1){
                        $.toptip("请勾选确认时间","error");
                        return false
                    }
                    $.ajax({
                        type:"POST",
                        data:{mei:data.qian,order_number:data.order_number},
                        url:"__PUBLIC__mast_tie",
                        dataType:"json",
                        success:function (datas) {
                            if(datas.code==200){
                               zhuangtai=true
                                $ur=0;
                                datas.data.mei.forEach(function (p1, p2, p3) {
                                    data.qians[p2]=p1
                                    $ur+=p1
                                })
                                sendweb(_this.usermsg)
                            }
                        }
                    })
                }else{
                    zhuangtai=false
                    sendweb(this.usermsg)
                }

            },
            bangshou:function () {
                var $this=this;
                if($this.bangshouenumber==""||$this.bangshouenumber==0){
                    $.toptip("添加帮手师傅不能为空","error");
                    return false;
                }
                $.ajax({
                    url:"__PUBLIC__helper",
                    type:"POST",
                    data:{order:$this.order_number,num:$this.bangshouenumber},
                    dataType:"json",
                    success:function (data) {

                            if(data.code==200){
                                $.toast(data.msg);
                                window.location.href="__PUBLIC__helper1/"+$this.order_number+"/wid/0";
                            }else {
                                $.toptip(data.msg,"error");
                            }
                    }
                })
            }
        },
        mounted:function () {
            if(this.pay!=1){
                $("#job").select({
                title: "选择发送信息",
                items: [{title:"提供信息不全，需要洽谈了解进一步的情况",value:1 },{title:"信息全面，确定可以承接，请直接下单",value:2}],
                onChange:function (da) {
                    data.usermsg=da.titles;
                    data.ud=da.values;


                }
            });
            }
            
        }
        ,computed:{
            zongjian:function () {
                 $ur=0;
                this.qian.forEach(function (p1, p2, p3) {
                    if(p1==0||p1==""||!parseInt(p1)){

                    }else{
                        $ur+=parseInt(p1);
                    }

                })
                return $ur;
            },

        }
    })
    //头
    Vue.component('headers', {
        template: '#header',
        data: function () {
            return {
                title: "主任师傅"
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

    function onSendData(usermsg) {
        //得到交易对方的userid.
        //get the content in the element and wrap into .
        var content = "msgtype:1,msg:" + usermsg;
        if(zhuangtai){
            content+="&checkbox1="+(data.checkbox1?1:0)
            content+="&zongjia="+$ur
            content+="&bangshou="+data.bangshouenumber

            $('.qian').each(function(index){
                if($(this).attr('id').length>0)
                {
                    content=content+"&"+$(this).attr('id')+"="+(data.qians[index]);
                    //find the target id and set it value.
                }})
        }
        SendContentOut(content);
    }
    function SetSelfElement(from_user_id, msg) {
        //here, set the value of different element.
        var items = {};
        var keyvalue = [];
        var key = "", value = "";
        var paraString = msg.split("&");
        for(var item in paraString){
            var  paraString1= paraString[item].split("=");
            if(item==0){
                say(from_user_id,null,paraString[0])
            }
        }
//        zongjia  checkbox1 bangshou qian
        var chatmsg = "";
        return chatmsg;
    }
</script>
<script type="text/javascript" src="__PUBLIC__static/index/js/workerman/swfobject.js"></script>
<script type="text/javascript" src="__PUBLIC__static/index/js/workerman/web_socket.js"></script>

<script>
    WEB_SOCKET_DEBUG = true;
    var ws,ownername,ownerid, userid,orderid,username,userlist={};
    var ifshowalert=0;
    var username=null;

    $(function() {
        usertype=  <?php echo $usertype; ?>;
        orderid = "<?php echo $order_number; ?>";
        userid = "<?php echo $userid; ?>";//$("#userid").html();
        username="<?php echo $username; ?>";//<?php echo session("username"); ?>;
        ownername="<?php echo $owner_name; ?>";
        ownerid="<?php echo $owner_id; ?>";
    });
    // 连接服务端
    $(function connect() {
        // 创建websocket
        ws = new WebSocket("ws://"+"__WORKMAN__");
        // 当socket连接打开时，输入用户名
        ws.onopen = onopen;
        // 当有消息时根据消息类型显示不同信息
        ws.onmessage = onmessage;
        ws.onclose = function() {
            if(ifshowalert==0) {
                alert("连接通讯服务器超时，重新连接!");
                ifshowalert=1;
            }
            console.log("连接关闭，定时重连");
            connect();
        };
        ws.onerror = function() {
            console.log("出现错误");
        };
    });
    function parseString(bigStr,splitstr)
    {
        var obj={};
        var keyvalue=[];
        var key="",value="";
        var paraString=bigStr.substring(0,bigStr.length).split(splitstr);
        for(var i in paraString)
        {
            keyvalue=paraString[i].split(":");
            key=keyvalue[0];
            value=keyvalue[1];
            obj[key]=value;
        }
        return obj;
    }

    // 连接建立时发送登录信息
    function onopen()
    {
        if(!username)
        {
            //show_prompt();
            $username="testuser";
        }
        //在连接的时候需要携带其用户id信息以及对应的订单号，只有该订单编号和用户id信息匹配，
        // 并且订单在有效范围内而且用户是需要在线的，连接才可以成功。
        // 连接成功以后 ，web socket需要通过web接口通报web服务器用户进入交易聊天状态。
        // 如果用户退出聊天状态，websocket显性断开，需要调用web服务器接口告知web服务器该用户退出了聊天状态。
        var login_data = '{"type":"login","userid":"'+userid+'","username":"'+username+'","usertype":"'+usertype+'","orderid":"'+orderid+'"}';
        console.log("websocket握手成功，发送登录数据:"+login_data);
        ws.send(login_data);
    }
    // 服务端发来消息时
    function onmessage(e)
    {

        var data = eval("("+e.data+")");
        switch(data['type']){
            // 服务端ping客户端
            case 'ping':
                ws.send('{"type":"pong"}');
                break;;
            // 登录 更新用户列表
            case 'login':
                //{"type":"login","client_id":xxx,"client_name":"xxx","client_list":"[...]","time":"xxx"}
                // console.log(data);
                var showuserid="";


                say(data['userid'], data['username'],  data['username']+' 已经联线', data['time']);
                if(data['userlist'])//user_list put the user list which is involved in the order.
                {
                    userlist = data['userlist'];
                }

                break;
            // 发言
            case 'say':
                //{"type":"say","from_client_id":xxx,"to_client_id":"all/client_id","content":"xxx","time":"xxx"}
                //调用解析函数，解析接收到来自服务器端的内容。
                //content中的内容定义。
                //{msgtype:typeval,msg:msgcontent}  其中typeval为 0  表示是交流内容；typeval为 1,表示是价格信息。
                var content=parseString(data["content"],",");
                if(content.hasOwnProperty("msgtype")) {
                    //parse the content
                    if(content["msgtype"]=="1") {

                        var diagmsg=SetElementValue(get_useid_byclientid(data),content["msg"]);
//                        if(diagmsg!="") say(get_useid_byclientid(data),
//                            get_username_byclientid(data),
//                            diagmsg,
//                            data['time']);
                    }else {
                        if(content.hasOwnProperty("msg")) {

                            // 对于普通类型,msgcontend 就是对话消息，可以用于直接显示。
                            say(get_useid_byclientid(data), get_username_byclientid(data),content["msg"], data['time']);
                        }
                    }


                } else {
                    // 没有设置msgtype就当其是对话消息，直接显示。
                    say(get_useid_byclientid(data), get_username_byclientid(data), data['content'], data['time']);
                }
                break;
            // 用户退出 更新用户列表
            case 'logout':
                //{"type":"logout","client_id":xxx,"time":"xxx"}
                say(get_useid_byclientid(data), get_username_byclientid(data), data['username']+' 离开了', data['time']);
                removeUseridFromUserlist(data['userid']);
                break;
        }
    }

    function SetElementValue(from_user_id,msg)
    {
        SetSelfElement(from_user_id,msg)
    }

    //得到各部分的值，并且拼接成&xxxx=的格式。
    //对于价格类型的消息 msgcontend<={needcheck=0&numcraftman=n&item1name=item1price&item2name=item2price&diag=xxxx}
    function CheckIfOnline(userid)
    {

        for(var p in userlist){
            //在userlist中发现有该id说明
            if(userlist[p]["userid"]==userid) return true;
        }
        return false;
    }

    function get_useid_byclientid(data)
    {
        var fromclientinfo={};
        var local_client_id=data.hasOwnProperty("from_client_id")?data["from_client_id"]:
            data.hasOwnProperty("client_id")?data["client_id"]:"未知clientid";
        if(userlist.hasOwnProperty(local_client_id))
        {
            fromclientinfo=userlist[local_client_id];
        }
        return fromclientinfo.hasOwnProperty("userid")?fromclientinfo["userid"]:"未知id";
    }

    function get_username_byclientid(data)
    {
        var fromclientinfo={};
        var local_client_id=data.hasOwnProperty("from_client_id")?data["from_client_id"]:
            data.hasOwnProperty("client_id")?data["client_id"]:"未知clientid";
        if(userlist.hasOwnProperty(local_client_id))
        {
            fromclientinfo=userlist[local_client_id];
        }
        return fromclientinfo.hasOwnProperty("username")?fromclientinfo["username"]:"未知名";
    }
    // 输入姓名
    function show_prompt(){
        username = prompt('输入你的名字：', '');
        if(!username || username=='null'){
            username = '游客';
        }
    }

    function SendContentOut(content)
    {
        var to_userid = "all";
        ws.send('{"type":"say","to_client_id":"'+to_userid+'","order":"'+orderid+'","content":"'+content+'","qian":0}');
    }
    // 发言
    function say(from_user_id, from_user_name, content, time){
        //解析来自服务端的内容。
        //如果from_client_id以及是当前订单的对手交易方或者是系统管理方，才把消息显示在对话框里面。
        //和user_list里面的数据进行比较，确认本次发送过来的数据是师傅的还是客户的。

        if(from_user_id==userid) {
        var html=' <div class="weui-tim-content-left"><div class="weui-tim-content-left-photo"> <img src="__DsQINiu__<?php echo $useridimageurl; ?>" height="45" width="45" alt=""> </div> <div class="weui-tim-content-left-text"><span><?php echo $username; ?></span> <span class="">'+content+'</span> </div> </div>'
        } else {
            var html=' <div class="weui-tim-content-right"><div class="weui-tim-content-right-photo"> <img src="__DsQINiu__<?php echo $customerimageurl; ?>" height="45"  width="45" alt=""> </div> <div class="weui-tim-content-right-text"><span><?php echo $username; ?></span> <span class="">'+content+'</span> </div> </div>'
        }
        $("#login").append(html)
    }


    function sendweb(usermsg) {
        console.log("send out msg should be " + usermsg);
        //检查对方是否已经登录，如果没有提示用户对方没有在线，需等待。
        if (CheckIfOnline("<?php echo $userid; ?>") == true) {
            onSendData(usermsg);
        } else {
            say(userid, username, "对方还没有上线，请稍等！", Date.now());
        }
    }
    function functioSetSelfElement(from_user_id, msg) {

    }
    function removeUseridFromUserlist() {

    }
</script>


