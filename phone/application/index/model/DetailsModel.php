<?php
namespace app\index\model;
use think\Model;
use think\Db;
class DetailsModel extends Model{
	/**
	 * 项目单个故障详情
	 */
	public function repair_details($id){
			$details = Db::name('orders_maintain')->where('id',$id)->field('l1_category_id,l2_category_id,brand,type,qty,trouble_description,photo_trouble_position,photo_trouble_detail1,photo_trouble_detail2,img_ysd,trouble_tags')->find();
			$details['service'] = '维修';
			$details['l1_category_id'] = Db::name('category')->where('id',$details['l1_category_id'])->value('name');
			$details['l2_category_id'] = Db::name('commodity')->where('id',$details['l2_category_id'])->value('name');
			$details['brand'] = Db::name('brand_list')->where('id',$details['brand'])->value('brand');
			$details['trouble_tags'] = Db::name('goods')->where('id','in',$details['trouble_tags'])->field('name')->select();
			$str='';
			foreach($details['trouble_tags'] as $key =>$val){
					$str .= $val['name'].',';
			}
			$details['trouble_tags']=trim($str,',');//去除最后个逗号
		
		return $details;

	}
}