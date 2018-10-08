<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/17/017
 * Time: 16:31
 */

namespace app\index\model;
use think\Db;
use think\Model;
use app\index\controller\Api;

class ConsultModel   extends Model
{

        public function consult1($order,$wid){

            if($wid===1){
              $data=  Db::name("orders_install")->where("order_number",$order)->field("")->select();
            }else if($wid===2){
                $data=  Db::name("orders_maintain")->where("order_number",$order)->field("")->select();
            }else if($wid===3){
//                Db::name("orders_coaming")->where("ordere",$order)->field("")->select();
                $data=null;
            }else if($wid===4){
                $data= Db::name("orders_survey")->where("order_number",$order)->field("")->select();
            }else if($wid===5){
                $data= Db::name("replace")->where("order_number",$order)->field("")->select();
            }else if($wid===6){
                $data=  Db::name("orders_coaming")->where("order_number",$order)->field("")->select();
            }else{
                $data=null;
            }

            return $data;
        }
    public function consult2(){

    } 
    /**
     * [reselects description]
     * 重选主人师傅
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     */
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
            return ['code' => 200,  'number' =>$orders ];
        }else{
            return ['code' => 0,  'number' => '重选师傅出现点问题'];
        }
   }
}