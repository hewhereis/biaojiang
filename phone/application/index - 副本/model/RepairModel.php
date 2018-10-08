<?php
namespace app\index\model;
use think\Model;
use think\Db;
use app\index\controller\Api;
class RepairModel extends Model{
     protected $name = 'orders_maintain';
     /**
      * [direct_order description]
      * 维修直接下单
      * @time 2017-11-11;
      * @return [type] [description]
      */
     public function direct_order($array,$array_info,$i){
            $uid = $array_info['uid'];
            $uname = $array_info['datas']['name'];
            //$pwd = $param['pwd'];   
            $is_bomb = $array_info['hedan']; 
            $yuejie = $array_info['yuejie'];
            //生成订单号
            $stime=date('YmdHis',time());
            $start_timess=date('YmdHis',time());
            $rand=rand(1,99999);
            $order_number=$stime."".$rand;
            $data['order_number']=$order_number;
            $data['owner_id']=$uid;
            $data['owner_name']=$array_info['username'];
            $data['service_type_id']=2;
            $data['contact_name']=$uname;
            $data['monthly_service']=$yuejie;
            $data['contact_phone']=$array_info['datas']['phone'];
            $data['start_time']=strtotime($array_info['times']);
            $data['create_time']=time();
            $array_info['datas']['address_area'] = str_replace(' ','', $array_info['datas']['address_area']);
            $data['full_location']=$array_info['datas']['address_area'];
            $data['location_ext']=$array_info['datas']['address'];
            $data['step_type']=$i;
            $data['work_step_service']=$i;
            $data['step_number']=2;
            $data['status']=0;
            $data['l1_category_id']=$array[0]['dalei'];
            $data['is_bomb']=$is_bomb;
            $data['judge']=$i;
            $orders = Db::name('orders');
            $result = $orders->insertGetId($data);
            
            //判断当前用户有没有默认地址
            $address=Db::name('client_loaction')->field('default')->where('uid',$uid)->find();
            if(empty($address)){
                $add_where['uid']=$uid;
                $add_where['name']=$uname;
                $area = explode('-', $array_info['datas']['address_area']);
                $add_where['province']=$area[0];
                $add_where['city']=$area[1];
                $add_where['district']=$area[2];
                $add_where['location']=$array_info['datas']['address'];
                $add_where['default']=1;
                $add_where['phone']=$array_info['datas']['phone'];
                Db::name('client_loaction')->insertGetId($add_where);
            }
            foreach($array as $key=>$v){
                $list[$key]['l1_category_id']=$v['dalei'];
                $list[$key]['order_number']=$order_number;
                $list[$key]['l2_category_id']=$v['xiaolei'];
                $list[$key]['type']=$v['xinhao'];
                $list[$key]['qty']=$v['msg'];
                $list[$key]['trouble_description']=$v['accident'];
                $list[$key]['service_type_id']=2;
                $list[$key]['customer_name']=$array_info['username'];
                $list[$key]['photo_trouble_position']=$v['img'];
                $list[$key]['photo_trouble_detail1']=$v['img1'];
                $list[$key]['photo_trouble_detail2']=$v['img2'];
                $list[$key]['brand']=$v['pianpai'];
                $list[$key]['photo_store']=$array_info['mentouzhao'];
                $list[$key]['market_cer']=$array_info['shanchuang'];
                $list[$key]['img_ysd']=$array_info['yanshou'];
                $list[$key]['create_time']=time();
            }
            $get_order=  $this->allowField(true)->saveAll($list);
            if($get_order){
               return ['code'=>200,'msg'=>'下单成功','order_number'=>$order_number];
            }else{
               return ['code'=>0,'msg'=>'下单失败'];
            }
     }

      /**
       * 客户预算价
       */
      public function getmoney($param){
        $order_number = $param['order_number'];
        $comments = $param['datas']['message'];
        $tender=$param['datas']['xianshi'];
        if($tender==true){
            $tenders=1;
        }else{
            $tenders=0;
        }
        //查出订单号对应的ID
        $id=$this->where('order_number',$order_number)->field('id')->select();
        foreach ($id as $k => $v) {
           $data[$k]['id']=$v['id'];
        }
        foreach ($param['datas']['baojia'] as $key => $value) {
           $data[$key]['budget'] = $value;
           $data[$key]['comments'] = $param['datas']['message'];
           $data[$key]['tender'] = $tenders;
        }
           $result = $this->saveAll($data);
           if(!empty($result)){
            //改变订单总表的客户步骤
            Db::name('orders')->where('order_number',$order_number)->update(['step_number'=>3,'status'=>1,'master_status'=>1]);
            return ['code'=>200,'msg'=>''];
           }else{
            return ['code'=>0,'msg'=>'系统错误！'];
           }
      }


