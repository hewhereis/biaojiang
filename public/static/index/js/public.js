$(function() {

	//维护显示
	$('.gallery-info a').click(function() {
		var num = parseInt($(this).attr('num'));
		if(!num) {
			$('.row .alert').removeClass('hide').addClass('show');
			setTimeout(function() {
				$('.row .alert').removeClass('show').addClass('hide');
			}, 2000);
			return false;
		}
	});

	$("#file_upload").change(function() {
		var $file = $(this);
		var fileObj = $file[0];
		var windowURL = window.URL || window.webkitURL;
		var dataURL;
		var $img = $("#preview");

		if(fileObj && fileObj.files && fileObj.files[0]) {
			dataURL = windowURL.createObjectURL(fileObj.files[0]);
			$img.attr('src', dataURL);
		} else {
			dataURL = $file.val();
			var imgObj = document.getElementById("preview");
			imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
			imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;

		}
	});

	$("#file_upload1").change(function() {
		var $file = $(this);
		var fileObj = $file[0];
		var windowURL = window.URL || window.webkitURL;
		var dataURL;
		var $img = $("#preview1");

		if(fileObj && fileObj.files && fileObj.files[0]) {
			dataURL = windowURL.createObjectURL(fileObj.files[0]);
			$img.attr('src', dataURL);
		} else {
			dataURL = $file.val();
			var imgObj = document.getElementById("preview1");

			imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
			imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;

		}
	});

	//he_dan页面添加
	$('#tianjia').click(function() {
		var size = $('.line1').size() + 1;
		var str = "<div class='line1 p-5'><p class='lead mb-5'><img src='../../public/img/xian.png'><span>序号" + size + "：</span><span>维修项目</span><span><input tyle='text' class=' length' name='weixiuname" + size + "'></span><img src='../../public/img/xian.png'></p><div class='row p-5'><div class='col-md-3'><div class='checkbox'><label><input type='checkbox'  name='guzhang" + size;
		var str = str + "' >故障详情是否需补充</label></div></div><div class='col-md-9'><div class='form-group'><input type='text' name='guzhanginfo" + size + "' class='form-control' placeholder='请输入故障信息'></div></div></div><div class='row p-5'><div class='col-md-3 mb-5'><a class='btn btn-info btn-sm'><i class='glyphicon glyphicon-plus'></i><span>添加照片</span><input type='file' class='fileInput' name='img" + size;
		var str = str + "' /></a></div><div class='col-md-9'><div class='form-group'><img src='../../public/img/11.jpg' class='img-responsive img-thumbnail img-140' /></div></div></div></div>";
		$('.info').append(str);
	});

	$('.list-inline li > a').click(function() {
		var activeForm = $(this).attr('href') + ' > form';
		//console.log(activeForm);
		$(activeForm).addClass('animated fadeIn');
		//set timer to 1 seconds, after that, unload the animate animation
		setTimeout(function() {
			$(activeForm).removeClass('animated fadeIn');
		}, 1000);
	});

	var arr = new Array();
	var st = '';
	$(".labelClick").each(function(i) {
		var labelClick = false;
		var str = "str_" + i;
		$(this).click(function() {
			if(!labelClick) {
				$(this).children('i').removeClass('hide');
				arr[str] = $(this).children('span').html();
				labelClick = true;
			} else {
				$(this).children('i').addClass('hide');
				arr[str] = '';
				labelClick = false;
			}
			st += arr[str];

			// 	alert(st);
		});
	});
//	$("#keep").click(function() {
		// 	for(var i=0;i<arr.length;i++){
		// 		alert(arr[i]);
		// 	}

		//		st=arr.join(",");
		//		alert(arr);
		//		alert($("#spanHtml").html());

//	});

	//使用优惠卷
	labelCoupon = false;
	var summation1 = parseInt($("#summation").html());
	$("#labelCoupon").click(function() {
		if(!labelCoupon) {
			$("#couponlabel").removeClass('hide');
			labelCoupon = true;
		} else {
			$("#couponlabel").addClass('hide');
			$("#select").val(0);
			$("#summation").html(summation1);
			labelCoupon = false;
		}
	});
	
//师傅首页的侧边栏
			$('#master_type div span').eq(0).addClass('active');
			$('#master_type div span').click(function(){
				$(this).addClass('active').siblings().removeClass('active');
			});
			$('#left ul li').hover(function(){
				$(this).addClass('bg-orange').siblings('li').removeClass('bg-orange');

			},function(){
			});
			var menuShow = false;
			$('#menu_btn').click(function(){
				if(menuShow){
				$('#left').stop(true).animate({'left':'-'+200},1000);
				$(this).children('i').eq(1).removeClass('hide');
				$(this).children('i').eq(0).addClass('hide')
				menuShow = false;
			}else{
				$('#left').stop(true).animate({'left':0},1000);
				$(this).children('i').eq(1).addClass('hide');
				$(this).children('i').eq(0).removeClass('hide')
				menuShow = true;
			}
			});

});