<?php
namespace app\common\model;
use think\Model;
use think\Db;

class Orders extends Model{
    protected $autoWriteTimestamp=true;

    protected function setOrderNumberAttr($value){
        $stime=date('YmdHis',time());
        $rand=rand(1,99999);
        return $stime."".$rand;
    }

    protected function setOwnerIdAttr(){
        return session('id');
    }
    
    protected function setOwnerNameAttr(){
        $user=getUserInfo();
        return $user['real_name']?$user['real_name']:$user['username'];
    }
    
    protected function setFullLocationAttr(){
        $country=Location::getFullLocation(request()->post()['installation']['work_country']);
        return $country['province_name'].$country['city_name'].$country['country_name'];
    }

    //获取该订单的客户订单状态

    public static function getOrderStatus($order_number){
        return Db::name('orders')->where('order_number',$order_number)->where('owner_id',GetModel::getSessionId())->value('status');
    } 

    //获取该订单的主任师傅id
    public static function getOrderMaster($order_number){
        return Db::name('orders')->where('order_number',$order_number)->where('owner_id',GetModel::getSessionId())->value('worker_id');
    } 

    //获取订单的主任师傅id
    public static function getOrderMasterWorker($order_number){
        return Db::name('orders')->where('order_number',$order_number)->value('worker_id');
    } 

    //获取该订单的师傅订单状态id
    public static function getOrdersMasterStatus($order_number){
        return Db::name('orders')->where('order_number',$order_number)->value('master_status');
    } 

    //获取该订单的主任师傅id
    public static function getOrderMasterId($order_number){
        return Db::name('orders')->where('order_number',$order_number)->value('worker_id');
    } 

    // 获取订单内的所有普通师傅
    public static function getGeneralMaster($order_number,$id){
        return Db::name('common_master')->field('worker_id')->where('order_number',$order_number)->where('d_worker_id',$id)->where('status',1)->where('state',1)->select();
    }

    //获取订单内的订单创建者
    public static function getOrderClient($order_number){
        return Db::name('orders')->where('order_number',$order_number)->value('owner_id');
    }

    //获取订单内普通师傅的评论状态
    public static function getOrderGeneralMasterCommentStatus($order_number,$id,$worker_id){
        return Db::name('common_master')->where('order_number',$order_number)->where('worker_id',$id)->where('d_worker_id',$worker_id)->value('comment_status');
    }


}