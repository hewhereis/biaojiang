<?php
namespace app\index\controller;
use think\Controller;
use think\Db; 
use app\index\model\OrderclientModel;
class Ordermanage extends Base
{
	//客户订单管理首页
	public function order_customer_home(){
		    $uid=session('id');
			$type=session('type');
			$ds_url=\think\Config::get('view_replace_str');
			if($type==2){
				$this->redirect($ds_url['__PUBLIC__'].'order_master_home');//跳转师傅订单管理页面
			}
			
			$param =input();
			$ser   = input('ser');	
			$ds_where=[];
			if($ser&&$ser!=="")
			{	 
				 $ds_where["bj_orders.status"]=$ser;         
			}
			$this->assign('ser', $ser);
			$this->assign('uid', $uid);
			
		if(empty($param['start'])){
				$where['a.is_del']='0';
				$where['a.owner_id']=$uid;
				$join = [
					['bj_users b','b.id = a.worker_id','LEFT'],
					['bj_service c','c.id = a.service_type_id','LEFT'],
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_orders_survey s','s.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT']
					 					
					
				 ];
			   $field='a.id,a.order_number,a.service_type_id,a.full_location,a.location_ext,a.amount_urgent,a.status,a.worker_id,c.name as sname,a.step_type,b.real_name as bname,d.brand as d_brand,
			   e.brand as e_brand,m.brand as m_brand,s.brand as s_brand,g.brand as g_brand';

			   $list=Db::name("orders")->alias('a')->field($field)->join($join)->where($ds_where)->where($where)->group('a.id desc')->limit(6)->select();
				
			   $this->assign('list',json_encode($list));//赋值数据集
			 
			   return view('ordermanage/order_customer_home');
		 }else{
			 
				$wheres['is_del']='0';
				$wheres['owner_id']=$uid;
				$total  = Db::name('orders')->where($wheres)->where($ds_where)->count();
				$totals = $total;
				$start  = input('post.start');

				$where['a.is_del']='0';
				$where['a.owner_id']=$uid;
				$join = [
					['bj_users b','b.id = a.worker_id','LEFT'],
					['bj_service c','c.id = a.service_type_id','LEFT'],
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_orders_survey s','s.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT']				
				
			   ];
			     $field='a.id,a.order_number,a.worker_id,a.service_type_id,a.full_location,a.location_ext,a.amount_urgent,a.status,c.name as sname,a.step_type,b.real_name as bname,d.brand as d_brand,
			   e.brand as e_brand,m.brand as m_brand,s.brand as s_brand,g.brand as g_brand';

			   $lists=Db::name("orders")->alias('a')->field($field)->join($join)->where($where)->where($ds_where)->group('a.id desc')->limit($start,6)->select();
			   
			   return(array( 'result'=>$lists,'status'=>1, 'totals'=>$totals ,'msg'=>'获取成功！'));
					
		
		 }
		

		
		
	}
	//客户订单状态
	public  function order_customer_state(){
		$id    = input('param.id');
		
		$order = new OrderclientModel();
		$where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_phone_step b','b.service_type = a.work_step_service','LEFT'],
			];
			$field='b.step_id';
			$ds=Db::name('orders')->alias('a')->field($field)->join($join)->where($where)->group('b.step_id')->select();
		$arr=array();
		foreach ($ds as $k){
			$arr[]=$k['step_id'];
			
		}
		$ds_max=max($arr);
       
		
		$this->assign('orderstep',$order->getStep($id));
		$this->assign('ordersteps',$order->getSteps($id));
		$this->assign('orderstepso',$order->getStepso($id));
		$this->assign('ds_max',$ds_max);
		
