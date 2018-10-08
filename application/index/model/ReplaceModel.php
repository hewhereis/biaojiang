<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11/011
 * Time: 16:17
 */

namespace app\index\model;
use think\Model;
use think\Db;

class ReplaceModel extends  Model
{  protected $name = 'replace';
    public function insertReplace($param)
    {


            $uid = $param['uid'];

            $uname = $param['uname'];
            $pwd = $param['pwd'];
            $is_bomb = $param['hedan'];
            $yuejie = $param['yue'];

            if($yuejie==1){
                $user = Db::name('users_partner');
                $list_ds = $user->where('uid='.$uid)->select();
                if(empty($list_ds)){
                    return ['code' => 0, 'data' => '', 'msg' => '你还不是月结客户'];
                }else{
                    $where['uid']=$uid;
                    $ds_lists = Db::name('users_partner')->field('monthly_service_password')->where($where)->find();
                    if($ds_lists['monthly_service_password']!=$pwd){
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
                $add_where['phone']=$param['contact_phone'];
                Db::name('client_loaction')->insertGetId($add_where);
            }


            $stime=date('YmdHis',time());
            $start_timess=date('YmdHis',time());
            $rand=rand(1,99999);
            $order_number=$stime."".$rand;
            $owner_id=$param['uid'];
            $service_type_id='5';
            $contact_name=$param['linkman_contacts'];
            $contact_phone=$param['contact_phone'];
            $start_times=$param['appointment_time'];
            $province=$param['province'];
            $city=$param['city'];
            $district=$param['district'];
            $start_time=strtotime($start_times);
            $create_time=strtotime($start_timess);
            $address=$param['address'];
            $step_type=$param['ds_step'];
            $work_step_service=$param['ds_step'];
            $judge=$param['judge'];
            $data['judge']=$judge;
            $data['order_number']=$order_number;
            $data['owner_id']=$owner_id;
            $data['service_type_id']=$service_type_id;
            $data['contact_name']=$contact_name;
            $data['owner_name']=$contact_name;
            $data['contact_phone']=$contact_phone;
            $data['start_time']=$start_time;
            $data['create_time']=$create_time;
            $data['full_location']=$province."".$city."".$district;
            $data['location_ext']=$address;
            $data['step_type']=$step_type;
            $data['work_step_service']=$work_step_service;
            $data['step_number']=2;
            $data['status']=0;
            $data['is_bomb']=$is_bomb;
            $orders=Db::name('orders');
            $result=$orders->insertGetId($data);



            $service_type_id='5';
            $img_describe=$param['img_describe'];
            $material=$param['materia'];
            $length=$param['length'];
            $wide=$param['wide'];
            $high=$param['high'];
            $comments=$param['comments'];
            $img_describe2=$param['img_describe2'];

            $datas['img_describe']=$img_describe;
            $datas['order_number'][]=$order_number;
            $datas['material']=$material;
            $datas['length']=$length;
            $datas['wide']=$wide;
            $datas['high']=$high;
            $datas['comments']=$comments;
            $datas['img_describe2']=$img_describe2;

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
                if($new_arr[$i]['img_describe']==""){
                    unset($new_arr[$i]);
                }
            }




            $this->saveAll($new_arr);

            $list["appointment_time"] = strtotime($param['appointment_time']);
            $list['customer_name']=$param['linkman_contacts'];
            $list["contact_phone"] = $param['contact_phone'];
            $list["market_cer"] =$param['market_cer'];
            $list["province"]=$param['province'];
            $list["city"]=$param['city'];
            $list["district"]=$param['district'];
            $list["address"]=$param['address'];
            $list["brand"]=$param['brand'];
            $list["space"]=$param['space'];
            $list["shop"]=$param['shop'];
            $list["orders_number"]=$param['orders_number'];
            $list['service_type_id']='5';
            $list["tender"]=$param['tender'];
            $list["hight"]=$param['hight'];

            $map['is_bomb']=$is_bomb;

            $list["num"]=$param['num'];
            $list["img_describe3"]=$param['img_describe3'];
            $list["departure_permit"]=$param['departure_permit'];
            $list["photo_store"]=$param['photo_store'];
            $list["start_time"]=strtotime($param['start_time']);

            $wheres['order_number']=$order_number;
            $result=$this->where($wheres)->update($list);




            if(false==($result)){
                return ['code' => -1, 'data' => $step_type, 'msg' => $this->getError()];
            }else{

                return ['code' => 1, 'data' => $step_type, 'msg' => $order_number];
            }

    }

}