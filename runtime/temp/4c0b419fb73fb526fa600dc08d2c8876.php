<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"E:\masterarea.com\biaojiang.local\public/../application/index\view\auth\index.html";i:1542902331;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>__Dstitle__</title>
    <link rel="icon" type="image/png" href="__PUBLIC__static/index/images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name='keywords' content="">
    <meta name="author" content="">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/font-awesome.min.css">
    <link rel="stylesheet" href="__PUBLIC__static/index/css/bootstrap/awesome-bootstrap-checkbox.css">
    <!-- Plugin -->
    <!-- bootstrapValidator -->
    <link rel="stylesheet" href="__PUBLIC__static/index/js/bootstrapValidator/css/bootstrapValidator.min.css">
    <!-- Main -->
    <link rel="stylesheet" href="__PUBLIC__static/index/css/main.css">
    <!-- Custom -->
    <link rel="stylesheet" href="__PUBLIC__static/index/css/custom.css">
    <!--[if lt IE 9]>
          <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!--jQuery -->
    <script src="__PUBLIC__static/index/js/jquery/jquery-1.11.2.min.js"></script>
    <!--Bootstrap -->
    <script src="__PUBLIC__static/index/js/bootstrap/bootstrap.min.js"></script>
    <!-- bootstrapValidator -->
    <script src="__PUBLIC__static/index/js/bootstrapValidator/bootstrapValidator.min.js"></script>
    <script src="__PUBLIC__static/index/js/bootstrapValidator/zh_CN.js"></script>
    <script src="__PUBLIC__static/index/js/tool.js"></script>
    <script src="__PUBLIC__static/index/js/public.js"></script>
    <script src="__PUBLIC__static/index/js/layui/lay/dest/layui.all.js" type="text/javascript"></script>
    <script src="__PUBLIC__static/index/js/gVerify.js" type="text/javascript"></script>
    <script src="__PUBLIC__static/index/js/jquery.idcode.js"></script>
	<script src="__PUBLIC__static/index/js/jquery.cookie.js"></script>
</head>
<style>
.alert{
    position: relative;
    z-index: 100;
    right: 0;
}
.alert-chi{
	position: absolute;
	top: -67px;
	z-index: 99;
	background: red;
	right: 15px;
	width: 213px;
}
.auth_code {
    position: absolute;
    width: 164px;
    height: 67px;
    background-color: #f6fff9;
    border: 1px solid #d6ded9;
    right: -15px;
    top: -127px;
    display: none;}
.auth_code label {
    width: 145px;
    margin: 6px 0 6px 12px;
    display: block;
    clear: both;
    overflow: hidden;}

  input.authCodeText {
    width: 92px;
    height: 22px;
    padding: 0;}
.auth_code label input.autoCodeButton {
    float: right;
    width: 45px;
    height: 24px;
    border: 1px solid #f36f20;
    background-color: #f36f20;
    color: #fff;
    padding: 0;
}
.auth_code em {
    position: absolute;
    width: 0;
    height: 0;
    overflow: hidden;
    font-size: 0;
    display: inline-block;
    border-width: 10px;
    border-color: #f6fff9 transparent transparent transparent;
    border-style: solid dashed dashed dashed;
    z-index: 2;
    bottom: -19px;
    left: 75px;
}
.auth_code em.arrow_background {
    border-color: #d8e0db transparent transparent transparent;
    z-index: 1;
    bottom: -20px;
}
input.autoCodeButton {
    float: right;
    width: 45px;
    height: 24px;
    border: 1px solid #f36f20;
    background-color: #f36f20;
    color: #fff;
    padding: 0;}

