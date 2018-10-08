<?php

namespace app\common\model;
use think\Model;
use think\Db;

class Set extends Model{
	//获取客户订单状态
	public static function setOrderGeneralMasterCommentStatus($where){

		return Db::name('common_master')->where($where)->setField('comment_status',1);
	}
}