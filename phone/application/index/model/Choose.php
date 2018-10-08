<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15/015
 * Time: 16:16
 */

namespace app\index\controller;
use app\index\model\ChooseModel;
use think\Db;
class Choose extends Base
{
//    挑选主任师傅
    public function index($order)
    {
        $this->assign('ornumber',$order);
        return $this->fetch("index");
    }
//    随机生成师傅
    public function  roand(){
        $ordechoose=new ChooseModel();
        $list= $ordechoose->screen1();
        return json($list);
    }
//    验证师傅
    public function  yanzheng(){
        $wid=input('post.wid');
        $ordechoose=new ChooseModel();
        $list = $ordechoose->yanzheng($wid);
        return json($list);
    }
//    师傅筛选
    public function screen($order,$zt){
        $ordechoose=new ChooseModel();
        $list= $ordechoose->screen2();
        $lists= $ordechoose->screen6();
        $this->assign('lists',json_encode($lists));
        $this->assign('list',json_encode($list));
        $this->assign('order',$order);
        $this->assign('zt',$zt);
        return $this->fetch("screen");
    }
//    师傅筛选 搜索
    public function screen1(){
        $uid=input('post.data');
        $page=input('post.page');
        $data=input('post.');
        $ordechoose=new ChooseModel();
        if(empty($uid)){
            $list= $ordechoose->screen4($data);
        }else{
            $list= $ordechoose->screen3($uid,$page);
        }

        return json($list);
    }
    //    师傅筛选 AND 条件
    public function screen2(){

        $data=input('post.');
        $ordechoose=new ChooseModel();

        if(empty($data['elementID1'])&&empty($data['elementID2'])&&empty($data['elementID3'])&&empty($data['elementID4'])){
            $list= $ordechoose->screen4($data);
        }else{
            $list= $ordechoose->screen5($data);
        }
        return json($list);
    }

    //    客户选中师傅 更新师傅字段
    public function screen3(){
    $order=input("post.order");
    $info['worker_id']=input("post.worker_id");
    $info['step_number']= 3;
    $info['work_step_number'] = 1;
    $result=Db::name("orders")->where("order_number",'=',$order)->update($info);
    if($result){
        $data=['code'=>200,"msg"=>'请求成功'];
    }else{
        $data=['code'=>200,"msg"=>'请求成功'];
    }
    return json($data);
    }
//找帮手师傅
    public function screen4(){
        $order=input("post.order");
        $worker_id=input("post.worker_id");
        $result=Db::name("common_master")->insert(['worker_id'=>$worker_id,'order_number'=>$order]);
        if($result){
            $data=['code'=>200,"msg"=>'请求成功'];
        }else{
            $data=['code'=>400,"msg"=>'请求失败'];
        }
        return json($data);
    }
}