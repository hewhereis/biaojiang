<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\OrderworkModel;
use app\index\model\OrderclientModel;
class Orderwork extends Base
{
		/*
		*师傅订单管理master_status=1
		*/
public function order_logic_g(){
        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
            $this->redirect($ds_url['__PUBLIC__'].'auth');
        }
        $uid=session('id');
        $key = input('key');

        //	print_r($key);

        $map = [];
        $where['bj_orders.worker_id']=$uid;
        $where['bj_orders.work_del']=0;

        if($key&&$key!=="")
        {
            $map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.master_status'] = ['like',"%" . $key . "%"];

        }
        $Nowpage  = input('get.page') ? input('get.page'):1;
        $limits   = '5';// 获取总条数
        $count    = Db::name('orders')->where($map)->where($where)->count();//计算总页面
        $allpage  = intval(ceil($count / $limits));
        $user     = new OrderclientModel();
        $lists    = $user->getWorkerWhere($map, $Nowpage, $limits,$uid);

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch('order_logic_g');
    }

	public function order_logic_a(){ 
	
			$uid=session('id');
			$ds_url=\think\Config::get('view_replace_str');
			
			if(empty($uid)){
					$this->redirect($ds_url['__PUBLIC__'].'auth');
			}	
			
			
			$key = input('key');
			$map = [];
			$where['bj_orders.worker_id']=$uid;
			$where['bj_orders.work_del']=0;
			$where['bj_orders.master_status']=1;
			if($key&&$key!=="")
			{
			$map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.master_status'] = ['like',"%" . $key . "%"];  
				
				
			}       
			$Nowpage  = input('get.page') ? input('get.page'):1;
			$limits   = '5';// 获取总条数
			$count    = Db::name('orders')->where($map)->where($where)->count();//计算总页面
			$allpage  = intval(ceil($count / $limits));
			$user     = new OrderworkModel();
			$lists    = $user->getOrderWhere($map, $Nowpage, $limits,$uid);
			 
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			if(input('get.page'))
			{
				return json($lists);
			}
			 
			 
			
			return $this->fetch('order_logic_a');
	}
	
	/*
		*师傅订单管理master_status=2
		*/
	public function order_logic_b(){ 
			
			$uid=session('id');
			
			$ds_url=\think\Config::get('view_replace_str');
			
			if(empty($uid)){
					$this->redirect($ds_url['__PUBLIC__'].'auth');
				}	
			$key = input('key');
			$map = [];
			$where['bj_orders.worker_id']=$uid;
			$where['bj_orders.work_del']=0;
			$where['bj_orders.master_status']=2;
			if($key&&$key!=="")
			{
			$map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.master_status'] = ['like',"%" . $key . "%"];  
				
				
			}       
			$Nowpage  = input('get.page') ? input('get.page'):1;
			$limits   = '5';// 获取总条数
			$count    = Db::name('orders')->where($map)->where($where)->count();//计算总页面
			$allpage  = intval(ceil($count / $limits));
			$user     = new OrderworkModel();
			$lists    = $user->getOrderWhere1($map, $Nowpage, $limits,$uid);
			 
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			if(input('get.page'))
			{
				return json($lists);
			}
			 
			 
			
			return $this->fetch('order_logic_b');
	}
	/*
		*师傅订单管理master_status=3
		*/
	public function order_logic_c(){ 
		
			$uid=session('id');
			$ds_url=\think\Config::get('view_replace_str');
			if(empty($uid)){
					$this->redirect($ds_url['__PUBLIC__'].'auth');
				}	
			$key = input('key');
			$map = [];
			$where['bj_orders.worker_id']=$uid;
			$where['bj_orders.work_del']=0;
			$where['bj_orders.master_status']=3;
			if($key&&$key!=="")
			{
			$map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.master_status'] = ['like',"%" . $key . "%"];  
				
				
			}       
			$Nowpage  = input('get.page') ? input('get.page'):1;
			$limits   = '5';// 获取总条数
			$count    = Db::name('orders')->where($map)->where($where)->count();//计算总页面
			$allpage  = intval(ceil($count / $limits));
			$user     = new OrderworkModel();
			$lists    = $user->getOrderWhere2($map, $Nowpage, $limits,$uid);
			 
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			if(input('get.page'))
			{
				return json($lists);
			}
			 
			 
			
			return $this->fetch('order_logic_c');
	}
	
	/*
		*师傅订单管理master_status=4
		*/
	public function order_logic_d(){ 
			
			$uid=session('id');
			$ds_url=\think\Config::get('view_replace_str');
			if(empty($uid)){
					$this->redirect($ds_url['__PUBLIC__'].'auth');
				}	
			$key = input('key');
			$map = [];
			$where['bj_orders.worker_id']=$uid;
			$where['bj_orders.work_del']=0;
			$where['bj_orders.master_status']=4;
			if($key&&$key!=="")
			{
			$map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.master_status'] = ['like',"%" . $key . "%"];  
				
				
			}       
			$Nowpage  = input('get.page') ? input('get.page'):1;
			$limits   = '5';// 获取总条数
			$count    = Db::name('orders')->where($map)->where($where)->count();//计算总页面
			$allpage  = intval(ceil($count / $limits));
			$user     = new OrderworkModel();
			$lists    = $user->getOrderWhere3($map, $Nowpage, $limits,$uid);
			 
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			if(input('get.page'))
			{
				return json($lists);
			}
			 
			 
			
			return $this->fetch('order_logic_d');
	}
	
	/*
		*师傅订单管理master_status=5
		*/
	public function order_logic_e(){ 
			
			$uid=session('id');
			$ds_url=\think\Config::get('view_replace_str');
			if(empty($uid)){
					$this->redirect($ds_url['__PUBLIC__'].'auth');
				}
			$key = input('key');
			$map = [];
			$where['bj_orders.worker_id']=$uid;
			$where['bj_orders.work_del']=0;
			$where['bj_orders.master_status']=5;
			if($key&&$key!=="")
			{
			$map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.master_status'] = ['like',"%" . $key . "%"];  
				
				
			}       
			$Nowpage  = input('get.page') ? input('get.page'):1;
			$limits   = '5';// 获取总条数
			$count    = Db::name('orders')->where($map)->where($where)->count();//计算总页面
			$allpage  = intval(ceil($count / $limits));
			$user     = new OrderworkModel();
			$lists    = $user->getOrderWhere4($map, $Nowpage, $limits,$uid);
			 
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			if(input('get.page'))
			{
				return json($lists);
			}
			 

			return $this->fetch('order_logic_e');
	}
	
	/*
		*师傅订单管理master_status=6
		*/
	public function order_logic_f(){

        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
            $this->redirect($ds_url['__PUBLIC__'].'auth');
        }
        $uid=session('id');
        $key = input('get.key');

        //	print_r($key);
        $map = [];
        $where['bj_orders.worker_id']=$uid;
        $where['bj_orders.work_del']=0;
        if($key&&$key!=="")
        {
            $map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.master_status'] = ['like',"%" . $key . "%"];
        }

        $Nowpage  = input('get.page') ? input('get.page'):1;
        $limits   = '5';// 获取总条数
        $count    = Db::name('orders')->where($map)->where($where)->count();//计算总页面

        $allpage  = intval(ceil($count / $limits));

        $user     = new OrderclientModel();
        $lists    = $user->getWorkerWhere($map, $Nowpage, $limits,$uid);

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数

        $this->assign('val', $key);
        if(input('get.page'))
        {
            $dar=["list"=>$lists,'allpage'=>$allpage];

            return json($dar);
        }
			 
			 
			return $this->fetch('order_logic_f');
	}
	
	
	
	
	
	
	
	
	
	
	
}
