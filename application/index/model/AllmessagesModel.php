<?php

namespace app\index\model;
use think\Model;
use think\Db;

class AllmessagesModel extends Model
{
    protected $name = 'message_reminder';
	
	public function  getOrderWhere($map, $Nowpage, $limits,$uid){
		
			
			$ds_where['a.receive_id']=$uid;
			$ds_where['a.message_type']='1';
			$join = [
				['bj_users b','b.id = a.source_id','LEFT']
			];
			$field='a.*,b.img as bimg';
			return $this->alias('a')->field($field)->join($join)->where($map)->where($ds_where)->page($Nowpage, $limits)->order('a.id desc')->select();
	}
	
	public function  getOrderWheres($map, $Nowpage, $limits,$uid){
		
			
			$ds_where['a.receive_id']=$uid;
			$ds_where['a.message_type']='2';
			$join = [
				['bj_users b','b.id = a.source_id','LEFT']
			];
			$field='a.*,b.img as bimg';
			return $this->alias('a')->field($field)->join($join)->where($map)->where($ds_where)->page($Nowpage, $limits)->order('a.id desc')->select();
		
		
	}
	
	public function delSer($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '消息删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	
	
	

   

    
}