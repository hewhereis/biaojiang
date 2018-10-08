<?php

namespace app\index\model;
use think\Model;
use think\Db;

class OrderclientModel extends Model
{
    protected $name = 'orders';
	
	/**
     * 根据ID获取订单详情客户
     */
	public function  getStatus($id){
		
			$where['a.id']=$id;
			$where['a.is_del']=0;
			$join = [
				['bj_users b','b.id = a.worker_id','LEFT'],
				['bj_service c','c.id = a.service_type_id','LEFT'],
				['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
				['bj_orders_install e','e.order_number = a.order_number','LEFT'],
				['bj_orders_survey s','s.order_number = a.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='a.*,b.id as b_job, b.real_name as uname,b.phone as b_phone,c.name as sname,d.brand as m_brand,e.storefront as install_img,e.brand as i_brand,s.brand as s_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,bj_replace.photo_store as gjm_img';
			return $this->alias('a')->field($field)->join($join)->where($where)->group('a.id desc')->select();
		
		
	}
	
	/**
     * 根据ID获取订单状态之前步骤(客户)
     */
	public function  getStep($id){
		
			$where['a.id']=$id;
			$where['a.is_del']=0;
			
			$join = [
				['bj_phone_step b','b.service_type = a.step_type','LEFT'],
				
				
			];
			$field='b.step_id,b.step_name,b.step_link';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`<`a`.`step_number`')->group('b.step_id')->select();
	
	}
	/**
     * 根据ID获取订单当前步骤(客户)
     */
	public function  getSteps($id){
		
			$where['a.id']=$id;
			$where['a.is_del']=0;
			$join = [
				['bj_phone_step b','b.service_type = a.step_type','LEFT'],
				['bj_orders_maintain d','d.order_number = a.order_number','LEFT']
				
			];
			$field='b.id as b_id,b.step_id,b.step_name,b.step_link,a.order_number,d.num,a.worker_id as d_wid';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`=`a`.`step_number`')->group('b.step_id')->select();
	
	}
	/**
     * 根据ID获取订单之后步骤(客户)
     */
	public function  getStepso($id){
		
			$where['a.id']=$id;
			$where['a.is_del']=0;
			$join = [
				['bj_phone_step b','b.service_type = a.step_type','LEFT'],
			];
			$field='b.step_id,b.step_name,b.step_link,a.order_number';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`>`a`.`step_number`')->group('b.step_id')->select();
	
	}
	
	
	/**
     * 根据ID获取订单详情师傅
     */
	public function  getworkStatus($id){
		
			$where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_users b','b.id = a.owner_id','LEFT'],
				['bj_service c','c.id = a.service_type_id','LEFT'],
				['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
				['bj_orders_install e','e.order_number = a.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT'],
				['bj_orders_survey s','s.order_number = a.order_number','LEFT']
				
			];
			$field='a.*,b.id as b_job, b.username as uname,b.phone as b_phone,c.name as sname,d.brand as m_brand,e.storefront as install_img,e.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,bj_replace.photo_store as gjm_img,s.photo as s_img,s.brand as s_brand';
			return $this->alias('a')->field($field)->join($join)->where($where)->group('a.id desc')->select();
		
		
	}
	
	
	
	
	/**
     * 根据ID获取订单状态之前步骤(师傅)
     */
	public function  Work_getStep($id){
		
			$where['a.id']=$id;
			$where['a.work_del']=0;
			
			$join = [
				['bj_phone_workstep b','b.service_type = a.work_step_service','LEFT'],
				
				
			];
			$field='b.step_id,b.step_name,b.step_link';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`<`a`.`work_step_number`')->group('b.step_id')->select();
	
	}
	/**
     * 根据ID获取订单当前步骤(师傅)
     */
	public function  Work_getSteps($id){
		
			$where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_phone_workstep b','b.service_type = a.work_step_service','LEFT'],
			];
			$field='b.step_id,b.step_name,b.step_link,a.order_number,a.id';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`=`a`.`work_step_number`')->group('b.step_id')->select();
	
	}
	/**
     * 根据ID获取订单之后步骤(师傅)
     */
	public function  Work_getStepso($id){
		
			$where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_phone_workstep b','b.service_type = a.work_step_service','LEFT'],
			];
			$field='b.step_id,b.step_name,b.step_link,a.order_number,a.id';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`>`a`.`work_step_number`')->group('b.step_id')->select();
	
	}
	
	
	

	
	
	
	

   

    
}