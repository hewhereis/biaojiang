<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Users;
use think\Db; 
use app\index\validate\UsersValidate;
class Auth extends Controller
{
	public function ceshi()
    {
		echo  'http://'.$_SERVER['HTTP_HOST']."<br>"; 
    }
    public function index()
    {
		return view('auth/index');
    }
	/**
	 * 登陆 
	 */
		public function login()
    {
	
		if(request()->isPost()){
			$params = input('post.');
			$phone  = input('phone');
			$list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
			}
			
			
			$list = Db::name('users')->field('status,type,real_name')->where("phone='{$phone}'")->find();
			//两表查询  判断师傅有没有实名认证
			
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号或者密码不正确1'));
			}else{
					if($list['status']==0){
				return json(array('code'=>0,'msg'=>'您的账号已被禁用'));
			}else{			  
			$result = model('users')->do_login($params);	
			//判断登陆的类型
			if($list['type']==1){
			    if($result){
			        return json(array('code'=>200,'type'=>1,'msg'=>'登陆成功'));
			        $this->redirect('index/index');			         
			    }else{
			        return json(array('code'=>0,'msg'=>'密码不正确'));
			    }
			}else if($list['type']==2){
			        if($result){	
			            return json(array('code'=>200,'type'=>2,'msg'=>'登陆成功'));      
			        }else{
			            return json(array('code'=>0,'msg'=>'密码不正确'));
			        }
			    
			}else if($list['type']==3){
			    if($result){
			        return json(array('code'=>200,'type'=>3,'msg'=>'登陆成功'));			        		         
			    }else{
			        return json(array('code'=>0,'msg'=>'密码不正确'));
			    }
			}
			
			  }
		   }
	    }
    }
    /**
     * 退出登录
     */
	public function logout()
    {
		
		$uid=session('id');
		$map['is_sign']='0';
		$where['id']=$uid;
		Db::name('users')->where($where)->update($map);
		session(null);
       
        $this->redirect('/');
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
 			return view('auth/index');    
    }
    /**
     * 月结客户发送验证码
     */
    public function send_code()
    {
        include_once('sms.php');
		$phone=input('post.phone');
		    // 构建数据数组
		 $list = Db::name('users_partner')->field('phone')->where("phone='{$phone}'")->select();
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
 			return view('auth/index');    
    }
    /**
     * 重置密码发送验证码
     */
    
    public function vvcode()
    {

        include_once('sms.php');
        $phone=input('post.phone');
		
		 $list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号码还没有注册哦'));
			}
	
		
            // 生成随机数作为验证码
           
			$captcha = rand(110001, 988889);				
			$sms_content = "您的验证码是：{$captcha}；请不要把验证码泄露给其他人。【标匠网络】";
			$target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
			 // 这里写短信平台发送短信代码
			$sms_data = "sname=bjwl&spwd=bjwl123456&scorpid=&sprdid=1012888&sdst={$phone}&smsg=".rawurlencode($sms_content);
				
			$gets = post_sms_data($sms_data, $target);	
            
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

     			return view('auth/index');
    }
	/**
     * 用户注册
     */
	public function  register(){
		$phone=input('post.phone');
		    // 构建数据数组
		 $list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(!empty($list)){
				return json(array('code'=>0,'msg'=>'手机号已注册'));
		}
       //随机生成用户名     
		
        $str = '';
        $num = 6;
        $str2 = "abcdefghijklmnopqrstuvwxyz";
        $max = strlen($str2)-1;
        for($i=0;$i<$num;$i++){
            $str.=$str2[rand(0,$max)];
        }
        $nicheng = $str;
        $data['phone'] = input('post.phone');
        $data['password'] = md5(input('post.password'));
        $captcha = input('post.captcha');
		if(!is_numeric($captcha)){
			return json(array('code'=>0,'msg'=>'验证码输入错误！'));
		}
		$user = Db::name('sms_captcha_log');
        $list = $user->where('phone='.$data['phone'])->field('captcha')->order('id desc')->limit(1)->find();
        if($captcha==$list['captcha']){
            	
				$data['created_at'] = time();
				$data['type'] = input('post.type');
				$ds_type = input('post.type');
				//判断注册的类型
				if($ds_type==1){
					$unicheng='客户_'.$nicheng;
					$data['username'] = $unicheng;
					session('ds_username',$data['username']);
					session('type',$data['type']);
					$users = Db::name('users');
					if($result = $users->insertGetId($data)){
					session('id',$result);
						return json(array('code'=>200,'type'=>1,'msg'=>'恭喜你,注册成功！'));
					}else{
						return json(array('code'=>0,'msg'=>'注册遇到点小问题！'));
					}
				}else if($ds_type==2){
					$wnicheng='师傅_'.$nicheng;
					$data['username'] = $wnicheng;
					session('ds_username',$data['username']);
					session('type',$data['type']);
					$users = Db::name('users');
					if($result = $users->insertGetId($data)){
					session('id',$result);
					$ds_data['uid']=$result;
					Db::name('users_worker')->lock(true)->insertGetId($ds_data);
						return json(array('code'=>200,'type'=>2,'msg'=>'恭喜你,注册成功！'));
					}else{
						return json(array('code'=>0,'msg'=>'注册遇到点小问题！'));
					}
					
				}else if($ds_type==3){
					$fnicheng='服务商_'.$nicheng;
					$data['username'] = $fnicheng;
					session('ds_username',$data['username']);
					session('type',$data['type']);
					$users = Db::name('users');
					if($result = $users->insertGetId($data)){
					session('id',$result);
						return json(array('code'=>200,'type'=>3,'msg'=>'恭喜你,注册成功！'));
					}else{
						return json(array('code'=>0,'msg'=>'注册遇到点小问题！'));
					}
				}
				
				
				
				
        }else{
            return json(array('code'=>0,'msg'=>'验证码输入错误！'));
        }
		
		
	
    }
    /**
     * 重置密码
     */   
    public function update(){
        $phone = input('post.phone');
        $password= md5(input('post.password'));
        $chptcha = input('post.chptcha');  
		if(!is_numeric($chptcha)){
			return json(array('code'=>0,'msg'=>'验证码输入错误！'));
		}
		 $zhuce = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
		 if(empty($zhuce)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
		}
       		
        $user = Db::name('users');
		$user2 = Db::name('sms_captcha_log');
		$ds_list = $user2->where('phone='.$phone)->field('captcha')->order('id desc')->limit(1)->find();
		$list1 = $user->where('phone='.$phone)->limit(1)->find();
		$result = $user->where('phone='.$phone)->limit(1)->setField('password',$password);
        if($chptcha==$ds_list['captcha']){
			if($password != $list1['password']){
				  if($chptcha==$ds_list['captcha']){
						   if($result){
								return json(array('code'=>200,'msg'=>'恭喜你,重置密码成功'));
							}else{
								return json(array('code'=>0,'msg'=>'重置密码遇到一点小问题哦'));
							}
						}else{
					return json(array('code'=>0,'msg'=>'验证码输入不正确'));
				   }
			}else{
				return json(array('code'=>0,'msg'=>'新老密码不能一致'));
			}
		}else{
			
			  return json(array('code'=>0,'msg'=>'验证码输入错误！'));
		}
		
		
		
		
		    
    }
}