		$where['a.id']=$id;
			$where['a.is_del']=0;
			$join = [
				['bj_phone_step b','b.service_type = a.step_type','LEFT'],
			];
			$field='b.step_link';
			$orderstepss= Db::name('orders')->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`=`a`.`step_number`')->group('b.step_id')->select();
		
		
		
		if($orderstepss==Array()){
		}else{
			$step_link=$orderstepss[0]['step_link'];
			$this->assign('step_link',$step_link);
		}
		
		$this->assign('orderstatus',$order->getStatus($id));
		return view('ordermanage/order_customer_state');
	}
	
	
   //师傅订单管理首页
	public function order_master_home(){
		    $uid   =session('id');
			$param =input();
			$ser   = input('ser');	
			$ds_where=[];
			if($ser&&$ser!=="")
			{	 
				 $ds_where["bj_orders.master_status"]=$ser;         
			}
			$this->assign('ser', $ser);
			$this->assign('uid', $uid);
			
		if(empty($param['start'])){
				$where['a.work_del']='0';
				$where['a.worker_id']=$uid;
				$join = [
					['bj_users b','b.id = a.owner_id','LEFT'],
					['bj_service c','c.id = a.service_type_id','LEFT'],
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_orders_survey s','s.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT']
					 					
					
				 ];
			   $field='a.id,a.order_number,a.worker_id,a.service_type_id,a.full_location,a.location_ext,a.amount_urgent,a.master_status,c.name as sname,a.work_step_number,a.work_step_service,b.username as bname,d.brand as d_brand,
			   e.brand as e_brand,m.brand as m_brand,s.brand as s_brand,g.brand as g_brand,a.is_bomb';

			   $list=Db::name("orders")->alias('a')->field($field)->join($join)->where($ds_where)->where($where)->group('a.id desc')->limit(6)->select();
				
			   $this->assign('list',json_encode($list));//赋值数据集
			 
			   return view('ordermanage/order_master_home');
		 }else{
			 
				$wheres['work_del']='0';
				$wheres['worker_id']=$uid;
				$total  = Db::name('orders')->where($wheres)->where($ds_where)->count();
				$totals = $total;
				$start  = input('post.start');

				$where['a.work_del']='0';
				$where['a.worker_id']=$uid;
				$join = [
					['bj_users b','b.id = a.owner_id','LEFT'],
					['bj_service c','c.id = a.service_type_id','LEFT'],
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_orders_survey s','s.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT']				
				
			   ];
			     $field='a.id,a.order_number,a.worker_id,a.service_type_id,a.full_location,a.location_ext,a.amount_urgent,a.master_status,c.name as sname,a.work_step_number,a.work_step_service,b.username as bname,d.brand as d_brand,
			   e.brand as e_brand,m.brand as m_brand,s.brand as s_brand,g.brand as g_brand,a.is_bomb';

			   $lists=Db::name("orders")->alias('a')->field($field)->join($join)->where($where)->where($ds_where)->group('a.id desc')->limit($start,6)->select();
			   
			   return(array( 'result'=>$lists,'status'=>1, 'totals'=>$totals ,'msg'=>'获取成功！'));
					
		
		 }
		
		
	}
	//师傅订单状态
	public  function order_master_state(){
		$param = input();
		$id    = input('param.id');
		
		$order = new OrderclientModel();
		
		    $where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_phone_workstep b','b.service_type = a.work_step_service','LEFT'],
			];
			$field='b.step_id';
			$ds=Db::name('orders')->alias('a')->field($field)->join($join)->where($where)->group('b.step_id')->select();
		
		
		$arr=array();
		foreach ($ds as $k){
			$arr[]=$k['step_id'];
			
		}
	 
		$ds_max=max($arr);
       
	
		$order = new OrderclientModel();
		$this->assign('orderstep',$order->Work_getStep($id));
		$this->assign('ordersteps',$order->Work_getSteps($id));
		$this->assign('orderstepso',$order->Work_getStepso($id));
		$this->assign('ds_max',$ds_max);
		
		$where['a.id']=$id;
			$where['a.work_del']=0;
			$join = [
				['bj_work_step b','b.service_type = a.work_step_service','LEFT'],
			];
			$field='b.step_link,b.step_onclick';
			$orderstepss= Db::name('orders')->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`=`a`.`work_step_number`')->group('b.step_id')->select();
			
		
		
		if($orderstepss==Array()){
			
		}else{
		$step_link=$orderstepss[0]['step_link'];
		$step_onck=$orderstepss[0]['step_onclick'];
		$this->assign('step_link',$step_link);
		$this->assign('step_onck',$step_onck);
		}
		
		
		$this->assign('orderstatus',$order->getworkStatus($id));
		return view('ordermanage/order_master_state');
	}
	/**
	 * [send_message description]
	 * 提醒客户付款
	 * @return [type] [description]
	 */
	public function send_message(){
        $order_number = input('post.order_number');
        $link = input('post.link');
                $map['message_type']=1;
                $map['source_id']=Db::name('orders')->where('order_number',$order_number)->value('worker_id');
                $map['receive_id']=Db::name('orders')->where('order_number',$order_number)->value('owner_id');
                $map['content']='师傅提醒你去付款';
                $map['link']=$link;
                $map['status']='0';
                $map['sending_time']=date("Y-m-d H:i:s");
                $res = Db::name('message_reminder')->insert($map);
                if($res){
                	return json(['code'=>200,'msg'=>'提醒成功']);
                }else{
                	return json(['code'=>200,'msg'=>'提醒客户出现一点小问题哦']);
                }
	}
	
	
	
	
	
}	
