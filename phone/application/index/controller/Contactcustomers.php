<?php  
  namespace app\index\controller;
  use think\Controller;
  use think\Db;
  

  /*
   *师傅联系客户
   */
  
  class  Contactcustomers  extends Base{
       //师傅联系客户
       public  function   index($onumber){
         $wid=session('id');
         $order_number=$onumber;
         $data=Db::name('orders')->where('order_number',$order_number)->select();
         $this->assign('data',json_encode($data));
         $this->assign('order_number',$order_number);
         $this->assign('wid',$wid);
       	return  $this->fetch();
       }



   /*
    师傅和客户沟通后确定的施工时间 
    */    
       public  function  times(){
       	$order_number=input('post.order_number');
        $hours=strtotime(input('post.time'));
        $things['reason']=input('post.select1');
        
        $data['order_time']=$hours;
       	//判断有没有和客户商量过施工时间
       //	$time=Db::name('orders')->field('step_type,service_type_id')->where('order_number',$order_number)->find();
       	$time=Db::name('orders')->where('order_number',$order_number)->value('order_time');
          $reason=Db::name('orders')->where('order_number',$order_number)->update($things);
            if($reason){
               return json(array('code'=>0,'msg'=>'请求已接受,请重勿提交'));
           }else if($time){
       		return  json(array('code'=>0,'msg'=>'你已和客户确定时间，请勿重新填写'));
      
       	}
        $buzhou=Db::name('orders')->field('step_type,service_type_id')->where('order_number',$order_number)->find();
        if($buzhou['service_type_id']==2){//维修
          if($buzhou['step_type']==1){
             $data['work_step_number']='3';
          }else{
             $data['work_step_number']='6';
          }
        }else if($buzhou['service_type_id']==1){//安装

        }
        $order=Db::name('orders')->where('order_number',$order_number)->update($data);
       	//查询短信发送需要的数据
       	$wheres['a.order_number']=$order_number;
		    $join = [
          		['bj_users','bj_users.id = a.worker_id','LEFT'],
          		['bj_service','bj_service.id = a.service_type_id','LEFT'],
          		['bj_category','bj_category.id = a.l1_category_id','LEFT'],
              	];
       	$field='a.contact_phone,bj_service.name as b_name,bj_category.name as c_name,bj_users.real_name as d_name,a.worker_id as ids';
		    $list=Db::name('orders')->alias('a')->field($field)->join($join)->where($wheres)->find();

        $work_name=$list['d_name'];
        $w_one=mb_substr($work_name, 0, 1, 'utf-8');

        $u_phone=$list['contact_phone'];
        $u_service=$list['b_name'];
        $u_goos=$list['c_name'];
        $w_name=$w_one;
        $u_time=input('post.time');
        $w_ids=$list['ids'];
        $captcha=rand(110001,988889);//随机码
        $aa=ds_short_sms($u_phone,$u_service,$u_goos,$w_name,$u_time,$w_ids,$captcha);
        Db::name('orders')->where('order_number',$order_number)->update(['querenma'=>$captcha]);
            
          if($order){
        	    return json(array('code'=>200,'msg'=>'时间已确定，请准时工作'));
           }else{
        	    return json(array('code'=>0,'msg'=>'填写时间出了点问题，请重新添加'));
           }

       }

     
       //电话不通的原因
       public function  reason(){
         $work_id=session('id');
         $order_number=input('post.order_number');
         $reason=input('post.reason');
         //查出师傅的电话号码
          $m_phones=Db::name('users')->where('id',$work_id)->field('phone')->find();
          $m_phone=$m_phones['phone'];
          $list=Db::name('orders')->where('order_number',$order_number)->field('contact_phone')->find();
          $phone=$list['contact_phone'];
          $bb=re_short_sms($phone,$m_phone);
          $order=Db::name('orders')->where('order_number',$order_number)->update(['reason'=>$reason]);
          if($order || $order==0){
             return json(array('code'=>200,'msg'=>'原因提交成功，马上通知客户')); 
          }else{
             return  json(array('code'=>0,'msg'=>'原因提交出现了问题，请重新提交')); 
          }

       }

  }


?>