<?php

	define('APP_ID','wxa0a4b634184f1e0f');
	define('APP_SECRET','98b45294466b922304d2e652119396f8');
	//注：如果获取 不到token 请先查看微信公众平台 白名单 有没有 当前服务器IP
	function  mem_token(){
			if(exists_token()){
				if (exprise_token()) {
					$token=get_token();
					unlink('token.txt');
					file_put_contents('token.txt', $token);
				}else{
					$token=file_get_contents('token.txt');		
				}
			}else{
				$token=get_token();
				file_put_contents('token.txt', $token);

			}
			return $token;
		}

//var_dump($token);

	//判断文件是否存在
	function exists_token(){
			//判断token文件是否存在
			if(file_exists('token.txt')){
				return true;
			} else{
				return false;
			}
	}
	// 获取token.txt文件的创建时间，并且与当前执行PHP文件的时间进行对比
	function exprise_token(){
		//文件创建时间
		$ctime=filectime('token.txt');
		//7200秒acces_token 过期 避免设置7200时刚刚过期所有设置为7000
		if ((time()-$ctime) >=7000){
			return true;

		}else{
			return false;
		}
	}

	function get_token(){
		
			$ch = curl_init();
			//设置选项，包括URL
			$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.APP_ID.'&secret='.APP_SECRET.'';
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch,CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //服务器所在机房无法验证SSL证书。 解决办法：跳过SSL证书检查。 
			//执行并获取HTML文档内容
			$output = curl_exec($ch);

			//释放curl句柄
			 curl_close($ch);
			 $obj = json_decode($output,true);
			 
			
			 return $obj['access_token'];
	}
