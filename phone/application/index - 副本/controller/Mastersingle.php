<?php
namespace app\index\controller;
use think\Controller;
use think\Db; 
class Mastersingle extends Base
{
	 public  function grab_single($onumber){
		   $where['a.order_number']=$onumber;
		   $join = [
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_offer_total f','f.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT']
				 ];
		   $field='a.service_type_id,a.contact_name as uname,a.full_location as address,a.location_ext as laddress,d.comments as dcomments,e.comments as ecomments,m.comments as mcomments,
		    g.comments as gcomments,a.rob_num,a.start_time';
		   $list=Db::name("orders")->alias('a')->field($field)->join($join)->where($where)->find();
			
		   $start_time=date('Y-m-d H:i:s',$list['start_time']); 
		
		   $install_list =Db::name("orders_install")->alias('a')->field('a.id,a.order_number,a.budget,c.name')->join('bj_commodity c','c.id = a.commodity','LEFT')->where('order_number',$onumber)->select();//安装循环
		   $repair_list  =Db::name("orders_maintain")->alias('a')->field('a.id,a.order_number,a.budget,c.name')->join('bj_commodity c','c.id = a.l2_category_id','LEFT')->where('order_number',$onumber)->select();//维修循环
		   
		   
		   
		   $coaming_list =Db::name("orders_coaming")->field('id,order_number,budget')->where('order_number',$onumber)->select();//围板循环
		   $replace_list =Db::name("replace")->field('id,order_number,budget')->where('order_number',$onumber)->select();//更换循环

		   $install_sum =Db::name("orders_install")->where('order_number',$onumber)->sum('budget');//安装求和
		   $repair_sum  =Db::name("orders_maintain")->where('order_number',$onumber)->sum('budget');//维修求和
		   $coaming_sum =Db::name("orders_coaming")->where('order_number',$onumber)->sum('budget');//围板求和
		   $replace_sum =Db::name("replace")->where('order_number',$onumber)->sum('budget');//更换求和

		   $this->assign('install_list',json_encode($install_list));//赋值数据集
		   $this->assign('repair_list',json_encode($repair_list));//赋值数据集
		   $this->assign('coaming_list',json_encode($coaming_list));//赋值数据集
		   $this->assign('replace_list',json_encode($replace_list));//赋值数据集

		   $this->assign('list',$list);//赋值数据集
		   $this->assign('start_time',$start_time);
		   $this->assign('onumber',$onumber);
		   $this->assign('install_sum',$install_sum);
		   $this->assign('repair_sum',$repair_sum);
		   $this->assign('coaming_sum',$coaming_sum);
		   $this->assign('replace_sum',$replace_sum);
		   $this->assign('service_type_id',$list['service_type_id']);
		 
		 return view('mastersingle/grab_single');
	 }
	 
