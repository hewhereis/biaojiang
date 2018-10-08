<?php
namespace app\index\model;
use think\Model;
use think\Db;
class CoamingModel extends Model{

	protected $name = 'orders_coaming';
	public function addCoaming($param){
		    $uid = $param['uid'];
		    $yuejie = $param['yue'];
		    $pwd = $param['pwd'];
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
		    //生成订单号
		    $stime=date('YmdHis',time());
			$start_timess=date('YmdHis',time());
			$rand=rand(1,99999);
			$order_number=$stime."".$rand;
			//判断是否需要核单
			$is_bomb = $param['hedan'];
			//加入orders表的数据
			$data['order_number']=$order_number;
			$data['owner_id']=$param['uid'];
			$data['owner_name']=$param['uname'];
			$data['service_type_id']=6;
			$data['contact_name']=$param['contact_name'];
			$data['monthly_service']=$yuejie;
			$data['contact_phone']=$param['contact_phone'];
			$data['start_time']=strtotime($param['start_time']);
			$data['create_time']=strtotime($start_timess);
			$data['full_location']=$param['province']."".$param['city']."".$param['town'];
			$data['location_ext']=$param['address'];
			$data['step_type']=$param['ds_step'];
			$data['work_step_service']=$param['ds_step'];
			$data['step_number']=2;
			$data['status']=0;
			$data['judge']=$param['judge'];
			//$data['l1_category_id']=$param['product_categories'][0];
			$data['is_bomb']=$is_bomb;
			$orders = Db::name('orders');
			$result = $orders->insertGetId($data);


            //判断当前用户有没有默认地址
			$address=Db::name('client_loaction')->field('default')->where('uid',$uid)->find();
			if(empty($address)){
				$add_where['uid']=$uid;
				$add_where['name']=$param['contact_name'];
				$add_where['province']=$param['province'];
				$add_where['city']=$param['city'];
				$add_where['district']=$param['town'];
				$add_where['location']=$param['address'];
				$add_where['default']=1;
				$add_where['phone']=$param['contact_phone'];
				Db::name('client_loaction')->insertGetId($add_where);
			}



			//加入围板搭建附表
			$info['order_number'] = $order_number;
			$info['service_type_id']=6;
			$info['workernumber'] = $param['workernumber'];//施工人数
			$info['contractmode'] = $param['contract'];//承包模式
			$info['SGprocedure'] = $param['procedure'];//是否需要施工手续 
			$info['delivermode'] = $param['delivery'];//物流提货
			$info['site'] = $param['site'];//是否需要查看场地
			$info['projectdepositmode'] = $param['deposit'];//师傅需要代缴工程押金
			$info['garbagemode'] = $param['garbage'];//完工以后垃圾处理方式
			$info['progresssheet'] = $param['balance'];//搭建/拆除进度表
			$info['brand'] = $param['brand'];//品牌
			if($param['chart']){
			$info['verifysheet'] = $param['chart'];//搭建拆除验收单
			}
			if($param['imgpaper']){
			$info['imgpaper'] = $param['imgpaper'];//围板搭建图纸	
			}
			$info['imgstore'] = $param['imgstore'];//门头照
			$info['departure_permit'] = $param['permit'];//商场办证
			if($param['constructdate']){
			$info['constructdate'] = strtotime($param['constructdate']);//搭建时间
			}
			if($param['dismantledate']){
			$info['dismantledate'] = strtotime($param['dismantledate']);//拆除时间	
			}
			$info['create_time'] = time();
            $arr =  $this->insertGetId($info);
             if($arr){
                return ['code'=>200,'msg'=>$order_number];
             }else{
                return ['code'=>0,'msg'=>$this->getError()];
             }

	}

	public function addBuget($param){

		 $order_number = $param['order_number'];
         $data['budget'] = $param['budget'];
         $data['comments'] = $param['modules'];
         if(array_key_exists('zhaobiao', $param)){//判断是否点击显示预算价
         $data['tender'] = $param['zhaobiao'];
         }
         //后台验证
         $rule = [
            'budget' => 'require|number'
         ];
         //验证提示语
         $msg = [
            'budget.require' => '项目预算价不能为空',
            'budget.number'  => '项目预算价必须是数字' 
         ];

       $list=$this->validate($rule,$msg)->save($data,['order_number'=>$order_number]);
       if($list){
         return ['code'=>200,'msg'=>'下单成功,正在为你找师傅'];
       }else{
         return ['code'=>0,'msg'=>$this->getError()];
       }      
	}
}