<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Maintence extends Controller
{
  /**
   * 师傅维修确认报告页面
   * @order_number  订单号
   */
  public function master_report($order_number){
       return view('master_report');
  }
	
	

}