</style>
<body class="login">
    <div class='wrapper'>
        <div class='inner-wrapper'>
            <div class="form-signin">
                <div class="text-center">
                    <h3 class="text-light text-white"><img src="__PUBLIC__static/index/images/logo.png" class="logo"></h3>
                </div>
                <hr>
                <div class="tab-content">
                    <!--用户登录-->
                    <div id="login" class="tab-pane active">
                        <form id='form1' method="post">
                            <div class="text-center">
                                <h3>用户登录</h3>
                            </div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class='input-group-addon'><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                    <input type="text" name='phone' placeholder="请输入手机号" class="form-control phone" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o" aria-hidden="true"></i></span>
                                    <input type="password" name='password' placeholder="请输入密码" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" class="styled" id="inlineCheckbox2" name='rem_password' value="1">
                                <label for="inlineCheckbox2">记住密码</label>
                            </div>
                            </div>
                            <blockquote style='border-left: 5px solid #f90022;display:none;' class=''>
                                    <p style='font-size:12px;color:red' id='p1'></p>
                            </blockquote>
                            <div class="button-1">
                                <button class="btn btn-sm btn-orange btn-block" id="login-btn" type="button">立即登录</button>
                            </div>
                        </form>
                    </div>
                    <!--用户登录end-->
                    <!--用户注册-->
                    <div id="signup" class="tab-pane">
                        <form id='form3' method="post">
                            <div class="text-center">
                                <h3>用户注册</h3></div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class='input-group-addon'><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                    <input type="text" name='phone' id="phone" placeholder="请输入手机号" class="form-control phone" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o" aria-hidden="true"></i></span>
                                    <input type="password" name='password' id="password" placeholder="请输入密码" class="form-control middle">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o" aria-hidden="true"></i></span>
                                    <input type="password" name='password_confirm' id='password_confirm' placeholder="请输入确认密码" class="form-control bottom">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                    <input type="text" name="sms_captcha" id="signup-captcha" class="form-control" pattern="\d{6}" maxlength="6" placeholder="验证码">
                                    <a class="btn btn-default input-group-addon" id="second">获取验证码</a>
                                </div>
                            </div>
                             <div class="alert">
                                <div class="auth_code" id="authCode">
                                    <label>
                                        <div id="v_container"></div>
                                    </label>
                                    <label>
                                        <input type="text" value="" class="authCodeText" id="code_input" name="txt_mathcode" style="border-color: rgb(221, 221, 221);">
                                        <input type="button" class="autoCodeButton" value="确认" id="my_button">
                                    </label>
                                    <em class="arrow_front"></em>
                                    <em class="arrow_background"></em>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="proprietor" name="type" value="1" checked="">
                                    <label for="proprietor">客户</label>
                                </div>
                                <div class="radio radio-success radio-inline">
                                    <input type="radio" id="master" name="type" value="2" >
                                    <label for="master">师傅</label>
                                </div>
                                <div class="radio radio-danger radio-inline">
                                    <input type="radio" id="provider" name="type" value="3" >
                                    <label for="provider">服务商</label>
                                </div>
                            </div>
                            <blockquote style='border-left: 5px solid #f90022;display:none;' class=''>
                                    <p style='font-size:12px;color:red' id='p2'></p>
                            </blockquote>
                            <div class="button-3">
                                <button class="btn btn-sm btn-orange btn-block" id="signup-btn" type="button">立即注册</button>
                            </div>
                        </form>
                    </div>
                    <!--用户注册end-->
                    
                    <div id="reset-password" class="tab-pane">
                        <form id='form4' method="post">
                            <div class="text-center">
                                <h3>密码重置</h3></div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class='input-group-addon'><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                    <input type="text" name='phone' id="phones" placeholder="请输入手机号" class="form-control phone" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o" aria-hidden="true"></i></span>
                                    <input type="password" name='password' id="passwords" placeholder="请输入密码" class="form-control middle">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='input-group'>
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o" aria-hidden="true"></i></span>
                                    <input type="password" name='password_confirm' placeholder="再输入一次输入密码" class="form-control bottom">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                    <input type="text" name="sms_captcha" id="reset-password-captcha" class="form-control"  pattern="\d{6}" maxlength="6" placeholder="验证码">
                                   <a class="btn btn-default input-group-addon" id="btnSendCodes" />获取验证码</a>
                                </div>
                            </div>
                            <div class="alert">
                                <div class="auth_code" id="authCodes">
                                    <label  style="width: 100px;height: 28px;font-size: 20px;background: rgba(221, 221, 221,0.5);box-sizing: border-box;padding-left: 20px;padding-top: 2px">
                                         <span id="idcode"></span>
                                    </label>
                                    <label>
                                        <input type="text" value="" class="authCodeText txtVerification" id="Txtidcode" name="txt_mathcode" style="border-color: rgb(221, 221, 221);">
                                        <input type="button" class="autoCodeButton" value="确认" id="btns">
                                    </label>
                                    <em class="arrow_front"></em>
                                    <em class="arrow_background"></em>
                                </div>
                            </div>
                            <input type="hidden" name='required' placeholder="" value='1' class="form-control bottom">
                            <blockquote style='border-left: 5px solid #f90022;display:none;' class=''>
                                    <p style='font-size:12px;color:red' id='p3'></p>
                            </blockquote>
                            <div class="button-4">
                                <button class="btn btn-sm btn-orange btn-block" id="reset-password-btn" type="button">重置密码</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <ul class="list-inline">
                        <li>
                            <a class="text-muted" href="#login" data-toggle="tab">登录</a>
                        </li>
                        <li>
                            <a class="text-muted" href="#signup" data-toggle="tab">注册</a>
                        </li>
                        <li>
                            <a class="text-muted" href="#reset-password" data-toggle="tab">密码重置</a>
                        </li>
                    </ul>
                </div>
            </div>
