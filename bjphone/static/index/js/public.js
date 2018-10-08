  const LENGTH = 5
  const CLS_ON = 'on'
  const CLS_HALF = 'half'
  const CLS_OFF = 'off'

var starComponted = function() {
    var stars = []
    var score = Math.floor(this.fenshu * 2) / 2;
    var hasDecimal = score % 1 !== 0;
    var integer = Math.floor(score);
    for (let i = 0; i < integer; i++) {
        stars.push(CLS_ON);
    }
    if (hasDecimal) {
        stars.push(CLS_HALF);
    }
    while (stars.length < LENGTH) {
        stars.push(CLS_OFF);
    }
    return stars;
}

var getdata = function(type) {
    var date = new Date();
    if (type == 1) {
        var year = date.getFullYear();
        var mounth = date.getMonth() + 1;
        var dates = date.getDate();
        return year + "-" + mounth + "-" + dates;
    } else {
        var hours = date.getHours();
    }
}
var weuiCardsCloses = function(){
    var $hidden = $(this);
    $hidden.slideUp(500);
    setTimeout(function() { $hidden.remove() }, 1000)
}

function xmTanUploadImg(obj) {
    var file = obj.files[0];
    var reader = new FileReader();
    //读取文件过程方法
    // reader.onloadstart = function (e) {
    //     console.log("开始读取....");
    // }
    // reader.onprogress = function (e) {
    //     console.log("正在读取中....");
    // }
    // reader.onabort = function (e) {
    //     console.log("中断读取....");
    // }
    // reader.onerror = function (e) {
    //     console.log("读取异常....");
    // }
    reader.onload = function (e) {
        console.log("成功读取....");

        var img = document.getElementById("xmTanImg");
        img.src = e.target.result;
        //或者 img.src = this.result;  //e.target == this
    }

    reader.readAsDataURL(file)
}