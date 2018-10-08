<?php

namespace app\index\model;
use think\Model;
use think\Db;

class ConfrimreportModel extends Model
{
	protected $name="master_report";
	/**
	 * [master_reports description]
	 * 师傅确认报告页面
	 * @param  [type] $order_number [description]
	 * @return [type]               [description]
	 */
  public function master_reports($order_number){
     
  	   
  	    $field = 'a.order_number,a.l1_category_id,a.contact_name,a.contact_phone,a.contact_phone,a.full_location,o.real_name,o.phone,a.worker_id';
        $info = Db::name('orders')->alias('a')
           ->join('users o','a.worker_id = o.id')
           ->where('a.order_number',$order_number)
           ->field($field)->find();
        $info['l1_category_id'] = Db::name('category')->where('id',$info['l1_category_id'])->value('name');
       
  	 
  	 	 
  	
  	 
  	 
     return $info;
  }
  /**
   * 师傅提交确认报告AJAX
   */
  public function submit_reports($param){
  	 $data['order_number'] = $param['order_number'];
     $data['beforepics'] = implode(',',$param['qian']);
     $data['afterpics'] = implode(',',$param['hou']);
     $data['doorpics'] = $param['mentouzhao'];
     $data['signrecvpics'] = $param['qianshoudan'];
     $data['overviewpics'] = $param['quanjing'];
     $data['detials'] = $param['xiangqing'];
     $data['worker_id'] = $param['wid'];
     $list = $this->where('order_number',$param['order_number'])->find();
     if(empty($list)){//师傅第一次提交核单报告
       $info = $this->save($data);
     }else{//师傅不是第一次提交核单报告
       $id = $this->where('order_number',$param['order_number'])->field('id')->find();
       $get = $this->where('id',$id['id'])->delete();//先删除数据表字段
       $info = $this->save($data);
     }
     $step = Db::name('orders')->where('order_number',$param['order_number'])->field('step_type')->find();
	       if($step['step_type']==1){   
	        $map['step_number']='8';
	        $map['status']='4';
	        Db::name('orders')->where('order_number',$param['order_number'])->update($map);  
	       }else if($step['step_type']==2){
	        $map['step_number']='8';
	        $map['status']='4';
	        Db::name('orders')->where('order_number',$param['order_number'])->update($map);       
	       }
     if(!empty($info)){
     	return ['code'=>200,'msg'=>'报告提交成功'];
     }else{
     	return ['code'=>0,'msg'=>'报告提交出现点小问题'];
     }
  
  }
  /**
   * 客户维修报告页面
   */
  public function customer_img($order_number){
     $list = $this->where('order_number',$order_number)->field('is_ok')->find();
     if(empty($list['is_ok'])){//客户没有点击确定
        $img = $this->where('order_number',$order_number)->field('doorpics,signrecvpics,overviewpics,beforepics,afterpics,detials,is_ok')->select();
        $img['qian'] = Db::name('imgs')->where('id','in',$img[0]['beforepics'])->field('image')->select();
        $img['hou'] = Db::name('imgs')->where('id','in',$img[0]['afterpics'])->field('image')->select();
        foreach ($img['qian'] as $key => $value) {
	     $img['imgs'][$key]['qian'] = $value['image'];
        }
        foreach ($img['hou'] as $key => $value) {
	      $img['imgs'][$key]['hou'] = $value['image'];
        }
     }else{//客户已经签名
        $img = $this->where('order_number',$order_number)->field('doorpics,signrecvpics,overviewpics,beforepics,afterpics,detials,user_sign,is_ok')->select();
         $img['qian'] = Db::name('imgs')->where('id','in',$img[0]['beforepics'])->field('image')->select();
         $img['hou'] = Db::name('imgs')->where('id','in',$img[0]['afterpics'])->field('image')->select();
         foreach ($img['qian'] as $key => $value) {
	     $img['imgs'][$key]['qian'] = $value['image'];
         }
         foreach ($img['hou'] as $key => $value) {
	      $img['imgs'][$key]['hou'] = $value['image'];
         }
         $img[0]['qianming'] = Db::name('signature')->where('id',$img[0]['user_sign'])->value('image');
     }
     return $img;
  }
  /**
   * 师傅不是更新核单报告
   */
  public function update_master_reports($order_number){
       $is_ok = Db::name('master_report')->where('order_number',$order_number)->value('is_ok');
  	 	 if($is_ok==1){//客户提交签名
             $img = $this->where('order_number',$order_number)->field('doorpics,signrecvpics,overviewpics,beforepics,afterpics,detials,user_sign,is_ok')->select();
		     $img['qian'] = Db::name('imgs')->where('id','in',$img[0]['beforepics'])->field('image')->select();
		     $img['hou'] = Db::name('imgs')->where('id','in',$img[0]['afterpics'])->field('image')->select();
		     foreach ($img['qian'] as $key => $value) {
		     $img['imgs'][$key]['qian'] = $value['image'];
		     }
		     foreach ($img['hou'] as $key => $value) {
		      $img['imgs'][$key]['hou'] = $value['image'];
		     }
		     $img[0]['qianming'] = Db::name('signature')->where('id',$img[0]['user_sign'])->value('image');
  	 	 }else{//客户没有签名
            $img = $this->where('order_number',$order_number)->field('doorpics,signrecvpics,overviewpics,beforepics,afterpics,detials,is_ok')->select();
            $img['qian'] = Db::name('imgs')->where('id','in',$img[0]['beforepics'])->field('image')->select();
            $img['hou'] = Db::name('imgs')->where('id','in',$img[0]['afterpics'])->field('image')->select();
            foreach ($img['qian'] as $key => $value) {
	        $img['imgs'][$key]['qian'] = $value['image'];
            }
            foreach ($img['hou'] as $key => $value) {
	        $img['imgs'][$key]['hou'] = $value['image'];
            }

  	 	}
  	 	return $img;
  }

}