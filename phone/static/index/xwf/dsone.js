function two() {
	sessionStorage.removeItem('phone');
	var phone  =$('#phone').val();
	if(!(/^1[34578]\d{9}$/.test(phone)) || phone==''){
			$.toptip('手机号码有误，请重填', 'warning');
			return false;
		}　　 
		$.showLoading();
		$.ajax({
			type: 'POST',
			url:ds_public+'yanzheng',
			dataType: 'json',
			data: {
				phone: phone
			},
			success: function(data) {
				if (data.code == 200) {
					  $.hideLoading();
					  sessionStorage.setItem('phone', phone);
					  $.toast(data.msg, 'success', function(){
                          location.href = ds_public+'backpwdtwo';
                        });
				} else {
				    $.hideLoading();
					$.toptip(data.msg, 'error');
					return false;
				}
			}
		});
	
}