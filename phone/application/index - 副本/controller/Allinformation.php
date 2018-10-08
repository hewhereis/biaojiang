<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\AllinformationModel;
  /*
   手机端消息首页
   */
class Allinformation extends Base{
        public function infomation(){
    	  $uid=session('id');
    	  $map['receive_id']=$uid;
    	  $map['status']=0;
    	  $map['message_type']=1; 	
          $system_messages=Db::name('message_reminder')->where($map)->count();//统计当前用户未读的系统消息
    	  $maps['receive_id']=$uid;
    	  $maps['status']=0;
    	  $maps['message_type']=2;
    	  $order_messages=Db::name('message_reminder')->where($maps)->count();//统计当前用户未读的订单消息 
    	  if(!empty($system_messages)){
    	  	$system_messages=true;
    	  }
    	  if(!empty($order_messages)){
    	  	$order_messages=true;
    	  	}
    	  $this->assign('system_messages',$system_messages);
    	  $this->assign('order_messages',$order_messages);	
          return $this->fetch();
        }

   /*手机端系统消息*/
    public  function  infomationlist(){
          $uid=session('id');
          $data['receive_id']=$uid;
         $param =input();
         if(empty($param['start'])){
         //$data['receive_id']=33;
         $data['message_type']=1;
         $list=Db::name('message_reminder')->where($data)->group('id desc')->limit(6)->select();
          $this->assign('list',json_encode($list));
          return $this->fetch();
        }else{
             $datas['receive_id']=33;
             $datas['message_type']=1;
             $total =Db::name('message_reminder')->where($datas)->count();
             $totals=$total;
             $start=$param['start'];
             $data['receive_id']=33;
             $data['message_type']=1;
             $lists=Db::name('message_reminder')->where($data)->group('id desc')->limit($start,6)->select(); 
             return(array( 'result'=>$lists,'status'=>1, 'totals'=>$totals ,'msg'=>'获取成功！'));

    }
}

  /* 手机端订单消息*/
    public  function  orderinfomationlist(){
        $uid=session('id');
        $map['receive_id']=$uid;
      $param=input();
      if(empty($param['start'])){
    	//$map['receive_id']=34;
    	$map['message_type']=2;
    	$orders=Db::name('message_reminder')->where($map)->group('id desc')->limit(6)->select();
    	$this->assign('orders',json_encode($orders));
        return $this->fetch();
      }else{
        $maps['receive_id']=34;
        $maps['message_type']=2;
        $total=Db::name('message_reminder')->where($maps)->count();
        $totals=$total;
        $start=$param['start'];
        $map['receive_id']=34;
        $map['message_type']=2;
        $order=Db::name('message_reminder')->where($map)->group('id desc')->limit($start,6)->select();
        return(array( 'result'=>$order,'status'=>1, 'totals'=>$totals ,'msg'=>'获取成功!!!'));
      }
    }



 //消息删除
    public function delete_messages(){
         $id=input('param.id');
         $deletes=new AllinformationModel();
         $flag=$deletes->delser($id);
         return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
    }	
	
	
	
	
	
	
	
	
}
