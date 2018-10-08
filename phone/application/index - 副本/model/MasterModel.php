<?php

namespace app\index\model;
use think\Model;
use think\Db;

class MasterModel extends Model
{
	protected $name = 'order_comments';
   /**
    * 师傅基本资料
    * 
    */
   public function master_information($wid){
       $where['o.uid'] = $wid;
       $field = 'o.real_name,u.id,o.guarantee,o.credit_score,o.work_skill,u.img';
       $master = Db::name('users')->alias('u')->join('users_worker o','u.id = o.uid')->where($where)->field($field)->find();
       $master['work_skill'] = Db::name('skills')->where('id','in',$master['work_skill'])->field('skill')->select();
       $str='';
			 foreach($master['work_skill'] as $key =>$val){
					 $str .= $val['skill'].',';
			 }
		   $master['work_skill']=trim($str,',');//去除最后个逗号
		   return $master;
    }
	
   public function datas($wid){
   	    $field = 'a.real_name,a.province,a.city,a.town,o.service_introduction,o.service_type_id,o.brand,a.service_province,a.service_city,o.staff_num,o.service_time,o.truck_situation';
   	    $where['o.uid'] = $wid;
        $data = Db::name('users')->alias('a')->join('users_worker o','a.id = o.uid')->where($where)->field($field)->find();
        $data['service_type_id'] = Db::name('service')->where('id','in',$data['service_type_id'])->field('name')->select();
        $str='';
        foreach($data['service_type_id'] as $key =>$val){
          $str .= $val['name'].',';
        }
        $data['service_type_id']=trim($str,',');
        $data['brand'] = Db::name('brand_list')->where('id','in',$data['brand'])->field('brand')->select();
        $strs='';
        foreach($data['brand'] as $key =>$val){
          $strs .= $val['brand'].',';
        }
        $data['brand']=trim($strs,',');//去除最后个逗号
        return $data;
   }
	 /**
    *默认的全部评论 
    */
   public function all_commit($wid){
      $worker_id = $wid;
      $defaults = $this->where('adopt_id',$worker_id)->order('create_time desc')->limit(6)->select();
      foreach ($defaults as $key => $value) {
        $defaults[$key]['totals_core'] = round(($value['work_quality']+$value['work_speed']+$value['service_attitude'])/3,2);
      }
     
      return $defaults;
   }
		
   /**
    * 评论分类
    */
   public function getcomment($param){
      $worker_id = $param['wid'];
      $id  = $param['id'];
      if($id==2){//全部评论
          $defaults = $this->where('adopt_id',$worker_id)->order('create_time desc')->select();
          foreach ($defaults as $key => $value) {
          $defaults[$key]['totals_core'] = round(($value['work_quality']+$value['work_speed']+$value['service_attitude'])/3,2);
          }
      }else if($id==1){//好评
          $where['adopt_id'] = $worker_id;
          $where['master_manifestation'] =1;
          $defaults = $this->where($where)->order('create_time desc')->select();
          foreach ($defaults as $key => $value) {
          $defaults[$key]['totals_core'] = round(($value['work_quality']+$value['work_speed']+$value['service_attitude'])/3,2);
          }
      }else if($id==0){//中评
          $where['adopt_id'] = $worker_id;
          $where['master_manifestation'] =0;
          $defaults = $this->where($where)->order('create_time desc')->select();
          foreach ($defaults as $key => $value) {
          $defaults[$key]['totals_core'] = round(($value['work_quality']+$value['work_speed']+$value['service_attitude'])/3,2);
          }
      }else if($id==-1){//中评
          $where['adopt_id'] = $worker_id;
          $where['master_manifestation'] =-1;
          $defaults = $this->where($where)->order('create_time desc')->select();
          foreach ($defaults as $key => $value) {
          $defaults[$key]['totals_core'] = round(($value['work_quality']+$value['work_speed']+$value['service_attitude'])/3,2);
          }
      }
      return $defaults;
   }
	
	

   

    
}