<?php
namespace app\index\model;
use think\Model;
class ApiorderModel extends Model
{
    protected $autoWriteTimestamp = true;
    protected $name = 'orders';
 
  
    public function repair_orders($onumber)
      {
		 
		
			$join = [
				['bj_orders_maintain', 'bj_orders.order_number = bj_orders_maintain.order_number'],
				['bj_users','bj_orders.owner_id = bj_users.id'],
				['bj_service','bj_orders.service_type_id = bj_service.id'],
				['bj_category','bj_orders_maintain.l1_category_id = bj_category.id'],
				['bj_commodity','bj_orders_maintain.l2_category_id = bj_commodity.id'],
			];
						
			$where['bj_orders.order_number']=$onumber;
			$field='bj_orders.id,bj_orders.order_number,bj_users.real_name,
			bj_service.name as s_name,bj_orders_maintain.workder_name as w_name,
			bj_category.name as c1_name,bj_commodity.name as c2_name,
			bj_orders_maintain.qty,bj_orders_maintain.trouble_description,bj_orders_maintain.photo_store,bj_orders_maintain.photo_trouble_position,
			bj_orders_maintain.urgent,bj_orders_maintain.appointment_time,bj_orders_maintain.brand,bj_orders_maintain.contact_name,bj_orders_maintain.contact_phone,
			bj_orders_maintain.contact_location,bj_orders_maintain.budget,bj_orders_maintain.status';
          return $this->field($field)->join($join)->where($where)->select();
		  //字段说明：
		  /*
		  id:订单主ID
		  order_number：订单编号
		  real_name：下单者真实姓名
		  s_name：服务类型名称
		  w_name:师傅名称
		  c1_name:一级分类名称
		  c2_name:二级分类名称
		  c3_name:三级分类名称
		  qty:故障数量
		  trouble_description:故障描述
		  photo_store：门头照片
		  photo_trouble_position：故障位置照片
		  photo_trouble_detail：故障详细图片
		  urgent：是否加急
		  appointment_time：预约时间
		  brand：品牌
		  contact_name：维修联系人
		  contact_phone：维修联系人电话
		  contact_location：维修地址
		  budget：预算费用
		  status：订单状态 0初始订单(信息尚未完善）  1待定标 2待付款 3待完工 4待验收 5待评价 6订单关闭
		  */
      }
 
}