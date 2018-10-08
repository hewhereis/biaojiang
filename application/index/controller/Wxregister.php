<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Wxregister extends Controller
{     
     
    public function index()
    {    
	
		function openID(){
			$code = $_GET['code'];
			
			
			$json=file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxa0a4b634184f1e0f&secret=98b45294466b922304d2e652119396f8&code='.$code.'&grant_type=authorization_code');
			$arr=json_decode($json,true);
			if(empty($arr['errcode'])){
				$openid=$arr['openid'];//用户ID
				return $openid;	  
			}else{
				header('Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa0a4b634184f1e0f&redirect_uri=http%3A%2F%2Fwww.bj-wang.com%2Fweixinzc%2Fregister&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect ');
			}
			
		}
		$openid=openID();
	
		//echo $openid;
		$user = Db::name('users')->field('username,type,id,openid')->where("openid='{$openid}'")->find();
	
		
		if(empty($user)){
			echo '1';
			$this->redirect('http://www.bj-wang.com/weixinzc/auth?openid='.$openid);
		}else{
			
			 session('ds_username',$user['username']);
			 session('id',$user['id']);  
			 session('type',$user['type']); 
			 session('openid',$user['openid']);		
			$this->redirect('http://www.bj-wang.com/');
		}
    }
	
	public  function wxauth($openid){
		$this->assign('openid', $openid);
		return view();
	
	}
	
	public  function wxlogin(){
	
		if(request()->isPost()){
			$params = input('post.');
			$phone  = input('phone');
			
			$list = Db::name('users')->field('status,type,real_name')->where("phone='{$phone}'")->find();
			//两表查询  判断师傅有没有实名认证
			
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号或者密码不正确'));
			}else{
					if($list['status']==0){
				return json(array('code'=>0,'msg'=>'您的账号已被禁用'));
			}else{			  
			$result = model('users')->wx_do_login($params);	
			//判断登陆的类型
			if($list['type']==1){
			    if($result){
			        return json(array('code'=>200,'type'=>1,'msg'=>'登陆成功'));
			        $this->redirect('index/index');			         
			    }else{
			        return json(array('code'=>0,'msg'=>'手机号或者密码不正确'));
			    }
			}else if($list['type']==2){
			        if($result){	
			            return json(array('code'=>200,'type'=>2,'msg'=>'登陆成功'));      
			        }else{
			            return json(array('code'=>0,'msg'=>'手机号或者密码不正确'));
			        }
			    
			}else if($list['type']==3){
			    if($result){
			        return json(array('code'=>200,'type'=>3,'msg'=>'登陆成功'));			        		         
			    }else{
			        return json(array('code'=>0,'msg'=>'手机号或者密码不正确'));
			    }
			}
			
			  }
		   }
	    }
	
	}
	
	 /**
     * 微信用户注册
     */
	public function  wxzhuz(){
		include 'weixintoken.php';
		$token = mem_token();
		$params = input('post.');
		$openid=$params['openid'];
		$phone = input('post.phone');
		 // 构建数据数组
		 $list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(!empty($list)){
				return json(array('code'=>0,'msg'=>'手机号已注册'));
		}
		$jsons=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$token.'&openid='.$openid.'&lang=zh_CN ');
		$arrs=json_decode($jsons,true);
		$touxiang=$arrs['headimgurl'];//用户头像
		$usename=$arrs['nickname'];//用户名称
		$type=input('post.type');
		 //随机生密码
        $str = '';
        $num = 8;// 用户密码
        $str2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmno454545pqrstuvwxyz";
        $max = strlen($str2)-1;
        for($i=0;$i<$num;$i++){
            $str.=$str2[rand(0,$max)];
        }
		
        $data['phone'] = input('post.phone');
        $data['password'] = MD5($str);
        $captcha = input('post.captcha');
		if(!is_numeric($captcha)){
			return json(array('code'=>0,'msg'=>'验证码输入错误！'));
		}
		$user = Db::name('sms_captcha_log');
        $list = $user->where('phone='.$data['phone'])->field('captcha')->order('id desc')->limit(1)->find();
        if($captcha==$list['captcha']){
            	$data['username'] = $usename;
				$data['created_at'] = time();
				$data['openid'] = $openid;
				$data['img'] = $touxiang;
				$data['type'] = input('post.type');
				//昵称储存在session中
				session('ds_username',$data['username']);
				session('type',$type);
				session('openid',$openid);
				$users = Db::name('users');
				if($result = $users->insertGetId($data)){
					session('id',$result);
					$list = Db::name('users')->field('id')->where("phone='{$phone}'")->find();
					$map['message_type']='1';
					$map['source_id']='0';
					$map['receive_id']=$list['id'];
					$map['content']='您的初始密码为'.$str;
					Db::name('message_reminder')->insertGetId($map);
					return json(array('code'=>200,'msg'=>'恭喜你,注册成功！'));
					
				}else{
					return json(array('code'=>0,'msg'=>'注册遇到点小问题！'));
				}
        }else{
            return json(array('code'=>0,'msg'=>'验证码输入错误！'));
        }
    }
   
}