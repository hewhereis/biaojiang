<?php

namespace app\common\model;
use think\Model;
use think\Db;
class User extends Model{

	//获取一个字段
	public static function getUser($id,$one){
		$s = Db::name('users')->where('id',$id)->value($one);
		return $s;
	}
}