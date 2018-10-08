// login
$(function() {
    $("#masterInfoAndComments .allCommentsType .allCommentsType-item").click(function() {
        $(this).addClass('allCommentsType-itemOns').siblings('li').removeClass('allCommentsType-itemOns');
    });
    
    weuiCardsClose = function(){
    	$("#weuiCardsParent").on('click','.weui-cards-header-close',function(){
    		var $hidden = $(this).parent('.weui-cards-header').parent(".weuiCards");
			$hidden.slideUp(500);
			setTimeout(function() { $hidden.remove() }, 1000)
    	})
    }
    $('#goback').click(function() {
        window.history.go(-1)
    });
    $('.registersType .registerType').click(function() {
        $(this).addClass('on').siblings('div').removeClass('on')
    })
    $('#loginFindPasswordVCodeInput').focus(function() {
        $('#loginFindPasswordVCodeIcon').animate({ opacity: '1' }, 1000)
        return
    });
    $('#loginFindPasswordVCodeIcon').click(function() {
        $('#loginFindPasswordVCodeInput').val('')
    });
    var lookPassword = false
    $("#lookpassword").click(function() {
        if (lookPassword) {
            $(this).removeClass('icon-eyes').addClass('icon-Eyes-closed ').siblings('input').attr({ "type": "password" })
            lookPassword = false
        } else {
            $(this).removeClass('icon-Eyes-closed').addClass('icon-eyes').siblings('input').attr({ "type": "text" })
            lookPassword = true
        }
    });
});
