<?php

namespace app\index\model;
use think\Model;
use think\Db;

class OrderclientModel extends Model
{
    protected $name = 'orders';
	/**
     * 根据搜索条件获取列表信息客户
     */
	public function  getOrderWhere($map, $Nowpage, $limits,$uid){
		
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']

				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_install.storefront as install_img,bj_orders_install.brand as i_brand,bj_orders_survey.photo as sur_img,bj_orders_survey.brand as sur_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,bj_replace.photo_store as d_img_describe';
			return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('bj_orders.id desc')->select();
		
		
	}
	/**
     * 根据搜索条件获取列表信息师傅
     */
	public function  getWorkerWhere($map, $Nowpage, $limits,$uid){
		
			$where['a.worker_id']=$uid;
			$where['a.work_del']=0;
			$join = [
				['bj_users b','b.id = a.owner_id','LEFT'],
				['bj_service c','c.id = a.service_type_id','LEFT'],
				['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
				['bj_orders_install e','e.order_number = a.order_number','LEFT'],
				['bj_orders_survey s','s.order_number = a.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
			    ['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT']
				
			];
			$field='a.*,b.real_name as uname,b.username as names,c.name as sname,d.brand as m_brand,d.photo_store as m_img,e.storefront as install_img,e.brand as i_brand,s.photo as sur_img,s.brand as sur_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,bj_replace.photo_store as gjm_img';
			return $this->alias('a')->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->group('a.id desc')->select();
		
		
	}
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
				['bj_step b','b.service_type = a.step_type','LEFT'],
				
				
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
				['bj_step b','b.service_type = a.step_type','LEFT'],
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
				['bj_step b','b.service_type = a.step_type','LEFT'],
			];
			$field='b.step_id,b.step_name,b.step_link,a.order_number';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`>`a`.`step_number`')->group('b.step_id')->select();
	
	}
	
	/**
     * 根据ID获取订单跳转地址(客户)
     */
	public function  getStepss($id){
		
			$where['a.id']=$id;
			$where['a.is_del']=0;
			$join = [
				['bj_step b','b.service_type = a.step_type','LEFT'],
			];
			$field='b.step_link';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`=`a`.`step_number`')->group('b.step_id')->select();
	
	}
	
	
	
	
	/**
     * 根据ID获取订单状态之前步骤(师傅)
     */
	public function  Work_getStep($id){
		
			$where['a.id']=$id;
			$where['a.work_del']=0;
			
			$join = [
				['bj_work_step b','b.service_type = a.work_step_service','LEFT'],
				
				
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
				['bj_work_step b','b.service_type = a.work_step_service','LEFT'],
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
				['bj_work_step b','b.service_type = a.work_step_service','LEFT'],
			];
			$field='b.step_id,b.step_name,b.step_link,a.order_number,a.id';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`>`a`.`work_step_number`')->group('b.step_id')->select();
	
	}
	
	/**
     * 根据ID获取订单跳转地址(师傅)
     */
	public function  Work_getStepss($id){
		
			$where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_work_step b','b.service_type = a.work_step_service','LEFT'],
			];
			$field='b.step_link,b.step_onclick';
			return $this->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`=`a`.`work_step_number`')->group('b.step_id')->select();
	
	}
	
