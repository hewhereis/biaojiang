<?php

namespace app\index\model;
use think\Model;
use think\Db;

class OrderlogicModel extends Model
{
    protected $name = 'orders';
	/**
     * 根据搜索条件获取列表信息
     */
	public function  getOrderWhere($map, $Nowpage, $limits,$uid){
		
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$where['bj_orders.status']=1;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_install.storefront as install_img,bj_orders_install.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,
			bj_orders_survey.brand as sur_brand,bj_orders_survey.photo as sur_img,bj_replace.photo_store as d_img_describe';
			return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('bj_orders.id desc')->select();
		
		
	}
	
	public function  getOrderWhere1($map, $Nowpage, $limits,$uid){
		
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$where['bj_orders.status']=2;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_install.storefront as install_img,bj_orders_install.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,
			bj_orders_survey.brand as sur_brand,bj_orders_survey.photo as sur_img,bj_replace.photo_store as d_img_describe';
			return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('bj_orders.id desc')->select();
		
		
	}
	
	public function  getOrderWhere2($map, $Nowpage, $limits,$uid){
		
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$where['bj_orders.status']=3;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_install.storefront as install_img,bj_orders_install.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,
			bj_orders_survey.brand as sur_brand,bj_orders_survey.photo as sur_img,bj_replace.photo_store as d_img_describe';
			return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('bj_orders.id desc')->select();
		
		
	}
	
	public function  getOrderWhere3($map, $Nowpage, $limits,$uid){
		
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$where['bj_orders.status']=4;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_install.storefront as install_img,bj_orders_install.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,
			bj_orders_survey.brand as sur_brand,bj_orders_survey.photo as sur_img,bj_replace.photo_store as d_img_describe';
			return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('bj_orders.id desc')->select();
		
		
	}
	
	public function  getOrderWhere4($map, $Nowpage, $limits,$uid){
		
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$where['bj_orders.status']=5;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_install.storefront as install_img,bj_orders_install.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,
			bj_orders_survey.brand as sur_brand,bj_orders_survey.photo as sur_img,bj_replace.photo_store as d_img_describe';
			return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('bj_orders.id desc')->select();
		
		
	}
	
	public function  getOrderWhere5($map, $Nowpage, $limits,$uid){
		
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$where['bj_orders.status']=6;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_install.storefront as install_img,bj_orders_install.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,
			bj_orders_survey.brand as sur_brand,bj_orders_survey.photo as sur_img,bj_replace.photo_store as d_img_describe';
			return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('bj_orders.id desc')->select();
		
		
	}
	
	

   

    
}