  $('#login').click(function(){
		var phone      =$('#phone').val();
		var password   =$('#password').val();
		if(phone==''){
			$.toptip('手机号不能为空', 'warning');
			return false;
		}
		if(password==''){
			$.toptip('密码不能为空', 'warning');
			return false;
		}
		$.showLoading();
		$.ajax({
				url:ds_public+'login_ajax',
				type:'post',
				dataType:'json',
				data:{
					phone:phone,
					password:password
				},
				success:function(data){
				if (data.code == 200) {
					$.hideLoading();
                        $.toast(data.msg, 'success', function(){
                            if(data.type==1){
                                 window.location.href =ds_public;                            
                            }else if(data.type==2){                                                                             
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