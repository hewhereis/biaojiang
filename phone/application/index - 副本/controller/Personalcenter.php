<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\PersonalcenterModel; 
class Personalcenter extends Base
{
	//客户个人中心
	public function customer_home(){
		$uid=session('id');
		$type=session('type');
		$ds_url=\think\Config::get('view_replace_str');
		if($type==2){
			$this->redirect($ds_url['__PUBLIC__'].'master_home');//跳转师傅订单管理页面
		}
		$core = new PersonalcenterModel();
		
		$this->assign('customer',$core->customer_home($uid));
		return view('personalcenter/customer_home');
	}
	//个人资料页面
	public function cus_information(){
		$uid=session('id');
		$core = new PersonalcenterModel();
		
		$this->assign('customer',$core->customer_home($uid));
		return view('personalcenter/cus_information');
	}
	//个人昵称页面
	public function nickname(){
		$uid=session('id');
		$core = new PersonalcenterModel();
		
		$this->assign('customer',$core->customer_home($uid));
		return view('personalcenter/nickname');
	}

		//修改昵称
	public function nickname_ajax(){
		$uid=session('id');
		$username=input('username');
		
		$list=Db::name('users')->where('id',$uid)->setField('username',$username);
		if($list){
				session('ds_username',null);
	    	    session('ds_username',$username);
			return ['code' => 200,  'msg' => '修改成功'];
		}else{
			return ['code' => 0,  'msg' => '新的昵称不能和旧昵称相同'];
		}
		
		
		
	}
	//个人手机号页面
	public function modifyphone(){
		$uid=session('id');
		return view('personalcenter/modifyphone');
		
		
	}
	//个人手机号修改ajax
	public function modifyphone_ajax(){
		$uid=session('id');
		
		$params=input();
		$phone=$params['phone'];
		$captcha=$params['captcha'];
		
		if(!is_numeric($captcha)){
			return ['code' => 0, 'data' => '', 'msg' => '验证码输入错误'];
		}
		
		$user = Db::name('sms_captcha_log');
        $list = $user->where('phone',$phone)->field('captcha')->order('id desc')->limit(1)->find();
        if($captcha==$list['captcha']){
				$list=Db::name('users')->where('id',$uid)->setField('phone',$phone);
				if($list){
					return ['code' => 200,  'msg' => '修改成功'];
				}else{
					return ['code' => 0,  'msg' => '新的手机号不能和旧手机号相同'];
				}
			
		}else{
			return ['code' => 0, 'data' => '', 'msg' => '验证码输入错误'];
		}
		
		
	}
	
	
	
	
	
	
}	
