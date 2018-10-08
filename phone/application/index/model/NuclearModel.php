<?php

namespace app\index\model;
use think\Model;
use think\Db;
use app\index\controller\Api;
class NuclearModel extends Model
{
	/**
	 * [master_nuclear description]
	 * 师傅填写核单报告页面
	 * @param  [type] $order_number [description]
	 * @return [type]               [description]
	 */
   public function master_nuclear($order_number){
        // 在订单主表找到该订单是否需要核单报告
		$all= Db::name('orders')->where('order_number',$order_number)->field('is_bomb,service_type_id')->find();
        if($all['service_type_id']==2){//维修核单报告
             if($all['is_bomb']==1){//客户确定需要核单
                $list = Db::name('touching_report')->where('order_number',$order_number)->select();
                if(!empty($list)){//师傅已经填写过核单报告
                	    //判断客户有没有签名
                	    $sign = Db::name('touching_report')->where('order_number',$order_number)->field('is_ok')->find();
                	    if(!empty($sign['is_ok'])){
                            $result = $this->yes_sign($order_number);
                	    }else{//客户没有签名
				            $result = $this->no_sign($order_number);
                	    }
                }else{//师傅第一次填写核单报告
                   //查找项目附表有几个项目
                   $result =  Db::name('orders_maintain')->where('order_number',$order_number)->field('l2_category_id')->select();
                   foreach ($result as $key => $value) {
                   	   $result[$key]['l2_category_id'] = Db::name('commodity')->where('id',$value['l2_category_id'])->value('name');
                   	   $result[$key]['service'] = Db::name('service')->where('id',$all['service_type_id'])->value('name');
                   	   $result[$key]['price'] ='';
                   	   $result[$key]['content'] ='';
                   	   $result[$key]['imagesids'] ='';
                   	   $result[$key]['sign'] = 0;
                   }
                }
             }
        }else if($all['service_type_id']==1){//安装核单报告

        }
        return $result;
   }
	/**
	 * 师傅提交的ajax核单报告信息
	 */
   public function submit_nuclear($param){
   	   $order_number = $param['order_number'];
   	   $service = Db::name('orders')->where('order_number',$order_number)->field('service_type_id')->find();
   	   if($service['service_type_id']==2)//师傅提交过来的维修报告
   	   	{	
   	   		//查询出维修附表的ID加入核单报告表
   	      $datas['o_m_ids'] = Db::name('orders_maintain')->where('order_number',$order_number)->field('id')->select();
   	      foreach ($datas['o_m_ids'] as $key => $value) {
   	      	$data['o_m_ids'][$key] = $value['id'];
   	      }
   	      $data['content'] = $param['conent'];
          $data['imagesids'] = $param['hendanimg'];
          $money = $param['money'];
          $list = Db::name('touching_report')->where('order_number',$order_number)->select();
          if(!empty($list)){//师傅不是第一次提交核单报告
            $info = Db::name('touching_report')->where('order_number',$order_number)->delete();//先删除数据表在加入
            if(!empty($info)){//删除成功
                //数组重组
	            $getinfo = new Api();
	            $getinfo = $getinfo->getArray($data,$order_number,$money);
		        //循环加入数据表
		        foreach ($getinfo as $key => $value) {
		        	    $array = Db::name('touching_report')->insert($value);	
		        	    }		
	              } 
             }else{//师傅第一次提交核单报告加入数据表
          	//数组重组
            $getinfo = new Api();
	          $getinfo = $getinfo->getArray($data,$order_number,$money);
	         //循环加入数据表
	        foreach ($getinfo as $key => $value) {
	        	   $array = Db::name('touching_report')->insert($value);	
	        	 }		
          }
          $step = Db::name('orders')->where('order_number',$order_number)->field('step_type')->find();
          if($step['step_type']==1){
             $map['work_step_number']='4';
          }else{
             $map['work_step_number']='7';
          }
          Db::name('orders')->where('order_number',$order_number)->update($map);
          if(!empty($array)){
          	 return ['code'=>200,'msg'=>'提交核单报告成功'];
          }else{
             return ['code'=>0,'msg'=>'提交核单出现点小问题哦'];
          }
   	   }else if($service['service_type_id']==1){//安装
   	   	
   	   }
	}
    /**
     * 核单报告客户页面
     */
    public function customer_nuclear($order_number){
    	$all= Db::name('orders')->where('order_number',$order_number)->field('service_type_id')->find();
    	if($all['service_type_id']==2){//维修
    		//判断客户是否已经签名完成
    		$sign = Db::name('touching_report')->where('order_number',$order_number)->field('is_ok')->find();
    		if(!empty($sign['is_ok'])){//已签名
           $result = $this->yes_sign($order_number);
    		}else{//客户没有签名
    			 $result = $this->no_sign($order_number);
    		}
    		
    	}else if($all['service_type_id']==1){//安装

    	}
    	return  $result;
    }
    
