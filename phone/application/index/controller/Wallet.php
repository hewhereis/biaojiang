<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/22/022
 * Time: 13:04
 */

namespace app\index\controller;


use think\Db;

class Wallet extends Base
{
public function index(){
    $id=session("id");
     $res=   Db::name("users")->where("id",$id)->field("balance")->find();

    $mingxi['orders']= Db::name("orders")->where("owner_id",$id)->select();
    $mingxi['guarantee']= Db::name("guarantee")->where("uid",$id)->select();
    if(!empty($mingxi['orders'])){
        foreach ($mingxi['orders'] as $index=>$value) {
            $mingxi['orders'][$index]['order_time']=date('Y-m-d H:i:s',  $value['order_time']);
        }
    }
    if(!empty($mingxi['guarantee'])){
        foreach ($mingxi['guarantee'] as $index=>$value) {
            $mingxi['guarantee'][$index]['create_time']=date('Y-m-d H:i:s',  $value['create_time']);
        }
    }
    $this->assign("mingxi1",json_encode($mingxi['orders']));
    $this->assign("mingxi2",json_encode($mingxi['guarantee']));
    $this->assign("balance",$res['balance']);
    return $this->fetch("index");
}

    public function index1(){
        $id=session("id");
        $res=   Db::name("users")->where("id",$id)->field("balance")->find();
        $mingxi['orders']= Db::name("orders")->where("owner_id",$id)->select();
        $mingxi['guarantee']= Db::name("guarantee")->where("uid",$id)->select();
        if(!empty($mingxi['orders'])){
            foreach ($mingxi['orders'] as $index=>$value) {
                $mingxi['orders'][$index]['order_time']=date('Y-m-d H:i:s',  $value['order_time']);
            }
        }
        if(!empty($mingxi['guarantee'])){
            foreach ($mingxi['guarantee'] as $index=>$value) {
                $mingxi['guarantee'][$index]['create_time']=date('Y-m-d H:i:s',  $value['create_time']);
            }
        }
        $this->assign("mingxi1",json_encode($mingxi['orders']));
        $this->assign("mingxi2",json_encode($mingxi['guarantee']));
        $this->assign("balance",$res['balance']);
        return $this->fetch("index1");
    }

    public function index2(){
        $ids=input("post.id");
        $id=session("id");
        $res=   Db::name("users")->where("id",$id)->field("balance")->find();
       if($ids==2){
           $mingxi['orders']= Db::name("orders")->where("owner_id",$id)->where('amount_total','gt',0)->select();
           $mingxi['guarantee']= Db::name("guarantee")->where("uid",$id)->where('guarantee','gt',0)->select();
       }else{
           $mingxi['orders']= Db::name("orders")->where("owner_id",$id)->where('amount_total','lt',0)->select();
           $mingxi['guarantee']= Db::name("guarantee")->where("uid",$id)->where('guarantee','lt',0)->select();
       }

        if(!empty($mingxi['orders'])){
            foreach ($mingxi['orders'] as $index=>$value) {
                $mingxi['orders'][$index]['order_time']=date('Y-m-d H:i:s',  $value['order_time']);
            }
        }
        if(!empty($mingxi['guarantee'])){
            foreach ($mingxi['guarantee'] as $index=>$value) {
                $mingxi['guarantee'][$index]['create_time']=date('Y-m-d H:i:s',  $value['create_time']);
            }
        }
        if($mingxi){
            $data=["code"=>200,"msg"=>"请求成功","data1"=>$mingxi['orders'],"data2"=>$mingxi['guarantee']];
        }else{
            $data=["code"=>400,"msg"=>"请求失败"];
        }
        return json($data);
    }

    public function index3(){

      return $this->fetch("index3");
    }
    public function index4(){

        return $this->fetch("index4");
    }

    public function index5(){
        $id=session("id");
      $res=  Db::name("order_comments")->where("uid",$id)->select();
        foreach ($res as $index=>$value) {
            $we=$value['order_id'];
            $ress=  Db::name("orders")->where("order_number",$we)->field('service_type_id')->find();
            $res[$index]['service_type_id']=$ress['service_type_id'];
            $res[$index]['create_time']=date('Y-m-d',  $value['create_time']);
            $res[$index]['work_speed']=round($value['work_speed']);
            $res[$index]['work_quality']=round($value['work_quality']);
            $res[$index]['service_attitude']=round($value['service_attitude']);

        }
//        credit_score
       $this->assign("res",json_encode($res));
        return $this->fetch("index5");
    }

    public function index6(){
        $id=session("id");
        $res=  Db::name("complaint")->where("uid",$id)->select();
        foreach ($res as $index=>$value) {
            $res[$index]['time']=date('Y-m-d H:i:s',  $value['time']);
        }

        $this->assign("res",json_encode($res));
        return $this->fetch("index6");
    }

    public function index7(){
        $id=session("id");


        return $this->fetch("index7");
    }

    public function index8(){


        return $this->fetch("index8");
    }

    public function index9(){
        return $this->fetch("index9");
    }

    public function index10(){
        return $this->fetch("index10");
    }

    public function index11(){

        return $this->fetch("index11");
    }
     public function index12(){

        return $this->fetch("index12");
    }
    public function index_home(){
        $id=session("id");
        $res=   Db::name("users")->where("id",$id)->field("balance")->find();
        $resr=   Db::name("users_worker")->where("uid",$id)->field("guarantee")->find();
        $this->assign("balance",$res['balance']);
        $this->assign("guarantee",$resr['guarantee']);
        return $this->fetch("index_home");
    }
    public function index13(){
        $id=session("id");
        $resr=   Db::name("users_worker")->where("uid",$id)->field("guarantee")->find();
        $this->assign("guarantee",$resr['guarantee']);
        return $this->fetch("index_home1");
    }
    public function index14(){
        $uid = session('id');
        $this->assign('uid',$uid);
        return $this->fetch("index_home2");
    }
    public function index15(){
        $uid = session('id');
        $this->assign('uid',$uid);
        return $this->fetch("index15");
    }
}