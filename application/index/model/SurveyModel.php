<?php

namespace app\index\model;
use think\Model;
use think\Db;

class SurveyModel extends Model
{
    protected $name = 'orders_survey';
	 // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
	
	public function  survey_ajax($param){
		
			$uid = $param['uid'];
			$uname = $param['uname'];
			$pwd = $param['pwd'];	
		  	$yuejie = $param['yue'];	
			if($yuejie==1){
				$user = Db::name('users_partner');
				$yue_list = $user->where('uid='.$uid)->select();
				if(empty($yue_list)){
					 return ['code' => 0, 'data' => '', 'msg' => '你还不是月结客户'];
				}else{
					$where['monthly_service_password']=$pwd;
					$where['uid']=$uid;
					$yue_lists = $user->where($where)->select();
					if(empty($yue_lists)){
					 return ['code' => -2, 'data' => '', 'msg' => '月结密码错误'];
					}
				}
			}
			//判断当前用户有没有默认地址
			$d_where['default']=1;
			$d_where['uid']=$uid;
			$address=Db::name('client_loaction')->field('default')->where($d_where)->find();
			
		
			
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
			$service_type_id='4';
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
			$step_type=5;
			$work_step_service=5;
			
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
			$data['step_number']=1;
			$data['status']=0;
			$orders = Db::name('orders');
			$result = $orders->insertGetId($data);
			
			$map['order_number']=$order_number;
			$map['contacts']=$contact_name;
			$map['phone']=$contact_phone;
			$map['brand']=$param['brand'];
			$map['mall_name']=$param['designation'];
			$map['yuy_time']=$start_time;
			$map['full_location']=$province."".$city."".$district;
			$map['address']=$address;
			$map['goods']=$param['merchandise'];
			$map['survey_area']=$param['surveys'];
			$map['height']=$param['highly'];
			$map['sg_time']=$param['construction'];
			$map['wg_time']=$param['completion'];
			$map['field_img']=$param['survey'];
			$map['mapping_img']=$param['ds_surveys'];
			$map['condition']=$param['condition'];
			$map['permit']=$param['departure_card'];
			$map['photo']=$param['aimg'];
			$map['requirement']=$param['requirements'];
			$map['is_yue']=$param['yue'];
			
			$result =  $this->save($map);
            if(false === $result){               
                return ['code' => -1, 'data' => '', 'msg' => '-1'];
            }else{
                return ['code' => 200, 'data' => '', 'msg' => '1'];
            }
			
			

			

	
		
		
	}
	
	

   

    
}