<script type="text/javascript">
            keyup = function(id,reg,ids,msg,i){
                $(id).keyup(function(e){
                    var val =$(this).val();
                    if(!(reg.test(val))){
                        $('#'+ids).parent('blockquote').show();
                        $('#'+ids).html(msg);
                        $('#'+i).attr({'disabled':true});
                    }else{
                        $('#'+ids).parent().hide();
                        $('#'+ids).html('');
                        $('#'+i).prop({'disabled':false});
                    }
                });
            }
             keyup('#form1 input[name=phone]',/^1[34578]\d{9}$/,'p1','您输入的手机号格式不对！','login-btn');
             keyup('#form3 input[name=phone]',/^1[34578]\d{9}$/,'p2','您输入的手机号格式不对！','signup-btn');
             keyup('#form4 input[name=phone]',/^1[34578]\d{9}$/,'p3','您输入的手机号格式不对！','reset-password-btn');
           
</script>
<script type="text/javascript">
//点击注册
    $(function(){
        var verifyCode = new GVerify("v_container");
        var auth_codetrue=false;
        $("#second").click(function (){
              var phone = $("#form3 input[name=phone]").val();
                    if (!(/^1[34578]\d{9}$/.test(phone)) || phone=='') {
                             layer.msg('手机号码有误，请重填',{icon: 5,time: 2000})
                             return false;
                        }
                        if(!auth_codetrue){
                            $("#code_input").focus();
                            $("#authCode").css("display","block");
                            auth_codetrue=true
                        }else{
                            $("#authCode").css("display","none");
                            auth_codetrue=false
                        }
                         document.getElementById("my_button").onclick = function(){
							var keys = document.cookie.match(/[^ =;]+(?=\=)/g);  
							if(keys) {  
								for(var i = keys.length; i--;)  
									document.cookie = keys[i] + '=0;expires=' + new Date(0).toUTCString()  
							} 
                         var res = verifyCode.validate(document.getElementById("code_input").value);
                         if(res){
                         $(".auth_code").css("display","none");
                         sendCode($("#second"));
                         v = getCookieValue("secondsremained");//获取cookie值
                         if(v>0){
                         settime($("#second"));//开始倒计时
                    }

                 }else{
                    $("#code_input").focus();
                    layer.msg('图形验证输入错误',{icon:2,time:1500});
                    m=false
                }
            } 
        });
        v = getCookieValue("secondsremained");//获取cookie值
        if(v>0){
        settime($("#second"));//开始倒计时
        }
    })
</script>

