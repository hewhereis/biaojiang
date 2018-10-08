<?php
// +----------------------------------------------------------------------
// | 
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://bj-wang.com All rights reserved.
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | Author: <@bj-wang.com>
// +----------------------------------------------------------------------
namespace app\index\controller;
use think\Controller;
use think\Db;

class Touching extends Base{

	public function touching($orderIds){

		$orderids = $orderIds;	//接收传入进来的订单号
		// 在订单主表找到该订单是否需要核单报告
		$is_bomb= Db::name('orders')->where('order_number',$orderids)->value('is_bomb');

		if($is_bomb == 1){
			$p = null;
			$list = Db::name('touching_report')->where('order_number',$orderids)->select();
			if($list){
				$where = ['order_number'=>$orderids]; // 设置查找条件
				$tou = Db::name('orders_maintain')->where($where)->select(); // 找出数据
				foreach ($tou as $k1 => $v1) {
					$tou[$k1]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k1]['service_type_id'])->value('name'); // 找出对应的名称
					$l1_where = ['id'=>$tou[$k1]['l1_category_id']];	// 设置查找2级分类的名称的条件
					$tou[$k1]['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou[$k1]["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称
					$l2_where = ['id' => $tou[$k1]['l2_category_id']];
					$tou[$k1]['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou[$k1]["l1_category_id"]}',c_id)")->value('name');//设置该类别3级名称
				}
				foreach($list as $key=>$val){
					$tou[$key]['content'] = $val['content'];
					$tou[$key]['imagesids'] = $val['imagesids'];
					$tou[$key]['signature_id'] = $val['signature_id'];
				}
				$p = 1;
			}else{
				$where = ['order_number'=>$orderids]; // 设置查找条件
				$tou = Db::name('orders_maintain')->where($where)->select(); // 找出数据
				foreach ($tou as $k => $v) {
					$tou[$k]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k]['service_type_id'])->value('name'); // 找出对应的名称
					$l1_where = ['id'=>$tou[$k]['l1_category_id']];	// 设置查找2级分类的名称的条件
					$tou[$k]['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou[$k]["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称
					$l2_where = ['id' => $tou[$k]['l2_category_id']];
					$tou[$k]['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou[$k]["l1_category_id"]}',c_id)")->value('name');//设置该类别3级名称
				}
			}
			
		}else{
			exit;
		}
		$owner_id = Db::name('orders')->where('order_number',$orderIds)->value('owner_id');
		$this->assign('p',$p);
		$this->assign('ordernumber',$orderIds);
		$this->assign('owner_id',$owner_id);
 		$this->assign('tou',$tou);
		return $this->fetch();
	}

	public function touchingAdd(){
		$param = input();
		
		foreach($param['ids'] as $k=>$p){
				$key = $p;
				$info[$k]['o_m_ids'] = $p;
				$info[$k]['imagesids'] = $param['imagsids_'.$key];
				$info[$k]['order_number'] = $param['order_number'];
				$info[$k]['signature_id'] = $param['qianming'];
				$info[$k]['create_time'] = time();
		}
		foreach($param['guzhanginfo'] as $is => $pp){
					$info[$is]['content']= $pp;
		}
		
		$list = Db::name('touching_report')->where('order_number',$info[0]['order_number'])->select();
		if($list){
			foreach ($info as $value) {
				$s = Db::name('touching_report')->where('order_number',$value['order_number'])->where('o_m_ids',$value['o_m_ids'])->setField($value);
			}
			
			 $step = Db::name('orders')->where('order_number',$info[0]['order_number'])->field('step_type,service_type_id')->find();
			 $where['order_number'] = $info[0]['order_number'];
			 if($step['service_type_id']==2){//维修改状态
                 if($step['step_type']==1){   
				 $map['work_step_service']='1';
				 $map['work_step_number']='4';
				 Db::name('orders')->where($where)->update($map);	
	             }else if($step['step_type']==2){
	             $map['work_step_service']='2';
				 $map['work_step_number']='7';
				 Db::name('orders')->where($where)->update($map);		
	             }
			 }else if($step['service_type_id']==1){//安装该状态
                 if($step['step_type']==3){   
				 $map['work_step_service']='3';
				 $map['work_step_number']='4';
				 Db::name('orders')->where($where)->update($map);	
	             }else if($step['step_type']==4){
	             $map['work_step_service']='4';
				 $map['work_step_number']='7';
				 Db::name('orders')->where($where)->update($map);		
	             }
			 }else if($step['service_type_id']==6){//围板搭建
                 if($step['step_type']==8){   
				 $map['work_step_service']='8';
				 $map['work_step_number']='4';
				 Db::name('orders')->where($where)->update($map);	
	             }else if($step['step_type']==9){
	             $map['work_step_service']='9';
				 $map['work_step_number']='7';
				 Db::name('orders')->where($where)->update($map);		
	             }
			 }else if($step['service_type_id']==5){//更换灯片状态
                        if($step['step_type']==6){
                            $map['work_step_service']='6';
                            $map['work_step_number']='4';
                            Db::name('orders')->where($where)->update($map);
                        }else if($step['step_type']==7){
                            $map['work_step_service']='7';
                            $map['work_step_number']='7';
                            Db::name('orders')->where($where)->update($map);
                        }
                    }
			
		
			
		}else{
			foreach ($info as $value) {
				$s = Db::name('touching_report')->insert($value);
			}
			$step = Db::name('orders')->where('order_number',$info[0]['order_number'])->field('step_type,service_type_id')->find();
			 $where['order_number'] = $info[0]['order_number'];
			 if($step['service_type_id']==2){//维修改状态
                  if($step['step_type']==1){   
					 $map['work_step_service']='1';
					 $map['work_step_number']='4';
					 Db::name('orders')->where($where)->update($map);	
		            }else if($step['step_type']==2){
		             $map['work_step_service']='2';
					 $map['work_step_number']='7';
					 Db::name('orders')->where($where)->update($map);		
		           }
			 }else if($step['service_type_id']==1){//安装改状态
                  if($step['step_type']==3){   
					 $map['work_step_service']='3';
					 $map['work_step_number']='4';
					 Db::name('orders')->where($where)->update($map);	
		            }else if($step['step_type']==4){
		             $map['work_step_service']='4';
					 $map['work_step_number']='7';
					 Db::name('orders')->where($where)->update($map);		
		           }
			 }else if($step['service_type_id']==6){//围板搭建
                  if($step['step_type']==8){   
					 $map['work_step_service']='8';
					 $map['work_step_number']='4';
					 Db::name('orders')->where($where)->update($map);	
		            }else if($step['step_type']==9){
		             $map['work_step_service']='9';
					 $map['work_step_number']='7';
					 Db::name('orders')->where($where)->update($map);		
		           }
			 }else if($step['service_type_id']==5){//更换灯片状态
                        if($step['step_type']==6){
                            $map['work_step_service']='6';
                            $map['work_step_number']='4';
                            Db::name('orders')->where($where)->update($map);
                        }else if($step['step_type']==7){
                            $map['work_step_service']='7';
                            $map['work_step_number']='7';
                            Db::name('orders')->where($where)->update($map);
                        }
                    }
		}
		
		if($s){
			$ds_url= \think\Config::get('view_replace_str');
			$this->success('保存成功',$ds_url['__PUBLIC__'].'orders/master');
			// $this->redirect($ds_url['__PUBLIC__'].'orders/master');
		}
}
	public function uplatetouching($order_number){
		$orderNumber = $order_number;
		$is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb'); 
		if($is_bomb == 1){
			$where = ['order_number'=>$orderNumber]; // 设置查找条件
			$tou = Db::name('orders_maintain')->where($where)->select(); // 找出数据
			foreach ($tou as $k => $v) {
				$tou[$k]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k]['service_type_id'])->value('name'); // 找出对应的名称
				$l1_where = ['id'=>$tou[$k]['l1_category_id']];	// 设置查找2级分类的名称的条件
				$tou[$k]['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou[$k]["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称
				$l2_where = ['id' => $tou[$k]['l2_category_id']];
				$tou[$k]['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou[$k]["l1_category_id"]}',c_id)")->value('name');//设置该类别3级名称
			}
		}else{
			$this->success('index/index');
			return ;
		}

		$list = Db::name('touching_report')->where('order_number',$orderNumber)->select();
		foreach($list as $key=>$value){
			$list[$key]['imagesids'] = explode(',',$list[$key]['imagesids']);
			foreach ($list[$key]['imagesids'] as $k => $v) {
				$list[$key]['imagesids'][$k]=Db::name('imgs')->where('id',$v)->value('image');
			}
		}
		foreach ($tou as $x => $y) {
			$list[$x]['l1_category_name'] = $y['l1_category_name'];
			$list[$x]['l2_category_name'] = $y['l2_category_name'];
		}
		$this->assign('list',$list);
	
		return $this->fetch();
	}

	public function client_touching($order_number){
		$l = Db::name('touching_report')->where('order_number',$order_number)->select();
		if($l){
			$orderNumber = $order_number;
			$is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb'); 
			if($is_bomb == 1){
				$where = ['order_number'=>$orderNumber]; // 设置查找条件
				$tou = Db::name('orders_maintain')->where($where)->select(); // 找出数据
				foreach ($tou as $k => $v) {
					$tou[$k]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k]['service_type_id'])->value('name'); // 找出对应的名称
					$l1_where = ['id'=>$tou[$k]['l1_category_id']];	// 设置查找2级分类的名称的条件
					$tou[$k]['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou[$k]["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称
					$l2_where = ['id' => $tou[$k]['l2_category_id']];
					$tou[$k]['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou[$k]["l1_category_id"]}',c_id)")->value('name');//设置该类别3级名称
				}
			}else{
				$this->success('index/index');
				return ;
			}
	
			$list = Db::name('touching_report')->where('order_number',$orderNumber)->select();
			// foreach($list as $key=>$value){
			// 	$list[$key]['imagesids'] = explode(',',$list[$key]['imagesids']);
			// 	foreach ($list[$key]['imagesids'] as $k => $v) {
			// 		$list[$key]['imagesids'][$k]=Db::name('imgs')->where('id',$v)->value('image');
			// 	}
			// }
			foreach ($tou as $x => $y) {
				$list[$x]['l1_category_name'] = $y['l1_category_name'];
				$list[$x]['l2_category_name'] = $y['l2_category_name'];
			}
			// var_dump($list);
			$this->assign('list',$list);
			$this->assign('imgurl',Db::name('signature')->where('id',$list[0]['user_signature_id'])->where('order_number',$list[0]['order_number'])->value('image'));
			return $this->fetch();
		}else{
			echo "师傅还没提交";
		}
	

		}
		public function client_submit(){
			if(request()->isAjax()){
				$flag = Db::name('touching_report')->where('order_number',input('post.order_number'))->setField('user_signature_id',input('post.user_signature_id'));
				if($flag){
					$step = Db::name('orders')->where('order_number', input('post.order_number'))->field('step_type,service_type_id')->find();
					 $where['order_number'] = input('post.order_number');
					if($step['service_type_id']==2){//维修改状态
                       if($step['step_type']==1){   
						 $map['work_step_service']='1';
						 $map['work_step_number']='5';
						 Db::name('orders')->where($where)->update($map);	
						 }else if($step['step_type']==2){
						 $map['work_step_service']='2';
						 $map['work_step_number']='8';
						 Db::name('orders')->where($where)->update($map);		
						 }
					}else if($step['service_type_id']==1){//安装改状态
                        if($step['step_type']==3){   
						 $map['work_step_service']='3';
						 $map['work_step_number']='5';
						 Db::name('orders')->where($where)->update($map);	
						 }else if($step['step_type']==4){
						 $map['work_step_service']='4';
						 $map['work_step_number']='8';
						 Db::name('orders')->where($where)->update($map);		
						 }
					}else if($step['service_type_id']==6){//围板搭建
                         if($step['step_type']==8){   
						 $map['work_step_service']='8';
						 $map['work_step_number']='5';
						 Db::name('orders')->where($where)->update($map);	
						 }else if($step['step_type']==9){
						 $map['work_step_service']='9';
						 $map['work_step_number']='8';
						 Db::name('orders')->where($where)->update($map);		
						 }
					}else if($step['service_type_id']==5){//更换灯片状态
                        if($step['step_type']==6){
                            $map['work_step_service']='6';
                            $map['work_step_number']='5';
                            Db::name('orders')->where($where)->update($map);
                        }else if($step['step_type']==7){
                            $map['work_step_service']='7';
                            $map['work_step_number']='8';
                            Db::name('orders')->where($where)->update($map);
                        }
                    }
					
					return json(['code'=>200,'data'=>'','msg'=>'提交成功']);
				}
			}else{
				exit;
			}
		}

}