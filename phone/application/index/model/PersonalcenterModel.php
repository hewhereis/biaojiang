<?php

namespace app\index\model;
use think\Model;
use think\Db;
use app\index\controller\Api;

class PersonalcenterModel extends Model
{
    protected $name = 'users';
	
	/**
     * 根据ID获取客户信息
     */
	public function  customer_home($uid,$type){
		
			$where['a.id']=$uid;			
			$field='a.username,a.img,a.phone,a.sex,a.real_name,a.province,a.city,a.town,u.service_type_id,u.credit_score,u.credit_card_phone';
			if($type==2){
                $data=$this->alias('a')->join("users_worker u","a.id=u.uid")->field($field)->where($where)->find();
                    $api=new Api();
               $data['service_type_id']=  $api->service_type_id($data["service_type_id"]);
            }else{
                $data=$this->alias('a')->field('img,username,phone,real_name,province,city,town')->where($where)->find();
            }


			return $data;
		
		
	}
	
	
	
	
	
	

   

    
}