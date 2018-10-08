var phone = JSON.parse(sessionStorage.getItem('phone'));
$("#phone").html(phone);
var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount; //当前剩余秒数
		$.showLoading();
		$.ajax({
			type: 'POST',
			url:ds_public+'send_outs',
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
	
function sendMessage() {
	var phone = JSON.parse(sessionStorage.getItem('phone'));　 
		$.showLoading();
		$.ajax({
			type: 'POST',
			url:ds_public+'send_outs',
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


  $('#three').click(function(){
	    var captcha =$('#loginFindPasswordVCodeInput').val();
		var phone = JSON.parse(sessionStorage.getItem('phone'));
		$.showLoading();
		$.ajax({
				url:ds_public+'reset',
				type:'post',
				dataType:'json',
				data:{
					phone:phone,
					captcha:captcha
					
				},
				success:function(data){
				if (data.code == 200) {
					$.hideLoading();
                        $.toast(data.msg, 'success', function(){
                            location.href = ds_public+'backpwdthree';
                        });
                    }else{
					 $.hideLoading();
					 $.toptip(data.msg, 'error');
					 return false;
				}
				
			}
		});
		
	});
