<?php
namespace app\index\controller;
use think\Controller;
use think\Db; 
class Masterhome extends Base
{
	public function master_home(){
			$param =input();
			$ser   = input('ser');	
			$uid   =session('id');
			$ds_where=[];
			if($ser&&$ser!=="")
			{	 
				 $ds_where["bj_orders.service_type_id"]=$ser;         
			}
			$service=Db::name("service")->field('id,name')->where('status','1')->where('id','NOTIN','4')->select();
			$this->assign('service',json_encode($service));
			$this->assign('ser', $ser);
			$this->assign('uid', $uid);
			
		if(empty($param['start'])){
			
				$ser = input('ser');
				$ds_where=[];
				if($ser&&$ser!=="")
				{	 
					 $ds_where["bj_orders.service_type_id"]=$ser;         
				}
					
				$where['a.worker_id']='0';
				$where['a.judge']='1';
				$join = [
					['bj_users b','b.id = a.owner_id','LEFT'],
					['bj_service c','c.id = a.service_type_id','LEFT'],
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_offer_total f','f.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT'],
					['bj_offer_total o','o.order_number =a.order_number','LEFT'] 					
					
				 ];
			   $field='a.id,a.order_number,a.service_type_id,a.full_location,a.start_time,d.budget as dprice,e.budget as eprice,
			   m.budget as mprice,g.budget as gprice,b.img as uimg,
			   c.name as sname,o.worker_id as o_wid,o.order_number as o_ord,o.is_rob as o_rob';

			   $list=Db::name("orders")->alias('a')->field($field)->join($join)->where($ds_where)->where($where)->where('a.service_type_id','NOTIN','4')->group('a.id desc')->limit(6)->select();
				foreach($list as $k=>$v){
					$list[$k]['start_time']=date('Y-m-d H:i:s',$v['start_time']); 
				}  
			
			   $this->assign('list',json_encode($list));//赋值数据集
			 
			   return  view('masterhome/master_home');
		 }else{
				
					
			 
				$wheres['worker_id']='0';
				$wheres['judge']='1';
				$total  = Db::name('orders')->where($wheres)->where($ds_where)->count();
				$totals = $total;
				$start  = input('post.start');
				
				$where['a.worker_id']='0';
				$where['a.judge']='1';
				$join = [
					['bj_users b','b.id = a.owner_id','LEFT'],
					['bj_service c','c.id = a.service_type_id','LEFT'],
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_offer_total f','f.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT'],
					['bj_offer_total o','o.order_number =a.order_number','LEFT'] 					
				
			   ];
			   $field='a.id,a.order_number,a.service_type_id,
			   a.full_location,a.start_time,d.budget as dprice,
			   e.budget as eprice,m.budget as mprice,g.budget as gprice,b.img as uimg,c.name as sname,o.worker_id as o_wid,o.order_number as o_ord,o.is_rob as o_rob';

			   $lists=Db::name("orders")->alias('a')->field($field)->join($join)->where($where)->where($ds_where)->where('a.service_type_id','NOTIN','4')->group('a.id desc')->limit($start,6)->select();
			   foreach($lists as $k=>$v){
					$lists[$k]['start_time']=date('Y-m-d H:i:s',$v['start_time']); 
			   }  
			   return(array( 'result'=>$lists,'status'=>1, 'totals'=>$totals ,'msg'=>'获取成功！'));
		 }
		

	}

		public  function real_name(){
			$uid=session('id');
			$list=Db::name('users_worker')->where('uid',$uid)->field('review_status')->find();
			if($list['review_status']==0){
				return ['code' => 0, 'data' => '0', 'msg' => '您还未实名认证,点击前往认证'];
			}elseif($list['review_status']==1){
				return ['code' => 1, 'data' => '1', 'msg' => '您的实名认证正在审核中'];
			}elseif($list['review_status']==2){
				return ['code' => 200, 'data' => '2', 'msg' => '您的实名认证正已通过'];
			}elseif($list['review_status']==3){
				return ['code' => 3, 'data' => '3', 'msg' => '您的实名认证未通过,点击重新认证'];
			}
			
		}
	
	
	
	
	
	
}	
