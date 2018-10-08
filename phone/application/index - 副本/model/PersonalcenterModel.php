<?php

namespace app\index\model;
use think\Model;
use think\Db;

class PersonalcenterModel extends Model
{
    protected $name = 'users';
	
	/**
     * 根据ID获取客户信息
     */
	public function  customer_home($uid){
		
			$where['a.id']=$uid;			
			$field='a.username,a.img,a.phone';
			return $this->alias('a')->field($field)->where($where)->find();
		
		
	}
	
	
	
	
	
	

   

    
}