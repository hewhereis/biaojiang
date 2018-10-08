  $('#ok').click(function(){
		var password  =$('#password').val();
		if(password==''){
			$.toptip('密码不能为空', 'warning');
			return false;
		}　
		var phone = JSON.parse(sessionStorage.getItem('phone'));
		$.showLoading();
		$.ajax({
				url:ds_public+'complete',
				type:'post',
				dataType:'json',
				data:{
					phone:phone,
					password:password
					
				},
				success:function(data){
				if (data.code == 200) {
					sessionStorage.removeItem('phone');
					$.hideLoading();
                        $.toast(data.msg, 'success', function(){
                            location.href = ds_public+'login';
                        });
                    }else{
					 $.hideLoading();
					 $.toptip(data.msg, 'error');
					 return false;
				}
				
			}
		});
		
	});