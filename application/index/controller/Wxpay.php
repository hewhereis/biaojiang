<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Wxpay extends Base{     
     public function index($number){	 
		 $arr = Db::name('pay_price')->where('order_number',$number)->select();
		 if($arr){
			 $total = Db::name('pay_price')->where('order_number',$number)->field('total_price')->find();	
             $id = Db::name('orders')->where('order_number',$number)->field('service_type_id')->find();
			 $service = Db::name('service')->where('id',$id['service_type_id'])->field('name')->find();
			 $qq=$total['total_price'];
			 $this->assign('qq',$qq);
			 $this->assign('number',$number);
			 $this->assign('service',$service['name']);
			 return view();	
		 }
	 }
	 //扫码支付成功价钱加入数据表
	 public function adds(){
		     $order_number = input('post.order_number');
		     $total = Db::name('pay_price')->where('order_number',$order_number)->field('total_price')->find();				 
		     $data['amount_total'] = $total['total_price'];			 
			 $step = Db::name('orders')->where('order_number',$order_number)->field('step_type,service_type_id')->find();
			 $where['order_number'] = $order_number;
             if($step['service_type_id']==2){//维修
                 if($step['step_type']==1){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =2;
				 $total_price = Db::name('orders')->where($where)->update($data);	
				 //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
	             }else if($step['step_type']==2){
	             $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =5; 
				 $total_price = Db::name('orders')->where($where)->update($data);	
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
				 
	             }
             }else if($step['service_type_id']==1){//安装
                 if($step['step_type']==3){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =2;
				 $total_price = Db::name('orders')->where($where)->update($data);	
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
	             }else if($step['step_type']==4){
	             $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =5; 
				 $total_price = Db::name('orders')->where($where)->update($data);	
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
	             }
             }else if($step['service_type_id']==4){//勘测
				if($step['step_type']==5){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =3; 
				 $data['work_step_number'] =2;				 
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);	
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
				 }
			}else if($step['service_type_id']==5){//更换灯片
                 if($step['step_type']==6){
                     $data['status'] = 3;
                     $data['master_status'] = 3;
                     $data['step_number'] =6;
                     $data['work_step_number'] =2;
                     $total_price = Db::name('orders')->where($where)->update($data);
					  //付款成功给师傅发短信
					 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
					 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
					 $phone=$work_phone['phone'];
					 $uname=$cha['contact_name'];
					 $order=$cha['order_number'];
					 $time=date('Y-m-d H:i:s');
					 ds_payment($phone,$uname,$order,$time);
                 }else if($step['step_type']==7){
                     $data['status'] = 3;
                     $data['master_status'] = 3;
                     $data['step_number'] =6;
                     $data['work_step_number'] =5;
                     $total_price = Db::name('orders')->where($where)->update($data);
					  //付款成功给师傅发短信
					 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
					 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
					 $phone=$work_phone['phone'];
					 $uname=$cha['contact_name'];
					 $order=$cha['order_number'];
					 $time=date('Y-m-d H:i:s');
					 ds_payment($phone,$uname,$order,$time);
                 }
             }else if($step['service_type_id']==6){//围板搭建/拆除
				if($step['step_type']==8){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =2;
				 $total_price = Db::name('orders')->where($where)->update($data);	
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
	             }else if($step['step_type']==9){
	             $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =5; 
				 $total_price = Db::name('orders')->where($where)->update($data);	
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
	             }
			}
		     if($total_price){
				 return json(array('code'=>200,'msg'=>''));
			 }else{
				 return json(array('code'=>0,'msg'=>''));
			 }

	 }

	 public function payment($total,$number){
         $id = Db::name('orders')->where('order_number',$number)->field('service_type_id')->find();
		 $service = Db::name('service')->where('id',$id['service_type_id'])->field('name')->find();		 
		 $qq=$total;
		 $_SESSION['qq']=$total;  
		 $_SESSION['number']=$number;  
		 $this->assign('qq',$qq);
		 $this->assign('number',$number);
		 $this->assign('service',$service['name']);
		 return view('wxjs'); 
	 }
	 //jsapi支付成功价钱加入数据表
	 public function jsApiAdd(){
		 $order_number = input('post.order_number');			
		 $total = input('post.total');
		 $data['amount_total'] = $total; 
		 $step = Db::name('orders')->where('order_number',$order_number)->field('step_type,service_type_id')->find();
		 if($step['service_type_id']==2){//维修
	            if($step['step_type']==1){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =2;
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);	
			  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }else if($step['step_type']==2){
	             $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =5; 
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);	
			     //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }
		 }else if($step['service_type_id']==1){//安装
	            if($step['step_type']==3){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =2;
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);
				//付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);			 
             }else if($step['step_type']==4){
	             $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =5; 
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);	
			     //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }
		 }else if($step['service_type_id']==5){//更换灯片
             if($step['step_type']==6){
                 $data['status'] = 3;
                 $data['master_status'] = 3;
                 $data['step_number'] =6;
                 $data['work_step_number'] =2;
                 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }else if($step['step_type']==7){
                 $data['status'] = 3;
                 $data['master_status'] = 3;
                 $data['step_number'] =6;
                 $data['work_step_number'] =5;
                 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }
         }else if($step['service_type_id']==4){//勘测
	            if($step['step_type']==5){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =3; 
				 $data['work_step_number'] =2;
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);	
			     //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }
		 }else if($step['service_type_id']==6){//围板搭建/拆除
			 	if($step['step_type']==8){   
				 $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =2;
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);	
				  //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }else if($step['step_type']==9){
	             $data['status'] = 3;
				 $data['master_status'] = 3;
				 $data['step_number'] =6; 
				 $data['work_step_number'] =5; 
				 $total_price = Db::name('orders')->where('order_number',$order_number)->update($data);	
			     //付款成功给师傅发短信
				 $cha= Db::name('orders')->where('order_number',$order_number)->find();	
				 $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
				 $phone=$work_phone['phone'];
				 $uname=$cha['contact_name'];
				 $order=$cha['order_number'];
				 $time=date('Y-m-d H:i:s');
				 ds_payment($phone,$uname,$order,$time);
             }
		 } 	 	
            if($total_price){
				 return json(array('code'=>200,'msg'=>''));
			 }else{
				 return json(array('code'=>0,'msg'=>''));
			 }		 
	 }
	 /**
	  * 咨询付费
	  */
	  public function consult($number){
	    $arr = Db::name('pay_price')->where('order_number',$number)->field('consult_price')->select();
		    if($arr){
			 $total = Db::name('pay_price')->where('order_number',$number)->field('consult_price')->find();
			 $qq=$total['consult_price'];
			 $service = '咨询付费';
			 $this->assign('qq',$qq);
			 $this->assign('number',$number);
			 $this->assign('service',$service);
			 return view('consult_index');	
		 }	
	 }
	 /**
	  * [consult_adds description]
	  * @return [type] [description]
	  * 咨询付费成功加入数据表
	  */
	 public function consult_adds(){
	 	$order_number = input('post.order_number');
	 	$data['pay'] = 1;
        $info = Db::name('orders')->where('order_number',$order_number)->update($data);
        if(!empty($info)){
        	return json(array('code'=>200,'msg'=>''));
        }else{
        	 return json(array('code'=>0,'msg'=>''));
        }
	 }
    /**
     * 咨询jsapi付费
     */
    public function pay_consult($total,$number){
        $qq = $total;
        $service = '咨询付费';
        $this->assign('qq',$qq);
        $this->assign('service',$service);
        $this->assign('number',$number);
        return view('consult_wxjs');	
    }
    /**
     * 咨询付费jsapi加入数据表
     */
   public function jsApiConsult(){
	   	$order_number = input('post.order_number');
	   	$data['pay'] = 1;
        $info = Db::name('orders')->where('order_number',$order_number)->update($data);
        if(!empty($info)){
        	return json(array('code'=>200,'msg'=>''));
        }else{
        	 return json(array('code'=>0,'msg'=>''));
        }
   }
}