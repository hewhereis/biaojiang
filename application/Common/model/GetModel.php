<?php

namespace app\Common\model;
use think\Model;
use think\Session;

class GetModel extends Model{
	//获取客户订单状态
	public static function getOrdersStatus($order_number){
		return Orders::getOrderStatus($order_number);
	}

	//获取师傅订单状态
	public static function getOrdersMasterStatus($order_number){
		return Orders::getOrdersMasterStatus($order_number);
	}

	//获取主任师傅id
	public static function getOrdersMaster($order_number){
		return Orders::getOrderMaster($order_number);
	}

	//获取订单创建者id
	public static function getOrderClient($order_number){
		return Orders::getOrderClient($order_number);
	}

	//获取一个师傅的名字
	public static function getUser($worker_id,$one){
		
		return User::getUser($worker_id,$one);
	}
	//获取当前用户id
	public static function getSessionId(){
		return Session::get('id');
	}
	// 获取订单内的主任师傅id
	public static function getOrderMasterId($order_number){
		return Orders::getOrderMasterId($order_number);
	}

	// 获取订单内的主任师傅id
	public static function getOrderMasterWorker($order_number){
		return Orders::getOrderMasterWorker($order_number);
	}

	// 获取订单内的所有普通师傅
	public static function getGeneralMaster($order_number,$id){
		return Orders::getGeneralMaster($order_number,$id);
	}

	// 获取订单内的普通师傅的评论状态
	public static function getOrderGeneralMasterCommentStatus($order_number,$id,$worker_id){
		return Orders::getOrderGeneralMasterCommentStatus($order_number,$id,$worker_id);
	}
}