<?php

namespace app\index\model;
use think\Model;
use think\Db;

class XwfModel extends Model
{
  
	public function register($params){
		
		$phone=$params['phone'];
		    // 构建数据数组
		 $list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(!empty($list)){
			  return ['code' => 0, 'data' => '', 'msg' => '手机号已注册'];
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
        $data['phone']    = $params['phone'];
        $data['password'] = md5($params['password']);
        $captcha          = $params['captcha'];
		if(!is_numeric($captcha)){
			return ['code' => 0, 'data' => '', 'msg' => '验证码输入错误'];
		}
		
		$user = Db::name('sms_captcha_log');
        $list = $user->where('phone',$phone)->field('captcha')->order('id desc')->limit(1)->find();
        if($captcha==$list['captcha']){
		
				$data['created_at'] = time();
				$data['type']       = $params['type'];
				$ds_type            = $params['type'];
				//判断注册的类型
				if($ds_type==1){
					$unicheng='客户_'.$nicheng;
					$data['username'] = $unicheng;
					session('ds_username',$data['username']);
					session('type',$data['type']);
					
					$users=Db::name('users');
					if($result = $users->insertGetId($data)){
					session('id',$result);
						return ['code' => 200, 'data' => '1', 'msg' => '恭喜你,注册成功'];
					}else{
						return ['code' => 0, 'data' => '', 'msg' => '注册遇到点小问题'];
					}
				}else if($ds_type==2){
					$wnicheng='师傅_'.$nicheng;
					$data['username'] = $wnicheng;
					session('ds_username',$data['username']);
					session('type',$data['type']);
					
					$users= Db::name('users');
					if($result = $users->insertGetId($data)){
					session('id',$result);
					$ds_data['uid']=$result;
					Db::name('users_worker')->lock(true)->insertGetId($ds_data);
						return ['code' => 200, 'data' => '2', 'msg' => '恭喜你,注册成功'];
					}else{
						return ['code' => 0,  'data' => '','msg' => '注册遇到点小问题'];
					}
					
				}
		
        }else{
			return ['code' => 0, 'data' => '', 'msg' => '验证码输入错误'];
        }
		
	}
	
	
		
		

	
	

   

    
}