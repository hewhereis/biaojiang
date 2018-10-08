<?php
namespace app\index\model;
use think\Model;
use think\Db;
class AllinformationModel extends Model
{
    protected  $name='message_reminder';
    public function getOrderWhere($Nowpage,$limits,$uid)
    {
       $map['a.receive_id']=$uid;
       $map['a.message_type']='1';
       $join=[
           ['bj_users b','b.id=a.source_id','LEFT']
       ];
       $field='a.*,b.img as bimg';
       return $this->alias('a')->field($field)->join($join)->where($map)->page($Nowpage,$limits)->order('a.id desc')->select();
    }


   public function delser($id){

       try{
        $this->where('id',$id)->delete();
          return['code'=>1, 'data'=>'','msg'=>'消息删除成功'];
       }catch(PDOException $e){
          return['code'=>0,'data'=>'','msg'=>$e->getmessage()];   
       }
   }

	
	
	
	
	
	
	
	
	
}
