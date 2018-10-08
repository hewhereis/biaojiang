<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Weixin extends Controller
{     
      /**
       * 微信验证首页
      */
     public function index(){
		include_once('weixintoken.php');
		header("Content-Type:text/html; charset=UTF-8");
		//验证签名
		 function valid()
		{
			$echoStr = $_GET["echostr"];
			$signature = $_GET["signature"];
			$timestamp = $_GET["timestamp"];
			$nonce = $_GET["nonce"];
			$token = TOKEN;
			$tmpArr = array($token, $timestamp, $nonce);
			sort($tmpArr, SORT_STRING);
			$tmpStr = implode($tmpArr);
			$tmpStr = sha1($tmpStr);
			if($tmpStr == $signature){
				echo $echoStr;
				exit;
			}
		}
		//响应消息
		function responseMsg()
		{
			$postStr = file_get_contents("php://input"); 
			file_put_contents('weixin.txt', $postStr);
			if (!empty($postStr)){
				logger("R \r\n".$postStr);
				$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
				$RX_TYPE = trim($postObj->MsgType);
				
				 //消息类型分离
				switch ($RX_TYPE)
				{
					case "event":
						$result = receiveEvent($postObj);
						break;
					case "text":
						$result = receiveText($postObj);
						break;
					case "image":
						$result = receiveImage($postObj);
						break;
					case "location":
						$result = receiveLocation($postObj);
						break;
					case "voice":
						$result = receiveVoice($postObj);
						break;
					case "video":
					case "shortvideo":
						$result = receiveVideo($postObj);
						break;
					case "link":
						$result = receiveLink($postObj);
						break;
					default:
						$result = "unknown msg type: ".$RX_TYPE;
						break;
				}
				logger("T \r\n".$result);
				echo $result;
			}else {
				echo "";
				exit;
			}
		}
		 //接收事件消息
		function receiveEvent($object)
		{
			$content = "";
			switch ($object->Event)
			{
				 //关注事件
				case "subscribe":
					 $content = "您好，我是客服小匠，感谢您的关注哦！
标匠网络是集展柜安装，测量，维修，基装等一站式全国性商装服务平台，以创新模式引领商装行业“新售后”，网点覆盖全国50+重点城市，曾服务68个全球一线品牌，随时随地帮您找到专业师傅。
小匠将竭诚为你服务！
欢迎咨询：0512-36911463";    
					 break;
				
				default:
					$content = "receive a new event: ".$object->Event;
					break;
			}
			if(is_array($content)){
				$result = transmitNews($object, $content);
			}else{
				$result = transmitText($object, $content);
			}
			return $result;
		}
		//接收文本消息
		function receiveText($object)
		{
		   
			return '';
		}
		//接收图片消息
		 function receiveImage($object)
		{
		   
			return '';
		}
		//接收语音消息
		 function receiveVoice($object)
		{
		  
			return '';
		}
		//回复文本消息
		function transmitText($object, $content)
		{
			
		   if (!isset($content) || empty($content)){
			  return "";
		  }
			 $xmlTpl = "<xml>
						 <ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						 <CreateTime>%s</CreateTime>
						 <MsgType><![CDATA[text]]></MsgType>
						 <Content><![CDATA[%s]]></Content>
						</xml>";
			 $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);
			 return $result;
		}
		//日志记录
		function logger($log_content)
		{
			if(isset($_SERVER['HTTP_APPNAME'])){   //SAE
				sae_set_display_errors(false);
				sae_debug($log_content);
				sae_set_display_errors(true);
			}else if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"){ //LOCAL
				$max_size = 1000000;
				$log_filename = "log.xml";
				if(file_exists($log_filename) and (abs(filesize($log_filename)) > $max_size)){unlink($log_filename);}
				file_put_contents($log_filename, date('Y-m-d H:i:s')." ".$log_content."\r\n", FILE_APPEND);
			}
	   }



	   
		function https_request($url,$data = null)
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
			if (!empty($data)){
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			}
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($curl);
			curl_close($curl);
			return $output;
		}


	
	$token = mem_token();
	//echo $token;
	$access_token = $token;
		$jsonmenu = '{
					 "button":[
					 
						{
						   "name":"展柜服务",
						   "sub_button":[
						   {    
							   "type":"view",
							   "name":"维修",
							   "url":"https://mp.weixin.qq.com/s/jKXyIglVcTwAfiQ48Gz_zw"
							},
							{
							   "type":"view",
							   "name":"安装",
							   "url":"https://mp.weixin.qq.com/s/sNZt6y9-nDmmd0S6h-7KDg"
							},
							{
							   "type":"view",
							   "name":"测量",
							   "url":"https://mp.weixin.qq.com/s/UiGr35jYQvgPWhbIZ7TtWg"
							},{
							   "type":"view",
							   "name":"基装",
							   "url":"https://mp.weixin.qq.com/s/h3wGMetIdjbokSp4VD0wlQ"
							}]
					   },
					   {
						   "name":"加盟",
						   "sub_button":[
						   {    
							   "type":"view",
							   "name":"师傅考核",
							   "url":"http://www.bj-wang.com/"
							},
							{
							   "type":"view",
							   "name":"城市合伙人",
							   "url":"https://mp.weixin.qq.com/s/ujdEuN2eXF0vRZL7haDMcQ"
							}
							]
					   },
					   {
						   "name":"我的",
						   "sub_button":[
						   {    
							   "type":"view",
							   "name":"企业介绍",
							   "url":"http://mp.weixin.qq.com/s/VYcOsEaMY4op1NOmZj3w3g"
							},
							{
							   "type":"view",
							   "name":"行业案例",
							   "url":"https://mp.weixin.qq.com/s/IV-4xT8xJKjidelsAVKhyQ"
							},
							{
							   "type":"view",
							   "name":"师傅地图",
							   "url":"http://www.bj-wang.com/"
							},{
							   "type":"view",
							   "name":"我要咨询",
							   "url":"http://www.bj-wang.com/weixin"
							}]
					   }
					]
				 }';

		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
		$result = https_request($url, $jsonmenu);
		//var_dump($result);
		
		
		
        //微信token验证 一定要放在最下面
        define("TOKEN", "weixin");
        if (!isset($_GET['echostr'])) {
           responseMsg();
        }else{
           valid();
        }
 
    }
   
}