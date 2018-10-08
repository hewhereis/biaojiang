<?php
namespace app\index\model;
use think\Model;
use think\Db;
class ReselectModel extends Model{
   public function reselects($order_number){
     $arr = Db::name('orders')->where('order_number',$order_number)->find();
 
     $arrs = Db::name('orders_maintain')->where('order_number',$order_number)->select();
     $stime=date('YmdHis',time());
     $rand=rand(1,99999);
     $orders = $order_number=$stime."".$rand;

    $arr['id']='';
    $arr['order_number']=$orders;
    $arr['worker_id']="";
    $arr['pay']='';
    $arr['reason']='';
    $arr['amount_engineer']="";
    $arr['num'] = "";
    Db::name('orders')->insertGetId($arr);
     /**
      * 维修附表
      */
   foreach ($arrs as  $v) {
      $v['id'] = '';
      $v['order_number'] =$orders;
      $v['tender_cost'] = '';
       $list = Db::name('orders_maintain')->insertGetId($v);
   }
     if(!empty($list)){
                
                return ['code' => 200, 'data' => '', 'number' =>$orders ];
                                     
            }else{
                    
                return ['code' => 0, 'data' => '', 'number' => '-1'];
                    
            }

   }
}