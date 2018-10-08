<?php

namespace app\index\model;
use think\Model;

/**
* 用户信息
*/
class Users extends Model
{
	function initialize()
	{
		parent::initialize();
	}

	function do_login($params){
		$map['is_sign']='1';
		$wheres['phone']=$params['phone'];
		$this->where($wheres)->update($map);
		
		if(empty($params['phone'])) {
            return FALSE;
        }
        if(empty($params['password'])) {
            return FALSE;
        }
        $user = $this->where('phone',$params['phone'])->find();
        if(!$user) {
            return FALSE;
        }
        $user = $user->toArray();
        if($user['password'] !== strtolower(md5($params['password']))) {
            return FALSE;
        }
		if($user['status'] == 0) {
            return FALSE;
        }
         session('ds_username',$user['username']);
         session('id',$user['id']);  
		 session('type',$user['type']); 		
		 $_SESSION['ds_username']=$user['username'];
		 $_SESSION['id']=$user['id'];
		 $_SESSION['type']=$user['type'];
        return $user;
	}
		function wx_do_login($params){
		$map['is_sign']='1';
		$map['openid']=$params['openid'];
		$wheres['phone']=$params['phone'];
		$this->where($wheres)->update($map);
		
		if(empty($params['phone'])) {
            return FALSE;
        }
        if(empty($params['password'])) {
            return FALSE;
        }
        $user = $this->where('phone',$params['phone'])->find();
        if(!$user) {
            return FALSE;
        }
        $user = $user->toArray();
        if($user['password'] !== strtolower(md5($params['password']))) {
            return FALSE;
        }
		if($user['status'] == 0) {
            return FALSE;
        }
		
         session('ds_username',$user['username']);
         session('id',$user['id']);  
		 session('type',$user['type']); 
		 session('openid',$user['openid']); 	
		 session('is_sign',1);		 
		 $_SESSION['ds_username']=$user['username'];
		 $_SESSION['id']=$user['id'];
		 $_SESSION['type']=$user['type'];
         return $user;
	}
	function edit($params){
		$result = $this->isUpdate(true)->allowField(true)->save($params);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	//get the image url for system.
    static public function getimageurl($userid){
	    $oneuser =new Users();
        $user = $oneuser->where('id',$userid)->find();
        if($user) {
            return $user['img'];
        } else {
            return "error";
            //todo, here we need define an unkown persion url by default.
        }
    }
}