    //客户选择师傅页面，客户信息
    public static function master_info($order_number){
         $order =Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time,location_ext')->find();
         return $order;
    }

    /**
     * 查询客户下单项目的信息
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     */
     public static function project($order_number){

        $service_id = Db::name('orders')->where('order_number',$order_number)->field('service_type_id')->find();
      
        if($service_id['service_type_id']==2){//维修
            $totals=null;
            $list = Db::name('orders_maintain')->where('order_number',$order_number)->field('service_type_id,l2_category_id,budget,id,comments')->select();
            foreach ($list as $key => $value) {
                     $list[$key]['commodity'] = Db::name('commodity')->where('id',$value['l2_category_id'])->value('name');
                     $totals+=$value['budget'];//总价钱
                }   
              $lists[0] = $list;
              $lists[1] = $totals;

        }else if($service_id['service_type_id']==1){//安装
             $totals=null;
             $list = Db::name('orders_install')->where('order_number',$order_number)->field('service_type_id,l2_category_id,budget,id,comments')->select();
             foreach ($list as $key => $value) {
                     $list[$key]['commodity'] = Db::name('commodity')->where('id',$value['l2_category_id'])->value('name');
                     $totals+=$value['budget'];//总价钱
                }   
              $lists[0] = $list;
              $lists[1] = $totals;
        }else if($service_id['service_type_id']==5){//更换幻灯片
             $totals=null;
             $list = Db::name('replace')->where('order_number',$order_number)->field('service_type_id,l2_category_id,budget,id,comments')->select();
             foreach ($list as $key => $value) {
                     $list[$key]['commodity'] = Db::name('commodity')->where('id',$value['l2_category_id'])->value('name');
                     $totals+=$value['budget'];//总价钱
                }   
              $lists[0] = $list;
              $lists[1] = $totals;
        }else if($service_id['service_type_id']==6){//围板搭建
             $totals=null;
             $list = Db::name('orders_coaming')->where('order_number',$order_number)->field('service_type_id,l2_category_id,budget,id,comments')->select();
             foreach ($list as $key => $value) {
                     $list[$key]['commodity'] = Db::name('commodity')->where('id',$value['l2_category_id'])->value('name');
                     $totals+=$value['budget'];//总价钱
                }   
              $lists[0] = $list;
              $lists[1] = $totals;
        }
          return $lists;
    }

    //该订单抢单的师傅
    public static function grabmaster($order_number){
        $field= 'u.real_name,u.guarantee,u.service_type_id,a.totals,a.message,w.img,a.order_number,a.worker_id';
        $master = Db::name('offer_total')
                ->alias('a')->join('users_worker u','a.worker_id = u.uid')
                ->join('users w','a.worker_id = w.id')
                ->where('a.order_number',$order_number)->field($field)->select();
         foreach($master as &$val){
            $val['service'] = Db::name('service')->field('name')->where('id','in',$val['service_type_id'])->select();
        }
                
       return $master;
        
    }

    /**
     * 支付页面项目详情
     */
    public static function project_detail($order_number){ 
        //获取该订单号的师傅ID
        $wid = Db::name('orders')->where('order_number',$order_number)->value('worker_id');
        
        //include_once('../controller/Api.php');
        $field = 'a.start_time,a.worker_id,a.service_type_id,b.tender_cost';
        $list = Db::name('orders')->alias('a')->join('offer b','a.worker_id = b.worker_id')->where('a.order_number',$order_number)->field($field)->select();
        $get_rate = new Api();
        $get_rate = $get_rate->getcash($wid);
        foreach ($list as $key => $value) {//单个项目加上税费和平台服务费
            $list[$key]['tender_cost'] = $value['tender_cost']*(1+ $get_rate);
        }
        foreach ($list as $key => $value) {
            $list[$key]['service'] = Db::name('service')->where('id',$value['service_type_id'])->value('name');
        }
        foreach ($list as $key => $value) {
            $list[$key]['start_time'] = date('Y-m-d H:i',$value['start_time']);
        }
        return $list;
    }
 }  