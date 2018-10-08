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
					$tou['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou["category"]}',s_id)")->value('name'); //设置该类别2级名称
					$l2_where = ['id' => $tou['commodity']];
					$tou['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou["commodity"]}',c_id)")->value('name');//设置该类别3级名称
				
				
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
					$tou['l1_category_name'] = Db::name('category')->where($l1_where)->where("find_in_set('{$tou["category"]}',s_id)")->value('name'); //设置该类别2级名称
					$l2_where = ['id' => $tou['commodity']];
					$tou['l2_category_name'] = Db::name('commodity')->where($l2_where)->where("find_in_set('{$tou["commodity"]}',c_id)")->value('name');//设置该类别3级名称
			}
		}else{
			exit;
		}
		return $this->fetch('install_touching');//2017101310011244348
	}
}