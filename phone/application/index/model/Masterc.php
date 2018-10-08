<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/17/017
 * Time: 17:16
 */

namespace app\index\controller;
use think\Db;
use app\index\model\ConsultModel;
use app\index\controller\Api;
class Masterc extends Base

{
 public function index($order,$wid){


     $data= Db::name('orders')->where('order_number','=',$order)->where('worker_id','=',$wid)->field('service_type_id,full_location,start_time,contact_name,owner_id,num,owner_name')->find();
     $id= session('id');

     $ConsultModel=  new  ConsultModel();
     $result= $ConsultModel->consult1($order,$data['service_type_id']);
      $api=new Api();
      if($result){
          $data['start_time']=date('Y-m-d',$data['start_time']);
          $data['brand']= $api->brasn($result[0]['brand']);
      };
     $this->assign("result",json_encode($result));
     $this->assign("id",$id);
     $this->assign('data',json_encode($data));
     $this->assign('order_number',$order);
     $this->assign('num',$data['num']);
     $this->assign('owner_id',$data['owner_id']);
     $this->assign('owner_name',$data['owner_name']);
     $this->assign('usertype',"2");
     $this->assign('userid',$id);

//     头像
    $rs= $api->users($id);
     $rs1= $api->users($data['owner_id']);
     $this->assign('username',$rs['real_name']);

     $this->assign('customerimageurl',$rs1['img']);

     $this->assign('useridimageurl',$rs['img']);

     if(empty($data)){
         return "没有客户选择你";
     }else{
         return $this->fetch("index");
     }

 }
}