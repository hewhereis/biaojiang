<?php
namespace app\index\controller;
use think\Controller;
use think\Db; 
class Auth extends Controller
{
	//登录页面
    public function login()
    {
		return view('auth/login');
    }
	
	//注册页面
    public function register()
    {
		return view('auth/register');
    }

	//找回密码1
    public function backpwdone()
    {
		return view('auth/findpassword');
    }
	//找回密码1
    public function backpwdtwo()
    {
		return view('auth/findpassword2');
    }
	//找回密码1
    public function backpwdthree()
    {
		return view('auth/findpassword3');
    }
	//验证手机号是否存在
	public function yanzheng()
	{
		$phone=input('post.phone');
		    // 构建数据数组
		 $list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
			}else{
				return json(array('code'=>200,'msg'=>'正在跳转'));
			}
	}
	//判断找回密码验证码是否正确
	public function reset(){
		$phone   = input('post.phone');
        $captcha = input('post.captcha'); 

		
		if(!is_numeric($captcha)){
			return json(array('code'=>0,'msg'=>'验证码输入错误'));
		}
		 $zhuce = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
		 if(empty($zhuce)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
		}
       		
        $user     = Db::name('users');
		$user2    = Db::name('sms_captcha_log');
		$ds_list  = $user2->where('phone='.$phone)->field('captcha')->order('id desc')->limit(1)->find();
        if($captcha==$ds_list['captcha']){
			  return json(array('code'=>200,'msg'=>'正在跳转'));
		}else{
			  return json(array('code'=>0,'msg'=>'验证码输入错误'));
		}
		
	}
	//完成找回密码
	public function complete(){
		$phone    = input('post.phone');
        $password = md5(input('post.password'));

		$zhuce = Db::name('users')->field('phone')->where('phone',$phone)->select();
		 if(empty($zhuce)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
		}
		$data['password']=$password;
		$result = Db::name('users')->where('phone',$phone)->update($data);
		if($result){
					return json(array('code'=>200,'msg'=>'恭喜你,重置密码成功'));
			}else{
					return json(array('code'=>0,'msg'=>'新老密码不能一致'));
			}
		
	}
	
    //退出登录
	public function logout()
    {
		
		$uid=session('id');
		$map['is_sign']='0';
		$where['id']=$uid;
		Db::name('users')->where($where)->update($map);
		session(null);
       
        $this->redirect('http://192.168.0.252/phone/');
    }
	
	/**
     * 注册发送验证码
     */
	public function vcode()
    {
        include_once('sms.php');
		$phone=input('post.phone');
		    // 构建数据数组
		 $list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(!empty($list)){
				return json(array('code'=>0,'msg'=>'手机号已注册'));
			}else{
				// 生成随机数作为验证码
				$captcha = rand(110001, 988889);				
				$sms_content = "您的验证码是：{$captcha}；请不要把验证码泄露给其他人。【标匠网络】";
				$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
				 // 这里写短信平台发送短信代码
				$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);
					
				$gets = post_sms_data($sms_data, $target);		
				//数据插入
				if($gets['State']==0){
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>200,'msg'=>'验证码发送成功请查收'));
				}else{
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>0,'msg'=>'验证码发送失败'));
				}			 		
			
			}			
 			  
    }

    	/**
     * 师傅提交认证发送验证码
     */
    public function master_vcode()
    {
        include_once('sms.php');
	    $phone=input('post.phone');
	
				// 生成随机数作为验证码
				$captcha = rand(110001, 988889);				
				$sms_content = "您的验证码是：{$captcha}；请不要把验证码泄露给其他人。【标匠网络】";
				$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
				 // 这里写短信平台发送短信代码
				$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);
					
				$gets = post_sms_data($sms_data, $target);		
				//数据插入
				if($gets['State']==0){
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>200,'msg'=>'验证码发送成功请查收'));
				}else{
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>0,'msg'=>'验证码发送失败'));
				}			 		
			
						
 			  
    }
		
	/**
     * 找回密码发送验证码
     */
	public function vvcode()
    {
        include_once('sms.php');
		$phone=input('post.phone');
		    // 构建数据数组
		 $list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
			}else{
				// 生成随机数作为验证码
				$captcha = rand(110001, 988889);				
				$sms_content = "您的验证码是：{$captcha}；请不要把验证码泄露给其他人。【标匠网络】";
				$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
				 // 这里写短信平台发送短信代码
				$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);
					
				$gets = post_sms_data($sms_data, $target);		
				//数据插入
				if($gets['State']==0){
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>200,'msg'=>'验证码发送成功请查收'));
				}else{
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>0,'msg'=>'验证码发送失败'));
				}			 		
			
			}			
 			  
    }
	/**
     * 更改手机号发送验证码
     */
	public function vscode()
    {
        include_once('sms.php');
		$phone=input('post.phone');
		    // 构建数据数组
		 $uid=session('id');	
		 $list = Db::name('users')->field('phone')->where('id',$uid)->find();
			if($phone==$list['phone']){
				return json(array('code'=>0,'msg'=>'新老手机号不能一致'));
			}else{
				// 生成随机数作为验证码
				$captcha = rand(110001, 988889);				
				$sms_content = "您的验证码是：{$captcha}；请不要把验证码泄露给其他人。【标匠网络】";
				$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
				 // 这里写短信平台发送短信代码
				$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);
					
				$gets = post_sms_data($sms_data, $target);		
				//数据插入
				if($gets['State']==0){
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>200,'msg'=>'验证码发送成功请查收'));
				}else{
					$data['phone'] = input('post.phone');
					$data['captcha'] = $captcha;
					$data['created_at'] = time();
					$data['response'] = $gets['State'];
					$list =Db::name('sms_captcha_log');
					$result = $list->insertGetId($data);
					return json(array('code'=>0,'msg'=>'验证码发送失败'));
				}			 		
			
			}			
 			  
    }
}
