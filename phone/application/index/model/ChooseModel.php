<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15/015
 * Time: 16:46
 */

namespace app\index\model;
use think\Db;
use think\Model;
use app\index\controller\Api;

class ChooseModel  extends Model
{
//    筛选师傅
    public function user_order($id,$or=null,$pa=0){

//        $id 1 推荐 2 随机 3 搜索 4全部 6 and

        $where["s.type"]="2";
        $where["s.status"]="1";
        $where["s.is_sign"]="1";
        $names=Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill,u.is_tui')->where($where)->limit($pa,10);
        if($id===1){
            $data = $names->limit(5)->order('rand()')->where('u.is_tui',1)->select();
        }else if($id===2){
            $data = $names->limit(5)->where('u.is_tui',1)->select();
        }else if($id===3){
            $data =$names->where('u.uid',$or)->select();
        }else if($id===4){
            $data = $names->select();
        }else if($id===5){
//            $data = $names->where('find_in_set('.$or.',u.work_skill)')->select();
            $data = $names->where('u.work_skill','like',"%$or%")->select();
        }else if($id===6){
            if($or['elementID4']){
                $va=$or['elementID4'];
                $wheres["u.service_type_id"]=["like","%$va%"];
            }
            if( $or['elementID2']){
                $va=$or['elementID2'];
                $wheres["u.work_skill"]=["like","$va%"];
            }
            if( $or['elementID1']){
                $va=$or['elementID1'];
                $wheres["u.brand"]=["like","%$va%"];
            }
            if($or['elementID3']){
                $wheres["u.platform_level"]=$or['elementID3'];
            }
          $data = $names->where($wheres)->select();
        }
        if($id==7){
            $data = $names->where('u.service_type_id','like',"%$or%")->select();
        }
        $api=new Api();

        foreach ($data as $index=>$arr){
            $data[$index]['wage']= $api->count($arr['uid']);
            $data[$index]['work_skill']= $api->work_skill($arr['work_skill']);
            $data[$index]['service_type_id']= $api->service_type_id($arr['service_type_id']);
        }
        return ($data);
    }
//    推荐师傅
    public function screen1(){
        $list = $this->user_order(1);
        if($list){
            $data=['code'=>200,'msg'=>"请求成功",'data'=>$list];
        }else{
            $data=['code'=>400,'msg'=>"请求失败",];
        }
        return ($data);
    }
//    验证师傅
    public function yanzheng($wid,$order_number){
        $where["type"]="2";
        $where["status"]="1";
        $where["is_sign"]="1";
        $res=  Db::name("users")->where("id",$wid)->where($where)->count();
        if($res===1){
          $info['worker_id']=$wid;
          $info['step_number']= 3;
          $info['work_step_number'] = 1;
          $id=session("id");
          $link=input("post.link");
           $api= new Api();
        $api->add_messages(2,$id,$wid,"有客户找你咨询,请点击查看",$link."/$order/wid/$worker_id");
          Db::name("orders")->where("order_number",$order_number)->update($info);
            $data=['code'=>200,'msg'=>"验证成功"];
        }else{
            $data=['code'=>400,'msg'=>"没有师傅,请重新输入验证"];
        }
        return ($data);
    }
// 筛选师傅 页面默认加载值
    public function screen2(){
        $api=new Api();
        $data=['work_skill'=>$api->work_skillw(),'brand'=>$api->brand(),'service_type_id'=>$api->service_type_ids(),'grabfe'=>Db::name('grabfe')->field('id as value,stype as title')->select()];
       return ($data);
    }
//    筛选师傅搜索
   public function screen3($id,$page)
   {
        if(!is_numeric($id)){
           $api= new Api();
          $res= $api->work_skills($id);
          if(empty($res)){
              $res= $api->service_type_idss($id);
              $ids=(string)$res['value'];
              if(empty($ids)){
                  $list=  $this->user_order(1,null,$page);
              }else{
                  $list=  $this->user_order(7,null,$page);
              }
          }else{
              $id=(string)$res['value'];
              $list=  $this->user_order(5,$id,$page);
          }
        }else{
            $list=  $this->user_order(3,$id);
        }
       if($list){
           $data=['code'=>200,'msg'=>"请求成功",'data'=>$list];
       }else{
           $data=['code'=>400,'msg'=>"没有师傅"];
       }
         return $data;
   }
    //    筛选师傅默认
    public function screen4($data)
    {
        $list= $this->user_order(4,null,$data['page']);

        if($list){
            $data=['code'=>200,'msg'=>"请求成功",'data'=>$list];
        }else{
            $data=['code'=>400,'msg'=>"没有更多了",];
        }
        return $data;
}
    public function screen6()
    {
       $data= $this->user_order(4,null,null);
        return $data;
    }
    public function screen5($datass)
    {

        $data= $this->user_order(6,$datass,$datass['page']);
        if($data){
            $datas=['code'=>200,'msg'=>"请求成功",'data'=>$data];
        }else{
            $list=  $this->user_order(1);
            if(empty($list)){
                $data=['code'=>400,'msg'=>"没有师傅或者师傅没有上线",];
            }
            $datas=['code'=>200,'msg'=>"为你推荐师傅",'data'=>$list];
        }
        return $datas;
    }
}