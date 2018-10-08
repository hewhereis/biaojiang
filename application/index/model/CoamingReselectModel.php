<?php
namespace app\index\model;
use think\Model;
use think\Db;
class CoamingReselectModel extends Model{
	public function coaming_reselect($order_number){ 

	     $arr = Db::name('orders')->where('order_number',$order_number)->find();
	     $arrs = Db::name('orders_coaming')->where('order_number',$order_number)->find();
         //生成新的订单号  
	     $stime=date('YmdHis',time());
	     $rand=rand(1,99999);
	     $orders = $order_number=$stime."".$rand;
         //改变orders表的字段
	     $arr['id']='';
	     $arr['order_number']=$orders;
	     $arr['worker_id']="";
	     $arr['pay']='';
	     $arr['reason']='';
	     $arr['amount_engineer']="";
		 $arr['num'] = "";
	     Db::name('orders')->insertGetId($arr);
	     /**
	      * 安装附表
	      */
         $arrs['id'] = '';
         $arrs['order_number'] =$orders;
         $arrs['tender_cost'] = '';
         $list = Db::name('orders_coaming')->insertGetId($arrs);
        if(!empty($list)){  
           return ['code' => 200, 'data' => '', 'number' =>$orders ];                          
        }else{       
           return ['code' => 0, 'data' => '', 'number' => '-1'];      
        }
   }
}