    /**
     * 维修项目客户没有签名
     */
    private function no_sign($order_number){
    	$all= Db::name('orders')->where('order_number',$order_number)->field('is_bomb,service_type_id')->find();
        $result =  Db::name('orders_maintain')->where('order_number',$order_number)->field('l2_category_id')->select();
        foreach ($result as $key => $value) {
   	    $result[$key]['l2_category_id'] = Db::name('commodity')->where('id',$value['l2_category_id'])->value('name');
   	    $result[$key]['service'] = Db::name('service')->where('id',$all['service_type_id'])->value('name');
        }
        //查找核单报告表
        $resultAll = Db::name('touching_report')->where('order_number',$order_number)->field('content,imagesids,signature_id')->select();
        foreach ($resultAll as $key => $value) {
        	 $result[$key]['content'] = $value['content'];
        	 $result[$key]['imagesids'] = $value['imagesids'];
        	 $result[$key]['price'] = $value['signature_id'];
        	 $result[$key]['sign'] = 0;
        } 
        return $result;  
    }
    /**
     * 维修项目客户已签名
     */
     private function yes_sign($order_number){
     	$all= Db::name('orders')->where('order_number',$order_number)->field('is_bomb,service_type_id')->find();
     	$result =  Db::name('orders_maintain')->where('order_number',$order_number)->field('l2_category_id')->select();
        foreach ($result as $key => $value) {
   	    $result[$key]['l2_category_id'] = Db::name('commodity')->where('id',$value['l2_category_id'])->value('name');
   	    $result[$key]['service'] = Db::name('service')->where('id',$all['service_type_id'])->value('name');
        }
        //查找核单报告表
        $resultAll = Db::name('touching_report')->where('order_number',$order_number)->field('content,imagesids,signature_id,user_signature_id,is_ok')->select();
        foreach ($resultAll as $key => $value) {
        	 $result[$key]['content'] = $value['content'];
        	 $result[$key]['imagesids'] = $value['imagesids'];
        	 $result[$key]['price'] = $value['signature_id'];
        	 $result[$key]['user_signature_id'] = $value['user_signature_id'];
        	 $result[$key]['sign'] = 1;

        }
          $result[0]['qianming'] = Db::name('signature')->where('id',$resultAll[0]['user_signature_id'])->value('image');
        return $result; 
     }
     /**
      * 报告有问题发送系统消息
      */
     public function feedback_message($param){
     	//查询出师傅ID
     	$wid = Db::name('orders')->where('order_number',$param['order_number'])->value('worker_id');

     	$data['message_type'] = 1;
     	$data['source_id'] = $param['uid'];
     	$data['receive_id'] = $wid;
     	$data['content'] = '您的订单客户反馈的内容是：'.$param['content'];
     	$data['link'] = $param['link'];
     	$data['sending_time'] = date('Y-m-d H:i:s',time());
     	$result = Db::name('message_reminder')->insert($data);
     	if(!empty($result)){
     		return ['code'=>200,'msg'=>'反馈成功'];
     	}else{
     		return ['code'=>0,'msg'=>'反馈出现点小问题哦'];
     	 }
     }
     /**
      * 客户提交签名改变步骤
      */
     public function submit_sign($order_number){
        $step = Db::name('orders')->where('order_number', $order_number)->field('step_type,service_type_id')->find();
        if($step['service_type_id']==1){

        }else if($step['service_type_id']==2){
          if($step['step_type']==1){
            $map['work_step_number']='5';
          }else{
            $map['work_step_number']='8';
          }
        }else if($step['service_type_id']==5){

        }
        $info = Db::name('orders')->where('order_number',$order_number)->update($map);
        return $info;
     }
}