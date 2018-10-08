<?php

namespace app\index\model;
use think\Model;
use think\Db;
class Sign extends Model
{
	protected $name = 'orders';
	/**
	 * [master_sign description]
	 * 师傅签到页面
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
  public function master_sign($id){
        $where['id']=$id;
		$where['work_del']=0;
	    $list =  $this->where($where)->field('order_number')->find();
	    $amount_engineer = Db::name('offer_total')->where('order_number',$list['order_number'])->field('amount_engineer')->find();
	    $list['amount_engineer'] = $amount_engineer['amount_engineer'];
	    return $list;
  }
  /**
   * 师傅签到AJAX
   */
  public function signajax($param){
       $id=$param['id'];
	   $ds_list=$this->field('id,order_number,is_bomb')->where('id',$id)->find();

	 ;
	   if($ds_list['is_bomb']==1){//有核单报告
          $step = Db::name('orders')->where('order_number',$ds_list['order_number'])->field('step_type,service_type_id')->find();
          if($step['service_type_id']==2){//维修
             if($step['step_type']==1){
                 $position=$param['position'];
				 $data['work_sign_position']=$position;
				 $data['step_number'] =7; 
				 $data['work_step_number'] =4;
				 $data['work_sign']=1;
             }else{
                 $position=$param['position'];
				 $data['work_sign_position']=$position;
				 $data['step_number'] =7; 
				 $data['work_step_number'] =7; 
				 $data['work_sign']=1;
             }

          }else if($step['service_type_id']==1){//安装

          }
          
	   }else{//没有核单报告
	   	$step = Db::name('orders')->where('order_number',$ds_list['order_number'])->field('step_type,service_type_id')->find();
	   	if($step['service_type_id']==2){//维修
	   		 if($step['step_type']==1){
                 $position=$param['position'];
				 $data['work_sign_position']=$position;
				 $data['work_sign']=1;
				 $data['step_number']='7';
				 $data['work_step_number']='5';
	   		 }else{
                 $position=$param['position'];
				 $data['work_sign_position']=$position;
				 $data['step_number'] =7; 
				 $data['work_step_number'] =8; 
				 $data['work_sign']=1;
	   		 }
	   	}else if($step['service_type_id']==1){//安装
	   	}
         $lists=$this->save($data,['id' => $id]);
         if(!empty($lists)){
			return ['code' => 200, 'data' => '', 'msg' => '签到成功'];					 
		 }else{	
			return ['code' => 0, 'data' => '', 'msg' => '-1'];	
		 }
	   }
  }
  /**
   * 师傅签退AJAX
   */
  public function signajax_out($param){
  	 $id=$param['id'];
	 $position=$param['position'];
	 $map['work_sign_out']=1;
	 $map['work_sign_outposition']=$position;
	 $map['master_status']='5';
	 $lists=$this->save($map,['id'=>$id]);
	 if(!empty($lists)){
		return ['code' => 200,  'msg' => '签退成功'];
	 }else{
		return ['code' => 0,  'msg' => '-1'];
	 }
  }
    
}