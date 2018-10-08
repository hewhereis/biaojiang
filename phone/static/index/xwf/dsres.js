//立即注册获取验证码
var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount; //当前剩余秒数
function sendMessage() {
	var phone  =$('#phone').val();
	if(!(/^1[34578]\d{9}$/.test(phone)) || phone==''){
			$.toptip('手机号码有误，请重填', 'warning');
			return false;
		}　　 
		$.showLoading();
		$.ajax({
			type: 'POST',
			url:ds_public+'send_out',
			timeout:60*1000,
			dataType: 'json',
			data: {
				phone: phone
			},
			success: function(data) {
				if (data.code == 200) {
					  $.hideLoading();
					  $.toast(data.msg, 'success', function(){
                            curCount = count;　　 //设置button效果，开始计时
							$("#btnSendCode").attr("disabled",true);
							$("#btnSendCode").css("pointer-events","none");
							$("#btnSendCode").css("color","#ccc");
							$("#btnSendCode").html(curCount + "秒后获取");
							InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                        });
				} else {
				    $.hideLoading();
					$.toptip(data.msg, 'error');
					return false;
				}
			}
		});
	
}


//timer处理函数
function SetRemainTime() {
	if (curCount == 0) {
		window.clearInterval(InterValObj); //停止计时器
		$("#btnSendCode").removeAttr("disabled"); //启用按钮
		$("#btnSendCode").css("pointer-events","auto");
		$("#btnSendCode").css("color","##008cd0");
		$("#btnSendCode").html("重新发送");
	} else {
		
		curCount--;
		$("#btnSendCode").html(curCount + "秒后获取");
	}
}


  $('#complete').click(function(){
		var phone      =$('#phone').val();
		var captcha    =$('#captcha').val();
		var password   =$('#password').val();
		var passwords  =$('#passwords').val();
		var type       =$('input:radio:checked').val();
		if(!(/^1[34578]\d{9}$/.test(phone)) || phone==''){
			$.toptip('手机号码有误，请重填', 'warning');
			return false;
		}
		if(captcha==''){
			$.toptip('验证码不能为空', 'warning');
			return false;
		}
		if(password==''){
			$.toptip('密码不能为空', 'warning');
			return false;
		}  
		if(passwords == '' || passwords!=password){
            $.toptip('两次密码不一致', 'warning');
			return false;
        }
		$.showLoading();
		$.ajax({
				url:ds_public+'register_ajax',
				type:'post',
				dataType:'json',
				data:{
					phone:phone,
					captcha:captcha,
					password:password,
					type:type
				},
				success:function(data){
				if (data.code == 200) {
					$.hideLoading();
                        $.toast(data.msg, 'success', function(){
                            if(data.data==1){
                                 window.location.href =ds_public;                               
                            }else if(data.data==2){                                                                             
                                 window.location.href =ds_public;    
                            }
                        });
                    }else{
					 $.hideLoading();
					 $.toptip(data.msg, 'error');
					 return false;
				}
				
			}
		});
		
	});