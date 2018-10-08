<?php
  // +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// | time: 2017-11-16   phone---微信支付
// +----------------------------------------------------------------------
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\WxpayModel;
class Wxpay extends Base
{

// +----------------------------------------------------------------------
// | 项目扫码支付费用
// +----------------------------------------------------------------------
	/**
	 * [add_money description]
	 * 微信扫码支付之前数据先加入数据表
	 */
   public function add_money(){
   	 $param = input();
   	 $list = new WxpayModel();
   	 $list = $list->add_money($param);
     return json(['code'=>$list['code'],'msg'=>$list['msg']]);
   }
    /**
     * 扫码支付页面
     */
    public function payment($order_number){
    	$list = new WxpayModel();
    	$list = $list->payment($order_number);
    	if(!empty($list)){//返回数据有值 ，才显示支付页面
          $this->assign('list',$list);
          $this->assign('number',$order_number);
		  return view('index');
    	}
    }
    /**
     * 扫码支付成功之后总价加入orders订单总表
     */
    public function add_price(){
        $order_number = input('post.order_number');
        $list = new WxpayModel();
        $list = $list->add_price($order_number);
        return json(['code'=>$list['code']]);
    }
// +----------------------------------------------------------------------
// | 项目JSAPI支付费用
// +----------------------------------------------------------------------
    /**
     * JSPAI项目支付页面
     */
    public function project_cost($total,$order_number){
	    $id = Db::name('orders')->where('order_number',$number)->field('service_type_id')->find();
	    $service = Db::name('service')->where('id',$id['service_type_id'])->field('name')->find();	
		$this->assign('total',$total);
		$this->assign('number',$number);
		$this->assign('service',$service['name']);
		return view('wxjs'); 	
    }
    /**
     * JSPAI微信支付成功之后，支付钱加入数据表
     */
    public function add_project_cost(){
    	$param = input();
    	$list = new WxpayModel();
    	$lsit = $list->add_project_cost($param);
    	return json(['code'=>$list['code']]);
    }
    /**
     * 付款成功跳转
     */
    public function pay_success(){
      return view('xiadan_fukuanchenggong');
    }
// +----------------------------------------------------------------------
// | 客户钱包支付扫码
// +----------------------------------------------------------------------
   /**
    * 客户钱包支付之前加入数据表
    */
   public function customer_add_qian(){
     $param = input();
     $data['money'] = $param['totals'];
     $data['uid'] = $param['uid'];
     $data['create_time'] = time();
     $arr = Db::name('c_recharge')->insert($data);
     if($arr){
       return json(array('code'=>200,'msg'=>$data['create_time']));
      }else{
       return json(array('code'=>0,'msg'=>''));
      }
   }
   /**
    * 客户钱包扫码支付页面
    */
   public function customer_payment($uid,$times){
     $where['uid'] = $uid;
     $where['create_time'] = $times;
     $data = Db::name('c_recharge') ->where($where)->order('id desc')->find();
     if($data){
            $total = Db::name('c_recharge')->where('uid',$uid)->field('money')->order('id desc')->find();
            $qq=$total['money'];
            $service = '账户充值';
            $this->assign('qq',$qq);
            $this->assign('service',$service);
            $this->assign('uid',$uid);
            return view('customer_index');
     } 
   }
   /**
    * 客户钱包扫码支付成功后加入数据表
    */
   public function customer_payment_ajaxs(){
        $uid = input('post.uid');
        $data = Db::name('c_recharge') ->where('uid',$uid)->order('id desc')->field('money')->limit(1)->find();
        $balance = Db::name('users')->where('id',$uid )->field('balance')->find();
        $money = $data['money'] +$balance['balance'];
        $list = Db::name('users')->where('id',$uid)->update(['balance'=>$money]);
        if($list){
          return json(array('code'=>200,'msg'=>''));
        }else{
          return json(array('code'=>0,'msg'=>''));
        }
    }
// +----------------------------------------------------------------------
// | 客户钱包支付JSAPI
// +----------------------------------------------------------------------
   /**
    * 客户jsapi页面
    */
   public function customer_payment_jsapi($total,$uid){
        $total=$total;
        $service = '账户充值';
        $this->assign('total',$total);
        $this->assign('service',$service);
        $this->assign('uid',$uid);
       return view('customer_wxjs');
   }
   /**
    * 客户钱包支付成功之后加入表
    */
   public function customer_payment_ajax(){
         $uid = input('post.uid');
         $total = input('post.total');//充值的钱数
         $balance = Db::name('users')->where('id',$uid )->field('balance')->find();
         $money = $total +$balance['balance'];
         $list = Db::name('users')->where('id',$uid)->update(['balance'=>$money]);
         if($list){
          return json(array('code'=>200,'msg'=>''));
        }else{
          return json(array('code'=>0,'msg'=>''));
        }
   }
// +----------------------------------------------------------------------
// | 师傅保障金支付扫码
// +----------------------------------------------------------------------
   /**
    * 师傅保障金充值之前加入数据表
    */
   public function add_guarantee(){
        $data['guarantee'] = input('post.totals');
        $data['uid'] = input('post.uid');
        $data['create_time'] = time();
        $arr = Db::name('guarantee')->insert($data);
        if($arr){
          return json(array('code'=>200,'msg'=>$data['create_time']));
        }else{
          return json(array('code'=>0,'msg'=>''));
        }
   }
   /**
    * 师傅保证金页面
    */
   public function master_guarantee($uid,$times){
      $where['uid'] = $uid;
      $where['create_time'] = $t;
      $data = Db::name('guarantee') ->where($where)->order('id desc')->select();
      if($data){
            $total = Db::name('guarantee')->where('uid',$uid)->field('guarantee')->order('id desc')->find();
            $qq=$total['guarantee'];
            $service = '保障金充值';
            $this->assign('qq',$qq);
            $this->assign('service',$service);
            $this->assign('uid',$uid);
            return view('master_index');
      }
   }
   /**
    * 师傅保证金扫码支付支付成功之后加入数据表
    */
   public function add_guarantee_ajax(){
      $uid = input('post.uid');
      $data = Db::name('guarantee') ->where('uid',$uid)->order('id desc')->field('guarantee')->limit(1)->find();
      $guarantee = Db::name('users_worker')->where('uid',$uid )->field('guarantee')->find();
      $money = $data['guarantee'] +$guarantee['guarantee'];
      $list = Db::name('users_worker')->where('uid',$uid)->update(['guarantee'=>$money]);
      if($list){
        return json(array('code'=>200,'msg'=>''));
      }else{
        return json(array('code'=>0,'msg'=>''));
      }
   }
// +----------------------------------------------------------------------
// | 师傅保障金支付JSAPI
// +----------------------------------------------------------------------
   public function master_guarantee_jsapi($total,$uid){
        $qq=$total;
        $service = '账户充值';
        $this->assign('qq',$qq);
        $this->assign('service',$service);
        $this->assign('uid',$uid);
        return view('master_jsapi');
   }
   /**
    * 师傅保证金支付成功之后更新数据表
    */
   public function add_guarantee_api_ajax(){
       $uid = input('post.uid');
       $total = input('post.total');//充值的钱数
       $balance = Db::name('users_worker')->where('uid',$uid )->field('guarantee')->find();
       $money = $total +$balance['guarantee'];
       $list = Db::name('users_worker')->where('uid',$uid)->update(['guarantee'=>$money]);
       if($list){
        return json(array('code'=>200,'msg'=>''));
      }else{
        return json(array('code'=>0,'msg'=>''));
      }
   }
// +----------------------------------------------------------------------
// | 客户咨询付费扫码
// +----------------------------------------------------------------------
   /**
    * 客户咨询付费之前加入数据表
    */
   public function add_consult(){
      $param = input();
      $order_number = $param['order_number'];
      $data['consult_price'] = $param['total'];
      $data['create_time'] = time();
      $list = Db::name('pay_price')->where('order_number',$order_number)->find();
      if(!empty($list)){
        $result = Db::name('pay_price')->where('order_number',$order_number)->update($data);
      }else{
        $data['order_number'] = $order_number;
        $result = Db::name('pay_price')->insertGetId($data);
      }
     if($result || $result==0){ 
        return json(array('code'=>200,'msg'=> $data['create_time']));
     }else{
         return json(array('code'=>0,'msg'=>''));
     }
   }
   /**
    * 客户咨询扫码付费页面
    */
   public function add_consult_index($order_number,$times){
      $where['order_number'] = $order_number;
      $where['create_time'] = $times;
      $arr = Db::name('pay_price')->where($where)->field('consult_price')->select();
       if($arr){
       $total = Db::name('pay_price')->where('order_number',$number)->field('consult_price')->find();
       $qq=$total['consult_price'];
       $service = '咨询付费';
       $this->assign('qq',$qq);
       $this->assign('number',$number);
       $this->assign('service',$service);
       return view('consult_index');  
     }  
   }
   /**
    * 咨询付费成功之后
    */
   public function add_consult_ajax(){
      $order_number = input('post.order_number');
      $data['pay'] = 1;
      $info = Db::name('orders')->where('order_number',$order_number)->update($data);
      if(!empty($info)){
        return json(array('code'=>200,'msg'=>''));
      }else{
         return json(array('code'=>0,'msg'=>''));
      }
   }
// +----------------------------------------------------------------------
// | 客户咨询付费JSAPI
// +----------------------------------------------------------------------
   /**
    * [add_consult_jsapi description]
    * 客户付费咨询jsapi页面
    * @param [type] $total        [description]
    * @param [type] $order_number [description]
    */
   public function add_consult_jsapi($total,$order_number){
      $qq = $total;
      $service = '咨询付费';
      $this->assign('qq',$qq);
      $this->assign('service',$service);
      $this->assign('number',$number);
      return view('consult_wxjs');
   }
   /**
    * JSAPI 加入数据表
    */
   public function add_consult_jsapi_ajax(){
        $order_number = input('post.order_number');
        $data['pay'] = 1;
        $info = Db::name('orders')->where('order_number',$order_number)->update($data);
        if(!empty($info)){
          return json(array('code'=>200,'msg'=>''));
        }else{
           return json(array('code'=>0,'msg'=>''));
        }
   }
// +----------------------------------------------------------------------
// | 客户追加项目付费扫码
// +----------------------------------------------------------------------
   /**
    * 客户追加项目付费加入数据表
    */
   public function additional_projects(){
      $info= input();
      $param['order_number'] =$info['order_number']
      $param['reason']= $info['resuse'];
      $param['total']= $info['price'];
      $param['create_time']= time();
      $list = Db::name('addition')->insert($param);
      if($list){
        return json(array('code'=>200,'msg'=>''));
      }else{
        return json(array('code'=>0,'msg'=>''));
      }
   }
   /**
    * 客户追加项目页面
    */
   public function additional_projects_index($order_number){
      $arr = Db::name('addition')->where('order_number',$order_number)->find();
      if($arr){
         $total = Db::name('addition')->where('order_number',$order_number)->field('total')->find();  
       $service = '追加项目费用' ;
       $qq=$total['total'];
       $this->assign('qq',$qq);
       $this->assign('number',$order_number);
       $this->assign('service',$service);
       return view('addtional_index');
      }
   }
   /**
    * 客户支付成功加入数据表
    */
   public function additional_projects_ajax(){
      $order_number = input('post.order_number');
      $total = Db::name('addition')->where('order_number',$order_number)->field('total,reason')->find();
      $data['ampunt_addition'] = $total['total'];
      $data['amput_content'] = $total['reason'];
      $order = Db::name('orders')->where('order_number',$order_number)->update($data);

       //发送消息
       $info['message_type'] = 2;
       $info['source_id'] = Db::name('orders')->where('order_number',$order_number)->value('owner_id');
       $info['content'] = '客户已追加项目，请点击查看';
       $info['receive_id'] = Db::name('orders')->where('order_number',$order_number)->value('worker_id');
       $info['link'] = input('post.link');
       $info['status'] = '0';
       $info['sending_time'] = date("Y-m-d H:i:s");
       Db::name('message_reminder')->insert($info);
      


      if($order || $order==0){
        return json(array('code'=>200,'msg'=>''));
      }else{
        return json(array('code'=>0,'msg'=>''));
      }
   }
// +----------------------------------------------------------------------
// | 客户追加项目付费JSAPI
// +----------------------------------------------------------------------
   /**
    * 客户JSAPI支付
    */
   public  function additional_projects_jsapi($total,$number){
       $service = '追加项目费用';    
       $qq=$total;
       $_SESSION['qq']=$total;  
       $_SESSION['number']=$number;  
       $this->assign('qq',$qq);
       $this->assign('number',$number);
       $this->assign('service',$service);
       return view('addtional_wxjs'); 

   }
   /**
    * jsapi支付成功
    */
   public function additional_projects_jsapi_ajax(){
       $order_number = input('post.order_number');
       $total = Db::name('addition')->where('order_number',$order_number)->field('reason')->find();     
       $data['ampunt_addition'] = input('post.total');
       $data['amput_content'] = $total['reason'];
       $order = Db::name('orders')->where('order_number',$order_number)->update($data);

       //发送消息
       $info['message_type'] = 2;
       $info['source_id'] = Db::name('orders')->where('order_number',$order_number)->value('owner_id');
       $info['content'] = '客户已追加项目，请点击查看';
       $info['receive_id'] = Db::name('orders')->where('order_number',$order_number)->value('worker_id');
       $info['link'] = input('post.link');
       $info['status'] = '0';
       $info['sending_time'] = date("Y-m-d H:i:s");
       Db::name('message_reminder')->insert($info);

         if($order || $order==0){
          return json(array('code'=>200,'msg'=>''));
        }else{
          return json(array('code'=>0,'msg'=>''));
        }
   }
}