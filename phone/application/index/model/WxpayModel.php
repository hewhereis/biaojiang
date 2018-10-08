<?php
namespace app\index\model;
use think\Model;
use think\Db;
class WxpayModel extends Model{
    protected $name="pay_price";
// +----------------------------------------------------------------------
// | 项目扫码支付
// +----------------------------------------------------------------------
    /**
     * 微信扫码支付之前先把数据加入数据表
     */
    public static function add_money($param){
        $order_number = $param['order_number'];
        $data['total_price'] = $param['totals'];
        $list = $this->where('order_number',$order_number)->find();
        if(!empty($list)){
            $result = $this->where('order_number', $order_number)->update($data);
        }else{
             $data['order_number'] = $param['order_number'];
             $result = $this->insertGetId($data);
        }
        if($result || $result==0){
            return ['code'=>200,'msg'=>''];
        }else{
            return ['code'=>0,'msg'=>''];
        }
    }
    /**
     * 扫码支付页面
     */
    public function payment($order_number){
        $arr = $this->where('order_number',$order_number)->select();
         if($arr){
             $total = $this->where('order_number',$order_number)->field('total_price')->find(); 
             $id = Db::name('orders')->where('order_number',$order_number)->field('service_type_id')->find();
             $data['service'] = Db::name('service')->where('id',$id['service_type_id'])->value('name');
             $data['price']=$total['total_price'];
         }
         return $data;
    }
    /**
     * 扫码成功之后加入数据表
     * @orders  订单总表
     */
    public function add_price($order_number){
        $total = $this->where('order_number',$order_number)->field('total_price')->find(); 
        $data['amount_total'] = $total['total_price'];
        $step = Db::name('orders')->where('order_number',$order_number)->field('step_type,service_type_id')->find();
        if($step['service_type_id']==2){//维修
            if($step['step_type']==1){
               $data['status'] = 3;
               $data['master_status'] = 3;
               $data['step_number'] =6; 
               $data['work_step_number'] =2;
               $result = Db::name('orders')->where('order_number',$order_number)->update($data); 
               //付款成功给师傅发短信
               $this->send($order_number);
            }else{
               $data['status'] = 3;
               $data['master_status'] = 3;
               $data['step_number'] =6; 
               $data['work_step_number'] =5; 
               $result = Db::name('orders')->where('order_number',$order_number)->update($data);  
               //付款成功给师傅发短信
               $this->send($order_number);
            }
        }else if($step['service_type_id']==1){//安装

        }              
        if(!empty($result)){
            return ['code'=>200];
        }else{
            return ['code'=>0];
        }        
    }
    /**
     * [send description]
     * 支付成功发送短信验证码
     * @return [type] [description]
     */
    private function send($order_number){
       $cha= Db::name('orders')->where('order_number',$order_number)->find(); 
       $work_phone=Db::name('users')->field('phone')->where('id',$cha['worker_id'])->find();
       $phone=$work_phone['phone'];
       $uname=$cha['contact_name'];
       $order=$cha['order_number'];
       $time=date('Y-m-d H:i:s');
       ds_payment($phone,$uname,$order,$time);
    }


    /**
     * 扫码支付支付成功成功之后加入数据表
     */
    public function add_project_cost($param){
        $order_number = $param['order_number'];
        $data['amount_total'] = $param['total'];
        $step = Db::name('orders')->where('order_number',$order_number)->field('step_type,service_type_id')->find();
        if($step['service_type_id']==2){//维修
           if($step['step_type']==1){
              $data['status'] = 3;
              $data['master_status'] = 3;
              $data['step_number'] =6; 
              $data['work_step_number'] =2;
              $result = Db::name('orders')->where('order_number',$order_number)->update($data);
              //支付成功之后发送短信
              $this->send($order_number);
           }else{
              $data['status'] = 3;
              $data['master_status'] = 3;
              $data['step_number'] =6; 
              $data['work_step_number'] =5;
              $result = Db::name('orders')->where('order_number',$order_number)->update($data); 
              //支付成功之后发送短信
              $this->send($order_number);
           }
        }else if($step['service_type_id']==1){//安装

        }
         if(!empty($result)){
            return ['code'=>200];
        }else{
            return ['code'=>0];
        }        
    }

}