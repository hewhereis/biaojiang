<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Users;
use app\index\model\XwfModel;
class Xwf extends Controller{
   	//登录ajax
	public function ds_login()
    {
		if(request()->isPost()){
			$params = input('post.');
			$phone  = input('phone');
			$list = Db::name('users')->field('phone')->where("phone='{$phone}'")->select();
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
			}
			
			
			$list = Db::name('users')->field('status,type')->where("phone='{$phone}'")->find();
			if(empty($list)){
				return json(array('code'=>0,'msg'=>'手机号未注册'));
			}else{
				if($list['status']==0){
					return json(array('code'=>0,'msg'=>'您的账号已被禁用'));
				}else{			  
					$result = model('users')->do_login($params);	
					//判断登陆的类型
					if($list['type']==1){
						if($result){
							return json(array('code'=>200,'type'=>1,'msg'=>'登录成功'));		         
						}else{
							return json(array('code'=>0,'msg'=>'密码不正确'));
						}
					}else if($list['type']==2){
							if($result){	
								return json(array('code'=>200,'type'=>2,'msg'=>'登录成功'));      
							}else{
								return json(array('code'=>0,'msg'=>'密码不正确'));
							}
						
					}
			
			  }
		   }
	    }
    }

	//注册ajax
	public function ds_register()
    {
		if(request()->isPost()){
			$params = input('post.');
			$user = new XwfModel();
		    $flag=$user->register($params);
			return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
	    }
    }

	

}