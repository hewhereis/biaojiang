<?php
namespace app\index\model;
use think\model;
use think\Db;
class AuthModel extends Model{
  
           //判断师傅是否认证
	public function is_auth($uid)
    {
    	$where['uid'] = $uid;
    	$where['review_status'] = 2;
       $arr = Db::name('users_worker')->field('uid')->where($where)->find();
       if($arr){
       	return true;
       }else{
       	return false;
       }
    }  
    
    
}