<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/17/017
 * Time: 15:40
 */

namespace app\index\controller;
use think\Db;
use app\index\controller\Api;
use app\index\model\ConsultModel;
class Consult extends Base
{
    public function consult1($order,$wid){
//        查询 订单号信息
        $api=new Api();
        $service_type_id= Db::name('orders')->where('order_number','=',$order)->field('service_type_id,owner_id,owner_name,worker_id,num')->find();
//        查询 订单号 所有信息
       $ConsultModel=  new  ConsultModel();
        $data= $ConsultModel->consult1($order,$service_type_id['service_type_id']);
        $user=Db::name("users")->where('id','=',$wid)->field("img,username")->find();

        $this->assign("img",$user['img']);
        $this->assign("data",json_encode($data));
        $this->assign("order",$order);
        $this->assign("wid",$wid);

        $this->assign('order_number',$order);
        $this->assign('worker_id',$wid);


         $id=session("id");
        $this->assign('num',$service_type_id['num']);
        $this->assign('owner_id',$service_type_id['worker_id']);
        $rs1= $api->users($service_type_id['worker_id']);
        $this->assign('owner_name',$rs1['real_name']);
        $this->assign('usertype',"1");
        $this->assign('userid',$id);
        $this->assign('username',$service_type_id['owner_name']);
        $rs= $api->users($id);
        $this->assign('customerimageurl',$rs1['img']);
        $this->assign('useridimageurl',$rs['img']);
        return $this->fetch("index");


    }
    public function consult2(){

    }
    public function consult3(){

    }
    public function consult4(){

    }
    public function consult5(){

    }
}