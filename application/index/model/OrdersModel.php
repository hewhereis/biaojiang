<?php

namespace app\index\model;
use think\Model;
use think\Db;

class OrdersModel extends Model
{
    protected $name = 'orders_maintain';
	
	public function  ordersxd($param){
	
			$uid = $param['uid'];
			$uname = $param['uname'];
			$pwd = $param['pwd'];	
			$is_bomb = $param['hedan'];	
		  	$yuejie = $param['yue'];	
			if($yuejie==1){
				$user = Db::name('users_partner');
				$list = $user->where('uid='.$uid)->select();
				if(empty($list)){
					 return ['code' => 0, 'data' => '', 'msg' => '你还不是月结客户'];
				}else{
					$where['monthly_service_password']=$pwd;
					$where['uid']=$uid;
					$lists = $user->where($where)->select();
					if(empty($lists)){
					 return ['code' => -2, 'data' => '', 'msg' => '月结密码错误'];
					}
				}
			}
			//判断当前用户有没有默认地址
			$address=Db::name('client_loaction')->field('default')->where('uid',$uid)->find();
			
			if(empty($address)){
				$add_where['uid']=$uid;
				$add_where['name']=$param['linkman_contacts'];
				$add_where['province']=$param['province'];
				$add_where['city']=$param['city'];
				$add_where['district']=$param['district'];
				$add_where['location']=$param['address'];
				$add_where['default']=1;
				$add_where['phone']=$param['telephone'];
				Db::name('client_loaction')->insertGetId($add_where);
			}

			$stime=date('YmdHis',time());
			$start_timess=date('YmdHis',time());
			$rand=rand(1,99999);
			$order_number=$stime."".$rand;
			$owner_id=$param['uid'];
			$service_type_id='2';
			$contact_name=$param['linkman_contacts'];
			$contact_phone=$param['telephone'];
			$start_times=$param['input_date'];
			$province=$param['province'];
			$city=$param['city'];
			$district=$param['district'];
			$start_time=strtotime($start_times);
			$create_time=strtotime($start_timess);
			$address=$param['address'];
			$market_cer=$param['designation'];
			$step_type=$param['ds_step'];
			$work_step_service=$param['ds_step'];
			$data['order_number']=$order_number;
			$data['owner_id']=$owner_id;
			$data['owner_name']=$uname;
			$data['service_type_id']=$service_type_id;
			$data['contact_name']=$contact_name;
			$data['monthly_service']=$yuejie;
			$data['contact_phone']=$contact_phone;
			$data['start_time']=$start_time;
			$data['create_time']=$create_time;
			$data['full_location']=$province."".$city."".$district;
			$data['location_ext']=$address;
			$data['step_type']=$step_type;
			$data['work_step_service']=$work_step_service;
			$data['step_number']=2;
			$data['status']=0;
			$data['l1_category_id']=$param['product_categories'][0];
			$data['is_bomb']=$is_bomb;
			$data['judge']=$param['judge'];
			$orders = Db::name('orders');
			$result = $orders->insertGetId($data);
			$service_type_id='2';	
			$l1_category_id=$param['product_categories'];
			$l2_category_id=$param['product_categoriesx_xiao'];
			$type=$param['marquey'];
			
			$trouble_description=$param['malfunction'];
			$photo_store=$param['aimg'];
			$photo_trouble_position=$param['bimg'];
			$photo_trouble_detail1=$param['cimg'];
			$photo_trouble_detail2=$param['dimg'];
			$brand=$param['brand'];
			$ds_imgs1=$param['ds_imgs1'];
			$ds_imgs2=$param['ds_imgs2'];
			$ds_imgs3=$param['ds_imgs3'];
			
			$qty=$param['input-num'];
			$datas['l1_category_id']=$l1_category_id;
			$datas['order_number'][]=$order_number;
			$datas['l2_category_id']=$l2_category_id;
			$datas['type']=$type;
			$datas['qty']=$qty;
			$datas['trouble_description']=$trouble_description;
		    
			$datas['photo_trouble_position']=$photo_trouble_position;
			$datas['photo_trouble_detail1']=$photo_trouble_detail1;
			$datas['photo_trouble_detail2']=$photo_trouble_detail2;
			$datas['brand']=$brand;
			$datas['img_describe']=$ds_imgs1;
			$datas['img_describe2']=$ds_imgs2;
			$datas['img_describe3']=$ds_imgs3;
							
			$order_number = $datas['order_number'][0];
			unset($datas['order_number']);
			$keys = array_keys($datas);
			
		
			$count1 = count($keys);
			
		
			$count2 = count($datas[$keys[0]]);

			for ($i=0; $i < $count2; $i++) { 
			  for ($j=0; $j < $count1; $j++) {
			 		
				$new_arr[$i][$keys[$j]] = $datas[$keys[$j]][$i];
			  }
			  $new_arr[$i]['order_number'] = $order_number;

			}	
			
			for($i=0,$len=count($new_arr); $i<$len; $i++){
				if($new_arr[$i]['l1_category_id']==""){
					unset($new_arr[$i]);
				}
			}

			//print_r($new_arr);

			$this->saveAll($new_arr);

			if (array_key_exists("site_survey_measurement",$param)) 
			{ 
				$trouble_tags=$param['site_survey_measurement'];
				$fault=implode(',',$trouble_tags);
				$monthly_service=$yuejie;
				$map['service_type_id']='2';
				$map['trouble_tags']=$fault;
				$map['customer_name']=$uname;
				$map['appointment_time']=strtotime($start_times);
				$map['contact_name']=$contact_name;
				$map['contact_phone']=$contact_phone;
				$map['monthly_service']=$monthly_service;
				$map['create_time']=$create_time;
				$map['status']=1;
				$map['is_bomb']=$is_bomb;
				$map['market_cer']=$market_cer;
				$map['departure_permit']=$param['departure_card'];
				$map['contact_location']=$province."".$city."".$district."".$address;
				$map['photo_store']=$photo_store;
				$wheres['order_number']=$order_number;
				$lists=$this->where($wheres)->update($map);
				if(!empty($lists)){
					
					return ['code' => 200, 'data' => '', 'msg' => $order_number];
										 
				}else{
						
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
						
				}
			} else{
			
				$monthly_service=$yuejie;
				$map['service_type_id']='2';
				$map['customer_name']=$uname;
				$map['appointment_time']=strtotime($start_times);
				$map['contact_name']=$contact_name;
				$map['contact_phone']=$contact_phone;
				$map['monthly_service']=$monthly_service;
				$map['create_time']=$create_time;
				$map['status']=1;
				$map['is_bomb']=$is_bomb;
				$map['market_cer']=$market_cer;
				$map['departure_permit']=$param['departure_card'];
				$map['contact_location']=$province."".$city."".$district."".$address;
				$map['photo_store']=$photo_store;
				$map['img_ysd']=$param['ysimg'];
				$wheres['order_number']=$order_number;
				$lists=$this->where($wheres)->update($map);
				
				if(!empty($lists)){
					
					return ['code' => 200, 'data' => '', 'msg' => $order_number];
										 
				}else{
						
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
						
				}
		}
		
		
	}
	
	

   

    
}