	/**
     * 根据ID获取订单详情师傅
     */
	public function  getworkStatus($id){
		
			$where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_users b','b.id = a.worker_id','LEFT'],
				['bj_service c','c.id = a.service_type_id','LEFT'],
				['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
				['bj_orders_install e','e.order_number = a.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
				['bj_replace','bj_replace.order_number=bj_orders.order_number','LEFT'],
				['bj_orders_survey s','s.order_number = a.order_number','LEFT']
				
			];
			$field='a.*,b.id as b_job, b.real_name as uname,b.phone as b_phone,c.name as sname,d.brand as m_brand,e.storefront as install_img,e.brand as i_brand,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_replace.brand as d_brand,bj_replace.photo_store as gjm_img,s.photo as s_img,s.brand as s_brand';
			return $this->alias('a')->field($field)->join($join)->where($where)->group('a.id desc')->select();
		
		
	}
	/**
     * 根据ID修改师傅签到状态
     */
	public function  getworkSignajax($param){
		
			$id=$param['id'];
			
			$ds_list=$this->field('id,order_number,is_bomb')->where('id',$id)->find();
			
			
			if($ds_list['is_bomb']==1){
				
				
				    $step = Db::name('orders')->where('order_number',$ds_list['order_number'])->field('step_type,service_type_id')->find();
				    if($step['service_type_id']==2){//维修
                          if($step['step_type']==1){   
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =4;
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }else if($step['step_type']==2){
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =7; 
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					   }
				    }else if($step['service_type_id']==1){//安装
                        if($step['step_type']==3){   
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =4;
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }else if($step['step_type']==4){
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =7; 
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					   }
				    }else if($step['service_type_id']==5){//更换灯片
                      if($step['step_type']==6){
                        $position=$param['position'];
                        $data['work_sign_position']=$position;
                        $data['status'] = 3;
                        $data['master_status'] = 3;
                        $data['step_number'] =7;
                        $data['work_step_number'] =4;
                        $data['work_sign']=1;
                        $where['id']=$id;
                        $lists=$this->where($where)->update($data);
                        if(!empty($lists)){
                            return ['code' => 200, 'data' => '', 'msg' => '签到成功'];
                        }else{
                            return ['code' => 0, 'data' => '', 'msg' => '-1'];
                        }
                    }else if($step['step_type']==7){
                        $position=$param['position'];
                        $data['work_sign_position']=$position;
                        $data['status'] = 3;
                        $data['master_status'] = 3;
                        $data['step_number'] =7;
                        $data['work_step_number'] =7;
                        $data['work_sign']=1;
                        $where['id']=$id;
                        $lists=$this->where($where)->update($data);
                        if(!empty($lists)){
                            return ['code' => 200, 'data' => '', 'msg' => '签到成功'];
                        }else{
                            return ['code' => 0, 'data' => '', 'msg' => '-1'];
                        }
                    }
              
					  }else if($step['service_type_id']==6){//围板搭建
                        if($step['step_type']==8){   
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =4;
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					   }else if($step['step_type']==9){
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =7; 
						$data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					   }
				    }
					 				
			}else{
				 $step = Db::name('orders')->where('order_number',$ds_list['order_number'])->field('step_type,service_type_id')->find();
				 if($step['service_type_id']==2){//维修
                       if($step['step_type']==1){   
						 $position=$param['position'];
						 $map['work_sign_position']=$position;
						 $map['work_sign']=1;
						 $map['step_type']='1';
						 $map['step_number']='7';
						 $map['work_step_service']='1';
						 $map['work_step_number']='5';
						 $where['id']=$id;
						 $lists=$this->where($where)->update($map);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }else if($step['step_type']==2){
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =8; 
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }
				 }else if($step['service_type_id']==1){//安装
                       if($step['step_type']==3){   
						 $position=$param['position'];
						 $map['work_sign_position']=$position;
						 $map['work_sign']=1;
						 $map['step_type']='3';
						 $map['step_number']='7';
						 $map['work_step_service']='3';
						 $map['work_step_number']='5';
						 $where['id']=$id;
						 $lists=$this->where($where)->update($map);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }else if($step['step_type']==4){
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =8; 
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }
				 }else if($step['service_type_id']==5){//更换灯片
                     if($step['step_type']==6){
                         $position=$param['position'];
                         $map['work_sign_position']=$position;
                         $map['work_sign']=1;
                         $map['step_type']='6';
                         $map['step_number']='7';
                         $map['work_step_service']='6';
                         $map['work_step_number']='5';
                         $where['id']=$id;
                         $lists=$this->where($where)->update($map);
                         if(!empty($lists)){
                             return ['code' => 200, 'data' => '', 'msg' => '签到成功'];
                         }else{
                             return ['code' => 0, 'data' => '', 'msg' => '-1'];
                         }
                     }else if($step['step_type']==7){
                         $position=$param['position'];
                         $data['work_sign_position']=$position;
                         $data['status'] = 3;
                         $data['master_status'] = 3;
                         $data['step_number'] =7;
                         $data['work_step_number'] =8;
                         $data['work_sign']=1;
                         $where['id']=$id;
                         $lists=$this->where($where)->update($data);
                         if(!empty($lists)){
                             return ['code' => 200, 'data' => '', 'msg' => '签到成功'];
                         }else{
                             return ['code' => 0, 'data' => '', 'msg' => '-1'];
                         }
                     }
                 }else if($step['service_type_id']==6){//围板搭建
                    if($step['step_type']==8){   
						 $position=$param['position'];
						 $map['work_sign_position']=$position;
						 $map['work_sign']=1;
						 $map['step_type']='8';
						 $map['step_number']='7';
						 $map['work_step_service']='8';
						 $map['work_step_number']='5';
						 $where['id']=$id;
						 $lists=$this->where($where)->update($map);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }else if($step['step_type']==9){
						 $position=$param['position'];
						 $data['work_sign_position']=$position;
						 $data['status'] = 3;
						 $data['master_status'] = 3;
						 $data['step_number'] =7; 
						 $data['work_step_number'] =8; 
						 $data['work_sign']=1;
						 $where['id']=$id;
						 $lists=$this->where($where)->update($data);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }
				 }else if($step['service_type_id']==4){//勘测
                    if($step['step_type']==5){   
						 $position=$param['position'];
						 $map['work_sign_position']=$position;
						 $map['work_sign']=1;
						 $map['step_number']='4';
						 $map['work_step_number']='4';
						 $where['id']=$id;
						 $lists=$this->where($where)->update($map);
						 if(!empty($lists)){
								return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
							}else{	
								return ['code' => 0, 'data' => '', 'msg' => '-1'];	
							}
					 }
				 }
					 								
			}		
	}
	/**
     * 根据ID修改师傅签退状态
     */
	public function  getworkSignoutajax($param){
			$id=$param['id'];
			$position=$param['position'];
			$map['work_sign_out']=1;
			$map['work_sign_outposition']=$position;
			$map['master_status']='5';
			
			$where['id']=$id;
			$lists=$this->where($where)->update($map);
			if(!empty($lists)){
				
				return ['code' => 200, 'data' => '', 'msg' => '签退成功'];
									 
			}else{
					
				return ['code' => 0, 'data' => '', 'msg' => '-1'];
					
			}
	}

	 /**
     * 删除信息
     * @param $id
     */
    public function delSer($id)
    {
        try{
			$map['is_del']=1;
            $this->where('id', $id)->update($map);
            return ['code' => 1, 'data' => '', 'msg' => '订单删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	 /**
     * 删除所有
     * @param $id
     */
    public function delSers($id)
    {
        try{
			
			$this->where(array('id'=>array('in',$id)))->setField('is_del',1);

            return ['code' => 1, 'data' => '', 'msg' => '订单删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	/**
     * 删除信息师傅
     * @param $id
     */
    public function delWor($id)
    {
        try{
			$map['work_del']=1;
            $this->where('id', $id)->update($map);
            return ['code' => 1, 'data' => '', 'msg' => '订单删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	 /**
     * 删除所有师傅
     * @param $id
     */
    public function delWors($id)
    {
        try{
			
			$this->where(array('id'=>array('in',$id)))->setField('work_del',1);

            return ['code' => 1, 'data' => '', 'msg' => '订单删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	

   

    
}