<script type="text/javascript">
  //发送验证码时添加cookie
    function addCookie(name,value,expiresHours){ 
        var cookieString=name+"="+escape(value);
        //判断是否设置过期时间,0代表关闭浏览器时失效
        if(expiresHours>0){ 
            var date=new Date(); 
            date.setTime(date.getTime()+expiresHours*1000); 
            cookieString=cookieString+";expires=" + date.toUTCString(); 
        } 
        document.cookie=cookieString; 
    } 

    //修改cookie的值
    function editCookie(name,value,expiresHours){ 
        var cookieString=name+"="+escape(value); 
        
        if(expiresHours>0){ 
            var date=new Date(); 
            date.setTime(date.getTime()+expiresHours*1000); //单位是毫秒
            cookieString=cookieString+";expires=" + date.toGMTString(); 
        } 
        document.cookie=cookieString; 
    } 
    //根据名字获取cookie的值
    function getCookieValue(name){ 
        var strCookie=document.cookie; 
        var arrCookie=strCookie.split("; "); 
        for(var i=0;i<arrCookie.length;i++){ 
        var arr=arrCookie[i].split("="); 
            if(arr[0]==name){
                return unescape(arr[1]);
                break;
            }else{
                return ""; 
                break;
            } 
        } 
    }

    //发送验证码
    function sendCode(obj){
          var phone = $("#form3 input[name=phone]").val();
            $.ajax({
                 type: 'POST',
                 url: 'auth/vcode',
                 data: {
                     phone: phone
                    },           
                    dataType: 'json',
                     error: function(data) {  
                            layer.msg('发送验证码出现一点小问题',{icon:2,time:2000});
                    },
                    success: function(data) {    
                        if (data.code == 200) {
                                layer.msg(data.msg,{icon:1,time:1500});
                                addCookie("secondsremained",120,120);//添加cookie记录,有效时间60s
                                settime(obj);//开始倒计时  
                            } else {
                                layer.msg(data.msg,{icon:2,time:1500});   
                        }
                   }
         });
}
    //开始倒计时
    var countdown;
    function settime(obj) { 
        countdown=getCookieValue("secondsremained");
        if (countdown == 0) {  
            obj.removeAttr("disabled"); 
            obj.html("免费获取验证码"); 
        return;
        } else { 
            obj.attr("disabled", true); 
            obj.html("重新发送(" + countdown + ")"); 
            countdown--;
            editCookie("secondsremained",countdown,countdown+1);
        } 
        setTimeout(function() { settime(obj) },1000) //每1000毫秒执行一次
    } 
    </script>
     
     <script type="text/javascript">

            $(function(){
        var IsBy;
            $.idcode.setCode();
            
            $("#btns").click(function (){
				var keys = document.cookie.match(/[^ =;]+(?=\=)/g);  
							if(keys) {  
								for(var i = keys.length; i--;)  
									document.cookie = keys[i] + '=0;expires=' + new Date(0).toUTCString()  
							} 
                 IsBy = $.idcode.validateCode(); 
            });
        var verifyCoded = false;
        $("#btnSendCodes").click(function (){
              var phone = $("#form4 input[name=phone]").val();
                    if (!(/^1[34578]\d{9}$/.test(phone)) || phone=='') {
                             layer.msg('手机号码有误，请重填',{icon: 5,time: 2000})
                             return false;
                        }
                        if(!verifyCoded){
                            $("#authCodes").css("display","block");
                            verifyCoded=true;
                             $("#code_inputs").focus();
                        }else{
                            $("#authCodes").css("display","none");
                            verifyCoded=false;
                        }
                         document.getElementById("btns").onclick = function(){
                         if(IsBy){
                         $(".auth_code").css("display","none");
                         sendCodes($("#btnSendCodes"));
                        v = getCookieValue("secondsremained");//获取cookie值
                        if(v>0){
                        settime($("#btnSendCodes"));//开始倒计时
                    }

                 }else{
                    layer.msg('图形验证输入错误',{icon:2,time:1500});
                    $("#code_inputs").focus();
                    m=false
                }
            } 
        });
        v = getCookieValue("secondsremained");//获取cookie值
        if(v>0){
        settime($("#btnSendCodes"));//开始倒计时
        }
    })

      /**
     * 重置密码发送验证码
     */
     function sendCodes(obj){
          var phone = $("#form4 input[name=phone]").val();
            $.ajax({
                 type: 'POST',
                 url: 'auth/vvcode',
                 data: {
                     phone: phone
                    },           
                    dataType: 'json',
                     error: function(data) {  
                            layer.msg('验证码发送遇到点小问题');
                    },
                    success: function(data) {    
                        if (data.code == 200) {
                                layer.msg(data.msg,{icon:1,time:1500});
                                addCookie("secondsremained",120,120);//添加cookie记录,有效时间60s
                                settime(obj);//开始倒计时     
                            } else {
                                layer.msg(data.msg,{icon:2,time:1500});    
                        }
                   }
            });
    }
