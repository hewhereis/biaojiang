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


        //查询数据
        $list = Db::name('offer')->where('order_number',$order)->where('worker_id',$wid)->field('tender_cost')->select();
        $api= new Api();
        $lists=array();
        $da= $api->getcash($service_type_id['worker_id']);
        foreach ($list as $index=>$value){
             foreach($value as $ke=>$va){
                 $lists[$index]=($da+1)*$va;
              }
        }
        $this->assign('list',json_encode($lists));
        $totals = Db::name('offer_total')->where('order_number',$order)->where('worker_id',$wid)->field('totals,gettime')->find();
        $this->assign('totals',$totals['totals']);
        $this->assign('gettime',$totals['gettime']);
        //查帮手师傅
        if($totals){
            $num = Db::name('orders')->where('order_number',$order)->where('worker_id',$wid)->value('num');
            $pay = Db::name('orders')->where('order_number',$order)->where('worker_id',$wid)->value('pay');
        }else{
            $num = 0;
            $pay = 0;
        }
        $this->assign('num',$num);
       $this->assign('pay',$pay);
        
        
        return $this->fetch("index");


    }
    public function consult2(){
            $order_number=input("post.order_number");
            $worker_id=input("post.worker_id");
          
             $orders = Db::name('orders')->where('order_number',$order_number)->update(['is_invitation'=>1,'worker_id'=>$worker_id,'master_status'=>2,'status'=>2,'step_number'=>5,'work_step_number'=>4]);
                if($orders){
                    $data=["code"=>200,"msg"=>"请求成功"];
                }else{
                    $data=["code"=>400,"msg"=>"请求失败"];
                }
                return json($data);
    }
    public function consult3(){

    }
    public function consult4(){

    }
    public function consult5(){

    }
    /**
     * 重选主任师傅
     */
    public function reselects(){
        $order_number = input('post.order_number');
        $ConsultModel=  new  ConsultModel();
        $flag= $ConsultModel->reselects($order_number);
        return json(['code' => $flag['code'], 'number' => $flag['number']]); 
    }
}