<?php
// +----------------------------------------------------------------------
// | 安装核单报告
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://bj-wang.com All rights reserved.
// +----------------------------------------------------------------------
// |2017-10-14
// +----------------------------------------------------------------------
// | Author: <@bj-wang.com>
// +----------------------------------------------------------------------
namespace app\index\controller;
use think\Controller;
use think\Db;
class Single extends Base{
	/**
	 * 安装核单报告
	 */
	public function install_touching($orderIds){
         $orderids = $orderIds;	//接收传入进来的订单号
         // 在订单主表找到该订单是否需要核单报告
		$is_bomb= Db::name('orders')->where('order_number',$orderids)->value('is_bomb');
		if($is_bomb == 1){
			$p = null;
			$list = Db::name('touching_report')->where('order_number',$orderids)->find();
			if($list){
				$where = ['order_number'=>$orderids]; // 设置查找条件
				$tou = Db::name('orders_install')->where($where)->find(); // 找出数据
				
					$tou['service_type_id_name'] = Db::name('service')->where('id',$tou['service_type_id'])->value('name'); // 找出对应的名称
					$l1_where = ['id'=>$tou['category']];	// 设置查找2级分类的名称的条件
					$tou['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称
					$l2_where = ['id' => $tou['commodity']];
					$tou['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou["category"]}',c_id)")->value('name');//设置该类别3级名称
				
				
					// $list[$key]['service_type_id_name']=$tou[$k1]['service_type_id_name'];
					// $list[$key]['l1_category_name']=$tou[$k1]['l1_category_name'];
					// $list[$key]['l2_category_name']=$tou[$k1]['l2_category_name'];
					$tou['content'] = $list['content'];
					$tou['imagesids'] = $list['imagesids'];
					$tou['signature_id'] = $list['signature_id'];
				
				$p = 1;
			}else{
				$where = ['order_number'=>$orderids]; // 设置查找条件
				$tou = Db::name('orders_install')->where($where)->find(); // 找出数据
                
					$tou['service_type_id_name'] = Db::name('service')->where('id',$tou['service_type_id'])->value('name'); // 找出对应的名称
					$l1_where = ['id'=>$tou['category']];	// 设置查找2级分类的名称的条件

					$tou['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称

					$l2_where = ['id' => $tou['commodity']];

					$tou['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou["category"]}',c_id)")->value('name');//设置该类别3级名称
			}
			
		}else{
			exit;
		}
		$owner_id = Db::name('orders')->where('order_number',$orderIds)->value('owner_id');
		$this->assign('p',$p);
		$this->assign('ordernumber',$orderIds);
		$this->assign('owner_id',$owner_id);
 		$this->assign('tou',$tou);
		return $this->fetch('install_touching');
	}
	/**
	 * 更新核单报告
	 */
	public function install_uplatetouching($order_number){
		$orderNumber = $order_number;
		$is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb'); 
		if($is_bomb == 1){
			$where = ['order_number'=>$orderNumber]; // 设置查找条件
			$tou = Db::name('orders_install')->where($where)->select(); // 找出数据
			foreach ($tou as $k => $v) {
				$tou[$k]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k]['service_type_id'])->value('name'); // 找出对应的名称
				$l1_where = ['id'=>$tou[$k]['category']];	// 设置查找2级分类的名称的条件
				$tou[$k]['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou[$k]["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称
				$l2_where = ['id' => $tou[$k]['commodity']];
				$tou[$k]['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou[$k]["category"]}',c_id)")->value('name');//设置该类别3级名称
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
		
		return $this->fetch('install_uplatetouching');
	}
	/**
	 * 客户看到师傅填写的核单
	 */
	public function install_client_touching($order_number){
		$l = Db::name('touching_report')->where('order_number',$order_number)->select();
		if($l){
			$orderNumber = $order_number;
			$is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb'); 
			if($is_bomb == 1){
				$where = ['order_number'=>$orderNumber]; // 设置查找条件
				$tou = Db::name('orders_install')->where($where)->select(); // 找出数据
				foreach ($tou as $k => $v) {
					$tou[$k]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k]['service_type_id'])->value('name'); // 找出对应的名称
					$l1_where = ['id'=>$tou[$k]['category']];	// 设置查找2级分类的名称的条件
					$tou[$k]['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou[$k]["service_type_id"]}',s_id)")->value('name'); //设置该类别2级名称
					$l2_where = ['id' => $tou[$k]['commodity']];
					$tou[$k]['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou[$k]["category"]}',c_id)")->value('name');//设置该类别3级名称
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
			return $this->fetch('install_client_touching');
		}else{
			echo "师傅还没提交";
		}

		}
}