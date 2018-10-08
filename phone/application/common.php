<?php
use think\Db;
use taobao\AliSms;

/**
 * 字符串截取，支持中文和其他编码
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
	if (function_exists("mb_substr"))
		$slice = mb_substr($str, $start, $length, $charset);
	elseif (function_exists('iconv_substr')) {
		$slice = iconv_substr($str, $start, $length, $charset);
		if (false === $slice) {
			$slice = '';
		}
	} else {
		$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("", array_slice($match[0], $start, $length));
	}
	return $suffix ? $slice . '...' : $slice;
}



/**
 * 读取配置
 * @return array 
 */
function load_config(){
    $list = Db::name('config')->select();
    $config = [];
    foreach ($list as $k => $v) {
        $config[trim($v['name'])]=$v['value'];
    }

    return $config;
}



/**
 * 发送短信(参数：手机号,客户名称,订单号，时间,)
 */
function ds_payment($phone,$uname,$order,$time)
{
    include_once('sms.php');
	$phone=$phone;//要发送的手机号
	$sms_content = "订单号:{$order},已被:{$uname}付款。请您尽快登录平台与客户联系(付款时间：{$time})。【标匠网络】";
	$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
	// 这里写短信平台发送短信代码
	$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);		
	$gets = post_sms_data($sms_data, $target);
	$s1=$gets['State'];
	$s2=$gets['MsgState'];
	$data['phone']=$phone;
	$data['captcha']=$s1.','.$s2;
	$data['created_at']=date('Y-m-d H:i:s');
	Db::name('sms_captcha')->insertGetId($data);
	return "";
}




/**
 * 发送短信(参数：手机号,服务类型,商品大类，师傅名称，时间,师傅手机号)
 */
function ds_short_sms($phone,$service,$goos,$work,$time,$wids,$captcha)
{
    include_once('sms.php');
	$phone=$phone;//要发送的手机号
	$sms_content = "您需要{$service}{$goos},目前已经安排{$work}师傅({$wids})为您提供维修服务(预计上门时间为{$time}).服务确认码{$captcha}(师傅上门完成服务请主动告诉师傅此确认码)。请耐心等候，如有特殊情况，请及时于师傅沟通。【标匠网络】";
	$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
	// 这里写短信平台发送短信代码
	$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);		
	$gets = post_sms_data($sms_data, $target);
	$s1=$gets['State'];
	$s2=$gets['MsgState'];
	$data['phone']=$phone;
	$data['captcha']=$s1.','.$s2;
	$data['created_at']=date('Y-m-d H:i:s');
	Db::name('sms_captcha')->insertGetId($data);
	return "";
}






/**
 * 发送短信(参数：手机号,服务类型,商品大类，师傅名称，时间,师傅手机号)
 */
function yj_information($phone)
{
    include_once('sms.php');
    $phone=$phone;//要发送的手机号
    $sms_content ="您申请的月结客户已通过审核,请查看平台消息  【标匠网络】";
    $target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
    // 这里写短信平台发送短信代码
    $sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);
    $gets = post_sms_data($sms_data, $target);
    $s1=$gets['State'];
    $s2=$gets['MsgState'];
    $data['phone']=$phone;
    $data['captcha']=$s1.','.$s2;
    $data['created_at']=date('Y-m-d H:i:s');
    Db::name('sms_captcha')->insertGetId($data);
    return "";
}

/**
 * 没有联系到客户发送短信
 */
 function re_short_sms($phone,$m_phone){
	include_once('sms.php');
	$phone=$phone;//要发送的手机号
	$sms_content="顾客您好，在您付款之后我们的师傅及时联系您，由于一些原因，没有打通您的电话，师傅电话({$m_phone})，请及时联系。【标匠网络】";
	$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
	$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);    
	$gets = post_sms_data($sms_data, $target);
	$s1=$gets['State'];
	$s2=$gets['MsgState'];
	$data['phone']=$phone;
	$data['captcha']=$s1.','.$s2;
	$data['created_at']=date('Y-m-d H:i:s');
	Db::name('sms_captcha')->insertGetId($data);
	return "";
 }
//获取装备类别名称
function getLeiBieName($id)
{
    if(empty($id)){
        return "";
    }
    $info = Db::name('zb_lb')->where('id='.$id)->field('name')->find();
    if($info){
       return $info['name'] ;
    }else{
        return "";
    }
}



//获取装备品牌名称
function getPinPeiName($id)
{
    if(empty($id)){
        return "";
    }
    $info = Db::name('zb_pp')->where('id='.$id)->field('name')->find();
    if($info){
       return $info['name'] ;
    }else{
        return "";
    }
}


//生成网址的二维码 返回图片地址
function Qrcode($token, $url, $size = 8){ 

    $md5 = md5($token);
    $dir = date('Ymd'). '/' . substr($md5, 0, 10) . '/';
    $patch = 'qrcode/' . $dir;
    if (!file_exists($patch)){
        mkdir($patch, 0755, true);
    }
    $file = 'qrcode/' . $dir . $md5 . '.png';
    $fileName =  $file;
    if (!file_exists($fileName)) {

        $level = 'L';
        $data = $url;
        QRcode::png($data, $fileName, $level, $size, 2, true);
    }
    return $file;
}



/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name) {
    $result = false;
    if(is_dir($dir_name)){
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}



//时间格式化1
function formatTime($time) {
    $now_time = time();
    $t = $now_time - $time;
    $mon = (int) ($t / (86400 * 30));
    if ($mon >= 1) {
        return '一个月前';
    }
    $day = (int) ($t / 86400);
    if ($day >= 1) {
        return $day . '天前';
    }
    $h = (int) ($t / 3600);
    if ($h >= 1) {
        return $h . '小时前';
    }
    $min = (int) ($t / 60);
    if ($min >= 1) {
        return $min . '分钟前';
    }
    return '刚刚';
}

//时间格式化2
function pincheTime($time) {
     $today  =  strtotime(date('Y-m-d')); //今天零点
      $here   =  (int)(($time - $today)/86400) ; 
      if($here==1){
          return '明天';  
      }
      if($here==2) {
          return '后天';  
      }
      if($here>=3 && $here<7){
          return $here.'天后';  
      }
      if($here>=7 && $here<30){
          return '一周后';  
      }
      if($here>=30 && $here<365){
          return '一个月后';  
      }
      if($here>=365){
          $r = (int)($here/365).'年后'; 
          return   $r;
      }
     return '今天';
}


//获取用户信息
//TODO 同一次请求内做缓存,不重复查询
function getUserInfo($id=null){
    $id=$id?$id:session('id');
    if($id>0){
        return Db::name('users')->where('id','eq',$id)->find();
    }
    return null;
}





