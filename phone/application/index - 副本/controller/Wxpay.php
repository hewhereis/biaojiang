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
class Wxpay extends Controller
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
   	 $list = $list->add_money($param)
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
}