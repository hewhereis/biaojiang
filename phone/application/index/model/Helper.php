<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20/020
 * Time: 9:38
 */

namespace app\index\controller;
use think\Db;
use app\index\model\MasterModel;
use app\index\model\RepairModel;
use app\index\controller\Api;
use app\index\model\ConsultModel;
class Helper extends Base
{
//    找帮手师傅
    public function index(){
        $order=input('post.order');
        $num=input('post.num');
        $data=['num'=>$num];
      $result=  Db::name("orders")->where('order_number',$order)->update($data);
     if($result){
         $data=["code"=>200,"msg"=>"请求成功"];
     }else{
         $data=["code"=>400,"msg"=>"不能重复上次找师傅个数"];
     }
     return json($data);
    }
//    找帮手师父
    public function helper1($order,$wid)
    {
       $api= new Api();
      $work_skills= $api->work_skillw();
      $wa=  session("id");
        $this->assign("work_skills", json_encode($work_skills));
        $this->assign("wid", $wid);
        $this->assign("wa", $wa);
        $this->assign("order", $order);
        $results = Db::name("common_master")->where("order_number", '=', $order)->where("d_worker_id",'=',session("id"))->select();
        $resultsr = Db::name("common_master")->where("order_number", '=', $order)->where("d_worker_id",'=',session("id"))->where("worker_id",$wid)->find();

        if($resultsr){
            $zhuangf=1;
        }else{
            $zhuangf=0;
        }
        if ($results) {
            $this->assign("results", json_encode($results));
            $this->assign('shichang',$resultsr['working_hours']);
            $this->assign('xuqiu',$resultsr['cost']);
            $this->assign('jine',$resultsr['skill']);
            $this->assign('jieshi',$resultsr['need']);
        } else {
            $this->assign("results", json_encode([]));
            $this->assign('shichang','');
            $this->assign('xuqiu','');
            $this->assign('jine','');
            $this->assign('jieshi','');
        }
        $param = input();
        if (empty($param['start'])) {
            $getmaster = new MasterModel();
            $masters = $getmaster->master_information($wid);//师傅个人资料
            $master = new Api();
            $master = $master->all_score($wid);//师傅的综合评分
            $this->assign('master', json_encode($master));
            $this->assign('masters', json_encode($masters));
            $this->assign('zhuangf',$zhuangf);



            return $this->fetch("index");
        }

    }
//    验证帮手师父
    public function helper2(){
        $wid=input("post.wid");
        $where["type"]="2";
        $where["status"]="1";
        $where["is_sign"]="1";
        $where["id"]=$wid;
        $res=Db::name("users")->where($where)->select();
        if($res){
            $getmaster = new MasterModel();
            $masters = $getmaster->master_information($wid);//师傅个人资料
            $master = new Api();
            $master = $master->all_score($wid);//师傅的综合评分
            if($masters){
                $data=['code'=>200,"msg"=>"验证成功","data"=>["data1"=>$masters,"data2"=>$master]];
            }
        }
       else{
           $data=['code'=>400,"msg"=>"验证失败,没有该师傅"];
       }
       return json($data);
    }
//    邀请帮手师父
    public function helper3(){
        $parme=input('post.');
     $red=   Db::name("common_master")->where("order_number",$parme['order_number'])->where("d_worker_id",session("id"))->where("worker_id",$parme['worker_id'])->find();
     if(empty($red)){
         $data=["d_worker_id"=>session("id"),"worker_id"=>$parme['worker_id'],"working_hours"=>$parme['working_hours'],"cost"=>$parme['cost'],"skill"=>$parme['skill'],"need"=>$parme['need'],"order_number"=>$parme['order_number']];
         $res=   Db::name("common_master")->insert($data);
         if($res){
             $data=['code'=>200,"msg"=>"邀请成功"];
         }
     }else{
        if($red['status']==0){
            $data=['code'=>200,"msg"=>"你已经邀请师傅,师傅还没同意"];
        }else if($red['status']==1){
            $data=['code'=>200,"msg"=>"你已经邀请了师傅,师傅已近同意了"];
        }else if($red['status']==2){
            $data=['code'=>200,"msg"=>"你已经邀请了师傅,师傅拒绝你的邀请"];
        }

     }
     return json($data);


    }
//    删除帮手师父
    public function helper4(){
        $parme=input('post.');
        $red=   Db::name("common_master")->where("order_number",$parme['order_number'])->where("d_worker_id",session("id"))->where("worker_id",$parme['worker_id'])->delete();
       if($red){
           $data=['code'=>200,"msg"=>"删除成功"];
       }else{
           $data=['code'=>400,"msg"=>"你还没有师父"];
       }
       return $data;
    }
//    普通师父接单
 public function helper5($order,$wid){

     $resultsr = Db::name("common_master")->where("status","=",0)->where("order_number", '=', $order)->where("d_worker_id",'=',$wid)->where("worker_id",session("id"))->find();

     $data= Db::name('orders')->where('order_number','=',$order)->where('worker_id','=',$wid)->field('service_type_id,full_location,start_time,contact_name,owner_id,num,owner_name')->find();
     $ConsultModel=  new  ConsultModel();
     $result= $ConsultModel->consult1($order,$data['service_type_id']);
     $api=new Api();
     if($result){
         $data['start_time']=date('Y-m-d',$data['start_time']);
         $data['brand']= $api->brasn($result[0]['brand']);
     };
     $this->assign("resultsr",$resultsr);
     $this->assign("result",json_encode($result));
     $this->assign("data",$data);
     $this->assign("order",$order);
     $this->assign("wid",$wid);
     if(empty($data)){
         return "没有师父邀请你";
     }else{
         return $this->fetch("helper5");
     }

 }

// 同意接单和拒绝接单
public function helper6(){
    $data=input('post.');
    $order=$data['order'];
    $wid=$data['wid'];
if($data['ids']==1){
    $updata['status']=1;
}else{
    $updata['status']=2;
}
$res=Db::name("common_master")->where("")->where("order_number", '=', $order)->where("d_worker_id",'=',$wid)->where("worker_id",session("id"))->update($updata);
    if($res){
        if($data['ids']==1){
            $data=["code"=>200,"msg"=>"接受成功"];
        }else{
            $data=["code"=>200,"msg"=>"拒绝成功"];
        }

    }else{
        if($data['ids']==1){
            $data=["code"=>400,"msg"=>"已经接受了"];
        }else{
            $data=["code"=>400,"msg"=>"己经决绝了"];
        }
    }
    return json($data);
}
}