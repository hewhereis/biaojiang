<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\OrderclientModel;
class Ordermanage extends Base
{
		/*
		*客户订单管理
		*/
	public function order_manage_client(){ 
			
			$uid=session('id');
			$ds_url=\think\Config::get('view_replace_str');
			
			if(empty($uid)){
					$this->redirect($ds_url['__PUBLIC__'].'auth');
				}	
			$user = Db::name('users')->field('type')->where('id',$uid)->find();//获取当前登录者的账号类型		
			if($user['type']==2){
				$this->redirect($ds_url['__PUBLIC__'].'orders/master');//跳转师傅订单管理页面
			}
			
		    $key = input('key');
			$map = [];
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			if($key&&$key!=="")
			{
				$map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.status'] = ['like',"%" . $key . "%"];   
			}       
			$Nowpage = input('get.page') ? input('get.page'):1;
			$limits = '5';// 获取总条数
			$count = Db::name('orders')->where($map)->where($where)->count();//计算总页面
			$allpage = intval(ceil($count / $limits));
			$user = new OrderclientModel();
			$lists = $user->getOrderWhere($map, $Nowpage, $limits,$uid);
			 
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			if(input('get.page'))
			{
				return json($lists);
			}
			return $this->fetch('order_manage_client');
	}
	  /*
		*订单状态客户
		*/
	public function orderstatus()
    {
		
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
			
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
		$param = input();
		$id    = input('param.id');
		$order = new OrderclientModel();
		$this->assign('orderstep',$order->getStep($id));
		$this->assign('ordersteps',$order->getSteps($id));
		$this->assign('orderstepso',$order->getStepso($id));
		
		$where['a.id']=$id;
			$where['a.is_del']=0;
			$join = [
				['bj_step b','b.service_type = a.step_type','LEFT'],
			];
			$field='b.step_link';
			$orderstepss= Db::name('orders')->alias('a')->field($field)->join($join)->where($where)->where('`b`.`step_id`=`a`.`step_number`')->group('b.step_id')->select();
		
		
		
		if($orderstepss==Array()){
			
		}else{
		$step_link=$orderstepss[0]['step_link'];
		$this->assign('step_link',$step_link);
		}
		
		$this->assign('orderstatus',$order->getStatus($id));
		
		return $this->fetch('order_status');
    }
		/*
		*订单追加
		*/
	public function order_additional($id)
    {
    	$id = $id;
    	//根据ID查出orders对应的订单号
    	$order_number = Db::name('orders')->where('id',$id)->field('order_number')->find();

    	//查看税率
		$rate = Db::name('config')->where('id',5)->field('value')->find();
        $this->assign('order_number',$order_number['order_number']);
		$this->assign('rate',$rate['value']);
		return $this->fetch('order_additional');
    }
    /**
     * 追加价格和理由加入数据表
     */
	public function addition(){
		$param=input('post.');
		$param['create_time']= time();
        $list = Db::name('addition')->insert($param);
        if($list){
        	return json(array('code'=>200,'msg'=>''));
        }else{
        	return json(array('code'=>0,'msg'=>''));
        }
	}
    //微信扫码支付
    public function scan($number){
    	$arr = Db::name('addition')->where('order_number',$number)->find();
    	if($arr){
    		 $total = Db::name('addition')->where('order_number',$number)->field('total')->find();	
			 $service = '追加项目费用' ;
			 $qq=$total['total'];
			 $this->assign('qq',$qq);
			 $this->assign('number',$number);
			 $this->assign('service',$service);
    		 return view('index');
    	}
    }
     /**
      * 微信扫码支付成功后加入数据表
      */
     public function orderAdd(){
     	$order_number = input('post.order_number');
     	$total = Db::name('addition')->where('order_number',$order_number)->field('total,reason')->find();
     	$data['ampunt_addition'] = $total['total'];
     	$data['amput_content'] = $total['reason'];
     	$order = Db::name('orders')->where('order_number',$order_number)->update($data);
     	if($order || $order==0){
     		return json(array('code'=>200,'msg'=>''));
     	}else{
     		return json(array('code'=>0,'msg'=>''));
     	}	
     }
     //微信jsapi支付
     public function payment($total,$number){
		 $service = '追加项目费用';		 
		 $qq=$total;
		 $_SESSION['qq']=$total;  
		 $_SESSION['number']=$number;  
		 $this->assign('qq',$qq);
		 $this->assign('number',$number);
		 $this->assign('service',$service);
		 return view('wxjs'); 
	 }
     /**
      * 微信jsapi支付成功后加入数据表
      */
     public function apiAdd(){
     	 $order_number = input('post.order_number');
     	 $total = Db::name('addition')->where('order_number',$order_number)->field('reason')->find();			
		 $data['ampunt_addition'] = input('post.total');
		 $data['amput_content'] = $total['reason'];
		 $order = Db::name('orders')->where('order_number',$order_number)->update($data);
     	 if($order || $order==0){
     		return json(array('code'=>200,'msg'=>''));
     	}else{
     		return json(array('code'=>0,'msg'=>''));
     	}	
     }
	
		/*
		*师傅订单管理
		*/
	public function order_manage_master(){ 
	
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
		}
		$uid=session('id');
		$key = input('key');		 
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
			
		return $this->fetch('order_manage_master');
	}
		
		/*
		*订单状态师傅
		*/
	public function order_work_status()
    {
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
			
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
		$param = input();
		$id    = input('param.id');
		$order = new OrderclientModel();
		$this->assign('orderstep',$order->Work_getStep($id));
		$this->assign('ordersteps',$order->Work_getSteps($id));
		$this->assign('orderstepso',$order->Work_getStepso($id));
		
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
		return $this->fetch('order_work_status');
		
    }
		/*
		*师傅签到
		*/
	public function order_work_sign($id)
    {
		
		$order = new OrderclientModel();
		$this->assign('orderworksign',$order->getworkStatus($id));
		return $this->fetch('order_work_sign');
    }
		/*
		*师傅签到ajax
		*/
	public function order_work_signajax()
    {	
		$param = input();
		$order = new OrderclientModel();
		$flag = $order->getworkSignajax($param);
		return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
		
    }
		/*
		*师傅签退
		*/
	public function order_work_outsign($id)
    {
		
		$order = new OrderclientModel();
		$this->assign('orderworksign',$order->getworkStatus($id));
		return $this->fetch('order_work_outsign');
    }
		/*
		*师傅签退ajax
		*/
	public function order_work_outsignajax()
    {	
		$param = input();
		$order = new OrderclientModel();
		$flag = $order->getworkSignoutajax($param);
		return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
		
    }
	
		/*
		*客户订单单个删除
		*/
	public function del_ser()
    {
        $id = input('param.id');
        $ad = new OrderclientModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
	
		/*
		*客户订单全选删除
		*/
	public function del_sers()
    {
        $id = input('param.id');
        $ad = new OrderclientModel();
        $flag = $ad->delSers($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
	
		/*
		*师傅订单删除
		*/
	public function del_wor()
    {
        $id   = input('param.id');
        $ad   = new OrderclientModel();
        $flag = $ad->delWor($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
		/*
		*师傅订单全选删除
		*/
	public function del_wors()
    {
        $id   = input('param.id');
        $ad   = new OrderclientModel();
        $flag = $ad->delWors($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
	
	
	
	
	
	
	
	
	
}
