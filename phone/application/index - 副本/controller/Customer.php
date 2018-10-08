<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Customer extends Controller{
	/**
	 * 客户首页
	 */
	public function main_customer(){
		//获取当前登陆者ID
		$uid = session('id');
		$where['a.owner_id']=$uid;
		$where['a.is_del']=0;
		$field = 'a.id,a.order_number,a.owner_id,a.worker_id,a.service_type_id,a.full_location,a.start_time,s.name as sname,aa.brand as aa_brand,aa.photo_store as aa_img,aa.budget as aa_budget';
        
        $join = [
				['service s','s.id = a.service_type_id'],
				['orders_maintain aa','aa.order_number = a.order_number']
			];
		$result = Db::name('orders')->alias('a')->join($join)->where($where)->field($field)->order('a.id desc')->find();
		$result['start_time'] = date('Y-m-d H:i:s',$result["start_time"]);
		$this->assign('result',json_encode($result));
		return view('kehushouye');
	}
}