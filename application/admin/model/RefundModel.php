<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class RefundModel extends Model
{
	protected $name = 'refund_platform';
	public function platom_index($map,$Nowpage,$limits){
		$field = 'id,order_number,name,tel,explains,img1,img2,img3';
		$where['status'] = 0;
        $order =  Db::name('refund_platform')->field($field)->where($map)->where($where)->page($Nowpage, $limits)->order('id desc')->select();
        //根据订单号查询出主任师傅的电话和姓名
        foreach ($order as $key => $v) {
        	$s = [];
        	$p=[];
        	$p=$v;
        	$s = Db::name('orders')->alias('a')->join('users b','a.worker_id = b.id')->field('b.real_name,b.phone')->where('a.order_number',$v['order_number'])->find();
        	$order[$key] = array_merge($s,$p);
        }
        return $order;
	}
}