</script>
<script>
    jQuery(document).ready(function($) {
        //所有input标签回车无效，当然，可以根据需求自定义
        $("input").on('keypress', function(e) {
            var key = window.event ? e.keyCode : e.which;
            if (key.toString() == "13") {
                return false;
            }
        });
    //登陆
    $('.button-1 > button').on('click', function() {
        if ($("#form1 input[name=phone]").val() == '') {
            layer.msg('手机号不能为空',{icon: 5,time: 2000})
        } else if ($("#form1 input[name=password]").val() == ''){
            layer.msg('密码不能为空',{icon: 5,time: 2000})
        }else{
            var locading = layer.load(3);
            var phone = $("#form1 input[name=phone]").val();
            var password = $("#form1 input[name=password]").val();
            $.ajax({
                type: 'POST',
                url: 'auth/login',
                data: {
                    phone: phone,
                    password: password
                },
                timeout:20*1000,
                dataType: 'json',
                success: function(data) {
                    layer.close(locading);
                    if (data.code == 200) {
                        layer.msg(data.msg, {
                            icon: 1,
                            time: 1000
                        }, function() {
                            if(data.type==1){
                                  location.href = '__PUBLIC__core/customer';                                    
                            }else if(data.type==2){                                                                             
                                location.href = '__PUBLIC__core/master';    
                            }else if(data.type==3){
                                 location.href = '<?php echo url("index/index"); ?>';
                            }
                        });
                    } else {
                      
                        layer.msg(data.msg,{icon: 5,time: 2000})
                        $('#p1').parent('blockquote').show();
                        $('#p1').html(data.msg)
                    }
                },
                error:function(data){
                    layer.close(locading);
                    layer.msg(data.msg,{icon: 5,time: 2000})
                    
                }
            })
        }
    });
    //注册
    $('#signup-btn').click(function() {
            var phone = $('#phone').val();
            var password = $('#password').val();
            var password_confirm = $('#password_confirm').val();
            var captcha = $('#signup-captcha').val();
            var type = $('input[name="type"]:checked').val();
            if (!(/^1[34578]\d{9}$/.test(phone))) {
                layer.msg('手机号码有误，请重填',{icon: 5,time: 2000})
                return;
            }
            if (password == "") {
                layer.msg('密码不能为空',{icon: 5,time: 2000})
                return;
            }
            if(password_confirm == '' || password_confirm!=password){
                layer.msg('两次密码不一致！',{icon: 5,time: 2000})
                return;
            }
            if (captcha == "") {
                layer.msg('验证码不能为空',{icon: 5,time: 2000})
                return;
            }
            var locading = layer.load(3);
            $.ajax({
                url: 'auth/register',
                dataType: 'json',
                data: {
                    phone: phone,
                    password: password,
                    captcha: captcha,
                    type: type
                },
                type: 'post',
                success: function(data) {
                    layer.close(locading);
                    if (data.code == 200) {
                        layer.msg(data.msg, {
                            icon: 1,
                            time: 1000
                        }, function() {
                            if(data.type==1){
                                 location.href = '__PUBLIC__core/customer';                                     
                            }else if(data.type==2){                                                                             
                                location.href = '__PUBLIC__information';    
                            }else if(data.type==3){
                                 location.href = '<?php echo url("index/index"); ?>';
                            }
                        });
                    } else {
                      
                        layer.msg(data.msg,{icon: 5,time: 2000})
                    }
                },
                error:function(data){
                    layer.close(locading);
                   
                    layer.msg(data.msg,{icon: 5,time: 2000})
                }
            })
        })
        //重置密码
    $('#reset-password-btn').click(function() {
        var phone = $('#phones').val();
        var password = $('#passwords').val();
        var chptcha = $('#reset-password-captcha').val();
        var password_confirm = $("#form4 input[name=password_confirm]").val();
        if (!(/^1[34578]\d{9}$/.test(phone))) {

        
            layer.msg('手机号码有误，请重填',{icon: 5,time: 2000})
            return false;
        }
        if (password=='') {
           
            layer.msg('密码不能为空',{icon: 5,time: 2000})
            return false;
        }
        if (password != password_confirm) {
           
            layer.msg('两次密码不一致',{icon: 5,time: 2000})
            return false;
        }
        if (chptcha == "") {
            
            layer.msg('验证码不能为空',{icon: 5,time: 2000})
            return false;
        }
        
        var chptcha = $('#reset-password-captcha').val();
        var locading = layer.load(3);
        $.ajax({
            dataType: 'Json',
            data: {
                password: password,
                phone: phone,
                chptcha: chptcha
            },
            type: 'post',
            url: 'auth/update',
            success: function(data) {
                layer.close(locading);
                if (data.code == 200) {
                    layer.msg(data.msg, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        location.href = '<?php echo url("auth/index"); ?>';
                    });
                } else {
                   
                    layer.msg(data.msg,{icon: 5,time: 2000})
                }
            },
            erroe:function(data){
                layer.close(locading);
              
                layer.msg(data.msg,{icon: 5,time: 2000})
            }
        })
    })
});
</script>
        </div>
    </div>
</body>

</html>
