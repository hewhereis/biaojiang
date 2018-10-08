<?php
namespace app\index\model;
use think\Model;

/**
* 用户登录
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
	
        return $user;
	}
	


}