	 public function ds_single(){
		 $uid=session('id');
		 $onumber=input('onumber');
		 $where['order_number']=$onumber;
		 $where['worker_id']=$uid;
		 
		 $list=Db::name('orders')->where('order_number',$onumber)->field('worker_id')->find();
		 $lists=Db::name('offer_total')->where($where)->field('is_rob')->find();
		 if($list['worker_id']==0){
			 if($lists['is_rob']==0){
				 return ['code' => 200];
			 }else{
				 return ['code' => 0, 'msg' => '请勿重复抢单'];
			 }	
		 }else{
			 return ['code' => 0, 'msg' => '来晚一步订单已经被别的师傅抢走了~'];
		 }
		 
	 }
	public function grab_page($onumber){
		
		   $where['a.order_number']=$onumber;
		   $join = [
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_offer_total f','f.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT']
				 ];
		   $field='a.service_type_id,a.contact_name as uname,a.full_location as address,a.location_ext as laddress,d.comments as dcomments,e.comments as ecomments,m.comments as mcomments,
		    g.comments as gcomments,a.rob_num,a.start_time';
		   $list=Db::name("orders")->alias('a')->field($field)->join($join)->where($where)->find();
			
		   $start_time=date('Y-m-d H:i:s',$list['start_time']); 
		
		   $install_list =Db::name("orders_install")->alias('a')->field('a.id,a.order_number,a.budget,c.name')->join('bj_commodity c','c.id = a.commodity','LEFT')->where('order_number',$onumber)->select();//安装循环
		   $repair_list  =Db::name("orders_maintain")->alias('a')->field('a.id,a.order_number,a.budget,c.name')->join('bj_commodity c','c.id = a.l2_category_id','LEFT')->where('order_number',$onumber)->select();//维修循环	
		   $coaming_list =Db::name("orders_coaming")->field('id,order_number,budget')->where('order_number',$onumber)->select();//围板循环
		   $replace_list =Db::name("replace")->field('id,order_number,budget')->where('order_number',$onumber)->select();//更换循环


		   $this->assign('install_list',json_encode($install_list));//赋值数据集
		   $this->assign('repair_list',json_encode($repair_list));//赋值数据集
		   $this->assign('coaming_list',json_encode($coaming_list));//赋值数据集
		   $this->assign('replace_list',json_encode($replace_list));//赋值数据集

		   $this->assign('list',$list);//赋值数据集
		   $this->assign('start_time',$start_time);
		   $this->assign('onumber',$onumber);
		 
		   $this->assign('service_type_id',$list['service_type_id']);
		
		
		 return view('mastersingle/grab_page');
	 }
	 
	 public function grab_pageajax(){
			 $parm=input();
			 $uid=session('id');
			 $onumber=$parm['onumber'];
			 $where['order_number']=$onumber;
			 $where['worker_id']=$uid;
			 $list=Db::name('orders')->where('order_number',$onumber)->field('worker_id')->find();
			 $lists=Db::name('offer_total')->where($where)->field('is_rob')->find();
			 if($list['worker_id']==0){
				 if($lists['is_rob']==0){
                    //师傅报价加入表	
					$info = new Api();
					$getinfo = $info->getcash($uid);//平台服务费和税费
					//接受数据
					$total=null;//声明一个空变量
					foreach($parm['price'] as $key => $value){
						$total+= $value;//项目的总价钱
					}	
					foreach($parm['price'] as $key => $value){
						$data['order_number'][$key] =$onumber;
						$data['tender_cost'][$key] = $value;
						$data['worker_id'][$key] = $uid;
					}
					//数组重组
					$keys = array_keys($data);        	
			        $count1 = count($keys);
			        $count2 = count($data[$keys[0]]);        
			        for ($i=0; $i < $count2; $i++) {
			            for ($j=0; $j < $count1; $j++) {
			                $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];        
			            }
		            }
		            //加入报价单个项目表
		            foreach ($new_arr as $key => $value) {
		            	$get = Db::name('offer')->insert($value);
		            }
		           //加入项目总价表
		           $ds_info['order_number'] = $onumber;
		           $ds_info['worker_id'] = $uid;
		           $ds_info['amount_engineer'] = $total;
		           $ds_info['totals'] = $total*(1+$getinfo);//加上平台服务费和税费
			       $ds_info['is_rob'] = 1;
			       $ds_info['message'] = $parm['content'];
			       $offer_total = Db::name('offer_total')->insert($ds_info);
			       Db::name('orders')->where('order_number', $onumber)->setInc('rob_num',1);
			       if(!empty($offer_total)){
			       	 return json(['code'=>200,'msg'=>'抢单成功']);
			       }else{
			       	  return json(['code'=>0,'msg'=>'系统错误']);
			       }
				 }else{
					 return ['code' => 0, 'msg' => '请勿重复抢单'];
				 }	
			 }else{
				 return ['code' => 0, 'msg' => '来晚一步订单已经被别的师傅抢走了~'];
			 }
			

	 }
		
	
	
}	
